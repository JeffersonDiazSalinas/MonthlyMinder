<?php
require 'Conexion.php';
$nombre_tarea = pg_escape_string($conexion, $_REQUEST['taskText']);
$desc_tarea = pg_escape_string($conexion, $_REQUEST['taskDesc']);
$categoria = pg_escape_string($conexion, $_REQUEST['Categoria']);
$query = "INSERT INTO tareas (nombre_tarea, descripcion, categoria) VALUES ('$nombre_tarea', '$desc_tarea', '$categoria')";
$consulta = pg_query($conexion, $query);
if ($consulta) {
    echo '<script>alert("Tarea Ingresada Correctamente")</script>';
    echo '<script>window.location.href = "../../TaskIndex.html";</script>';
} else {
    echo '<script>alert("Error al ingresar la tarea")</script>';
}
pg_close();
?>