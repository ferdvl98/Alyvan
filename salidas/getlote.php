<?php
    require "../conexion/conexion.php";

    $cb = filter_input(INPUT_POST, 'id');

    $sql = "SELECT lote FROM producto WHERE cod_barras = '$cb'";  
    $query = mysqli_query($link, $sql);
    $filas = mysqli_fetch_all($query, MYSQLI_ASSOC); 
    mysqli_close($link);

?>

    <?php foreach($filas as $op): //creamos las opciones a partir de los datos obtenidos ?>
    <option value="<?= $op['lote'] ?>"><?= $op['lote'] ?></option>
    <?php endforeach; ?>
    