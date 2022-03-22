<?php
$id2 = $_GET["id"];
require_once "../conexion/conexion.php";
$A = 140;
$B = 120;
$C = 100;
$aux = 0;
$a = $b = $c = 0;
$tarimasB = $cajasB = $piezasB = "";
$uploadfile = $_FILES['uploadfile']['tmp_name'];
echo "Dentro";
if (!empty($uploadfile)) {
    require "../phpexcel/PHPExcel.php";
    require_once "../phpexcel/PHPExcel/IOFactory.php";
    //echo "1";
    try {
        $objExcel = PHPExcel_IOFactory::load($uploadfile);
        //echo "2";
    } catch (Exception $e) {
    }

    $objExcel->setActiveSheetIndex(0);
    //echo "3";
    $numRows = $objExcel->setActiveSheetIndex(0)->getHighestRow();
    $numCol = $objExcel->setActiveSheetIndex(0)->getHighestColumn();
    //echo "filas: ". $numRows." - columnas: ".$numCol;
    $num = 3;
    while ($num <= $numRows) {
        //echo $num;
        $cbarras = $objExcel->getActiveSheet()->getCell('A' . ($num))->getCalculatedValue();
        $año = $objExcel->getActiveSheet()->getCell('B' . ($num))->getCalculatedValue();
        $mes = $objExcel->getActiveSheet()->getCell('C' . ($num))->getCalculatedValue();
        $dia = $objExcel->getActiveSheet()->getCell('D' . ($num))->getCalculatedValue();
        $entrada = $año . "-" . $mes . "-" . $dia;
        //echo $entrada." -";
        $descripcion = $objExcel->getActiveSheet()->getCell('E' . ($num))->getCalculatedValue();
        $lote = $objExcel->getActiveSheet()->getCell('F' . ($num))->getCalculatedValue();
        $factura = $objExcel->getActiveSheet()->getCell('G' . ($num))->getCalculatedValue();
        $tarimas = $objExcel->getActiveSheet()->getCell('H' . ($num))->getCalculatedValue();
        $cajas = $objExcel->getActiveSheet()->getCell('I' . ($num))->getCalculatedValue();
        $piezas = $objExcel->getActiveSheet()->getCell('J' . ($num))->getCalculatedValue();
        $precio = $objExcel->getActiveSheet()->getCell('K' . ($num))->getCalculatedValue();
        $cajas_rpt = $objExcel->getActiveSheet()->getCell('L' . ($num))->getCalculatedValue();
        $cajas_D = $objExcel->getActiveSheet()->getCell('M' . ($num))->getCalculatedValue();
        $año2 = $objExcel->getActiveSheet()->getCell('N' . ($num))->getCalculatedValue();
        $mes2 = $objExcel->getActiveSheet()->getCell('O' . ($num))->getCalculatedValue();
        $dia2 = $objExcel->getActiveSheet()->getCell('P' . ($num))->getCalculatedValue();
        $caducidad = $año2 . "-" . $mes2 . "-" . $dia2;
        $cliente = $objExcel->getActiveSheet()->getCell('Q' . ($num))->getCalculatedValue();
        $venta = $objExcel->getActiveSheet()->getCell('R' . ($num))->getCalculatedValue();
        $pos = $objExcel->getActiveSheet()->getCell('S' . ($num))->getCalculatedValue();
        
        if (
            empty($cbarras) || empty($año) || empty($mes) || empty($dia) || empty($descripcion) || empty($lote) || empty($factura) || empty($tarimas) ||
            empty($cajas)  || empty($piezas) || empty($precio) || empty($cliente) || empty($venta) || empty($cajas_rpt)
        ) {
            //Si el código de barras está vacío no hacer nada
            //echo "registros vacios";
        } else {
            $sql = "SELECT * FROM producto WHERE cod_barras = '$cbarras' and lote = '$lote'";
            $result = $link->query($sql);
            if ($result->num_rows > 0) {
                //echo "Ya existe";
                //el código de barras ya existe
                while ($row = $result->fetch_assoc()) {
                    $id = $row["id_producto"];
                    $sql = "INSERT INTO entrada (id_producto, factura_rem, tarimas, cajas, piezas,cajas_d, fecha_entrada,  id_user)
                        VALUES ($id, '$factura', $tarimas, $cajas, $piezas,$cajas_D,'$entrada', $id2)";
                    if ($link->query($sql) === TRUE) {
                        //echo "Se inerto entrada";
                        $into = mysqli_insert_id($link);

                        //echo "Se actualizco producto";
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

                        $sql = "SELECT id_cliente FROM cliente WHERE nom_cliente = '$cliente'";
                        $result = $link->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $cliente = $row["id_cliente"];
                            }
                        }
                        $sql = "INSERT INTO `historial`( `id_user`, `id_entrada`,`fecha`,`hora`,`id_cliente`) 
                                        VALUES ($id2,$into,'$date', '$time', $cliente)";
                        if ($link->query($sql) === TRUE) {
                            //echo "Se inserto histrial";
                            echo "¡Entrada registrada con exito!";
                        } else {
                            echo "Error updating record: " . $link->error;
                        }
                    } else {
                        echo "Error updating record: " . $link->error;
                    }
                }
            } else {
                //El producto es nuevo
                $sql = "SELECT * FROM producto WHERE cod_barras = '$cbarras'";
                $result = $link->query($sql);
                if ($result->num_rows > 0) {
                    echo "El codigo de barras existe pero el lote no";
                    while ($row = $result->fetch_assoc()) {
                        $cliente = $row["id_cliente"];
                        $descripcion = $row["descripcion"];
                        $caducidad = $row["fecha_cad"];
                        $precio = $row["precio"];
                        $cajas_rpt = $row["cajas"];
                    }


                    $sql = "INSERT INTO producto (cod_barras,lote, descripcion,tarimas, cajas, piezas, fecha_cad, id_cliente, precio, venta, lugar)
                    VALUES ('$cbarras', '$lote', '$descripcion',$tarimas,  $cajas_rpt,$piezas ,'$caducidad', $cliente, $precio, $venta, $pos)";
                    if ($link->query($sql) === TRUE) {
                        $id = mysqli_insert_id($link);
                        $sql = "INSERT INTO entrada (id_producto, factura_rem, tarimas, cajas, piezas,cajas_d, fecha_entrada,  id_user)
                            VALUES ($id, '$factura', $tarimas, $cajas, $piezas,$cajas_D,'$entrada', $id2)";
                        if ($link->query($sql) === TRUE) {
                            $into = mysqli_insert_id($link);
                            $date = "";
                            $time = "";
                            $sql = "select CURDATE()";
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
                            $sql = "INSERT INTO `historial`( `id_user`, `id_entrada`,`fecha`,`hora`, `id_cliente`) VALUES ($id2,$into,'$date', '$time', $cliente);";
                            if ($link->query($sql) === TRUE) {
                                echo "¡Entrada registrada con exito!";
                            } else {
                                echo "Error updating record: " . $link->error;
                            }
                        } else {
                            echo "Error al registrar entrada: " . $sql . "<br>" . $link->error;
                        }
                    } else {
                        echo "Error al registrar producto : " . $sql . "<br>" . $link->error;
                    }
                } else {
                    echo "El codigo de barras no existe";
                    $sql = "SELECT id_cliente FROM cliente WHERE nom_cliente = '$cliente'";
                    $result = $link->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $cliente = $row["id_cliente"];
                        }

                        $sql = "INSERT INTO producto (cod_barras,lote, descripcion,tarimas, cajas, piezas, fecha_cad, id_cliente, precio, venta, lugar)
                    VALUES ('$cbarras', '$lote', '$descripcion',$tarimas,  $cajas_rpt,$piezas ,'$caducidad', $cliente, $precio, $venta, $pos)";
                        if ($link->query($sql) === TRUE) {
                            $id = mysqli_insert_id($link);
                            $sql = "INSERT INTO entrada (id_producto, factura_rem, tarimas, cajas, piezas,cajas_d, fecha_entrada,  id_user)
                            VALUES ($id, '$factura', $tarimas, $cajas, $piezas,$cajas_D,'$entrada', $id2)";
                            if ($link->query($sql) === TRUE) {
                                $into = mysqli_insert_id($link);
                                $date = "";
                                $time = "";
                                $sql = "select CURDATE()";
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
                                $sql = "INSERT INTO `historial`( `id_user`, `id_entrada`,`fecha`,`hora`, `id_cliente`) VALUES ($id2,$into,'$date', '$time', $cliente);";
                                if ($link->query($sql) === TRUE) {
                                    echo "¡Entrada registrada con exito!";
                                } else {
                                    echo "Error updating record: " . $link->error;
                                }
                            } else {
                                echo "Error al registrar entrada: " . $sql . "<br>" . $link->error;
                            }
                        } else {
                            echo "Error al registrar producto : " . $sql . "<br>" . $link->error;
                        }
                    } else {
                        echo "¡El cliente no existe!";
                    }
                }
            }
        }
        $num += 1;
    }
?>
    <script type="text/javascript">
        alert("Registros Guardados");
        window.location = "entradas.php?id=<?php echo $id; ?>";
    </script>
<?php
} else {
?>
    <script type="text/javascript">
        alert("Hoja de Trabajo Incorrecta");
        window.location = "entradas.php?id=<?php echo $id; ?>";
    </script>
<?php
}

?>