<?php
function busquedaBinaria(){
    //Busqueda Binaria
    $lista = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
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
            $posicionNumero = $centro;
            echo "El numero a sido encontrado es " . $numeroBuscado . " y esta en la posicion " . $posicionNumero . " de la lista.";
            $numeroEncontrado = true;
        } else {
            echo "El numero " . $numeroBuscado . " no esta en la lista";
            $numeroEncontrado = true;
        }
    }
}
?>