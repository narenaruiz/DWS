<?php
    /**
     * @author Nicolás Arena Ruiz <narena@cifpfbmoll.eu>
     * @version 1.0.0
     */
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
    <form action="practicaAgendaPrueba.php" method="post">
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
            
        ?>
    </form>
</body>
</html>