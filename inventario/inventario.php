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



        var id = document.getElementById('selec').value;
        $("#selec").change(function(){
            var id = document.getElementById('selec').value;
            //alert(id);
            obtener_datos(id);

 

	      });

        var cli = document.getElementById('clientes').value;
        function totalv(a, id) {
          //var id = document.getElementById('selec').value;
          $.ajax({
            url: "total.php",
            method: "POST",
            data: {a:a, id:id},
            success: function(data) {
              $("#result1").html(data)
            }
          });
        }
        //Ver registros en la T4idabla
        function obtener_datos(id){
          $.ajax({
            url: "tabla.php?id="+id,
            method: "POST",
            success: function(data){
              $("#result").html(data)
            }
          })
          totalv(cli, id);
        }
        
      
        obtener_datos(id);
        function obtener_datos2(id, id2){
          $.ajax({
            url: "fechas.php",
            method: "POST",
            data: {id:id, id2:id2},
            success: function(data){
              $("#result2").html(data)
            }
          })
        }

        const input = document.querySelector('input');
        const log = document.getElementById('buscar');
        log.addEventListener('input', buscar);
        
        function buscar(e) {
          //alert(e);
          var cli = document.getElementById('clientes').value;
          var ord = document.getElementById('order').value;
          var id5 = document.getElementById('selec').value;//extraer el valor del select
          var id = $("#buscar").val();
          $.ajax({
              url: "buscar.php",
              method: "POST",
              data: {id:id, cli:cli, ord:ord, id5:id5},
              success: function(data){
                $("#result").html(data)
              }
            })
        }

        

        $("#clientes").change(function(){
          var cli = document.getElementById('clientes').value;
          var ord = document.getElementById('order').value;
          var id5 = document.getElementById('selec').value;//extraer el valor del select
          var id = $("#buscar").val();
          $.ajax({
              url: "buscar.php",
              method: "POST",
              data: {id:id, cli:cli, ord:ord, id5:id5},
              success: function(data){
                $("#result").html(data)
              }
            })
            totalv(cli, id5);           
            
	      });

        

        

         

        $("#order").change(function(){
          var id5 = document.getElementById('selec').value;//extraer el valor del select
          var cli = document.getElementById('clientes').value;
          var ord = document.getElementById('order').value;
          var id = $("#buscar").val();
          $.ajax({
              url: "buscar.php",
              method: "POST",
              data: {id:id, cli:cli, ord:ord, id5:id5},
              success: function(data){
                $("#result").html(data)
              }
            })
	      });
        var a =0;
        var id2 = document.getElementById('ES').value;
        $(document).on("click", "#ver", function(){
          var id =$(this).data("id");
          a = id;
          obtener_datos2(id, id2);
        });

      /*  $(document).on("click", "#down", function(){
          var id =$(this).data("id");
          $.ajax({
            url: "../excel/prueba.php",
            method: "POST",
            data: {id: id},
            success: function(data){
              //alert(data);
            }
          });
          
        });*/
        $(document).on("click", "#down", function(){
          var a = $(this).data("id");
          location.href='../excel/prueba.php?id=' + a;
        });

        function actualizar_datos(id, texto, a){
          //var id2 = document.getElementById('selec').value;
          var id5 = document.getElementById('selec').value;
          $.ajax({
            url: "actualizar-datos.php",
            method: "POST",
            data: {id: id, texto:texto, a:a},
            success: function(data){
              obtener_datos(id5);
              alert(data);
            }
          });
        }

        $(document).on("blur", "#nombre", function(){
          var id = $(this).data("id_nombre");
          var puesto = $(this).text();
          //alert(puesto);
          var a = 0;
          actualizar_datos(id, puesto, a);
        });

        $(document).on("blur", "#cajas", function(){
          var id = $(this).data("id_cajas");
          var puesto = $(this).text();
          //alert(puesto);
          var a = 1;
          actualizar_datos(id, puesto, a);
        });

        $(document).on("blur", "#precio", function(){
          var id = $(this).data("id_precio");
          var puesto = $(this).text();
          //alert(puesto);
          var a = 2;
          actualizar_datos(id, puesto, a);
        });
        $(document).on("blur", "#fecha_cad", function(){
          var id = $(this).data("fecha_cad");
          var puesto = $(this).text();
          //alert(puesto);
          var a = 6;
          actualizar_datos(id, puesto, a);
        });

        $(document).on("blur", "#des", function(){
          var id = $(this).data("id_des");
          var puesto = $(this).text();
          //alert(puesto);
          var a = 3;
          actualizar_datos(id, puesto, a);
        });

        $(document).on("blur", "#cd", function(){
          var id = $(this).data("id_cd");
          var puesto = $(this).text();
          //alert(puesto);
          var a = 4;
          actualizar_datos(id, puesto, a);
        });

        $(document).on("blur", "#lugar", function(){
          var id = $(this).data("id_lugar");
          var puesto = $(this).text();
          //alert(puesto);
          var a = 5;
          actualizar_datos(id, puesto, a);
        });

        $("#ES").change(function(){
          var id2 = document.getElementById('ES').value;
          obtener_datos2(a, id2);
	    });

      $(document).on("click", "#delete", function(){
            if(confirm("¿Esta seguro que quiere eliminar el producto?")){
            var id =$(this).data("id");
            var id5 = document.getElementById('selec').value;
            //alert(id);
            $.ajax({
              url: "eliminar.php",
              method: "POST",
              data: {id:id},
              success: function(data){
                obtener_datos(id5);
                alert(data);
              }
            })

          };
        })

      });
    </script>
