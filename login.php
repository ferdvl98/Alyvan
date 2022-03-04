<?php 
    
    session_start();

    require "conexion/conexion.php";

    $user = $_POST["user2"];
    $pass = $_POST["pass2"];
    $pass = hash('sha512', $pass);

    $sql = "SELECT * FROM usuarios WHERE nom_usuario = '$user' and pass = '$pass'";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id = $row["id_usuario"];
        }
        $_SESSION['user2'] = $user;
        header("location:code/main.php?id=$id");
        exit;
    }else{
        ?>
            <script>
                alert("¡El usuario o contraseña son incorrectos!")
                window.location = "index.php";
            </script>
        <?php
        exit;
    } 
?>