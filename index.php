<?php

    session_start();

    if(isset($_SESSION['user2'])){
        session_destroy();
        header("location: index.php");
        die();
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alyvan</title>
    <link rel="shortcut icon" href="img/logo-inventarios.png" />
    <link rel="stylesheet" href="css/estilos-log.css" />
    <script src="../js/script.js"></script>
    <script src="../js/botones.js"></script>
</head>
<body>
    <main>
        <div class="contenedor__todo">
            <div class="caja__trasera">
                <div class="caja__tracera-login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia sesión para entrar al inventario</p>
                    <button id="btn__inicar-sesion">Inisiar Sesión</button>
                </div>
                <div class="caja__tracera-register">
                    <h3>¿Aun no tienes una cuenta?</h3>
                    <p>Registrate para poder inicar sesión</p>
                    <button id="btn__registrarse">Regístrase</button>
                </div>
            </div>

            <div class="contendor__login-register">
                <form action="login.php" method = "POST" class="formulario__login">
                    <h2>Iniciar Sesión</h2>
                    <input type="text" placeholder="Nombre de Usuario" name = "user2">
                    <input type="password" placeholder="Contraseña" name = "pass2">
                    <button>Entrar</button>
                </form>
                <form action="registrar.php" method = "POST" class="formulario__register">
                    <h2>Registrarse</h2>
                    <input type="text" placeholder="Nombre Completo" name ="nombre">
                    <input type="text" placeholder="Nombre de Usuario" name = "user">
                    <input type="password" placeholder="Contraseña" name = "pass">
                    <button>Registrarse</button>
                </form>
            </div>
        </div>
    </main>
    <script src="js/index.js"></script>
</body>
</html>