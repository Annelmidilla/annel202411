<link href="<?=base_url();?>js/fancybox/dist/jquery.fancybox.css?=<?=CSS;?>" rel="stylesheet">
<script src="<?=base_url();?>js/fancybox/dist/jquery.fancybox.js?=<?=JS;?>"></script>

<div class="container-fluid">
    <div class="row header">
        <div class="col-md-12 col-lg-12">
            <div><?=$titulo;?></div>
        </div>
    </div>
    <form id="form_busqueda" method="post">
        <div class="row fuente8 py-1">
            <div class="col-sm-4 col-md-4 col-lg-4"></div>
            <div class="col-sm-2 col-md-2 col-lg-2">
                <input type="text" name="search_codigo" id="search_codigo" value="" placeholder="Código de caja" class="form-control h-1 w-porc-90"/>
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2">
                <input type="text" name="search_descripcion" id="search_descripcion" value="" placeholder="Nombre de la caja" class="form-control h-1 w-porc-90"/>
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2">
                <select name="search_tipo" id="search_tipo" class="form-control w-porc-90 h-2 w-porc-90">
                    <option value=""> :: TODAS :: </option> <?php
                    if ($tipo_caja != NULL){
                        foreach ($tipo_caja as $indice => $val){ ?>
                            <option value="<?=$val->tipCa_codigo;?>"><?=$val->tipCa_Descripcion;?></option> <?php
                        }
                    } ?>
                </select>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 pall-0">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 pall-0">
                    <div class="acciones">
                        <div id="botonBusqueda">
                            <ul class="lista_botones">
                                <li id="nuevo" data-toggle='modal' data-target='#add_caja'>Caja</li>
                            </ul>
                            <ul id="limpiarC" class="lista_botones">
                                <li id="limpiar">Limpiar</li>
                            </ul>
                            <ul id="buscarC" class="lista_botones">
                                <li id="buscar">Buscar</li>
                            </ul> 
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
                    <table class="fuente8 display" id="table-caja">
                        <div id="cargando_datos" class="loading-table">
                            <img src="<?=base_url().'images/loading.gif?='.IMG;?>">
                        </div>
                        <thead>
                            <tr class="cabeceraTabla">
                                <td style="width:10%" data-orderable="false">N°</td>
                                <td style="width:10%" data-orderable="true">CÓDIGO</td>
                                <td style="width:25%" data-orderable="true">NOMBRE</td>
                                <td style="width:15%" data-orderable="true">TIPO DE CAJA</td>
                                <td style="width:30%" data-orderable="true">CAJERO</td>
                                <td style="width:30%" data-orderable="true">OBSERVACIONES</td>
                                <td style="width:05%" data-orderable="false">Estado de caja</td>
                                <td style="width:05%" data-orderable="false"></td>
                                <td style="width:05%" data-orderable="false"></td>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="add_caja" class="modal fade" role="dialog">
    <div class="modal-dialog w-porc-60">
        <div class="modal-content">
            <form id="formCaja" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title text-center">REGISTRAR CAJA</h4>
                </div>
                <div class="modal-body panel panel-default">
                    <input type="hidden" id="caja" name="caja" value="">

                    <div class="row form-group">
                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <label for="codigo_caja">CÓDIGO</label>
                            <input type="text" id="codigo_caja" name="codigo_caja" class="form-control h-2 w-porc-90" placeholder="Indique el codigo" value="" maxlength="30">
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <label for="nombre_caja">NOMBRE *</label>
                            <input type="text" id="nombre_caja" name="nombre_caja" class="form-control h-2" placeholder="Indique la caja" value="" maxlength="200">
                        </div>

                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <label for="tipo_caja">TIPO</label>
                            <select name="tipo_caja" id="tipo_caja" class="form-control w-porc-90 h-3"> <?php
                                if ($tipo_caja != NULL){
                                    foreach ($tipo_caja as $indice => $val){ ?>
                                        <option value="<?=$val->tipCa_codigo;?>"><?=$val->tipCa_Descripcion;?></option> <?php
                                    }
                                } ?>
                            </select>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <label for="cajero_caja">CAJERO</label>
                            <?php
                            if($rolusu != 1 || $rolusu != 7000){
                                
                            ?>
                                <select name="cajero_caja" id="cajero_caja" class="form-control w-porc-90 h-3"> 
                                    <option value="">:Seleccione::</option>
                                    <?php
                                    if($cajeros != NULL){
                                        foreach($cajeros as $value){
                                            ?>
                                            <option value="<?php echo $value->USUA_Codigo;?>"><?php echo $value->PERSC_Nombre." ".$value->PERSC_ApellidoPaterno." ".$value->PERSC_ApellidoMaterno;?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            <?php
                            }
                            else{
                                ?>
                                    <input type="hidden" id="cajero_caja" name="cajero_caja">
                                    <input type="text" id="nombrecajero_caja" name="nombrecajero_caja" class="form-control w-porc-90 h-3" 
                                           placeholder="Nombre cajero">
                                <?php
                            }
                            ?>
                        </div>
                       
                        <div class="col-md-12 col-lg-6" style="width: 20%;">
                        <label for="monedaC">MOENDA</label>
                            <select name="monedaC" id="monedaC" class="form-control w-porc-90 h-3" >
                                <option value="1">SOLES</option>
                                <option value="2">DOLARES AMERICANOS</option>
                            </select>
                        </div>    
                    </div>

                    <div class="row form-group">
                        <div class="col-sm-10 col-md-10 col-lg-10">
                            <label for="obs_caja">OBSERVACIONES</label>
                            <textarea class="form-control h-5" id="obs_caja" name="obs_caja" placeholder="Indique las observaciones" maxlength="800"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" accesskey="x" onclick="registrar_caja()">Guardar Registro</button>
                    <button type="button" class="btn btn-info" onclick="clean()">Limpiar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="admin_caja" class="modal fade" role="dialog">
    <div class="modal-dialog w-porc-90">
        <div class="modal-content">
            <form id="formCaja" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title text-center">ADMINISTRAR CAJA</h4>
                    <div class="ml-auto">
                    <div class="btn-group">
                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">
                    <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5z"/>
                    <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0"/>
                    </svg>OPCIONES
                    </button>
                        <div id="opcioenes_apertura" class="dropdown-menu">
                            <a class="dropdown-item" href="#" style="color: #547119;" onclick="AperturarCaja()">ABRIR CAJA</a>/
                            <a class="dropdown-item" href="#" style="color: #2397F7;" onclick="MontoInicial()">MONTO INICIAL</a>
                           
                        </div>
                        <div id="opcioenes_cierre" class="dropdown-menu" hidden>
                            <a class="dropdown-item" href="#" style="color: #FF1111;" onclick="CierreCaja()">CERRAR CAJA</a>
                            <a class="dropdown-item" href="#"></a>
                           
                        </div>
                    </div>
                    <button id="name_caja" type="button" class="btn btn-success" style="position: relative; left:90%">
                        CAJA APERTURADA
                    </button>
                    <button id="caja_null" type="button" class="btn btn-danger" style="display: none; position: relative; left:90%">
                        CAJA CERRADA
                    </button>
                    <style>
                        @keyframes blink {
                            0% { opacity: 1; }
                            50% { opacity: 0; }
                            100% { opacity: 1; }
                        }

                        @keyframes glow {
                            0% { box-shadow: 0 0 10px 0 rgba(0, 255, 0, 0.7); }
                            50% { box-shadow: 0 0 20px 10px rgba(0, 255, 0, 0.4); }
                            100% { box-shadow: 0 0 10px 0 rgba(0, 255, 0, 0.7); }
                        }

                        @keyframes blink_null {
                            0% { opacity: 1; }
                            50% { opacity: 0; }
                            100% { opacity: 1; }
                        }

                        @keyframes glow_null {
                            0% { box-shadow: 0 0 10px 0 rgba(255, 0, 0, 0.7); }
                            50% { box-shadow: 0 0 20px 10px rgba(255, 0, 0, 0.4); }
                            100% { box-shadow: 0 0 10px 0 rgba(255, 0, 0, 0.7); }
                        }

                        #name_caja {
                            animation: blink 3s infinite, glow 5s infinite;
                            position: relative;
                            left: 10vw;
                        }

                        #caja_null {
                            animation: blink_null 3s infinite, glow_null 5s infinite;
                            background-color: red;
                        }

                        @media (max-width: 767px) {
                            /* Estilos para pantallas más pequeñas */
                            #name_caja {
                                left: 5vw;
                            }
                        }

                        @media (min-width: 1200px) {
                            /* Estilos para pantallas más grandes */
                            #name_caja {
                                left: 85vw;
                            }
                        }
                    </style>

                    </div>
                </div>
    
                <div class="modal-body panel panel-default">
                    <input type="hidden" id="caja_2" name="caja_2" value="">

                    <div class="row form-group">
                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <label for="Acodigo_caja">CÓDIGO</label>
                            <input type="text" id="Acodigo_caja" name="codigo_caja" class="form-control h-2 w-porc-90" placeholder="Indique el codigo" value="" maxlength="30" readonly>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <label for="Anombre_caja">NOMBRE</label>
                            <input type="text" id="Anombre_caja" name="Anombre_caja" class="form-control h-2" placeholder="Indique la caja" value="" maxlength="30" readonly>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <label for="Anombre_caja">RESPONSABLE</label>
                            <input type="text" id="Acajero_caja" name="Anombre_caja" class="form-control h-2" placeholder="responsable" value="" maxlength="200" readonly>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <label for="monto_ini">MONTO INICIAL</label>
                            <input type="text" id="monto_ini" name="monto_ini" class="form-control h-2" placeholder="0.00" value="" maxlength="200" readonly style="width: 50px;">
                        </div>
                       <!--  <div class="col-sm-4 col-md-4 col-lg-4">
                            <label for="caja_ingreso">INGRESOS</label>
                            <b><input type="text" id="caja_ingreso" name="caja_ingreso" class="form-control h-2" placeholder="0.00" value="" maxlength="200" style="color: #547119;" readonly></b>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <label for="Anombre_caja">EGRESOS</label>
                            <b><input type="text" id="caja_egreso" name="caja_egreso" class="form-control h-2" placeholder="0.00" value="" maxlength="200" style="color: #FF4D4D;" readonly></b>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <label for="caja_saldo">SALDO</label>
                            <b><input type="text" id="caja_saldo" name="caja_saldo" class="form-control h-2" placeholder="0.00" value="" maxlength="200" readonly> </b>
                        </div> -->
                       
                        <div class="row form-group header">
                            <div class="col-sm-11 col-md-11 col-lg-11">
                               
                                <input type="hidden" id="id" name="id"/>
                                <input type="hidden" id="flagB_S" name="flagB_S" value="<?=$flagBS;?>"/>
                            </div>
                        </div>
                        <br>
                        <div>
                            <label for="filtro_fecha">Fecha de Emsion</label>
                            <input id="filtro_fecha" type="date" class="form-control h-2" style="width: 40rem;">
                        </div>
                        <div>
                            <li id="buscarCierre" class="btn btn-info">Filtrar</li>
                        </div>
                        <table class="fuente8 display" id="table-cierre" style="text-align: center;">
                        <div id="cargando_datos" class="loading-table">
                            <img src="<?=base_url().'images/loading.gif?='.IMG;?>">
                        </div>
                        <thead>
                            <tr class="cabeceraTabla">
                                <td style="width:0.5%" data-orderable="false">N°</td>
                                <td style="width:10%" data-orderable="true">F.APERTURA</td>
                                <td style="width:10%" data-orderable="true">F.CIERRE</td>
                                <td style="width:15%" data-orderable="true">CAJERO</td>
                                <td style="width:30%" data-orderable="true" title="este vendedor empezo con este monto">CAJA CHICA</td>
                                <td style="width:30%" data-orderable="true">OBSERVACIONES</td>
                                <td style="width:05%" data-orderable="false">CERRAR CAJA </td>
                                <td style="width:05%" data-orderable="false">CUADRE </td>
                                <td style="width:05%" data-orderable="false">DETALLE CIERRE</td>

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

