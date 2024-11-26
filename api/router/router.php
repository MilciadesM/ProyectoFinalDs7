<?php

//Models
require_once 'models/login.php';
require_once 'models/register.php';
require_once 'models/product.php';
require_once 'models/client.php';

//Resources
require_once 'router/resources/login.php';
require_once 'router/resources/register.php';
require_once 'router/resources/client.php';
require_once 'router/resources/product.php';
require_once 'router/resources/file.php';


class Router {

    public static function admin($resource) {
    
        $response = match ($resource) {
            'login' => Login::admin(LoginModelAdmin::class),
            'register' => Register::admin(RegisterModelAdmin::class),
            'product' => Product::admin(ProductModelAdmin::class),
            'brand' => '',
            'category' => '',
            'shopping' => '',
            'client' => Client::admin(ClientModelAdmin::class),
            default => ['success' => false,'message' => 'Not Found']
        };
    
        return $response;
    
    }

    public static function client($resource) {
    
        $response = match ($resource) {
            'login' => Login::client(LoginModelClient::class),
            'register' => Register::client(RegisterModelClient::class),
            'product' => Product::client(ProductModelClient::class),
            'shopping' => '',
            'shoppingcart' => '',
            'image' => '',
            default => ['success' => false,'message' => 'Not Found']
        };
    
        return $response;
    
    }

}

?>