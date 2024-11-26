<?php

require_once 'utils/JsonWebToken.php';

class LoginControllerAdmin {

    public function __construct(private $loginModel) {}

    public function getByUser() {

        $jsonData = json_decode(file_get_contents('php://input'), true);
        
        if ($jsonData === null) return ['success' => false,'message' => 'Datos no válidos o JSON malformado'];

        $restQuery = $this->loginModel::getByUser($jsonData['user']);

        if(!$restQuery['success']) return $restQuery;

        if(!password_verify($jsonData['password'], $restQuery['data']['password'])) return ['success' => false, 'message' => 'La contraseña no es correcta'];
            
        $token = JsonWebToken::Create(['id' => $restQuery['data']['admin_id'], 'user' => $restQuery['data']['usuario'], 'usertype' => 'admin']);
        
        return ['success' => true, 'message' => 'Inicio de sesión correcto', 'token' => $token];


    }

    public function getByMail() {

        $jsonData = json_decode(file_get_contents('php://input'), true);
        
        if ($jsonData === null) return ['success' => false,'message' => 'Datos no válidos o JSON malformado'];

        $restQuery = $this->loginModel::getByMail($jsonData['mail']);

        if(!$restQuery['success']) return $restQuery;

        if(!password_verify($jsonData['password'], $restQuery['data']['password'])) return ['success' => false, 'message' => 'La contraseña no es correcta'];
            
        $token = JsonWebToken::Create(['id' => $restQuery['data']['admin_id'], 'user' => $restQuery['data']['usuario'], 'usertype' => 'admin']);
        
        return ['success' => true, 'message' => 'Inicio de sesión correcto', 'token' => $token];

    }
    
}

class LoginControllerClient {

    public function __construct(private $loginModel) {}

    public function getByUser() {

        $jsonData = json_decode(file_get_contents('php://input'), true);
        
        if ($jsonData === null) return ['success' => false,'message' => 'Datos no válidos o JSON malformado'];

        $restQuery = $this->loginModel::getByUser($jsonData['user']);

        if(!$restQuery['success']) return $restQuery;

        if(!password_verify($jsonData['password'], $restQuery['data']['password'])) return ['success' => false, 'message' => 'La contraseña no es correcta'];
            
        $token = JsonWebToken::Create(['id' => $restQuery['data']['cliente_id'], 'user' => $restQuery['data']['usuario'], 'usertype' => 'client']);
        
        return ['success' => true, 'message' => 'Inicio de sesión correcto', 'token' => $token];


    }

    public function getByMail() {

        $jsonData = json_decode(file_get_contents('php://input'), true);
        
        if ($jsonData === null) return ['success' => false,'message' => 'Datos no válidos o JSON malformado'];

        $restQuery = $this->loginModel::getByMail($jsonData['mail']);

        if(!$restQuery['success']) return $restQuery;

        if(!password_verify($jsonData['password'], $restQuery['data']['password'])) return ['success' => false, 'message' => 'La contraseña no es correcta'];
            
        $token = JsonWebToken::Create(['id' => $restQuery['data']['cliente_id'], 'user' => $restQuery['data']['usuario'], 'usertype' => 'client']);
        
        return ['success' => true, 'message' => 'Inicio de sesión correcto', 'token' => $token];

    }
    
}

?>