<script type="text/javascript">
    base_url = "<?=$base_url;?>";
   
    $(document).ready(function(){
        

        $('#table-caja').DataTable({ responsive: true,
            filter: false,
            destroy: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax:{
                    url : '<?=base_url();?>index.php/tesoreria/caja/datatable_caja/',
                    type: "POST",
                    data: { dataString: "" },
                    beforeSend: function(){
                        $("#table-caja .loading-table").show();
                    },
                    error: function(){
                    },
                    complete: function(){
                        $("#table-caja .loading-table").hide();
                    }
            },
            language: spanish,
            columnDefs: [{"className": "dt-center", "targets": 0}],
            order: [[ 1, "asc" ]]
        });

        $("#buscarC").click(function(){
            search();
        });

       
        $("#buscarCierre").click(function(){
            var id = $("#caja_2").val();
            searchCierre(search= true,id);
        });

        $('#filtro_fecha').keyup(function(e){
            if ( e.which == 13 ){
                if( $(this).val() != '' )
                var id = $("#caja_2").val();
                searchCierre(search=true,id);
            }
        });

        $("#limpiarC").click(function(){
            search(false);
        });

        $('#form_busqueda').keypress(function(e){
            if ( e.which == 13 ){
                return false;
            } 
        });

        $('#search_descripcion').keyup(function(e){
            if ( e.which == 13 ){
                if( $(this).val() != '' )
                    search();
            }
        });

        $('#filtro_fecha').keyup(function(e){
            if ( e.which == 13 ){
                if( $(this).val() != '' )
                    search();
            }
        });
    });
    

    $("#nuevaComprobante").click(function () {
        var sucursal = $("#compania").val();
        url = base_url + "index.php/ventas/comprobante/comprobante_nueva" + "/" + tipo_oper + "/" + tipo_docu+ "/" + sucursal;
        location.href = url;
    });



    function search( search = true){
        if (search == true){
            search_codigo = $("#search_codigo").val();
            search_descripcion = $("#search_descripcion").val();
            search_tipo = $("#search_tipo").val();
        }
        else{
            $("#search_codigo").val("");
            $("#search_descripcion").val("");
            $("#search_tipo").val("");
            search_codigo = "";
            search_descripcion = "";
            search_tipo = "";
        }
        
        $('#table-caja').DataTable({ responsive: true,
            filter: false,
            destroy: true,
            processing: true,
            serverSide: true,
            ajax:{
                    url : '<?=base_url();?>index.php/tesoreria/caja/datatable_caja/',
                    type: "POST",
                    data: {
                            codigo: search_codigo,
                            descripcion: search_descripcion,
                            tipo: search_tipo,
                    },
                    beforeSend: function(){
                        $("#table-caja .loading-table").show();
                    },
                    error: function(){
                    },
                    complete: function(){
                        $("#table-caja .loading-table").hide();
                    }
            },
            language: spanish,
            columnDefs: [{"className": "dt-center", "targets": 0}],
            order: [[ 1, "asc" ]]
        });
    }

    function searchCierre(search = true, id){

        if (search == true){
            search_cierre = $("#filtro_fecha").val();
            
        }
        else{
            $("#filtro_fecha").val("");
            search_cierre = "";
        }

        $('#table-cierre').DataTable({ responsive: true,
            filter: false,
            destroy: true,
            processing: true,
            serverSide: true,
            ajax:{
                    url : '<?=base_url();?>index.php/tesoreria/cajacierre/datatable_cajacierre/'+ id,
                    type: "POST",
                    data: {
                            descripcion: search_cierre,
                    },
                    beforeSend: function(){
                        $("#table-cierre .loading-table").show();
                    },
                    error: function(){
                    },
                    complete: function(){
                        $("#table-cierre .loading-table").hide();
                    }
            },
            language: spanish,
            columnDefs: [{"className": "dt-center", "targets": 0}],
            order: [[ 1, "asc" ]]
        });
    }

    function editar(id){
        var url = base_url + "index.php/tesoreria/caja/getCaja";
        $.ajax({
            type: 'POST',
            url: url,
            dataType: 'json',
            data:{
                    caja: id
            },
            beforeSend: function(){
                clean();
            },
            success: function(data){
                if (data.match == true) {
                    console.log(data);
                    info = data.info;

                    $("#caja").val(info.caja);
                    $("#codigo_caja").val(info.codigo);
                    $("#nombre_caja").val(info.nombre);
                    $("#tipo_caja").val(info.tipocaja);
                    $("#cajero_caja").val(info.cajero_caja);
                    $("#obs_caja").val(info.obs);

                    $("#add_caja").modal("toggle");
                }
                else{
                    Swal.fire({
                                icon: "info",
                                title: "Información no disponible.",
                                html: "<b class='color-red'></b>",
                                showConfirmButton: true,
                                timer: 4000
                            });
                }
            },
            complete: function(){
            }
        });
    }

    function adminCaja(id) {
        $("#admin_caja").modal("toggle");
        $("#caja_2").val(id);
        TraerDatosCaja();
        tablaCierre(id);
    }


    function tablaCierre(id){
        $('#table-cierre').DataTable({ responsive: true,
            filter: false,
            destroy: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax:{
                    url : '<?=base_url();?>index.php/tesoreria/cajacierre/datatable_cajacierre/'+id,
                    type: "POST",
                    data: { dataString: "" },
                    beforeSend: function(){
                        $("#table-caja .loading-table").show();
                    },
                    error: function(){
                    },
                    complete: function(){
                        $("#table-caja .loading-table").hide();
                    }
            },
            language: spanish,
            columnDefs: [{"className": "dt-center", "targets": 0}],
            order: [[ 1, "asc" ]]
        });
    }

    function AperturarCaja() {
        Swal.fire({
            title: "¿Deseas aperturar esta caja?",
            text: "Agregar monto inicial",
            icon: "question",
            input: "number",
            showCancelButton: true
        }).then((result) => {
            if (result.isConfirmed) {
                var id_caja = $("#caja_2").val();
                var valorApertura = 1;
                var cajachica = result.value;
                var url = base_url + "index.php/tesoreria/caja/abrirCaja";
                $.ajax({
                type: 'POST',
                url: url,
                dataType: 'json',
                data: {
                    valor: valorApertura,
                    id: id_caja,
                    cajachica: cajachica,
                },
                success: function (data) {
                    if (data.result === 'success') {
                        Swal.fire({
                            title: "¡Caja aperturada!",
                            text: "el modulo se refrescara en 2 segundos",
                            icon: "success",
                        });

                        var table = $('#table-cierre').DataTable();
                        var rowIndex = table.row($('#caja_2').closest('tr')).index();
                        var rowData = table.row(rowIndex).data();

                        rowData[6] = valorApertura;
                        table.row(rowIndex).data(rowData).draw();

                        setTimeout(function() {
                            location.reload();
                        }, 2000);

                    } else {
                        Swal.fire({
                            title: "Error",
                            text: "Hubo un error en la apertura de caja",
                            icon: "error",
                        });
                    }
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                    Swal.fire({
                        title: "Error",
                        text: "Error en la comunicación con el servidor",
                        icon: "error",
                    });
                },
                complete: function () {
                    console.log("Completo");
                }
            });

            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire("Proceso cancelado", "", "info");
            }
        });
    }
    

    function CierreCaja(cierres) {
		
        Swal.fire({
            title: "¿Deseas cerrar esta caja?",
            text: "No abra vuelta atras al realizar esta operacion",
            icon: "question",
            showCancelButton: true
        }).then((result) => {
            if (result.isConfirmed) {
                var id_caja = $("#caja_2").val();
                var valorCierre = 0;
				var id_cierres = cierres;
                var url = base_url + "index.php/tesoreria/caja/cerrarCaja/";
                $.ajax({
                    type: 'POST',
                    url: url,
                    dataType: 'json',
                    data: {
                        valor: valorCierre,
                        id: id_caja,
						idc: id_cierres,
                    },
                    success: function (data) {
                        Swal.fire({
                            title: "¡Caja Cerrada!",
                            text: "el modulo se refrescara en 2 segundos",
                            icon: "success",
                        });

                        var table = $('#table-cierre').DataTable();
                        var rowIndex = table.row($('#caja_2').closest('tr')).index();
                        var rowData = table.row(rowIndex).data();

                        rowData[6] = valorCierre;

                        table.row(rowIndex).data(rowData).draw();
                        setTimeout(function() {
                            location.reload();
                        }, 2000);
                    }
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire("Proceso cancelado", "", "info");
            }
        });
    }
    
    function TraerDatosCaja() {
        var caja = $("#caja_2").val();
        var url = base_url + "index.php/tesoreria/caja/DatosCaja";

        $.ajax({
            type: 'POST',
            url: url,
            dataType: 'json',
            data:{
                caja: caja,
            },
            success: function(data){
                $("#monto_ini").val(data.cajachica);
                $("#Acodigo_caja").val(data.codigoInt);
                $("#Anombre_caja").val(data.nombre);
                $("#Acajero_caja").val(data.responsable);

                if (data.estado == '1') {
                    document.getElementById("name_caja").style.display = "block";
                    document.getElementById("caja_null").style.display = "none";
                    $('#opcioenes_apertura').hide().siblings('.dropdown-toggle').dropdown('toggle');
                    $('#opcioenes_cierre').show().siblings('.dropdown-toggle').dropdown('hide');
                    
                
                } else {
                    document.getElementById("name_caja").style.display = "none";
                    document.getElementById("caja_null").style.display = "block";
                    $('#opcioenes_cierre').hide().siblings('.dropdown-toggle').dropdown('toggle');
                    $('#opcioenes_apertura').show().siblings('.dropdown-toggle').dropdown('hide');
                    
                }
            }
        })
    }

    function MontoInicial(){
        Swal.fire({
            title: "Monto inicial",
            text: "¿Desea actualizar el monto inicial?",
            input: "number",
            icon: "question",
            showCancelButton: true
        }).then((result) =>{
           if(result.isConfirmed){
                var monto = result.value;
                var id = $("#caja_2").val();
                var url = base_url + "index.php/tesoreria/caja/registrarMonto";
                $.ajax({
                    type: 'POST',
                    url: url,
                    dataType: 'json',
                    data:{
                        monto : monto,
                        caja : id,
                    },
                    success: function (data){
                        Swal.fire({
                            title: "Monto registrado",
                            text: "Por favor actualice el sistema",
                            icon: "success"
                        })
                    }
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire("Proceso cancelado", "", "info");
            }
        })
        
    }

    function detalleCierre(datosCajaJSON) {

        let datosCaja = JSON.parse(datosCajaJSON);
        let fehcaini = datosCaja.fechaapertura;
        let fehchafin = datosCaja.fechacierre;
        let vendedor = datosCaja.cajero;
        let caja = datosCaja.caja;
        let cierre = datosCaja.cierre;
        let datos = "/"+fehcaini + "/" + fehchafin+"/"+vendedor+"/"+caja+"/"+cierre;

        var url = base_url + "index.php/tesoreria/caja/detalle/" + datos;
        window.open(url, '_blank');
    }

    function registrar_caja(){
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
                        var caja = $("#caja").val();
                        var descripcion = $("#nombre_caja").val();
                        validacion = true;

                        if (descripcion == ""){
                            Swal.fire({
                                        icon: "error",
                                        title: "Verifique los datos ingresados.",
                                        html: "<b class='color-red'>Debe ingresar un nombre para la caja.</b>",
                                        showConfirmButton: true,
                                        timer: 4000
                                    });
                            $("#nombre_caja").focus();
                            validacion = false;
                            return null;
                        }

                        if (validacion == true){
                            var url = base_url + "index.php/tesoreria/caja/guardar_registro";
                            var info = $("#formCaja").serialize();
                            $.ajax({
                                type: 'POST',
                                url: url,
                                dataType: 'json',
                                data: info,
                                success: function(data){
                                    if (data.result == "success") {
                                        if (caja == "")
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
                                    $("#nombre_caja").focus();
                                }
                            });
                        }
                    }
                });
    }

    function deshabilitar(caja){
        Swal.fire({
                    icon: "info",
                    title: "Debe confirmar esta acción.",
                    html: "<b class='color-red'>Esta acción no se puede deshacer</b>",
                    showConfirmButton: true,
                    showCancelButton: true,
                    confirmButtonText: "Aceptar",
                    cancelButtonText: "Cancelar"
                }).then(result => {
                    if (result.value){
                        var url = base_url + "index.php/tesoreria/caja/deshabilitar_caja";
                        $.ajax({
                            type: 'POST',
                            url: url,
                            dataType: 'json',
                            data: {
                                caja: caja
                            },
                            success: function(data){
                                if (data.result == "success") {
                                    titulo = "¡Registro eliminado!";
                                    Swal.fire({
                                        icon: "success",
                                        title: titulo,
                                        showConfirmButton: true,
                                        timer: 2000
                                    });
                                }
                                else{
                                    Swal.fire({
                                        icon: "error",
                                        title: "Sin cambios.",
                                        html: "<b class='color-red'>Algo ha ocurrido, verifique he intentelo nuevamente.</b>",
                                        showConfirmButton: true,
                                        timer: 4000
                                    });
                                }
                            },
                            complete: function(){
                                search(false);
                            }
                        });
                    }
                });
    }

    function ticketCaja(datosCajaJSON){
        let datosCaja = JSON.parse(datosCajaJSON);
        let fehcaini = datosCaja.fechaapertura;
        let fehchafin = datosCaja.fechacierre;
        let vendedor = datosCaja.cajero;
        let caja = datosCaja.caja;
        let cierre = datosCaja.cierre;

        let datos = "/"+fehcaini + "/" + fehchafin+"/"+vendedor+"/"+caja+"/"+cierre;
        let pdfUrl = "<?= base_url(); ?>index.php/reportes/ventas/CierreTicket/" + datos;

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

    function clean(){
        $("#formCaja")[0].reset();
        $("#caja").val("");
    }
</script>