<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div pre class="col-sm-6">
                <h1 class="m-0">Tablero Principal</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item active">Tablero Principal</li>
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
            <!--TOTAL REGISTRADOS-->
            <div class="col-lg-2">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h4 id="totalProductos"></h4>
                        <p>Productos Registrados</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-clipboard"></i>
                    </div>
                    <a style="cursor:pointer;" class="small-box-footer">Más info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!--TOTAL COMPRAS-->
            <div class="col-lg-2">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h4 id="totalCompras"></h4>
                        <p>Total Compras</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-cash"></i>
                    </div>
                    <a style="cursor:pointer;" class="small-box-footer">Más info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!--TOTAL VENTAS-->
            <div class="col-lg-2">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h4 id="totalVentas"></h4>
                        <p>Total Ventas</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-clipboard"></i>
                    </div>
                    <a style="cursor:pointer;" class="small-box-footer">Más info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!--GANANCIAS-->
            <div class="col-lg-2">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h4 id="totalGanancias"></h4>
                        <p>Total Ganancias</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-clipboard"></i>
                    </div>
                    <a style="cursor:pointer;" class="small-box-footer">Más info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!--PRODUCTOS POCO ESTOCK-->
            <div class="col-lg-2">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h4 id="totalProductosMinStock"></h4>
                        <p>Productos poco Stock</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-clipboard"></i>
                    </div>
                    <a style="cursor:pointer;" class="small-box-footer">Más info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!--VENTAS DÍA ACTUAL-->
            <div class="col-lg-2">
                <div class="small-box bg-secondary">
                    <div class="inner">
                        <h4 id="totalventasHoy"></h4>
                        <p>Ventas de Día</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-clipboard"></i>
                    </div>
                    <a style="cursor:pointer;" class="small-box-footer">Más info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title" id="totalVM"></h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>

                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="barChart"
                                style="min-height: 250px; height:300px; max-height: 350px; width: 100%;">

                            </canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->


<script>
$(document).ready(function() {
    $.ajax({
        url: "ajax/dashboard.ajax.php",
        method: 'POST',
        dataType: 'json',
        success: function(respuesta) {
            console.log("respuesta", respuesta);
            $("#totalProductos").html(respuesta[0]['totalProducto']);
            $("#totalCompras").html(respuesta[0]['totalCompras'].toString().replace(
                /\d(?=(\d{3})+\.)/g, "$&,"));
            $("#totalVentas").html(respuesta[0]['totalVentas'].toString().replace(
                /\d(?=(\d{3})+\.)/g, "$&,"));
            $("#totalProductos").html(respuesta[0]['totalProducto']);
            $("#totalGanancias").html(respuesta[0]['ganancias'].toString().replace(
                /\d(?=(\d{3})+\.)/g, "$&,"));
            $("#totalProductosMinStock").html(respuesta[0]['productosPocoStock']);
            $("#totalventasHoy").html(respuesta[0]['ventasHoy'].toString().replace(
                /\d(?=(\d{3})+\.)/g, "$&,"));
        }
    });
    setInterval(() => {
        $.ajax({
            url: "ajax/dashboard.ajax.php",
            method: 'POST',
            dataType: 'json',
            success: function(respuesta) {
                console.log("respuesta", respuesta);
                $("#totalProductos").html(respuesta[0]['totalProducto']);
                $("#totalCompras").html(respuesta[0]['totalCompras'].toString().replace(
                    /\d(?=(\d{3})+\.)/g, "$&,"));
                $("#totalVentas").html(respuesta[0]['totalVentas'].toString().replace(
                    /\d(?=(\d{3})+\.)/g, "$&,"));
                $("#totalProductos").html(respuesta[0]['totalProducto']);
                $("#totalGanancias").html(respuesta[0]['ganancias'].toString().replace(
                    /\d(?=(\d{3})+\.)/g, "$&,"));
                $("#totalProductosMinStock").html(respuesta[0]['productosPocoStock']);
                $("#totalventasHoy").html(respuesta[0]['ventasHoy'].toString().replace(
                    /\d(?=(\d{3})+\.)/g, "$&,"));
            }
        });
    }, 10000);

    $.ajax({
        url: "ajax/dashboard.ajax.php",
        method: 'POST',
        data: {
            'accion': 1 //parametro para obtener ventas del mes
        },
        dataType: 'json',
        success: function(respuesta) {
            console.log("respuesta", respuesta);
            var fecha_venta = [];
            var total_venta = [];
            var total_venta_mes = 0;

            for (let i = 0; i < respuesta.length; i++) {
                fecha_venta.push(respuesta[i]['fecha_venta']);
                total_venta.push(respuesta[i]['total_venta']);
                total_venta_mes = parseFloat(total_venta_mes) + parseFloat(respuesta[i][
                    'total_venta'
                ]);
            }

            $('.card-title').html("Ventas del mes: " + parseFloat(total_venta_mes).toString()
                .replace(/\d(?=(\d{3})+\.)/g, "$&,"));

            var barChartCamvas = $('#barChart').get(0).getContext('2d');
            var areaChartData = {
                labels: fecha_venta,
                datasets: [{
                    label: 'Ventas del Mes',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    data: total_venta
                }]
            }
            var barChartData = $.extend(true, {}, areaChartData);

            var temp0 = areaChartData.datasets[0];

            barChartData.datasets[0] = temp0;

            var barChartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                events: false,
                legend: {
                    display: true
                },
                scales: {
                    xAxes: [{
                        stacked: true,
                    }],
                    yAxes: [{
                        stacked: true
                    }]
                },
                animation: {
                    duration: 500,
                    easing: "easeOutQuart",
                    onComplete: function() {
                        var ctx = this.chart.ctx;
                        ctx.font = Chart.helpers.fontString(Chart.defaults.global
                            .defaultFontFamily, 'normal',
                            Chart.defaults.global.defaultFontFamily);
                        ctx.textAlign = 'center';
                        ctx.textBaseline = 'bottom';

                        this.data.datasets.forEach(function(dataset) {
                            for (var i = 0; i < dataset.data.length; i++) {
                                var model = dataset._meta[Object.keys(dataset
                                        ._meta)[0]].data[i]._model,
                                    scale_max = dataset._meta[Object.keys(dataset
                                        ._meta)[0]].data[i]._yScale.maxHeight;
                                ctx.fillStyle = '#444';
                                var y_pos = model.y - 5;
                                // Make sure data value does not get overflown and hidden
                                // when the bar's value is too close to max value of scale
                                // Note: The y value is reverse, it counts from top down
                                if ((scale_max - model.y) / scale_max >= 0.93)
                                    y_pos = model.y + 20;
                                ctx.fillText(dataset.data[i], model.x, y_pos);
                            }
                        });
                    }
                }
            }
            new Chart(barChartCamvas, {
                type: 'bar',
                data: barChartData,
                options: barChartOptions
            })
        }
    });
})
</script>