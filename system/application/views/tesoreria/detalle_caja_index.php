<link href="<?=base_url();?>js/fancybox/dist/jquery.fancybox.css?=<?=CSS;?>" rel="stylesheet">
<script src="<?=base_url();?>js/fancybox/dist/jquery.fancybox.js?=<?=JS;?>"></script>

<div class="container-fluid">
    <div class="row header">
        <div class="col-md-12 col-lg-12">
        <center>
        <div><b><?=$caja_nombre;?></b></div>
        </center>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 pall-0">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 pall-0">
                    <div class="acciones">
                        <div id="botonBusqueda">
                            
                           <!--  <ul class="lista_botones">
                                <li id="nuevo" data-toggle='modal' data-target='#add_caja'>Caja</li>
                            </ul>
                            <ul id="limpiarC" class="lista_botones">
                                <li id="limpiar">Limpiar</li>
                            </ul>
                            <ul id="buscarC" class="lista_botones">
                                <li id="buscar">Buscar</li>
                            </ul>  -->
                            <ul id="verDocusC" class="lista_botones">
                                <li id="documento">Comprobantes</li>
                            </ul>
                            <ul id="movimientosC" class="lista_botones">
                                <li id="movimiento" data-toggle='modal' data-target='#add_movimiento'>Otros movimientos</li>
                            </ul>
                            <ul id="cajamovC" class="lista_botones">
                                <li id="movimientoCaja" data-toggle='modal' onclick="caja_movimiento()">Caja movimiento</li>
                            </ul> 
                            <script>
                                function caja_movimiento(){
                                    var url = base_url + "index.php/tesoreria/movimiento/movimientos/0";
                                    window.open(url, '_blank');
                                }
                            </script>  
                        </div>
                        <div id="lineaResultado">Registros encontrados</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 pall-0">
                    <div class="header text-align-center"><?=$titulo;?></div>
                </div>
            </div>
        </div>
    </div>
</div>
            </form>
        </div>
    </div>
</div>
<br>
<input type="hidden" id="id_caja" value="<?= $caja_id?>"> <!-- id de caja -->
<div>
    <div style="display: inline-block; margin-right: 20px;">
        <label for="fecha_ini">Fecha de apertura</label>
        <div><input id="fecha_ini" type="datetime" class="form-control" value="<?=$fecha_apertura;?>" readonly></div>
    </div>
    
    <div style="display: inline-block;">
        <label for="fecha_cierre">Fecha de cierre o actual</label>
        <div><input id="fecha_cierre" type="datetime" class="form-control" value="<?=$fecha_cierre;?>" readonly></div>
    </div>
</div>
<div id="chart_div" style="width: 40%; height: 400px;"></div>

<div style="position: relative; left: 100rem; bottom: 40rem;">
    <div>
        <label for="inp_inicial" style="color: orange;">MONTO INICIAL</label>
        <div><input id="inp_inicial" type="text" class="form-control" value="<?=$simbolo.$caja_chica;?>" style="width: 270px;" readonly></div>
    </div>
    <div>
        <label for="inp_ingresos">INGRESOS</label>
        <div><input id="inp_ingresos" type="text" class="form-control" value="<?=$simbolo.$ventas;?>" style="width: 270px;" readonly></div>
    </div>
    
    <div>
        <label for="inp_egresos" style="color: red;">EGRESOS</label>
        <div><input id="inp_egresos" type="text" class="form-control" value="<?=$simbolo.$egresos;?>"style="width: 270px;" readonly></div>
    </div>
    <br>
    <div>
        <label for="inp_total" style="color: green;">TOTAL VENTAS</label>
        <div><input id="inp_total_ventas" type="text" class="form-control" value="<?=$simbolo.$total_ventas;?>"style="width: 270px;" readonly></div>
    </div>
    <div>
        <label for="inp_total" style="color: blue;">BRUTO:</label>
        <div><input id="inp_total_bruto" type="text" class="form-control" value="<?=$simbolo.$total_bruto;?>"style="width: 270px;" readonly></div>
    </div>
</div>

