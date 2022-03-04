<?php

  require_once "../conexion/conexion.php";

  $id = $_POST["id"];
  $texto = $_POST["texto"];
  $id2 = $_GET["id2"];
  switch ($id2) {
    case 0:
      $sql = "SELECT * FROM cliente  WHERE nom_cliente = '$texto'";
      $result = $link->query($sql);
      if ($result->num_rows > 0) {
        echo "¡Ese nombre ya existe, intente con otro!";
      }else{
        if($consulta = $link->query("UPDATE cliente SET nom_cliente = '$texto' WHERE `id_cliente` = $id")){
          echo "Dato actualizado";
        }else{
          echo "Error al actualizar los datos ";
          exit();
        } 
      }
      break;
    case 1:
      $sql = "SELECT * FROM cedis  WHERE nom_cliente = '$texto'";
      $result = $link->query($sql);
      if ($result->num_rows > 0) {
        echo "¡Ese nombre ya existe, intente con otro!";
      }else{
        if($consulta = $link->query("UPDATE cedis SET nom_cliente = '$texto' WHERE `id_cliente` = $id")){
          echo "Dato actualizado";
        }else{
          echo "Error al actualizar los datos ";
          exit();
        } 
      }
      break;
      
    case 2:
      $sql = "SELECT * FROM destinos  WHERE nom_cliente = '$texto'";
      $result = $link->query($sql);
      if ($result->num_rows > 0) {
        echo "¡Ese nombre ya existe, intente con otro!";
      }else{
        if($consulta = $link->query("UPDATE destinos SET nom_cliente = '$texto' WHERE `id_cliente` = $id")){
          echo "Dato actualizado";
        }else{
          echo "Error al actualizar los datos ";
          exit();
        } 
      }
      break;
  }

  

?>