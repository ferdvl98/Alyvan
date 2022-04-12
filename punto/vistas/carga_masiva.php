<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div pre class="col-sm-6">
                <h1 class="m-0">Carga Masiva de Productos</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item active">Carga Masiva de Productos</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Seleccionar archivo de carga (Excel):</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div> <!-- ./ end card-tools -->
                    </div> <!-- ./ end card-header -->
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data" id="form_carga_productos">
                            <div class="row">
                                <div class="col-lg-10">
                                    <input type="file" name="fileProductos" id="fileProductos" class="form-control"
                                        accept=".xls, .xlsx">
                                </div>
                                <div class="col-lg-2">
                                    <input type="submit" value="Cargar Productos" class="btn btn-primary"
                                        id="btn_cargar">
                                </div>
                            </div>
                        </form>
                    </div> <!-- ./ end card-body -->
                </div>
            </div>
        </div>

        <div class="row mx-0">
            <div class="col-lg-12 mx-0 text-center">
                <img src="vistas/assets/imagenes/loading.gif" id="img_cargar" style="display:none;" alt="">
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

<script>
$(document).ready(function() {
    $('#form_carga_productos').on('submit', function(e) {
        e.preventDefault();
        //alert("entro");

        if ($("#fileProductos").get(0).files.length == 0) {
            Swal.fire({
                position: "center",
                icon: "warning",
                title: "Debe seleccionar un archivo (Excel)",
                showConfirmButton: false,
                timer: 2500
            })
        } else {
            var extensiones_permitidas = [".xls", ".xlsx"];
            var input_file_productos = $("#fileProductos");
            var exp_reg = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + extensiones_permitidas.join('|') +
                ")$");

            if (!exp_reg.test(input_file_productos.val().toLowerCase())) {
                Swal.fire({
                    position: "center",
                    icon: "warning",
                    title: "Debe seleccionar un archivo con extenion .xls o .xlsx",
                    showConfirmButton: false,
                    timer: 2500
                })
                return false;
            }
            //alert("si");
            var datos = new FormData($(form_carga_productos)[0]);

            $("#btn_cargar").prop("disabled", true);

            $("#img_cargar").attr("style", "display:block");
            $("#img_cargar").attr("style", "height:200px");
            $("#img_cargar").attr("style", "width:200px");

            $.ajax({
                    url:"ajax/productos.ajax.php",
                    type: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success:function(respuesta){

                        // console.log("respuesta",respuesta);

                        if(respuesta['totalCategorias'] > 0 && respuesta['totalProductos'] > 0 ){
                        Swal.fire({
                                position:'center',
                                icon:'success',
                                title: 'Se registraron ' + respuesta['totalCategorias']+ ' categorias y '+respuesta['totalProductos']+' productos correctamente!',
                                showConfirmButton: false,
                                timer: 2500
                            })

                            $("#btn_cargar").prop("disabled",false);
                            $("#img_cargar").attr("style","display:none");
                    }else{
                        Swal.fire({
                                position:'center',
                                icon:'error',
                                title: 'Se presento un error al momento de realizar el registro de categorías y/o productos!',
                                showConfirmButton: false,
                                timer: 2500
                            })

                            $("#btn_cargar").prop("disabled",false);
                            $("#img_cargar").attr("style","display:none");

                    }
                }

            });

        }


    })
});
</script>