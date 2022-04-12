<?php
    class ProductoControlador{
        static public function ctrCargaMasivaProdcuto($fileProductos){
            $respuesta = ProductosModelo::mdlCargaMasivaProductos($fileProductos);
            return $respuesta;
        }
    }