</head>
<body>
  
  <select class="form-select" aria-label=".form-select-sm example" id="selec">
  <option value ="0" selected>Inventario</option>
  <option value="1">Cuarentena</option>
  
</select><br>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Buscar en Inventario</label>
      <input type="text" class="form-control" id="buscar" placeholder="Código de Barras, Descripción, Cliente">
    </div>

    <div class="form-group col-md-2">
      <label for="inputEmail4">Cliente</label>
      <select id="clientes" class="form-control" name="clientes" >
        <option value="0" selected>Todos</option>
        <?php
          $query = $link->query("SELECT * FROM `cliente`");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value = "'.$valores['id_cliente'].'">'.$valores['nom_cliente'];
          }
        ?>
      </select>
    </div>

    <div class="form-group col-md-2">
      <label for="inputEmail4">Ordenar por</label>
        <select id="order" class="form-control" name="order" >
          <option value="0" selected>Automático</option>
          <option value="1" >Descripción A-Z</option>
          <option value="2" >Descripción Z-A</option>
          <option value="3" >Precio 1-10</option>
          <option value="4" >Precio 10-1</option>
        </select>
    </div>
    <div class="form-group col-md-2">
    <br>
    <button type="button" class="btn btn-success" style ="height: 40px; width: 100PX; margin-top:5px;">Descargar</button>
    </div>
    
  </div>
<fieldset>
    <div id = "container">
    <div id="result1"></div>
      <div id="result"></div>
    </div>
  </fieldset>

  <!-- Modal -->
<div class="modal fade" style ='width:1100px;' id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style ='width:1100px;'>
    <div class="modal-content" style ='width:700px;'>
      <div class="modal-header" >
        <h5 class="modal-title" id="exampleModalLabel">Entradas / Salidas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body" >
          <select id="ES" class="form-control" name="ES" >
            <option value="0" >Ambas</option>
            <option value="1" selected>Entradas</option>
            <option value="2" >Salidas</option>
          </select>
       
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

<!-- Modal Cajas-->
<div class="modal fade" style ='width:1100px;' id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style ='width:1100px;'>
    <div class="modal-content" style ='width:700px;'>
      <div class="modal-header" >
        <h5 class="modal-title" id="exampleModalLabel">Recuperación</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body" >
          
       <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam perferendis deleniti, quaerat doloremque, harum ducimus possimus accusantium dicta quod labore, veritatis iure ea recusandae porro nobis fugit corporis qui minus!</p>
        
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