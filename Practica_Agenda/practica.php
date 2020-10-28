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
             * $agenda = array_merge($agenda, $aux); te combina los array que pongas
             * parse_str(string de entrada , array donde se guarda) vuelve el string en array
             * http_build_query vuelve el array a string
             */

            /**
             * Lo que hago es guardar los primeros datos en lista y despues
             * lo transformo en un url con la funcion de
             * http_build_query y lo guardo en el input para que cuando recargue la pagina
             * no desaparezca. En la siguiente pasada lo que he hecho es
             * transformar lo del input hidden en un array otra vez y lo vuelvo a poner
             * en lista, entonces guardo los datos introducidos en otra variable, no
             * uso lista porque tiene los datos guardados de la anterior vuelta,
             * y ahora lo que hago es juntar los datos antiguos y los nuevos
             * con el array_merge. Finalmente volvemos a tranformar el array de lista
             * en un url y si queremos imprimir los datos seria con
             * lista(que es un array asociativo) la cual conserva los datos hasta que
             * envies nuevos y se cambien.
             */
            if (!isset($_POST['guardar'])) {
                //Cuando el input hidden este vacio entonces se ejecuta esto.
                //Esta vacio el array porque en un inicio la pagina esta vacia
                $lista = array();
            } else {
                parse_str($_POST['guardar'], $lista);
                $newValue = array();
                /**
                 * Esto me guardara los datos cuando ninguno de los que te ponga el usuario este vacio
                 */
                if(!empty($_POST['nameUser']) && !empty($_POST['telUser'])) {
                    $newValue = array($_POST['nameUser'] => $_POST['telUser']);
                }
                /**
                 * Cuando el telefono esta vacio y el nombre no entonces te borra
                 * de la lista la clave que tenga el mismo nombre y te borra su
                 * valor tambien.
                 */
                if (empty($_POST['telUser']) && !empty($_POST['nameUser'])) {
                    unset($lista[$_POST['nameUser']]);
                }
                //sobrescribo la variable guardando lo suyo mas lo otro
                $lista = array_merge($lista, $newValue);
            }

            if (isset($lista)) {
                $listatxt = http_build_query($lista);
            }

            /**
             * Creo un input hidden el cual es un input pero que no se ve y en un inicio esta vacio
             */
            echo '<input type="hidden" name="guardar" id="guardar" value="'.$listatxt.'">';
                
            if (isset($_POST['envioFormulario'])) {
                //Esta condicion hace que salga un mensaje en caso de que no introduzcas el nombre
                if (empty($_POST['nameUser'])) {
                    echo "<h3>El nombre no ha sido introducido</h3>";
                }
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