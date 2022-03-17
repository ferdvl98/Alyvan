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
    <title>Rutas Alyvan</title>
    <link rel="shortcut icon" href="../img/logo-inventarios.png" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style2.css">
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/fontawesome.scss">
</head>

<body id="body">
    <header>
        <div class="icon_menu">
            <i class="fas fa-bars" id="btn_open"></i>
        </div>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-user-circle"></i>&nbsp;&nbsp;<?php echo $nombre;?> &nbsp; - &nbsp; Rutas</p>
    </header>
    <div class="menu__side" id="menu_side">
        <div class="name__page">
            <i><img src="" alt=""></i>
            <p><i class="fas fa-user"></i>&nbsp;<?php echo $usuario;?></p>
        </div>
        <div class="options__menu">
            <a href="../rutas/rutas.php?id=<?php echo $id; ?>" target="workarea" id="ru" class="selected">
                <div class="option" id="btn_rutas">
                <i class="fas fa-road" title="Rutas"></i>
                    <h4>Rutas</h4>
                </div>
            </a>
            <a href="../casetas/casetas.php?id=<?php echo $id; ?>" target="workarea" id="cas">
                <div class="option" id="btn_casetas">
                <i class="fas fa-flag-checkered"></i>
                    <h4>Casetas</h4>
                </div>
            </a>
            <a href="../chofer/chofer.php?id=<?php echo $id; ?>" target="workarea" id="cho">
                <div class="option" id="btn_chofer">
                <i class="fas fa-truck" title="Chofer"></i>
                    <h4>Chofer</h4>
                </div>
            </a>
            <a href="../clientes/clientes.php?id=<?php echo $id; ?>" target="workarea" id="des">
                <div class="option" id="btn_descargas">
                    <i class="fas fa-file-download" title="Descargar"></i>
                    <h4>Descargar</h4>
                </div>
            </a>
            <a href="../code/main.php?id=<?php echo $id; ?>">
                <div class="option">
                    <i class="fas fa-arrow-alt-circle-left" title="Regresar"></i>
                    <h4>Regresar</h4>
                </div>
            </a>
        </div>
    </div>
    <main>
        <iframe src="../rutas/rutas.php?id=<?php echo $id; ?>" name="workarea" id="at" frameborder="0" style="overflow: hidden; height: 80%; width: 85%; position: absolute;"></iframe>

    </main>
    <script src="../js/script.js"></script>
    <script src="../js/botones2.js"></script>
    <script src="../js/fontawesome.js"></script>
    <script src="../js/fontawesome.min.js"></script>
</body>

</html>