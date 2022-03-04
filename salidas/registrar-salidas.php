<?php 
    $id2 = $_GET["id"];
    require "../conexion/conexion.php";

    function si_existe($a, $totsal, $link){
        //require_once "../conexion/conexion.php";
        $rt = 0;
        $consulta = $link->query("SELECT p.`id_producto`, p.`cod_barras`, p.`descripcion`, p.`cajas`,p.`piezas`, p.`fecha_cad`, c.`nom_cliente`,
                             p.`precio` FROM `producto` as p INNER JOIN cliente as c ON c.id_cliente = p.id_cliente;");
        while ($registro = mysqli_fetch_array($consulta)) {
            //echo $cont."  ";
            $total_p = $total_p2 = $piezas2 = $cajas2 = $cajasd = $tpd = 0;
            $piezast = $registro['piezas'];
            $cajas3 = $registro['cajas'];
            //echo $registro['id_producto']."hol ";
            $id = $a;
            
            $consulta2 = $link->query("SELECT tarimas, cajas, piezas, cajas_d as cajasd FROM entrada WHERE id_producto =$id");
            while ($registro2 = mysqli_fetch_array($consulta2)) {
                $cajas = $registro2['cajas'];
                $tarimas = $registro2['tarimas'];
                $piezas = $registro2['piezas'];
                if($cajas != 0 && $tarimas != 0){
                    $total_p += $cajas * $tarimas *$piezas;
                    //echo $total_p;
                }else{
                    $total_p += $piezas;
                } 
                $cajasd += $registro2['cajasd'];
            }
            $tpd = $cajasd*$piezas;
            
            $consulta2 = $link->query("SELECT tarimas, cajas, piezas  FROM salida WHERE id_producto =$id");
            while ($registro2 = mysqli_fetch_array($consulta2)) {
                $cajas = $registro2['cajas'];
                $tarimas = $registro2['tarimas'];
                $piezas = $registro2['piezas'];
                if($cajas != 0 && $tarimas != 0){
                    $total_p2 += $cajas * $tarimas *$piezas;
                    //echo $total_p;
                }else{
                    $total_p2 += $piezas;
                } 
                //$cajasd += $registro2['cajasd'];
            }
            $total_p = $total_p-$total_p2;
            $piezas2 = $total_p/$piezast;
            $cajas2 = $piezas2/$cajas3;
            $total_p = $total_p-$tpd;
            //echo $total_p5;
            if($totsal <= $total_p){
                $rt = 1;
            }else{
                $rt= 0;
            }
            return $rt;

        }
    }
    $id="";
    $cbarras = $_POST["cbarras"];
    $salida = $_POST["salida"];
    $factura = $_POST["factura"];
    $pedido = $_POST["pedido"];
    $tarimas = $_POST["tarimas"];
    $cajas = $_POST["cajas"];
    $piezas = $_POST["piezas"];
    $cedis = $_POST["cedis"];
    $destino = $_POST["destino"];
    $precio = $_POST["precio"];
    $lote = $_POST["lote"];

    if(empty(trim($cbarras)) || empty(trim($salida)) ||
    empty(trim($factura)) || empty(trim($pedido)) || empty(trim($tarimas)) ||
    empty(trim($cajas)) || empty(trim($piezas)) || 
    empty(trim($cedis)) || empty(trim($destino)) || empty(trim($precio)) || empty(trim($lote))){
        echo "Debe llenar todos los campos";
    }else{
        $sql = "SELECT id_producto FROM producto WHERE cod_barras = '$cbarras' and lote = '$lote'";
        $result = $link->query($sql);
        if($result->num_rows > 0){
            while($row = $result -> fetch_assoc()){
                $id = $row["id_producto"];
            }
                $sql = "SELECT id_cliente FROM cedis WHERE nom_cliente = '$cedis'";
                $result = $link->query($sql);
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()) {
                        $cedis = $row["id_cliente"];
                    }

                    $sql = "SELECT id_cliente FROM destinos WHERE nom_cliente = '$destino'";
                    $result = $link->query($sql);
                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()) {
                            $destino = $row["id_cliente"];
                        }
                        $totalsal = $tarimas*$cajas*$piezas;
                        if(si_existe($id, $totalsal, $link) == 1){
                            $sql = "INSERT INTO aux_salida (id_producto, fecha_salida, id_cedis, id_destino, tarimas, cajas, piezas, or_pedido, factura_rem, id_user)
                                    VALUES ($id, '$salida', $cedis, $destino, $tarimas, $cajas, $piezas, '$pedido', '$factura', $id2)";
                            //$result = $link->query($sql);
                            if($link->query($sql) === TRUE){
                                /*echo "Salida registrada con exito!";
                                $into = mysqli_insert_id($link);
                                $date = "";
                                $time = "";
                                $sql = "SELECT CURDATE()";
                                $result = $link->query($sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        $date = $row["CURDATE()"];
                                    }
                                }
            
                                $sql = "SELECT DATE_FORMAT(NOW( ), '%H:%i:%S' ) as hora";
                                $result = $link->query($sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        $time = $row["hora"];
                                    }
                                }

            
                                $sql = "INSERT INTO historial (id_user, id_salida, fecha, hora, id_cedis, id_destino)
                                        VALUES ($id2, $into, '$date', '$time', $cedis, $destino)";
                                if ($link->query($sql) === TRUE) {
                                    //echo "Se inserto histrial";
                                    echo "Salida registrada con exito!";
                                }else {
                                    echo "Error updating record: " . $link->error;
                                }*/
            
                            }
                        }else{
                            echo "¡No hay sufucientes piezas!";
                        }
                    }else{
                        echo "El Destino no esta registrado en el catalogo";
                    }
                }else{
                    echo "El CEDIS no esta registrado en el catalogo";
                }

        }else{
            echo "¡El Código de Barras no coincide con el Lote! Asegurese de que esten escritos correctamente";
        }
    }
