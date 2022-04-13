<?php
    class ProductoControlador{
        static public function ctrCargaMasivaProdcuto($fileProductos){
            $respuesta = ProductosModelo::mdlCargaMasivaProductos($fileProductos);
            return $respuesta;
        }
        static public function ctrajaxListarProductos(){
            $productos = ProductosModelo::mdlListarProductos();
            return $productos;
        }
    }