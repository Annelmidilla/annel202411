<!--vista => producto_view.php-->

<script type="text/javascript" src="<?php echo base_url(); ?>js/almacen/producto.js?=<?= JS; ?>"></script>


<link href="<?= base_url(); ?>js/fancybox/dist/jquery.fancybox.css?=<?= CSS; ?>" rel="stylesheet">
<script src="<?= base_url(); ?>js/fancybox/dist/jquery.fancybox.js?=<?= JS; ?>"></script>
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

<style>
.costo {
    display: inline-block;
    position: relative;
    padding: 0.5em;
    cursor: pointer;
}

.costo:hover {
    background: rgba(51, 51, 51, .1);
}

.costo .editar_costo {
    text-align: left;
    position: absolute;
    visibility: hidden;
    padding: 0.7em 0.7em 0.7em 0.7em;
    width: 25em;
    top: -25%;
    right: 100%;
    background: rgba(51, 51, 51, .9);
}

.costo:hover .editar_costo {
    visibility: visible;
    width: 25em;
    background: rgba(51, 51, 51, .9);
    border-radius: 0.1em 0.1em 0.1em 0.1em;
}

.costo:hover input,
.costo:hover .editar_costo img {
    opacity: 1;
}

.editar_costo input,
.editar_costo img {
    opacity: 0;
    width: auto;
}

.busqueda_opcinal {
    position: relative;
    text-align: center;
}

.busqueda_opcinal_1 {
    position: absolute;
    background-color: #004488;
    color: #f1f4f8;
    width: 98px;
    height: 70px;
    top: 14px;
    left: 135px;
    -webkit-box-shadow: 0px 0px 0px 3px rgba(47, 50, 50, 0.34);
    -moz-box-shadow: 0px 0px 0px 3px rgba(47, 50, 50, 0.34);
    box-shadow: 0px 0px 0px 3px rgba(47, 50, 50, 0.34);
    cursor: pointer;
}

.control_1 .seleccionado {
    position: absolute;
    border-radius: 3px;
    background-color: #29fb00;
    width: 98px;
    height: 5px;
    bottom: 20px;
    left: 135px;
}

.busqueda_opcinal_2 {
    position: absolute;
    background: #109EC8;
    color: #f1f4f8;
    width: 95px;
    height: 70px;
    top: 14px;
    right: 102px;
    cursor: pointer;
    -webkit-box-shadow: 0px 0px 0px 3px rgba(47, 50, 50, 0.34);
    -moz-box-shadow: 0px 0px 0px 3px rgba(47, 50, 50, 0.34);
    box-shadow: 0px 0px 0px 3px rgba(47, 50, 50, 0.34);
}

.control_2 .seleccionado {
    position: absolute;
    border-radius: 3px;
    background-color: #ab1c27;
    width: 96px;
    height: 5px;
    bottom: 21px;
    right: 102px;
}

.ajuste {
    width: 250px;
    height: 400px;
    margin: auto;
    background-color: #fff;
    position: 0;
    outline: 0;
}

/*codigo agregado por el Ingeniero Christopher*/
.ajuste_cod_barra_producto {
    display: block;
    width: 70%;
    height: calc(1.5em + .75rem + 2px);
    padding: 3.75 rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}

.ajuste_cantidad {
    display: block;
    width: 30%;
    height: calc(1.5em + .75rem + 2px);
    padding: 3.75 rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}

.closed {
    display: none;
}
</style>


