<?php

    require "../conexion/conexion.php";

    $id = $_POST["id"];
    
    $sql = "DELETE FROM producto WHERE id_producto=$id";

    if ($link->query($sql) === TRUE) {
        echo "¡Producto eliminado con exito!";
    } else {
    echo "¡Error al eliminar el producto: " . $conn->error."!";
    }