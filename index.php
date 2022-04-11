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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
                    <br>
                    <select name="tipo" id="tipo" class="form-select" aria-label="Default select example">
                        <option value=0>Tipo de Usuario</option>
                        <option value=1>Logistica</option>
                        <option value=2>Comercializadora</option>
                    </select>
                    <button>Registrarse</button>
                    
                </form>
            </div>
        </div>
    </main>
    <script src="js/index.js"></script>
</body>
</html>