<div class="container-fluid">
    <div class="row header">
        <div class="col-md-12 col-lg-12">
            <div><?=$titulo_busqueda;?></div>
        </div>
    </div>
    <input type="hidden" id="flagBS" name="flagBS" value="<?= $flagBS; ?>">
    <input value='<?php echo $compania; ?>' name="compania" type="hidden" id="compania" />
    <input type="hidden" class="form-control" name="posicion" id="posicion">
    <form id="form_busqueda" method="post">
        <div class="row fuente8 py-1">
            <div class="col-sm-1 col-md-1 col-lg-1 form-group">
                <label for="txtCodigo">Código: </label>
                <input id="txtCodigo" name="txtCodigo" type="text" class="form-control w-porc-90 h-1"
                    placeholder="Codigo" maxlength="30" value="<?=$codigo;?>">
            </div>
            <?php if($flagBS == 'S'): ?>
            <div class="col-sm-2 col-md-2 col-lg-2 form-group">
                <label for="txtNombre">Nombre: </label>
                <input id="txtNombre" name="txtNombre" type="text" class="form-control w-porc-90 h-1" maxlength="100"
                    placeholder="Nombre servicio" value="<?php echo $nombre; ?>">
            </div>
            <?php else: ?>
            <div class="col-sm-2 col-md-2 col-lg-2 form-group">
                <label for="txtNombre">Nombre: </label>
                <input id="txtNombre" name="txtNombre" type="text" class="form-control w-porc-90 h-1" maxlength="100"
                    placeholder="Nombre producto" value="<?php echo $nombre; ?>">
            </div>
            <?php endif; ?>
            <div class="col-sm-2 col-md-2 col-lg-2 form-group">
                <label for="txtFamilia">Familia: </label>
                <select name="txtFamilia" id="txtFamilia" class="form-control w-porc-90 h-2">
                    <option value=""> TODOS </option><?php
                    if ($familias != NULL){
                        foreach ($familias as $i => $v){ ?>
                    <option value="<?=$v->FAMI_Codigo;?>"><?=$v->FAMI_Descripcion;?></option> <?php
                        }
                    } ?>
                </select>
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2 form-group" <?=($flagBS == 'S') ? 'hidden' : '';?>>
                <label for="txtMarca">Marca: </label>
                <input id="txtMarca" type="text" class="form-control w-porc-90 h-1" name="txtMarca" maxlength="100"
                    placeholder="Marca producto" value="<?=$marca;?>">
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2 form-group" <?=($flagBS == 'S') ? 'hidden' : '';?>>
                <label for="txtModelo">Modelo: </label>
                <select name="txtModelo" id="txtModelo" class="form-control w-porc-90 h-2">
                    <option value=""> TODOS </option><?php
                    if ($modelos != NULL){
                        foreach ($modelos as $indice => $val){
                            if ($val->PROD_Modelo != ''){ ?>
                    <option value="<?=$val->PROD_Modelo;?>"><?=$val->PROD_Modelo;?></option> <?php
                            }
                        }
                    } ?>
                </select>
            </div>
            <?php if($flagBS == 'S'): ?>

            <?php else: ?>
            <div class="col-sm-1 col-md-1 col-lg-1"><br>
                <button type="button" class="btn btn-info" data-toggle="modal"
                    data-target="#modal_totales">Inversión</button>
            </div>
            <?php endif; ?>
            <input id="codigoInterno" name="codigoInterno" type="hidden" class="cajaGrande" maxlength="100"
                placeholder="Codigo original" value="<?=$codigoInterno;?>">
        </div>
    </form>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 pall-0">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 pall-0">
                    <div class="acciones">
                        <div id="botonBusqueda">
                            <?php if($flagBS == 'S'):  ?>
                            <ul id="imprimirServicio" class="lista_botones">
                                <li id="imprimir">Imprimir </li>
                            </ul>
                            <?php else: ?>
                            <ul id="imprimirProducto" class="lista_botones">
                                <li id="imprimir">Imprimir </li>
                            </ul>
                            <?php endif; ?>

                            <ul class="lista_botones" data-toggle="modal" data-target="#modal_producto">
                                <li id="nuevo">Nuevo <?php if ($flagBS == 'B') echo 'Artículo'; else echo 'Servicio'; ?>
                                </li>
                            </ul>
                            <ul id="limpiarP" class="lista_botones">
                                <li id="limpiar">Limpiar</li>
                            </ul>
                            <ul id="buscarP" class="lista_botones">
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
                    <div id="cargando_datos" class="loading-table">
                        <img src="<?=base_url().'images/loading.gif?='.IMG;?>">
                    </div>
                    <table class="fuente8 display" id="table-productos">
                        <thead>
                            <tr class="cabeceraTabla">
                                <th style="width: 05%" data-orderable="true">CÓDIGO</th>
                                <th style="width: 20%" data-orderable="true">NOMBRE</th>
                                <th style="width: 5%" data-orderable="true">FAMILIA</th>
                                <th style="width: 5%" data-orderable="true"><?=($flagBS == "B") ? "MARCA" : "";?></th>
                                <th style="width: 5%" data-orderable="false">UNIDAD MEDIDA</th>
                                <th style="width: 5%" data-orderable="false">COLOR</th>
                                <th style="width: 5%" data-orderable="false">TALLA</th>
                                <th style="width: 3%" data-orderable="false">MODELO</th>
                                <th data-orderable="true"><?=($flagBS == "B") ? "P. COSTO" : "";?></th> <?php
                                
                                foreach ($categorias as $key => $val){ ?>
                                <th style="text-indent: 0;" data-orderable="false"><?=$val->TIPCLIC_Descripcion;?></th> <?php
                                }?>

                                <th style="width: 05%" data-orderable="false">EDITAR</th>
                                <!--<th style="width: 05%" data-orderable="false">BARCODE</th>-->
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="modal_totales" class="modal fade" role="dialog">
    <div class="modal-dialog w-porc-60">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
            </div>
            <div style="text-align: center;">
                <h3><b>TOTAL EN INVERSIÓN</b></h3>
            </div>
            <div class="modal-body panel panel-default">
                <div class="row form-group">
                    <div class="col-sm-11 col-md-11 col-lg-11">
                        <table class="fuente8 display" id="table-totales">
                            <thead>
                                <tr class="cabeceraTabla">
                                    <th style="width:60%;" data-orderable="true">CATEGORIA</th>
                                    <th style="width:40%;" data-orderable="true">TOTAL EN ARTICULOS</th>
                                </tr>
                            </thead>
                            <tbody> <?php
                                if ( isset($totalesCat) && $totalesCat != NULL){
                                    foreach ($totalesCat as $key => $value) { ?>
                                <tr>
                                    <td style="text-align: left;"><?=$value->categoria;?></td>
                                    <td align="right"><?="$value->moneda ".number_format($value->total,2);?></td>
                                </tr>
                                <?php
                                    }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
            </div>
        </div>
    </div>
</div>

<div id="modal_producto" class="modal fade" role="dialog">
    <div class="modal-dialog w-porc-80">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-center">REGISTRAR <?=($flagBS == 'B') ? 'ARTICULO' : 'SERVICIO';?></h3>
            </div>
            <div class="modal-body panel panel-default">
                <form id="form_nvo" method="POST" action="#">
                    <div class="row form-group header">
                        <div class="col-sm-11 col-md-11 col-lg-11">
                            DETALLES DEL <?=($flagBS == 'B') ? 'ARTICULO' : 'SERVICIO';?>
                            <input type="hidden" id="id" name="id" />
                            <input type="hidden" id="flagB_S" name="flagB_S" value="<?=$flagBS;?>" />
                        </div>
                    </div>

                    <div class="row form-group font-9">
                        <div class="col-sm-1 col-md-1 col-lg-1">
                            <label for="nvo_codigo">CÓDIGO:</label>
                            <input type="text" id="nvo_codigo" name="nvo_codigo" oninput="validarNumero()"
                                class="form-control h-2 w-porc-90" />
                            <p id="mensajeError" style="color: red;"></p>
                        </div>

                        <script>
                        function validarNumero() {
                            var input = document.getElementById("nvo_codigo");
                            var mensajeError = document.getElementById("mensajeError");
                            var valor = input.value;

                            // Verifica si hay ceros adelante
                            if (valor.length > 1 && valor[0] === "0") {
                                mensajeError.textContent = "No se permiten ceros adelante.";
                                input.value = valor.slice(1); // Elimina el cero inicial
                            } else {
                                mensajeError.textContent = "";
                            }
                        }
                        </script>

                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="nvo_nombre">NOMBRE:</label>
                            <input type="text" id="nvo_nombre" name="nvo_nombre" class="form-control h-2 w-porc-90" />
                        </div>

                        <div class="col-sm-2 col-md-2 col-lg-2" hidden>
                            <label for="nvo_autocompleteCodigoSunat">CÓDIGO SUNAT:</label>
                            <input type="text" id="nvo_autocompleteCodigoSunat" name="nvo_autocompleteCodigoSunat"
                                class="form-control h-2 w-porc-90" />
                        </div>
                        <div class="col-sm-1 col-md-1 col-lg-1" hidden><br>
                            <input type="text" id="nvo_codigoSunat" name="nvo_codigoSunat"
                                class="form-control h-2 w-porc-90" readOnly />
                        </div>
                        <div class="col-sm-2 col-md-2 col-lg-3">
                            <label for="nvo_tipoAfectacion">AFECTACIÓN:</label>
                            <select id="nvo_tipoAfectacion" name="nvo_tipoAfectacion" class="form-control h-3"> <?php
                                foreach ($afectaciones as $i => $val) { ?>
                                <option value="<?=$val->AFECT_Codigo?>"><?=$val->AFECT_DescripcionSmall;?></option> <?php
                                } ?>
                            </select>
                        </div>
                    </div>

                    <div class="row form-group font-9" hidden>
                        <div class="col-sm-10 col-md-10 col-lg-11">
                            <label for="nvo_descripcion">DESCRIPCIÓN</label>
                            <textarea class="form-control" id="nvo_descripcion" name="nvo_descripcion" maxlength="800"
                                placeholder="Indique una descripción"></textarea>
                            <div class="pull-right">
                                Caracteres restantes:
                                <span class="contadorCaracteres">800</span>
                            </div>
                        </div>
                    </div>

                    <div class="row form-group font-9">
                        <div class="col-sm-2 col-md-2 col-lg-2">
                            <label for="nvo_familia">FAMILIA:</label>
                            <select id="nvo_familia" name="nvo_familia" class="form-control h-3"> <?php
                                foreach ($familias as $i => $val) { ?>
                                <option value="<?=$val->FAMI_Codigo?>"><?=$val->FAMI_Descripcion;?></option> <?php
                                } ?>
                            </select>
                        </div>
                        <div class="col-sm-2 col-md-2 col-lg-2" <?=($flagBS == 'S') ? 'hidden' : '';?>>
                            <label for="nvo_fabricante">FABRICANTE:</label>
                            <select id="nvo_fabricante" name="nvo_fabricante" class="form-control h-3">
                                <option value=""> :: SELECCIONE :: </option> <?php
                                foreach ($fabricantes as $i => $val) { ?>
                                <option value="<?=$val->FABRIP_Codigo?>"><?=$val->FABRIC_Descripcion;?></option> <?php
                                } ?>
                            </select>
                        </div>
                        <div class="col-sm-2 col-md-2 col-lg-2" <?=($flagBS == 'S') ? 'hidden' : '';?>>
                            <label for="nvo_marca">MARCA:</label>
                            <select id="nvo_marca" name="nvo_marca" class="form-control h-3">
                                <option value=""> :: SELECCIONE :: </option> <?php
                                foreach ($marcas as $i => $val) { ?>
                                <option value="<?=$val->MARCP_Codigo?>"><?=$val->MARCC_Descripcion;?></option> <?php
                                } ?>
                            </select>
                        </div>
                        <div class="col-sm-2 col-md-2 col-lg-2" <?=($flagBS == 'S') ? 'hidden' : '';?>>
                            <label for="nvo_modelo" id="nvo_modelo_t">MODELO:</label>
                            <input type="text" id="nvo_modelo" name="nvo_modelo" class="form-control h-2 w-porc-90" />
                            <!--
                                LOS DATOS DEL MODELO SON UTILIZADOS EN PRODUCCION, ASI DIFERENCIA ENTRE ARTICULOS E INSUMOS.
                                valor = "ARTICULO" ó "INSUMO"
                            -->
                        </div>
                        <!-- DATOS ZAPATILLA -->
                        <div class="col-sm-1 col-md-1 col-lg-1">
                            <label id="nvo_color_t" for="nvo_modelo">COLOR:</label>
                            <input type="text" id="nvo_color" name="nvo_color" class="form-control h-2 w-porc-90" />
                        </div>
                        <div class="col-sm-1 col-md-1 col-lg-1">
                            <label for="nvo_modelo_t">TALLA:</label>
                            <input type="text" id="nvo_talla" name="nvo_talla" class="form-control h-2 w-porc-90" />
                        </div>
                        <!-- DATOS ZAPATILLA FIN -->
                        <div class="col-sm-1 col-md-1 col-lg-1" <?=($flagBS == 'S') ? 'hidden' : '';?>>
                            <label for="nvo_stockMin">STOCK MINIMO:</label>
                            <input type="number" step="1" min="0" id="nvo_stockMin" name="nvo_stockMin" value="0"
                                class="form-control h-2 w-porc-90" />
                        </div>
                    </div>

                    <div class="row form-group font-9">
                        <?php if($flagBS == 'S'): ?>
                        <input type="hidden" value="32" id="nvo_unidad[0]" name="nvo_unidad[0]" />
                        <?php else: ?>
                        <div class="col-sm-2 col-md-2 col-lg-2">
                            <label for="nvo_unidad">UNIDAD DE MEDIDA:</label>
                            <select id="nvo_unidad" name="nvo_unidad" class="form-control h-3"> <?php
                                foreach ($unidades as $i => $val) { ?>
                                <option value="<?=$val->UNDMED_Codigo?>"
                                    <?=($flagBS == 'S' && trim($val->UNDMED_Simbolo) != 'ZZ') ? 'disabled' : '';?>
                                    <?=($flagBS == 'B' && trim($val->UNDMED_Simbolo) == 'NIU') ? 'selected' : '';?>
                                    <?=($flagBS == 'B' && trim($val->UNDMED_Simbolo) == 'ZZ') ? 'disabled' : '';?>>
                                    <?="$val->UNDMED_Descripcion | $val->UNDMED_Simbolo";?></option> <?php
                                } ?>
                            </select>
                        </div>
                        <?php endif; ?>
                        <div class="col-sm-2 col-md-2 col-lg-2">
                            <label for="nvo_preciocosto">PRECIO COSTO S/:</label>
                            <input type="number" id="nvo_preciocosto" name="nvo_preciocosto" value="0"
                                class="form-control h-2 w-porc-90" />
                        </div>
                        <!-- Codigo implementado por el Ingeniero Christopher -->
                        <div class="col-sm-2 col-md-2 col-lg-2">
                            <label for="nvo_serie">Con serie o sin Serie </label>
                            <select id="serie" name="serie" class="form-control h-3">
                                <option value="1">SI</option>
                                <option value="2">NO</option>
                            </select>
                        </div>
                        <div class="col-sm-1 col-md-1 col-lg-2">
                            <input type="hidden" id="productComboCode" name="productComboCode" value="" />
                            <label for="nvo_combo">COMBO </label>
                            <select id="combo" name="combo" onclick="seeCombo()" class="form-control h-3">
                                <option value="1">NO</option>
                                <option value="2">SI(VIRTUAL)</option>
                                <option value="3">SI(REAL)</option>
                            </select>
                        </div>
                        <div class="col-sm-1 col-md-1 col-lg-2">
                            <label for="nvo_variante">VARIANTE</label>
                            <select id="nvo_variante" name="nvo_variante" onclick="seevariante()"
                                class="form-control h-3">
                                <option value="1">NO</option>
                                <option value="2">SI</option>
                            </select>
                        </div>
                        <!-- end -->
                        <div class="col-sm-2 col-md-2 col-lg-2">
                        </div>
                        <div class="col-sm-2 col-md-2 col-lg-2">
                        </div>
                        <div class="col-sm-1 col-md-1 col-lg-1">
                        </div>
                    </div>


                    <input type="hidden" id="id_tipo_producto" name="id_tipo_producto" />
                    <input type="hidden" id="serie" name="serie" />
                    <script>
                    //##################################################
                    $(document).ready(function() {
                        $("#nuevo").click(function() {
                            var valor1 = $("#serie").val();
                            var valor2 = $("#combo").val();
                            $("#id_tipo_producto").val(valor1 + valor2);
                        })
                    })
                    //##################################################
                    </script>
                    <script>
                    $(function() {

                        $("#serie, #combo").on("change", function() {
                            let serie = $("#serie").val();
                            let combo = $("#combo").val();

                            var parametro = serie + combo;

                            var url_controller =
                                '<?=base_url();?>index.php/almacen/almacen/consultar_selector_compuesto/';

                            $.ajax({
                                type: "post",
                                url: url_controller,
                                dataType: "json",
                                data: {
                                    consultar: parametro
                                },

                                success: function(respuesta) {
                                    $("#id_tipo_producto").val(respuesta.datos
                                        .TIPPROD_Codigo);
                                    //console.log(respuesta.datos.TIPPROD_Codigo);
                                }
                            })

                        })
                    })
                    </script>
                    <!-- TABLA PARA REGISTRAR LOS PRODUCTOS EN EL COMBO -->
                    <div class="row form-group col-12 closed open">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Nombre <span id="span_tipo">Producto</span></label>
                                <input type="hidden" class="form-control" name="tempde_codproducto"
                                    id="tempde_codproducto">
                                <input type="text" name="tempde_producto" autocomplete="off" id="tempde_producto"
                                    placeholder="Nombre o codigo del Producto"
                                    class="form-control tempde_producto_barcode">
                                <input type="hidden" id="bar_code">
                                <input type="hidden" id="codigo_i">
                            </div>

                            <div class="col-md-2">
                                <label>Cantidad</label>
                                <input type="number" min="0" value="0" style="font-size:14px!important;padding: 5px;"
                                    name="tempde_cantidad" id="tempde_cantidad" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <br>
                                <button type="button" class="btn btn-info" id="add_producto"
                                    data-tipo="agregar">Agregar</button>
                                <button type="button" class="btn btn-info" id="edit_producto" style="display:none;"
                                    data-tipo="editar" style="font-size: 10px;">Editar</button>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table">
                                <input type="hidden" class="form-control" name="tempde_codproductoOriginal"
                                    id="tempde_codproductoOriginal" value="">
                                <thead style="background-color: #00000091; color: white;">
                                    <tr>
                                        <th scope="col">N°</th>
                                        <th scope="col">CODIGO</th>
                                        <th scope="col">DESCRIPCION</th>
                                        <th scope="col">CANTIDAD</th>
                                        <!-- <th scope="col" >EDITAR</th>
					                    <th scope="col" >ELIMINAR</th> -->
                                    </tr>
                                </thead>
                                <tbody id="body-td">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <br>
                    <div class="row form-group header info_formapago">
                        <div class="col-sm-11 col-md-11 col-lg-11">
                            PRECIOS
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-sm-12 col-md-12 col-lg-12 pall-0">
                            <table class="fuente8 display" id="table-precios">
                                <thead>
                                    <tr class="cabeceraTabla">
                                        <th data-orderable="false">CATEGORIA</th> <?php
                                        foreach ($precio_monedas as $i => $val) { ?>
                                        <th style="width: 15%" data-orderable="false"><?=$val->MONED_Descripcion;?></th> <?php
                                        } ?>
                                    </tr>
                                </thead>
                                <tbody> <?php
                                        foreach ($precio_categorias as $i => $val) { ?>
                                    <tr>
                                        <td><?=$val->TIPCLIC_Descripcion;?></td> <?php
                                                foreach ($precio_monedas as $j => $value) { ?>
                                        <td>
                                            <input type="number" name="nvo_pcategoria[]"
                                                value="<?=$val->TIPCLIP_Codigo;?>" hidden />
                                            <input type="number" name="nvo_pmoneda[]" value="<?=$value->MONED_Codigo;?>"
                                                hidden />
                                            <input type="number" step="1.00" min="1" name="precios[]" value="0"
                                                class="form-control h-1 w-porc-80 precio-<?=$val->TIPCLIP_Codigo.$value->MONED_Codigo;?>" />
                                        </td> <?php
                                                } ?>
                                    </tr><?php
                                        } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <style>
                    .variantes-formulario {
                        display: none;
                        /* Oculta el contenedor de variantes por defecto */
                    }
                    </style>
                    <!-- FORM VARIANTE -->
                    <div class="row form-group header info_formapago variantes-formulario">
                        <div class="col-sm-11 col-md-11 col-lg-11">
                            VARIANTES
                        </div>
                    </div>
                    <div class="row variantes-formulario">
                        <div class="col-md-4">
                            <label><span>COLOR</span></label>
                            <input type="text" name="txt_color" autocomplete="off" id="txt_color"
                                placeholder="Nombre o código del color" class="form-control txt_color">
                        </div>
                        <div class="col-md-2">
                            <label for="txt_talla">TALLAS:</label>
                            <select id="txt_talla" name="txt_talla" class="form-control h-3"> <?php
                                foreach ($tallas as $i => $val) { ?>
                                <option value="<?=$val->talla_num?>"><?=$val->talla_num;?></option> <?php
                                } ?>
                            </select>
                        </div>

                        <div class="col-md-2">
                            <label>AGREGAR VARIANTE</label>
                            <input type="button" value="Agregar" id="btn_agregar_variante"
                                style="font-size:14px!important;padding: 5px;" class="form-control btn btn-info">
                        </div>
                        <div class="col-md-2">
                            <label>REGISTRAR ARTICULOS MASIVO</label>
                            <input type="button" value="Registrar" id="btn_registrar_variante"
                                style="font-size:14px!important;padding: 5px;" class="form-control btn btn-warning">
                        </div>
                    </div>

                    <table class="fuente8 display variantes-formulario" id="table-variantes">
                        <div id="cargando_datos" class="loading-table">
                            <img src="images/loading.gif">
                        </div>
                        <thead>
                            <tr class="cabeceraTabla">
                                <th style="width:1%" data-orderable="true">COLOR CODIGO</th>
                                <th style="width:1%" data-orderable="true">TALLA</th>
                                <th style="width:1%" data-orderable="true">ELIMINAR</th>
                            </tr>
                        </thead>
                        <tbody id="cuerpo_variantes">
                            <!-- Aquí se agregarán las variantes -->
                        </tbody>
                    </table>
                </form>

                <br>
                <br>
                <br>

                <form id="form_img" enctype="multipart/form-data">
                    <div class="row form-group">
                        <label for="img_producto">VISTA DEL PRODUCTO</label>
                        <input type="file" id="inp_producto" class="form-control-file" name="inp_producto"
                            accept="image/*">
                        <img id="img_producto" class="card-img-top col-md-6" src="">
                    </div>
                    <button id="guardar_img" type="button">Guardar Imagen</button>
                </form>

            </div>

            <div class="modal-footer" id="btn_principal">
                <button type="button" class="btn btn-success" onclick="registrar()">Guardar</button>
                <button type="button" class="btn btn-info" id="nvo_limpiar">Limpiar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
            </div>
        </div>
    </div>
</div>

<script language="javascript">
document.addEventListener('DOMContentLoaded', function() {
    const btnAgregarVariante = document.getElementById('btn_agregar_variante');
    const cuerpoVariantes = document.getElementById('cuerpo_variantes');
    const btnRegistrarVariante = document.getElementById('btn_registrar_variante');
    let variantes = [];

    btnAgregarVariante.addEventListener('click', function() {
        const color = document.getElementById('txt_color').value;
        const talla = document.getElementById('txt_talla').value;

        if (color.trim() === '' || talla.trim() === '') {
            alert('Por favor, ingresa un color y una talla.');
            return;
        }

        // Agregar variante al array
        variantes.push({
            color: color,
            talla: talla
        });

        // Agregar fila a la tabla
        const fila = document.createElement('tr');
        fila.innerHTML = `
            <td>${color}</td>
            <td>${talla}</td>
            <td><button type="button" class="btn btn-danger btn-sm btn-eliminar">Eliminar</button></td>
        `;
        cuerpoVariantes.appendChild(fila);

        // Limpiar campos
        document.getElementById('txt_color').value = '';
        document.getElementById('txt_talla').value = '0';
    });

    cuerpoVariantes.addEventListener('click', function(event) {
        if (event.target.classList.contains('btn-eliminar')) {
            const fila = event.target.closest('tr');
            const index = Array.from(cuerpoVariantes.children).indexOf(fila);
            variantes.splice(index, 1);
            fila.remove();
        }
    });

    btnRegistrarVariante.addEventListener('click', function() {
        registrar_variantes(variantes);
    });
});

function registrar_variantes(variantes) {
    const form = document.getElementById('form_nvo'); // Cambiado a form_producto

    const formData = new FormData(form);
    // Agregar variantes a formData
    variantes.forEach((variante, index) => {
        formData.append(`variantes[${index}][color]`, variante.color);
        formData.append(`variantes[${index}][talla]`, variante.talla);
    });

    $.ajax({
        type: 'POST',
        url: "<?= base_url(); ?>index.php/almacen/producto/registrar_variantes/",
        data: formData,
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function(data) {
            if (data.result == "success") {
                Swal.fire({
                    icon: "success",
                    title: "¡Registro exitoso!",
                    showConfirmButton: true,
                    timer: 2000
                });

                // Limpieza de la tabla y del array
                document.getElementById('cuerpo_variantes').innerHTML = '';
                variantes.length = 0;
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Sin cambios.",
                    html: "<b class='color-red'>La información no fue registrada/actualizada, intentelo nuevamente.</b>",
                    showConfirmButton: true,
                    timer: 4000
                });
            }
        },
        complete: function() {
            $("#txt_color").focus();
        }
    });
}

