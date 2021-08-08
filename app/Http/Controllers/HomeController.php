<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(){
        $products = Product::where([
            ['price', '>', 0],
            ])->orderBy('created_at')->orderBy('is_stoke', 'DESC')->take(8)->get();

        return view('home.index', [
            'products' => $products
        ]);
    }
}
