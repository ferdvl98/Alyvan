<?php 
    require_once "../conexion/conexion.php";

    $n_cli = $_POST["n_cliente"];
    $id = $_GET["id"];

    if(empty(trim($n_cli))){
        echo "Debe escribir el nombre del Cliente";
    }else{
        switch ($id) {
            case 0:
                $sql = "SELECT id_cliente FROM cliente WHERE nom_cliente = '$n_cli'";
                $result = $link->query($sql);
                if ($result->num_rows > 0) {
                    echo "El cliente que intenta agregar ya está registrado";
                }else{
                    if($consulta = $link->query("INSERT INTO cliente (nom_cliente) VALUES ('$n_cli')")){
                        echo "Cliente Agregado";
                    }else {
                        echo "Error al agregar Cliente";
                    }
                }
                break;
            case 1:
                $sql = "SELECT id_cliente FROM cedis WHERE nom_cliente = '$n_cli'";
                $result = $link->query($sql);
                if ($result->num_rows > 0) {
                    echo "El CEDIS que intenta agregar ya está registrado";
                }else{
                    if($consulta = $link->query("INSERT INTO cedis (nom_cliente) VALUES ('$n_cli')")){
                        echo "CEDIS Agregado";
                    }else {
                        echo "Error al agregar CEDIS";
                    }
                }
                break;
            case 2:
                $sql = "SELECT id_cliente FROM destinos WHERE nom_cliente = '$n_cli'";
                $result = $link->query($sql);
                if ($result->num_rows > 0) {
                    echo "El Destino que intenta agregar ya está registrado";
                }else{
                    if($consulta = $link->query("INSERT INTO destinos (nom_cliente) VALUES ('$n_cli')")){
                        echo "Destino Agregado";
                    }else {
                        echo "Error al agregar Destino";
                    }
                }
                break;
        }
        
    }
?>