function registrar_img(codigo) {
    var form_data = new FormData(); // Creamos un objeto FormData

    // Agregamos la imagen seleccionada al FormData
    var file_data = $('#inp_producto').prop('files')[0];
    form_data.append('file', file_data);

    // Agregamos otros datos necesarios
    form_data.append('id', codigo);
    form_data.append('codigo', $("#nvo_codigo").val());
    form_data.append('nombre', $("#nvo_nombre").val());
    form_data.append('modelo', $("#nvo_modelo").val());
    form_data.append('color', $("#nvo_color").val());
    form_data.append('talla', $("#nvo_talla").val());
    form_data.append('nombre_img', $("#nvo_codigo").val() + $("#nvo_color").val() + $("#nvo_talla").val());

    var url = "<?= base_url(); ?>index.php/almacen/producto/registrar_img";

    $.ajax({
        url: url,
        type: 'POST',
        data: form_data,
        contentType: false, // Importante: no establecer contentType
        processData: false, // Importante: no procesar datos
        success: function(response) {
            console.log('Imagen guardada correctamente:', response);
            // Aquí puedes manejar la respuesta del servidor si es necesario
        },
        error: function(xhr, status, error) {
            console.error('Error al guardar la imagen:', error);
            // Manejar errores si es necesario
        }
    });
}

