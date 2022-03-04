<?php 
    $id2 = $_GET["id"];
    require_once "../conexion/conexion.php";
    $A = 160; $B = 120; $C = 120;
    $a = $b = $c = 0;
    $tarimasB = $cajasB = $piezasB = "";
    $entrada = $_POST["entrada"];
    $cbarras = $_POST["cbarras"];
    

    if (isset($_POST["lote"])){
        $lote = $_POST["lote"];
    }else{
        $lote = "N/A";
    }
    if (isset($_POST["ob"])){
        $ob = $_POST["ob"];
    }else{
        $ob = "";
    }

    if (isset($_POST["cajas_rpt"])){
        $cajas_rpt = $_POST["cajas_rpt"];
    }else{
        $cajas_rpt = 0;
    }
    
    if (isset($_POST["descripcion"])) {
        $descripcion = $_POST["descripcion"];
    }else{
        $descripcion = "j";
    }
    $factura = $_POST["factura"];
    if (isset($_POST["tarimas"])) {
        $tarimas = $_POST["tarimas"];
    }else{
        $tarimas = 0;
    }
    if (isset($_POST["cajas"])) {
        $cajas = $_POST["cajas"];
    }else{
        $cajas = 0;
    }
    
    $cajas_d = $_POST["cajas_d"];
    $piezas = $_POST["piezas"];
    if (isset($_POST["caducidad"])) {
        $caducidad = $_POST["caducidad"];
    }else{
        $caducidad = "i";
    }
    if (isset($_POST["cliente"])) {
        $cliente = $_POST["cliente"];
    }else{
        $cliente = "i";
    }
    if (isset($_POST["precio"])) {
        $precio = $_POST["precio"];
    }else{
        $precio = "i";
    }
    $venta = "";
    if (isset($_POST["venta"])) {
        $venta = 1;
    }else{
        $venta = 0;
    }   
    

    if(empty(trim($entrada)) || empty(trim($cbarras)) || empty(trim($descripcion)) || empty(trim($factura)) ||  
     empty(trim($cliente)) || empty(trim($precio))){
        echo "Debe llenar todos los campos";
    }else{
        $sql = "SELECT id_producto FROM producto WHERE cod_barras = '$cbarras' and lote = '$lote'";
        $result = $link->query($sql);
        if ($result->num_rows > 0) {
            //El producto ya existe
            while($row = $result->fetch_assoc()) {
                $id = $row["id_producto"];
                $sql = "INSERT INTO entrada (id_producto, factura_rem, tarimas, cajas, piezas,cajas_d, fecha_entrada,  id_user, venta, obervaciones)
                VALUES ($id, '$factura', $tarimas, $cajas, $piezas,$cajas_d,'$entrada', $id2, '$venta', '$ob')";
                if ($link->query($sql) === TRUE) {
                    $into = mysqli_insert_id($link);
                    //echo "Se inerto entrada";
                        //echo "Se actualizco producto";
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
                            
                            $sql = "SELECT id_cliente FROM producto WHERE id_producto = $id";
                            $result = $link->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    $cliente = $row["id_cliente"];
                                }
                                
                            }
                            //echo "Cliente ".$cliente." - - ";
                        $sql = "INSERT INTO `historial`( `id_user`, `id_entrada`,`fecha`,`hora`,`id_cliente`) 
                        VALUES ($id2,$into,'$date', '$time', $cliente)";
                        //echo $id2." ".$into." ".$date." ".$time." ".$cliente;
                        if ($link->query($sql) === TRUE) {
                            //echo "Se inserto histrial";
                            echo "¡Entrada registrada con exito!";
                        }else {
                            echo "Error updating record: " . $link->error;
                        }

                }else {
                    echo "Error updating record: " . $link->error;
                }
            }
            
        }else{
            //El producto es nuevo
            $sql = "SELECT * FROM producto WHERE cod_barras = '$cbarras'";
            $result = $link->query($sql);
            if ($result->num_rows > 0) {
                //echo "El codigo de barras existe pero el lote no";
                while($row = $result->fetch_assoc()) {
                    $cliente = $row["id_cliente"];
                    $descripcion = $row["descripcion"];
                    $caducidad = $row["fecha_cad"];
                    $precio = $row["precio"];
                    $cajas_rpt = $row["cajas"];
                }
    

                    $sql = "INSERT INTO producto (cod_barras,lote, descripcion,tarimas, cajas, piezas, fecha_cad, id_cliente, precio)
                    VALUES ('$cbarras', '$lote', '$descripcion',$tarimas,  $cajas_rpt,$piezas ,'$caducidad', $cliente, $precio)";
                        if ($link->query($sql) === TRUE) {
                            $id = mysqli_insert_id($link);
                            $sql = "INSERT INTO entrada (id_producto, factura_rem, tarimas, cajas, piezas,cajas_d, fecha_entrada,  id_user, venta, obervaciones)
                            VALUES ($id, '$factura', $tarimas, $cajas, $piezas,$cajas_d,'$entrada', $id2, '$venta', '$ob')";
                            if ($link->query($sql) === TRUE) {
                                $into = mysqli_insert_id($link);
                                        $date = "";
                                        $time = "";
                                        $sql = "select CURDATE()";
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
                                        $sql = "INSERT INTO `historial`( `id_user`, `id_entrada`,`fecha`,`hora`, `id_cliente`) VALUES ($id2,$into,'$date', '$time', $cliente);";
                                        if ($link->query($sql) === TRUE) {
                                            echo "¡Entrada registrada con exito!";
                                        }else {
                                            echo "Error updating record: " . $link->error;
                                        }
                            }else{
                                echo "Error al registrar entrada: " . $sql . "<br>" . $link->error;
                            }
                        } else {
                            echo "Error al registrar producto : " . $sql . "<br>" . $link->error;
                        }

            }else{
                //echo "El codigo de barras no existe";
                $sql = "SELECT id_cliente FROM cliente WHERE nom_cliente = '$cliente'";
                $result = $link->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $cliente = $row["id_cliente"];
                    }

                    $sql = "INSERT INTO producto (cod_barras,lote, descripcion,tarimas, cajas, piezas, fecha_cad, id_cliente, precio)
                    VALUES ('$cbarras', '$lote', '$descripcion',$tarimas,  $cajas_rpt,$piezas ,'$caducidad', $cliente, $precio)";
                        if ($link->query($sql) === TRUE) {
                            $id = mysqli_insert_id($link);
                            $sql = "INSERT INTO entrada (id_producto, factura_rem, tarimas, cajas, piezas,cajas_d, fecha_entrada,  id_user, venta, obervaciones)
                            VALUES ($id, '$factura', $tarimas, $cajas, $piezas,$cajas_d,'$entrada', $id2, '$venta', '$ob')";
                            if ($link->query($sql) === TRUE) {
                                $into = mysqli_insert_id($link);
                                        $date = "";
                                        $time = "";
                                        $sql = "select CURDATE()";
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
                                        $sql = "INSERT INTO `historial`( `id_user`, `id_entrada`,`fecha`,`hora`, `id_cliente`) VALUES ($id2,$into,'$date', '$time', $cliente);";
                                        if ($link->query($sql) === TRUE) {
                                            echo "¡Entrada registrada con exito!";
                                        }else {
                                            echo "Error updating record: " . $link->error;
                                        }
                            }else{
                                echo "Error al registrar entrada: " . $sql . "<br>" . $link->error;
                            }
                        } else {
                            echo "Error al registrar producto : " . $sql . "<br>" . $link->error;
                        }
                }else{
                    echo "¡El cliente no existe!";
                }
            }
        }
    }
