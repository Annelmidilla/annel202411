<script type="text/javascript" src="<?php echo base_url(); ?>js/almacen/guiatrans.js?=<?=JS;?>"></script>
<div id="pagina">
    <div id="zonaContenido">
        <div align="center">
            <div id="tituloForm" class="header"><?php echo $titulo_busqueda; ?></div>
            <form id="form_busqueda" name="form_busqueda" method="post" >
	<div class="row">
		<div class="col-sm-2 col-md-2 col-lg-2 form-group">
			<label for="fechai">Fecha inicio: </label>
			<input id="fechai" name="fechai" type="date" class="form-control w-porc-90 h-1" placeholder="fecha inicial" maxlength="30" value="<?=$fechai;?>">
		</div>
		<div class="col-sm-2 col-md-2 col-lg-2 form-group">
			<label for="fechaf">Fecha fin: </label>
			<input id="fechaf" name="fechaf" type="date" class="form-control w-porc-90 h-1" maxlength="100" placeholder="fecha fin" value="<?php echo $fechaf; ?>">
		</div>
	
		<div class="col-sm-2 col-md-2 col-lg-2 form-group">
			<label for="serie">COMBO: </label>
			<input id="combo_search" name="combo_search" type="text" class="form-control w-porc-90 h-1" maxlength="8" placeholder="COMBO">
		</div>
	
		
		<input id="codigoInterno" name="codigoInterno" type="hidden" class="cajaGrande" maxlength="100" placeholder="Codigo original" value="<?=$codigoInterno;?>">
	</div>
</form>
            <input id="compkardex" name="compkardex" type="hidden" class="" maxlength="30" value="<?=$compkardex;?>">
            <div class="acciones">
                <span id="mensajeTransferencia" style="margin-top: 10px"></span>
                <div id="botonBusqueda">
                    <ul id="limpiarG" class="lista_botones">
                        <li id="limpiar">Limpiar</li>
                    </ul>
                    <ul id="buscarG" class="lista_botones">
                        <li id="buscar">Buscar</li>
                    </ul>
                </div>
            </div>
            <!--    <div id="modal_cantidad_real" class="modal fade" role="dialog">
                <div class="modal-dialog w-porc-60">
                    <div class="modal-content">
                        <form id="formCaja" method="POST">
                            <div class="modal-header">
                                <h4 class="modal-title text-center">REGISTRAR CANTIDAD REAL DEL CONTENIDO</h4>
                            </div>
                            <div class="modal-body panel panel-default" style="background-color: #B0C4DE;">
                                <div class="row form-group">
                                    <div class="col-sm-3 col-md-3 col-lg-3">
                                        <label for="codigo_prod">CÓDIGO</label>
                                        <input type="text" id="codigo_prod" name="codigo_prod" class="form-control h-2 w-porc-60" placeholder="" value="" maxlength="30" style="width: 40rem;" readonly>
                                    </div>
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        <label for="nombre_prod">NOMBRE </label>
                                        <input type="text" id="nombre_prod" name="nombre_prod" class="form-control h-2" placeholder="" maxlength="200" readonly>
                                    </div>
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        <label for="cant_prod">CANTIDAD</label>
                                        <input type="number" id="cant_prod" name="cant_prod" class="form-control h-2" placeholder="" value="" maxlength="200" style="width: 20%; background-color:azure">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                                <a onclick="guardarCantidadReal()"><img src="<?php echo base_url(); ?>images/save.gif?=<?=IMG;?>" title="Guardar"></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div> -->
            <div id="cabeceraResultado" class="header"><label style="margin-right:140px;">LISTA DE CAJAS
                </label> <label style="margin-left:135px;">PARES DE CAJA</label></div>
            <div id="frmResultado" class="row">
                <div style="width:40%; float: left;">
                    <table class="fuente8 " id="table_combos" data-page-length='10'>
                        <thead>
                            <tr class="cabeceraTabla">
                                <th style="width: 15%">FECHA</th>
                                <th style="width: 15%">CODIGO</th>
                                <th style="width: 30%">DESCRIPCION</th>
                                <th style="width: 10%">COSTO</th>
                                <th style="width: 10%">STOCK</th>
                                <th style="width: 10%">ALMACEN</th>
                                <th style="width: 5%"></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <form id="form_articulos" method="POST" action="#">
                    <div style="width:45%; float: right;">
                        <table class="fuente8 " id="table_articulos" data-page-length='10'>
                            <thead>
                                <tr class="cabeceraTabla">
                                    <th style="width: 15%">N°</th>
                                    <th style="width: 05%"></th>
                                    <th style="width: 05%"></th>
                                    <th style="width: 30%">CODIGO</th>
                                    <th style="width: 40%">DESCRIPCION</th>
                                    <th style="width: 30%;">ALMACEN</th>
                                    <th style="width: 30%">STOCK</th>
                                    <th style="width: 30%;">CANTIDAD VIRTUAL</th>
                                    <th style="width: 30%">CANTIDAD REAL</th>
                                    <th style="width: 30%">ALMACEN</th>
                                    <th style="width: 20%"></th>
                                </tr>
                            </thead>
                           <tbody>
                                <label for="">guadar cantidades reales</label>
                                <a class='btn btn-light' onclick='save_cantidad_real_total()'><img
                                        src='<?=base_url();?>images/save.gif' width='35' height='35' border='1'
                                        title='guardar'></a>
                            </tbody>
                        </table>
                    </div>
                
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <h5 class="modal-title" id="exampleModalLabel">ASIGNA UN ALMACEN (PRODUCTO NUEVO)</h5>
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input id="codigo_prod_c" type="text" hidden>
      <select name="almacen_prod" id="almacen_prod" style="width: 30%;">
                                    <option value="1970">SIN ALMACEN</option>
                                    <?php
                                foreach ($almacenes as $key => $value) { ?>
                                    <option value='<?=$value->ALMAP_Codigo;?>'> <?=$value->ALMAC_Descripcion;?>
                                    </option> <?php
                                } ?>
                                </select>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="guardar_productos_sin_almacen()">Asignar almacen</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- MODAL_REALES -->