document.getElementById('inp_producto').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const reader = new FileReader();

    reader.onload = function(e) {
        document.getElementById('preview').src = e.target.result;
    }

    if (file) {
        reader.readAsDataURL(file);
    }
});


$(document).ready(function() {
    function toggleVariantes() {
        var optionValue = $('#nvo_variante').val();

        if (optionValue == '2') { // Si la opción es "SI"
            $('.variantes-formulario').show();

            $('#nvo_color').hide();
            $('#nvo_talla').hide();

            $('#nvo_color_t').hide();
            $('#nvo_talla_t').hide();
            $('#btn_principal').hide();


        } else {
            $('.variantes-formulario').hide();

            $('#nvo_color').show();
            $('#nvo_talla').show();

            $('#nvo_color_t').show();
            $('#nvo_talla_t').show();
            $('#btn_principal').show();
        }

    }


    toggleVariantes();

    $('#nvo_variante').change(function() {
        toggleVariantes();
    });

    $('#table-totales').DataTable({
        responsive: true,
        filter: false,
        destroy: true,
        autoWidth: false,
        paging: false,
        language: spanish
    });

    $('#table-precios').DataTable({
        responsive: true,
        filter: false,
        destroy: true,
        autoWidth: false,
        paging: false,
        language: spanish
    });

    $('#table-productos').DataTable({
        responsive: true,
        filter: false,
        destroy: true,
        processing: true,
        serverSide: true,
        ajax: {
            url: "<?= base_url(); ?>index.php/almacen/producto/datatable_productos/<?= $flagBS; ?>",
            type: "POST",
            data: {
                dataString: ""
            },
            beforeSend: function() {},
            error: function() {}
        },
        language: spanish
    });

    $("#buscarP").click(function() {
        codigo = $('#txtCodigo').val();
        producto = $('#txtNombre').val();
        familia = $('#txtFamilia').val();
        marca = $('#txtMarca').val();
        modelo = $('#txtModelo').val();

        $('#table-productos').DataTable({
            responsive: true,
            filter: false,
            destroy: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: "<?= base_url(); ?>index.php/almacen/producto/datatable_productos/<?= $flagBS; ?>",
                type: "POST",
                data: {
                    txtCodigo: codigo,
                    txtNombre: producto,
                    txtFamilia: familia,
                    txtMarca: marca,
                    txtModelo: modelo
                },
                error: function() {}
            },
            language: spanish
        });
    });

    $("#limpiarP").click(function() {

        $("#txtCodigo").val("");
        $("#txtNombre").val("");
        $("#txtFamilia").val("");
        $("#txtMarca").val("");
        $("#txtModelo").val("");

        codigo = "";
        producto = "";
        familia = "";
        marca = "";
        modelo = "";

        $('#table-productos').DataTable({
            responsive: true,
            filter: false,
            destroy: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: "<?= base_url(); ?>index.php/almacen/producto/datatable_productos/<?= $flagBS; ?>",
                type: "POST",
                data: {
                    txtCodigo: codigo,
                    txtNombre: producto,
                    txtFamilia: familia,
                    txtMarca: marca,
                    txtModelo: modelo
                },
                error: function() {}
            },
            language: spanish
        });
    });

    $("#nvo_autocompleteCodigoSunat").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "<?= base_url(); ?>index.php/almacen/producto/autocompleteIdSunat/",
                type: "POST",
                data: {
                    term: $("#nvo_autocompleteCodigoSunat").val()
                },
                dataType: "json",
                success: function(data) {
                    response($.map(data, function(item) {
                        return {
                            label: item.descripcion,
                            value: item.descripcion,
                            idsunat: item.idsunat
                        }
                    }));
                }
            });
        },
        select: function(event, ui) {
            $("#nvo_codigoSunat").val(ui.item.idsunat);
        },
        minLength: 2
    });

    /*  $("#txt_color").autocomplete({
         source: function(request, response) {
             $.ajax({
                 url: "<?= base_url(); ?>index.php/almacen/color/obtenerColoresAutocompletado/",
                 type: "POST",
                 dataType: "json",
                 data: {
                     term: $("#txt_color").val(),
                 },
                 success: function(data) {
                     response($.map(data, function(item) {
                         return {
                             label: item.descripcion,
                             value: item.codigo,
                             code: item.codigo,
                         };
                     }));
                 }
             });
         },
         minLength: 2,
         select: function(event, ui) {
             console.log("Seleccionado: " + ui.item.value);
             $("#codeColor").val(ui.item.code);

         }
     }); */

    /* $("#nvo_color").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "<?= base_url(); ?>index.php/almacen/color/obtenerColoresAutocompletado/",
                type: "POST",
                dataType: "json",
                data: {
                    term: $("#txt_color").val(),
                },
                success: function(data) {
                    response($.map(data, function(item) {
                        return {
                            label: item.descripcion,
                            value: item.codigo,
                            code: item.codigo,
                        };
                    }));
                }
            });
        },
        minLength: 2,
        select: function(event, ui) {
            console.log("Seleccionado: " + ui.item.value);
            $("#codeColor").val(ui.item.code);

        }
    }); */



    $("#nvo_codigo").change(function() {
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "<?= base_url(); ?>index.php/almacen/producto/existsCode/",
            data: {
                codigo: $(this).val(),
                producto: $("#id").val()
            },
            success: function(data) {
                if (data.match == true) {
                    Swal.fire({
                        icon: "info",
                        title: "Código registrado.",
                        html: "<b class='color-red'>El código ingresado ha sido registrado anteriormente.</b>",
                        showConfirmButton: true
                    });
                }
            }
        });
    });

    $("#nvo_nombre").change(function() {
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "<?= base_url(); ?>index.php/almacen/producto/existsNombre/",
            data: {
                nombre: $(this).val(),
                producto: $("#id").val()
            },
            success: function(data) {
                if (data.match == true) {
                    Swal.fire({
                        icon: "info",
                        title: "Nombre registrado.",
                        html: "<b class='color-red'>El nombre ingresado ha sido registrado anteriormente.</b>",
                        showConfirmButton: true
                    });
                }
            }
        });
    });

    $("#nvo_descripcion").keyup(function() {
        var descripcion = $("#nvo_descripcion").val().length;

        longitud = 800 - descripcion;
        $(".contadorCaracteres").html(longitud);
    });

    $(".nvo_limpiar").click(function() {
        clean();
    });
});

