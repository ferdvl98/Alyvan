<?php

    require "../conexion/conexion.php";

    $nombre = $_POST["nombre"];
    $rfc = $_POST["rfc"];
    $estado = $_POST["estado"];
    $municipio = $_POST["municipio"];
    $dir = $_POST["dir"];
    $ntel = $_POST["ntel"];

    if(empty(trim($nombre)) || empty(trim($rfc)) || empty(trim($estado)) || empty(trim($municipio)) ||  empty(trim($dir)) || empty(trim($ntel))){
        echo "Debe llenar todos los campos";
    }else{
        $sql = "INSERT INTO chofer (nombre, rfc, id_estado, id_municipio, direccion, ntel)
                VALUES ('$nombre', '$rfc', $estado, $municipio, '$dir', '$ntel')";
        if ($link->query($sql) === TRUE) {
            echo "Datos registrados con exito";
        }else{
            echo "Error al registrar datos";
        }
    }