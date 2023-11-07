<?php
require 'Conexion.php';
$nombre_tarea = $_REQUEST['buscar_tarea'];
$query = ("SELECT * FROM tareas WHERE nombre_tarea='$nombre_tarea'");
$consulta = pg_query($conexion, $query) or die("Error").pg_last_error();
if ($obj = pg_fetch_object($consulta)) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modificar</title>
        <style>
            :root {
    --primary: #A5C882;
    --secondary: #D33F49;
    --light: #fff;
    --dark: #000;
    --diabled: #e7e7e7;
}
            body {
                font-family: 'Lato', sans-serif;
                
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
                background: linear-gradient(150deg, #765791, #C87086);
            }

            .container {
                width: 800px;
                height: 320px;
                padding: 50px 60px;
                background-color: var(--light);
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
                margin: 0 auto;
                margin-bottom: 20px;
            }

            .form-group {
                margin-bottom: 20px;
                
            }

            label {
                display: block;
                font-weight: bold;
            }

            input[type="text"],
            textarea,
            select {
                width: 100%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
            }
  

  
            .roundBorder1 {
                width: 100%;
                height: 50px;
                border: none;
                border-radius: 5px;
                font-weight: bold;
                cursor: pointer;
                text-align: center;
                background-color: var(--secondary);
                color: var(--light);
                text-align: center;
                font-family: 'Lato', sans-serif;
                margin-top: 10px;
            }

            button {
                background-color: var(--secondary);
                color: var(--light);
                border: none;
                border-radius: 5px;
                padding: 10px 20px;
                cursor: pointer;
                margin: 0 auto;
                text-align: center;
                display: block;
                margin-top: 20px;
            }

            button:hover {
                background-color: var(--primary);
                transition: .3s;
                transform: scale(1.1);
            }
            select:hover {
                transform: scale(1.1);
                transition: .3s;
            }
        </style>
    </head>
    <body>
    <div class="container">
        <form action="modificar2.php" method="POST">
            <div class="form-group">
                <label for="nombre_tarea">Nombre de la Tarea:</label>
                <br><input type="text" id="nombre_tarea" name="nombre_tarea" required value="<?php echo $obj->nombre_tarea ?>">
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <br><input type="text" id="descripcion" name="descripcion" required value="<?php echo $obj->descripcion ?>">
            </div>

            <div class="form-group">
                <label for="categoria">Categoría:</label>
                <?php $categoriaDB = $obj->categoria; ?>
                <br><select name="categoria" id="Categoria" class="roundBorder1" required>
                    <option value="Entretenimiento" <?php if ($categoriaDB === "Entretenimiento") echo "selected"; ?>>Entretenimiento</option>
                    <option value="Trabajo" <?php if ($categoriaDB === "Trabajo") echo "selected"; ?>>Trabajo</option>
                    <option value="Estudio" <?php if ($categoriaDB === "Estudio") echo "selected"; ?>>Estudio</option>
                    <option value="Rutina" <?php if ($categoriaDB === "Rutina") echo "selected"; ?>>Rutina</option>
                </select>
            </div>

            <button type="submit">Actualizar Tarea</button>
        </form>
    </div>
    </body>
    </html>
    <?php
} else {
    echo '<script>alert("La Tarea No Existe, Intenta De Nuevo")</script>';
    echo '<script>window.location.href = "../../ModificarTarea.html";</script>';
}
pg_close();
?>