var productos = [];
var productos_old = [];
var lista_identificadores = [];
var datos_m = [];

$('#nuevo').click(function() {
    //console.log('hola nuev');
    clean();
    seeCombo();
});
//Buscar productos
$("#tempde_producto").autocomplete({
    source: function(request, response) {

        tipo_oper = 'V';
        moneda = 1;
        $.ajax({
            url: "<?php echo base_url(); ?>index.php/maestros/temporaldetalle/autocomplete_producto/B/" +
                $('#compania').val(),
            type: "POST",
            data: {
                term: $("#tempde_producto").val(),
                TipCli: "0",
                tipo_oper: tipo_oper,
                moneda: moneda
            },
            dataType: "json",
            success: function(data) {
                response(data);
            }
        });
    },
    select: function(event, ui) {
        /**si el producto tiene almacen : es que no esta inventariado en ese almacen , se le asigna el almacen general de cabecera**/

        $("#tempde_codproducto").val(ui.item
            .codinterno); //para este caso se esta utilizando en codigo de usuario, no el ID.
        $("#tempde_codproductoOriginal").val(ui.item.codigo);
        // $("#search_codigo").val(ui.item.value);
        // $("#search_descripcion").val(ui.item.nombre);    


    },
    minLength: 1
});

$("#tempde_producto").keypress(function(e) {
    var code = (e.keyCode ? e.keyCode : e.which);

    if (code == 13) {
        if ($(this).val() != '') {
            console.log(code);
            // busqueda_producto_enter();
        }
    }
});

