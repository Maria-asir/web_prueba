<?php
// 1. Conectar a la base de datos
include('conexion.php');

$mensaje_resultado = "";
$tabla_usuarios_html = "";

if ($dbconn) {
    // 2. Si se envía el formulario, guardar los datos
    if (isset($_POST['guardar'])) {
        $nombre = htmlspecialchars($_POST['nombre']);
        $email = htmlspecialchars($_POST['email']);

        $query = "INSERT INTO usuarios (nombre, email) VALUES ($1, $2)";
        $result = pg_query_params($dbconn, $query, array($nombre, $email));
        
        if ($result) {
            $mensaje_resultado = "<p class='success-msg'>¡Usuario '$nombre' guardado con éxito!</p>";
        } else {
            $mensaje_resultado = "<p class='error-msg'>Error al guardar los datos.</p>";
        }
    }

    // 3. Cargar los datos existentes de la tabla usuarios
    $result_select = pg_query($dbconn, "SELECT id, nombre, email, fecha_registro FROM usuarios ORDER BY id DESC");
    if (pg_num_rows($result_select) > 0) {
        $tabla_usuarios_html .= "<table><tr><th>ID</th><th>Nombre</th><th>Email</th><th>Fecha</th></tr>";
        while ($row = pg_fetch_assoc($result_select)) {
            $tabla_usuarios_html .= "<tr><td>{$row['id']}</td><td>{$row['nombre']}</td><td>{$row['email']}</td><td>{$row['fecha_registro']}</td></tr>";
        }
        $tabla_usuarios_html .= "</table>";
    } else {
        $tabla_usuarios_html = "<p>No hay registros todavía.</p>";
    }
    
    // 4. Cerrar la conexión
    pg_close($dbconn);
} else {
    $mensaje_resultado = "<p class='error-msg'><strong>Error:</strong> No se pudo conectar a la Base de Datos.</p>";
}

// 5. LLAMAR AL ARCHIVO HTML PARA QUE PINTE LA PÁGINA
include('html/principal.html');
?>
