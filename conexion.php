<?php
$host = ""; // IP del Servidor de Almacenamiento (Red Interna)
$port = "";
$dbname = "";
$user = "";
$password = "";

$connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password}";
$dbconn = pg_connect($connection_string);
if (!$conn) {
    die("Error de conexión");
}

echo "Conexión PostgreSQL OK";
?>
