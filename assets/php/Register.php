<?php
require 'Conexion.php';
$query=("INSERT INTO usuarios(nombre_usuario,correo,contraseña)
VALUES ('$_REQUEST[Nombre]','$_REQUEST[Correo]','$_REQUEST[Contraseña]')");

$consulta=pg_query($conexion,$query);
if($consulta){
        echo '<script>window.location.href = "../../DatosIngresados.html";</script>';
}
pg_close();
?>