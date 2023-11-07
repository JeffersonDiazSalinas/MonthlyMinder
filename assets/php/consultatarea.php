<?php
require 'Conexion.php';
$query="SELECT id,nombre_tarea,descripcion,categoria,fecha_creacion,fecha_vencimiento FROM tareas";
$consulta=pg_query($conexion,$query);

?>