<div class="modal fade" id="modal_real" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <h5 class="modal-title" id="exampleModalLabel">ASIGNAR CANTIDADES</h5>
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input id="codigo_prod_2" type="text" hidden>
        <input type="text">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-success" onclick="save_cantidad_real_total()">Asignar almacen</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--  -->

<script>
$(document).ready(function() {
    $('#table_combos').DataTable({
        filter: false,
        destroy: true,
        processing: true,
        serverSide: true,
        ajax: {
            url: "<?=base_url();?>index.php/almacen/transformacion/tabla_combo/",
            type: "POST",
            dataType: 'json',
            data: {
                dataString: ""
            },
            beforeSend: function() {},
            error: function() {}
        },
        language: spanish
    });

    $("#buscarG").click(function(){
        fechai 	= $('#fechai').val();
        fechaf 	= $('#fechaf').val();
        combo 	= $('#combo_search').val();

         $('#table_combos').DataTable({
                filter: false,
                destroy: true,
                processing: true,
                serverSide: true,
                ajax:{
                        url: "<?=base_url();?>index.php/almacen/transformacion/tabla_combo/",
                        type: "POST",
                        data: { fechai: fechai, fechaf: fechaf, combo: combo,},
                        error: function(){
                        }
                },
                language: spanish
        });

    });

    $("#limpiarG").click(function(){

    $("#fechai").val("");
    $("#fechaf").val("");
    $("#combo_search").val("");

    fechai = "";
    fechaf = "";
    combo = "";

    $('#table_combos').DataTable({
        filter: false,
        destroy: true,
        processing: true,
        serverSide: true,
        ajax:{
                url: "<?=base_url();?>index.php/almacen/transformacion/tabla_combo/",
                type: "POST",
                data: { fechai: fechai, fechaf: fechaf, combo: combo},
                error: function(){
                }
        },
        language: spanish
    });
   
});


})


