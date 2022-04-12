<?php
    require_once "conexion.php";

    use PhpOffice\PhpSpreadsheet\IOFactory;

    class ProductosModelo{
        static public function mdlCargaMasivaProductos($fileProductos){
            $nombreArchivo = $fileProductos['tmp_name'];
            $documento = \PhpOffice\PhpSpreadsheet\IOFactory::load($nombreArchivo);

            $hojaCategorias = $documento->getSheet(1);
            $numeroFilasCategorias = $hojaCategorias->getHighestDataRow();

            $categoriasRegistradas = 0;

            for ($i=2; $i <=$numeroFilasCategorias ; $i++) { 
                
                $categoria = $hojaCategorias->getCellByColumnAndRow(1, $i);
                $aplica_peso = $hojaCategorias->getCellByColumnAndRow(2, $i);
                $fechaActulizacion = date("Y-m-d");

                if(!empty($categoria)){
                    $stmt = Conexion::conectar()->prepare("INSERT INTO categorias (nombre_categoria, 
                                                                                aplica_peso, 
                                                                                fecha_actualizacion_categoria) 
                                                            VALUE (:nombre_categoria, 
                                                                :aplica_peso,
                                                                :fecha_actualizacion_categoria);");
                    $stmt ->bindParam(":nombre_categoria", $categoria, PDO::PARAM_STR);
                    $stmt ->bindParam(":aplica_peso", $aplica_peso, PDO::PARAM_STR);
                    $stmt ->bindParam(":fecha_actualizacion_categoria", $fechaActulizacion, PDO::PARAM_STR);

                    if($stmt->execute()){
                        $categoriasRegistradas = $categoriasRegistradas+1;
                    }else{
                        $categoriasRegistradas = 0;
                    }
                }
                return $categoriasRegistradas;
            }
        }
    }