<?php

require_once 'controllers/register.php';

class Register {

    public static function admin($registerModel) {
        
        $controller = new RegisterControllerAdmin($registerModel);
        
        $response = match ($_SERVER['REQUEST_METHOD']) {
            'POST' => $controller->register(),
            default => [
                'success' => false,
                'message' => 'Método no permitido',
            ],
        };
        
        return $response;
    }

    public static function client($registerModel) {
        
        $controller = new RegisterControllerClient($registerModel);
        
        $response = match ($_SERVER['REQUEST_METHOD']) {
            'POST' => $controller->register(),
            default => [
                'success' => false,
                'message' => 'Método no permitido',
            ],
        };
        
        return $response;
    }
}

?>