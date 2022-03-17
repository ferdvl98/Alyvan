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
            var muni = $('#municipio');
            $('#estado').change(function(){
                var estado = $(this).val(); //obtener el id seleccionado
                if(estado != 0){
                    $.ajax({
                        data: {estado:estado},
                        dataType: 'html',
                        type: 'POST',
                        url: 'get-municipios.php'
                    }).done(function(data){
                        muni.html(data);
                        

                    });
                }else{
                    muni.val('');
                }
            });
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

            function obtener_datos2(){
                $.ajax({
                    url: "tabla2.php",
                    method: "POST",
                    success: function(data){
                    $("#result2").html(data)
                    }
                });
            }
            
        
            obtener_datos2();

            $("#enviar").click(function() {
                var datos = $("#formulario").serialize();
                //alert(datos);
                $.ajax({
                url: "registrar-chofer.php?id=<?php echo $id; ?>",
                method: "POST",
                data: datos,
                success: function(data) {
                    alert(data);
                    obtener_datos();
                }
                });
            });

            $("#enviar2").click(function() {
                var datos = $("#formulario2").serialize();
                //alert(datos);
                $.ajax({
                url: "registrar-placas.php?id=<?php echo $id; ?>",
                method: "POST",
                data: datos,
                success: function(data) {
                    alert(data);
                    obtener_datos2();
                }
                });
            });


            $(document).on("blur", "#nombre", function(){
                var id = $(this).data("id_nombre");
                var puesto = $(this).text();
                var a = 1;
                actualizar_datos(id, puesto, a);
                alert("hola");
            });
        });
    </script>
<head>
<body>
    <form id="formulario" method="POST">
        <legend>Chofer</legend><br>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label>Nombre del Chofer</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del Chofer">
            </div>
            <div class="form-group col-md-2">
                <label>RFC</label>
                <input type="text" class="form-control" id="rfc" name="rfc" placeholder="RFC">
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
            <div class="form-group col-md-3">
                <label for="inputEmail4">Municipio</label>
                <select id="municipio" class="form-control" name="municipio" >
                    <option value="0" selected>Seleccionar</option>
                </select>
            </div>
            <div class="form-group col-md-7">
                <label>Dirección</label>
                <input type="text" class="form-control" id="dir" name="dir" placeholder="Dirección del Chofer">
            </div>
            <div class="form-group col-md-3">
                <label>Número de Teléfono</label>
                <input type="number" class="form-control" id="ntel" name="ntel" placeholder="Número de Teléfono">
            </div>
            <div class="form-group col-md-2">
                <br>
                <button type="submit" id="enviar" class="btn btn-primary" style ="height: 40px; width: 100PX; margin-top:5px;">Registar</button>
                <button type="button" id="invocar" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-success" style ="height: 40px; width: 100PX; margin-top:5px;">Placas</button>
            </div>
        </div>
    </form>

    <div id = "container">
      <div id="result"></div>
    </div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Unidad</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formulario2" method="POST">
        <div class="form-row">
            <div class="form-group col-md-5">
                <label>Placas de Unidad</label>
                <input type="text" class="form-control" id="placas" name="placas" placeholder="Placas de la Unidad">
            </div>
            <div class="form-group col-md-4">
                <label>Rendimiento</label>
                <input type="number" class="form-control" id="rendimiento" name="rendimiento" placeholder="Rendimiento">
            </div>
            <div class="form-group col-md-2">
                <br>
                <button type="submit" id="enviar2" class="btn btn-primary" style ="height: 40px; width: 100PX; margin-top:5px;">Registar</button>
            </div>
        </div>
        
        </form>
        <div id = "container">
            <div id="result2"></div>
        </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>