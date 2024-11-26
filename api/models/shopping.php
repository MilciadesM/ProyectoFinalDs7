<?php

require_once 'config/ConecctionDb.php';

class ShoppingModelAdmin {

    public static function getAll() {

        $conn = ConnectionDatabase::openConnection();
        
        try {
 
            $sql = "SELECT * FROM compras";
            $params = [$cliente_id];
            $stmt = sqlsrv_prepare($conn, $sql, $params);
            $result = sqlsrv_execute($stmt);

            if (!$result) return ['success' => false,'message' => 'Error al buscar datos'];

            $data = [];

            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                $productos[] = $row;
            }

            return ['success' => false,'data' => $data];

        } catch (Exception $e) {

            return ['success' => false,'message' => $e->getMessage()];

        } finally {
 
            ConnectionDatabase::closeConnection();
        }
    
    }

    public static function getById($compras_id) {

        $conn = ConnectionDatabase::openConnection();
        
        try {
 
            $sql = "SELECT * FROM compras WHERE compras_id = ?";
            $params = [$compras_id];
            $stmt = sqlsrv_prepare($conn, $sql, $params);
            $result = sqlsrv_execute($stmt);

            $data = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
            
            return ['success' => true, 'data' => $data];

        } catch (Exception $e) {

            return ['success' => false,'message' => $e->getMessage()];

        } finally {
 
            ConnectionDatabase::closeConnection();
        }
    
    }
    
}

class ShoppingModelClient {

    public static function getAll($cliente_id) {

        $conn = ConnectionDatabase::openConnection();
        
        try {
 
            $sql = "SELECT factura_id, pais, fecha FROM compras WHERE cliente_id = ?";
            $params = [$cliente_id];
            $stmt = sqlsrv_prepare($conn, $sql, $params);
            $result = sqlsrv_execute($stmt);

            if (!$result) return ['success' => false,'message' => 'Error al buscar datos'];

            $data = [];

            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                $productos[] = $row;
            }

            return ['success' => false,'data' => $data];

        } catch (Exception $e) {

            return ['success' => false,'message' => $e->getMessage()];

        } finally {
 
            ConnectionDatabase::closeConnection();
        }
    
    }

    public static function getById($factura_id) {

        $conn = ConnectionDatabase::openConnection();
        
        try {
 
            $sql = "SELECT producto_id FROM compras WHERE factura_id = ?";
            $params = [$factura_id];
            $stmt = sqlsrv_prepare($conn, $sql, $params);
            $result = sqlsrv_execute($stmt);

            if (!$result) return ['success' => false,'message' => 'Error al buscar datos'];

            $data = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
            
            return ['success' => true, 'data' => $data];

        } catch (Exception $e) {

            return ['success' => false,'message' => $e->getMessage()];

        } finally {
 
            ConnectionDatabase::closeConnection();
        }
    
    }
    
}

?>