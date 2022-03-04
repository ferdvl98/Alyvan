<?php 

    require "../conexion/conexion.php";

    $id = $_POST["id"];
    $texto = $_POST["texto"];
    $a = $_POST["a"];
    //echo $texto;
    switch ($a) {
        case 0:
            if($consulta = $link->query("UPDATE producto SET descripcion = '$texto' WHERE `id_producto` = $id")){
                echo "Dato actualizado";
            }else{
                echo "Error al actualizar los datos ";
                exit();
            } 
            break;
        case 1:
            $texto2 = explode(",",$texto);
            $cont = count($texto2);
            $texto = "";
            for ($i=0; $i < $cont; $i++) { 
                $texto = $texto."".$texto2[$i];
            }

            if($consulta = $link->query("UPDATE producto SET cajas = $texto WHERE `id_producto` = $id")){
                echo "Dato actualizado";
            }else{
                echo "Error al actualizar los datos ";
                exit();
            } 
            break;
        case 2:
            $texto2 = explode(",",$texto);
            $cont = count($texto2);
            $texto = "";
            for ($i=0; $i < $cont; $i++) { 
                $texto = $texto."".$texto2[$i];
            }
            if($consulta = $link->query("UPDATE producto SET precio = $texto WHERE `id_producto` = $id")){
                echo "Dato actualizado";
            }else{
                echo "Error al actualizar los datos ";
                exit();
            } 
            break;
    }


?>