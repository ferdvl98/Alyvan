<?php

    session_start();

    require "../conexion/conexion.php";

    $id = $_GET["id"];
    $nombre = $usuario = "";
    $sql = "SELECT nombre, nom_usuario FROM usuarios WHERE id_usuario = $id";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $nombre = $row["nombre"];
            $usuario = $row["nom_usuario"];
        }
    }



    if (!isset($_SESSION['user2']) || !isset($id)) {
        header("location: ../index.php");
        session_destroy();
        die();
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Inventario Alyvan</title>
    <link rel="shortcut icon" href="../img/logo-inventarios.png" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/fontawesome.scss">
</head>

<body id="body">
    <header>
        <div class="icon_menu">
            <i class="fas fa-bars" id="btn_open"></i>
        </div>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-user-circle"></i>&nbsp;&nbsp;<?php echo $nombre;?>&nbsp; - Inventario&nbsp;</p>
    </header>
    <div class="menu__side" id="menu_side">
        <div class="name__page">
            <i><img src="" alt=""></i>
            <p><i class="fas fa-user"></i>&nbsp;<?php echo $usuario;?></p>
        </div>
        <div class="options__menu">
            <a href="../inventario/inventario.php?id=<?php echo $id; ?>" target="workarea" id="inv" class="selected">
                <div class="option" id="btn_inventario">
                    <i class="fas fa-dolly-flatbed" title="Inventario"></i>
                    <h4>Productos</h4>
                </div>
            </a>
            <a href="../entradas/entradas.php?id=<?php echo $id; ?>" target="workarea" id="ent">
                <div class="option" id="btn_entradas">
                    <i class="fas fa-shopping-cart" title="Entradas"></i>
                    <h4>Ventas</h4>
                </div>
            </a>
            <a href="../salidas/salidas.php?id=<?php echo $id; ?>" target="workarea" id="sal">
                <div class="option" id="btn_salidas">
                    <i class="fas fa-dolly" title="Salidas"></i>
                    <h4>Compras</h4>
                </div>
            </a>
            <a href="../clientes/clientes.php?id=<?php echo $id; ?>" target="workarea" id="clien">
                <div class="option" id="btn_clientes">
                    <i class="fas fa-chart-line" title="Clientes"></i>
                    <h4>Reportes</h4>
                </div>
            </a>

            <a href="../cerrar_sesion.php">
                <div class="option">
                    <i class="fas fa-door-open" title="Salir"></i>
                    <h4>Salir</h4>
                </div>
            </a>
        </div>
    </div>
    <main>
        <iframe src="../inventario/inventario.php?id=<?php echo $id; ?>" name="workarea" id="at" frameborder="0" style="overflow: hidden; height: 80%; width: 85%; position: absolute;"></iframe>

    </main>
    <script src="../js/script.js"></script>
    <script src="../js/botones.js"></script>
    <script src="../js/fontawesome.js"></script>
    <script src="../js/fontawesome.min.js"></script>
</body>

</html>