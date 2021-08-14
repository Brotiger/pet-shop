<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use CartService;
use App\Http\Requests\CartAddItemRequest;
use App\Http\Requests\CartDeleteItemRequest;
use App\Http\Requests\CartQtyItemRequest;

class CartController extends Controller
{
    public function index(){
        $cart = CartService::getCart();

        $products = $cart->getContent();

        $total = $cart->getSubTotal();

        if(isset($_SESSION['delivery'])){
            $total += 1500;
        }

        return view('cart.index', [
            'products' => $products,
            'total' => $total
        ]);
    }

    public function addItem(CartAddItemRequest $request){
        $product = Product::where('id', $request->id)->first();

        $cart = CartService::getCart();

        $cart->add(array(
            'id' => $product->id,
            'name' => $product->title,
            'price' => $product->new_price ? $product->new_price : $product->price,
            'quantity' => (int) $request->qty,
            'attributes' => array(
                'img' => isset($product->images[0]->img) ? $product->images[0]->img : 'no_image.png',
                'alias' => $product->alias,
                'category' => !empty($product->category)? $product->category->alias : 'different'
            )
        ));

        return response(null, 202);
    }

    public function clear(){
        $cart = CartService::getCart();

        $cart->clear();

        return response([
            'subTotal' => $cart->getSubTotal(),
            'total' => isset($_SESSION['delivery'])? 1500: 0
        ], 202);
    }

    public function addDelivery(){
        $cart = CartService::getCart();

        $_SESSION['delivery'] = 'yes';

        return response([
            'total' => $cart->getSubTotal() +  1500
        ], 202);
    }

    public function deleteDelivery(){
        $cart = CartService::getCart();

        if(isset($_SESSION['delivery'])){
            unset($_SESSION['delivery']);
        }

        return response([
            'total' => $cart->getSubTotal()
        ], 202);
    }

    public function deleteItem(CartDeleteItemRequest $request){
        $cart = CartService::getCart();

        $cart->remove($request->id);

        return response([
            'subTotal' => $cart->getSubTotal(),
            'total' => $cart->getSubTotal() + isset($_SESSION['delivery'])? 1500: 0,
            'cartQty' => $cart->getTotalQuantity()
        ], 202);
    }

    public function incQty(CartQtyItemRequest $request){
        $cart = CartService::getCart();

        $cart->update($request->id, [
            'quantity' => 1
        ]);
        
        return response([
            'itemTotal' => $cart->get($request->id)->getPriceSum(),
            'subTotal' => $cart->getSubTotal(),
            'total' => $cart->getSubTotal() + (isset($_SESSION['delivery'])? 1500 : 0),
            'cartQty' => $cart->getTotalQuantity()
        ], 202);
    }

    public function decQty(CartQtyItemRequest $request){
        $cart = CartService::getCart();

        $cart->update($request->id, [
            'quantity' => -1
        ]);

        return response([
            'itemTotal' => $cart->get($request->id)->getPriceSum(),
            'subTotal' => $cart->getSubTotal(),
            'total' => $cart->getSubTotal() + (isset($_SESSION['delivery'])? 1500: 0),
            'cartQty' => $cart->getTotalQuantity()
        ], 202);
    }
}