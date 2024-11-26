<?php

require_once 'utils/Generate.php';

class RegisterControllerAdmin {

    public function __construct(private $registerModel) {}

    public function register() {

        $jsonData = json_decode(file_get_contents('php://input'), true);
        
        if ($jsonData === null) return ['success' => false,'message' => 'Datos no válidos o JSON malformado'];

        $restQuery = $this->registerModel::register(Generate::ID(), $jsonData['usuario'], $jsonData['nombre'], $jsonData['apellido'], $jsonData['telefono'], $jsonData['mail'], password_hash($jsonData['password'], PASSWORD_BCRYPT));
        
        return $restQuery;
        
    }

    
}

class RegisterControllerClient {

    public function __construct(private $registerModel) {}

    public function register() {

        $jsonData = json_decode(file_get_contents('php://input'), true);
        
        if ($jsonData === null) return ['success' => false,'message' => 'Datos no válidos o JSON malformado'];

        $restQuery = $this->registerModel::register(Generate::ID(), $jsonData['usuario'], $jsonData['nombre'], $jsonData['apellido'], $jsonData['telefono'], $jsonData['mail'], password_hash($jsonData['password'], PASSWORD_BCRYPT));
        
        return $restQuery;
        
    }

    
}


?>