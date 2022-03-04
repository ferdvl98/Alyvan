<?php 

    require "../conexion/conexion.php";

    $consulta = $link->query("SELECT p.id_producto, p.descripcion, p.lote, s.fecha_salida, c.nom_cliente as cedis, d.nom_cliente as destino,
     s.tarimas, s.cajas, s.piezas, s.or_pedido, s.factura_rem 
    FROM `aux_salida` as s INNER JOIN producto as p ON s.id_producto = p.id_producto 
    INNER JOIN cedis as c on c.id_cliente = s.id_cedis 
    INNER JOIN destinos as d on d.id_cliente = s.id_destino");

    echo "<table border = '1px' align ='center' id = 'tabla' class='display'>
        <tr>
            <th>Descripción</th>
            <th>Lote</th>
            <th>Salida</th>
            <th>CEDIS</th>
            <th>Destino</th>
            <th>Tarimas</th>
            <th>Cajas</th>
            <th>Piezas</th>
            <th>O. Pedido</th>
            <th>Factura</th>
            <th>Acciones</th>
        </tr>";
    while ($registro = mysqli_fetch_array($consulta)) {
        echo "
        <tr>
        <td>".$registro['descripcion']."</td>
        <td id ='lote' data-id_lote = '".$registro['id_producto']."'contenteditable>".$registro['lote']."</td>
        <td>".$registro['fecha_salida']."</td>
        <td>".$registro['cedis']."</td>
        <td>".$registro['destino']."</td>
        <td>".number_format($registro['tarimas'],0)."</td>
        <td>".number_format($registro['cajas'],0)."</td>
        <td>".number_format($registro['piezas'],0)."</td>
        <td id ='pedido' data-id_pedido = '".$registro['id_producto']."'contenteditable>".$registro['or_pedido']."</td>
        <td id ='factura' data-id_factura = '".$registro['id_producto']."'contenteditable>".$registro['factura_rem']."</td>
        <td><button id ='ver' data-id= '".$registro['id_producto']."' class='fas fa-trash' style='color: #116cb6; border: none; pading: none' data-bs-toggle='modal' data-bs-target='#exampleModal'></button>
        </tr>";
    }
  