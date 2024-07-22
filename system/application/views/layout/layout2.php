<link rel="stylesheet" href="<?php echo base_url(); ?>pos/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>pos/css/easy-autocomplete.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>pos/css/toastr.min.css" />
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
<script src="<?php echo base_url(); ?>pos/js/jquery-3.6.0.js"></script>
<script src="<?php echo base_url(); ?>pos/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>pos/js/fontawesome.min.js"></script>
<script src="<?php echo base_url(); ?>pos/js/jquery.easy-autocomplete.min.js"></script>
<script src="<?php echo base_url(); ?>pos/js/toastr.min.js"></script>
<script src="<?php echo base_url(); ?>pos/js/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css"
    rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>pos/js/kioskboard-1.0.0.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>pos/css/kioskboard-1.0.0.css">
<style type="text/css">
/*-- Number input --*/


/* Estilo para el contenedor principal */
.row1 {
    border-radius: 20px;
    /* Borde redondeado */
    border: 3px solid #e9b500;
    margin: 5px;
    /* Espaciado interno */
}

/* Estilo para las columnas internas */
.col-md-4 {
    border: none;
    /* Eliminar el borde interno */
    margin-bottom: 10px;
    /* Espaciado inferior entre columnas */
}

.row {
    display: flex;
    justify-content: space-between;
    /* This will create space between the two columns */
}

.column {
    width: 30%;
    /* Adjust the width as needed */
}

.input-number {
    position: relative;
}

.input-number {
    -webkit-appearance: none;
    margin: 0;
}

.input-number {
    -moz-appearance: textfield;
    height: 40px;
    width: 100%;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    background-color: #FFF;
    padding: 0px 35px 0px 15px;

    /*display: block;
    width: 100%;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;*/

}

.input-number:focus {
    color: #212529;
    background-color: #fff;
    border-color: #86b7fe;
    outline: 0;
    box-shadow: 0 0 0 .25rem rgba(13, 110, 253, .25)
}

.input-number .qty-up,
.input-number .qty-down {
    position: absolute;
    display: block;
    width: 20px;
    height: 20px;
    border: 1px solid #ced4da background-color: #FFF;
    text-align: center;
    font-weight: 700;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

.input-number .qty-up {
    right: 0;
    top: 0;
    border-bottom: 0px;
}

.input-number .qty-down {
    right: 0;
    bottom: 0;
}

.input-number .qty-up:hover,
.input-number .qty-down:hover {
    background-color: #E4E7ED;
    color: #D10024;
}

.excel-reporte {
    border: 0;
    background-color: transparent;
}

.pdf-reporte {
    border: 0;
    background-color: transparent;
}



#KioskBoard-VirtualKeyboard {
    width: 100%;
    height: 330px;
}

@media screen and (max-width: 980px) {
    div#teclado_div {
        display: none;
    }
}


#virtual-keyboard {
    /*border: 5px #212F3D double;*/
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    padding: 15px;
    /*background-color: #626567;*/
}

.keyboard-row {
    text-align: center;
    margin-bottom: 10px;
}

#virtual-keyboard a {
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    background: #000000;
    padding: 3px 4px;
    font-size: 18px;
    color: #ffffff;
    text-align: center;
    margin-right: 15px;
    text-decoration: none;
}

#virtual-keyboard a:hover {
    text-decoration: none;
    opacity: 0.8;
}

#ventana-flotante {
    width: 40%;
    /* Ancho de la ventana */
    height: 90px;
    /* Alto de la ventana */
    background: #bec9be;
    /* Color de fondo */
    position: fixed;
    top: 50%;
    left: 50%;
    margin-left: -180px;
    /*border: 1px solid #adffad;  /* Borde de la ventana */
    */
    /*box-shadow: 0 5px 25px rgba(0,0,0,.1);  /* Sombra */
    */ z-index: 999;
}

#ventana-flotante #contenedor {
    padding: 25px 10px 10px 10px;
}

#ventana-flotante .cerrar {
    float: right;
    border-bottom: 1px solid #bbb;
    border-left: 1px solid #bbb;
    color: #999;
    background: white;
    line-height: 17px;
    text-decoration: none;
    padding: 0px 14px;
    font-family: Arial;
    border-radius: 0 0 0 5px;
    box-shadow: -1px 1px white;
    font-size: 18px;
    -webkit-transition: .3s;
    -moz-transition: .3s;
    -o-transition: .3s;
    -ms-transition: .3s;
}

#ventana-flotante .cerrar:hover {
    background: #ff6868;
    color: white;
    text-decoration: none;
    text-shadow: -1px -1px red;
    border-bottom: 1px solid red;
    border-left: 1px solid red;
}

#ventana-flotante #contenedor .contenido {
    padding: 15px;
    box-shadow: inset 1px 1px white;
    background: #f2ffe8;
    /* Fondo del mensaje */
    /*border: 1px solid #9eff9e;  /* Borde del mensaje */
    */ font-size: 20px;
    /* Tamaño del texto del mensaje */
    color: #555;
    /* Color del texto del mensaje */
    text-shadow: 1px 1px white;
    margin: 0 auto;
    border-radius: 4px;
}

.oculto {
    -webkit-transition: 1s;
    -moz-transition: 1s;
    -o-transition: 1s;
    -ms-transition: 1s;
    opacity: 0;
    -ms-opacity: 0;
    -moz-opacity: 0;
    visibility: hidden;
}








/* Estilos para hacer la tabla responsive */
.table-responsive {
    overflow-x: auto;
}

/* Ajustar el ancho de las columnas según el contenido */
.table {
    width: 100%;
    border-collapse: collapse;
}

.table th,
.table td {
    padding: 8px;
    text-align: left;
}

/* Estilos para cuando la tabla sea muy pequeña */


@media (max-width: 768px) {
    .table-responsive {
        width: 100%;
        margin-bottom: 15px;
        overflow-y: hidden;
        -ms-overflow-style: -ms-autohiding-scrollbar;
        border: 1px solid #ddd;
    }

    .table {
        border-collapse: collapse !important;
        width: 100% !important;
        max-width: 100%;
        margin-bottom: 0;
    }

    .table-bordered {
        border: 0;
    }

    .table-responsive {
        border: 1px solid #ddd;
    }
}



/* Codigo modal Stock general */

@media(max-width: 390px) {
    .table-modal-small {
        font-size: 0.8rem;
    }
}

@media(max-width: 325px) {
    .table-modal-small {
        font-size: 0.7rem;
    }
}

@media(max-width: 295px) {
    .table-modal-small {
        font-size: 0.6rem;

    }
}

@media(max-width: 270px) {
    .table-modal-small {
        font-size: 0.5rem;

    }
}
</style>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8">
    <title>POS</title>
</head>
<style type="text/css">
.fa,
.fas.far,
.fa-solid {
    cursor: pointer;
}

@keyframes ldio-0sdgcnk1lov {
    0% {
        opacity: 1;
        backface-visibility: hidden;
        transform: translateZ(0) scale(1.5, 1.5);
    }

    100% {
        opacity: 0;
        backface-visibility: hidden;
        transform: translateZ(0) scale(1, 1);
    }
}

.ldio-0sdgcnk1lov div>div {
    position: absolute;
    width: 24px;
    height: 24px;
    border-radius: 50%;
    background: #93dbe9;
    animation: ldio-0sdgcnk1lov 1s linear infinite;
}

.ldio-0sdgcnk1lov div:nth-child(1)>div {
    left: 148px;
    top: 88px;
    animation-delay: -0.875s;
}

.ldio-0sdgcnk1lov>div:nth-child(1) {
    transform: rotate(0deg);
    transform-origin: 160px 100px;
}

.ldio-0sdgcnk1lov div:nth-child(2)>div {
    left: 130px;
    top: 130px;
    animation-delay: -0.75s;
}

.ldio-0sdgcnk1lov>div:nth-child(2) {
    transform: rotate(45deg);
    transform-origin: 142px 142px;
}

.ldio-0sdgcnk1lov div:nth-child(3)>div {
    left: 88px;
    top: 148px;
    animation-delay: -0.625s;
}

.ldio-0sdgcnk1lov>div:nth-child(3) {
    transform: rotate(90deg);
    transform-origin: 100px 160px;
}

.ldio-0sdgcnk1lov div:nth-child(4)>div {
    left: 46px;
    top: 130px;
    animation-delay: -0.5s;
}

.ldio-0sdgcnk1lov>div:nth-child(4) {
    transform: rotate(135deg);
    transform-origin: 58px 142px;
}

.ldio-0sdgcnk1lov div:nth-child(5)>div {
    left: 28px;
    top: 88px;
    animation-delay: -0.375s;
}

.ldio-0sdgcnk1lov>div:nth-child(5) {
    transform: rotate(180deg);
    transform-origin: 40px 100px;
}

.ldio-0sdgcnk1lov div:nth-child(6)>div {
    left: 46px;
    top: 46px;
    animation-delay: -0.25s;
}

.ldio-0sdgcnk1lov>div:nth-child(6) {
    transform: rotate(225deg);
    transform-origin: 58px 58px;
}

.ldio-0sdgcnk1lov div:nth-child(7)>div {
    left: 88px;
    top: 28px;
    animation-delay: -0.125s;
}

.ldio-0sdgcnk1lov>div:nth-child(7) {
    transform: rotate(270deg);
    transform-origin: 100px 40px;
}

