<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Characteristic;
use App\Http\Requests\Admin\Product\ProductStoreRequest;
use App\Http\Requests\Admin\Product\ProductCreateRequest;
use App\Http\Requests\Admin\Product\ProductIndexRequest;
use App\Http\Requests\Admin\Product\ProductEditRequest;
use App\Http\Requests\Admin\Product\ProductUpdateRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductIndexRequest $request)
    {
        $filter = [];
        $next_query = [
            'id' => '',
            'alias' => '',
            'title' => '',
            'category' => '',
            'category_like' => '',
            'price' => '',
            'price_type' => '',
            'new_price' => '',
            'new_price_type' => '',
            'is_stoke' => ''
        ];

        
        if($request->id != null){
            $filter[] = ["id", "=", $request->id];
            $next_query['id'] = $request->id;
        }
        if($request->title != null){
            $filter[] = ["title", "like", '%' . $request->title . '%'];
            $next_query['title'] = $request->title;
        }
        if($request->alias != null){
            $filter[] = ["alias", "like", '%' . $request->alias . '%'];
            $next_query['alias'] = $request->alias;
        }
        if($request->alias != null){
            $filter[] = ["alias", "like", '%' . $request->alias . '%'];
            $next_query['alias'] = $request->alias;
        }
        if($request->is_stoke != null){
            $filter[] = ["is_stoke", "=", $request->is_stoke == 'true'? 1 : 0];
            $next_query['is_stoke'] = $request->is_stoke;
        }
        if($request->price != null){
            $filter[] = ["price", $request->price_type, $request->price];
            $next_query['price'] = $request->price;
            $next_query['price_type'] = $request->price_type;
        }
        if($request->new_price != null){
            $filter[] = ["new_price", $request->new_price_type, $request->new_price];
            $next_query['new_price'] = $request->new_price;
            $next_query['new_price_type'] = $request->new_price_type;
        }
        
        if($request->category != null){
            $category = Category::where('alias', $request->category)->first();
            $filter[] = ["category_id", "=", $category->id];
            $next_query['category'] = $request->category;
        }

        if($request->category_like != null){
            if(Str::lower($request->category_like) == 'разное'){
                $filter[] = ['category_id', '=', null];

                $products = Product::where($filter)->orderBy('created_at', 'DESC')->paginate(15);
            }else{
                $products = Product::where($filter)->with('category')->whereHas('category', function($q) use ($request){
                    $q->where([
                        ['title', 'like', '%'. $request->category_like . '%']
                    ]);
                })->orderBy('created_at', 'DESC')->paginate(15);
            }

            $next_query['category_like'] = $request->category_like;
        }else{
            $products = Product::where($filter)->orderBy('created_at', 'DESC')->paginate(15);
        }

        if($request->ajax()){
            return response([
                'data' => [
                    'html' => [
                        'table' => view('admin.ajax.product.index', compact('products', 'next_query'))->render(),
                    ]
                ]
            ], 200);
        }

        return view('admin.product.index', compact('products', 'next_query'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ProductCreateRequest $request)
    {
        $filter = [];

        if($request->id != null){
            $filter[] = ["id", "=", $request->id];
        }
        if($request->title != null){
            $filter[] = ["title", "like", '%' . $request->title . '%'];
        }
        if($request->alias != null){
            $filter[] = ["alias", "like", '%' . $request->alias . '%'];
        }

        $limit = env('LIMIT_SEARCH_RECORD', 15);
        $categories = Category::where($filter)->orderBy('title')->limit($limit)->get();

        if($request->ajax()){
            $product = null;

            if($request->product_id != null){
                $product = Product::where('id', $request->product_id)->first();
            }
            
            return response([
                'data' => [
                    'html' => [
                        'category' => view('admin.ajax.product.searchCategory', compact('categories', 'product'))->render(),
                    ]
                ]
            ], 200);
        }

        return view('admin.product.create',compact('categories', 'limit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        DB::beginTransaction();

        try {
            $product_images_arr = [];

            $new_product = new Product();
            $new_product->title = $request->title;
            $new_product->alias = $request->alias;
            $new_product->price = $request->price;
            $new_product->new_price = $request->new_price;
            $new_product->description = $request->description;
            $new_product->category_id = $request->category;
            $new_product->is_stoke = $request->is_stoke == 'true'? 1 : 0;

            $new_product->save();

            if($request->img){
                foreach($request->img as $key => $value){

                    $productImage = new ProductImage();

                    $path = Storage::disk('public')->put('uploads/products', $value);
                    $product_images_arr[] = $path;

                    $productImage->img = $path;

                    $new_product->images()->save($productImage);
                }
            }

            if($request->charName){
                foreach($request->charName as $key => $value){
                    $productChar = new Characteristic();

                    $productChar->name = $value;
                    $productChar->value = $request->charValue[$key];

                    $new_product->chars()->save($productChar);
                }
            }

            DB::commit();

        } catch (\Throwable $e) {
            DB::rollback();

            foreach($product_images_arr as $key => $value){
                Storage::disk('public')->delete($value);
            }

            throw $e;
        }

        return response([
            'data' => [
                'message' => 'Товар добавлен' 
            ],
            'action' => 'reset'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductEditRequest $request, Product $product)
    {
        $filter = [];

        if($request->id != null){
            $filter[] = ["id", "=", $request->id];
        }
        if($request->title != null){
            $filter[] = ["title", "like", '%' . $request->title . '%'];
        }
        if($request->alias != null){
            $filter[] = ["alias", "like", '%' . $request->alias . '%'];
        }

        $limit = env('LIMIT_SEARCH_RECORD', 15);
        $categories = Category::where($filter)->orderBy('title')->limit($limit)->get();

        return view('admin.product.edit', compact('product', 'categories', 'limit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $product_images_arr = [];

        DB::beginTransaction();

        try {
            $product->title = $request->title;
            $product->alias = $request->alias;
            $product->price = $request->price;
            $product->new_price = $request->new_price;
            $product->description = $request->description;
            $product->category_id = $request->category;
            $product->is_stoke = $request->is_stoke == 'true'? 1 : 0;

            $product->save();

            if($request->img){
                foreach($request->img as $key => $value){

                    $productImage = new ProductImage();

                    $path = Storage::disk('public')->put('uploads/products', $value);
                    $product_images_arr[] = $path;

                    $productImage->img = $path;

                    $product->images()->save($productImage);
                }
            }

            if($request->charName){
                foreach($request->charName as $key => $value){
                    $productChar = new Characteristic();

                    $productChar->name = $value;
                    $productChar->value = $request->charValue[$key];

                    $product->chars()->save($productChar);
                }
            }

            if($request->deleteImg){
                foreach($request->deleteImg as $key => $value){
                    if($value == 'true'){
                        ProductImage::where('id', $key)->delete();
                    }
                }
            }

            if($request->deleteChar){
                foreach($request->deleteChar as $key => $value){
                    if($value == 'true'){
                        Characteristic::where('id', $key)->delete();
                    }
                }
            }

            if($request->editCharValue){
                foreach($request->editCharValue as $key => $value){
                    Characteristic::where('id', $key)->update(['value' => $value]);
                }
            }

            if($request->editCharName){
                foreach($request->editCharName as $key => $value){
                    Characteristic::where('id', $key)->update(['name' => $value]);
                }
            }

            DB::commit();

        } catch (\Throwable $e) {
            DB::rollback();

            foreach($product_images_arr as $key => $value){
                Storage::disk('public')->delete($value);
            }

            throw $e;
        }

        return response([
            'data' => [
                'message' => 'Товар обновлен',
                'html' => [
                    'imgBlock' => view('admin.ajax.product.imgBlock', compact('product'))->render(),
                    'charBlock' => view('admin.ajax.product.charBlock', compact('product'))->render(),
                ]
            ]
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        foreach($product->images as $key => $image){
            Storage::disk('public')->delete($image->img);
        }

        $product->delete();

        return response([
            'data' => [
                'message' => 'Товар удален',
            ],
        ], 200);
    }
}
