<?php
    /**
     * @author Nicolás Arena Ruiz <narena@cifpfbmoll.eu>
     * @version 1.0.0
     */
    //inicio la sesion
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica Agenda</title>
</head>
<body>
<!-- Es un formulario con el que pediras los datos -->
    <form method="post">
        <h1>Datos de la Agenda:</h1>
        <br>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nameUser" id="nombre" placeholder="ej. Nicolas">
        <br>
        <label for="telefono">Telefono:</label>
        <input type="number" name="telUser" id="telefono" placeholder="ej. 623 45 67 89">
        <br>
        <br>
        <input type="submit" name="envioFormulario" value="Enviar" />
        <br>
        <?php
        //Guardo en session con la id que es el nombre y su valor sera el telefono
            $_SESSION[$_POST['nameUser']] = $_POST['telUser'];
            if (isset($_POST['envioFormulario'])) {
                //Te imprime los datos
                echo "<h2>Datos Guardados</h2>";
                echo "<ul>";
                foreach($_SESSION as $name => $tel) {
                    echo "<li>" . $name . " => " . $tel ."</li>";
                }
                echo "</ul>";
            }
        ?>
    </form>
</body>
</html>