<?php

/**
 * Esta funcion es la que ejecuta la busqueda
 * binaria
 * 
 * @param lista Es el array de numeros que recibe
 * la funcion para hacer la busqueda binaria
 */
function busquedaBinaria($lista){
    $numeroBuscado = 3;
    $numeroEncontrado = false;
    $indiceAlto = count($lista);
    $indiceBajo = 0;
    $posicionNumero = 0;
    while (!$numeroEncontrado) {
        $centro = ($indiceBajo + $indiceAlto)/2;
        if ($centro > $numeroBuscado) {
            $indiceAlto = $centro;
            $indiceBajo = $indiceBajo;
        } else if ($centro < $numeroBuscado) {
            $indiceAlto = $indiceAlto;
            $indiceBajo = $centro;
        } else if ($centro == $numeroBuscado) {
            echo "El numero a sido encontrado es " . $numeroBuscado . " y esta en la posicion " . $centro . " de la lista.";
            $numeroEncontrado = true;
        } else {
            echo "El numero " . $numeroBuscado . " no esta en la lista";
            $numeroEncontrado = true;
        }
    }
}

/**
 * Esta funcion es la que ejecuta el algoritmo de
 * ordenación burbuja
 * 
 * @param lista es la array que recibe para ordenar
 */
function burbuja ($lista){
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
}

/**
 * Funcion para la opcion de busqueda binaria con
 * un array de numeros predeterminado
 * 
 */
function opcionListaPredeterminadaBinario() {
    $lista = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
    busquedaBinaria($lista);
}

/**
 * Funcion para la opcion de algoritmo
 * de ordenacion burbuja con una lista
 * predeterminada
 * 
 */
function opcionListaPredeterminadaBurbuja() {
    $lista = array(4, 7, 5, 10, 6, 2, 8, 3, 1, 9);
    burbuja($lista);
}

?>