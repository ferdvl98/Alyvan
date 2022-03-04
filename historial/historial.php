<?php 

  require "../conexion/conexion.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/estilos-cli.css">
    <link rel="stylesheet" href="../css/jquery.dataTables.min.css">
    <title>Document</title>
    <script src="../js/jquery-3.5.1.js"></script>
    <script type="text/javascript">
       $(document).ready(function(){
        function obtener_datos(){
          $.ajax({
            url: "tabla.php",
            method: "POST",
            success: function(data){
              $("#result").html(data);
            }
          })
        }
        obtener_datos();
        const selectElement = document.querySelector('.form-control');

        selectElement.addEventListener('change', (event) => {
          var datos = $("#formulario").serialize();
          //alert(datos);
          $.ajax({
            url: "buscar.php",
            method: "POST",
            data: datos,
            success: function(data){
              $("#result").html(data);
            }
          });
        });
       });
    </script>
</head>
<body>
<form id="formulario" method="POST">
<legend>Historial</legend><br>
<div class="form-row">
    <div class="form-group col-md-6">
    <label for="inputEmail4">Busca por fecha</label>
      <select id="inputState" class="form-control" name="fecha" >
        <option value="0" selected>Todos</option>
        <?php
          $query = $link->query("SELECT * FROM `historial` GROUP BY fecha");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value = "'.$valores['fecha'].'">'.$valores['fecha'];
          }
        ?>
      </select>
    </div>
</div>
        </form >
<fieldset>
    <div id = "container">
      <div id="result"></div>
    </div>
  </fieldset>
</body>
</html>