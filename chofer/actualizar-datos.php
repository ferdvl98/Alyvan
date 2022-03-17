<?php

    require "../conexion/conexion.php";

    $id = $_POST["id"];
    $texto = $_POST["texto"];
    $a = $_POST["a"];

    switch ($a) {
        case 1:
            if ($consulta = $link->query("UPDATE chofer SET nombre ='$texto' WHERE id_chofer = $id")) {
                echo "Dato actualizado";  
            }else{
                echo "Error al actualizar los datos";
                exit();
            }
            break;
        case 2:
            if ($consulta = $link->query("UPDATE chofer SET rfc ='$texto' WHERE id_chofer = $id")) {
                echo "Dato actualizado";  
            }else{
                echo "Error al actualizar los datos";
                exit();
            }
            break;
        case 3:
            if ($consulta = $link->query("UPDATE chofer SET direccion ='$texto' WHERE id_chofer = $id")) {
                echo "Dato actualizado";  
            }else{
                echo "Error al actualizar los datos";
                exit();
            }
            break;
        case 4:
            if ($consulta = $link->query("UPDATE chofer SET ntel ='$texto' WHERE id_chofer = $id")) {
                echo "Dato actualizado";  
            }else{
                echo "Error al actualizar los datos";
                exit();
            }
            break;  
        case 5:
                if ($consulta = $link->query("UPDATE placas SET placas ='$texto' WHERE id_placas = $id")) {
                    echo "Dato actualizado";  
                }else{
                    echo "Error al actualizar los datos";
                    exit();
                }
                break;
        case 6:
            if ($consulta = $link->query("UPDATE placas SET rendimiento =$texto WHERE id_placas = $id")) {
                echo "Dato actualizado";  
            }else{
                echo "Error al actualizar los datos";
                exit();
                }
            break;                                
    }