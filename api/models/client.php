<?php

require_once 'config/ConecctionDb.php';

class ClientModelAdmin {

    public static function getAll() {

        $conn = ConnectionDatabase::openConnection();
        
        try {
 
            $sql = "SELECT * FROM clientes";
            $stmt = sqlsrv_prepare($conn, $sql);
            $result = sqlsrv_execute($stmt);

            if (!$result) return ['success' => false,'message' => 'Error al buscar datos'];

            $productos = [];

            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                $productos[] = $row;
            }

            return ['success' => true,'data' => $productos];

        } catch (Exception $e) {

            return ['success' => false,'message' => $e->getMessage()];

        } finally {
 
            ConnectionDatabase::closeConnection();
        }
    
    }

    public static function getById($cliente_id) {

        $conn = ConnectionDatabase::openConnection();

        try {
 
            $sql = "SELECT * FROM clientes WHERE cliente_id = ?";
            $params = [$cliente_id];
            $stmt = sqlsrv_prepare($conn, $sql, $params);
            $result = sqlsrv_execute($stmt);

            if (!$result) return ['success' => false,'message' => 'Error al buscar datos'];

            $producto = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

            return ['success' => true, 'data' => $producto];

        } catch (Exception $e) {

            return ['success' => false,'message' => $e->getMessage()];

        } finally {
 
            ConnectionDatabase::closeConnection();
        }
    
    }

}

class ClientModelClient { }

?>