.ldio-0sdgcnk1lov div:nth-child(8)>div {
    left: 130px;
    top: 46px;
    animation-delay: 0s;
}

.ldio-0sdgcnk1lov>div:nth-child(8) {
    transform: rotate(315deg);
    transform-origin: 142px 58px;
}

.loadingio-spinner-spin-lvpepxs6i1 {
    width: 200px;
    height: 200px;
    display: inline-block;
    overflow: hidden;
    background: none;
}

.ldio-0sdgcnk1lov {
    width: 100%;
    height: 100%;
    position: relative;
    transform: translateZ(0) scale(1);
    backface-visibility: hidden;
    transform-origin: 0 0;
    /* see note above */
}

.ldio-0sdgcnk1lov div {
    box-sizing: content-box;
}


#imgload2 {
    position: fixed;
    top: 40%;
    left: 35%;
    right: 0;
    bottom: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
    transition: 1s all;
}
</style>

<body style="background-color:#0B194D;">
</body>
<div class="col-md-12" id="imgload"
    style="width: 100%;background-color: #c1c1d536;position: fixed;height: 100%;display: none;">
    <img src="<?php echo base_url(); ?>images/load2.gif" id="imgload2">
</div>
<input type="hidden" id="numero_temporal">

<script type="text/javascript">
KioskBoard.Init({
    keysArrayOfObjects: null,
    keysJsonUrl: '<?php echo base_url(); ?>pos/kioskboard-keys.json',
    specialCharactersObject: null,
    keysSpecialCharsArrayOfStrings: [".", ","],
    language: 'en',
    theme: 'light',
    capsLockActive: true,
    allowRealKeyboard: false,
    cssAnimations: true,
    cssAnimationsDuration: 360,
    cssAnimationsStyle: 'slide',
    keysAllowSpacebar: true,
    keysSpacebarText: 'Space',
    keysFontFamily: 'sans-serif',
    keysFontSize: '18px',
    keysFontWeight: 'normal',
    keysIconSize: '19px',
});
</script>
<div class="card">
    <div class="card-header" style="background-color: #000000; color:white">
        <div class="row">
            <div class="col-md-4">
                <img src="<?php echo base_url(); ?>/assets/img/logo_pos.png">
            </div>
            <!--     		
					<div class="col-md-2" id="teclado_div">
    			Teclado Virtual <input type="checkbox" data-toggle="toggle" data-size="sm" data-on="SI" data-off="NO" id="teclado">
    			<input type="hidden" id="teclado_hidden">
    			<input type="hidden" id="producto_hidden">
    			</div> 
    		-->


            <div class="col-md-2" id="usuario_venta">
                Usuario: <b><?php echo $usuario; ?></b>
            </div>

            <div class="col-md-2">
                <label id="see_last_sell" style="cursor:pointer;">Última Venta <i class="fa-solid fa-money-bill"
                        style="color:green;"></i></label>
            </div>

            <div class="col-md-2">
                Establecimiento: <b><?php echo $nombre_sucursal; ?></b>
            </div>

            <div class="col-md-2" align="right">
                <label>Salir de POS</label>
                <i class="fa-solid fa-right-from-bracket" id="salir_pos"></i>
                <div>
                    <a style="font-family: Arial, Helvetica, sans-serif; font-weight: bold; color: #000000; text-decoration: none;"
                        href="<?= site_url('index/salir_sistema'); ?>">Salir del Sistema</a>
                </div>
            </div>
        </div>
    </div>
</div>
<br>

<div>
    <input type="hidden" id="estadoC" value="<?=$estado_caja?>">
</div>
<button id="name_caja" type="button" class="btn btn-success" style="position: relative; left:85rem">
    <?= $cajas[0]['CAJA_Nombre']; ?>
</button>

<button id="caja_null" type="button" class="btn btn-danger" style="display: none; position: relative; left:85rem">
    APERTURE UNA CAJA
</button>
<script>
var estado = $('#estadoC').val();

if (estado == 0) {
    document.getElementById("name_caja").style.display = "none";
    document.getElementById("caja_null").style.display = "block";
} else {
    document.getElementById("name_caja").style.display = "block";
    document.getElementById("caja_null").style.display = "none";
}
</script>
<style>
@keyframes blink {
    0% {
        opacity: 1;
    }

    50% {
        opacity: 0;
    }

    100% {
        opacity: 1;
    }
}

@keyframes glow {
    0% {
        box-shadow: 0 0 10px 0 rgba(0, 255, 0, 0.7);
    }

    50% {
        box-shadow: 0 0 20px 10px rgba(0, 255, 0, 0.4);
    }

    100% {
        box-shadow: 0 0 10px 0 rgba(0, 255, 0, 0.7);
    }
}

@keyframes blink_null {
    0% {
        opacity: 1;
    }

    50% {
        opacity: 0;
    }

    100% {
        opacity: 1;
    }
}

