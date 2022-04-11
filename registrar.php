<?php 
    require "conexion/conexion.php";

    $nombre = $_POST["nombre"];
    $usuario = $_POST["user"];
    $pass = $_POST["pass"];
    $pass = hash('sha512', $pass);
    $tipo = $_POST["tipo"];

    $sql = "SELECT * FROM usuarios WHERE nom_usuario = '$usuario'";
    $result = $link->query($sql);

    if(empty(trim($nombre)) || empty(trim($usuario)) || empty(trim($pass)) || $tipo == 0){
        ?>
            <script>
                alert("¡Debe llenar todos los campos!")
                window.location = "index.php";
            </script> 
        <?php
    }else{
        if ($result->num_rows > 0) {
            ?>
                <script>
                    alert("¡El usuario ya existe!")
                    window.location = "index.php";
                </script>
            <?php
        } else {
            $sql = "INSERT INTO usuarios (nom_usuario, pass, nombre, tipo)
                VALUES ('$usuario', '$pass', '$nombre', $tipo)";
        
            if ($link->query($sql) === TRUE) {
                ?>
                    <script>
                        alert("¡Usuario creado con exito!")
                        window.location = "index.php";
                    </script>
                <?php
            } else {
                ?>
                    <script>
                        alert("¡Error al crear usuario!")
                        window.location = "index.php";
                    </script>
                <?php
            }
        }
    }
?>