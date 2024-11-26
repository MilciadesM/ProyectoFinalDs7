<?php

require_once 'lib/JWT/JWT.php';
require_once 'lib/JWT/Key.php';
require_once 'lib/JWT/JWTExceptionWithPayloadInterface.php';
require_once 'lib/JWT/ExpiredException.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Firebase\JWT\JWTExceptionWithPayloadInterface;
use Firebase\JWT\ExpiredException;

class JsonWebToken {

    private static $clave_secreta = 'a091e4f0-ba4d-4a04-b775-87d6111cc234';

    public static function Create($data) {

        $config = [
            'iat' => time(),
            'exp' => time() + 3600, // Expira en 1 hora
            'data' => $data
        ];

        $token = JWT::encode($config, self::$clave_secreta, 'HS256');
        return $token;

    }

    public static function Validate() {

        $headers = getallheaders();
        
        //$normalizedHeaders = array_change_key_case($headers, CASE_LOWER);

        $authorizationHeader = $headers['Authorization'] ?? $headers['authorization'] ?? null;

        if ($authorizationHeader) {

            $token = explode(' ', $authorizationHeader)[1];

            try {

                $decoded = JWT::decode($token, new Key(self::$clave_secreta, 'HS256'));
                $data = json_decode(json_encode($decoded), true)['data'];

                return $data;

            } catch (ExpiredException $e) {

                echo json_encode([
                    'success' => false,
                    'expiredtoken' => true,
                    'message' => 'Token expirado',
                ]);
                exit;
            
            } catch (Exception $e) {

                echo json_encode([
                    'success' => false,
                    'message' => 'Error desconocido de Token',
                ]);
                exit;
            }

        } else {

            echo json_encode([
                'success' => false,
                'message' => 'El encabezado del token no está presente.',
            ]);
            exit;
        }

    }
    
}
?>
