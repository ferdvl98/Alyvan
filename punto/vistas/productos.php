<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div pre class="col-sm-6">
                <h1 class="m-0">Inventario / Productos</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item active">Inventario / Productos</li>
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
                        <h3 class="card-title">Criterios de busqueda</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool text-danger" id="btnLimparBusqueda">
                                <i class="fas fa-times"></i>
                            </button>
                        </div> <!-- ./ end card-tools -->
                    </div> <!-- ./ end card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 d-lg-flex">
                                <div style="width: 20%" class="form-floating mx-1">
                                    <input type="text" name="" id="iptCodigoBarras" class="form-control"
                                        placeholder="Código de Barras" data-index="2">
                                    <label for="iptCodigoBarras">Código de Barras</label>
                                </div>
                                <div style="width: 20%" class="form-floating mx-1">
                                    <input type="text" name="" id="iptCategoria" class="form-control"
                                        placeholder="Categoria" data-index="4">
                                    <label for="iptCategoria">Categoria</label>
                                </div>
                                <div style="width: 20%" class="form-floating mx-1">
                                    <input type="text" name="" id="iptProducto" class="form-control"
                                        placeholder="Producto" data-index="5">
                                    <label for="iptProducto">Producto</label>
                                </div>
                                <div style="width: 20%" class="form-floating mx-1">
                                    <input type="text" name="" id="iptPrecioVentaDesde" class="form-control"
                                        placeholder="P. Venta Desde">
                                    <label for="iptPrecioVentaDesde">P. Venta Desde</label>
                                </div>
                                <div style="width: 20%" class="form-floating mx-1">
                                    <input type="text" name="" id="iptPrecioVentaHasta" class="form-control"
                                        placeholder="P. Venta Hasta">
                                    <label for="iptPrecioVentaHasta">P. Venta Hasta</label>
                                </div>
                            </div>
                        </div>
                    </div> <!-- ./ end card-body -->
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <table id="tblProductos" class="table table-striped w-100 shadow ">
                    <thead class="bg-info">
                        <tr>
                            <th></th>
                            <th>Id</th>
                            <th>Codigo</th>
                            <th>Id Categoria</th>
                            <th>Categoria</th>
                            <th>Producto</th>
                            <th>P. Compra</th>
                            <th>P. Venta</th>
                            <th>Utilidad</th>
                            <th>Stock</th>
                            <th>Min. Stock</th>
                            <th>Ventas</th>
                            <th>Fecha Creacion</th>
                            <th>Fecha Actualizacion</th>
                            <th calss="text-center">Opciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-small">

                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

<div class="modal fade" id="mdlGestionarProducto" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-gray py-1 align-items-center">
                <h5 class="modal-title">Agregar Producto</h5>
                <button type="button" class="btn btn-outline-primary text-white border-0 fs-5" id="btnCerrarModal">
                    <i class="far fa-times-circle"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group mb-2">
                            <label class="" for="iptCodigoReg"><i class="fas fa-barcode fs-6"></i>
                                <span class="small">Código de Barras</span><span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control form-control-sm" id="iptCodigoReg"
                                name="iptCodigoReg" placeholder="Código de Barras" required>
                            <span id="validate_codigo" class="text-danger small fst-italic" style="display:none;">
                                Debe Ingresar el Código de Barras</span>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group mb-2">
                            <label class="" for="iptCategoriaReg"><i class="fas fa-dumpster fs-6"></i>
                                <span class="small">Categoria</span><span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control form-control-sm" id="iptCategoriaReg"
                                name="iptCategoriaReg" placeholder="Categoria" required>
                            <span id="validate_categoria" class="text-danger small fst-italic" style="display:none;">
                                Debe Ingresar la Categoria</span>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group mb-2">
                            <label class="" for="iptDescripcionReg"><i class="fas fa-file-signature fs-6"></i>
                                <span class="small">Descripción</span><span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control form-control-sm" id="iptDescripcionReg"
                                name="iptDescripcionReg" placeholder="Descripcion" required>
                            <span id="validate_descripcion" class="text-danger small fst-italic" style="display:none;">
                                Debe Ingresar la Descripción del Producto</span>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group mb-2">
                            <label class="" for="iptPrecioCompraReg"><i class="fas fa-dollar-sign fs-6"></i>
                                <span class="small">Precio de Compra</span><span class="text-danger">*</span>
                            </label>
                            <input type="number" min="0" class="form-control form-control-sm" id="iptPrecioCompraReg"
                                name="iptPrecioCompraReg" placeholder="Precio de Compra" required>
                            <span id="validate_precio_compra" class="text-danger small fst-italic"
                                style="display:none;">
                                Debe Ingresar el Precio de Compra del Producto</span>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group mb-2">
                            <label class="" for="iptPrecioVentaReg"><i class="fas fa-dollar-sign fs-6"></i>
                                <span class="small">Precio de Venta</span><span class="text-danger">*</span>
                            </label>
                            <input type="number" min="0" class="form-control form-control-sm" id="iptPrecioVentaReg"
                                name="iptPrecioVentaReg" placeholder="Precio de Venta" required>
                            <span id="validate_precio_venta" class="text-danger small fst-italic" style="display:none;">
                                Debe Ingresar el Precio de Venta del Producto</span>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group mb-2">
                            <label class="" for="iptUtilidadReg"><i class="fas fa-dollar-sign fs-6"></i>
                                <span class="small">Utilidad</span><span class="text-danger">*</span>
                            </label>
                            <input type="number" min="0" class="form-control form-control-sm" id="iptUtilidadReg"
                                name="iptUtilidadReg" placeholder="Utilidad" disabled>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group mb-2">
                            <label class="" for="iptStockReg"><i class="fas fa-plus-circle fs-6"></i>
                                <span class="small">Stock</span><span class="text-danger">*</span>
                            </label>
                            <input type="number" min="0" class="form-control form-control-sm" id="iptStockReg"
                                name="iptStockReg" placeholder="Stock" required>
                            <span id="validate_stock" class="text-danger small fst-italic" style="display:none;">
                                Debe Ingresar el Stock del Producto</span>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group mb-2">
                            <label class="" for="iptMinimoStockReg"><i class="fas fa-minus-circle fs-6"></i>
                                <span class="small">Stock Mínimo</span><span class="text-danger">*</span>
                            </label>
                            <input type="number" min="0" class="form-control form-control-sm" id="iptMinimoStockReg"
                                name="iptMinimoStockReg" placeholder="Stock Mínimo" required>
                            <span id="validate_stock" class="text-danger small fst-italic" style="display:none;">
                                Debe Ingresar el Stock Mínimo del Producto</span>
                        </div>
                    </div>

                    <button type="button" class="btn btn-danger mt-3 mx-2" style="width: 170px;" data-bs-dismiss="modal"
                        id="btnCancelarRegistro">Cancelar</button>

                    <button type="button" class="btn btn-primary mt-3 mx-2" style="width: 170px;"
                        id="btnGuardarRegistro" onclick="formSubmitClick()">Guardar Producto</button>

                </div>
            </div>
        </div>
    </div>
