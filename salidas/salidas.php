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
  <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/estilos-cli.css">
  <title>Document</title>
  <script src="../js/jquery-3.5.1.js"></script>
  <script src="../js/jquery-3.0.0.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      function obtener_datos(){
          $.ajax({
            url: "tabla.php",
            method: "POST",
            success: function(data){
              $("#result").html(data)
            }
          })
        }
        
      
        obtener_datos();

      $("#enviar").click(function() {
        var datos = $("#formulario").serialize();
        //alert(datos);
        $.ajax({
          url: "registrar-salidas.php?id=<?php echo $id; ?>",
          method: "POST",
          data: datos,
          success: function(data) {
            alert(data);
            obtener_datos();
          }
        });
      });

      $("#enviar2").click(function() {
        $.ajax({
          url: "registrar2.php?id=<?php echo $id; ?>",
          method: "POST",
          success: function(data) {
            alert(data);
          }
        });
      });

      const input = document.querySelector('input');
      const log = document.getElementById('cb');
      log.addEventListener('input', buscar);
      var lote = $('#lote');
      function buscar(e) {
        var id = $("#cb").val();
        $.ajax({
          url: "llenar.php",
          method: "POST",
          data: {
            id: id
          },
          success: function(data) {
            //alert(data);
            var a = data.split("*");
            $('#des').val(a[0]);
            $('#cad').val(a[1]);
          }
        });
        $.ajax({
          url: "get-lote.php",
          method: "POST",
          dataType: 'html',
          data: {
            id: id
          },
          success: function(data) {
            lote.html(data);  
          }
        })

        
      }

    });
  </script>
</head>

<body>
  <form id="formulario" method="POST">
    <legend>Salidas</legend><br>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputPassword4">Código de barras</label>
        <input type="text" class="form-control" id="cb" placeholder="Código de Barras" name="cbarras">
      </div>
      <div class="form-group col-md-6">
        <label for="inputEmail4">Fecha de Salida</label>
        <input type="date" class="form-control" id="salida" placeholder="Fecha de Salida" name="salida">
      </div>

    </div>
    <div class="form-row">
      <div class="form-group col-md-10">
        <label for="inputAddress">Descripción</label>
        <input type="text" class="form-control" id="des" placeholder="Descripción" disabled name="descripcion">
      </div>
      <div class="form-group col-md-2">
        <label for="inputAddress2">Factura/Remision</label>
        <input type="text" class="form-control" id="fac" placeholder="Factura/Remision" name="factura">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-2">
      <label for="inputState">Lote</label>
        <select id="lote" class="form-control" name="lote" >
          </select>
      </div>
      <div class="form-group col-md-2">
        <label for="inputZip">Orden de Pedido</label>
        <input type="text" class="form-control" id="pedido" placeholder="Orden de Pedido" name="pedido">
      </div>
      <div class="form-group col-md-2">
        <label for="inputAddress2">Tarimas</label>
        <input type="number" class="form-control" id="tarimas" placeholder="Cantidad de Tarimas" name="tarimas">
      </div>
      <div class="form-group col-md-2">
        <label for="inputAddress2">Cajas</label>
        <input type="number" class="form-control" id="cajas" placeholder="Cajas por Tarima" name="cajas">
      </div>
      <div class="form-group col-md-2">
        <label for="inputAddress2">Piezas</label>
        <input type="number" class="form-control" id="piezas" placeholder="Piezas por Caja" name="piezas">
      </div>
      <div class="form-group col-md-2">
        <label for="inputEmail4">Fecha de Caducidad*</label>
        <input type="date" class="form-control" id="cad" placeholder="Fecha de Entrada" disabled name="caducidad">
      </div>
      <div class="form-group col-md-5">
        <label for="inputState">CEDIS</label>
        <select id="cedis" class="form-control" name="cedis" >
            <?php
              $query = $link->query("SELECT * FROM `cedis`");
              while ($valores = mysqli_fetch_array($query)) {
                echo '<option value = "'.$valores['nom_cliente'].'">'.$valores['nom_cliente'];
              }
            ?>
          </select>
      </div>
      <div class="form-group col-md-5">
        <label for="inputState">Destino</label>
        <select id="destino" class="form-control" name="destino" >
            <?php
              $query = $link->query("SELECT * FROM `destinos`");
              while ($valores = mysqli_fetch_array($query)) {
                echo '<option value = "'.$valores['nom_cliente'].'">'.$valores['nom_cliente'];
              }
            ?>
          </select>
      </div>

      <div class="form-group col-md-2">
        <label for="inputZip">Precio (Unidad)</label>
        <input type="number" class="form-control" id="inputZip" placeholder="Precio" name="precio">
      </div>


    </div>

    <button type="submit" id="enviar" class="btn btn-primary">Agregar</button>
    <button type="submit" id="enviar2" class="btn btn-warning">Registrar</button>
  </form>

  <!-- Modal -->
  <form method="post" id="form" action="subir.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cargar hoja de excel</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="">
              <a class="btn btn-warning fas fa-download" download href="../archivos/Formato_entradas.xlsx"> Descargar Formato</a>
            </div>
            <h5> </h5>
            <div class="input-group mb-3">
              <input type="file" class="form-control" name="uploadfile" id="uploadfile">
              <input type="hidden" name="caja_valor" id="caja_valor" value="">
              <input type="hidden" name="caja_valor2" id="caja_valor2" value="">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" id="btn" class="btn btn-primary">Subir</button>
          </div>
        </div>
      </div>
    </div>
  </form>
  <div id="container">
    <div id="result"></div>
  </div>

</body>

</html>