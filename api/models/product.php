<?php

require_once 'config/ConecctionDb.php';

class ProductModelAdmin {

    public static function getAll() {

        $conn = ConnectionDatabase::openConnection();
        
        try {
 
            $sql = "SELECT * FROM productos";
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
 
            $sql = "SELECT * FROM productos WHERE producto_id = ?";
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

    public static function create($id, $categoria_id, $marca_id, $nombre, $descripcion, $precio, $stock, $img) {

        $conn = ConnectionDatabase::openConnection();

        try {
 
            $sql = "INSERT INTO productos (producto_id, categoria_id, marca_id, nombre, descripcion, precio, stock, img) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $params = [$id, $categoria_id, $marca_id, $nombre, $descripcion, $precio, $stock, $img];
            $stmt = sqlsrv_prepare($conn, $sql, $params);
            $result = sqlsrv_execute($stmt);

            if (!$result) return ['success' => false, 'message' => 'Error al registrar'];

            return ['success' => true, 'message' => 'Registrado exitoso'];

        } catch (Exception $e) {

            return [
                'success' => false,
                'message' => $e->getMessage(),
            ];

        } finally {
 
            ConnectionDatabase::closeConnection();
        }
    
    }

    public static function update($id, $categoria_id, $marca_id, $nombre, $descripcion, $precio, $stock, $img) {

        $conn = ConnectionDatabase::openConnection();
    
        try {

            $sql = "UPDATE productos SET categoria_id = ?, marca_id = ?, nombre = ?, descripcion = ?, precio = ?, stock = ?, img = ? WHERE producto_id = ?";
            $params = [$categoria_id, $marca_id, $nombre, $descripcion, $precio, $stock, $img, $id];
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

    public static function delete($producto_id) {

        $conn = ConnectionDatabase::openConnection();

        try {
 
            $sql = "DELETE FROM productos WHERE producto_id = ?";
            $params = [$producto_id];
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
 
            $sql = "SELECT * FROM productos";
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
 
            $sql = "SELECT * FROM productos WHERE producto_id = ?";
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
    
}

?>
