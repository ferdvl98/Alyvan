<?php

    require_once "../conexion/conexion.php";
    $id5 = $_POST['id5'];
    $nombre = $_POST["id"];
    $clie = $_POST["cli"];
    $oder = $_POST["ord"];
    $totalcajas = $totaltarimas = 0;
   //echo $clie."-".$oder;
    switch($id5){
        case 0:
            if(empty(trim($nombre))){
                if($clie>0){
                    switch ($oder) {
                        case 0:
                            $consulta = $link->query("SELECT p.`id_producto`, p.`cod_barras`, p.`descripcion`, p.`lote`, p.`cajas`,p.`piezas`, p.`fecha_cad`, c.`nom_cliente`,
                            p.`precio`, p.lugar FROM `producto` as p INNER JOIN cliente as c ON c.id_cliente = p.id_cliente WHERE p.id_cliente = $clie");
                            break;
                        case 1:
                            $consulta = $link->query("SELECT p.`id_producto`, p.`cod_barras`, p.`descripcion`,   p.`lote`, p.`cajas`,p.`piezas`, p.`fecha_cad`, c.`nom_cliente`,
                            p.`precio`, p.lugar FROM `producto` as p INNER JOIN cliente as c ON c.id_cliente = p.id_cliente WHERE p.id_cliente = $clie ORDER BY  p.`descripcion` ASC");
                            break;
                        case 2:
                            $consulta = $link->query("SELECT p.`id_producto`, p.`cod_barras`, p.`descripcion`,  p.`lote`, p.`cajas`,p.`piezas`, p.`fecha_cad`, c.`nom_cliente`,
                            p.`precio`, p.lugar FROM `producto` as p INNER JOIN cliente as c ON c.id_cliente = p.id_cliente WHERE p.id_cliente = $clie ORDER BY  p.`descripcion` DESC");
                            break;
                        case 3:
                            $consulta = $link->query("SELECT p.`id_producto`, p.`cod_barras`, p.`descripcion`,  p.`lote`, p.`cajas`,p.`piezas`, p.`fecha_cad`, c.`nom_cliente`,
                            p.`precio`, p.lugar  FROM `producto` as p INNER JOIN cliente as c ON c.id_cliente = p.id_cliente WHERE p.id_cliente = $clie ORDER BY  p.`precio` ASC");
                            break;
                        case 4:
                            $consulta = $link->query("SELECT p.`id_producto`, p.`cod_barras`, p.`descripcion`,  p.`lote`, p.`cajas`,p.`piezas`, p.`fecha_cad`, c.`nom_cliente`,
                            p.`precio`, p.lugar  FROM `producto` as p INNER JOIN cliente as c ON c.id_cliente = p.id_cliente WHERE p.id_cliente = $clie ORDER BY  p.`precio` DESC");
                            break;
                    } 
                }else{
                    switch ($oder) {
                        case 0:
                            $consulta = $link->query("SELECT p.`id_producto`, p.`cod_barras`, p.`descripcion`,  p.`lote`, p.`cajas`,p.`piezas`, p.`fecha_cad`, c.`nom_cliente`,
                            p.`precio`, p.lugar  FROM `producto` as p INNER JOIN cliente as c ON c.id_cliente = p.id_cliente;");
                            break;
                        case 1:
                            $consulta = $link->query("SELECT p.`id_producto`, p.`cod_barras`, p.`descripcion`,  p.`lote`, p.`cajas`,p.`piezas`, p.`fecha_cad`, c.`nom_cliente`,
                            p.`precio`, p.lugar  FROM `producto` as p INNER JOIN cliente as c ON c.id_cliente = p.id_cliente ORDER BY  p.`descripcion` ASC");
                            break;
                        case 2:
                            $consulta = $link->query("SELECT p.`id_producto`, p.`cod_barras`, p.`descripcion`,  p.`lote`, p.`cajas`,p.`piezas`, p.`fecha_cad`, c.`nom_cliente`,
                            p.`precio`, p.lugar  FROM `producto` as p INNER JOIN cliente as c ON c.id_cliente = p.id_cliente ORDER BY  p.`descripcion` DESC");
                            break;
                        case 3:
                            $consulta = $link->query("SELECT p.`id_producto`, p.`cod_barras`, p.`descripcion`,  p.`lote`, p.`cajas`,p.`piezas`, p.`fecha_cad`, c.`nom_cliente`,
                            p.`precio`, p.lugar  FROM `producto` as p INNER JOIN cliente as c ON c.id_cliente = p.id_cliente ORDER BY  p.`precio` ASC");
                            break;
                        case 4:
                            $consulta = $link->query("SELECT p.`id_producto`, p.`cod_barras`, p.`descripcion`,  p.`lote`, p.`cajas`,p.`piezas`, p.`fecha_cad`, c.`nom_cliente`,
                            p.`precio`, p.lugar  FROM `producto` as p INNER JOIN cliente as c ON c.id_cliente = p.id_cliente ORDER BY  p.`precio` DESC");
                            break;
                    }  
                }
            }else{
                if($clie>0){
                    switch ($oder) {
                        case 0:
                            $consulta = $link->query("SELECT p.`id_producto`, p.`cod_barras`, p.`descripcion`,  p.`lote`, p.`cajas`,p.`piezas`, p.`fecha_cad`, c.`nom_cliente`,
                            p.`precio`, p.lugar  FROM `producto` as p INNER JOIN cliente as c ON c.id_cliente = p.id_cliente
                            WHERE p.id_cliente = $clie AND (p.`cod_barras` LIKE '%$nombre%' OR p.`descripcion` LIKE '%$nombre%' OR c.`nom_cliente` LIKE '%$nombre%');");
                            break;
                        case 1:
                            $consulta = $link->query("SELECT p.`id_producto`, p.`cod_barras`, p.`descripcion`,  p.`lote`, p.`cajas`,p.`piezas`, p.`fecha_cad`, c.`nom_cliente`,
                            p.`precio`, p.lugar  FROM `producto` as p INNER JOIN cliente as c ON c.id_cliente = p.id_cliente
                            WHERE p.id_cliente = $clie AND (p.`cod_barras` LIKE '%$nombre%' OR p.`descripcion` LIKE '%$nombre%' OR c.`nom_cliente` LIKE '%$nombre%') ORDER BY  p.`descripcion` ASC;");
                            break;
                        case 2:
                            $consulta = $link->query("SELECT p.`id_producto`, p.`cod_barras`, p.`descripcion`,  p.`lote`, p.`cajas`,p.`piezas`, p.`fecha_cad`, c.`nom_cliente`,
                            p.`precio`, p.lugar  FROM `producto` as p INNER JOIN cliente as c ON c.id_cliente = p.id_cliente
                            WHERE p.id_cliente = $clie AND (p.`cod_barras` LIKE '%$nombre%' OR p.`descripcion` LIKE '%$nombre%' OR c.`nom_cliente` LIKE '%$nombre%') ORDER BY  p.`descripcion` DESC;");
                            break;
                        case 1:
                            $consulta = $link->query("SELECT p.`id_producto`, p.`cod_barras`, p.`descripcion`,  p.`lote`, p.`cajas`,p.`piezas`, p.`fecha_cad`, c.`nom_cliente`,
                            p.`precio`, p.lugar  FROM `producto` as p INNER JOIN cliente as c ON c.id_cliente = p.id_cliente
                            WHERE p.id_cliente = $clie AND (p.`cod_barras` LIKE '%$nombre%' OR p.`descripcion` LIKE '%$nombre%' OR c.`nom_cliente` LIKE '%$nombre%') ORDER BY  p.`precio` ASC;");
                            break;
                        case 1:
                            $consulta = $link->query("SELECT p.`id_producto`, p.`cod_barras`, p.`descripcion`,  p.`lote`, p.`cajas`,p.`piezas`, p.`fecha_cad`, c.`nom_cliente`,
                            p.`precio`, p.lugar  FROM `producto` as p INNER JOIN cliente as c ON c.id_cliente = p.id_cliente
                            WHERE p.id_cliente = $clie AND (p.`cod_barras` LIKE '%$nombre%' OR p.`descripcion` LIKE '%$nombre%' OR c.`nom_cliente` LIKE '%$nombre%') ORDER BY  p.`precio` DESC;");
                            break;
                    }
                    
                }else{
                    switch ($oder) {
                        case 0:
                            $consulta = $link->query("SELECT p.`id_producto`, p.`cod_barras`, p.`descripcion`,  p.`lote`, p.`cajas`,p.`piezas`, p.`fecha_cad`, c.`nom_cliente`,
                            p.`precio`, p.lugar  FROM `producto` as p INNER JOIN cliente as c ON c.id_cliente = p.id_cliente
                            WHERE p.`cod_barras` LIKE '%$nombre%' OR p.`descripcion` LIKE '%$nombre%' OR c.`nom_cliente` LIKE '%$nombre%';");
                            break;
                        case 1:
                            $consulta = $link->query("SELECT p.`id_producto`, p.`cod_barras`, p.`descripcion`,  p.`lote`, p.`cajas`,p.`piezas`, p.`fecha_cad`, c.`nom_cliente`,
                            p.`precio`, p.lugar  FROM `producto` as p INNER JOIN cliente as c ON c.id_cliente = p.id_cliente
                            WHERE p.`cod_barras` LIKE '%$nombre%' OR p.`descripcion` LIKE '%$nombre%' OR c.`nom_cliente` LIKE '%$nombre%' ORDER BY  p.`descripcion` ASC;");
                            break;
                        case 2:
                            $consulta = $link->query("SELECT p.`id_producto`, p.`cod_barras`, p.`descripcion`,  p.`lote`, p.`cajas`,p.`piezas`, p.`fecha_cad`, c.`nom_cliente`,
                            p.`precio`, p.lugar  FROM `producto` as p INNER JOIN cliente as c ON c.id_cliente = p.id_cliente
                            WHERE p.`cod_barras` LIKE '%$nombre%' OR p.`descripcion` LIKE '%$nombre%' OR c.`nom_cliente` LIKE '%$nombre%' ORDER BY  p.`descripcion` DESC;");
                            break;
                        case 3:
                            $consulta = $link->query("SELECT p.`id_producto`, p.`cod_barras`, p.`descripcion`,  p.`lote`, p.`cajas`,p.`piezas`, p.`fecha_cad`, c.`nom_cliente`,
                            p.`precio`, p.lugar  FROM `producto` as p INNER JOIN cliente as c ON c.id_cliente = p.id_cliente
                            WHERE p.`cod_barras` LIKE '%$nombre%' OR p.`descripcion` LIKE '%$nombre%' OR c.`nom_cliente` LIKE '%$nombre%' ORDER BY  p.`precio` ASC;");
                            break;
                        case 4:
                            $consulta = $link->query("SELECT p.`id_producto`, p.`cod_barras`, p.`descripcion`,  p.`lote`, p.`cajas`,p.`piezas`, p.`fecha_cad`, c.`nom_cliente`,
                            p.`precio`, p.lugar  FROM `producto` as p INNER JOIN cliente as c ON c.id_cliente = p.id_cliente
                            WHERE p.`cod_barras` LIKE '%$nombre%' OR p.`descripcion` LIKE '%$nombre%' OR c.`nom_cliente` LIKE '%$nombre%' ORDER BY  p.`precio` DESC;");
                            break;
                    }
                }
            }
            echo "<table border = '1px'style ='width:1100px'  align ='center' id = 'tabla2' class='display'>

            <tr>    
                <th style='font-size:90%;'>Código de Barras</th>
                <th>Descripción</th>
                <th>Lote</th>
                <th style='font-size:90%;'>Cajas por Tarima</th>
                <th>Piezas</th>
                <th>Cajas</th>
                <th>Tarimas</th>
                <th>Posición</th>
                <th>Cliente</th>
                <th style='font-size:90%;'>Precio Unitario</th>
                <th>ACCIONES</th>
            </tr>

        ";
        //$cont = 1;
        while ($registro = mysqli_fetch_array($consulta)) {
            //echo $cont."  ";
            $total_p = $total_p2 = $piezas2 = $cajas2 = $cajasd = 0;
            $piezast = $registro['piezas'];
            $cajas3 = $registro['cajas'];
            //echo $registro['id_producto']."hol ";
            $id = $registro['id_producto'];
            
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

            $consulta3 = $link->query("SELECT tarimas, cajas, piezas  FROM salida WHERE id_producto =$id");
            while ($registro3 = mysqli_fetch_array($consulta3)) {
                $cajas2 = $registro3['cajas'];
                $tarimas2 = $registro3['tarimas'];
                $piezas2 = $registro3['piezas'];
                if($cajas2 != 0 && $tarimas2 != 0){
                    $total_p2 += $cajas2 * $tarimas2 *$piezas2;
                    //echo $total_p;
                }else{
                    $total_p2 += $piezas2;
                } 
                //$cajasd += $registro2['cajasd'];
            }
            $total_p = $total_p-$total_p2;
            $piezas2 = $total_p/$piezast;
            $cajas2 = $piezas2/$cajas3;
            $total_p2 = $total_p- ($cajasd*$piezast);
            $totalcajas += $piezas2;
            $totaltarimas += $cajas2;

            echo "
            <tbody>
            <tr>
            <td>".$registro['cod_barras']."</td> 
            <td id ='nombre' data-id_nombre = '".$registro['id_producto']."'contenteditable>".$registro['descripcion']."</td>
            <td id ='nombre' data-id_nombre = '".$registro['id_producto']."'>".$registro['lote']."</td>
            <td id ='cajas' data-id_cajas = '".$registro['id_producto']."'contenteditable>".number_format($registro['cajas'],2)."</td>
            
            <td id ='total' data-id_total = '".$registro['id_producto']."'>".number_format($total_p2,0)."</td>
            <td id ='piezas' data-id_piezas = '".$registro['id_producto']."'>".number_format($piezas2,3)."</td>
            <td id ='cajas2' data-id_cajas2 = '".$registro['id_producto']."'>".number_format($cajas2,2)."</td>
            <td id ='lugar' data-id_lugar = '".$registro['id_producto']."'contenteditable>".$registro['lugar']."</td>
            <td id ='cliente' data-id_cliente = '".$registro['id_producto']."'>".$registro['nom_cliente']."</td>
            <td id ='precio' data-id_precio = '".$registro['id_producto']."'contenteditable>".number_format($registro['precio'],2)."</td>
            <td><button id ='ver' data-id= '".$registro['id_producto']."' class='fas fa-eye' style='color: #116cb6; border: none; pading: none' data-bs-toggle='modal' data-bs-target='#exampleModal'></button>
            <button id ='delete' data-id= '".$registro['id_producto']."' class='fas fa-trash-alt' style='color: #116cb6; border: none; pading: none'></button></td>
            </tr>
            </tbody>";
        //$cont++;
        }
       
        break;


        
    case 1:
        if(empty(trim($nombre))){
            if($clie>0){
                switch ($oder) {
                    case 0:
                        $consulta = $link->query("SELECT p.`id_producto`, p.`cod_barras`, p.`descripcion`, p.`lote`, p.`cajas`,p.`piezas`, p.`fecha_cad`, c.`nom_cliente`,
                        p.`precio`, p.lugar FROM `producto` as p INNER JOIN cliente as c ON c.id_cliente = p.id_cliente INNER JOIN entrada as e ON e.id_producto = p.id_producto WHERE p.id_cliente = $clie AND e.cajas_d > 0");
                        break;
                    case 1:
                        $consulta = $link->query("SELECT p.`id_producto`, p.`cod_barras`, p.`descripcion`,   p.`lote`, p.`cajas`,p.`piezas`, p.`fecha_cad`, c.`nom_cliente`,
                        p.`precio`, p.lugar FROM `producto` as p INNER JOIN cliente as c ON c.id_cliente = p.id_cliente INNER JOIN entrada as e ON e.id_producto = p.id_producto  WHERE p.id_cliente = $clie  AND e.cajas_d > 0 ORDER BY  p.`descripcion` ASC");
                        break;
                    case 2:
                        $consulta = $link->query("SELECT p.`id_producto`, p.`cod_barras`, p.`descripcion`,  p.`lote`, p.`cajas`,p.`piezas`, p.`fecha_cad`, c.`nom_cliente`,
                        p.`precio`, p.lugar FROM `producto` as p INNER JOIN cliente as c ON c.id_cliente = p.id_cliente INNER JOIN entrada as e ON e.id_producto = p.id_producto WHERE p.id_cliente = $clie    AND e.cajas_d > 0 ORDER BY  p.`descripcion` DESC");
                        break;
                    case 3:
                        $consulta = $link->query("SELECT p.`id_producto`, p.`cod_barras`, p.`descripcion`,  p.`lote`, p.`cajas`,p.`piezas`, p.`fecha_cad`, c.`nom_cliente`,
                        p.`precio`, p.lugar  FROM `producto` as p INNER JOIN cliente as c ON c.id_cliente = p.id_cliente INNER JOIN entrada as e ON e.id_producto = p.id_producto WHERE p.id_cliente = $clie  AND e.cajas_d > 0 ORDER BY  p.`precio` ASC");
                        break;
                    case 4:
                        $consulta = $link->query("SELECT p.`id_producto`, p.`cod_barras`, p.`descripcion`,  p.`lote`, p.`cajas`,p.`piezas`, p.`fecha_cad`, c.`nom_cliente`,
                        p.`precio`, p.lugar  FROM `producto` as p INNER JOIN cliente as c ON c.id_cliente = p.id_cliente INNER JOIN entrada as e ON e.id_producto = p.id_producto WHERE p.id_cliente = $clie  AND e.cajas_d > 0 ORDER BY  p.`precio` DESC");
                        break;
                } 
            }else{
                switch ($oder) {
                    case 0:
                        $consulta = $link->query("SELECT p.`id_producto`, p.`cod_barras`, p.`descripcion`,  p.`lote`, p.`cajas`,p.`piezas`, p.`fecha_cad`, c.`nom_cliente`,
                        p.`precio`, p.lugar  FROM `producto` as p INNER JOIN cliente as c ON c.id_cliente = p.id_cliente INNER JOIN entrada as e ON e.id_producto = p.id_producto WHERE e.cajas_d > 0;");
                        break;
                    case 1:
                        $consulta = $link->query("SELECT p.`id_producto`, p.`cod_barras`, p.`descripcion`,  p.`lote`, p.`cajas`,p.`piezas`, p.`fecha_cad`, c.`nom_cliente`,
                        p.`precio`, p.lugar  FROM `producto` as p INNER JOIN cliente as c ON c.id_cliente = p.id_cliente INNER JOIN entrada as e ON e.id_producto = p.id_producto WHERE e.cajas_d > 0 ORDER BY  p.`descripcion` ASC");
                        break;
                    case 2:
                        $consulta = $link->query("SELECT p.`id_producto`, p.`cod_barras`, p.`descripcion`,  p.`lote`, p.`cajas`,p.`piezas`, p.`fecha_cad`, c.`nom_cliente`,
                        p.`precio`, p.lugar  FROM `producto` as p INNER JOIN cliente as c ON c.id_cliente = p.id_cliente INNER JOIN entrada as e ON e.id_producto = p.id_producto WHERE e.cajas_d > 0 ORDER BY  p.`descripcion` DESC");
                        break;
                    case 3:
                        $consulta = $link->query("SELECT p.`id_producto`, p.`cod_barras`, p.`descripcion`,  p.`lote`, p.`cajas`,p.`piezas`, p.`fecha_cad`, c.`nom_cliente`,
                        p.`precio`, p.lugar  FROM `producto` as p INNER JOIN cliente as c ON c.id_cliente = p.id_cliente INNER JOIN entrada as e ON e.id_producto = p.id_producto WHERE e.cajas_d > 0 ORDER BY  p.`precio` ASC");
                        break;
                    case 4:
                        $consulta = $link->query("SELECT p.`id_producto`, p.`cod_barras`, p.`descripcion`,  p.`lote`, p.`cajas`,p.`piezas`, p.`fecha_cad`, c.`nom_cliente`,
                        p.`precio`, p.lugar  FROM `producto` as p INNER JOIN cliente as c ON c.id_cliente = p.id_cliente INNER JOIN entrada as e ON e.id_producto = p.id_producto WHERE e.cajas_d > 0 ORDER BY  p.`precio` DESC");
                        break;
                }  
            }
        }else{
            if($clie>0){

                switch ($oder) {
                    case 0:
                        $consulta = $link->query("SELECT p.`id_producto`, p.`cod_barras`, p.`descripcion`,  p.`lote`, p.`cajas`,p.`piezas`, p.`fecha_cad`, c.`nom_cliente`,
                        p.`precio`, p.lugar  FROM `producto` as p INNER JOIN cliente as c ON c.id_cliente = p.id_cliente INNER JOIN entrada as e ON e.id_producto = p.id_producto 
                        WHERE p.id_cliente = $clie AND (p.`cod_barras` LIKE '%$nombre%' OR p.`descripcion` LIKE '%$nombre%' OR c.`nom_cliente` LIKE '%$nombre%') AND e.cajas_d > 0;");
                        break;
                    case 1:
                        $consulta = $link->query("SELECT p.`id_producto`, p.`cod_barras`, p.`descripcion`,  p.`lote`, p.`cajas`,p.`piezas`, p.`fecha_cad`, c.`nom_cliente`,
                        p.`precio`, p.lugar  FROM `producto` as p INNER JOIN cliente as c ON c.id_cliente = p.id_cliente INNER JOIN entrada as e ON e.id_producto = p.id_producto 
                        WHERE p.id_cliente = $clie AND (p.`cod_barras` LIKE '%$nombre%' OR p.`descripcion` LIKE '%$nombre%' OR c.`nom_cliente` LIKE '%$nombre%')  AND e.cajas_d > 0 ORDER BY  p.`descripcion` ASC;");
                        break;
                    case 2:
                        $consulta = $link->query("SELECT p.`id_producto`, p.`cod_barras`, p.`descripcion`,  p.`lote`, p.`cajas`,p.`piezas`, p.`fecha_cad`, c.`nom_cliente`,
                        p.`precio`, p.lugar  FROM `producto` as p INNER JOIN cliente as c ON c.id_cliente = p.id_cliente INNER JOIN entrada as e ON e.id_producto = p.id_producto 
                        WHERE p.id_cliente = $clie AND (p.`cod_barras` LIKE '%$nombre%' OR p.`descripcion` LIKE '%$nombre%' OR c.`nom_cliente` LIKE '%$nombre%') AND e.cajas_d > 0 ORDER BY  p.`descripcion` DESC;");
                        break;
                    case 1:
                        $consulta = $link->query("SELECT p.`id_producto`, p.`cod_barras`, p.`descripcion`,  p.`lote`, p.`cajas`,p.`piezas`, p.`fecha_cad`, c.`nom_cliente`,
                        p.`precio`, p.lugar  FROM `producto` as p INNER JOIN cliente as c ON c.id_cliente = p.id_cliente INNER JOIN entrada as e ON e.id_producto = p.id_producto 
                        WHERE p.id_cliente = $clie AND (p.`cod_barras` LIKE '%$nombre%' OR p.`descripcion` LIKE '%$nombre%' OR c.`nom_cliente` LIKE '%$nombre%') AND e.cajas_d > 0 ORDER BY  p.`precio` ASC;");
                        break;
                    case 1:
                        $consulta = $link->query("SELECT p.`id_producto`, p.`cod_barras`, p.`descripcion`,  p.`lote`, p.`cajas`,p.`piezas`, p.`fecha_cad`, c.`nom_cliente`,
                        p.`precio`, p.lugar  FROM `producto` as p INNER JOIN cliente as c ON c.id_cliente = p.id_cliente INNER JOIN entrada as e ON e.id_producto = p.id_producto 
                        WHERE p.id_cliente = $clie AND (p.`cod_barras` LIKE '%$nombre%' OR p.`descripcion` LIKE '%$nombre%' OR c.`nom_cliente` LIKE '%$nombre%') AND e.cajas_d > 0 ORDER BY  p.`precio` DESC;");
                        break;
                }
                
            }else{
                switch ($oder) {
                    case 0:
                        $consulta = $link->query("SELECT p.`id_producto`, p.`cod_barras`, p.`descripcion`,  p.`lote`, p.`cajas`,p.`piezas`, p.`fecha_cad`, c.`nom_cliente`,
                        p.`precio`, p.lugar  FROM `producto` as p INNER JOIN cliente as c ON c.id_cliente = p.id_cliente INNER JOIN entrada as e ON e.id_producto = p.id_producto 
                        WHERE p.`cod_barras` LIKE '%$nombre%' OR p.`descripcion` LIKE '%$nombre%' OR c.`nom_cliente` LIKE '%$nombre%' AND e.cajas_d > 0;");
                        break;
                    case 1:
                        $consulta = $link->query("SELECT p.`id_producto`, p.`cod_barras`, p.`descripcion`,  p.`lote`, p.`cajas`,p.`piezas`, p.`fecha_cad`, c.`nom_cliente`,
                        p.`precio`, p.lugar  FROM `producto` as p INNER JOIN cliente as c ON c.id_cliente = p.id_cliente INNER JOIN entrada as e ON e.id_producto = p.id_producto 
                        WHERE p.`cod_barras` LIKE '%$nombre%' OR p.`descripcion` LIKE '%$nombre%' OR c.`nom_cliente` LIKE '%$nombre%' AND e.cajas_d > 0 ORDER BY  p.`descripcion` ASC;");
                        break;
                    case 2:
                        $consulta = $link->query("SELECT p.`id_producto`, p.`cod_barras`, p.`descripcion`,  p.`lote`, p.`cajas`,p.`piezas`, p.`fecha_cad`, c.`nom_cliente`,
                        p.`precio`, p.lugar  FROM `producto` as p INNER JOIN cliente as c ON c.id_cliente = p.id_cliente INNER JOIN entrada as e ON e.id_producto = p.id_producto 
                        WHERE p.`cod_barras` LIKE '%$nombre%' OR p.`descripcion` LIKE '%$nombre%' OR c.`nom_cliente` LIKE '%$nombre%' AND e.cajas_d > 0 ORDER BY  p.`descripcion` DESC;");
                        break;
                    case 3:
                        $consulta = $link->query("SELECT p.`id_producto`, p.`cod_barras`, p.`descripcion`,  p.`lote`, p.`cajas`,p.`piezas`, p.`fecha_cad`, c.`nom_cliente`,
                        p.`precio`, p.lugar  FROM `producto` as p INNER JOIN cliente as c ON c.id_cliente = p.id_cliente INNER JOIN entrada as e ON e.id_producto = p.id_producto 
                        WHERE p.`cod_barras` LIKE '%$nombre%' OR p.`descripcion` LIKE '%$nombre%' OR c.`nom_cliente` LIKE '%$nombre%'AND e.cajas_d > 0 ORDER BY  p.`precio` ASC;");
                        break;
                    case 4:
                        $consulta = $link->query("SELECT p.`id_producto`, p.`cod_barras`, p.`descripcion`,  p.`lote`, p.`cajas`,p.`piezas`, p.`fecha_cad`, c.`nom_cliente`,
                        p.`precio`, p.lugar  FROM `producto` as p INNER JOIN cliente as c ON c.id_cliente = p.id_cliente INNER JOIN entrada as e ON e.id_producto = p.id_producto 
                        WHERE p.`cod_barras` LIKE '%$nombre%' OR p.`descripcion` LIKE '%$nombre%' OR c.`nom_cliente` LIKE '%$nombre%'AND e.cajas_d > 0 ORDER BY  p.`precio` DESC;");
                        break;
                }
            }
        }
        echo "<table border = '1px'style ='width:1100px'  align ='center' id = 'tabla' class='display'>
        <tr>
            <th style='font-size:90%;'>Código de Barras</th>
            <th>Descripción</th>
            <th>Lote</th>
            <th style='font-size:90%;'>Cajas por Tarima</th>
            
            <th>Piezas</th>
            <th>Cajas</th>
            <th>Tarimas</th>
            <th>Posición</th>
            <th>Cliente</th>
            <th style='font-size:90%;'>Precio Unitario</th>
            <th>ACCIONES</th>
        </tr>
    ";
    //$cont = 1;
    while ($registro = mysqli_fetch_array($consulta)) {
        //echo $cont."  ";
        $total_p = $total_p2 = $piezas2 = $cajas2 = $cajasd = 0;
        $piezast = $registro['piezas'];
        $cajas3 = $registro['cajas'];
        //echo $registro['id_producto']."hol ";
        $id = $registro['id_producto'];
        
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

        $consulta3 = $link->query("SELECT tarimas, cajas, piezas  FROM salida WHERE id_producto =$id");
        while ($registro3 = mysqli_fetch_array($consulta3)) {
            $cajas2 = $registro3['cajas'];
            $tarimas2 = $registro3['tarimas'];
            $piezas2 = $registro3['piezas'];
            if($cajas2 != 0 && $tarimas2 != 0){
                $total_p2 += $cajas2 * $tarimas2 *$piezas2;
                //echo $total_p;
            }else{
                $total_p2 += $piezas2;
            } 
            //$cajasd += $registro2['cajasd'];
        }
        $total_p = $total_p-$total_p2;
        $piezas2 = $total_p/$piezast;
        $cajas2 = $piezas2/$cajas3;
        $total_p2 = $total_p- ($cajasd*$piezast);

    echo "
    <tr>
    <td>".$registro['cod_barras']."</td> 
    <td id ='nombre' data-id_nombre = '".$registro['id_producto']."'contenteditable>".$registro['descripcion']."</td>
    <td id ='nombre' data-id_nombre = '".$registro['id_producto']."'>".$registro['lote']."</td>
        <td id ='cajas' data-id_cajas = '".$registro['id_producto']."'contenteditable>".number_format($registro['cajas'],2)."</td>
        
        <td id ='total' data-id_total = '".$registro['id_producto']."'>".number_format($total_p2,0)."</td>
        <td id ='piezas' data-id_piezas = '".$registro['id_producto']."'>".number_format($piezas2,3)."</td>
        <td id ='cajas2' data-id_cajas2 = '".$registro['id_producto']."'>".number_format($cajas2,2)."</td>
        <td id ='lugar' data-id_lugar = '".$registro['id_producto']."'contenteditable>".$registro['lugar']."</td>
        <td id ='cliente' data-id_cliente = '".$registro['id_producto']."'>".$registro['nom_cliente']."</td>
        <td id ='precio' data-id_precio = '".$registro['id_producto']."'contenteditable>".number_format($registro['precio'],2)."</td>
        <td><button id ='ver' data-id= '".$registro['id_producto']."' class='fas fa-eye' style='color: #116cb6; border: none; pading: none' data-bs-toggle='modal' data-bs-target='#exampleModal'></button>
        <button id ='delet2' data-id= '".$registro['id_producto']."' class='fas fa-trash-alt' style='color: #116cb6; border: none; pading: none'data-bs-toggle='modal' data-bs-target='#exampleModal2'></button></td>
        </tr>";
    //$cont++;
    }

        break;
    }
    if($clie>0){
        ?>
        <div class="as">
            
            <b>Cajas: </b>
            <b name="total"> <?php echo number_format($totalcajas, 2); ?></b>
            <b>Tarimas: </b>
            <b name="total"> <?php echo number_format($totaltarimas, 3 ); ?></b>
            

        </div>
        <?php
    }

?>