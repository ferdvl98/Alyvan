<?php 

require_once "../conexion/conexion.php";
$id = $_POST["id"];
$id2 = $_POST["id2"];
$consulta = $link->query("SELECT descripcion FROM producto WHERE id_producto = $id");
while ($registro = mysqli_fetch_array($consulta)) {
    echo "".$registro['descripcion'];
}
 //echo $id2;
switch ($id2) {
    case 0:
        $consulta = $link->query("SELECT fecha_entrada as fecha, factura_rem, tarimas, cajas, piezas  FROM entsal WHERE id_producto = $id");
        echo "<table border = '1px' align ='center' id = 'tabla' class='display' style='width: 600px'>
        <tr>
            <th>Fecha</th>
            <th>Factura</th>
            <th>Tarimas</th>
            <th>Cajas</th>
            <th>Piezas</th>
        </tr>
        ";
        while ($registro = mysqli_fetch_array($consulta)) {

        echo "
            <tr>
            <td>".$registro['fecha']."</td> 
            <td>".$registro['factura_rem']."</td> 
            <td>".number_format($registro['tarimas'],1)."</td> 
            <td>".number_format($registro['cajas'],1)."</td> 
            <td>".number_format($registro['piezas'],0)."</td> 
            </tr>";
        }
        break;
    case 1;
        $consulta = $link->query("SELECT id_entrada, fecha_entrada as fecha, factura_rem, tarimas, cajas, cajas_d, piezas, venta, obervaciones  FROM entrada WHERE id_producto = $id");
        echo "<table border = '1px' align ='center' id = 'tabla' class='display' style='width: 600px'>
        <tr>
            <th>Fecha</th>
            <th>Factura</th>
            <th>Tarimas</th>
            <th>Cajas</th>
            <th>Dañadas</th>
            <th>Piezas</th>
            <th>Venta</th>
            <th>Observaciones</th>
        </tr>
        ";
        while ($registro = mysqli_fetch_array($consulta)) {
            $venta = "";
            if($registro['venta']=='1'){
                $venta = "Sí";
            }else{
                $venta = "No";
            }
            echo "
            <tr>
            <td>".$registro['fecha']."</td> 
            <td>".$registro['factura_rem']."</td> 
            <td>".number_format($registro['tarimas'],1)."</td> 
            <td>".number_format($registro['cajas'],1)."</td> 
            <td id ='cd' data-id_cd = '".$registro['id_entrada']."' contenteditable>".number_format($registro['cajas_d'],1)."</td> 
            <td>".number_format($registro['piezas'],0)."</td>
            <td>".$venta."</td> 
            <td id ='des' data-id_des = '".$registro['id_entrada']."' contenteditable>".$registro['obervaciones']."</td>  
            </tr>";
        }
        break;
    case 2:
        $consulta = $link->query("SELECT s.fecha_salida as fecha, s.factura_rem, s.tarimas, s.cajas, s.piezas, c.nom_cliente as cedis, d.nom_cliente as destino  FROM salida as s 
        INNER JOIN cedis as c ON c.id_cliente = s.id_cedis INNER JOIN destinos as d ON d.id_cliente = s.id_destino WHERE id_producto = $id");
        echo "<table border = '1px' align ='center' id = 'tabla' class='display' style='width: 600px'>
        <tr>
            <th>Fecha</th>
            <th>Factura</th>
            <th>Tarimas</th>
            <th>Cajas</th>
            <th>Piezas</th>
            <th>CEDIS</th>
            <th>Destino</th>
        </tr>
        ";
        while ($registro = mysqli_fetch_array($consulta)) {

            echo "
            <tr>
            <td>".$registro['fecha']."</td> 
            <td>".$registro['factura_rem']."</td> 
            <td>".number_format($registro['tarimas'],1)."</td> 
            <td>".number_format($registro['cajas'],1)."</td> 
            <td>".number_format($registro['piezas'],0)."</td> 
            <td>".$registro['cedis']."</td>
            <td>".$registro['destino']."</td>
            </tr>";
        }
        break;
}





?>