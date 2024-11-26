<?php

class ConnectionDatabase {

    private static $serverName = "proyectstore.database.windows.net";
    private static $connectionOptions = array(
        "Database" => "dbstore",
        "Uid" => "administrador",
        "PWD" => "b8b8c05f-fbdb-4f7e-93ef-14b56102c351"
    );
    private static $conn = null;

    public static function openConnection() {

        if (self::$conn === null) {
            self::$conn = sqlsrv_connect(self::$serverName, self::$connectionOptions);
            if (self::$conn === false) die("Error al conectar a la base de datos: " . print_r(sqlsrv_errors(), true));
        }

        return self::$conn;
    }

    public static function closeConnection() {
        if (self::$conn !== null) {
            sqlsrv_close(self::$conn);
            self::$conn = null;
        }
    }
}


?>
