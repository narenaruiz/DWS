<?php
    $lista = array();
if(isset($_POST['envioFormulario'])) {
    $nameUser = $_POST['nameUser'];
    $telUser = $_POST['telUser'];


    array_push($lista, $lista[$nameUser] = $telUser);




    //Creo que tengo que hacer una array de dos dimensiones(arrays dentro de otro array)
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica Agenda</title>
</head>
<body>
    <form action="practicaAgenda.php" method="post">
        <label>Datos de la Agenda:</label>
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
    </form>
    <section>
    <?php
    if (isset($_POST['envioFormulario'])) {
        //echo "<ul><li>$nameUser ==> $lista[$nameUser]</li></ul>";
        foreach($lista as $x => $x_value) {
            echo "<ul><li>" . $x . " => " . $x_value ."</li></ul>";

          }
    }
    ?>
    </section>
</body>
</html>