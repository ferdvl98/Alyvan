<?php

    require "../conexion/conexion.php";

    $nombre = $_POST["nombre"];
    $estado = $_POST["estado"];
    $carretera = $_POST["carretera"];
    $peaje = $_POST["peaje"];
    //echo "hola";
    if(empty(trim($nombre)) || $estado == 0 || empty(trim($carretera)) || empty(trim($peaje))){
        echo "Debe llenar todos los campos";
    }else{
        $sql = "INSERT INTO caseta ( `nombre`, `estado`, `carretera`, `peaje`)
                VALUES ('$nombre', $estado, '$carretera', $peaje)";
        if($link -> query($sql)=== TRUE){
            echo "Caseta registrada con exito";
        }
    }