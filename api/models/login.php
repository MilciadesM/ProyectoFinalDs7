<?php

require_once 'config/ConecctionDb.php';

class LoginModelAdmin {

    public static function getByUser($user) {

        $conn = ConnectionDatabase::openConnection();

        try {
 
            $sql = "SELECT admin_id, usuario, password FROM administradores WHERE usuario = ?";
            $params = [$user];
            $stmt = sqlsrv_prepare($conn, $sql, $params);
            $result = sqlsrv_execute($stmt);

            if (!$result) return ['success' => false, 'message' => 'Error al obtener el usuario'];

            $data = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
            
            return ['success' => true, 'data' => $data];

        } catch (Exception $e) {

            return ['success' => false, 'message' => $e->getMessage()];

        } finally {
 
            ConnectionDatabase::closeConnection();
        }
    
    }

    public static function getByMail($mail) {

        $conn = ConnectionDatabase::openConnection();

        try {
 
            $sql = "SELECT admin_id, usuario, password FROM administradores WHERE email = ?";
            $params = [$mail];
            $stmt = sqlsrv_prepare($conn, $sql, $params);
            $result = sqlsrv_execute($stmt);

            if (!$result) return ['success' => false, 'message' => 'Error al obtener el usuario'];

            $data = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
            
            return ['success' => true, 'data' => $data];

        } catch (Exception $e) {

            return ['success' => false, 'message' => $e->getMessage()];

        } finally {
 
            ConnectionDatabase::closeConnection();
        }
    
    }

}

class LoginModelClient {

    public static function getByUser($user) {

        $conn = ConnectionDatabase::openConnection();

        try {
 
            $sql = "SELECT cliente_id, usuario, password FROM clientes WHERE usuario = ?";
            $params = [$user];
            $stmt = sqlsrv_prepare($conn, $sql, $params);
            $result = sqlsrv_execute($stmt);

            if (!$result) return ['success' => false, 'message' => 'Error al obtener el usuario'];

            $data = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
            
            return ['success' => true, 'data' => $data];

        } catch (Exception $e) {

            return ['success' => false, 'message' => $e->getMessage()];

        } finally {
 
            ConnectionDatabase::closeConnection();
        }
    
    }

    public static function getByMail($mail) {

        $conn = ConnectionDatabase::openConnection();

        try {
 
            $sql = "SELECT cliente_id, usuario, password FROM clientes WHERE email = ?";
            $params = [$mail];
            $stmt = sqlsrv_prepare($conn, $sql, $params);
            $result = sqlsrv_execute($stmt);

            if (!$result) return ['success' => false, 'message' => 'Error al obtener el usuario'];

            $data = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

            return ['success' => true, 'data' => $data];

        } catch (Exception $e) {

            return ['success' => false, 'message' => $e->getMessage()];

        } finally {
 
            ConnectionDatabase::closeConnection();
        }
    
    }

}

?>
