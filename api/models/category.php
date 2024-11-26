<?php

require_once 'config/ConecctionDb.php';

class CategoryModelAdmin {

    public static function getAll() {

        $conn = ConnectionDatabase::openConnection();
        
        try {
 
            $sql = "SELECT * FROM categorias";
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
 
            $sql = "SELECT * FROM categorias WHERE categoria_id = ?";
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
 
            $sql = "INSERT INTO categorias (categoria_id, nombre, descripcion) VALUES (?, ?, ?)";
            $params = [$id, $nombre];
            $stmt = sqlsrv_prepare($conn, $sql, $params);
            $result = sqlsrv_execute($stmt);

            if (!$result) return ['success' => false, 'message' => 'Error al registrar'];

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

            $sql = "UPDATE categorias SET nombre = ?, descripcion = ? WHERE categoria_id = ?";
            $params = [$nombre, $id];
            $stmt = sqlsrv_prepare($conn, $sql, $params);
            $result = sqlsrv_execute($stmt);
    
            if (!$result) return ['success' => false, 'message' => 'Error al actualizar'];
    
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
 
            $sql = "DELETE FROM categorias WHERE categoria_id = ?";
            $params = [$id];
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

class ProductModelClient {

    public static function getAll() {

        $conn = ConnectionDatabase::openConnection();
        
        try {
 
            $sql = "SELECT * FROM categorias";
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
