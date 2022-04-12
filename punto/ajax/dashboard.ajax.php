<?php

    require_once "../controladores/dashboard.controlador.php";
    require_once "../modelos/dashboard.modelo.php";

    class AjaxDashboard{
        public function getDatosDashboard(){
            $datos = DashboardControlador::ctrGetDatosDashboard();

            echo json_encode($datos);  
        }

        public function getVentasMesActual(){
            $ventasMesActual = DashboardControlador::ctrGetVentasMesActual();
            echo json_encode($ventasMesActual);  
        }
    
    }

   
    if(isset($_POST['accion']) && $_POST['accion'] == 1){
        $ventasMesActual = new AjaxDasHboard();
        $ventasMesActual -> getVentasMesActual();
    }else{
        $datos = new AjaxDasHboard();
        $datos -> getDatosDashboard();
    }
    