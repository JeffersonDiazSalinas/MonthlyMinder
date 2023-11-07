<?php
require 'Conexion.php';
$usuario=$_POST['USER'];
$clave=$_POST['PASSWORD'];

$query="SELECT * FROM usuarios WHERE nombre_usuario='$usuario' AND contraseña='$clave'";
$consulta=pg_query($conexion,$query);
$cantidad=pg_num_rows($consulta);
if($cantidad> 0){
    echo '<script>window.location.href = "../../Sett.html";</script>';
}else{
    echo '<script>window.location.href = "../../Wrong.html";</script>';
}
?>