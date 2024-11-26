<?php

require_once 'controllers/login.php';


class Login {

    public static function admin($loginModel) {
        
        $controller = new LoginControllerAdmin($loginModel);
        
        $response = match ($_SERVER['REQUEST_METHOD']) {
            'POST' => $controller->getByMail(),
            default => [
                'success' => false,
                'message' => 'Método no permitido',
            ],
        };
        
        return $response;
    }

    public static function client($loginModel) {
        
        $controller = new LoginControllerClient($loginModel);
        
        $response = match ($_SERVER['REQUEST_METHOD']) {
            'POST' => $controller->getByMail(),
            default => [
                'success' => false,
                'message' => 'Método no permitido',
            ],
        };
        
        return $response;
    }
}

?>