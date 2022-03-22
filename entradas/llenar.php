<?php 

    $datos = $cliente = "";
    require_once "../conexion/conexion.php";

    $cb = $_POST["id"];

    $sql = "SELECT descripcion, fecha_cad, precio, id_cliente, cajas, lugar FROM producto WHERE cod_barras = '$cb'";
        $result = $link->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              $datos = $row["descripcion"]."*". $row["fecha_cad"]."*". $row["precio"]."*".$row["cajas"]."*".$row["lugar"];
              $cliente =$row["id_cliente"];
              $sql = "SELECT nom_cliente FROM cliente WHERE id_cliente = $cliente";
              $result = $link->query($sql);
              if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  $cliente =$row["nom_cliente"];
                }}
               $datos= $datos."*".$cliente;
            }
        }

      echo $datos;

?>