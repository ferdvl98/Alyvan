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
            <th>Eliminar</th>
        </tr>";
    
        while ($registro = mysqli_fetch_array($consulta)) {
            echo "
            <tr>
            <td id ='nombre2' data-id_nombre2 = '".$registro['id_chofer']."'contenteditable>".$registro['nombre']."</td>
            <td id ='rfc2' data-id_rfc2 = '".$registro['id_chofer']."'contenteditable>".$registro['rfc']."</td>
            <td id ='estado2' data-id_estado2 = '".$registro['id_chofer']."'>".$registro['estado']."</td>
            <td id ='municipio2' data-id_municipio2 = '".$registro['id_chofer']."'>".$registro['municipio']."</td>
            <td id ='dirección2' data-id_dirección2 = '".$registro['id_chofer']."'contenteditable>".$registro['direccion']."</td>
            <td id ='telefóno2' data-id_telefóno2 = '".$registro['id_chofer']."'contenteditable>".$registro['ntel']."</td>
            <td><button id ='acciones' data-id= '".$registro['id_chofer']."' class='fas fa-trash' style='color: #116cb6; border: none; pading: none' data-bs-toggle='modal' data-bs-target='#exampleModal'></button>
            </tr>";
        }