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

        //Ver registros en la Tabla
        function obtener_datos(){
          $.ajax({
            url: "tabla.php",
            method: "POST",
            success: function(data){
              $("#result").html(data)
            }
          });
        }
      
        obtener_datos();

        $("#enviar").click(function() {
          var datos = $("#formulario").serialize();
          //alert(datos);
          $.ajax({
            url: "registrar-casetas.php?id=<?php echo $id; ?>",
            method: "POST",
            data: datos,
            success: function(data) {
              alert(data);
              obtener_datos();
            }
          });
        });
      });
    </script>
</head>
<body>
<form id="formulario" method="POST">
  <legend>Casetas</legend><br>
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputEmail4">Nombre de la Caseta</label>
      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de la caseta">
    </div>

    <div class="form-group col-md-3">
      <label for="inputEmail4">Estado</label>
      <select id="estado" class="form-control" name="estado" >
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
      <label for="inputEmail4">Carretera</label>
      <input type="text" class="form-control" id="carretera" name ="carretera" placeholder="Nombre de la carretera">
    </div>
    <div class="form-group col-md-2">
      <label for="inputEmail4">Peaje</label>
      <input type="number" class="form-control" id="peaje" name="peaje" placeholder="Peaje">
    </div>
    <div class="form-group col-md-2">
    <br>
    <button type="submit" id="enviar" class="btn btn-primary" style ="height: 40px; width: 100PX; margin-top:5px;">Registrar</button>
    </div>
    
  </div>
<fieldset>
    <div id = "container" class="overflow-auto">
      <div id="result" class="overflow-auto"></div>
    </div>
  </fieldset>
        </form>
</body>
</html>