</div>


<script>
$(document).ready(function() {
    $.ajax({
        url: "ajax/productos.ajax.php",
        type: "POST",
        data: {
            'accion': 1
        },
        dataType: 'json',
        success: function(respuesta) {
            console.log("respuesta", respuesta);
        }
    });
    var table = $("#tblProductos").DataTable({
        dom: 'Bfrtip',
        buttons: [{
                text: 'Agregar Producto',
                className: 'addNewRecord',
                action: function(e, dt, node, config) {
                    $("#mdlGestionarProducto").modal('show');
                }
            },
            'excel', 'print', 'pageLength'
        ],
        pageLength: [5, 10, 15, 30, 50, 100, 200],
        pageLength: 10,
        ajax: {
            url: "ajax/productos.ajax.php",
            dataSrc: '',
            type: "POST",
            data: {
                'accion': 1
            },
        },
        responsive: {
            details: {
                type: 'column'
            }

        },
        columnDefs: [{
                targets: 0,
                orderable: false,
                className: 'control'
            },
            {
                targets: 1,
                visible: false,
            },
            {
                targets: 3,
                visible: false,
            },
            {
                targets: 9,
                createdCell: function(td, cellData, rowData, row, col) {
                    if (parseFloat(rowData[9]) <= parseFloat(rowData[10])) {
                        $(td).parent().css('background', '#FF5733')
                    }
                }
            },
            {
                targets: 11,
                visible: false,
            },
            {
                targets: 12,
                visible: false,
            },
            {
                targets: 13,
                visible: false,
            },
            {
                targets: 14,
                orderable: false,
                render: function(datqa, type, full, meta) {
                    return "<center>" +
                        "<span class ='btnEditarProducto text-primary px-1' style='cursor:pointer';>" +
                        "<i class='fas fa-pencil-alt fs-5'><i/>" +
                        "<span/>" +
                        "<span class ='btnAumentarStock text-success px-1' style='cursor:pointer';>" +
                        "<i class='fas fa-plus-circle fs-5'><i/>" +
                        "<span/>" +
                        "<span class ='btnDisminuirStock text-warning px-1' style='cursor:pointer';>" +
                        "<i class='fas fa-minus-circle fs-5'><i/>" +
                        "<span/>" +
                        "<span class ='btnEliminarProducto text-danger px-1' style='cursor:pointer';>" +
                        "<i class='fas fa-trash fs-5'><i/>" +
                        "<span/>" +

                        "<center/>"


                }
            }
        ],
        languaje: {
            url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        }
    });

    $("#iptCodigoBarras").keyup(function() {
        table.column($(this).data('index')).search(this.value).draw();
    })
    $("#iptCategoria").keyup(function() {
        table.column($(this).data('index')).search(this.value).draw();
    })
    $("#iptProducto").keyup(function() {
        table.column($(this).data('index')).search(this.value).draw();
    })

    $("#iptPrecioVentaDesde, #iptPrecioVentaHasta").keyup(function() {
        table.draw();
    })

    $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
            var preciodesde = parseFloat($("#iptPrecioVentaDesde").val());
            var preciohasta = parseFloat($("#iptPrecioVentaHasta").val());

            var colvanta = parseFloat(data[7]);

            if ((isNaN(preciodesde) && isNaN(preciohasta)) ||
                (isNaN(preciodesde) && colvanta <= preciohasta) ||
                (preciodesde <= colvanta && isNaN(preciohasta)) ||
                (preciodesde <= colvanta && colvanta <= preciohasta)) {
                return true;
            }
            return false;
        }
    )
    $("#btnLimparBusqueda").on('click', function() {
        $("#iptCodigoBarras").val('');
        $("#iptCategoria").val('');
        $("#iptProducto").val('');
        $("#iptPrecioVentaDesde").val('');
        $("#iptPrecioVentaHasta").val('');

        table.search(' ').columns().search(' ').draw();
    })
})
</script>