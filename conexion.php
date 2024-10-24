<?php
    $servidor = "localhost";
    $usuario = "root";
    $clave = "";
    $bd = "basedatos";

    $conexion = mysqli_connect($servidor,$usuario,$clave) or die ('Noencontro el servidor.');
    mysqli_select_db($conexion,$bd) or die ('No encontro la base de datos.');
    mysqli_set_charset($conexion,"utf8");
    // Prueba
    // echo"Se conecto correctamente.";


?>