//Botones para agregar y editar los productos
$("#add_producto").click(function() {
    agregar_producto_array("normal");
});
$("#edit_producto").click(function() {
    $("#edit_producto").hide("");
    agregar_producto_array("editar");
    $("#add_producto").show("");
});

function agregar_producto_array(id_tipo_producto, productsCombo = "", tipo = "normal") {
    var pase = 0;
    //Obtencion de datos al editar
    if (id_tipo_producto != 11 && productsCombo.length != 0) {

        if (pase == 2 && tipo != "editar") {
            toastr.error("Producto/Servicio ya Agregado")
            return false;
        }

        if (tipo == "editar") {
            pase = 1;
        }

        $.each(productsCombo, function(index, producto) {
            let codproductoOriginal = producto.productCode;
            let productUserCode = producto.productUserCode;
            let nombre = producto.productName;
            let cantidad = producto.productCount;
            if (pase == 0) {
                var producto = {
                    "id_producto": productUserCode,
                    "nombre": nombre,
                    "cantidad": cantidad,
                    "id_orden_pago": null,
                    "estado": 'n',
                    "codproductoOriginal": codproductoOriginal
                }
            }
            productos.push(producto);
            add_table();

        });
        //Registrar nuevos productos al combo
    } else if (id_tipo_producto != 11 && productsCombo.length == 0) {
        if ($("#tempde_cantidad").val() < 1 || $("#tempde_cantidad").val() == "") {
            Swal.fire(
                'Introduzca una cantidad válida',
                'No se puede agregar al listado',
                'warning'
            );
            return false;
        }
        let id_producto = $("#tempde_codproducto").val();
        let codproductoOriginal = $("#tempde_codproductoOriginal").val();
        let nombre = $("#tempde_producto").val();
        let cantidad = parseInt($("#tempde_cantidad").val());

        for (let i = 0; i < productos.length; i++) {
            if (productos[i]["codproductoOriginal"] == codproductoOriginal) {
                pase = 2; //Descomentar para evitar duplicados
                //pase=3; //Descomentar para sumar cantidades de duplicados
                //Comentar 2 y 3 para guardar duplicados
            }
        }
        console.log(pase);
        if (pase == 2 && tipo != "editar") {
            Swal.fire(
                'Producto ya Agregado',
                'No se puede agregar al listado',
                'error'
            );
            return false;
        }

        if (tipo == "editar") {
            pase = 1;
        }

        if (pase == 0) {
            var producto = {
                "id_producto": id_producto,
                "nombre": nombre,
                "cantidad": cantidad,
                "id_orden_pago": null,
                "estado": 'n',
                "codproductoOriginal": codproductoOriginal
            }
        }

        productos.push(producto);
        add_table();
    }

    if (pase == 3) {
        toastr.success("Cantidades Sumadas")
        let indice = productos.findIndex(producto => producto.Producto === id_producto);
        edit_table(indice, true);
    }
    if (pase == 1) {
        edit_table($("#posicion").val(), false);
    }

}