@keyframes glow_null {
    0% {
        box-shadow: 0 0 10px 0 rgba(255, 0, 0, 0.7);
    }

    50% {
        box-shadow: 0 0 20px 10px rgba(255, 0, 0, 0.4);
    }

    100% {
        box-shadow: 0 0 10px 0 rgba(255, 0, 0, 0.7);
    }
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
<!-- REPORTE 
<div class="row mb-2">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header d-flex justify-content-around align-items-center">
				<h5 class="m-0">REPORTE DE VENTAS DIARIO</h5>
				<button class="excel-reporte">
					<iconify-icon style="font-size:2rem" icon="vscode-icons:file-type-excel"></iconify-icon>
				</button> -->
<!-- CODIGO COLOCADO POR EL DESARROLLADOR ALDO -->
<!--	<button onclick="reportePdf()" class="pdf-reporte">
					<iconify-icon style="font-size:2rem" icon="vscode-icons:file-type-pdf2"></iconify-icon>
				</button>
			</div>
		</div>
	</div>
</div> -->

<!-- REPORTE -->

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="dropdown">
                <a class="btn btn-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                    style="background-color: #3CB371; color:#FFF">
                    OPCIONES DE CAJA
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#" onclick="modalEstadoCaja()">Apertura - Cierre de caja</a>
                    <!-- 				<a class="dropdown-item" href="#" onclick="modalEstadistica()">Estadisticas Ventas</a>
 --> <a class="dropdown-item" href="#" onclick="modalcierres()">Mis cuadres</a>
                </div>
            </div>
            <div class="card-header">
                <input type="hidden" id="moneda" name="moneda" value="1">
                <input type="hidden" id="flagBS" value="B">
                <!--<input type="hidden" id="almacen" value="1">-->
                <input type="hidden" id="cliente">
                <input type="hidden" id="last_sell">
                <input type="hidden" id="last_sell_tipo">
                <input type="hidden" id="tipo_persona">
                <input type="hidden" id="fecha_temp" value="<?php echo date("Y-m-d"); ?>">
                <input type="hidden" id="tdcDolar" value="<?php echo $tdcDolar; ?>">
                <input type="hidden" id="sucursal" value="<?php echo $sucursal; ?>">
                <!---->
                <form id="frmComprobante">
                    <input type="hidden" name="datos" id="datos">
                </form>

                <div class="row">
                    <div class="col-md-6" id="ch">Tipo de Comprobante</div>
                    <div class="col-md-6">
                        <select class="form-control" id="cboTipoDocu">
                            <option value="N">NOTA DE SALIDA</option>
                            <option value="B">BOLETA</option>
                            <option value="F">FACTURA</option>

                        </select>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">RUC/DNI</div>
                            <div class="col-md-12"><input id="ruc_cliente" name="ruc_cliente" type="text"
                                    class="form-control teclado" data-kioskboard-specialcharacters="true"
                                    data-kioskboard-type="all" onclick="ver_teclado('ruc_cliente')"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">Nombre/Razón Social <i class="fa-solid fa-circle-plus"
                                    id="modal_d">Nuevo</i></div>
                            <div class="col-md-12"><input type="text" id="nombre_cliente" name="nombre_cliente"
                                    class="form-control teclado" data-kioskboard-specialcharacters="true"
                                    data-kioskboard-type="all" onclick="ver_teclado('nombre_cliente')"></div>
                        </div>
                    </div>

                    <div class="col-md-12" style="display:none;">
                        <div class="row">
                            <div class="col-md-12">Dirección</div>
                            <div class="col-md-12">
                                <select id="direccionsuc" name="direccionsuc" class="form-control"></select>
                            </div>
                        </div>
                    </div>
                    <!-- 	<div class="col-md-6">
						<div class="row">
							<div class="col-md-12">Vendedor <i class="fa-solid fa-circle-plus" id="modal_d_2">Nuevo</i></div>
							<div class="col-md-12">
								<select class="form-control" id="cboVendedor">
									<option value="">Seleccione</option>
									<?php foreach ($cboVendedor as $key => $value) { ?>
										<option value="<?php echo $value->PERSP_Codigo; ?>"><?php echo $value->PERSC_Nombre . "-" . $value->PERSC_ApellidoPaterno; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
					</div> -->
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">Categoria de Precios</div>
                            <div class="col-md-12">
                                <select class="form-control" id="TipCli">
                                    <?php foreach ($Categorias as $key => $value) { ?>
                                    <option value="<?php echo $value->TIPCLIP_Codigo; ?>">
                                        <?php echo $value->TIPCLIC_Descripcion; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <label>Caja</label>
                        <select class="form-control" id="caja">
                            <!--<option value="">Seleccionar</option>--> <?php
							foreach ($cajas as $key => $value) {
							?><option value="<?= $value['CAJA_Codigo']; ?>"><?= $value['CAJA_Nombre']; ?></option><?php
                        }?>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Observaciones:</label><input type="text" id="observaciones"
                                    data-kioskboard-specialcharacters="true" data-kioskboard-type="all"
                                    onclick="ver_teclado('observaciones')" class="form-control teclado">
                            </div>
                        </div>
                    </div>
                    <!--Campo vendedor-->
                    <div class="col-md-6" <?=($tipo_oper == "C") ? "style='display:none'" : "";?>>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Vendedor</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <select id="cboVendedor" name="cboVendedor" class="form-control">
                                    <?=$cboVendedor;?>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12" style="padding-top: 10px;">
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="width: 40%;">Producto</th>
                                            <th scope="col" style="width: 15%;">Precio</th>
                                            <th scope="col" style="width: 25%;">Cantidad</th>
                                            <th scope="col" style="width: 15%;">Total</th>
                                            <?php 
											$this->load->library('session');
											$rol = $this->session->userdata('rol');
											?>
                                            <th scope="col" style="width: 05%;"></th>
                                            <input type="hidden" id="rol" value="<?php echo $rol ?>">
                                        </tr>
                                    </thead>
                                    <tbody id="tbody_productos">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding: 10px;">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">Subtotal</div>
                            <div class="col-md-6">S./<label id="subtotal">0</label></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">IGV</div>
                            <div class="col-md-6">S./<label id="igv">0</label></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">Total</div>
                            <div class="col-md-6">S./<label id="total">0</label></div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">RUC/DNI</div>
                                <div class="col-md-12"><input id="ruc_cliente" name="ruc_cliente" type="text"
                                        class="form-control teclado" data-kioskboard-specialcharacters="true"
                                        data-kioskboard-type="all" onclick="ver_teclado('ruc_cliente')"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">Nombre/Razón Social <i class="fa-solid fa-circle-plus"
                                        id="modal_d">Nuevo</i></div>
                                <div class="col-md-12"><input type="text" id="nombre_cliente" name="nombre_cliente"
                                        class="form-control teclado" data-kioskboard-specialcharacters="true"
                                        data-kioskboard-type="all" onclick="ver_teclado('nombre_cliente')"></div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-12">
                        <br>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6" align="center">
                                <button type="button" class="btn btn-danger" id="cancelar"
                                    style="width: 100%!important;height: 60px!important;">Cancelar Venta</button>
                            </div>
                            <div class="col-md-6" align="center">
                                <button type="button" class="btn btn-success" id="procesar"
                                    style="width: 100%!important;height: 60px!important;">Procesar Venta</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-2">
                        Productos
                    </div>
                    <div class="col-md-6">
                        <select id="almacen" name="almacen" class="form-control" onchange="cargar_favoritos()">
                            <?php
							foreach ($almacenes as $key => $value) {
							?><option value="<?= $value->ALMAP_Codigo; ?>"><?= $value->ALMAC_Descripcion; ?></option><?php
																													}
																														?>
                        </select>
                    </div>
                    <div class="col-md-2" style="cursor:pointer;" id="fav_reload">
                        <i class="fa-solid fa-rotate-left"></i> Actualizar
                    </div>
                    <div class="col-md-2" align="center">
                        <div class="row">
                            <div class="col-md-10" align="right" style="padding-right: 0;">
                                <i class="fa-solid fa-star" style="font-size: 20px;cursor: auto;"></i>
                            </div>
                            <div class="col-md-1" align="left">
                                <i style="padding-top: 0px;font-size: 14px;color: #db3434;" data-html="true"
                                    data-toggle="popover" data-bs-trigger="hover" title="Favoritos" data-bs-content="
  						<div class='row'>
  							<div class='col-md-12'><i class='fa-solid fa-star' style='color:green;'></i>Marcado como Favorito</div>
  							<div class='col-md-12'><i class='fa-solid fa-star' style='color:#bdbdbd'></i>Marcado como Normal</div>
  							<div class='col-md-12'><hr></div>
  							<div class='col-md-12'>*Los Productos Marcados como <b>Favoritos</b> se Cargan al Iniciar POS</div>
  						</div>" class="fa-solid fa-circle-question"></i>
                            </div>
                            <div class="col-md-1" align="left">
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <div class="container">
                <hr>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8 text-center">
                        <h6>Buscar un Producto o Servicio</h6>
                        <!-- <div class="d-flex justify-content-center">
							<img src="<?=base_url();?>images/zapatilla_vf01.jpg" width="200" height="200" />
						</div> -->
                    </div>
                    <div class="col-2"></div>
                </div>
            </div>

            <div id='ventana-flotante' class="oculto" style="z-index: 4000!important;">
                <div class="card" style="background-color: #ffffff00;">
                    <div class="card-body" style="background-color: #bfbfbf;border-radius: 30px;">
                        <a class='cerrar' onclick="cerrar_teclado()" style="cursor: pointer;">x</a>
                        <div id='contenedor' class="container" style="">
                            <div class='contenido'>
                                <div class="row">
                                    <div id="content" class="col-lg-12">

                                        <div id="virtual-keyboard">
                                            <div class="keyboard-row">
                                                <a class="number" href="#" data="1">1</a>
                                                <a class="number" href="#" data="2">2</a>
                                                <a class="number" href="#" data="3">3</a>
                                                <a class="number" href="#" data="4">4</a>
                                                <a class="number" href="#" data="5">5</a>
                                                <a class="number" href="#" data="6">6</a>
                                                <a class="number" href="#" data="7">7</a>
                                                <a class="number" href="#" data="8">8</a>
                                                <a class="number" href="#" data="9">9</a>
                                                <a class="number" href="#" data="0">0</a>
                                            </div>
                                            <div class="keyboard-row">
                                                <a href="#" data="Q">Q</a>
                                                <a href="#" data="W">W</a>
                                                <a href="#" data="E">E</a>
                                                <a href="#" data="R">R</a>
                                                <a href="#" data="T">T</a>
                                                <a href="#" data="Y">Y</a>
                                                <a href="#" data="U">U</a>
                                                <a href="#" data="I">I</a>
                                                <a href="#" data="O">O</a>
                                                <a href="#" data="P">P</a>
                                            </div>
                                            <div class="keyboard-row">
                                                <a href="#" data="A">A</a>
                                                <a href="#" data="S">S</a>
                                                <a href="#" data="D">D</a>
                                                <a href="#" data="F">F</a>
                                                <a href="#" data="G">G</a>
                                                <a href="#" data="H">H</a>
                                                <a href="#" data="J">J</a>
                                                <a href="#" data="K">K</a>
                                                <a href="#" data="L">L</a>
                                                <a href="#" data="Ñ">Ñ</a>
                                            </div>
                                            <div class="keyboard-row">
                                                <a href="#" data="Z">Z</a>
                                                <a href="#" data="X">X</a>
                                                <a href="#" data="C">C</a>
                                                <a href="#" data="V">V</a>
                                                <a href="#" data="B">B</a>
                                                <a href="#" data="N">N</a>
                                                <a href="#" data="M">M</a>
                                            </div>
                                            <div class="keyboard-row">
                                                <a href="#" data=" ">ESPACIO</a>
                                                <a href="#" data="DEL">BORRAR</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>



            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" placeholder="Ingrese el producto....." class="form-control teclado"
                            data-kioskboard-type="all" data-kioskboard-specialcharacters="true" id="search"
                            autocomplete="off" onclick="ver_teclado('search');">
                    </div>
                    <div class="col-md-12">
                        <input type="text" placeholder="..." class="form-control teclado" id="producto_s"
                            name="producto_s" value="">
                    </div>
                    <div class="col-md-12" align="center">
                        <div id="search_msj" style="display:block;" class="msj">
                            <!-- <i class="fa-solid fa-arrow-up-wide-short" style="padding-top: 30px;font-size: 30px;"></i>
							<br>
							<label>Buscar un Producto o Servicio</label> -->
                        </div>
                        <div id="empty_msj" style="display:none;" class="msj">
                            <i class="fa-solid fa-ban" style="padding-top: 30px;font-size: 30px;"></i>
                            <br>
                            <label>Sin Resultados</label>
                        </div>
                        <div id="search_result" align="center">
                            <hr>
                            <div class="row" id="results" align="center">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
@media screen and (max-width: 363px) {
    .table-wrapper {
        overflow-x: auto;
    }

    .table-wrapper table {
        width: 100%;
    }
}
</style>

<div class="modal fade" id="StockModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Stock General</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-wrapper">
                    <table class="table table-striped table-hover table-modal-small" style="font-size: 11px;">
                        <thead>
                            <tr>
                                <th scope="col">Compañia</th>
                                <th scope="col">Sucursal</th>
                                <th scope="col">Almacen</th>
                                <th scope="col">Stock</th>
                            </tr>
                        </thead>
                        <tbody id="res">
                            <!-- Contenido de la tabla -->
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
            </div>
        </div>
    </div>
</div>



<div class="modal hide fade in" data-keyboard="false" data-backdrop="static" id="modal_pago">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">PAGAR:</h5>
            </div>
            <div class="modal-body">
                <button id="bb" class="btn btn-success" type="button"><i id="duplicar_contenido"
                        class="fa-solid fa-circle-plus" onclick=" duplicarContenido();">Nuevo</i></button>

                <div id="row" class="row1 row">
                    <div class="row">
                        <!-- Columna "TIPO DE PAGO" -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="condiciones_pago">TIPO DE PAGO</label>
                                <select class="form-control tipo_pago" id="condiciones_pago" name="condiciones_pago"
                                    onchange="ver_tipo_pago()">
                                    <?php foreach ($cboFormaPago as $key => $value) { ?>
                                    <option value="<?php echo $value->FORPAP_Codigo; ?>">
                                        <?php echo $value->FORPAC_Descripcion; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <!-- Columna "Numero de operacion" -->
                        <div class="col-md-4">
                            <div class="form-group" id="num_ope">
                                <label for="num_operacion">NUMERO DE OPERACION:</label>
                                <input type="text" onkeyup="capturarValor(this, this.id)" id="num_operacion"
                                    name="num_operacion" class="form-control teclado num_operacion"
                                    data-kioskboard-specialcharacters="true" data-kioskboard-type="all">
                            </div>
                        </div>

                        <!-- Columna "MONTO" -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="monto_temp">MONTO:</label>
                                <input type="number" onkeyup="capturarValor(this, this.id)" id="monto_temp"
                                    name="monto_temp" class="form-control teclado monto_temp"
                                    data-kioskboard-specialcharacters="true" data-kioskboard-type="all">
                            </div>
                        </div>

                        <!-- Columna "VUELTO" -->
                        <!-- <div class="col-md-4">
					<div class="form-group">
						<label for="vuelto_temp">VUELTO:</label>
						<input type="number" id="vuelto_temp" value="0" name="vuelto_temp" class="form-control teclado vuelto_temp" data-kioskboard-specialcharacters="true" data-kioskboard-type="all" readonly>
					</div>
				</div> -->
                    </div>

                    <div class="row">
                        <!-- Columna "ELIMINAR" -->
                        <div class="col-md-4 offset-md-4">
                            <button type="button" name="eliminar_tipo_pago" id="eliminar_tipo_pago"
                                class="form-control btn btn-danger"
                                onclick="eliminarContenido(this.id)">Eliminar</button>
                        </div>
                    </div>
                </div>
                <div id="contenedorDuplicado"></div>



                <script>
                let contadorDuplicados = 0;

                function desabilitar_nuevo(numero, total) {
                    var duplicarElemento = document.getElementById("bb");

                    // Verificar si el elemento existe antes de intentar modificarlo
                    if (numero > total) {
                        duplicarElemento.disabled = true;
                    } else {
                        duplicarElemento.disabled = false;
                    }
                }

                // Función para duplicar el conjunto completo de tres columnas
                function duplicarContenido() {
                    let duplicar_contenido = document.getElementById("duplicar_contenido");
                    // Clonar el contenedor original
                    var contenedorOriginal = document.querySelector('#row').cloneNode(true);
                    // Incrementar el contador
                    contadorDuplicados++;
                    // Modificar el ID del contenedor clonado
                    contenedorOriginal.id = 'contenedorDuplicado_' + contadorDuplicados;
                    // Modificar los IDs y names dentro del contenedor clonado
                    contenedorOriginal.querySelectorAll('[id], [name]').forEach(element => {
                        if (element.id) {
                            element.id = element.id + '_' + contadorDuplicados;
                        }
                        if (element.name) {
                            element.name = element.name + '_' + contadorDuplicados;
                        }
                    });
                    // Añadir el contenedor clonado al contenedor principal
                    document.querySelector('#contenedorDuplicado').appendChild(contenedorOriginal);
                }

                function eliminarContenido(id) {
                    console.log("ID del botón clickeado: " + id);
                    // Dividir la cadena usando el guion bajo como separador
                    var partes = id.split('_');
                    // Obtener el último elemento del array resultante
                    var ultimoElemento = partes[partes.length - 1];
                    // Convertir el número a un entero
                    var numero = parseInt(ultimoElemento, 10);


                    if (isNaN(numero)) {
                        Swal.fire({
                            icon: "warning",
                            title: "Tiene que existir al menos un tipo de pago.",
                            showConfirmButton: false,
                            showCancelButton: false,
                            timer: 2000
                        });
                    } else {
                        console.log("Número después del último guion: " + numero);
                        let contenedorDuplicado = document.querySelector("#contenedorDuplicado_" + numero).remove();
                    }
                }

                function capturarValor(inputElement, id) {

                    var partes = id.split('_');
                    // Obtener el último elemento del array resultante.
                    var ultimoElemento = partes[partes.length - 1];
                    // Convertir el número a un entero.
                    var numero = parseInt(ultimoElemento, 10);
                    // Obtener el valor del input mientras se escribe en numeros.
                    let valor_del_input_monto = inputElement.value;
                    calcular_vuelto(valor_del_input_monto, numero);
                    //console.log("Valor del monto: " + id);
                    //console.log("Valor del monto: " + valor);
                }

                function calcular_vuelto(inputElement, id) {

                    var monto = inputElement;
                    var total = $("#total_temp").val();
                    var vuelto = parseFloat(total) - parseFloat(monto);
                    desabilitar_nuevo(monto, total);

                    //falta validar el tipo NaN en el input 



                    if (isNaN(id)) {
                        $("#vuelto_temp").val(vuelto * -1);
                    } else {
                        $("#vuelto_temp_" + id).val(vuelto * -1);
                    }
                    //let total_temp =document.getElementById("total_temp").value;
                    //console.log(total_temp);
                }

                function final_para_enviar() {
                    let datos_function = obtener_tipos_pago_Montos();
                    if (datos_function) {
                        return;
                    } else {
                        console.log(datos_function)
                    }

                }

                function obtener_tipos_pago_Montos() {
                    // Obtener todos los elementos select con la clase 'tipo_pago'
                    var tiposPago = document.querySelectorAll('.tipo_pago');
                    var montos = document.querySelectorAll('.monto_temp');
                    // Verificar que haya la misma cantidad de tipos de pago y montos
                    if (tiposPago.length !== montos.length) {
                        console.error('La cantidad de tipos de pago no coincide con la cantidad de montos.');
                        return;
                    }
                    var pagos = [];
                    // Iterar sobre la NodeList de tiposPago y montos al mismo tiempo
                    tiposPago.forEach(function(tipoPago, index) {
                        var monto = montos[index];
                        // Mostrar el valor de cada elemento select
                        console.log("El tipo de pago es: " + tipoPago.value);
                        // console.log("El monto de pago es: " + monto.value);
                        // Almacenar la información en el array pagos
                        pagos.push({
                            tipo_pago: tipoPago.value,
                            monto_pago: parseFloat(monto.value) || 0
                        });
                    });
                    // Inicializar la variable para la suma
                    var suma = pagos.reduce(function(total, pago) {
                        return total + pago.monto_pago;
                    }, 0);
                    // Mostrar el resultado
                    //console.log("Suma de montos: " + suma);
                    //console.log(pagos);
                    //Comparar suma con el valor de total_temp
                    let total_temp = $("#total_temp").val();
                    if (suma !== parseFloat(total_temp)) {
                        console.log("Los datos no coinciden");
                    } else {
                        console.log("Los datos son correctos");
                    }
                    let verificar_repetidos = verificarRepeticionesTiposPago(pagos);

                    if (verificar_repetidos) {
                        Swal.fire({
                            icon: "warning",
                            title: "Hay tipos de pagos repetidos.",
                            showConfirmButton: false,
                            showCancelButton: false,
                            timer: 2000
                        });
                        return true;
                    } else {
                        return pagos;
                    }

                }

                function verificarRepeticionesTiposPago(pagos) {
                    var tiposPagosUnicos = new Set(); // Utilizamos un Set para almacenar tipos de pago únicos
                    var tiposPagosRepetidos =
                        new Set(); // Utilizamos otro Set para almacenar tipos de pago que se repiten

                    for (var i = 0; i < pagos.length; i++) {
                        var tipoPago = pagos[i].tipo_pago;

                        if (tiposPagosUnicos.has(tipoPago)) {
                            // El tipo de pago ya estaba en el set, lo consideramos repetido
                            tiposPagosRepetidos.add(tipoPago);
                        } else {
                            // Agregamos el tipo de pago al set de tipos únicos
                            tiposPagosUnicos.add(tipoPago);
                        }
                    }

                    // Verificar si hay tipos de pago repetidos y devolver el resultado
                    if (tiposPagosRepetidos.size > 0) {
                        console.log("Tipos de pago repetidos:", Array.from(tiposPagosRepetidos));
                        return true; // Hay tipos de pago repetidos
                    } else {
                        console.log("No hay tipos de pago repetidos.");
                        return false; // No hay tipos de pago repetidos
                    }
                }
                </script>

                <div class="row">
                    <!-- Additional rows or content can be added here -->
                </div>

            </div>
            <div class="modal-footer">
                <div class="row">
                    <!-- Columna "TOTAL" -->
                    <div class="col-md-4">
                        <label>TOTAL:</label>
                        <input type="text" id="total_temp" class="form-control" readonly="true">
                    </div>

                    <!-- Columna "Botones" -->
                    <div class="col-md-8">
                        <div class="row">
                            <!-- Botón "Atrás" -->
                            <div class="col-md-6">
                                <button type="button" class="btn btn-secondary" id="modal_atras">Atrás</button>
                            </div>

                            <!-- Botón "Generar" -->
                            <div class="col-md-6" id="div_generar">
                                <button type="button" class="btn btn-primary btn-cuota-acept">Generar</button>
                            </div>

                            <!-- Botón "Sumar" -->
                            <div class="col-md-6" id="sumar">
                                <button type="button" class="btn btn-warning"
                                    onclick="final_para_enviar()">Sumar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
</div>





<div class="modal fade" id="modal_ticket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12" id="pdf">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="close_modal_ticket"
                    data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>



<div id="modal_addcliente" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form id="formCliente" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                </div>
                <div style="text-align: center;">
                    <h3><b>REGISTRAR CLIENTE</b></h3>
                </div>
                <div class="modal-body panel panel-default">
                    <!-- <input type="hidden" id="cliente" name="cliente" value=""> -->
                    <input type="hidden" id="operacionE" name="operacionE" value="">

                    <div class="row form-group">
                        <div class="col-md-12" style="background-color: #76768d70;color: black;" align="center">
                            <label>INFORMACIÓN DEL CLIENTE</label>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-sm-12 col-md-3 col-lg-3">
                            <label for="tipo_cliente">Tipo de cliente</label>
                            <select id="tipo_cliente" name="tipo_cliente" class="form-control h-3 w-porc-90">
                                <option value="0">NATURAL</option>
                                <option value="1" selected>JURIDICO</option>
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-3 col-lg-3">
                            <label for="tipo_documento">Tipo de documento</label>
                            <select id="tipo_documento" name="tipo_documento" class="form-control h-3 w-porc-90">
                                <optgroup label="Natural" disabled class="documentosNatural"> <?php
																								foreach ($documentosNatural as $i => $val) { ?>
                                    <option class="DOC0" value="<?= $val->TIPDOCP_Codigo; ?>">
                                        <?= $val->TIPOCC_Inciales; ?></option> <?php
																																		} ?>
                                </optgroup>

                                <optgroup label="Juridico" class="documentosJuridico"> <?php
																						foreach ($documentosJuridico as $i => $val) { ?>
                                    <option class="DOC1" value="<?= $val->TIPCOD_Codigo; ?>">
                                        <?= $val->TIPCOD_Inciales; ?></option> <?php
																																	} ?>
                                </optgroup>

                            </select>
                        </div>
                        <div class="col-sm-12 col-md-3 col-lg-3">
                            <label for="numero_documento">Número de Doc. (*)</label>
                            <input type="text" id="numero_documento" name="numero_documento"
                                class="form-control h-2 w-porc-90 teclado" placeholder="Número de documento" value=""
                                autocomplete="off">
                        </div>
                        <div class="col-sm-12 col-md-3 col-lg-3">&nbsp;<br>
                            <button type="button" class="btn btn-default btn-search-sunat" onclick="getSunat()">
                                <img style="width: 40px;" src="<?= base_url(); ?>images/sunat.png"
                                    class='image-size-2' />

                            </button>
                            <img id="img_load" style="width: 40px; display: none;"
                                src="<?= base_url(); ?>images/load.gif" class='image-size-2' />
                            <span class="icon-loading-lg"></span>
                        </div>
                    </div>

                    <!--********** JURIDICO **********-->
                    <div class="row form-group divJuridico">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <label for="razon_social">Razón social (*)</label>
                            <input type="text" id="razon_social" name="razon_social" class="form-control h-2 teclado"
                                placeholder="Indique la razón social" value="" autocomplete="off">
                        </div>
                    </div>

                    <!--********** NATURAL **********-->
                    <div class="row form-group divNatural" style="display: none;">
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <label for="nombres">Nombres (*)</label>
                            <input type="text" id="nombres" name="nombres" class="form-control h-2 w-porc-90"
                                placeholder="Indique el nombre completo" value="" autocomplete="off">
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <label for="apellido_paterno">Apellido paterno (*)</label>
                            <input type="text" id="apellido_paterno" name="apellido_paterno"
                                class="form-control h-2 w-porc-90" placeholder="Indique el apellido paterno" value=""
                                autocomplete="off">
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <label for="apellido_materno">Apellido materno (*)</label>
                            <input type="text" id="apellido_materno" name="apellido_materno"
                                class="form-control h-2 w-porc-90" placeholder="Indique el apellido materno" value=""
                                autocomplete="off">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 form-group">
                            <label for="direccion">Dirección (*)</label>
                            <textarea id="direccion" name="direccion" class="form-control h-4 teclado"
                                placeholder="Indique la dirección"></textarea>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12" style="background-color: #76768d70;color: black;" align="center">
                            <label>INFORMACIÓN DE CONTACTO</label>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <label for="telefono">Telefono</label>
                            <input type="tel" id="telefono" name="telefono" class="form-control teclado"
                                placeholder="000 000 000" val="" autocomplete="off">
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <label for="movil">Movil</label>
                            <input type="tel" id="movil" name="movil" class="form-control teclado"
                                placeholder="000 000 000" val="" autocomplete="off">
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <label for="correo">Correo</label>
                            <input type="email" id="correo" name="correo" class="form-control teclado"
                                placeholder="cliente@empresa.com" val="" autocomplete="off">
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="registrar_cliente()">Guardar
                        Registro</button>
                    <button type="button" class="btn btn-info" onclick="clean()">Limpiar</button>
                    <button type="button" class="btn btn-default" id="cerrar_cliente">Salir</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal de Stock -->


<!-- Modal -->
<div class="modal fade" id="modal_ticket2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div> -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <iframe id="pdfFrame" width="100%" height="500px" frameborder="0"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="close_modal_ticket2" class="btn btn-secondary"
                    data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>





<div id="modal_addcliente_2" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form class="formEmpleado" id="formEmpleado" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                </div>
                <div style="text-align: center;">
                    <h3><b>REGISTRAR EMPLEADO</b></h3>
                </div>
                <div class="modal-body panel panel-default">
                    <!-- <input type="hidden" id="cliente" name="cliente" value=""> -->
                    <input type="hidden" id="operacionE" name="operacionE" value="">
                    <input type="hidden" id="codigo_para_empleado_cliente" name="codigo_para_empleado_cliente"
                        value="1">

                    <div class="row form-group">
                        <div class="col-md-12" style="background-color: #76768d70;color: black;" align="center">
                            <label>INFORMACIÓN DEL EMPLEADO</label>
                        </div>
                    </div>

                    <div class="row form-group">


                        <div class="row form-group">
                            <div class="col-sm-3 col-md-3 col-lg-3">
                                <label for="tipo_documento_empleado">Tipo de documento</label>
                                <select id="tipo_documento_empleado" name="tipo_documento_empleado"
                                    class="form-control h-3 w-porc-80">
                                    <option value=""> :: SELECCIONE :: </option><?php
                                foreach ($documentos as $i => $val){ ?>
                                    <option value="<?=$val->TIPDOCP_Codigo;?>"><?=$val->TIPOCC_Inciales;?></option> <?php
                                } ?>
                                </select>
                            </div>
                            <div class="col-sm-3 col-md-3 col-lg-3">
                                <label for="numero_documento_empleado">Número de documento (*)</label>
                                <input type="number" id="numero_documento_empleado" name="numero_documento_empleado"
                                    class="form-control h-2 w-porc-90" placeholder="Número de documento" value=""
                                    autocomplete="off">
                            </div>
                            <div class="col-sm-3 col-md-3 col-lg-3">
                                <label for="numero_ruc_empleado">Número de ruc</label>
                                <input type="number" id="numero_ruc_empleado" name="numero_ruc_empleado"
                                    class="form-control h-2" placeholder="Indique el número de RUC" value=""
                                    autocomplete="off">
                            </div>
                            <div class="col-sm-2 col-md-2 col-lg-2 form-group">
                                <label for="nacionalidad_empleado">Nacionalidad</label>
                                <select id="nacionalidad_empleado" name="nacionalidad_empleado"
                                    class="form-control h-3">
                                    <option value=""> :: SELECCIONE :: </option><?php
                                foreach ($nacionalidad as $i => $val) { ?>
                                    <option value="<?=$val->NACP_Codigo;?>"
                                        <?=($val->NACP_Codigo == 193) ? "selected" : '';?>><?=$val->NACC_Descripcion;?>
                                    </option> <?php
                                } ?>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-3 col-md-3 col-lg-3">
                                <label for="nombres_empleado">Nombres (*)</label>
                                <input type="text" id="nombres_empleado" name="nombres_empleado"
                                    class="form-control h-2 w-porc-90" placeholder="Indique el nombre completo" value=""
                                    autocomplete="off">
                            </div>
                            <div class="col-sm-3 col-md-3 col-lg-3">
                                <label for="apellido_paterno_empleado">Apellido paterno (*)</label>
                                <input type="text" id="apellido_paterno_empleado" name="apellido_paterno_empleado"
                                    class="form-control h-2 w-porc-90" placeholder="Indique el apellido paterno"
                                    value="" autocomplete="off">
                            </div>
                            <div class="col-sm-3 col-md-3 col-lg-3">
                                <label for="apellido_materno_empleado">Apellido materno (*)</label>
                                <input type="text" id="apellido_materno_empleado" name="apellido_materno_empleado"
                                    class="form-control h-2 w-porc-90" placeholder="Indique el apellido materno"
                                    value="" autocomplete="off">
                            </div>
                            <div class="col-sm-2 col-md-2 col-lg-2 form-group">
                                <label for="edo_civil_empleado">Estado civil</label>
                                <select id="edo_civil_empleado" name="edo_civil_empleado" class="form-control h-3">
                                    <option value=""> :: SELECCIONE :: </option> <?php
                                foreach ($edo_civil as $i => $val) { ?>
                                    <option value="<?=$val->ESTCP_Codigo?>"><?=$val->ESTCC_Descripcion;?></option> <?php
                                } ?>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-2 col-md-2 col-lg-3">
                                <label for="fecha_nacimiento_empleado">Fecha de nacimiento (*)</label>
                                <input type="date" id="fecha_nacimiento_empleado" name="fecha_nacimiento_empleado"
                                    class="form-control h-2 w-porc-90" val="">
                            </div>
                            <div class="col-sm-2 col-md-2 col-lg-2 form-group">
                                <label for="edo_civil_empleado">Estado civil</label>
                                <select id="edo_civil_empleado" name="edo_civil_empleado" class="form-control h-3">
                                    <option value=""> :: SELECCIONE :: </option><?php
                                foreach ($edo_civil as $i => $val) { ?>
                                    <option value="<?=$val->ESTCP_Codigo?>"><?=$val->ESTCC_Descripcion;?></option> <?php
                                } ?>
                                </select>
                            </div>

                            <div class="col-sm-2 col-md-2 col-lg-6 form-group">
                                <label for="direccion_empleado">Dirección de residencia (*)</label>
                                <textarea id="direccion_empleado" name="direccion_empleado"
                                    class="form-control"></textarea>
                            </div>
                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col-md-12" style="background-color: #76768d70;color: black;" align="center">
                            <label>INFORMACIÓN DEL CONTRATACIÓN</label>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-sm-2 col-md-2 col-lg-2 form-group">
                            <label for="cargo_empleado">Cargo</label>
                            <select id="cargo_empleado" name="cargo_empleado" class="form-control h-3">
                                <option value=""> :: SELECCIONE :: </option> <?php
                                foreach ($cargos as $i => $val) { ?>
                                <option value="<?=$val->CARGP_Codigo;?>" title="<?=$val->CARGC_Descripcion;?>">
                                    <?=$val->CARGC_Nombre;?></option> <?php
                                } ?>
                            </select>
                        </div>
                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <label for="numero_contrato_empleado">Número de contrato</label>
                            <input type="number" id="numero_contrato_empleado" name="numero_contrato_empleado"
                                class="form-control h-2 w-porc-90" placeholder="Indique el número de contrato" value=""
                                autocomplete="off">
                        </div>
                        <div class="col-sm-2 col-md-2 col-lg-2">
                            <label for="fecha_inicio_empleado">Fecha de inicio</label>
                            <input type="date" id="fecha_inicio_empleado" name="fecha_inicio_empleado"
                                class="form-control h-2 w-porc-90" val="">
                        </div>
                        <div class="col-sm-2 col-md-2 col-lg-2">
                            <label for="fecha_final_empleado">Fecha de vencimiento</label>
                            <input type="date" id="fecha_final_empleado" name="fecha_final_empleado"
                                class="form-control h-2 w-porc-90" val="">
                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col-md-12" style="background-color: #76768d70;color: black;" align="center">
                            <label>CUENTA BANCARIA</label>
                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col-sm-2 col-md-2 col-lg-2 form-group">
                            <label for="banco_empleado">Banco</label>
                            <select id="banco_empleado" name="banco_empleado" class="form-control h-3">
                                <option value=""> :: SELECCIONE :: </option> <?php
                                foreach ($bancos as $i => $val) { ?>
                                <option value="<?=$val->BANP_Codigo;?>" title="<?=$val->BANC_Nombre;?>">
                                    <?=$val->BANC_Siglas;?></option> <?php
                                } ?>
                            </select>
                        </div>
                        <div class="col-sm-2 col-md-2 col-lg-2">
                            <label for="cta_soles_empleado">CTA SOLES</label>
                            <input type="tel" id="cta_soles_empleado" name="cta_soles_empleado"
                                class="form-control h-2 w-porc-90" placeholder="000 000 000 000" val=""
                                autocomplete="off">
                        </div>
                        <div class="col-sm-2 col-md-2 col-lg-2">
                            <label for="cta_dolares_empleado">CTA DOLARES</label>
                            <input type="tel" id="cta_dolares_empleado" name="cta_dolares_empleado"
                                class="form-control h-2 w-porc-90" placeholder="000 000 000 000" val=""
                                autocomplete="off">
                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col-md-12" style="background-color: #76768d70;color: black;" align="center">
                            <label>INFORMACIÓN DE CONTACTO</label>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-sm-2 col-md-2 col-lg-2">
                            <label for="telefono_empleado">Telefono</label>
                            <input type="tel" id="telefono_empleado" name="telefono_empleado"
                                class="form-control h-2 w-porc-90" placeholder="000 000 000" val="" autocomplete="off">
                        </div>
                        <div class="col-sm-2 col-md-2 col-lg-2">
                            <label for="movil_empleado">Movil</label>
                            <input type="tel" id="movil_empleado" name="movil_empleado"
                                class="form-control h-2 w-porc-90" placeholder="000 000 000" val="" autocomplete="off">
                        </div>
                        <div class="col-sm-2 col-md-2 col-lg-2">
                            <label for="fax_empleado">Fax</label>
                            <input type="number" id="fax_empleado" name="fax_empleado"
                                class="form-control h-2 w-porc-90" placeholder="000 000 000" val="" autocomplete="off">
                        </div>
                        <div class="col-sm-2 col-md-2 col-lg-2">
                            <label for="correo_empleado">Correo</label>
                            <input type="email" id="correo_empleado" name="correo_empleado"
                                class="form-control h-2 w-porc-90" placeholder="empleado@empresa.com" val=""
                                autocomplete="off">
                        </div>
                        <div class="col-sm-2 col-md-2 col-lg-2">
                            <label for="web_empleado">Dirección web</label>
                            <input type="url" id="web_empleado" name="web_empleado" class="form-control h-2 w-porc-90"
                                placeholder="www.sitio.com.pe" val="http://www.google.com" autocomplete="off">
                        </div>

                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2"></div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="registrar_empleado()">Guardar
                        Registro</button>
                    <button type="button" class="btn btn-info" onclick="clean_empleado()">Limpiar</button>
                    <button type="button" class="btn btn-danger" id="cerrar_empleado">Salir</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="caja_modal" class="modal fade" role="dialog">
    <div class="modal-dialog w-porc-60" style="width: 110%;">
        <div class="modal-content">
            <form id="formCaja" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title text-center">PANEL CAJA</h4>
                </div>
                <div class="modal-body panel panel-default">
                    <input type="hidden" id="caja" name="caja" value="">

                    <div class="row form-group">
                        <div class="col-sm-3 col-md-3 col-lg-6">
                            <label for="monto_inicial">MONTO INICIAL</label>
                            <input type="number" id="monto_inicial" name="monto_inicial"
                                class="form-control h-2 w-porc-90" placeholder="0.00" value="" maxlength="30">
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <label>ESTADO DE CAJA</label>
                            <select id="estado_caja" class="form-control w-porc-90 h-3">
                                <option value="1">APERTURAR</option>
                                <option value="0">CERRAR</option>
                            </select>
                        </div>

                        <div class="row form-group">
                            <div class="col-sm-10 col-md-10 col-lg-10">
                                <label for="obs_caja">OBSERVACIONES</label>
                                <textarea class="form-control h-5" id="obs_caja" name="obs_caja"
                                    placeholder="Indique las observaciones" maxlength="800"></textarea>
                            </div>
                        </div>
                        <div>
                            <label>Mostrado los <b> 10 ultimos registros</b>, para obtener los anteriores comuniquese
                                con su<b> administrador.</b></label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 pall-0">
                        <table class="fuente8 display" id="table-panel" border="1px">
                            <thead>
                                <tr class="cabeceraTabla" style="background-color: #FFF8DC;">
                                    <td style="width:10%" data-orderable="false">N°</td>
                                    <td style="width:10%" data-orderable="true">CAJA</td>
                                    <td style="width:10%" data-orderable="true">CAJERO</td>
                                    <td style="width:10%" data-orderable="false">ESTADO</td>
                                    <td style="width:10%" data-orderable="false">CAJA CHICA</td>
                                    <td style="width:05%" data-orderable="false">CUADRE</td>
                                    <td style="width:05%" data-orderable="false"></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

										$indice = 1;
										foreach ($cierres as $valor) {

											$datosCaja = array(
												'cierre' => $valor['CACIER_Codigo'],
												'caja' => $valor['CAJA_Codigo'],
												'situacion' => $valor['CACIER_FlagSituacion'],
												'fechaapertura' => $valor['CACIER_Feapertura'],
												'fechacierre' => $valor['CACIER_Fecierre'],
												'cajero' => $valor['CACIER_usuario']
											);

											if($valor["CACIER_FlagSituacion"] == 1){
												$btn_estado = '<button type="button" class="btn btn-success" accesskey="x">ABIERTA</button>';

												$btn_cuadre = '<button type="button" " class="btn btn-default" title="esperando cuadre...">
															<img src="' . base_url() . '/images/delete.gif" class="image-size-1b">
												</button>';

												$check_box = '<input type="checkbox" value ="'.$valor['CACIER_Codigo'].'" id="hk_cierre_' . $indice . '" class="checkbox-cierre">';
											
											}else{
												$btn_estado = '<button type="button" class="btn btn-danger" accesskey="x">CERRADA</button>';
												
												$btn_cuadre = '<button type="button" onclick="ticketCaja(' . htmlspecialchars(json_encode($datosCaja), ENT_QUOTES, 'UTF-8') . ')" class="btn btn-default" title="F.Cierre'.$valor['CACIER_Feapertura'].'F.Cierre'.$valor['CACIER_Fecierre'].'">
															<img src="' . base_url() . '/images/boleto.png" style="width: 40px">
												</button>';

												$check_box = '';
											}

											echo '<tr>';
											echo '<td style="width:10%" data-orderable="false">' . $indice . '</td>';
											echo '<td style="width:10%" data-orderable="false">' . $valor["CAJA_Nombre"] . '</td>';
											echo '<td style="width:10%" data-orderable="false">' . $valor["CACIER_usuario"] . '</td>';
											echo '<td style="width:10%" data-orderable="false">' . $btn_estado. '</td>';
											echo '<td style="width:10%" data-orderable="false">' . $valor["CACIER_CAJACHICA"] . '</td>';
											echo '<td style="width:05%" data-orderable="false">' . $btn_cuadre.'</td>';
											echo '<td style="width:05%" data-orderable="false">' . $check_box.'</td>';
											echo '</tr>';
											$indice++;
									    }
									?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-success" accesskey="x" onclick="Estado_caja()">Guardar
                        Registro</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="modal_cuadre" class="modal fade" role="dialog">
    <div class="modal-dialog w-porc-90">
        <div class="modal-content">
            <form id="formCaja" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title text-center">LISTA CUADRES</h4>
                </div>
                <div class="modal-body panel panel-default">
                    <input type="hidden" id="caja" name="caja" value="">
                    <br>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 pall-0">
                            <table class="table table-striped" id="table-panel" border="1px">
                                <thead>
                                    <tr class="cabeceraTabla" style="background-color: #E6E6FA;">
                                        <td style="width:10%" data-orderable="false">N°</td>
                                        <td style="width:10%" data-orderable="true">CAJA</td>
                                        <td style="width:10%" data-orderable="true">CAJERO</td>
                                        <td style="width:10%" data-orderable="false">ESTADO</td>
                                        <td style="width:10%" data-orderable="false">CAJA CHICA</td>
                                        <td style="width:05%" data-orderable="false">CUADRE</td>
                                        <td style="width:05%" data-orderable="false"></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <div>
                                        <label>Mostrado los <b> 10 ultimos registros</b>, para obtener los anteriores
                                            comuniquese con su<b> administrador.</b></label>
                                    </div>
                                    <?php

										$indice = 1;
										foreach ($cuadres as $valor) {

											$datosCaja = array(
												'cierre' => $valor['CACIER_Codigo'],
												'caja' => $valor['CAJA_Codigo'],
												'situacion' => $valor['CACIER_FlagSituacion'],
												'fechaapertura' => $valor['CACIER_Feapertura'],
												'fechacierre' => $valor['CACIER_Fecierre'],
												'cajero' => $valor['CACIER_usuario']
											);

											if($valor["CACIER_FlagSituacion"] == 1){
												$btn_estado = '<button type="button" class="btn btn-success" accesskey="x">ABIERTA</button>';

												$btn_cuadre = '<button type="button" " class="btn btn-default" title="esperando cuadre...">
															<img src="' . base_url() . '/images/delete.gif" class="image-size-1b">
												</button>';

												$check_box = '<input type="checkbox" value ="'.$valor['CACIER_Codigo'].'" id="hk_cierre_' . $indice . '" class="checkbox-cierre">';
											
											}else{
												$btn_estado = '<button type="button" class="btn btn-danger" accesskey="x">CERRADA</button>';
												
												$btn_cuadre = '<button type="button" onclick="ticketCaja(' . htmlspecialchars(json_encode($datosCaja), ENT_QUOTES, 'UTF-8') . ')" class="btn btn-default" title="F.Apertura: '.$valor['CACIER_Feapertura'].' F.Cierre: '.$valor['CACIER_Fecierre'].'">
															<img src="' . base_url() . '/images/boleto.png" style="width: 40px">
												</button>';

												$check_box = '';
											}

											echo '<tr>';
											echo '<td style="width:10%" data-orderable="false">' . $indice . '</td>';
											echo '<td style="width:10%" data-orderable="false">' . $valor["CAJA_Nombre"] . '</td>';
											echo '<td style="width:10%" data-orderable="false">' . $valor["CACIER_usuario"] . '</td>';
											echo '<td style="width:10%" data-orderable="false">' . $btn_estado. '</td>';
											echo '<td style="width:10%" data-orderable="false">' . $valor["CACIER_CAJACHICA"] . '</td>';
											echo '<td style="width:05%" data-orderable="false">' . $btn_cuadre.'</td>';
											echo '<td style="width:05%" data-orderable="false">' . $check_box.'</td>';
											echo '</tr>';
											$indice++;
									    }
									?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!--  <div class="modal-footer">
                    <button type="button" class="btn btn-success" accesskey="x" onclick="Estado_caja()">Guardar Registro</button>
                </div> -->
            </form>
        </div>
    </div>
</div>



<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
<script type="text/javascript">
var base_url = "<?php echo base_url(); ?>";
var compania = "<?php echo $compania; ?>";
</script>
<script>
//ocultar numero de operacion cuando es efectivo
$("#condiciones_pago").change(function() {
    console.log($("#condiciones_pago").val());
    var valor = $("#condiciones_pago").val();

    if (valor == 1) {
        $("#num_ope").hide();
    } else {
        $("#num_ope").show();
    }
});

$("#modal_d_e").click(function() {
    $("#add_empleado").modal("show");
    clean_empleado();
})

$("#cerrar_empleado").click(function() {
    $("#modal_addcliente_2").modal("hide");
    clean_empleado();
})

function ticketCaja(datosCajaJSON) {
    let datosCaja = datosCajaJSON;
    let fehcaini = datosCaja.fechaapertura;
    let fehchafin = datosCaja.fechacierre;
    let vendedor = datosCaja.cajero;
    let caja = datosCaja.caja;
    let cierre = datosCaja.cierre;

    let datos = "/" + fehcaini + "/" + fehchafin + "/" + vendedor + "/" + caja + "/" + cierre;
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

function Estado_caja() {

    Swal.fire({
        title: "¿Deseas guardar los cambios?",
        text: "Si esta seguro, precione aceptar",
        icon: "question",
        showCancelButtonv: true

    }).then((result) => {
        if (result.isConfirmed) {
            var estado = $('#estado_caja').val();
            var estado_db = $('#estadoC').val();
            var caja_id = $('#caja').val();
            var caja_chica = $('#monto_inicial').val();
            var cierres = [];
            var checkboxes = $('.checkbox-cierre:checked');

            checkboxes.each(function() {
                cierres.push($(this).val());
            });

            cierres.forEach(function(ids) {});

            if (estado == 0) {
                CierreCaja(cierres, caja_id);
                return;
            }

            if (estado_db == 1) {
                Swal.fire({
                    title: 'Esta caja ya se encuentra Aperturada',
                    text: 'cierre la caja actual y aperture otra',
                    icon: 'warning',
                    showCancelButton: true,
                });
                return;
            }

            var url = base_url + "index.php/tesoreria/caja/abrirCaja";

            $.ajax({
                type: 'POST',
                url: url,
                dataType: 'json',
                data: {
                    valor: estado,
                    id: caja_id,
                    cajachica: caja_chica,
                },
                success: function(data) {
                    if (data.result === 'success') {
                        Swal.fire({
                            title: "¡Caja aperturada!",
                            text: "Por favor espere 2 segundos",
                            icon: "success",
                        });
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
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    Swal.fire({
                        title: "Error",
                        text: "Error en la comunicación con el servidor",
                        icon: "error",
                    });
                },
                complete: function() {
                    console.log("Completo");
                }
            })
        } else {

        }
    })

}

function CierreCaja(cierres, caja_id) {

    Swal.fire({
        title: "¿Deseas cerrar esta caja?",
        text: "No abra vuelta atras al realizar esta operacion",
        icon: "question",
        showCancelButton: true
    }).then((result) => {
        if (result.isConfirmed) {
            var id_caja = caja_id;
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
                success: function(data) {
                    Swal.fire({
                        title: "¡Caja Cerrada!",
                        text: "Espere 2 segundos",
                        icon: "success",
                    });
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


function modalEstadoCaja() {
    $('#caja_modal').modal('toggle');

}

function modalcierres() {
    $('#modal_cuadre').modal('toggle');
}

function registrar_empleado() {
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
            var url = base_url + "index.php/maestros/directivo/guardar_registro";

            empleado = $("#empleado").val();
            numero_documento = $("#numero_documento_empleado").val();
            nombres = $("#nombres_empleado").val();
            apellido_paterno = $("#apellido_paterno_empleado").val();
            apellido_materno = $("#apellido_materno_empleado").val();
            fecha_nacimiento = $("#fecha_nacimiento_empleado").val();
            direccion = $("#direccion_empleado").val();

            validacion = true;

            if (numero_documento == "") {
                Swal.fire({
                    icon: "error",
                    title: "Verifique los datos ingresados.",
                    html: "<b class='color-red'>Debe ingresar un número de documento.</b>",
                    showConfirmButton: true,
                    timer: 4000
                });
                $("#numero_documento_empleado").focus();
                validacion = false;
                return false;
            }

            if (nombres == "") {
                Swal.fire({
                    icon: "error",
                    title: "Verifique los datos ingresados.",
                    html: "<b class='color-red'>Debe ingresar el nombre.</b>",
                    showConfirmButton: true,
                    timer: 4000
                });
                $("#nombres_empleado").focus();
                validacion = false;
                return false;
            }

            if (apellido_paterno == "") {
                Swal.fire({
                    icon: "error",
                    title: "Verifique los datos ingresados.",
                    html: "<b class='color-red'>Debe ingresar el apellido paterno.</b>",
                    showConfirmButton: true,
                    timer: 4000
                });
                $("#apellido_paterno_empleado").focus();
                validacion = false;
                return false;
            }

            if (apellido_materno == "") {
                Swal.fire({
                    icon: "error",
                    title: "Verifique los datos ingresados.",
                    html: "<b class='color-red'>Debe ingresar el apellido materno.</b>",
                    showConfirmButton: true,
                    timer: 4000
                });
                $("#apellido_materno_empleado").focus();
                validacion = false;
                return false;
            }

            if (fecha_nacimiento == "") {
                Swal.fire({
                    icon: "error",
                    title: "Verifique los datos ingresados.",
                    html: "<b class='color-red'>Debe ingresar la fecha de nacimiento.</b>",
                    showConfirmButton: true,
                    timer: 4000
                });
                $("#fecha_nacimiento_empleado").focus();
                validacion = false;
                return false;
            }

            if (direccion == "") {
                Swal.fire({
                    icon: "error",
                    title: "Verifique los datos ingresados.",
                    html: "<b class='color-red'>Debe ingresar la dirección.</b>",
                    showConfirmButton: true,
                    timer: 4000
                });
                $("#direccion_empleado").focus();
                validacion = false;
                return false;
            }

            if (validacion == true) {
                var dataForm = $("#formEmpleado").serialize();
                $.ajax({
                    type: 'POST',
                    url: url,
                    dataType: 'json',
                    data: dataForm,
                    success: function(data) {
                        if (data.result == "success") {
                            if (empleado == "")
                                titulo = "¡Registro exitoso!";
                            else
                                titulo = "¡Actualización exitosa!";

                            Swal.fire({
                                icon: "success",
                                title: titulo,
                                showConfirmButton: true,
                                timer: 2000
                            });

                            clean_empleado();
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
                        $("#numero_documento_empleado").focus();
                    }
                });
            }
        }
    });
}

function clean_empleado() {
    document.getElementById("tipo_documento_empleado").value = "";
    document.getElementById("numero_documento_empleado").value = "";
    document.getElementById("numero_ruc_empleado").value = "";
    document.getElementById("nacionalidad_empleado").value = "";
    document.getElementById("nombres_empleado").value = "";
    document.getElementById("apellido_paterno_empleado").value = "";
    document.getElementById("apellido_materno_empleado").value = "";
    document.getElementById("edo_civil_empleado").value = "";
    document.getElementById("fecha_nacimiento_empleado").value = "";
    document.getElementById("direccion_empleado").value = "";
    document.getElementById("cargo_empleado").value = "";
    document.getElementById("numero_contrato_empleado").value = "";
    document.getElementById("fecha_inicio_empleado").value = "";
    document.getElementById("fecha_final_empleado").value = "";
    document.getElementById("banco_empleado").value = "";
    document.getElementById("cta_soles_empleado").value = "";
    document.getElementById("cta_dolares_empleado").value = "";
    document.getElementById("telefono_empleado").value = "";
    document.getElementById("movil_empleado").value = "";
    document.getElementById("fax_empleado").value = "";
    document.getElementById("correo_empleado").value = "";
    document.getElementById("web_empleado").value = "";
}
</script>

<script type="text/javascript" src="<?php echo base_url(); ?>pos/js/main.js"></script>
<script type="text/javascript">
cargar_productos(<?php echo json_encode($favoritos); ?>);
$(function() {
    $("[data-toggle=popover]").popover({
        html: true,
        sanitize: false,
    });
});


$("#virtual-keyboard a").on('click', function() {
    var input = $("#teclado_hidden").val();
    if ($(this).attr('data') == 'DEL') {
        board_text = $('#' + input).val();
        board_text = board_text.substring(0, board_text.length - 1);
        $('#' + input).val(board_text);
    } else {
        $('#' + input).val($('#' + input).val() + $(this).attr('data'));
    }

    $("#" + input).focus();

    if (input == 'search') {
        search();
    }

    var valid = "precio" + $("#producto_hidden").val();
    var id_valid = $("#producto_hidden").val();
    if (input == valid) {
        console.log(id_valid);
        cantidad(id_valid, 1);
        cantidad(id_valid, 2);
    }

});

function ver_tipo_pago() {
    var selectedValue = $("#condiciones_de_pago").val();
    // Realiza aquí la lógica que desees con el valor seleccionado
}


// function ver_teclado(input,id=0)
// {
// 	if ($("#teclado").prop("checked")) 
// 	{
// 		//$("#teclado_hidden").val(input);

// 		$('#'+input).mlKeyboard({
// 		  layout: 'en_US'
// 		});

// 		//$("#ventana-flotante").removeClass("oculto");
// 		$("#producto_hidden").val("");
// 	}
// 	if (id>0) 
// 	{
// 		$("#producto_hidden").val(id);
// 	}



// }

$("#teclado").change(function() {
    if ($("#teclado").prop("checked")) {
        mostrar_teclado();
    } else {
        ocultar_teclado();
    }
});

$(".excel-reporte").click(function() {

    let user = $("#usuario_venta").text();
    user = user.split(": ");

    let currentDate = new Date();
    let day = currentDate.getDate();
    let month = currentDate.getMonth() + 1;
    let year = currentDate.getFullYear();

    currentDate = `${year}-${month}-${day}`;

    location.href = "<?= base_url(); ?>index.php/reportes/ventas/ventasDiarias/" + currentDate + "/" + user[1];
});

// $(".pdf-reporte").click(function() {
// let user = $("#usuario_venta").text();
// user = user.split(": ");
// let currentDate = new Date();
// let day = currentDate.getDate();
// let month = currentDate.getMonth() + 1;
// let year = currentDate.getFullYear();
// currentDate = `${year}-${month}-${day}`;
// location.href = "<?= base_url(); ?>index.php/reportes/ventas/ventasDiarias_pdf/" + currentDate + "/"+ user[1];
// });

//ES LA FUNCION QUE SIRVE PARA INPRIMIR EN FORMATO PDF ventasDiarias_pdf
//CODIGO CREADO POR EL DESARROLLADOR ALDO
function reportePdf() {
    let user = $("#usuario_venta").text();
    user = user.split(": ");
    let currentDate = new Date();
    let day = currentDate.getDate();
    let month = currentDate.getMonth() + 1;
    let year = currentDate.getFullYear();
    currentDate = `${year}-${month}-${day}`;
    let pdfUrl = "<?= base_url(); ?>index.php/reportes/ventas/ventasDiarias_pdf/" + currentDate + "/" + user[1];
    fetch(pdfUrl)
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
// function reportePdf() {
// 	let user = $("#usuario_venta").text();
// 	user = user.split(": ");
// 	let currentDate = new Date();
// 	let day = currentDate.getDate();
// 	let month = currentDate.getMonth() + 1;
// 	let year = currentDate.getFullYear();
// 	currentDate = `${year}-${month}-${day}`;
// 	let pdfUrl = "<?= base_url(); ?>index.php/reportes/ventas/ventasDiarias_pdf/" + currentDate + "/" + user[1];
// 	fetch(pdfUrl)
// 		.then(response => response.blob())
// 		.then(blob => {
// 			const url = window.URL.createObjectURL(blob);
// 			$("#pdfFrame").attr("src", url);
// 			$("#modal_ticket2").modal("show");
// 		})
// 		.catch(error => {
// 			console.error('Error:', error);
// 		   });
// }

//mostrar_teclado();

function ver_teclado(input, id = 0) {
    if ($("#teclado").prop("checked")) {
        $("#producto_hidden").val("");
    }
    if (id > 0) {
        $("#producto_hidden").val(id);
    }
}

function ocultar_teclado() {
    $(".teclado").addClass("noteclado");
    $(".noteclado").removeClass("teclado");
}

function mostrar_teclado() {
    $(".noteclado").addClass("teclado");
    $(".teclado").removeClass("noteclado");
    KioskBoard.Run(".teclado");

}

function cerrar_teclado() {
    $("#ventana-flotante").addClass("oculto");
}
</script>