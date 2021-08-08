<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use CartService;

class CartController extends Controller
{
    public function index(){
        $cart_id = CartService::getCartId();

        \Cart::session($cart_id);

        $products = \Cart::getContent();

        $total = \Cart::session($cart_id)->getSubTotal();

        if(isset($_SESSION['delivery'])){
            $total += 1500;
        }

        return view('cart.index', [
            'products' => $products,
            'total' => $total
        ]);
    }

    public function addToCart(Request $request){
        $product = Product::where('id', $request->id)->first();

        $cart_id = CartService::getCartId();

        \Cart::session($cart_id);

        \Cart::add(array(
            'id' => $product->id,
            'name' => $product->title,
            'price' => $product->new_price ? $product->new_price : $product->price,
            'quantity' => (int) $request->qty,
            'attributes' => array(
                'img' => isset($product->images[0]->img) ? $product->images[0]->img : 'no_image.png',
                'alias' => $product->alias,
                'category' => $product->category->alias
            )
        ));

        return response()->json(\Cart::getContent());
    }

    public function clearCart(){
        $cart_id = CartService::getCartId();

        \Cart::session($cart_id)->clear();

        return response([
            'subTotal' => \Cart::session($cart_id)->getSubTotal(),
            'total' => isset($_SESSION['delivery'])? 1500: 0
        ], 202);
    }

    public function addDelivery(){
        $cart_id = CartService::getCartId();

        $_SESSION['delivery'] = 'yes';

        return response([
            'total' => \Cart::session($cart_id)->getSubTotal() +  1500
        ], 202);
    }

    public function deleteDelivery(){
        $cart_id = CartService::getCartId();

        if($_SESSION['delivery']){
            unset($_SESSION['delivery']);
        }

        return response([
            'total' => \Cart::session($cart_id)->getSubTotal()
        ], 202);
    }
}
