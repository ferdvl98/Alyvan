<?php

    require "../conexion/conexion.php";

    $estado = filter_input(INPUT_POST, 'estadod');

     /*Obtenemos los discos de la banda seleccionada*/
     $sql = "SELECT l.id, l.nombre FROM `localidades2` as l INNER JOIN municipios2 as m on l.municipio_id = m.id INNER JOIN estados2 as e on m.estado_id = e.id WHERE e.id = $estado order by l.nombre;";  
    $query = mysqli_query($link, $sql);
    $filas = mysqli_fetch_all($query, MYSQLI_ASSOC); 
    mysqli_close($link);

?>

    <option value="">- Seleccione -</option>
    <?php foreach($filas as $op): //creamos las opciones a partir de los datos obtenidos ?>
    <option value="<?= $op['id'] ?>"><?= $op['nombre'] ?></option>
    <?php endforeach; ?>
    
    //echo $estado;