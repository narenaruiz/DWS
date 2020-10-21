<?php
function burbuja ($lista){
    //Algoritmo de ordenación: Burbuja

    //La dejo vacia para que se rellene con lo que reciba la funcion.
    $lista = array();
    $lengthLista = count($lista);
    $numeroCambio = 0;
    /**
    * Si solo pongo el menor la x llegara hasta la
    * posicion 9 y si pongo menor o igual me llegara
    * hasta la posicion 11, por lo tanto tengo que
    * restarle uno para que llegue hasta la posicion 8
    * y por lo tanto pueda sumar 1 para hacer la
    * comprobacion. Y utilizo la 'y' para la resta
    * para que cuando vuelva a pasar llegue hasta
    * una posicion menos ya que el ultimo numero
    * ya estara colocado como el mas grande.
    */
    for ($y = 1; $y < $lengthLista; $y++) {
        for ($x = 0; $x < $lengthLista - $y; $x++) {
            if ($lista[$x] > $lista[$x + 1]) {
                $numeroCambio = $lista[$x];
                $lista[$x] = $lista[$x + 1];
                $lista[$x + 1] = $numeroCambio;
            }
        }
    }
    /*
    Esto es para imprimir la lista de ser necesaria una prueba.
    print_r($lista);
    */
}
?>