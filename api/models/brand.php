<?php

require_once 'config/ConecctionDb.php';

class BrandModelAdmin {

    public static function getAll() {

        $conn = ConnectionDatabase::openConnection();
        
        try {
 
            $sql = "SELECT * FROM marcas";
            $stmt = sqlsrv_prepare($conn, $sql);
            $result = sqlsrv_execute($stmt);

            if (!$result) return ['success' => false,'message' => 'Error al buscar datos'];

            $productos = [];

            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                $productos[] = $row;
            }

            return ['success' => false,'data' => $productos];

        } catch (Exception $e) {

            return ['success' => false,'message' => $e->getMessage()];

        } finally {
 
            ConnectionDatabase::closeConnection();
        }
    
    }

    public static function getById($id) {

        $conn = ConnectionDatabase::openConnection();

        try {
 
            $sql = "SELECT * FROM marcas WHERE marca_id = ?";
            $params = [$id];
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

    public static function create($id, $nombre) {

        $conn = ConnectionDatabase::openConnection();

        try {
 
            $sql = "INSERT INTO marcas (marca_id, nombre) VALUES (?, ?)";
            $params = [$id, $nombre];
            $stmt = sqlsrv_prepare($conn, $sql, $params);
            $result = sqlsrv_execute($stmt);

            if (!$result) return ['success' => false, 'message' => 'Error al registrar la marca'];

            return ['success' => true, 'message' => 'Registro exitoso'];

        } catch (Exception $e) {

            return ['success' => false,'message' => $e->getMessage()];

        } finally {
 
            ConnectionDatabase::closeConnection();
        }
    
    }

    public static function update($id, $nombre) {

        $conn = ConnectionDatabase::openConnection();
    
        try {

            $sql = "UPDATE marcas SET nombre = ? WHERE marca_id = ?";
            $params = [$nombre, $id];
            $stmt = sqlsrv_prepare($conn, $sql, $params);
            $result = sqlsrv_execute($stmt);
    
            if (!$result) return ['success' => false, 'message' => 'Error al actualizar la marca'];
    
            return ['success' => true, 'message' => 'Actualizado exitoso'];
    
        } catch (Exception $e) {

            return ['success' => false,'message' => $e->getMessage()];
    
        } finally {

            ConnectionDatabase::closeConnection();
        }
    }    

    public static function delete($id) {

        $conn = ConnectionDatabase::openConnection();

        try {
 
            $sql = "DELETE FROM marcas WHERE marca_id = ?";
            $params = [$id];
            $stmt = sqlsrv_prepare($conn, $sql, $params);
            $result = sqlsrv_execute($stmt);

            if (!$result) return ['success' => false, 'message' => 'Error al eliminar la marca'];

            return ['success' => true, 'message' => 'Eliminado exitoso'];

        } catch (Exception $e) {

            return ['success' => false,'message' => $e->getMessage()];

        } finally {
 
            ConnectionDatabase::closeConnection();
        }
    
    }
}

class ProductModelClient {

    public static function getAll() {

        $conn = ConnectionDatabase::openConnection();
        
        try {
 
            $sql = "SELECT * FROM marcas";
            $stmt = sqlsrv_prepare($conn, $sql);
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
    
}

?>
