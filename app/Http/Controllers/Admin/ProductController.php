<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Characteristic;
use App\Http\Requests\Admin\ProductStoreRequest;
use App\Http\Requests\Admin\ProductCreateRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = [];
        $next_query = [
            'id' => '',
            'alias' => '',
            'title' => '',
            'category' => '',
            'price' => '',
            'new_price' => '',
            'is_stoke'
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
        if($request->category != null){
            $category = Category::where('alias', $request->category)->first();
            $filter[] = ["category_id", "=", $category->id];
            $next_query['category'] = $request->category;
        }

        $products = Product::where($filter)->orderBy('created_at', 'DESC')->paginate(15);

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
            return response([
                'data' => [
                    'html' => [
                        'category' => view('admin.ajax.addProduct.category', compact('categories'))->render(),
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

                    $productImagePath = Storage::disk('public')->put('uploads/products', $value);
                    $product_images_arr[] = $productImagePath;

                    $productImage->img = $productImagePath;

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
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
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
