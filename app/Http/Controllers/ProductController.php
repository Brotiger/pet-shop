<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\ShowCategoryRequest;

class ProductController extends Controller
{
    public function showProduct($cat, $alias){
        $item = Product::where('alias', $alias)->firstOrFail();

        if($cat != 'different'){
            $analogs = Product::where('alias', '!=', $alias)->orderBy('is_stoke', 'DESC')->with('category')->whereHas('category', function($category) use ($item){
            $category->where('id', $item->category->id);
            })->limit(4)->get();
        }else{
            $analogs = Product::where([
                ['alias', '!=', $alias],
                ['category_id', '=', null]
                ])->orderBy('is_stoke', 'DESC')->limit(4)->get();
        }

        return view('product.show', [
            'item' => $item,
            'analogs' => $analogs
        ]);
    }

    public function showCategory(ShowCategoryRequest $request, $alias){
        $cat = Category::where('alias', $alias)->firstOrFail();

        $paginate = 8;
        $products = Product::where('category_id', $cat->id)->orderBy('is_stoke', 'DESC')->paginate($paginate);
        $product_count = Product::where('category_id', $cat->id)->count();

        if(isset($request->orderBy)){
            if($request->orderBy == 'price-low-high'){
                $products = Product::where('category_id', $cat->id)->orderBy('price')->paginate($paginate);
            }
            if($request->orderBy == 'price-high-low'){
                $products = Product::where('category_id', $cat->id)->orderBy('price', 'desc')->paginate($paginate);
            }
            if($request->orderBy == 'name-a-z'){
                $products = Product::where('category_id', $cat->id)->orderBy('title')->paginate($paginate);
            }
            if($request->orderBy == 'name-z-a'){
                $products = Product::where('category_id', $cat->id)->orderBy('title', 'desc')->paginate($paginate);
            }
        }

        if($request->ajax()){
            return view('ajax.order-by', [
                'products' => $products
            ])->render();
        }

        return view('category.index',[
            'cat' => $cat,
            'product_count' => $product_count,
            'products' => $products
        ]);
    }

    public function different(ShowCategoryRequest $request){
        $paginate = 8;

        $products = Product::where('category_id', null)->orderBy('is_stoke', 'DESC')->paginate($paginate);
        $product_count = Product::where('category_id', null)->count();

        if(isset($request->orderBy)){
            if($request->orderBy == 'price-low-high'){
                $products = Product::where('category_id', null)->orderBy('price')->paginate($paginate);
            }
            if($request->orderBy == 'price-high-low'){
                $products = Product::where('category_id', null)->orderBy('price', 'desc')->paginate($paginate);
            }
            if($request->orderBy == 'name-a-z'){
                $products = Product::where('category_id', null)->orderBy('title')->paginate($paginate);
            }
            if($request->orderBy == 'name-z-a'){
                $products = Product::where('category_id', null)->orderBy('title', 'desc')->paginate($paginate);
            }
        }

        if($request->ajax()){
            return view('ajax.order-by', [
                'products' => $products
            ])->render();
        }

        return view('category.index',[
            'product_count' => $product_count,
            'products' => $products
        ]);
    }
}
