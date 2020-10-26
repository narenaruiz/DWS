<?php
/**
 * Si hemos enviado el formulario entonces se ejecutara
 * lo del if si no entonces simplemente saldra el html
 */
if(isset($_POST['envioFormulario'])) {

    //Recoger los dos valores de los radio buttons
    $opcionAlgoritmo = $_POST['opcionAlgoritmo'];
    $tipoArray = $_POST['tipoArray'];

    /**
     * Esta funcion es la que ejecuta la busqueda
     * binaria
     * 
     * @param lista Es el array de numeros que recibe
     * la funcion para hacer la busqueda binaria
     * @param numeroBuscado Este sera el numero
     * que hay que buscar y sera
     * proporcionado por el usuario
     */
    function busquedaBinaria($lista, $numeroBuscado) {
        $indiceAlto = count($lista);
        $indiceBajo = 0;
        
        $numeroEncontrado = false;
        while (!$numeroEncontrado) {
            $centro = (int)(($indiceBajo + $indiceAlto)/2);
            if ($lista[$centro] > $numeroBuscado) {
                $indiceAlto = $centro;
            } else if ($lista[$centro] < $numeroBuscado) {
                $indiceBajo = $centro;
            } else if ($lista[$centro] == $numeroBuscado) {
                $result = "El numero ha sido encontrado es " . $numeroBuscado . " y esta en la posicion " . $centro . " de la lista.";
                $numeroEncontrado = true;
            }
            /*
            No funciona, he probado de poner el while de otra
            forma y esto separado junto con el otro mensaje
            en unos if pero no funciona asi que lo dejo asi:
            else {
                echo "El numero " . $numeroBuscado . " no esta en la lista";
                $numeroEncontrado = true;
            }
            */
        return $result;
        }
    }

    /**
     * Esta funcion es la que ejecuta el algoritmo de
     * ordenación burbuja
     * 
     * @param lista es la array que recibe para ordenar
     */
    function burbuja($lista) {
        $lengthLista = count($lista);
        $numeroCambio = 0;
        for ($y = 1; $y < $lengthLista; $y++) {
            for ($x = 0; $x < $lengthLista - $y; $x++) {
                if ($lista[$x] > $lista[$x + 1]) {
                    $numeroCambio = $lista[$x];
                    $lista[$x] = $lista[$x + 1];
                    $lista[$x + 1] = $numeroCambio;
                }
            }
        }
        /**
         * Hago la variable resultadoFinal a la que le pongo un texto
         * y luego le voy poniendo los distintos numeros
         */
        $result = "La array ordenada queda asi:";
        foreach ($lista as $num) {
            $result .= " " . $num;
        }
        return $result;
    }

    /**
     * Esta funcion es la que ejecuta el algoritmo de
     * ordenacion intercambio.
     * 
     * @param lista es la array que recibe para ordenar
     */
    function intercambio($lista) {
        $lengthLista = count($lista);
        /**
         * Numero que se compara con todos los demas hasta encontrar uno menor
         * y entonces se intercambiany el nuevo numero se seguira comparando con
         * los numeros que queden
         */
        $numComparar = 0;
        //Numero usado para guardar temporalmente un numero
        $numSustituir = 0;
        
        while ($numComparar < $lengthLista) {
            for ($y = ($numComparar + 1); $y < $lengthLista; $y++) {
                if ($lista[$numComparar] > $lista[$y]) {
                    $numSustituir = $lista[$numComparar];
                    $lista[$numComparar] = $lista[$y];
                    $lista[$y] = $numSustituir;
                }
            }
            $numComparar++;
        }
        
        $result = "La array ordenada queda asi:";
        foreach ($lista as $num) {
            $result .= " " . $num;
        }
        return $result;
    }

    /**
     * Funcion para la opcion de busqueda binaria con
     * un array de numeros predeterminado
     * 
     * @param numeroBuscado es el numero que el usuario
     * quiere buscar
    */
    function opcionListaPredeterminadaBinario($numeroBuscado) {
        $lista = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
        $resultado = busquedaBinaria($lista, $numeroBuscado);
        return $resultado;
    }

    /**
     * Funcion para la opcion de algoritmo
     * de ordenacion burbuja con una lista
     * predeterminada
    */
    function opcionListaPredeterminadaBurbuja() {
        $lista = array(4, 7, 5, 10, 6, 2, 8, 3, 1, 9);
        $resultado = burbuja($lista);
        return $resultado;
    }

    function opcionListaPredeterminadaIntercambio() {
        $lista = array(6, 4, 7, 2, 9, 3, 10, 5, 1, 8);
        $resultado = intercambio($lista);
        return $resultado;
    }

    function crearListaRandom() {
        //Guardamos en una variable la cantidad de numero aleatorios solicitados, lo recogemos mediante $_POST
        $numerosRandom = $_POST['numerosRandom'];
        $lista = array();

        //Bucle para generar los numeros aleatorios
        for($x = 0; $x < $numerosRandom; $x++){
            array_push($lista,rand(1, 100));
        }
        return $lista;
    }

    $resultadoFinal = "";
    /**
     * El switch recibe el id de los que tienen el name tipoArray el
     * cual se ha guardado en la variable con el mismo nombre
     * 
     * @param tipoArray es la variable que tiene guardado el id que
     * dentro del switch se comparara con los distintos case
     */
switch($tipoArray){
    case "arrayPredBinario":
        //Guardamos el valor enviado en el formulario
        $numeroBuscado = $_POST['numSearch'];
        //Opcion de la busqueda binaria con una lista predeterminada ordenada
        $resultadoFinal = opcionListaPredeterminadaBinario($numeroBuscado);
        break;
    case "arrayPredBurbuja":
        //Opcion de burbuja con una lista predeterminada desordenada
        $resultadoFinal = opcionListaPredeterminadaBurbuja();
        break;
    case "arrayPredIntercambio":
        //Opcion de intercambio con una lista predeterminada desordenada
        $resultadoFinal = opcionListaPredeterminadaIntercambio();
        break;
    case "arrayRandomBurbuja":
        //Opcion de burbuja pero con una funcion que te dara una lista desordenada
        $resultadoFinal = burbuja(crearListaRandom());
        break;
    case "arrayRandomIntercambio":
        //Opcion de intercambio pero con una funcion que te dara una lista desordenada
        $resultadoFinal = intercambio(crearListaRandom());
        break;
    case "arrayUsuario":
        /**
         * Recogemos el string que envia el formulario para
         * despues guardar los numeros en el array poniendo
         * que los recoga teniendo en cuenta el espacio como separacion
        */
        $numUser = $_POST['numUser'];
        /** 
         * El explode funciona poniendo el separador y luego el
         * string, asi: explode( string $delimiter , string $string)
         * Parece que hay que usar explode en vez de split
        */
        $lista = explode(" ", $numUser);

        $resultadoFinal = burbuja($lista);
        break;
    case "insertarArchivo":
        //Guardamos el archivo insertado en una variable
        $archivo = $_POST['archivo'];
        $lista = array();
        /**
         * Habia pensado en separar los numeros con explode
         * pero no se si aqui se podria hacer.
         */
        echo "Esta opcion no se como hacerla";
        break;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica Algoritmos</title>
</head>
<body>
    <form action="practica.php" method="post">
    <!-- 
        Creo que esto sobra y que las opciones de abajo ya sirve
        para lo que quiera hacer el usuario:

        <label>Elegir el tipo de Algoritmo:</label>
        <br>
        <input type="radio" name="opcionAlgoritmo" id="algoritmoBinario" value="Binario" checked>
        <label for="algoritmoBinario">Binario</label>
        <br>
        <input type="radio" name="opcionAlgoritmo" id="algoritmoBurbuja" value="Burbuja">
        <label for="algoritmoBurbuja">Burbuja</label>
        <br>
        <br>

        -->
        <label>Opcion de algoritmo y tipo de lista:</label>
        <br>
        <input type="radio" name="tipoArray" id="arrayPredBinario" value="arrayPredBinario" checked>
		<label for="arrayPredBinario">Matriz predeterminada para binario: 1, 2, 3, 4, 5, 6, 7, 8, 9, 10 - Di que numero quieres buscar:<label>
        <input type="number" name="numSearch" value = "2">
        <br>
        <input type="radio" name="tipoArray" id="arrayPredBurbuja" value="arrayPredBurbuja">
		<label for="arrayPredBurbuja">Matriz predeterminada para burbuja: 4, 7, 5, 10, 6, 2, 8, 3, 1, 9<label>
        <br>
        <input type="radio" name="tipoArray" id="arrayPredIntercambio" value="arrayPredIntercambio">
		<label for="arrayPredIntercambio">Matriz predeterminada para intercambio: 6, 4, 7, 2, 9, 3, 10, 5, 1, 8<label>
        <br>
		<input type="radio" name="tipoArray" id="arrayRandomBurbuja" value="arrayRandomBurbuja">
		<label for="arrayRandomBurbuja">Di la longitud del array aleatorio que quieres crear para la burbuja:</label>
        <input type="number" name="numerosRandom" value="10">
        <br>
        <input type="radio" name="tipoArray" id="arrayUsuario" value="arrayUsuario">
		<label for="arrayUsuario">Introduce los valores desordenados para el algoritmo burbuja</label>
        <input type="text" name="numUser" placeholder="ej. 4, 7, 5, 10, 6, 2, 8, 3, 1, 9">
        <br>
        <input type="radio" name="tipoArray" id="insertarArchivo" value="insertarArchivo">
        <label for="insertarArchivo">Introduce el archivo(txt, json, xml, etc):</label>
        <input type="file" name="archivo">
        <br>
        <br>
        <input type="submit" name="envioFormulario" value="Enviar" />
        <br>
    </form>
    <section>
    <?php if($resultadoFinal != "") {
        echo "<h2>" . $resultadoFinal . "</h2>";
    }
    ?>
    </section>
</body>
</html>