<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;

class HomeController extends Controller
{
    public function index(){
        $product_count = Product::all()->count();
        $category_count = Category::all()->count();
        $user_count = User::all()->count();

        return view('admin.home.index', compact(['product_count', 'category_count', 'user_count']));
    }
}
