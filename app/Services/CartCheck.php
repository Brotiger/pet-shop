<?php

namespace App\Services;

class CartCheck{
    public function getCartId(){
        if(!isset($_SESSION['cart_id'])){
            $cart_id = uniqid();
            $_SESSION['cart_id'] = $cart_id;
        }else{
            $cart_id = $_SESSION['cart_id'];
        }

        return $cart_id;
    }
}