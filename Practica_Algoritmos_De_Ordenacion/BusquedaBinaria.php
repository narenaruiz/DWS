<?php
//Busqueda Binaria
$lista = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
echo $lista[4];
//HACER UN WHILE Y DEPUES DOS IF PARA COMPROBAR SI EL NUMERO ES EL DE EN MEDIO Y OTRO PARA VER QUE LADO NOS QUEDAMOS. 
$repeticion = false;

while (!$repeticion) {
    $centro = (0 + count($lista))/2;
    echo $lista[$centro];
}
?>