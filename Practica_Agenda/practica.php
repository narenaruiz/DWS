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
            /**
             * @author Nicolás Arena Ruiz <narena@cifpfbmoll.eu>
             * @version 1.0.5
             */

            /*
             * Te  guarda los datos
             * 
             * Cuando el input hidden este vacio (cuando cargas la pagina y no has
             * enviado nada todavia) entonces se te ejecutara este if en el cual te
             * inicializa la lista ($lista) donde guardaras todos los datos.
             * El else se activara con lo contrario al if y lo que te hara sera
             * que te transforma el string de guardar (es una url) en un array que
             * te guardara en $lista y luego crea un nuevo array ($newValue),
             * despues habra algunas condiciones para ejecutar cierto codigo
             * 
             * @var lista contiene un metodo el cual hace que sea un array
             * @var newValue contiene un metodo el cual hace que sea un array
             * @link parse_str: https://www.php.net/manual/es/function.parse-str.php
             */
            if (!isset($_POST['guardar'])) {
                //Esta vacio el array porque en un inicio los datos estan vacios
                $lista = array();
            } else {
                //El parse_str te vuelve el string que esta en guardar en un array que te guarda en lista
                parse_str($_POST['guardar'], $lista);
                $newValue = array();
                /*
                 * En caso de que el nombre y el telefono hayan sido escritos guardara
                 * estos dos datos en la array construida anteriormente ($newValue)
                 */
                if(!empty($_POST['nameUser']) && !empty($_POST['telUser'])) {
                    $newValue = array($_POST['nameUser'] => $_POST['telUser']);
                }
                /*
                 * Cuando el telefono esta vacio y el nombre no esta vacio entonces te borra
                 * de la lista la clave que tenga el mismo nombre y te borra su
                 * valor tambien.
                 * @link unset: https://www.php.net/manual/es/function.unset.php
                 */
                if (empty($_POST['telUser']) && !empty($_POST['nameUser'])) {
                    unset($lista[$_POST['nameUser']]);
                }
                //Sobrescribo la variable guardando lo suyo mas lo otro
                $lista = array_merge($lista, $newValue);
            }

            /*
             * Te transforma el array ($lista) en un url
             * @link http_build_query: https://www.php.net/manual/es/function.http-build-query.php
             */
            if (isset($lista)) {
                $listatxt = http_build_query($lista);
            }

            /*
             * Creo un input hidden el cual es un input pero que no se ve
             * y en un inicio esta vacio
             */
            echo '<input type="hidden" name="guardar" id="guardar" value="'.$listatxt.'">';
                
            if (isset($_POST['envioFormulario'])) {
                /*
                 * Esta condicion hace que salga un mensaje en caso de que
                 * no introduzcas el nombre
                 */
                if (empty($_POST['nameUser'])) {
                    echo "<h3>El nombre no ha sido introducido</h3>";
                }
                //Te imprime los datos
                echo "<h2>Datos Guardados</h2>";
                echo "<ul>";
                foreach($lista as $name => $tel) {
                    echo "<li>" . $name . " => " . $tel ."</li>";
                }
                echo "</ul>";
            }
        ?>
    </form>
</body>
</html>