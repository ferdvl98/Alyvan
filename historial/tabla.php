<?php

    require_once "../conexion/conexion.php";
    $accion = "";

    $consulta = $link->query("SELECT h.fecha, h.hora, h.id_entrada, h.id_salida, h.id_cedis, h.id_destino, u.nombre as nombre, c.nom_cliente FROM `historial` AS h 
    INNER JOIN usuarios AS u ON h.id_user = u.id_usuario 
    INNER JOIN cliente AS c ON h.id_cliente = c.id_cliente 
    UNION 
    SELECT h.fecha, h.hora, h.id_entrada, h.id_salida, h.id_cedis, h.id_destino, u.nombre, c.nom_cliente as nombre FROM `historial` AS h 
    INNER JOIN cedis AS c ON c.id_cliente = h.id_cedis 
    INNER JOIN destinos AS d ON d.id_cliente = h.id_destino 
    INNER JOIN usuarios AS u ON h.id_user = u.id_usuario;");

    echo "<table border = '1px' align ='center' id = 'tabla' class='display'>
        <tr>
            <th style='width: 8%'>Fecha</th>
            <th style='width: 5%'>Hora</th>
            <th style='width: 70%'>Acción</th>
            <th style='width: 17%'>Usuario</th>
        </tr>

    ";

    while ($registro = mysqli_fetch_array($consulta)) {
        if($registro['id_entrada']!=null){
            $tarimas = $cajas = $piezas = "";
            $ide = $registro['id_entrada'];
            $sql = $link->query("SELECT tarimas, cajas, piezas FROM `entrada` WHERE id_entrada = $ide");
            while ($reg = mysqli_fetch_array($sql)) {
                    $tarimas = $reg['tarimas'];
                    $cajas = $reg['cajas'];
                    $piezas = $reg['piezas'];
            }
            $accion = "Entrarón <b>".number_format($tarimas,2)."</b> tarimas de <b>".number_format($cajas,2)."</b> cajas de <b>".number_format($piezas,2)."</b> piezas de <b>".$registro['nom_cliente']."</b>";
        }else if($registro['id_salida']!=null){
            $tarimas = $cajas = $piezas = $cedis = $destino = $cliente = "";
            $ide = $registro['id_salida'];
            $sql = $link->query("SELECT s.tarimas, s.cajas, s.piezas, c.nom_cliente as cedis, d.nom_cliente as destino FROM salida as s 
            INNER JOIN cedis as c on c.id_cliente = s.id_cedis 
            INNER JOIN destinos as d ON d.id_cliente = s.id_destino WHERE id_salida = $ide");
            while ($reg = mysqli_fetch_array($sql)) {
                $tarimas = $reg['tarimas'];
                $cajas = $reg['cajas'];
                $piezas = $reg['piezas'];
                $cedis = $reg['cedis'];
                $destino = $reg['destino'];
            }
            $sql = $link->query("SELECT c.nom_cliente FROM salida as s 
            INNER JOIN producto as p on s.id_producto = p.id_producto 
            INNER JOIN cliente as c on p.id_cliente = c.id_cliente WHERE s.id_salida = $ide");
            while ($reg = mysqli_fetch_array($sql)) {
                $cliente = $reg['nom_cliente'];
            }
            $accion = "Salierón <b>".number_format($tarimas,2)."</b> tarimas, <b>".number_format($cajas,2)." </b> cajas, <b>".number_format($piezas,2)."</b> piezas
            de  <b>".$cliente."</b> hacía  <b>".$cedis." ".$destino."</b>";
        }


        echo "  
        <tr>
            <td>".$registro['fecha']."</td>
            <td>".$registro['hora']."</td>
            <td>".$accion."</td>
            <td>".$registro['nombre']."</td>
        </tr>";
    }
?>