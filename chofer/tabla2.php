<?php

    require "../conexion/conexion.php";

    $consulta = $link->query("SELECT * FROM placas");

    echo "<table border = '1px' style ='width:400px' align ='center' id = 'tabla' class='display'>
        <tr>
            <th>Placas</th>
            <th>Rendimiento</th>
        </tr>";

        while ($registro = mysqli_fetch_array($consulta)) {
            echo "
            <tr>
            <td id ='placas' data-id_placas = '".$registro['id_placas']."'contenteditable>".$registro['placas']."</td>
            <td id ='rendimiento' data-id_rendimiento = '".$registro['id_placas']."'contenteditable>".number_format($registro['rendimiento'],2)."</td>
            </tr>";
        }