function consultarProducto() {
    var url = base_url + "index.php/almacen/producto/consultarProducto";
    $.ajax({
        url: url,
        type: 'post',
        dataType: 'json',
        success: function(data) {
            var idProducto = data[0];
            guardarCombo(idProducto);
        }
    });
}

function guardarCombo(id) {
    var url = base_url + "index.php/almacen/producto/insertarCombo";
    $.ajax({
        url: 'url',
        type: 'post',
        data: {},
        success: function() {}
    })

}


var valoresArray = [];

function almacenarValores() {
    var tempde_producto = $("#tempde_producto").val();
    var tempde_cantidad = $("#tempde_cantidad").val();
    var combo = $("#combo").val();

    valoresArray.push({
        tempde_producto: tempde_producto,
        tempde_cantidad: tempde_cantidad,
        combo: combo
    });


}


//Agregamos el registro en la tabla
function add_table() // TODO: HHH
{
    consultarProducto();
    almacenarValores();
    $("#body-td").html("");

    productos.map((item, index) => {
        index_of_table = index + 1;

        obv = "";
        if (item.observacion != "" && item.observacion != null)
            obv = " | " + item.observacion;

        let td = `
						<tr>
					        <td>${index_of_table}</td>
                            <td>${item.id_producto}</td>
                            <td>${item.nombre+obv}</td>
                            <td>${item.cantidad}</td>
                           
					  </tr>`;
        if (item.estado != 'e') {
            $("#body-td").append(td);
        }
    });

    $("#tempde_codproducto").val("");
    $("#tempde_producto").val("");
    $("#tempde_cantidad").val(0);
    $("#tempde_producto").focus();
}

//Se edita el registro con los datos ingresados  en los campos
function edit_table(id, estado) {
    var id_producto = $("#tempde_codproducto").val();
    var nombre_producto = $("#tempde_producto").val();
    var cantidad = parseFloat($("#tempde_cantidad").val());

    if (id_producto != productos[id]["id_producto"]) {
        let indice = productos.findIndex(producto => producto.Producto === productos[id]["id_producto"]);
        productos.splice(indice, 1);
        agregar_producto_array();
        return false;
    }


    if (estado == false) {
        productos[id]["cantidad"] = cantidad;

    }

    add_table();
    $("#tempde_producto").prop("readonly", false);
}

//Traemos el registro seleccionado de la tabla a los campos para poder modificarlo
function editar_producto(id) {
    $("#posicion").val(id);
    $("#tempde_codproducto").val(productos[id]["id_producto"]);
    $("#tempde_producto").val(productos[id]["nombre"]);
    $("#tempde_cantidad").val(productos[id]["cantidad"]);

    $("#add_producto").hide("");
    $("#edit_producto").show("");
    // $("#tempde_producto").prop("readonly", true);
}
//Eliminamos el registro seleccionado de la tabla
function delete_producto(index, id_orden_pago) {
    Swal.fire({
        title: '¿Eliminar Producto del Documento?',
        text: "Puede agregarlo luego de borrado",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar',
        cancelButtonText: 'No, Cerrar'
    }).then((result) => {
        if (result.isConfirmed) {
            productos.splice(index, 1);
            add_table();
        }
    });
}

//Funcion para mostrar o quitar la tabla de productos
function seeCombo() {
    let dataCombo = $('#combo').val();
    if (dataCombo != 1) {
        $('.open').removeClass("closed");
    } else {
        $('.open').addClass("closed");
    }
}

$('#modal_producto').on('hidden.bs.modal', function(e) {
    $('#productComboCode').val("");
    productos = [];
});



function getProducto(id) {
    var url = base_url + "index.php/almacen/producto/getProductoInfo";
    $.ajax({
        type: 'POST',
        url: url,
        dataType: 'json',
        data: {
            producto: id
        },
        beforeSend: function() {
            clean();
        }, //Metodo getproducto hace una peticion al controlador para obtener su id  
        success: function(data) {
            if (data.match == true) {
                productsCombo = data.productoComboInfo;

                info = data.producto;
                console.log(info);
                unidad = data.unidades;
                precio = data.precios;

                //?campos con sus datos
                $("#id").val(info.producto);
                $("#nvo_codigo").val(info.codigo);
                $("#nvo_nombre").val(info.nombre);
                $("#nvo_autocompleteCodigoSunat").val(info.sunatDescripcion);
                $("#nvo_codigoSunat").val(info.sunatCodigo);
                $("#nvo_tipoAfectacion").val(info.afectacion);
                $("#nvo_descripcion").val(info.descripcion);
                $("#nvo_familia").val(info.familia);
                $("#nvo_fabricante").val(info.fabricante);
                $("#nvo_marca").val(info.marca);
                $("#nvo_modelo").val(info.modelo);
                $("#nvo_stockMin").val(info.stockMin);
                $("#nvo_preciocosto").val(info.nvo_preciocosto);

                //? Al abrir el modal se carga la imagen del producto
                $("#guardar_img").attr("onclick", "registrar_img(" + info.producto + ")");
                $("#img_producto").attr("src", base_url + "uploads/articulos/" + info.producto + ".png");

                $("#nvo_talla").val(info.talla_info);
                $("#nvo_color").val(info.color_info);

                if (productsCombo.length != 0) {
                    $("#productComboCode").val(productsCombo[0].productComboCode);
                }
                /* Codigo implementado por el Ingeniero Crhistopher */
                $("#id_tipo_producto").val(info.id_tipo_producto);
                var id_tipo_producto = info.id_tipo_producto;
                var numeroComoCadena = id_tipo_producto.toString();
                var primerDigito = parseInt(numeroComoCadena[0]);
                var segundoDigito = parseInt(numeroComoCadena[1]);
                $("#serie").val(primerDigito);
                $("#combo").val(segundoDigito);
                //$("#serie").val(info.id_tipo_producto);
                /* end */
                /*
                $("#nvo_codigo").attr({
                    readOnly: true
                });
                */
                //$('#combo').val(1);
                seeCombo();

                campo_unidad = "nvo_unidad";
                $.each(unidad, function(i, v) {
                    document.getElementById(campo_unidad).value = v.unidad;
                });

                $.each(precio, function(i, v) {
                    $(".precio-" + v.categoria + v.moneda).val(v.precio);
                });

                $("#modal_producto").modal("toggle");
                agregar_producto_array(id_tipo_producto, productsCombo);
            } else {
                Swal.fire({
                    icon: "info",
                    title: "Información no disponible.",
                    html: "<b class='color-red'></b>",
                    showConfirmButton: true,
                    timer: 4000
                });
            }
        },
        complete: function() {}
    });
}

