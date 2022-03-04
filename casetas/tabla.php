<?php 

    require "../conexion/conexion.php";

    $consulta = $link->query("SELECT c.`id`, c.`nombre`, e.nombre as estado, c.`carretera`, c.`peaje` FROM `caseta` as c 
    INNER JOIN estados2 as e on c.estado = e.id order by e.nombre;");

    echo "<table border = '1px' style ='width:1000px' align ='center' id = 'tabla' class='display'>
        <tr>
            <th>Caseta</th>
            <th>Estado</th>
            <th>Cerretera</th>
            <th>Peaje</th>
            <th>Acciones</th>
        </tr>";
    
        while ($registro = mysqli_fetch_array($consulta)) {
            echo "
            <tr>
            <td id ='lote' data-id_lote = '".$registro['id']."'contenteditable>".$registro['nombre']."</td>
            <td id ='lote' data-id_lote = '".$registro['id']."'>".$registro['estado']."</td>
            <td id ='lote' data-id_lote = '".$registro['id']."'contenteditable>".$registro['carretera']."</td>
            <td id ='lote' data-id_lote = '".$registro['id']."'contenteditable>".number_format($registro['peaje'],2)."</td>
            <td><button id ='ver' data-id= '".$registro['id']."' class='fas fa-trash' style='color: #116cb6; border: none; pading: none' data-bs-toggle='modal' data-bs-target='#exampleModal'></button>
            </tr>";
        }