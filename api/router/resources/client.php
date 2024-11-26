<?php

require_once 'controllers/client.php';
require_once 'utils/JsonWebToken.php';

class Client {

    public static function admin($productoModel) {
    
        $dataToken = JsonWebToken::Validate();
    
        if($dataToken['usertype'] !== 'admin') return [ 'success' => false, 'message' => 'No cuenta con los permisos'];
    
        $controller = new ClientControllerAdmin($productoModel);

        $id = $_GET['id'] ?? null;
    
        $response = match ($_SERVER['REQUEST_METHOD']) {
            'GET' => $id ? $controller->getById($dataToken, $id) : $controller->getAll($dataToken),
            'POST' => '',
            'PUT' => '',
            'DELETE' => '',
            default => ['success' => false,'message' => 'Método no permitido']
        };
        
        return $response;
    }

    // public static function client($productoModel) {
    
    //     $dataToken = JsonWebToken::Validate();
    
    //     if($dataToken['usertype'] !== 'client') return [ 'success' => false, 'message' => 'No cuenta con los permisos'];
    
    //     $controller = new ClientControllerClient($productoModel);

    //     $id = $_GET['id'] ?? null;
    
    //     $response = match ($_SERVER['REQUEST_METHOD']) {
    //         'GET' => $id ? $controller->getById($dataToken, $id) : $controller->getAll($dataToken),
    //         default => ['success' => false,'message' => 'Método no permitido']
    //     };
        
    //     return $response;
    // }
}

?>