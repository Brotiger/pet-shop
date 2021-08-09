<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CartCustomServiceProvider extends ServiceProvider{
    public function register(){
        $this->app->bind('cartCustom', 'App\Services\CartCustom'); //app и есть service container, в bind первый аргумент имя ечейки в service container для нашего сервиса, вторый параметром путь до нашего сервиса
    }
}