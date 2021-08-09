<?php

namespace App\Services;

class CartCustom{
    public function getCart(){
        if(!isset($_SESSION['cart_id'])){
            $cart_id = uniqid();
            $_SESSION['cart_id'] = $cart_id;
        }else{
            $cart_id = $_SESSION['cart_id'];
        }

        $cart = \Cart::session($cart_id);

        return $cart;
    }
}