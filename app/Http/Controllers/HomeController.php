<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(){
        $products = Product::where([
            ['is_stoke', '=', 1],
            ['price', '>', 0],
            ])->orderBy('created_at')->take(8)->get();

        return view('home.index', [
            'products' => $products
        ]);
    }
}
