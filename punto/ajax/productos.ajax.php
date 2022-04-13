<?php
    require_once "../controladores/producto.controlador.php";
    require_once "../modelos/prodcutos.modelo.php";
    
    require_once "../vendor/autoload.php";

    class ajaxProductos{
        public $fileProductos;

        public function ajaxCargaMasivaProducto(){

            $respuesta = ProductoControlador::ctrCargaMasivaProdcuto($this->fileProductos);
            echo json_encode($respuesta);
        }
        public function ajaxListarProductos(){
            $productos = ProductoControlador::ctrajaxListarProductos();
            echo json_encode($productos);
        }
    }
    if(isset($_POST['accion']) && $_POST['accion'] == 1){
        $productos = new ajaxProductos();
        $productos -> ajaxListarProductos();
    }else if(isset($_FILES)){
        $archivo_productos = new ajaxProductos();
        $archivo_productos -> fileProductos =$_FILES['fileProductos'];
        $archivo_productos -> ajaxCargaMasivaProducto();
    }