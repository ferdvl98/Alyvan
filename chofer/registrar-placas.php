<?php

    require "../conexion/conexion.php";

    $placas = $_POST["placas"];
    $rend = $_POST["rendimiento"];

    if(empty(trim($placas)) || empty(trim($rend))){
        echo "Debe llenar todos los campos";
    }else{
        $sql = "INSERT INTO placas (placas, rendimiento)
                VALUES ('$placas',$rend)";
        if ($link->query($sql) === TRUE) {
            echo "Datos registrados con exito";
        }else{
            echo "Error al registrar datos";
        }
    }

