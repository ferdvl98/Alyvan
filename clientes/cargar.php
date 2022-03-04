<?php 

    require "../conexion/conexion.php";
    
    $id = $_GET["id"];
    echo $id;
    $uploadfile = "";
    /*if(!isset($_FILES['uploadfile']['tmp_name'])){
        //echo "error";
    }else{
        
    }*/
    $uploadfile = $_FILES['uploadfile']['tmp_name'];    

    if(!empty($uploadfile)){
        require "../phpexcel/PHPExcel.php";
        require_once "../phpexcel/PHPExcel/IOFactory.php";
        try {
            $objExcel = PHPExcel_IOFactory::load($uploadfile);
        } catch (Exception $e){}
        $numRows = $objExcel ->setActiveSheetIndex(0)->getHighestRow();
        $numCol = $objExcel -> setActiveSheetIndex(0)->getHighestColumn();
        $num = 2;
        switch ($id) {
            case 0:
                echo "clientes";
                while ($num <= $numRows) {
                    $cliente = $objExcel->getActiveSheet()->getCell('A'.($num))->getCalculatedValue();
                    if(empty($cliente)){
                    }else{ 
                        $sql = "SELECT * FROM cliente  WHERE nom_cliente = '$cliente'";
                        $result = $link->query($sql);
                        if ($result->num_rows > 0) {
                        }else{
                            $sql = "INSERT INTO `cliente`( `nom_cliente`) 
                            VALUES ('$cliente');";
                            if ($link->query($sql) === TRUE) {
                                echo "Clientes registrados con exito!";
                            }else {
                                echo "Error updating record: " . $link->error;
                            }
                        }
                    }
                    $num+=1;
                }
                ?>
                    <script type="text/javascript">
                        alert("Registros Guardados");
                        window.location = "clientes.php";
                    </script>
                <?
                break;
            case 1:
                echo "cedis";
                while ($num <= $numRows) {
                    $cliente = $objExcel->getActiveSheet()->getCell('A'.($num))->getCalculatedValue();
                    if(empty($cliente)){
                    }else{ 
                        $sql = "SELECT * FROM cedis  WHERE nom_cliente = '$cliente'";
                        $result = $link->query($sql);
                        if ($result->num_rows > 0) {
                        }else{
                            $sql = "INSERT INTO `cedis`( `nom_cliente`) 
                            VALUES ('$cliente');";
                            if ($link->query($sql) === TRUE) {
                                echo "CEDIS registrados con exito!";
                            }else {
                                echo "Error updating record: " . $link->error;
                            }
                        }
                    }
                    $num+=1;
                }
                ?>
                    <script type="text/javascript">
                        alert("Registros Guardados");
                        window.location = "clientes.php";
                    </script>
                <?php
                break;
            case 2:
                echo "destinos";
                while ($num <= $numRows) {
                    $cliente = $objExcel->getActiveSheet()->getCell('A'.($num))->getCalculatedValue();
                    if(empty($cliente)){
                    }else{ 
                        $sql = "SELECT * FROM destinos  WHERE nom_cliente = '$cliente'";
                        $result = $link->query($sql);
                        if ($result->num_rows > 0) {
                        }else{
                            $sql = "INSERT INTO `destinos`( `nom_cliente`) 
                            VALUES ('$cliente');";
                            if ($link->query($sql) === TRUE) {
                                echo "Destinos registrados con exito!";
                            }else {
                                echo "Error updating record: " . $link->error;
                            }
                        }
                    }
                    $num+=1;
                }
                ?>
                    <script type="text/javascript">
                        alert("Registros Guardados");
                        window.location = "clientes.php";
                    </script>
                <?php
                break;
        }
        

        
    }else{
        echo "Hoja de Trabajo Incorrecta";
        ?>
            <script type="text/javascript">
                alert("Hoja de Trabajo Incorrecta");
                window.location = "clientes.php";
            </script>
        <?php
    }

?>