<?php
//Algoritmo de ordenación: Burbuja
$lista = array(4, 7, 5, 10, 6, 2, 8, 3, 1, 9);
$listaOrdenada = false;
$lengthLista = count($lista);
$posicionComprobar = 0;
$numeroCambio = 0;

for ($x = 0; $x <= $lengthLista; $x++) {
    $posicionComprobar = $x;
    if ($lista[$posicionComprobar] > $lista[$posicionComprobar + 1]) {
        $numeroCambio = $lista[$posicionComprobar];
        $lista[$posicionComprobar] = $lista[$posicionComprobar + 1];
        $lista[$posicionComprobar + 1] = $numeroCambio;
    }
}
?>