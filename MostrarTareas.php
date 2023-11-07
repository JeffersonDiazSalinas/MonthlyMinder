<?php
require 'assets/php/consultatarea.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tareas</title>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/Mostrar.css">
    
</head>
<body>
    <h1>Lista de Tareas</h1>
    <form action="assets/php/EliminarTarea.php" method="post">
    <table class="responsive-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Categoria</th>
                <th >Fecha de Creación</th>
                <th >Fecha de Vencimiento</th>
                <th><box-icon type='solid' name='message-square-x'></box-icon></th>
                
            </tr>
        </thead>
        <tbody>
<?php
while ($obj=pg_fetch_object ($consulta)){?>

<td><?php echo $obj->id;?></td>
<td><?php echo $obj->nombre_tarea;?></td>
<td><?php echo $obj->descripcion;?></td>
<td><?php echo $obj->categoria;?></td>
<td class="green-bg"><?php echo $obj->fecha_creacion;?></td>
<td class="red-bg"><?php echo $obj->fecha_vencimiento;?></td>
<td><form action="assets/php/EliminarTarea.php" method="post">
<input type="hidden" name="nombre_tarea" value="<?php echo $obj->nombre_tarea; ?>">
<button type="submit" class="Delete">Eliminar</button>
</form></td>
</tr>
</tbody>
<a href="Sett.html" class="round-button">
        <span class="arrow-left"></span>
    </a>
<?php
}
?>  
</body>
</html>