function registrar() {
    Swal.fire({
        icon: "info",
        title: "¿Esta seguro de guardar el registro?",
        html: "<b class='color-red'></b>",
        showConfirmButton: true,
        showCancelButton: true,
        confirmButtonText: "Aceptar",
        cancelButtonText: "Cancelar"
    }).then(result => {
        if (result.value) {
            let id = $("#id").val();
            let nombre = $("#nvo_nombre").val();
            validacion = true;
            var codigo_usuario = $("#nvo_codigo").val();
            if (nombre == "") {
                Swal.fire({
                    icon: "error",
                    title: "Verifique los datos ingresados.",
                    html: "<b class='color-red'>Debe ingresar un nombre.</b>",
                    showConfirmButton: true,
                    timer: 4000
                });
                $("#nvo_nombre").focus();
                validacion = false;
                return null;
            }
            if ($("#nvo_codigo").val() == "") {
                Swal.fire({
                    icon: "error",
                    title: "Verifique los datos ingresados.",
                    html: "<b class='color-red'>Debe ingresar un código.</b>",
                    showConfirmButton: true,
                    timer: 4000
                });
                $("#nvo_codigo").focus();
                validacion = false;
                return null;
            }

            $.ajax({
                type: "POST",
                dataType: "json",
                url: "<?= base_url(); ?>index.php/almacen/producto/existsCode/",
                data: {
                    codigo: codigo_usuario,
                    producto: $("#id").val()
                },
                success: function(data) {
                    if (validacion) {
                        if (data.match == true) {
                            Swal.fire({
                                icon: "info",
                                title: "Este código ya se encuentra registrado.",
                                html: "<b style='color: red; font-size: 12pt;'>¿Desea continuar?</b>",
                                showConfirmButton: true,
                                showCancelButton: true,
                                confirmButtonText: "Aceptar",
                                cancelButtonText: "Cancelar"
                            }).then(result => {
                                if (result.value) {
                                    if (validacion == true) {
                                        registro_producto();
                                    }
                                } else {
                                    $("#nvo_codigo").focus();
                                    return false;
                                }
                            });
                        } else {
                            registro_producto();
                        }
                    }
                }
            });
        }
    });
}

function registro_producto() {
    var valoresMoneda = $('input[name="nvo_pmoneda[]"]').map(function() {
        return $(this).val();
    }).get();

    var valoresPrecios = $('input[name="precios[]"]').map(function() {
        return $(this).val();
    }).get();

    var valoresCategoria = $('input[name="nvo_pcategoria[]"]').map(function() {
        return $(this).val();
    }).get();

    var url = base_url + "index.php/almacen/producto/guardar_registro";

    if (id_tipo_producto.value == 12 && productos.length == 0) {
        Swal.fire(
            'Introduzca una cantidad válida',
            'No se puede agregar al listado',
            'warning'
        );
        return false;
    }
    let productComboCode = $('#productComboCode').val();
    var info = $("#form_nvo").serialize();
    let ListadoProductos = {};
    for (var i = 0; i < productos.length; i++) {
        var valor = productos[i];
        ListadoProductos[i] = valor;
    }
    var searchParams = new URLSearchParams(info);
    let dataCombo = {};
    searchParams.forEach(function(valor, clave) {
        dataCombo[clave] = valor;
    });
    dataCombo.precios = valoresPrecios;
    dataCombo.nvo_pcategoria = valoresCategoria;
    dataCombo.nvo_pmoneda = valoresMoneda;

    delete dataCombo["precios[]"];
    delete dataCombo["nvo_pmoneda[]"];
    delete dataCombo["nvo_pcategoria[]"];

    $.ajax({
        type: 'POST',
        url: url,
        dataType: 'json',
        data: {
            dataCombo: dataCombo,
            ListadoProductos: ListadoProductos,
            productComboCode: productComboCode
        },
        success: function(data) {
            let id = $("#id").val();
            if (data.result == "success") {
                if (id == "")
                    titulo = "¡Registro exitoso!";
                else
                    titulo = "¡Actualización exitosa!";

                Swal.fire({
                    icon: "success",
                    title: titulo,
                    showConfirmButton: true,
                    timer: 2000
                });
                seeCombo();
                clean();
                $("#limpiar").click();
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Sin cambios.",
                    html: "<b class='color-red'>La información no fue registrada/actualizada, intentelo nuevamente.</b>",
                    showConfirmButton: true,
                    timer: 4000
                });
            }
            //##################################################
            var valor1 = $("#serie").val();
            var valor2 = $("#combo").val();
            $("#id_tipo_producto").val(valor1 + valor2);
            //##################################################
        },
        complete: function() {
            $("#nvo_codigo").focus();
        }
    });
}

function insertar_costo(id, precioc) {
    costo = $("#" + precioc).val();

    if (id != '' && costo != '') {
        url = base_url + "index.php/almacen/producto/nvoCosto";

        $.ajax({
            type: "POST",
            url: url,
            data: {
                codigo: id,
                nvoCosto: costo
            },
            dataType: 'json',
            beforeSend: function() {
                $("#btnCosto" + precioc).hide();
                $("#loading" + precioc).show();
            },
            success: function(data) {
                console.log(data);
                if (data.result == 'success') {

                    Swal.fire({
                        icon: "success",
                        title: "Precio actualizado.",
                        showConfirmButton: true,
                        timer: 2000
                    });

                    $("#span" + precioc).html(costo);
                    $("#loading" + precioc).hide();
                    $("#btnCosto" + precioc).show();
                } else {
                    Swal.fire({
                        icon: "warning",
                        title: data.msg,
                        showConfirmButton: true,
                        timer: 2000
                    });

                    $("#loading" + precioc).hide();
                    $("#btnCosto" + precioc).show();
                }
            },
            error: function(HXR, error) {
                $("#loading" + precioc).hide();
                $("#btnCosto" + precioc).show();
            }
        });
    }
}

function cambiarEstado(estado, producto) {
    url = '<?php echo base_url(); ?>index.php/almacen/producto/cambiarEstado/';
    $.ajax({
        url: url,
        type: "POST",
        data: {
            estado: Number(estado),
            cod_producto: producto
        },
        dataType: "json",
        beforeSend: function(data) {
            $('#cargando_datos').show();
        },
        success: function(data) {
            if (data.cambio == true || data.cambio == 'true') {
                $('#cargando_datos').hide();
                alert('Cambio de estado correctamente!');
                window.location = "<?php echo base_url(); ?>index.php/almacen/producto/productos/B";
            } else {
                $('#cargando_datos').hide();
                alert('Ah Ocurrido un error con el cambio de estado!');
            }
        },
        error: function(data) {
            $('#cargando_datos').hide();
            console.log('Error en cambio de fase');
        }
    });
}

function clean() {
    $("#form_nvo")[0].reset();
    $("#id").val("");
    $(".contadorCaracteres").html("800");

    $("#nvo_codigo").removeAttr("readOnly");
}
</script>