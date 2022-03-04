<?php

    require "../conexion/conexion.php";

    $consulta = $link->query("SELECT c.id_chofer, c.nombre, c.rfc, c.direccion, e.nombre as estado, m.nombre as municipio, c.ntel FROM `chofer` as c 
    INNER JOIN estados2 as e ON c.id_estado = e.id 
    INNER JOIN municipios2 as m ON c.id_municipio = m.id;");

    echo "<table border = '1px' style ='width:1150px' align ='center' id = 'tabla' class='display'>
        <tr>
            <th>Nombre</th>
            <th>RFC</th>
            <th>Estado</th>
            <th>Municipio</th>
            <th>Dirección</th>
            <th>Telefóno</th>
        </tr>";
    
        while ($registro = mysqli_fetch_array($consulta)) {
            echo "
            <tr>
            <td id ='lote' data-id_lote = '".$registro['id_chofer']."'contenteditable>".$registro['nombre']."</td>
            <td id ='lote' data-id_lote = '".$registro['id_chofer']."'contenteditable>".$registro['rfc']."</td>
            <td id ='lote' data-id_lote = '".$registro['id_chofer']."'>".$registro['estado']."</td>
            <td id ='lote' data-id_lote = '".$registro['id_chofer']."'>".$registro['municipio']."</td>
            <td id ='lote' data-id_lote = '".$registro['id_chofer']."'contenteditable>".$registro['direccion']."</td>
            <td id ='lote' data-id_lote = '".$registro['id_chofer']."'contenteditable>".$registro['ntel']."</td>
            </tr>";
        }