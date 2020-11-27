<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        function __autoload($nomClase){
            //No es necesaria esta linea
            //$nomclase = str_replace("..", "", $nomClase);
            echo "Nombre de la clase: $nomClase <br>";
            require_once("clases/$nomClase.class.php");
        }
        
        $a = new Persona("Nicolas", "Arena Ruiz", 19);
        $a->mostrarDetalles(); // Enseña la informacion de la clase
        ?>
    </body>
</html>
