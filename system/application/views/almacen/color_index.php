<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 pall-0">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 pall-0">
                <div class="acciones">
                    <div id="botonBusqueda">
                        <ul class="lista_botones">
                            <li id="nuevo" data-toggle='modal' data-target='#ColorRgistro_modal'>Nuevo color</li>
                        </ul>
                        <ul id="limpiarC" class="lista_botones">
                            <li id="limpiar">Limpiar tabla</li>
                        </ul>
                        <!--   <ul id="buscarC" class="lista_botones">
                                <li id="buscar">Buscar</li>
                            </ul> -->
                        <!-- <ul id="buscarC" class="lista_botones">
                                <li id="reload" onclick="location.reload()">recargar pagina</li>
                            </ul> -->
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
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 pall-0">
                <table class="fuente8 display" id="table-color">
                    <div id="cargando_datos" class="loading-table">
                        <img src="<?=base_url().'images/loading.gif?='.IMG;?>">
                    </div>
                    <thead>
                        <tr class="cabeceraTabla">
                            <th style="width:1%" data-orderable="true">N°</th>
                            <th style="width:3%" data-orderable="true">CODIGO</th>
                            <th style="width:5%" data-orderable="true">DESCRIPCION</th>
                            <!--                                 <th style="width:5%" data-orderable="true">CODIGO RGB</th>
 -->
                            <th style="width:2%" data-orderable="true">EDITAR</th>
                            <th style="width:2%" data-orderable="true">ELIMINAR</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div id="ColorRgistro_modal" class="modal fade modal_general" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="formColor" method="POST" action="guardar_color.php">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                </div>
                <input type="hidden" id="idcolor" name="idcolor" value="">
                <div style="text-align: center;">
                    <h3><b>REGISTRAR COLOR</b></h3>
                </div>
                <div class="row form-group" style="margin-left: 50px;">
                    <div class="col-sm-3 col-md-1 col-lg-1" id="divCodigo">
                        <label for="Codigocolor" class="form-inline">CODIGO</label>
                        <input type="text" name="Codigocolor" id="Codigocolor" value="" class="form-control"
                            autocomplete="off"/>
                    </div>
                   <!--  <div class="col-sm-3 col-md-1 col-lg-1" id="divCodOld" style="display: none;">
                        <label for="codOld" class="form-inline">CODIGO</label>
                        <input type="text" name="codOld" id="codOld" value="" class="form-control"/>
                    </div> -->
                    <div class="col-sm-3 col-md-4 col-lg-4" style="color: green; margin-left: 50px;">
                        <label for="txtColor">DESCRIPCION</label>
                        <input type="text" name="txtColor" id="txtColor" value="" placeholder="Nombre del color"
                            class="form-control" autocomplete="off" required />
                    </div>
                </div>
                <div class="row form-group" style="margin-left: 50px;">
                    <div class="col-sm-3 col-md-4 col-lg-4">
                        <label for="red">Rojo:</label>
                        <input type="number" id="red" name="red" min="0" max="255" value="255" class="form-control">
                    </div>
                    <div class="col-sm-3 col-md-4 col-lg-4">
                        <label for="green">Verde:</label>
                        <input type="number" id="green" name="green" min="0" max="255" value="255" class="form-control">
                    </div>
                    <div class="col-sm-3 col-md-4 col-lg-4">
                        <label for="blue">Azul:</label>
                        <input type="number" id="blue" name="blue" min="0" max="255" value="255" class="form-control">
                    </div>
                </div>
                <div class="row form-group" style="text-align: center;">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="color-box" id="colorBox"
                            style="width: 100px; height: 100px; margin: 0 auto; border: 1px solid #000;"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="location.reload()">limpiar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
                    <button type="button" class="btn btn-info" onclick="registrar_color()">Registrar color</button>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
    .color-box {
    width: 100px;
    height: 100px;
    margin: 0 auto;
    border: 1px solid #000;
}
</style>


<script type="text/javascript">
$(document).ready(function() {
    $('#table-color').DataTable({
        responsive: true,
        filter: false,
        destroy: true,
        processing: true,
        serverSide: true,
        autoWidth: false,
        ajax: {
            url: '<?=base_url();?>index.php/almacen/color/datatable_color/',
            type: "POST",
            data: {
                dataString: ""
            },
            beforeSend: function() {
                $("#table-caja .loading-table").show();
            },
            error: function() {},
            complete: function() {
                $("#table-caja .loading-table").hide();
            }
        },
        language: spanish,
        columnDefs: [{
            "className": "dt-center",
            "targets": 0
        }],
        order: [
            [1, "asc"]
        ],
    });

    $("#limpiarC").click(function() {
        search(false);
    });

    /* function generarCodigo() {
        var url = '<?=base_url();?>index.php/almacen/color/obtenerUltimocodigo/';
        $.ajax({
            url: url,
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                var info = response.data;
                if (info == null) {
                    $('#Codigocolor').val('01');
                } else {
                    $('#Codigocolor').val(info.siguienteCorrelativo);
                }

            },
            error: function() {
                console.error('Error al obtener el siguiente correlativo');
            }
        });
    } */

    // Generar el código del producto al abrir el modal
   /*  $('#ColorRgistro_modal').on('show.bs.modal', function() {
        generarCodigo();
    }); */



});

