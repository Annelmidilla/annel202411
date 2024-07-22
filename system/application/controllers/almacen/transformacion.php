<?php

use FontLib\Table\Type\post;
use phpDocumentor\Reflection\Types\This;

    class Transformacion extends Controller{

        private $compania;
        private $usuario;
        private $persona;
        private $persona_nombre;
        private $url;
        private $nombre_establec;
        private $nombre_empresa;

        public function __construct()
        {
            parent::Controller();
            $this->load->helper('form');
            $this->load->helper('date');
            $this->load->helper('util');
            $this->load->helper('utf_helper');
            $this->load->helper('my_permiso');
            $this->load->helper('my_almacen');
            $this->load->library('form_validation');
            $this->load->library('pagination');
            $this->load->library('html');
            $this->load->library('pagination');
            $this->load->library('layout', 'layout');
            $this->load->library('lib_props');
            $this->load->model('almacen/guiain_model');
            $this->load->model('almacen/guiaindetalle_model');
            $this->load->model('almacen/inventario_model');
            $this->load->model('almacen/kardex_model');
            $this->load->model('almacen/almacen_model');
            $this->load->model('almacen/almacenproducto_model');
            $this->load->model('almacen/tipoalmacen_model');

            $this->load->model('almacen/lote_model');
            $this->load->model('almacen/almaprolote_model');

            $this->load->model('almacen/almacenproductoserie_model');
            $this->load->model('almacen/Serie_model');
            $this->load->model('almacen/seriedocumento_model');
            $this->load->model('almacen/transformacion_model');

            $this->load->model('almacen/Seriemov_model');
            $this->load->model('maestros/directivo_model');
            $this->load->model('maestros/configuracion_model');

            $this->compania         = $this->session->userdata('compania');
            $this->usuario          = $this->session->userdata('user');
            $this->persona          = $this->session->userdata('persona');
            $this->persona_nombre   = $this->session->userdata('nombre_persona');
            $this->nombre_establec  = $this->session->userdata('nombre_establec');
            $this->nombre_empresa   = $this->session->userdata('nombre_empresa');
            $this->url = base_url();

            date_default_timezone_set('America/Lima');
        }

        public function index(){
            
            $lista_almacen          = $this->almacen_model->getAlmacens();
            $data['almacenes']      = $lista_almacen;
            $this->layout->view('almacen/transformacion_index', $data);
        }

        public function tabla_combo(){
            $columnas = array(
                0 => "PROD_FechaRegistro",
                1 => "PROD_CodigoUsuario",
                2 => "PROD_Nombre",
                3 => "EESTABC_DescripcionOri",
                4 => "PROD_UltimoCosto",
                5 => "ALMPROD_Stock",
                6 => "ALMAC_Descripcion",

            );
            
            $filter             = new stdClass();
            $filter->start      = $this->input->post("start");
            $filter->length     = $this->input->post("length");
            $filter->fechai     = $this->input->post("fechai");
            $filter->fechaf     = $this->input->post("fechaf");
            $filter->combo      = $this->input->post("combo");
         
            
            if ($filter->fechaf == "" || $filter->fechaf == null) {
                $filter->fechaf = date('y-m-d');
            }
    
            $ordenar = $this->input->post("order")[0]["column"];
            if ($ordenar != ""){
                $filter->order  = $columnas[$ordenar];
                $filter->dir    = $this->input->post("order")[0]["dir"];
            }
    
            $item = ($this->input->post("start") != "") ? $this->input->post("start") : 0;
    
            $lista_combos = $this->transformacion_model->listar_combos($filter);
          
            $lista = array();
    
            if (count($lista_combos) > 0) {
                foreach ($lista_combos as $indice => $valor) {
                    $stock = $valor['ALMPROD_Stock'];
                    $codigoCombo = $valor['PROD_Codigo_combo'];
                    $almacCodigo= $valor['ALMAC_Codigo'];
                    
                    $almaceninfo = $this->almacen_model->getAlmacen((int)$almacCodigo);
                    
                    $almacen =$almaceninfo[0]->ALMAC_Descripcion;

                    if($stock == 0){
                        $btn_abrir = "<a class='btn btn-light' style ='color: red;' title='no hay stock de esta caja'>0</a>";

                    }else{
                        $btn_abrir = "<a class='btn btn-light' onclick='listar_articulos_tabla(" . $codigoCombo . ")'><img src='" . base_url() . "images/caja_1.png' width='25' height='25' border='0' title='Abrir caja'></a>";

                    }

                    if($stock == '' || $stock == NULL){
                        $stock = 0;
                    }
                
    
                    $lista[] = array(
                        0 => $valor['PROD_FechaRegistro'],
                        1 => $valor['PROD_CodigoUsuario'],
                        2 => $valor['PROD_Nombre'],
                        3 => $valor['PROD_UltimoCosto'],
                        4 => $stock,
                        5 => $almacen,
                        6 => $btn_abrir,
                        7 => '',
                        8 => '',
                       
                    );

                }
            }
    
            unset($filter->start);
            unset($filter->length);
    
            $filterAll              = new stdClass();
            $filterAll->tipo_oper   = $tipo_oper;
            $filterAll->tipo_docu   = $tipo_docu;
    
            $json = array(
                                "draw"            => intval( $this->input->post('draw') ),
                                "recordsTotal"    => count($this->transformacion_model->listar_combos($filterAll)),
                                "recordsFiltered" => intval( count($this->transformacion_model->listar_combos($filter)) ),
                                "data"            => $lista
                        );
    
            echo json_encode($json);
        }

        public function tabla_articulos(){
            $combo = $this->input->post('codigo_combo');
            $columnas = array(
                0 => "GTRANC_Fecha",
                1 => "GTRANC_Serie",
                2 => "GTRANC_Numero",
                3 => "EESTABC_DescripcionOri",
                4 => ""
            );
            
            $filter             = new stdClass();
            $filter->start      = $this->input->post("start");
            $filter->length     = $this->input->post("length");
            $filter->fechai     = $this->input->post("fechai");
            $filter->fechaf     = $this->input->post("fechaf");
            $filter->serie      = $this->input->post("serie");
            $filter->numero     = $this->input->post("numero");
            $filter->movimiento = $this->input->post("movimiento");
            $compania_combo     =$this->compania         = $this->session->userdata('compania');

            
            if ($filter->fechaf == "" || $filter->fechaf == null) {
                $filter->fechaf = date('y-m-d');
            }
    
            $ordenar = $this->input->post("order")[0]["column"];
            if ($ordenar != ""){
                $filter->order  = $columnas[$ordenar];
                $filter->dir    = $this->input->post("order")[0]["dir"];
            }
    
            $item = ($this->input->post("start") != "") ? $this->input->post("start") : 0;
    
            $lista_combos = $this->transformacion_model->listar_articulos_combo($filter, $combo);   

            $lista = array();
            $cantidad= 0;

            if (count($lista_combos) > 0) {
                foreach ($lista_combos as $indice => $valor) {
                    $codigo_prod = $valor['PROD_Codigo'];
                    $codigo_combo =$valor['PROD_Codigo_combo'];
                    $almacCodigo= $valor['ALMAC_Codigo'];

                    $input_codigo_combo = "<input id='codigo' name='codigo_combo' type='text'  class='form-control w-porc-90 h-1' value = ".$codigo_combo." style='display: none'>";

                    $inp_cantidad_real = "<input id='cantidad_real[]' name='cantidad_real[]' type='text' class='form-control w-porc-90 h-1' maxlength='100' value='0'>";
                    
                    $codigoproducto = "<input id='codigo' name='codigo[]' type='text'  class='form-control w-porc-90 h-1' value = ".$codigo_prod." style='display: none'>";
                                        
                    $validar_si_tiene_almacen = $this->transformacion_model->validar_si_tiene_almacen($codigo_prod, $compania_combo);
                    $almacen_codigo = (int) $validar_si_tiene_almacen[0]['ALMAC_Codigo'];
                    
                    $almacen_get = $this->almacen_model->getAlmacen($almacen_codigo);

                    $btn_guardar_cantidades_reales = "<a class='btn btn-light' data-toggle='modal' onclick='open_modal_real(".$codigo_prod.")''><img src='" . base_url() . "images/restaurar.png' width='25' height='25' border='0' title='guardar montos reales'></a>";


                    $stock = $validar_si_tiene_almacen[0]['ALMPROD_Stock'];
                    $almacen_desc = $almacen_get[0]->ALMAC_Descripcion;
                    
                    if($almacen_desc == '' || $almacen_desc ==NULL){
                        $almacen_asignar = "<a class='btn btn-light' data-toggle='modal' onclick='open_modal_alamacen(".$codigo_prod.")''><img src='" . base_url() . "images/bg-header.png' width='25' height='25' border='0' title='asignar almacen'></a>";

                    }else{
                        $almacen_asignar = "";

                    }
                    $lista[] = array(
                        0 => $indice + 1,
                        1 => $codigoproducto = $codigoproducto,
                        2 => $input_codigo_combo,
                        3 => $valor['PROD_CodigoUsuario'],
                        4 => $valor['PROD_Nombre'],
                        5 => $almacen_desc,
                        6 => $stock,
                        7 => $valor['PROD_Cantidad'],
                        8 => $inp_cantidad_real,
                        9 => $almacen_asignar,
                        10 => '',
                        11 => '',
                       
                    );

                }
            }
    
            unset($filter->start);
            unset($filter->length);
    
            $filterAll              = new stdClass();
            $filterAll->tipo_oper   = $tipo_oper;
            $filterAll->tipo_docu   = $tipo_docu;
    
            $json = array(
                                "draw"            => intval( $this->input->post('draw') ),
                                "recordsTotal"    => count($this->transformacion_model->listar_articulos_combo($filterAll, $combo)),
                                "recordsFiltered" => intval( count($this->transformacion_model->listar_articulos_combo($filter, $combo)) ),
                                "data"            => $lista
                        );
    
            echo json_encode($json);
            
        }
    
        public function traerDatosProducto(){
            $codigo  = $this->input->post('codigo_prod');
            $prodInfo = $this->transformacion_model->getProductoC($codigo);
            $lista= array();

            if($prodInfo != NULL){

                foreach($prodInfo as $indice => $val){
                    $lista = array(
                        "codigo_usu" => $val['PROD_CodigoUsuario'],
                        "nombre" => $val['PROD_Nombre'],
                        "cantidad" => $val['PROD_Cantidad'],

                    );

                    $json = array("match" => true, "info" => $lista, "result"=>"success");
                }

             }else
                    $json = array("match" => false, "info" => "");

                    echo json_encode($json);
            
        }


        public function sumar_stock(){
            $codigoProd = $this->input->post('codigo');
            $codigo_combo = $this->input->post('codigo_combo');
            $cantidades = $this->input->post('cantidad_real');
            $compania = $this->session->userdata('compania');
           
            // Obtener almacenes relacionados al producto
            $almacenes = $this->almacenproducto_model->obtener_alamcen($codigoProd, $compania);
           
            // Crear array con códigos de almacén
            $arrayAlmacen = array();
            foreach($almacenes as $almacen){
                $arrayAlmacen[] = $almacen['ALMAC_Codigo'];
            }
            
            // Obtener datos del almacén producto
            $datosAlmacenProducto = $this->almacenproducto_model->obtener($arrayAlmacen, $codigoProd);
           
            foreach ($cantidades as $index => $cantidad) {
                $cantidadReal = (int) $cantidad;
                
                // Verificar que el índice exista en datosAlmacenProducto
                if (isset($datosAlmacenProducto[$index])) {
                    $datosA = $datosAlmacenProducto[$index];
                    $stock = $datosA->ALMPROD_Stock;
        
                    $stock_actualizado = $stock + $cantidadReal;
                
                    $filter_dism = new stdClass();
                    $filter_dism->ALMPROD_Stock = $stock_actualizado;
                    $filter_dism->COMPP_Codigo = $compania;
                    $filter_dism->ALMAC_Codigo = $datosA->ALMAC_Codigo; // Obtener el código de almacén correcto
                    $filter_dism->PROD_Codigo = $codigoProd;
                    $filter_dism->ALMPROD_Codigo = $datosA->ALMPROD_Codigo;
                    $filter_dism->ALMPROD_FechaModificacion = date('Y-m-d H:i:s');
                   
                    $this->almacenproducto_model->actualizar_stock($filter_dism);
                }
            }
        
            // Registrar en kardex
            $cKardex = new stdClass();
            $cKardex->codigo_documento = 21;
            $cKardex->tipo_docu = 'AC';
            $cKardex->producto = $codigoProd;
            $cKardex->nombre_producto = '';
            $cKardex->cantidad = array_sum($cantidades); // Sumar todas las cantidades
            $cKardex->serie = 'APC';
            $cKardex->numero = 0;
            $cKardex->nombre_almacen = ""; // Opcional
            $cKardex->moneda = 1;
            $cKardex->afectacion = 0;
            $cKardex->costo = 0;
            $cKardex->precio_con_igv = 0;
            $cKardex->subtotal = 0;
            $cKardex->total = 0;
            $cKardex->compania = $compania;
            $cKardex->tipo_oper = 2; // 1: salida, 2: ingreso
            $cKardex->tipo_movimiento = "INGRESO POR APERTURA DE CAJA";
            $cKardex->nombre = ""; // Opcional
            $cKardex->numdoc = ""; // Opcional
            $cKardex->almacen = isset($almacen['ALMAC_Codigo']) ? $almacen['ALMAC_Codigo'] : 0;
            $cKardex->cliente = 0;
            $cKardex->proveedor = 0;
            $cKardex->usuario = 0; // Nombre o código
            $cKardex->estado = 1;
            
            $result = $this->registrar_kardex_t($cKardex);
            $result = $this->descontar_stock_caja($codigo_combo);
        
            if ($result) {
                return array("result" => "success");
            } else {
                return array("result" => "error");
            }
        }
        

        public function registrar_almacen_producto(){

            $codigoProd = $this->input->post('codigo');
            $almacen = $this->input->post('almacen');
            $compania = $this->compania = $this->session->userdata('compania');
            $filter = new stdClass();
            $filter->ALMAC_Codigo = $almacen;
            $filter->PROD_Codigo = $codigoProd;
            $filter->COMPP_Codigo = $compania;

            $this->transformacion_model->asignar_almacen($filter);           


        }

        public function descontar_stock_caja($codigoProd){
           
            $cantidad = 1;
            $compania = $this->compania= $this->session->userdata('compania');

            $obtenerAlmacenProducto = $this->almacenproducto_model->obtener_alamcen($codigoProd, $compania);

            $almacCodigo = $obtenerAlmacenProducto[0]['ALMAC_Codigo'];

            $datosAlmacenProducto = $this->almacenproducto_model->obtener($almacCodigo, $codigoProd);

            $stock = $datosAlmacenProducto[0]->ALMPROD_Stock;
            $stock_actualizado = $stock - $cantidad;
            $filter_dism = new stdClass();
            $filter_dism->ALMPROD_Stock  = $stock_actualizado;
            $filter_dism->COMPP_Codigo   = $compania;
            $filter_dism->ALMAC_Codigo   = $almacCodigo;
            $filter_dism->PROD_Codigo    = $codigoProd;
            $filter_dism->ALMPROD_Codigo = $datosAlmacenProducto[0]->ALMPROD_Codigo;
            $filter_dism->ALMPROD_FechaModificacion    = date('Y-m-d H:i:s');

            $this->almacenproducto_model->actualizar_stock($filter_dism);

            $cKardex = new stdClass();
                    $cKardex->codigo_documento  = 21;
                    $cKardex->tipo_docu         = 'AC';
                    $cKardex->producto          = $codigoProd;
                    $cKardex->nombre_producto   = '';
                    $cKardex->cantidad          = $cantidad;
                    $cKardex->serie             = 'APC';
                    $cKardex->numero            =  0;
                    $cKardex->nombre_almacen    = ""; #opcionales (para futuro desarrollo)
                    $cKardex->moneda            = 1;
                    $cKardex->afectacion        = 0;
                    $cKardex->costo             = 0;
                    $cKardex->precio_con_igv    = 0;
                    $cKardex->subtotal          = 0;
                    $cKardex->total             = 0;
                    $cKardex->compania          = $compania;
                    $cKardex->tipo_oper         = 1; # 1: salida 2: ingreso
                    $cKardex->tipo_movimiento   = "SALIDA POR APERTURA DE CAJA";
                    $cKardex->nombre            = ""; #opcionales (para futuro desarrollo)
                    $cKardex->numdoc            = ""; #opcionales (para futuro desarrollo)
                    $cKardex->almacen           = $almacCodigo;
                    $cKardex->cliente           = 0;
                    $cKardex->proveedor         = 0;
                    $cKardex->usuario           = 0; #Nombre o codigo?
                    $cKardex->estado            = 1;
                    
                    $result  = $this->registrar_kardex($cKardex);

                    if ($result) {
                        return array("result" => "success");
                    } else {
                        return array("result" => "error");
                    }    
        }

        public function registrar_kardex_t($filter){
        $cKardex = new stdClass();
        
        $cKardex->KARDC_CodigoDoc       = $filter->codigo_documento;
        $cKardex->DOCUP_Codigo          = $filter->tipo_docu;
        $cKardex->PROD_Codigo           = $filter->producto;
        $cKardex->PROD_Descripcion      = $filter->nombre_producto; #opcionales (para futuro desarrollo)
        $cKardex->KARDC_Cantidad        = $filter->cantidad;
        $cKardex->KARDC_Serie           = $filter->serie;
        $cKardex->KARDC_Numero          = $filter->numero;
        $cKardex->KARDC_AlmacenDesc     = $filter->nombre_almacen; #opcionales (para futuro desarrollo)
        $cKardex->MONED_Codigo          = $filter->moneda; #opcionales (para futuro desarrollo)
        $cKardex->KARDC_ProdAfectacion  = $filter->afectacion;
        $cKardex->KARDC_Costo           = $filter->costo;
        $cKardex->KARDC_PrecioConIgv    = $filter->precio_con_igv;
        $cKardex->KARDC_Subtotal        = $filter->subtotal;
        $cKardex->KARDC_Total           = $filter->total;
        $cKardex->COMPP_Codigo          = $filter->compania;
        $cKardex->TIPOMOVP_Codigo       = $filter->tipo_oper;
        $cKardex->LOTP_Codigo           = NULL;
        $cKardex->KARDC_TipoIngreso     = $filter->tipo_movimiento;
        $cKardex->Denominacion          = $filter->nombre; #opcionales (para futuro desarrollo)
        $cKardex->NumDocRuc             = $filter->numdoc; #opcionales (para futuro desarrollo)
        $cKardex->ALMPROD_Codigo        = $filter->almacen;
        $cKardex->CLIP_Codigo           = $filter->cliente;
        $cKardex->PROVP_Codigo          = $filter->proveedor;
        $cKardex->USUA_Codigo           = $filter->usuario; #Nombre o codigo?
        $cKardex->KARDP_FlagEstado      = $filter->estado;
       
        $this->kardex_model->registrar_kardex_transformaion($cKardex);
    }

    public function registrar_kardex($filter){
        $cKardex = new stdClass();
        
        $cKardex->KARDC_CodigoDoc       = $filter->codigo_documento;
        $cKardex->DOCUP_Codigo          = $filter->tipo_docu;
        $cKardex->PROD_Codigo           = $filter->producto;
        $cKardex->PROD_Descripcion      = $filter->nombre_producto; #opcionales (para futuro desarrollo)
        $cKardex->KARDC_Cantidad        = $filter->cantidad;
        $cKardex->KARDC_Serie           = $filter->serie;
        $cKardex->KARDC_Numero          = $filter->numero;
        $cKardex->KARDC_AlmacenDesc     = $filter->nombre_almacen; #opcionales (para futuro desarrollo)
        $cKardex->MONED_Codigo          = $filter->moneda; #opcionales (para futuro desarrollo)
        $cKardex->KARDC_ProdAfectacion  = $filter->afectacion;
        $cKardex->KARDC_Costo           = $filter->costo;
        $cKardex->KARDC_PrecioConIgv    = $filter->precio_con_igv;
        $cKardex->KARDC_Subtotal        = $filter->subtotal;
        $cKardex->KARDC_Total           = $filter->total;
        $cKardex->COMPP_Codigo          = $filter->compania;
        $cKardex->TIPOMOVP_Codigo       = $filter->tipo_oper;
        $cKardex->LOTP_Codigo           = NULL;
        $cKardex->KARDC_TipoIngreso     = $filter->tipo_movimiento;
        $cKardex->Denominacion          = $filter->nombre; #opcionales (para futuro desarrollo)
        $cKardex->NumDocRuc             = $filter->numdoc; #opcionales (para futuro desarrollo)
        $cKardex->ALMPROD_Codigo        = $filter->almacen;
        $cKardex->CLIP_Codigo           = $filter->cliente;
        $cKardex->PROVP_Codigo          = $filter->proveedor;
        $cKardex->USUA_Codigo           = $filter->usuario; #Nombre o codigo?
        $cKardex->KARDP_FlagEstado      = $filter->estado;
       
        $this->kardex_model->registrar_kardex($cKardex);
    }

    
        

    }
?>