<?php

    require_once "../conexion/conexion.php";

    $id = $_GET["id"];
    //echo $id;
    switch ($id) {
        case 0:
            $consulta = $link->query("SELECT * FROM cliente");
            echo "<table border = '1px' align ='center' id = 'tabla' class='display'>
            <tr>
                <th style='width: 10%'>Código</th>
                <th style='width: 70%'>Cliente</th>
                <th>Acciones</th>
            </tr>";
            break;
        case 1:
            $consulta = $link->query("SELECT * FROM cedis");
            echo "<table border = '1px' align ='center' id = 'tabla' class='display'>
            <tr>
                <th style='width: 10%'>Código</th>
                <th style='width: 70%'>CEDIS</th>
                <th>Acciones</th>
            </tr>";
            break;
        case 2:
            $consulta = $link->query("SELECT * FROM destinos");
            echo "<table border = '1px' align ='center' id = 'tabla' class='display'>
            <tr>
                <th style='width: 10%'>Código</th>
                <th style='width: 70%'>Destino</th>
                <th>Acciones</th>
            </tr>";
            break;
    }

    while ($registro = mysqli_fetch_array($consulta)) {

    echo "  
    <tr>
    <td>".$registro['id_cliente']."</td>
    <td id ='nombre' data-id_nombre = '".$registro['id_cliente']."'contenteditable>".$registro['nom_cliente']."</td> 
    <td align='center'><button id ='eliminar' data-id= '".$registro['id_cliente']."' class='fas fa-trash' style='color: #116cb6; border: none;'></button></td>
    </tr>";
    }
?>