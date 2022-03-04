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
    <link rel="stylesheet" href="../css/jquery.dataTables.min.css">
    <title>Clientes</title>
    <script src="../js/jquery-3.5.1.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        //Ver registros en la Tabla
        var id = document.getElementById('selec').value;
        $("#selec").change(function(){
            var id = document.getElementById('selec').value;
            obtener_datos(id);

	      });

        function obtener_datos(id){
          $.ajax({
            url: "tabla.php?id="+id,
            method: "POST",
            success: function(data){
              $("#result").html(data)
            }
          })
        }
        obtener_datos(document.getElementById('selec').value);
        //funcion para actualizar datos en la tabla cliente
        function actualizar_datos(id, texto){
          var id2 = document.getElementById('selec').value;
          $.ajax({
            url: "actualizar-cliente.php?id2="+id2,
            method: "POST",
            data: {id: id, texto:texto},
            success: function(data){
              obtener_datos(id2);
              //alert(data);
            }
          });
        }
        //invocacion al metodo para actulaizar datos en la tabla cliente
        $(document).on("blur", "#nombre", function(){
          var id = $(this).data("id_nombre");
          var puesto = $(this).text();
          actualizar_datos(id, puesto);
        });

        /*Agregar cliente a la BD*/
        $("#enviar").click(function(){
          var id = document.getElementById('selec').value;
          var datos = $("#formulario").serialize();
          $.ajax({
            url: "registrar-cliente.php?id="+id,
            method: "POST",
            data: datos,
            success: function(data){
              obtener_datos(id);
              alert(data);
            }
          });
        });
        document.getElementById("form").onsubmit = function() {
          var id = document.getElementById('selec').value;
          this.action = "cargar.php?id="+id;
        }

        //Eliminar datos de la tabla cliente
        $(document).on("click", "#eliminar", function(){
          if(confirm("¿Esta seguro que desea eliminar al cliente?")){
            var id =$(this).data("id");
            $.ajax({
              url: "eliminar-cliente.php",
              method: "POST",
              data: {id:id},
              success: function(data){
                obtener_datos();
                alert(data);
              }
            })
          };
        })

      const input = document.querySelector('input');
      const log = document.getElementById('buscar');

      log.addEventListener('input', buscar);
     
      function buscar(e) {
        var id2 = document.getElementById('selec').value;
        var id = $("#buscar").val();
        $.ajax({
            url: "buscar.php?id2="+id2,
            method: "POST",
            data: {id:id},
            success: function(data){
              $("#result").html(data)
            }
          })
      }

      });
    </script>
</head>
<body>
  
  <legend>¿Qué desea ver?</legend><br>
  <select class="form-select" aria-label=".form-select-sm example" id="selec">
  <option value ="0" selected>Clientes</option>
  <option value="1">CEDIS</option>
  <option value="2">Destinos</option>
</select><br>
  <form class="formulario" id="formulario" method="POST">
    <div class="form-row">
      <div class="form-group col-md-6">
      <label for="inputEmail4">Registrar</label>
        <input type="text" class="form-control" id="inputEmail4" placeholder="Nombre del Cliente, CEDIS o Destino" name="n_cliente">
      </div>

      <div class="form-row col-md-1">
        <button type="submit" class="btn btn-primary" style="height: 45%; margin-top: 30px;" id="enviar">Registrar</button>
        </div>
      <div class="form-row col-md-1">
      <button type="button" class="btn btn-success " id="cargar" style="height: 45%; margin-top: 30px;" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-upload"></i>  Cargar</button>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Buscar</label>
          <input type="text" class="form-control" id="buscar" placeholder="Nombre del Cliente, CEDIS o Destino" name="b_cliente">
        </div>
      </div>
  </form>
  <fieldset>
    <div id = "container">
      <div id="result"></div>
    </div>
  </fieldset>
  <!-- Modal -->
<form method="post" id="form" action="" enctype="multipart/form-data">
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cargar hoja de excel</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="">
        <a class="btn btn-warning fas fa-download" download href="../archivos/Formarto_clientes.xlsx"> Descargar Formato</a>
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
   
</body>
</html>