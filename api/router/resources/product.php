<?php

require_once 'controllers/product.php';
require_once 'utils/JsonWebToken.php';

class Product {

    public static function admin($productoModel) {
    
        $dataToken = JsonWebToken::Validate();
    
        if($dataToken['usertype'] !== 'admin') return [ 'success' => false, 'message' => 'No centacon los permisos'];
    
        $controller = new ProductControllerAdmin($productoModel);
        $id = $_GET['id'] ?? null;
    
    
        $response = match ($_SERVER['REQUEST_METHOD']) {
            'GET' => $id ? $controller->getById($id, $dataToken) : $controller->getAll($dataToken),
            'POST' => '',
            'PUT' => '',
            'DELETE' => '',
            default => ['success' => false,'message' => 'Método no permitido']
        };
        
        return $response;
    }

    public static function client($productoModel) {
    
        $dataToken = JsonWebToken::Validate();
    
        if($dataToken['usertype'] !== 'client') return [ 'success' => false, 'message' => 'No centacon los permisos'];
    
        $controller = new ProductControllerClient($productoModel);
        $id = $_GET['id'] ?? null;
    
    
        $response = match ($_SERVER['REQUEST_METHOD']) {
            'GET' => $id ? $controller->getById($id, $dataToken) : $controller->getAll($dataToken),
            default => ['success' => false,'message' => 'Método no permitido']
        };
        
        return $response;
    }
}

?>