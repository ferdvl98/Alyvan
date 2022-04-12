<?php
    class DashboardControlador{
        static public function ctrGetDatosDashboard(){
            $datos = DashboardModelo::mdlGetDatosDashboard();

            return $datos;
        }

        static public function ctrGetVentasMesActual(){
            $ventasMesActual = DashboardModelo::mdlGetVentasMesActual();

            return $ventasMesActual;
        }

        static public function ctrProductosMasVendidos(){
            $productosMasVendidos = DashboardModelo::mdlGetProductosMasVendidos();

            return $productosMasVendidos;
        }

        static public function ctrProductosPocoSotck(){
            $productosPocoStock = DashboardModelo::mdlGetProductosPocoStock();

            return $productosPocoStock;
        }
    }