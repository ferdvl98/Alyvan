<?php

    require "../conexion/conexion.php";

    $id = $_POST["id"];
    
    $sql = "DELETE FROM chofer WHERE id_chofer=$id";

    if ($link->query($sql) === TRUE) {
        echo "¡Chofer eliminado con exito!";
    } else {
    echo "¡Error al eliminar el producto: " . $conn->error."!";
    }