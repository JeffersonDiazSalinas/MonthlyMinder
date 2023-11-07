<?php
require 'Conexion.php';
$query=("UPDATE tareas SET nombre_tarea='$_REQUEST[nombre_tarea]'");
$query2=("UPDATE tareas SET descripcion='$_REQUEST[descripcion]'");
$query3=("UPDATE tareas SET categoria='$_REQUEST[categoria]'");
echo '<script>window.location.href = "../../ModificacionOK.html";</script>';
$consulta=pg_query($conexion,$query) or die ('Error').pg_last_error();
$consulta2=pg_query($conexion,$query2) or die ('Error').pg_last_error();;
$consulta3=pg_query($conexion,$query3) or die ('Error').pg_last_error();;

?>