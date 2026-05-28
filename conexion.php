<?php
$host = "192.168.10.12"; // IP del Servidor de Almacenamiento (Red Interna)
$port = "5432";
$dbname = "prueba";
$user = "usuario_web";
$password = "f56i7o8p";

$connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password}";
$dbconn = pg_connect($connection_string);
if (!$conn) {
    die("Error de conexión");
}

echo "Conexión PostgreSQL OK";
?>
