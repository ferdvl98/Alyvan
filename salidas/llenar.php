<?php 

    require_once "../conexion/conexion.php";

    $cb = $_POST["id"];
    $cliente = "";

    $sql = "SELECT descripcion,  fecha_cad FROM producto WHERE cod_barras = '$cb'";
        $result = $link->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              $cliente = $row["descripcion"]."*". $row["fecha_cad"];
              
            }
            echo $cliente;
        }
