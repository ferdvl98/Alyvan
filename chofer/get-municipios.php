<?php

    require "../conexion/conexion.php";

    $estado = filter_input(INPUT_POST, 'estado');

     /*Obtenemos los discos de la banda seleccionada*/
    $sql = "SELECT id, nombre from municipios2 where estado_id = $estado ORDER BY nombre ASC";  
    $query = mysqli_query($link, $sql);
    $filas = mysqli_fetch_all($query, MYSQLI_ASSOC); 
    mysqli_close($link);

?>

    <option value="">- Seleccione -</option>
    <?php foreach($filas as $op): //creamos las opciones a partir de los datos obtenidos ?>
    <option value="<?= $op['id'] ?>"><?= $op['nombre'] ?></option>
    <?php endforeach; ?>
    
    //echo $estado;