<?php
  $id = $_GET["id"];
  require_once "../conexion/conexion.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <title>Document</title>
  <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/estilos-cli.css">
  <script src="../js/jquery-3.5.1.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      var muni = $('#municipioo');
      var munid = $('#municipiod');
        $('#estadoo').change(function(){
          var estado = $(this).val(); //obtener el id seleccionado
          if(estado != 0){
            $.ajax({
              data: {estado:estado},
              dataType: 'html',
              type: 'POST',
              url: 'get-municipioso.php'
            }).done(function(data){
              muni.html(data);            
            });
          }else{
            muni.val('');
          }
        });
        $('#estadod').change(function(){
          var estadod = $(this).val(); //obtener el id seleccionado
          if(estadod != 0){
            $.ajax({
              data: {estadod:estadod},
              dataType: 'html',
              type: 'POST',
              url: 'get-municipiosd.php'
            }).done(function(data){
              munid.html(data);            
            });
          }else{
            munid.val('');
          }
        });
    });
  </script>
</head>
<body>
  <form id="formulario" method="POST">  
    <legend>Rutas</legend><br>
    <div class="form-row">
      <div class="form-group col-md-3">
        <label>RFC del Conductor</label>
        <input type="text" class="form-control" id="rfc" name="rfc" placeholder="RFC del Conductor">
      </div>

      <div class="form-group col-md-2">
        <label>Placas del Vehículo</label>
        <input type="text" class="form-control" id="placas" name="placas" placeholder="Placas del Vehículo">
      </div>

      <div class="form-group col-md-3">
        <label for="inputEmail4">Fecha del Viaje</label>
        <input type="date" class="form-control" id="fecha" placeholder="Fecha del Viaje" name="fecha">
      </div>

      <div class="form-group col-md-4">
        <label>Servicio</label>
        <input type="text" class="form-control" id="servicio" name="servicio" placeholder="Descripción del Servicio">
      </div>

      <div class="form-group col-md-3">
        <label for="inputEmail4">Estado Origen</label>
          <select id="estadoo" class="form-control" name="estadoo" >
            <option value="0" selected>Seleccionar</option>
            <?php
              $query = $link->query("SELECT * FROM `estados2`");
              while ($valores = mysqli_fetch_array($query)) {
                echo '<option value = "'.$valores['id'].'">'.$valores['nombre'];
              }
            ?>
          </select>
      </div> 
      
      <div class="form-group col-md-3">
        <label for="inputEmail4">Municipio Origen</label>
        <select id="municipioo" class="form-control" name="municipioo" >
          <option value="0" selected>Seleccionar</option>
        </select>
      </div>

      <div class="form-group col-md-2">
        <label for="inputEmail4">CEDIS</label>
          <select id="cedis" class="form-control" name="cedis" >
            <option value="0" selected>Seleccionar</option>
            <?php
              $query = $link->query("SELECT * FROM `cedis`");
              while ($valores = mysqli_fetch_array($query)) {
                echo '<option value = "'.$valores['id_cliente'].'">'.$valores['nom_cliente'];
              }
            ?>
          </select>
      </div> 

      <div class="form-group col-md-2">
        <label for="inputEmail4">Estado Destino</label>
          <select id="estadod" class="form-control" name="estadod" >
            <option value="0" selected>Seleccionar</option>
            <?php
              $query = $link->query("SELECT * FROM `estados2`");
              while ($valores = mysqli_fetch_array($query)) {
                echo '<option value = "'.$valores['id'].'">'.$valores['nombre'];
              }
            ?>
          </select>
      </div> 
      
      <div class="form-group col-md-2">
        <label for="inputEmail4">Municipio Destino</label>
        <select id="municipiod" class="form-control" name="municipiod" >
          <option value="0" selected>Seleccionar</option>
        </select>
      </div>

    </div>
  </form>
  
</body>
</html>