<?php

    require "../conexion/conexion.php";

    $id = $_POST["id"];
    $texto = $_POST["texto"];
    $a = $_POST["a"];
   
    switch ($a) {
        case 1:
            if ($consulta = $link->query("UPDATE caseta SET nombre ='$texto' WHERE id = $id")) {
                echo "Dato actualizado";
            }else{
                echo "Error al actualizar los datos";
                exit();
            }
            break;
        case 2:
            if ($consulta = $link->query("UPDATE caseta SET carretera ='$texto' WHERE id = $id")) {
                echo "Dato actualizado"; 
            }else{
                echo "Error al actualizar los datos";
                exit();
            }
            break;
        case 3:
            if ($consulta = $link->query("UPDATE caseta SET peaje ='$texto' WHERE id = $id")) {
                echo "Dato actualizado";
            }else{
                echo "Error al actualizar los datos";
                exit();
            }
            break;
    }