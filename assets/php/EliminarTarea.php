<?php
require 'Conexion.php';

if (isset($_POST['nombre_tarea'])) {
    $nombre_tarea = $_POST['nombre_tarea'];

    $nombre_tarea = pg_escape_string($conexion, $nombre_tarea);

    $query = "SELECT * FROM tareas WHERE nombre_tarea='$nombre_tarea'";
    $consulta = pg_query($conexion, $query) or die("Hubo un error: " . pg_last_error());

    if (pg_num_rows($consulta) < 1){
        echo 'Hubo un error. Intente de Nuevo'or die(pg_last_error());
    } else {
        $query = "DELETE FROM tareas WHERE nombre_tarea='$nombre_tarea'";
        $consulta = pg_query($conexion, $query) or die('Paila: ' . pg_last_error());
        echo '<script>window.location.href = "../../TareaEliminada.html";</script>';
    }
    pg_close();
} else {
    echo 'La variable nombre_tarea no está definida en el formulario.';
}

?>