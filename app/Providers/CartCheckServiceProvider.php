<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CartCheckServiceProvider extends ServiceProvider{
    public function register(){
        $this->app->bind('cartCheck', 'App\Services\CartCheck'); //app и есть service container, в bind первый аргумент имя ечейки в service container для нашего сервиса, вторый параметром путь до нашего сервиса
    }
}