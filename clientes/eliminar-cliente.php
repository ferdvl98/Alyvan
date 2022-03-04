<?php 
    require_once "../conexion/conexion.php";

    $id = $_POST["id"];

    if($consulta = $link->query("DELETE FROM cliente WHERE `id_cliente` = $id")){
        echo "¡Cliente eliminado con exito!";
      }else{
        echo "¡Ups!¡Error al elimiar cliente! ";
        exit();
      }

?>