function updateColor() {
        var red = document.getElementById('red').value;
        var green = document.getElementById('green').value;
        var blue = document.getElementById('blue').value;
        var colorBox = document.getElementById('colorBox');
        var rgbColor = 'rgb(' + red + ',' + green + ',' + blue + ')';
        colorBox.style.backgroundColor = rgbColor;
    }

    document.getElementById('red').addEventListener('input', updateColor);
    document.getElementById('green').addEventListener('input', updateColor);
    document.getElementById('blue').addEventListener('input', updateColor);


function registrar_color() {
    /* $('#divCodOld').hide();
    $('#divCodigo').show(); */
    Swal.fire({
        icon: "info",
        title: "¿Esta seguro de guardar el registro?",
        html: "<b class='color-red'></b>",
        showConfirmButton: true,
        showCancelButton: true,
        confirmButtonText: "Aceptar",
        cancelButtonText: "Cancelar"
    }).then(result => {
        var info = $("#formColor").serialize();   
        var url = '<?=base_url();?>index.php/almacen/color/guardar_registro/';
        
        var modelo = $("#idcolor").val();
        var descripcion = $('#txtColor').val();
        var codigo_usu = $('#Codigocolor').val();

        if (descripcion == '') {
            Swal.fire({
                icon: "warning",
                title: 'Algo salio mal, revise los datos',
                showConfirmButton: true,
                timer: 2000
            });
            return;
        }
        if (codigo_usu == '') {
            Swal.fire({
                icon: "warning",
                title: 'algo salio mal, revise los datos :(',
                showConfirmButton: true,
                timer: 2000
            });
            return;
        }

        $.ajax({
            type: 'POST',
            url: url,
            data: info,
            dataType: 'json',
            success: function(data) {
                if (data.result == "success") {
                    if (modelo == "")
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

                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Sin cambios.",
                        html: "<b class='color-red'>La información no fue registrada/actualizada, intentelo nuevamente.</b>",
                        showConfirmButton: true,
                        timer: 4000
                    });

                }
            }
        });
        dataType: 'json'
    });
}

function editar(id) {
    var url = '<?=base_url();?>index.php/almacen/color/getColor/' + id
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function(data) {
            var info = data.data;
            $("#idcolor").val(info[0].COLOR_id);
            $("#Codigocolor").val(info[0].COLOR_codInterno);
            $("#txtColor").val(info[0].COLOR_Nombre);

            $("#red").val(info[0].COLOR_red);
            $("#green").val(info[0].COLOR_green);
            $("#blue").val(info[0].COLOR_blue);

            updateColor();

            $("#ColorRgistro_modal").modal("toggle");
        },
    });

}

function deshabilitar(id) {
    Swal.fire({
        icon: "warning",
        title: "¿Está seguro de eliminar este registro?",
        showConfirmButton: true,
        showCancelButton: true,
        confirmButtonText: "Aceptar",
        cancelButtonText: "Cancelar"
    }).then(result => {
        if (result.isConfirmed) {
            var url = '<?=base_url();?>index.php/almacen/color/deshabilitar_color/' + id;
            $.ajax({
                type: 'POST',
                url: url,
                dataType: 'json',
                success: function(data) {
                    if (data.result == "success") {
                        Swal.fire({
                            icon: "warning",
                            title: 'Algo Salio mal',
                            showConfirmButton: true,
                            timer: 2000
                        });
                    } else {
                        Swal.fire({
                            icon: "success",
                            title: 'Registro eliminado',
                            showConfirmButton: true,
                            timer: 2000
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                        icon: "error",
                        title: 'Error en la solicitud',
                        showConfirmButton: true,
                        timer: 2000
                    });
                }
            });
        }
    });
}


function search(search = true) {
    if (search == true) {
        search_codigo = $("#Codigocolor").val();
        search_descripcion = $("#txtColor").val();
    } else {
        $("#Codigocolor").val("");
        $("#txtColor").val("");
        search_codigo = "";
        search_descripcion = "";
        search_tipo = "";
    }

    $('#table-color').DataTable({
        responsive: true,
        filter: false,
        destroy: true,
        processing: true,
        serverSide: true,
        ajax: {
            url: '<?=base_url();?>index.php/almacen/color/datatable_color/',
            type: "POST",
            data: {
                codigo: search_codigo,
                descripcion: search_descripcion,
                tipo: search_tipo,
            },
            beforeSend: function() {
                $("#table-modleo .loading-table").show();
            },
            error: function() {},
            complete: function() {
                $("#table-color .loading-table").hide();
            }
        },
        language: spanish,
        columnDefs: [{
            "className": "dt-center",
            "targets": 0
        }],

    });
}

function clean() {
    $("#txtColor").val('');
    $("#idcolor").val('');
}
</script>