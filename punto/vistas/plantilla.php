<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Punto de Venta - Alyvan</title>

    <link rel="shortcut icon" href="../img/logo-tienda.png" type="image/x-icon">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="vistas/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="vistas/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="vistas/assets/dist/css/adminlte.min.css">

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="vistas/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="vistas/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="vistas/assets/plugins/chart.js/Chart.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="vistas/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- JS Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="vistas/assets/dist/js/adminlte.min.js"></script>

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php
            include "modulos/navbar.php";
            include "modulos/aside.php";
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <?php
                include "vistas/dashboard.php";
            ?>
        </div>
        <!-- /.content-wrapper -->
        <?php
        include "modulos/footer.php";
        ?>

    </div>
    <!-- ./wrapper -->
    <script>
    function CargarContenido(pagina_php, contenedor) {
        $("." + contenedor).load(pagina_php);
    }
    </script>

</body>

</html>