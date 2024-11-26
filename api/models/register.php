<?php

require_once 'config/ConecctionDb.php';

class RegisterModelAdmin {

    public static function register($id, $usuario, $nombre, $apellido, $telefono, $mail, $password) {

        $conn = ConnectionDatabase::openConnection();

        try {

            $checkSql = "SELECT COUNT(*) AS count FROM administradores WHERE usuario = ? OR email = ?";
            $checkParams = [$usuario, $mail];
            $checkStmt = sqlsrv_prepare($conn, $checkSql, $checkParams);
            sqlsrv_execute($checkStmt);
            $row = sqlsrv_fetch_array($checkStmt, SQLSRV_FETCH_ASSOC);

            if ($row['count'] > 0) return ['success' => false, 'message' => 'El nombre de usuario o el email ya están registrados'];

            $sql = "INSERT INTO administradores (admin_id, usuario, nombre, apellido, telefono, email, password) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $params = [$id, $usuario, $nombre, $apellido, $telefono, $mail, $password];
            $stmt = sqlsrv_prepare($conn, $sql, $params);
            $result = sqlsrv_execute($stmt);

            if (!$result) return ['success' => false, 'message' => 'Error al registrar el administrador'];

            return ['success' => true, 'message' => 'Administrado registrado exitosamente'];

        } catch (Exception $e) {

            return ['success' => false,'message' => $e->getMessage()];

        } finally {

            ConnectionDatabase::closeConnection();

        }
    
    }

}

class RegisterModelClient {

    public static function register($id, $usuario, $nombre, $apellido, $telefono, $mail, $password) {

        $conn = ConnectionDatabase::openConnection();

        try {

            $checkSql = "SELECT COUNT(*) AS count FROM clientes WHERE usuario = ? OR email = ?";
            $checkParams = [$usuario, $mail];
            $checkStmt = sqlsrv_prepare($conn, $checkSql, $checkParams);
            sqlsrv_execute($checkStmt);
            $row = sqlsrv_fetch_array($checkStmt, SQLSRV_FETCH_ASSOC);

            if ($row['count'] > 0) return ['success' => false, 'message' => 'El nombre de usuario o el email ya están registrados'];

            $sql = "INSERT INTO clientes (cliente_id, usuario, nombre, apellido, telefono, email, password) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $params = [$id, $usuario, $nombre, $apellido, $telefono, $mail, $password];
            $stmt = sqlsrv_prepare($conn, $sql, $params);
            $result = sqlsrv_execute($stmt);

            if (!$result) return ['success' => false, 'message' => 'Error al registrar'];

            return ['success' => true, 'message' => 'Registrado exitosamente'];

        } catch (Exception $e) {

            return ['success' => false,'message' => $e->getMessage()];

        } finally {

            ConnectionDatabase::closeConnection();

        }
    
    }

}

?>

