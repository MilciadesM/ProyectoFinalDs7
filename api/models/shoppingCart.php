<?php

require_once 'config/ConecctionDb.php';

class ShoppingCartModelClient {

    public static function getAll($cliente_id) {

        $conn = ConnectionDatabase::openConnection();
        
        try {
 
            $sql = "SELECT * FROM carrito WHERE cliente_id = ?";
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

    public static function delete($carrito_id) {

        $conn = ConnectionDatabase::openConnection();

        try {
 
            $sql = "DELETE FROM carrito WHERE carrito_id = ?";
            $params = [$carrito_id];
            $stmt = sqlsrv_prepare($conn, $sql, $params);
            $result = sqlsrv_execute($stmt);

            if (!$result) return ['success' => false, 'message' => 'Error al eliminar'];

            return ['success' => true, 'message' => 'Eliminado exitoso'];

        } catch (Exception $e) {

            return ['success' => false,'message' => $e->getMessage()];

        } finally {
 
            ConnectionDatabase::closeConnection();
        }
    
    }
    
}

?>