function save_cantidad_real_total() {
    Swal.fire({
        title: "¡Estas seguro de realizar esta accion!",
        text: "no hay vuelta atras",
        icon: "question",
        showCancelButton: true
    }).then((result) => {
        if (result.isConfirmed) {
            var url = base_url + "index.php/almacen/transformacion/sumar_stock";
            var info = $("#form_articulos").serialize();
           
            $.ajax({
                type: 'POST',
                url: url,
                dataType: 'json',
                data: info,
                success: function(data) {
                    Swal.fire({
                        title: "¡Stock actualizado!",
                        text: "recargue el sistema",
                        icon: "success",
                    })

                }
            });

        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire("Proceso cancelado", "", "info");
        }
    });

}
function open_modal_alamacen(codigo){
    $("#exampleModal").modal("show");
    $("#codigo_prod_c").val(codigo);

}

function open_modal_real(codigo){
    $("#modal_real").modal("show");
    $("#codigo_prod_2").val(codigo);

}

function guardar_productos_sin_almacen(){
    Swal.fire({
        title: "¡Estas seguro de realizar esta accion!",
        text: "no hay vuelta atras",
        icon: "warning",
        showCancelButton: true
    }).then((result) => {
        if (result.isConfirmed) {
            var url = base_url + "index.php/almacen/transformacion/registrar_almacen_producto";
            var almacen = $("#almacen_prod").val();
            var codigo = $("#codigo_prod_c").val();
         
            $.ajax({
                type: 'POST',
                url: url,
                dataType: 'json',
                data: {
                    codigo: codigo,
                    almacen: almacen,
                },
                success: function(data) {
                    Swal.fire({
                        title: "¡almacene asignados con exito!",
                        text: "recargue el sistema",
                        icon: "success",
                    })

                }
            });

        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire("Proceso cancelado", "", "info");
        }
    });


    
}

function abrir_caja(codigo, valor) {

    swal.fire({
        title: "Se descontara una caja del stock",
        text: "No abra vuelta atras",
        icon: "question",
        showCancelButton: true
    }).then((result) => {
        if (result.isConfirmed) {
            var url = base_url + "index.php/almacen/transformacion/descontar_stock_caja";
            $.ajax({
                type: 'POST',
                url: url,
                dataType: 'json',
                data: {
                    codigo_prod: codigo,
                    cantidad: valor,
                },
                success: function(data) {
                    Swal.fire({
                        title: "¡Stock actualizado!",
                        text: "recargue el sistema",
                        icon: "success",
                    });

                    listar_articulos_tabla(codigo)
                }

            });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire("Proceso cancelado", "", "info");
        }
    });
}

function listar_articulos_tabla(codigo) {
    
    $('#table_articulos').DataTable({
        filter: false,
        destroy: true,
        processing: true,
        serverSide: true,
        ajax: {
            url: "<?=base_url();?>index.php/almacen/transformacion/tabla_articulos/",
            type: "POST",
            dataType: 'json',
            data: {
                codigo_combo: codigo,
            },
            beforeSend: function() {},
            error: function() {}
        },
        language: spanish,

    });
}

function save_cantidad_real(codigo, valor) {
    swal.fire({
        title: "¿Estas seguro de guardar estos cambios?",
        text: "No abra vuelta atras",
        icon: "question",
        showCancelButton: true
    }).then((result) => {
        if (result.isConfirmed) {
            var url = base_url + "index.php/almacen/transformacion/sumar_stock";
            $.ajax({
                type: 'POST',
                url: url,
                dataType: 'json',
                data: {
                    codigo_prod: codigo,
                    cantidad: valor,
                },
                success: function(data) {
                    Swal.fire({
                        title: "¡Stock actualizado!",
                        text: "recargue el sistema",
                        icon: "success",
                    });
                }

            });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire("Proceso cancelado", "", "info");
        }
    });

}

function guardarCantidadReal() {
    alert('estas seguro de guardar esta informacion...');
}
</script>