<div id="add_movimiento" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog w-porc-60">
        <div class="modal-content">
            <form id="formMovimiento" method="POST">
            <input type="hidden" id="id_cierre" name="id_cierre" value="<?= $cierre_id?>">
                <div class="modal-header">
                    <h4 class="modal-title text-center"><span id="modal_titulo">REGISTRAR</span> MOVIMIENTO</h4>
                </div>
                <div class="modal-body panel panel-default">
                    <input type="hidden" id="movimiento" name="movimiento" value="">

                    <div class="row form-group">
                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <label for="caja">CAJA</label>
                            <select name="caja" id="caja" class="form-control w-porc-90 h-3"> <?php
                                if ($caja != NULL){
                                    foreach ($caja as $indice => $val){ ?>
                                        <option value="<?=$val->CAJA_Codigo;?>"><?=$val->CAJA_Nombre;?></option> <?php
                                    }
                                } ?>
                            </select>
                        </div>
                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <label for="tipo_movimiento">MOVIMIENTO</label>
                            <select name="tipo_movimiento" id="tipo_movimiento" class="form-control w-porc-90 h-3">
                                <option value="1">INGRESO</option>
                                <option value="2">SALIDA</option>
                            </select>
                        </div>

                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <label for="fecha">FECHA *</label>
                            <input type="date" id="fecha" name="fecha" class="form-control h-2" value=""/>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <label for="forma_pago">FORMA DE PAGO</label>
                            <select name="forma_pago" id="forma_pago" class="form-control w-porc-90 h-3"> <?php
                                if ($forma_pago != NULL){
                                    foreach ($forma_pago as $indice => $val){ ?>
                                        <option value="<?=$val->FORPAP_Codigo;?>"><?=$val->FORPAC_Descripcion;?></option> <?php
                                    }
                                } ?>
                            </select>
                        </div>

                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <label for="moneda">MONEDA</label>
                            <select name="moneda" id="moneda" class="form-control w-porc-90 h-3"> <?php
                                if ($moneda != NULL){
                                    foreach ($moneda as $indice => $val){ ?>
                                        <option value="<?=$val->MONED_Codigo;?>"><?="$val->MONED_Simbolo | $val->MONED_Descripcion";?></option> <?php
                                    }
                                } ?>
                            </select>
                        </div>

                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <label for="importe">MONTO *</label>
                            <input type="number" step="1" min="0" id="importe" name="importe" class="form-control h-2 w-porc-90" placeholder="Total" value=""/>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="justificacion">JUSTIFICACIÓN *</label>
                            <textarea class="form-control h-5" id="justificacion" name="justificacion" placeholder="Indique una justificación" maxlength="800"></textarea>
                        </div>
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="obs_movimiento">OBSERVACIÓN</label>
                            <textarea class="form-control h-5" id="obs_movimiento" name="obs_movimiento" placeholder="Indique una observación" maxlength="800"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success registrar_movimiento" accesskey="x" onclick="registrar_movimiento()">Guardar Registro</button>
                    <button type="button" class="btn btn-info" onclick="clean()">Limpiar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="modal_comCaja" class="modal fade" role="dialog">
    <div class="modal-dialog w-porc-90">
        <div class="modal-content">
            <form id="formCaja" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title text-center">DOCUMENTOS EMITIDOS</h4>
                    <div class="ml-auto">
                    <div class="btn-group">
                   
                        <table class="fuente8 display" id="table-compcaja" style="text-align: center;">
                        <div id="cargando_datos" class="loading-table">
                            <img src="<?=base_url().'images/loading.gif?='.IMG;?>">
                        </div>
                        <thead>
                            <tr class="cabeceraTabla">
                                <td style="width:0.5%" data-orderable="false">N°</td>
                                <td style="width:5%" data-orderable="true">F.EMISION</td>
                                <td style="width:5%" data-orderable="true">SERIE</td>
                                <td style="width:5%" data-orderable="true">NUMERO</td>
                                <td style="width:5%" data-orderable="true">TOTAL</td>
                                <td style="width:05%" data-orderable="true">ESTADO</td>
                                <td style="width:05%" data-orderable="false">NOTA DE CREDITO</td>
                                <td style="width:05%" data-orderable="false">DOCUMENTO</td>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                                                    
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-success" accesskey="x" onclick="registrar_caja()">Guardar Registro</button> -->
<!--                     <button type="button" class="btn btn-info" onclick="clean()">Limpiar</button>
 -->                    <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    $(document).ready(function(){

        $("#verDocusC").click(function(){
            var id_caja = $("#id_caja").val();
            var fechaini = $("#fecha_ini").val();
            var fecha_cier = $("#fecha_cierre").val();

            $("#modal_comCaja").modal("toggle");
                modalComprobantes(id_caja, fechaini, fecha_cier );
        });
    });

    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = [];
        data.push(['Forma de Pago', 'Cantidad', 'Suma S/', { role: 'style' } ]);

        <?php foreach ($forma_pagos as $val): ?>
            data.push(['<?= $val['descripcion']; ?>', <?= $val['cantidad']; ?>, <?= $val['suma']; ?>, 'color:#5DEA08 ; opacity: 0.5']);
        <?php endforeach; ?>

        var chartData = google.visualization.arrayToDataTable(data);

        var options = {
            title: 'Ventas por forma de pago',
            hAxis: { title: 'Formas de Pago', titleTextStyle: { color: '#333' } },
            vAxis: { minValue: 0 }
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(chartData, options);
    }

    function modalComprobantes(caja, fecha_ini, fecha_cierre){
        
       $('#table-compcaja').DataTable({ responsive: true,
            filter: false,
            destroy: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax:{
                    url : '<?=base_url();?>index.php/tesoreria/cajacierre/datatable_compcaja/'+caja +'/'+fecha_ini +'/'+fecha_cierre,
                    type: "POST",
                    data: { dataString: "" },
                    beforeSend: function(){
                        $("#table-compcaja .loading-table").show();
                    },
                    error: function(){
                    },
                    complete: function(){
                        $("#table-compcaja .loading-table").hide();
                    }
            },
            language: spanish,
            columnDefs: [{"className": "dt-center", "targets": 0}],
            order: [[ 1, "asc" ]]
        });
    }

    function ticket(comprobante) {
        var tipo = 'TICKET';
        let pdfUrl = base_url + "index.php/ventas/comprobante/comprobante_ver_pdf/" + comprobante + '/' + tipo;

        fetch(pdfUrl, {
            method: 'GET',
        })
        .then(response => response.blob())
        .then(blob => {
            const url = window.URL.createObjectURL(blob);
            $("#pdfFrame").attr("src", url);
            $("#modal_ticket2").modal("show");
            const a = document.createElement('a');
            a.href = url;
            a.download = 'TICKET.pdf';
            a.style.display = 'none';
            document.body.appendChild(a);
            a.click();
            a.onload = function() {
                window.URL.revokeObjectURL(url);
                document.body.removeChild(a);
            };
        })
        .catch(error => {
            console.error('Error:', error);
        });

    }

    function registrar_movimiento(){
        Swal.fire({
                    icon: "info",
                    title: "¿Esta seguro de guardar el registro?",
                    html: "<b class='color-red'></b>",
                    showConfirmButton: true,
                    showCancelButton: true,
                    confirmButtonText: "Aceptar",
                    cancelButtonText: "Cancelar"
                }).then(result => {
                    if (result.value){
                        var movimiento = $("#movimiento").val();
                        var fecha = $("#fecha").val();
                        var importe = $("#importe").val();
                        var justificacion = $("#justificacion").val();
                        validacion = true;

                        if (fecha == ""){
                            Swal.fire({
                                        icon: "error",
                                        title: "Verifique los datos ingresados.",
                                        html: "<b class='color-red'>Debe ingresar la fecha del movimiento.</b>",
                                        showConfirmButton: true,
                                        timer: 4000
                                    });
                            $("#fecha").focus();
                            validacion = false;
                            return null;
                        }

                        if (importe == ""){
                            Swal.fire({
                                        icon: "error",
                                        title: "Verifique los datos ingresados.",
                                        html: "<b class='color-red'>Debe ingresar el importe del movimiento.</b>",
                                        showConfirmButton: true,
                                        timer: 4000
                                    });
                            $("#importe").focus();
                            validacion = false;
                            return null;
                        }

                        if (justificacion == ""){
                            Swal.fire({
                                        icon: "error",
                                        title: "Verifique los datos ingresados.",
                                        html: "<b class='color-red'>Debe ingresar una justificación.</b>",
                                        showConfirmButton: true,
                                        timer: 4000
                                    });
                            $("#justificacion").focus();
                            validacion = false;
                            return null;
                        }

                        if (validacion == true){
                            var url = base_url + "index.php/tesoreria/movimiento/guardar_registro";
                            var info = $("#formMovimiento").serialize();
                            $.ajax({
                                type: 'POST',
                                url: url,
                                dataType: 'json',
                                data: info,
                                success: function(data){
                                    if (data.result == "success") {
                                        if (movimiento == "")
                                            titulo = "¡Registro exitoso!";
                                        else
                                            titulo = "¡Actualización exitosa!";

                                        Swal.fire({
                                            icon: "success",
                                            title: titulo,
                                            showConfirmButton: true,
                                            timer: 2000
                                        });

                                        clean();
                                        $("#limpiarC").click();
                                    }
                                    else{
                                        Swal.fire({
                                            icon: "error",
                                            title: "Sin cambios.",
                                            html: "<b class='color-red'>La información no fue registrada/actualizada, intentelo nuevamente.</b>",
                                            showConfirmButton: true,
                                            timer: 4000
                                        });
                                    }
                                },
                                complete: function(){
                                    $("#nombre_movimiento").focus();
                                }
                            });
                        }
                    }
                });
    }




</script>

