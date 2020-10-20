<?php
//Busqueda Binaria
$lista = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
//HACER UN WHILE Y DEPUES DOS IF PARA COMPROBAR SI EL NUMERO ES EL DE EN MEDIO Y OTRO PARA VER QUE LADO NOS QUEDAMOS. 
$repeticion = false;
$numeroBuscado = 3;
$indiceAlto = count($lista);
$indiceBajo = 0;
$posicionNumero = 0;
while (!$repeticion) {
    $centro = ($indiceBajo + $indiceAlto)/2;
    if ($centro > $numeroBuscado) {
        $indiceAlto = $centro;
        $indiceBajo = 0;
    } else if ($centro < $numeroBuscado) {
        $indiceAlto = ;
        $indiceBajo = $centro;
    } else {
        echo "El numero a sido encontrado es " . $numeroBuscado . " y esta en la posicion " . $posicionNumero . " de la lista."
    }
}
?>