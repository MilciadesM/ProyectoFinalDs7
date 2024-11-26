<?php

require_once 'controllers/files.php';

class File {

    public static function admin() {

        $controller = new FilesController();
        
        $name = $_GET['name'] ?? null;
        
        $response = match ($_SERVER['REQUEST_METHOD']) {
            'GET' => $name ? $controller->getImage($name) : $controller->getImage($name),
            default => [
                'success' => false,
                'message' => 'Método no permitido',
            ],
        };
        
        return $response;
    }

    public static function client() {

        $controller = new FilesController();
        
        $name = $_GET['name'] ?? null;
        
        $response = match ($_SERVER['REQUEST_METHOD']) {
            'GET' => $name ? $controller->getImage($name) : $controller->getImage($name),
            default => [
                'success' => false,
                'message' => 'Método no permitido',
            ],
        };
        
        return $response;
    }
}

?>