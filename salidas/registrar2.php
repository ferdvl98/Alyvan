<?php

$id2 = $_GET["id"];
require "../conexion/conexion.php";
$cedis = $destino =  $prodcuto = $fecha = $tarimas = $cajas = $piezas = $pedido = $factura = $user = "";
$sql5 = "SELECT `id_producto`, `fecha_salida`, `id_cedis`, `id_destino`, `tarimas`, `cajas`, `piezas`, `or_pedido`, `factura_rem`, `id_user` FROM aux_salida";
$result5 = $link->query($sql5);
while ($registro2 = mysqli_fetch_array($result5)) {
    $fecha = $registro2['fecha_salida'];
    $prodcuto = $registro2['id_producto'];
    $cedis = $registro2['id_cedis'];
    $destino = $registro2['id_destino'];
    $tarimas = $registro2['tarimas'];
    $cajas = $registro2['cajas'];
    $piezas = $registro2['piezas'];
    $pedido = $registro2['or_pedido'];
    $factura = $registro2['factura_rem'];
    $user = $registro2['id_user'];


    $sql = "INSERT INTO salida (`id_producto`, `fecha_salida`, `id_cedis`, `id_destino`, `tarimas`, `cajas`, `piezas`, `or_pedido`, `factura_rem`, `id_user`)
                        VALUES ($prodcuto, '$fecha', $cedis, $destino, $tarimas, $cajas, $piezas, '$pedido', '$factura', $user)";
    if ($link->query($sql) === TRUE) {
        $into = mysqli_insert_id($link);
        $consulta2 = $link->query("SELECT id_cedis, id_destino FROM aux_salida");
        while ($registro2 = mysqli_fetch_array($consulta2)) {
            $cedis = $registro2['id_cedis'];
            $destino = $registro2['id_destino'];

            $date = "";
            $time = "";
            $sql = "SELECT CURDATE()";
            $result = $link->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $date = $row["CURDATE()"];
                }
            }

            $sql = "SELECT DATE_FORMAT(NOW( ), '%H:%i:%S' ) as hora";
            $result = $link->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $time = $row["hora"];
                }
            }


            $sql = "INSERT INTO historial (id_user, id_salida, fecha, hora, id_cedis, id_destino)
                                        VALUES ($id2, $into, '$date', '$time', $cedis, $destino)";
            if ($link->query($sql) === TRUE) {
                //echo "Se inserto histrial";
                echo "Salida registrada con exito!";
                mysqli_query($link, "TRUNCATE TABLE aux_salida");
            } else {
                echo "Error updating record: " . $link->error;
            }
        }
    }
}
