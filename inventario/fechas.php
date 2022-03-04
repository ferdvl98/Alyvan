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
        echo "<table border = '1px' align ='center' id = 'tabla' class='display' style='width: 450px'>
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
            <td>".number_format($registro['tarimas'],2)."</td> 
            <td>".number_format($registro['cajas'],2)."</td> 
            <td>".number_format($registro['piezas'],0)."</td> 
            </tr>";
        }
        break;
    case 1;
        $consulta = $link->query("SELECT fecha_entrada as fecha, factura_rem, tarimas, cajas, piezas, venta, obervaciones  FROM entrada WHERE id_producto = $id");
        echo "<table border = '1px' align ='center' id = 'tabla' class='display' style='width: 450px'>
        <tr>
            <th>Fecha</th>
            <th>Factura</th>
            <th>Tarimas</th>
            <th>Cajas</th>
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
            <td>".number_format($registro['tarimas'],2)."</td> 
            <td>".number_format($registro['cajas'],2)."</td> 
            <td>".number_format($registro['piezas'],0)."</td>
            <td>".$venta."</td> 
            <td>".$registro['obervaciones']."</td>  
            </tr>";
        }
        break;
    case 2:
        $consulta = $link->query("SELECT fecha_salida as fecha, factura_rem, tarimas, cajas, piezas  FROM salida WHERE id_producto = $id");
        echo "<table border = '1px' align ='center' id = 'tabla' class='display' style='width: 450px'>
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
            <td>".number_format($registro['tarimas'],2)."</td> 
            <td>".number_format($registro['cajas'],2)."</td> 
            <td>".number_format($registro['piezas'],0)."</td> 
            </tr>";
        }
        break;
}





?>