<?php

  require_once "../conexion/conexion.php";

    $slc = $_POST["id"];
    $id = $_POST["a"];
    $total_p = $total_p2 = $total = 0 ;
    switch($slc){
        case 0:
            //Total $ de productos en buen estado
            if($id==0){
                //echo "$ sin cliente";
                $consulta = $link->query("SELECT id_producto, precio FROM producto");
                while ($registro = mysqli_fetch_array($consulta)) {
                    $total_p = $total_p2 =0;
                    $idp = $registro["id_producto"];
                    $pre = $registro["precio"];
                    //echo $idp."/";
                    $consulta2 = $link->query("SELECT tarimas, cajas, piezas, cajas_d FROM entrada WHERE id_producto = $idp");
                    while ($registro2 = mysqli_fetch_array($consulta2)) {
                        $cajas = $registro2['cajas'];
                        $tarimas = $registro2['tarimas'];
                        $piezas = $registro2['piezas'];
                        $cd = $registro2['cajas_d'];
                        if($cajas != 0 && $tarimas != 0){
                            $total_p += (($cajas * $tarimas *$piezas)-($cd*$piezas));
                        }else{
                            $total_p += $piezas;
                        }
                    }
                    
                    $consulta3 = $link->query("SELECT tarimas, cajas, piezas  FROM salida WHERE id_producto = $idp");
                    while ($registro3 = mysqli_fetch_array($consulta3)) {
                        $cajas = $registro3['cajas'];
                        $tarimas = $registro3['tarimas'];
                        $piezas = $registro3['piezas'];
                        if($cajas != 0 && $tarimas != 0){
                            $total_p2 += ($cajas * $tarimas *$piezas);
                            //echo $total_p;
                        }else{
                            $total_p2 += $piezas;
                        } 
                        //$cajasd += $registro2['cajasd'];
                    }
                    $total_p = ($total_p-$total_p2)*$pre;
                    $total += $total_p;
                    //echo " - ".$total." - ";
                }
            }else{
                //echo "$ con cliente";
                $consulta = $link->query("SELECT id_producto, precio FROM producto WHERE id_cliente = $id");
                while ($registro = mysqli_fetch_array($consulta)) {
                    $total_p = $total_p2 =0;
                    $idp = $registro["id_producto"];    
                    $pre = $registro["precio"];
                    //echo $pre;
                    //echo $idp."/";
                    $consulta2 = $link->query("SELECT tarimas, cajas, piezas, cajas_d FROM entrada WHERE id_producto = $idp");
                    while ($registro2 = mysqli_fetch_array($consulta2)) {
                        $cajas = $registro2['cajas'];
                        $tarimas = $registro2['tarimas'];
                        $piezas = $registro2['piezas'];
                        $cd = $registro2['cajas_d'];
                        if($cajas != 0 && $tarimas != 0){
                            $total_p += (($cajas * $tarimas *$piezas) - ($cd*$piezas));
                        }else{
                            $total_p += $piezas;
                            
                        }
                        //echo ".".$total_p.". ";
                    }
                    $consulta3 = $link->query("SELECT tarimas, cajas, piezas  FROM salida WHERE id_producto = $idp");
                    while ($registro3 = mysqli_fetch_array($consulta3)) {
                        $cajas2 = $registro3['cajas'];
                        $tarimas2 = $registro3['tarimas'];
                        $piezas2 = $registro3['piezas'];
                        if($cajas2 != 0 && $tarimas2 != 0){
                            $total_p2 += ($cajas2 * $tarimas2 *$piezas2);
                            //echo $total_p;
                        }else{
                            $total_p2 += $piezas2;
                        } 
                        //echo "_".$total_p2."_";
                        //$cajasd += $registro2['cajasd'];
                    }
                    $total_p = ($total_p-$total_p2)*$pre;
                    $total = $total+ $total_p;
                    //echo " - ".$total." - ";
                }
            }
            break;
        case 1:
            //Total $ de productos dañados
            if($id==0){
                $consulta = $link->query("SELECT id_producto, precio FROM producto");
                while ($registro = mysqli_fetch_array($consulta)) {
                    $total_p = $total_p2 =0;
                    $idp = $registro["id_producto"];
                    $pre = $registro["precio"];
                    //echo $idp."/";
                    $consulta2 = $link->query("SELECT cajas_d, piezas FROM entrada WHERE id_producto = $idp AND cajas_d>0");
                    while ($registro2 = mysqli_fetch_array($consulta2)) {
                        $cajas = $registro2['cajas_d'];
                        $piezas = $registro2['piezas'];
                        $total_p += ($cajas *$piezas);

                    }
                   
                    $total_p = $total_p*$pre;
                    $total += $total_p;
                    //echo " - ".$total." - ";
                }
            }else{
                $consulta = $link->query("SELECT id_producto, precio FROM producto WHERE id_cliente = $id");
                while ($registro = mysqli_fetch_array($consulta)) {
                    $total_p = $total_p2 =0;
                    $idp = $registro["id_producto"];
                    $pre = $registro["precio"];
                    //echo $pre;
                    //echo $idp."/";
                    $consulta2 = $link->query("SELECT tarimas, cajas_d, piezas FROM entrada WHERE id_producto = $idp");
                    while ($registro2 = mysqli_fetch_array($consulta2)) {
                        $cajas = $registro2['cajas_d'];
                        $piezas = $registro2['piezas'];
                        $total_p += ($cajas  *$piezas);
                        
                        //echo ".".$total_p.". ";
                    }
                    
                    $total_p = $total_p*$pre;
                    $total = $total+ $total_p;
                    //echo " - ".$total." - ";
                }
            }
            break;
    }


      ?>
      <div class="as">
        <p>
          <b>Total: </b>
          <b name="total"> <?php echo "$ ", number_format($total, 2); ?></b>
        </p>

      </div>
      <?php

?>