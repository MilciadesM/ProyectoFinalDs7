<?php

$serverName = "proyectstore.database.windows.net";
$connectionOptions = array(
    "Database" => "dbstore",
    "Uid" => "administrador",
    "PWD" => "b8b8c05f-fbdb-4f7e-93ef-14b56102c351"
);

$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die("Error al conectar a la base de datos: " . print_r(sqlsrv_errors(), true));
}
echo "Conexión exitosa a la base de datos!";

?>
