<?php

class Caja extends Controller{

    private $empresa;
    private $compania;
    private $usuario;
    private $url;

    public function __construct(){
        parent::__construct();

        $this->load->helper('form');
        $this->load->helper('date');
        
        $this->load->model('maestros/proyecto_model');
        $this->load->model('maestros/directivo_model');
        $this->load->model('maestros/compania_model');
        $this->load->model('maestros/persona_model');
        $this->load->model('maestros/moneda_model');

        $this->load->model('tesoreria/banco_model');
        $this->load->model('tesoreria/caja_model');
        $this->load->model('tesoreria/tipocaja_model');

        $this->load->model('ventas/cliente_model');
        $this->load->model('seguridad/usuario_model');
		$this->load->model('seguridad/usuario_compania_model');
		$this->load->model('ventas/Comprobante_formapago_model');
		$this->load->model('tesoreria/pago_model');
		$this->load->model('maestros/formapago_model');
        
        $this->load->library('html');
        $this->load->library('pagination');
        $this->load->library('layout','layout');
        
        $this->empresa = $this->session->userdata('empresa');
        $this->compania = $this->session->userdata('compania');
        $this->usuario = $this->session->userdata('user');
        $this->url = base_url();
    }

	public function detalle($fechaapertura, $fechacierre, $vendedor, $caja, $cierre){

		$fechaActual = date("Y-m-d H:i:s");
		$Fcierre = ($fechacierre == '' || $fechacierre == 'null') ? $fechaActual : $fechacierre;
		$data['cierre_codigo'] = $cierre;
		$caja_cierre = $this->caja_model->getCaja($caja);
		$cierreInfo = $this->caja_model->getcierre($cierre);
		$data['caja_nombre'] = $caja_cierre[0]->CAJA_Nombre;
		$data['fecha_apertura'] = $fechaapertura;
		$ventasinfo = $this->caja_model->ventasTotalesxCaja($fechaapertura, $Fcierre, $caja);
		$docAnulados = $this->caja_model->ventasAnuladas($fechaapertura, $Fcierre, $caja);
		$formaspago = $this->caja_model->ventasformasPago($fechaapertura, $Fcierre, $caja);
		$otrosMov = $this->caja_model->otrosMovimientos($caja, $cierre);
		$cajamdl = $this->caja_model->getCaja($caja);

		$cajaChica = $cierreInfo[0]['CACIER_CAJACHICA'];
		$monedacod = $cajamdl[0]->CAJA_Moneda;

		/*$TicketsAnu = $docAnulados['cantidad'];*/
		$TotalAnu = $docAnulados['CPC_total']; 
		$Totalventas = 0;
		$Totalnotas = 0;
		$MontoCRED = 0;
		$Tickets = 0;
		$notas = 0;
		$bruto = 0;
		$DocsNota = 0;
		$DocMonto = 0;
		$TotalFormasDepago = 0;
		$movEgreso = 0;
        $movIngreso = 0;
		$Movimiento = 0;
		$movIngresoTotal = 0;
		$movEgresoTotal = 0;
		$Totalventas2 = 0;

		$array_forma = array();
		if($monedacod == '1'){
            $simbolo = 'S/';
        }else{
            $simbolo = 'US$';
        }

		for ($i = 0; $i < count($ventasinfo); $i++) {
            if (empty($ventasinfo[$i]['nota'])) {
                $Totalventas += $ventasinfo[$i]['suma'];
                $Tickets += $ventasinfo[$i]['cantidad'];

            }else{
                $Totalnotas += $ventasinfo[$i]['monto_credito'];
                $notas += $ventasinfo[$i]['cantidad'];
                $MontoCRED += $ventasinfo[$i]['monto_credito'];
                $Totalventas2 += $ventasinfo[$i]['suma'];
                $DocsNota = $ventasinfo[$i]['forma'];
                $DocMonto = $ventasinfo[$i]['suma'];
            }
        }

		
        for ($i = 0; $i < count($formaspago); $i++) {
      
            $TotalFormasDepago += $formaspago[$i]['suma'];
        }


		for ($i = 0; $i < count($ventasinfo); $i++) {
            if ($ventasinfo[$i]['forma'] =='1' && $ventasinfo[$i]['nota'] == NULL) {
                $bruto += $ventasinfo[$i]['suma'];
            }
        }
		
		for ($i = 0; $i < count($formaspago); $i++) {
			$array_forma[] = array(
				"descripcion" =>$formaspago[$i]['descripcion'],
				"cantidad"    =>$formaspago[$i]['cantidad'],
				"suma"        =>$formaspago[$i]['suma'],

			);				
        }

		for ($i = 0; $i < count($otrosMov); $i++) {
			if ($otrosMov[$i]["forma_pago"] == 1) {
				if ($otrosMov[$i]['movimiento'] == 1) {
					$movIngreso += $otrosMov[$i]['monto'];
				} else {
					$movEgreso += $otrosMov[$i]['monto'];
				}
				$MovBruto = $movIngreso - $movEgreso;
			}
		}

		for ($i = 0; $i < count($otrosMov); $i++) {
				if ($otrosMov[$i]['movimiento'] == 1) {
					$movIngresoTotal += $otrosMov[$i]['monto'];
				} else {
					$movEgresoTotal += $otrosMov[$i]['monto'];
				}

				$Movimiento = $movIngresoTotal - $movEgresoTotal;

		}

        $originalVentas = $TotalFormasDepago - $MontoCRED + $cajaChica + $Movimiento;
		$Totalegresos = $Totalnotas + $TotalAnu + $movEgreso;
		$brutototal = $bruto + $cajaChica + $MovBruto;
		
		$array_movimientos = array(
			"descripcion" =>'OTROS MOVIMIENTOS',
			"cantidad"    =>0,
			"suma"        =>$Movimiento,

		);		

		$array_forma[] = $array_movimientos;
	   /*  var_dump($cajaChica);
		exit; */

		$data['ventas'] = $originalVentas + $Totalegresos;
		$data['egresos'] = $Totalegresos;
		$data['total_ventas'] = $originalVentas;
		$data['total_bruto'] = $brutototal;
		$data['caja_chica'] = $cajaChica;
		$data['forma_pagos'] = $array_forma;

		$data['cierre_id'] = $cierre;
		$data['caja_id'] = $caja;

		$data['fecha_cierre'] = ($fechacierre == '' || $fechacierre == 'null') ? $fechaActual : $fechacierre;

		$data['base_url'] = $this->url;
        $data['titulo_busqueda'] = "BUSCAR MOVIMIENTOS";
        $data['caja'] = $this->caja_model->getCajas();
        $data['tipo_caja'] = $this->tipocaja_model->getTipoCajas();
        $data['forma_pago'] = $this->formapago_model->getFpagos();
        $data['moneda'] = $this->moneda_model->listar();
		$data['simbolo'] = $simbolo;
	
		$this->layout->view('tesoreria/detalle_caja_index', $data);

	}
	
    
    public function index(){
        $this->cajas();
    }

    #########################
    ###### FUNCTIONS NEWS
    #########################

        public function cajas(){
            $data['base_url'] = $this->url;
            $data['titulo_busqueda'] = "BUSCAR CAJAS";
            $data['titulo'] = "RELACIÓN DE CAJAS";

            $data['tipo_caja'] = $this->tipocaja_model->getTipoCajas();
			$data['cajeros']   = $this->usuario_compania_model->getUsuariosCompania(); //Vendedores

            $this->layout->view('tesoreria/caja_index', $data);
        }

        public function datatable_caja(){

            $columnas = array(
                                0 => "",
                                1 => "CAJA_Codigo",
                                2 => "CAJA_Nombre",
                                3 => "tipCa_Descripcion"
                            );
            
            $filter = new stdClass();
            $filter->start = $this->input->post("start");
            $filter->length = $this->input->post("length");
            $filter->search = $this->input->post("search")["value"];

            $ordenar = $this->input->post("order")[0]["column"];
            if ($ordenar != ""){
                $filter->order = $columnas[$ordenar];
                $filter->dir = $this->input->post("order")[0]["dir"];
            }

            $item = ($this->input->post("start") != "") ? $this->input->post("start") : 0;

            $filter->codigo = $this->input->post('codigo');
            $filter->descripcion = $this->input->post('descripcion');
            $filter->tipo = $this->input->post('tipo');

            $cajaInfo = $this->caja_model->getCajas($filter);
            $lista = array();
            
            if (count($cajaInfo) > 0) {
                foreach ($cajaInfo as $indice => $valor) {
					
					if($valor->CAJA_FlagSituacion == 0){
						$btn_cajaData ="<button type='button' onclick='adminCaja($valor->CAJA_Codigo)' class='btn btn-danger' title='Caja cerrada'>
									<img src='".$this->url."/images/entrega.png' class='image-size-2b'>
								</button >";
					}else{
						$btn_cajaData ="<button type='button' onclick='adminCaja($valor->CAJA_Codigo)' class='btn btn-success' title='Caja aperturada'>
									<img src='".$this->url."/images/dinero_caja.gif' class='image-size-2b'>
								</button>";
					}
					

                    $btn_modal = "<button type='button' onclick='editar($valor->CAJA_Codigo)' class='btn btn-default'>
                                    <img src='".$this->url."/images/modificar.png' class='image-size-1b'>
                                </button>";

                    $btn_eliminar = "<button type='button' onclick='deshabilitar($valor->CAJA_Codigo)' class='btn btn-default'>
                                    <img src='".$this->url."/images/documento-delete.png' class='image-size-1b'>
                                </button>";

                    $lista[] = array(
                                        0 => $indice + 1,
                                        1 => $valor->CAJA_CodigoUsuario,
                                        2 => $valor->CAJA_Nombre,
                                        3 => $valor->tipCa_Descripcion,
										4 => $valor->nombres,
										5 => $valor->CAJA_Observaciones,
										6 => $btn_cajaData,
                                        7 => $btn_modal,
                                        8 => $btn_eliminar
                                    );
                }
            }

            unset($filter->start);
            unset($filter->length);

            $json = array(
                                "draw"            => intval( $this->input->post('draw') ),
                                "recordsTotal"    => count($this->caja_model->getCajas()),
                                "recordsFiltered" => intval( count($this->caja_model->getCajas($filter)) ),
                                "data"            => $lista
                        );

            echo json_encode($json);
        }


        public function getCaja(){

            $caja = $this->input->post("caja");

            $cajaInfo = $this->caja_model->getCaja($caja);
            $lista = array();
            
            if ( $cajaInfo != NULL ){
                foreach ($cajaInfo as $indice => $val) {
                    $lista = array(
                                        "caja" => $val->CAJA_Codigo,
                                        "codigo" => $val->CAJA_CodigoUsuario,
                                        "nombre" => $val->CAJA_Nombre,
                                        "tipocaja" => $val->tipCa_codigo,
										"cajero_caja" => $val->	CAJA_Vendedor,
                                        "obs" => $val->CAJA_Observaciones,
										"estado" => $val->CAJA_FlagSituacion
                                    );
                }

                $json = array("match" => true, "info" => $lista);
            }
            else
                $json = array("match" => false, "info" => "");

            echo json_encode($json);
		}

		 public function abrirCaja(){
			$valor = $this->input->post("valor");
			$caja  = $this->input->post("id");
			$cajachica = $this->input->post("cajachica");

			if($cajachica == '' || $cajachica == null){
				$dbcolumna = new stdClass();
				$dbcolumna->CAJA_FlagSituacion = $valor;
				$result = $this->caja_model->EstadoCaja($caja, $dbcolumna);
		
			} else {
				$dbcolumna = new stdClass();
				$dbcolumna->CAJA_FlagSituacion = $valor;
				$dbcolumna->CAJA_Montoini = $cajachica;
				$result = $this->caja_model->EstadoCaja($caja, $dbcolumna);
			}
		
			$resultRegistrarCierre = $this->RegistrarCierre($caja, $cajachica);
		
			if ($result && $resultRegistrarCierre["result"] === "success") {
				$json = array("result" => "success");
			} else {
				$json = array("result" => "error", "message" => "Error en la apertura de caja");
			}
			
			echo json_encode($json);
		}
		
		public function RegistrarCierre($caja, $cajachica) {
			$cajaInfo = $this->caja_model->getCaja($caja);
			$cajero = $cajaInfo[0]->nombres;
			$montoActual = $cajaInfo[0]->CAJA_Montoini;
			
			if($cajachica == '' || $cajachica == null){
				$sendinfo = new stdClass();
				$sendinfo->CAJA_Codigo = $caja;
				$sendinfo->CACIER_Feapertura = date("Y-m-d H:i:s");
				$sendinfo->CACIER_Fecha = date("Y-m-d");
				$sendinfo->CACIER_CAJACHICA = $montoActual;
				$sendinfo->CACIER_usuario = $cajero;
				$sendinfo->CACIER_FlagSituacion = 1;
				$sendinfo->CACIER_FlagEstado = 1;
		
				$result = $this->caja_model->registrarCierre($sendinfo);
		
			} else {
				$sendinfo = new stdClass();
				$sendinfo->CAJA_Codigo = $caja;
				$sendinfo->CACIER_Feapertura = date("Y-m-d H:i:s");
				$sendinfo->CACIER_Fecha = date("Y-m-d");
				$sendinfo->CACIER_CAJACHICA = $cajachica;
				$sendinfo->CACIER_usuario = $cajero;
				$sendinfo->CACIER_FlagSituacion = 1;
				$sendinfo->CACIER_FlagEstado = 1;
		
				$result = $this->caja_model->registrarCierre($sendinfo);
			}

			if ($result) {
				return array("result" => "success");
			} else {
				return array("result" => "error");
			}
		}
		
		public function DatosCaja(){
			$caja = $this->input->post('caja');
			$datoscaja = $this->caja_model->getCaja($caja);
		
			$estado = $datoscaja[0]->CAJA_FlagSituacion;
			$montoi = $datoscaja[0]->CAJA_Montoini;
			$codigo = $datoscaja[0]->CAJA_CodigoUsuario;
			$nombre = $datoscaja[0]->CAJA_Nombre;
			$responsable = $datoscaja[0]->nombres;
						

			if($estado == "1" || $estado == "0"){
				$json = array("result" => "success", "estado" =>$estado, "cajachica" =>$montoi, "codigoInt" => $codigo, "nombre" => $nombre, "responsable" => $responsable);
			}else{
				$json = array("result" => "error");

			}
				echo json_encode($json);


		}

		public function registrarMonto(){
			$monto = $this->input->post('monto');
			$caja = $this->input->post('caja');

			$filter = new stdClass();
			$filter->CAJA_Montoini = $monto;

			$result = $this->caja_model->EstadoCaja($caja, $filter);
			if ($result)
                $json = array("result" => "success");
            else
                $json = array("result" => "error");
            
            echo json_encode($json);
		}

		public function cerrarCaja(){

			$valor = $this->input->post("valor");
			$caja  = $this->input->post("id");
			$cierres  = $this->input->post("idc");

			$dbcolumna = new stdClass();
			$dbcolumna->CAJA_FlagSituacion = $valor;
			$result = $this->caja_model->EstadoCaja($caja, $dbcolumna);

			$sendinfo = new stdClass();
			$sendinfo->CACIER_Fecierre	 = date("Y-m-d H:i:s");
			$sendinfo->CACIER_FlagSituacion = 0;
		
			$result = $this->caja_model->updateCierre($sendinfo, $cierres);
		
			if ($result)
                $json = array("result" => "success");
            else
                $json = array("result" => "error");
            
            echo json_encode($json);

		}

		public function GetComprobantesCaja($id){
			
		}

        public function guardar_registro(){

            $caja = $this->input->post("caja");
            $codigo_caja = $this->input->post("codigo_caja");
            $nombre_caja = $this->input->post("nombre_caja");
            $tipo_caja = $this->input->post("tipo_caja");
            $obs_caja = $this->input->post("obs_caja");
			$cajero = $this->input->post("cajero_caja");
			$moneda = $this->input->post("monedaC");
		    
            $filter = new stdClass();
            $filter->CAJA_CodigoUsuario = $codigo_caja;
            $filter->CAJA_Nombre = strtoupper($nombre_caja);
            $filter->CAJA_Observaciones = strtoupper($obs_caja);
            $filter->tipCa_codigo = $tipo_caja;
            $filter->CAJA_FlagEstado = "1";
            $filter->COMPP_Codigo = $this->compania;
            $filter->USUA_Codigo = $this->usuario;
			$filter->CAJA_Vendedor = $cajero;
			$filter->CAJA_Moneda = $moneda;

            if ($caja != ""){
                $filter->CAJA_Codigo = $caja;
                $filter->CAJA_FechaModificacion = date("Y-m-d H:i:s");
                $result = $this->caja_model->actualizar_caja($caja, $filter);
            }
            else{
                $filter->CAJA_FechaRegistro = date("Y-m-d H:i:s");
                $result = $this->caja_model->insertar_caja($filter);
            }

            if ($result)
                $json = array("result" => "success");
            else
                $json = array("result" => "error");
            
            echo json_encode($json);
        }

        public function deshabilitar_caja(){

            $caja = $this->input->post("caja");

            $filter = new stdClass();
            $filter->CAJA_FlagEstado  = "0";

            if ($caja != ""){
                $filter->CAJA_FechaModificacion = date("Y-m-d H:i:s");
                $result = $this->caja_model->deshabilitar_caja($caja, $filter);
            }

            if ($result)
                $json = array("result" => "success");
            else
                $json = array("result" => "error");
            
            echo json_encode($json);
        }

    #########################
    ###### FUNCTIONS OLDS
    #########################

    public function cajas_old($j='0'){
    	$filter = new stdClass();
    	$data['action'] 		= base_url()."index.php/tesoreria/caja/buscar_cajas";
    	$filter->CAJA_Nombre 	= $this->input->post('nombres');
    	$data['nombres']    	= $filter->CAJA_Nombre;
    	$data['titulo_tabla']   = "RESULTADO DE BUSQUEDA DE CAJAS";
    	$conf['per_page']  		= 10;
    	$conf['num_links']  	= 3;
    	$conf['next_link'] 		= "&gt;";
    	$conf['prev_link'] 		= "&lt;";
    	$conf['first_link'] 	= "&lt;&lt;";
    	$conf['last_link']  	= "&gt;&gt;";
    	$conf['uri_segment'] 	= 4;
    	$this->pagination->initialize($conf);
    	$data['paginacion'] 	= $this->pagination->create_links();
    	$listado_cajas 			= $this->caja_model->listar_cajas($conf['per_page'],$j);
    	$item        = $j+1;
    	$lista           = array();
    	if(count($listado_cajas)>0){
    		foreach($listado_cajas as $indice=>$valor){
    			$codigo        = $valor->CAJA_Codigo;
    			$nombre        = $valor->CAJA_Nombre;
    			$tipoCaja      = $valor->tipCa_codigo;
    			$tipo	       = $valor->CAJA_tipo;
    			if($tipo == 0){
    				$tipoNombre = "CAJA";
    			}elseif ($tipo == 1){
    				$tipoNombre = "BANCO";
    			}
    			if($tipoCaja != null){
    				$datosTipCaja = $this->tipocaja_model->obtenerTipocaja($tipoCaja);
    				$nombTipCaja = $datosTipCaja[0]->tipCa_Descripcion;
    			}
    			
    			$editar         = "<a href='javascript:;' onclick='editar_caja(".$codigo.")'><img src='".base_url()."images/modificar.png' width='16' height='16' border='0' title='Modificar'></a>";
    			$ver            = "<a href='javascript:;' onclick='ver_caja(".$codigo.")'><img src='".base_url()."images/ver.png' width='16' height='16' border='0' title='Ver'></a>";
    			$eliminar       = "<a href='javascript:;' onclick='eliminar_caja(".$codigo.")'><img src='".base_url()."images/eliminar.png' width='16' height='16' border='0' title='Eliminar'></a>";
    			$listamultiple       = "<a href='javascript:;' onclick='listamultiple_caja(".$codigo.")'><img src='".base_url()."images/listagrupal.png' width='16' height='16' border='0' title='ListaMultiple'></a>";
    			$lista[]        = array($item,$nombre,$nombTipCaja,$tipoNombre,$editar,$ver,$eliminar,$listamultiple);
    			$item++;
    		}
    	}
    	$data['lista'] 		= $lista;
        $this->layout->view("tesoreria/caja_index",$data);
    }
    public function ver_caja($caja)
    {
    	 
    	$datos   					 = $this->caja_model->obtener_datosCaja($caja);
    	$data['nombres']             = $datos[0]->CAJA_Nombre;
    	$tipoCaja        		 	 = $datos[0]->tipCa_codigo;
    	if($tipoCaja != null){
    		$datosTipoCaja			 = $this->caja_model->obtener_datosTipoCaja($tipoCaja);
    		$data['tipoCaja']		 = $datosTipoCaja[0]->tipCa_Descripcion;
    	}
    	$data['observaciones']= $datos[0]->CAJA_Observaciones;
    	$data['datos']  			 = $datos;
    	$data['titulo'] 			 = "VER CAJA";
    	$this->load->view('tesoreria/caja_ver',$data);
    }
	
    public function listamultiple_caja($caja)
    {
    
    	$datos   					 = $this->caja_model->obtener_datosCaja($caja);
    	$data['codigo']				 = $datos[0]->CAJA_Codigo;
    	$data['nombres']             = $datos[0]->CAJA_Nombre;
    	$tipoCaja        		 	 = $datos[0]->tipCa_codigo;
    	if($tipoCaja != null){
    		$datosTipoCaja			 = $this->caja_model->obtener_datosTipoCaja($tipoCaja);
    		$data['tipoCaja']		 = $datosTipoCaja[0]->tipCa_Descripcion;
    	}
    	$data['observaciones']= $datos[0]->CAJA_Observaciones;
    	$data['datos']  			 = $datos;
//     	$data['titulo'] 			 = "VER CAJA";
    	$this->load->view('tesoreria/movimiento_index',$data);
    }
    
    public function eliminar_caja($caja){
    	$caja = $this->input->post('caja');
    	$this->caja_model->eliminar_caja($caja);
    }
    public function nueva_caja(){
    	$data['modo']  			= "insertar";
    	$objeto 				= new stdClass();
    	$objeto->id     		= "";
    	$data['datos'] 			= $objeto;
    	$data['titulo'] 		= "REGISTRAR CAJA";
    	$data['display'] 		= "";
    	$data['nombreCaja'] 	= "";
    	$data['numeroCaja'] 	= "";
    	$data['tipo_caja'] 		= "0";
    	$data['checkedCaja'] 	= "checked='checked'";
    	$data['checkedBan'] 	= "";
    	$data['url_action'] 	= base_url() . "index.php/tesoreria/caja/insertar_cuenta";
    	$compania 				= $this->session->userdata('compania');
    	$Datoscuenta  = $this->caja_model->obtener_datosCuenta_banco($compania);
    	if(is_array($Datoscuenta)){
    		foreach ($Datoscuenta as $indice => $valor){
    			    $bancoCodigo  = $valor->BANP_Codigo;
    				if($bancoCodigo != null){
    					$objetos[]= $bancoCodigo;
    				}
    			
    		}
    	}

    	$data['cboCuentas'] 	= $this->OPTION_generador($this->caja_model->listar_cuenta($compania), 'CUENT_Codigo', 'CUENT_NumeroEmpresa', '');
    	$data['cboTipCaja'] 	= $this->OPTION_generador($this->caja_model->listar_tipoCaja(), 'tipCa_codigo', 'tipCa_Descripcion', '');
    	$data['cboBancos'] 		= $this->OPTION_generador($this->banco_model->listar_banco($objetos), 'BANP_Codigo', 'BANC_Nombre', '');
//        $data['cboResponsable'] = $this->OPTION_generador($this->usuario_model->listar_usuarios(), 'USUA_Codigo','PERSC_Nombre','');
       $data['cboResponsable'] = $this->OPTION_generador($this->directivo_model->combo_directivos(), 'DIREP_Codigo','PERSC_Nombre','');
       $data['sectorista'] 	= "";
    	$data['telefono'] 		= "";
    	$data['direccion'] 		= "";
    	$data['sobregiro'] 		= "";
    	$data['cboMoneda'] 		= $this->OPTION_generador($this->moneda_model->listar(), 'MONED_Codigo', 'MONED_Descripcion', '');
    	$data['limiteRetiro'] 	= "";
    	$data['observaciones'] 	= "";
    	$data['descripcion'] 	= "";
    	$data['serie'] 			= "";
    	$data['serieNumero'] 	= "";
    	$data['detalle_cuenta'] = array();
    	$data['detalle_chequera'] = array();
    	$this->load->view("tesoreria/caja_nuevo",$data);
    }
    
    public function insertar_cuenta(){
    	/** INSERTAR DATOS DE CAJA **/
    	$nombreCaja 	= $this ->input -> post('nombreCaja');
    	$cboTipCaja		= $this ->input -> post('cboTipCaja');
    	$tipo_caja  	= $this ->input -> post('tipo_caja');
    	$cboResponsable = $this ->input -> post('cboResponsable');
    	$observaciones  = $this ->input -> post('observaciones');
    	$caja 			= $this->caja_model->insertar_datosCaja($nombreCaja,$cboTipCaja,$tipo_caja,$cboResponsable,$observaciones);
    	
    	/** INSERTAR DATOS DE  CAJA CUENTA**/
    	$cuentaCodigo  		 = $this ->input -> post('cuentaCodigo');
    	$cboCuentas    		 = $this ->input -> post('cboCuentas');
    	$cboTipoCaja 	   	 = $this ->input -> post('tipoCaja');
    	$limiteRetiro		 = $this ->input -> post('limiteRetiro');
    	$cuentaaccion  	 	 = $this ->input -> post('cuentaaccion');
    	if(is_array($cuentaCodigo)){
    		foreach ($cuentaCodigo as $indice => $valor){
    			if($valor != $cuentaCodigo){
    				$filter = new stdClass();
    				$filter ->CUENT_Codigo 	  = $cboCuentas[$indice];
    				$filter ->TIPOING_Codigo  = $cboTipoCaja[$indice];
    				$filter ->CAJCUENT_LIMITE = $limiteRetiro[$indice];
    				$filter ->CAJA_Codigo     = $caja;
    				if ($cuentaaccion[$indice] != 'e') {
    					$this->caja_model->insertar_cuenta($filter);
    				}
    			}
    		}
    	}
    	/** INSERTAR DATOS DE  CAJA CHEQUERA**/
    	$chequeraCodigo   = $this ->input -> post('chequeraCodigo');
    	$descripcion      = $this ->input -> post('descripcion');
    	$cboSerie 	      = $this ->input -> post('cboSerie');
    	$chequeaccion     = $this ->input -> post('chequeaccion');
    	if(is_array($chequeraCodigo)){
    		foreach ($chequeraCodigo as $indice => $valor){
    			if($valor != $chequeraCodigo){
    				$filter = new stdClass();
    				$filter ->CAJCHEK_Descripcion  = $descripcion[$indice];
    				$filter ->CAJA_Codigo 	  	   = $caja;
    				$filter ->CHEK_Codigo 	  	   = $cboSerie[$indice];
    				if ($chequeaccion[$indice] != 'e') {
    					$this->caja_model->insertar_chekera($filter);
    				}
    			}
    		}
       }
       $this->cajas();    
    }
    
    public function editar_caja($caja){
    	
    	$data['modo']	 = "modificar";
    	$data['id']	  	 = $this->input->post('id');
    	$data['titulo']  = "MODIFICAR CAJA";
    	$data['display'] = "";
    	$datos_caja      = $this->caja_model->obtener_datosCaja($caja);
    	$codigoCaja		 = $datos_caja[0]->CAJA_Codigo;
    	$cboTipCaja		 = $datos_caja[0]->tipCa_codigo;
    	$nombreCaja   	 = $datos_caja[0]->CAJA_Nombre;
    	$cboResponsable  = $datos_caja[0]->CODIGO_Directorio;
    	//echo "<script>alert('EditarCara : ".$cboResponsable."')</script>";
    	$observaciones   = $datos_caja[0]->CAJA_Observaciones;    	
    	$objeto                 = new stdClass();
    	$objeto->id             = $datos_caja[0]->CAJA_Codigo;
    	$data['datos']    		= $objeto;
    	$data['nombreCaja']   	= $nombreCaja;
//     	$data['cboResponsable'] = $this->OPTION_generador($this->usuario_model->listar_usuarios(), 'USUA_Codigo','PERSC_Nombre',$datos_caja[0]->USUA_Codigo);
    	$data['cboResponsable'] = $this->OPTION_generador($this->directivo_model->combo_directivos(), 'DIREP_Codigo','PERSC_Nombre',$datos_caja[0]->CODIGO_Directorio);
    	$data['cboTipCaja'] 	= $this->OPTION_generador($this->caja_model->listar_tipoCaja(), 'tipCa_codigo', 'tipCa_Descripcion', $datos_caja[0]->tipCa_codigo);
    	$data['observaciones']  = $observaciones;    	
    	$compania 				= $this->session->userdata('compania');
    	$Datoscuenta  = $this->caja_model->obtener_datosCuenta_banco($compania);
    	if(is_array($Datoscuenta)){
    		foreach ($Datoscuenta as $indice => $valor){
    			//if($valor != $Datoscuenta){
    				$bancoCodigo  = $valor->BANP_Codigo;
    				if($bancoCodigo != null){
    					$objetos[]= $bancoCodigo;
    			//	}
    			}
    		}
    	}
    	$data['cboBancos'] 		= $this->OPTION_generador($this->banco_model->listar_banco($objetos), 'BANP_Codigo', 'BANC_Nombre', '');
    	$data['limiteRetiro'] 	= "";
    	$data['descripcion'] 	= "";
    	
    	/** OBTENER DATOS DE CAJA CUENTA **/
    	$detalle_cuenta 	  		= $this->listar_detalle_cuenta($caja);
    	$data['detalle_cuenta']     = $detalle_cuenta;
    	//$data['detalle_cuenta'] = $this->caja_model->obtener_cuenta_caja2($caja);
    	/** OBTENER DATOS DE CHEQUERA CUENTA **/
    	$detalle_chequera 	  		= $this->listar_detalle_chequera($caja);
    	$data['detalle_chequera']     = $detalle_chequera;
    	
    	
    	$this->load->view("tesoreria/caja_nuevo",$data);

		
    }
    
    public function modificar_caja()
    {
    	/** MODIFICAR DATOS DE CAJA **/
    	$codigo             = $this ->input -> post('caja');
    	$nombreCaja 		= $this ->input -> post('nombreCaja');
    	$cboTipCaja			= $this ->input -> post('cboTipCaja');
    	$tipo_caja  		= $this ->input -> post('tipo_caja');
    	$cboResponsable 	= $this ->input -> post('cboResponsable');
    	$observaciones  	= $this ->input -> post('observaciones');
    	$caja 				= $this->caja_model->modificar_datosCaja($codigo,$nombreCaja,$cboTipCaja,$tipo_caja,$cboResponsable,$observaciones);
    	
    	/** MODIFICAR DATOS DE CUENTA **/
    	$cuentaCodigo  		 = $this ->input -> post('cuentaCodigo');
    	$cboCuentas    		 = $this ->input -> post('cboCuentas');
    	$cboTipoCaja 	   	 = $this ->input -> post('tipoCaja');
    	$limiteRetiro		 = $this ->input -> post('limiteRetiro');
    	$cuentaaccion  	 	 = $this ->input -> post('cuentaaccion');
    	if(is_array($cuentaCodigo)){
    		foreach ($cuentaCodigo as $indice => $valor){
    			if($valor != $cuentaCodigo){
    				$detalle_accion = $cuentaaccion[$indice];
    				$filter = new stdClass();
    				$filter ->CUENT_Codigo 	  = $cboCuentas[$indice];
    				$filter ->TIPOING_Codigo  = $cboTipoCaja[$indice];
    				$filter ->CAJCUENT_LIMITE = $limiteRetiro[$indice];
    				$filter ->CAJA_Codigo     = $codigo;
    				    				
    				if ($detalle_accion == 'n') {
    					$this->caja_model->insertar_cuenta($filter);
    				} elseif ($detalle_accion == 'm') {
    					$this->caja_model->modificar_cuenta($valor, $filter);
    				} elseif ($detalle_accion == 'e') {
    					$this->caja_model->eliminar_cuenta($valor);
    				}
    			}
    		}
    	}
    	
    	/** MODIFICAR DATOS DE  CHEQUERA**/
    	$chequeraCodigo   = $this ->input -> post('chequeraCodigo');
    	$descripcion      = $this ->input -> post('descripcion');
    	$cboSerie 	      = $this ->input -> post('cboSerie');
    	$chequeaccion     = $this ->input -> post('chequeaccion');
    	if(is_array($chequeraCodigo)){
    		foreach ($chequeraCodigo as $indice => $valor){
    			if($valor != $chequeraCodigo){
    				$detalle_accion = $chequeaccion[$indice];
    				$filter = new stdClass();
    				$filter ->CAJCHEK_Descripcion  = $descripcion[$indice];
    				$filter ->CAJA_Codigo 	  	   = $codigo;
    				$filter ->CHEK_Codigo 	  	   = $cboSerie[$indice];
    				
    				if ($detalle_accion == 'n') {
    					$this->caja_model->insertar_chekera($filter);
    				} elseif ($detalle_accion == 'm') {
    					$this->caja_model->modificar_chekera($valor, $filter);
    				} elseif ($detalle_accion == 'e') {
    					$this->caja_model->eliminar_chekera($valor);
    				}
    				
    			}
    		}
    	}
    	
    	
    	
    }
    
    public function listar_detalle_cuenta($caja){
    	$detalle = $this->caja_model->obtener_cuenta_caja($caja);
    	$lista_detalles = array();
    	if (count($detalle) > 0) {
    		foreach ($detalle as $indice => $valor) {
    			$cajaCuentaCodigo 	  = $valor->CAJCUENT_Codigo;
    			$cboCuentas			  = $valor->CUENT_Codigo;
    			$limiteRetiro		  = $valor->CAJCUENT_LIMITE;
    			$tipoCaja			  = $valor->TIPOING_Codigo;
                $caja_Codigo          = $valor->CAJA_Codigo;

    			if($tipoCaja == 1){
    				$tipoNombre = "INGRESO";
    			}elseif ($tipoCaja == 2){
    				$tipoNombre = "SALIDA";
    			}
    		if($cboCuentas != null){
    				$Datoscuenta  = $this->caja_model->obtener_datosCuenta($cboCuentas);
    				$bancoCodigo  = $Datoscuenta[0]->BANP_Codigo;
    				$numroCuenta  = $Datoscuenta[0]->CUENT_NumeroEmpresa;
    				$tipCuenta	  = $Datoscuenta[0]->CUENT_TipoCuenta;
    				if($bancoCodigo != null){
    					$datosBanco   = $this->banco_model->obtener($bancoCodigo);
    					$bancoNombre  = $datosBanco[0]->BANC_Nombre;
    				}
    				if($tipCuenta == 1){
    					$tipCuentaNombre = "AHORROS";
    				}elseif ($tipCuenta == 2){
    					$tipCuentaNombre = "CORRIENTE";
    				}
    				$moneda		  = $Datoscuenta[0]->MONED_Codigo;
    				if($moneda != null){
    					$datosMoneda  = $this->moneda_model->obtener($moneda);
    					$monedaNombre = $datosMoneda[0]->MONED_Descripcion;
    				}
    			}
    			
      $objeto = new stdClass();
                $objeto->CAJCUENT_Codigo     = $cajaCuentaCodigo;
                $objeto->BANP_Codigo         = $bancoCodigo;
                $objeto->CUENT_Codigo        = $cboCuentas;
                $objeto->CUENT_NumeroEmpresa = $numroCuenta;
                $objeto->CUENT_TipoCuenta    = $tipCuenta;
                $objeto->CUENT_TipoCuenta    = $tipCuentaNombre;
                $objeto->MONED_Codigo        = $moneda;
                $objeto->MONED_Descripcion   = $monedaNombre;
                $objeto->CAJCUENT_LIMITE     = $limiteRetiro;
                $objeto->TIPOING_Codigo      = $tipoCaja;
                $objeto->TIPOING_Codigo      = $tipoNombre;
                $objeto->BANC_Nombre         = $bancoNombre;
                $objeto->TIPOING_C           = $tipoCaja;
                $objeto->CAJA_Codigo         =$caja_Codigo;
                $lista_detalles[] = $objeto;
    			
    		}

    	}

    	return $lista_detalles;
    }
    
    public function listar_detalle_chequera($caja) {
    	$detalle = $this->caja_model->obtener_cuenta_chequera($caja);
    	$lista_detalles = array();
    	if (count($detalle) > 0) {
    		foreach ($detalle as $indice => $valor) {
    			$chequeraCuentaCodigo 	  = $valor->CAJCHEK_Codigo;
    			$descripcion		  	  = $valor->CAJCHEK_Descripcion;
    			$cboSerie		  	  	  = $valor->CHEK_Codigo;
    			if($cboSerie != null){
    				$Datoschequera  = $this->caja_model->obtener_chequeraCodigo($cboSerie);
    				$serieChequera  = $Datoschequera[0]->SERIP_Codigo;
    				$numroSerie     = $Datoschequera[0]->CHEK_Numero;
    				$serie 			= $serieChequera."-".$numroSerie;
    			}
    			if($caja != null){
    				$cuentaCaja  = $this->caja_model->obtener_cuenta_caja($caja);
    				$cuenta		  = $cuentaCaja[0]->CUENT_Codigo;
    				if($cuenta != null){
    					$Datoscuenta  = $this->caja_model->obtener_datosCuenta($cuenta);
    					$bancoCodigo  = $Datoscuenta[0]->BANP_Codigo;
    					$numroCuenta  = $Datoscuenta[0]->CUENT_NumeroEmpresa;
    				}
    				
    			}
    			
    			if($bancoCodigo != null){
    				$datosBanco   = $this->banco_model->obtener($bancoCodigo);
    				$bancoNombre  = $datosBanco[0]->BANC_Nombre;
    			}
    
    			$objeto = new stdClass();
    			$objeto->CAJCHEK_Codigo	 	 = $chequeraCuentaCodigo;
    			$objeto->CUENT_Codigo 		 = $cuenta;
    			$objeto->CAJCHEK_Descripcion = $descripcion;
    			$objeto->BANP_Codigo 		 = $bancoCodigo;
    			$objeto->BANC_Nombre		 = $bancoNombre;
    			$objeto->CUENT_NumeroEmpresa = $numroCuenta;
    			$objeto->SERIP_Codigo        = $serieChequera;
    			$objeto->CHEK_Numero		 = $numroSerie;
    			$objeto->CHEK_Codigo		 = $cboSerie;
				$objeto->SERIP_Codigo		 = $serie;
    			$lista_detalles[] = $objeto;
    		}
    	}
    	return $lista_detalles;
    }
    
    public function cargar_cuenta($banco){
    	$cboCuentas = $this->seleccionar_cuenta_banco($banco);
    	$fila  ="<select id='cboCuentas' name='cboCuentas' class='comboMedio'>";
    	//$fila .="<option value=''> ::Seleccione:: </option>";
    	$fila .= $cboCuentas;
    	$fila .= "</select>";
    	echo $fila;
    }
   //////////////////////////////////////////////////////////////// 
    public function cargarCuentaEmpresa($codigoD,$index){
    $cboCuentas = $this->seleccionar_cuenta_banco($codigoD,$index);
    $fila  ="<select id='cboCuentas' name='cboCuentas' class='comboMedio'>";
        //$fila .="<option value=''> ::Seleccione:: </option>";
    $fila .= $cboCuentas;
    $fila .= "</select>";
    echo $fila;
     
    }
    public function cargarCuentaBanco($codigo){

    }
    public function cargar_cuentaCheque($banco){
    	$cboCuentaCheque = $this->seleccionar_cuenta_banco($banco);
    	$fila  = "<select id='cboCuentaCheque' name='cboCuentaCheque' class='comboMedio' onchange='cargar_serieCuenta(this);'>";
    	//$fila .="<option value=''> ::Seleccione:: </option>";
    	$fila .=$cboCuentaCheque;
    	$fila .= "</select>";
    	echo $fila;
    }
    
    public function cargar_datosCuenta($cuenta){
    	$Datoscuenta  = $this->caja_model->obtener_datosCuenta($cuenta);
    	$tipCuenta	  = $Datoscuenta[0]->CUENT_TipoCuenta;
    	$moneda		  = $Datoscuenta[0]->MONED_Codigo;
    	if($tipCuenta == 1){
    		$nomTipCuenta = "AHORRO";
    	}elseif ($tipCuenta == 2){
    		$nomTipCuenta = "CORRIENTE";
    	}
    	$DatosMoneda  = $this->moneda_model->obtener($moneda);
    	$monedaNom	  = $DatosMoneda[0]->MONED_Descripcion;
    	$fila	      = "<input name='tipCuenta' type='text' class='cajaGeneral' disabled	id='tipCuenta' maxlength='150' value='$nomTipCuenta'>";
    	$fila	      .= "&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;Moneda&nbsp; &nbsp;&nbsp;";
    	$fila	      .= "<input name='monedaCuenta' type='text' class='cajaGeneral' disabled id='monedaCuenta' maxlength='150' value='$monedaNom'>";
    	echo $fila;


    }
    
 	public function cargar_serie($serie){
    	$cboSerie = $this->caja_model->obtener_numeroSerie($serie);
    	$numero   = $numeroSerie[0]->CHEK_Numero;
    	$fila     = "<input name='serieNumero' type='text' class='cajaGeneral'  disabled id='serieNumero' maxlength='150' value='$numero'>";
    	echo $fila;
                      						  
    }
    
    public function cargar_serieCuenta($cuenta){
    	$cboSerie  = $this->seleccionar_chequera($cuenta);
    	$fila = "<select id='cboSerie' name='cboSerie' class='comboMedio'>";
    	///$fila .="<option value=''> ::Seleccione:: </option>";
    	$fila .= $cboSerie;
    	$fila .= "</select>";
    	echo $fila;
    	
    }
    
    public function cargar_banco($banco){
    	$cboBancoCuenta = $this->seleccionar_banco_cuenta($banco);
    	$fila 			= "<select id='cboBancoCuenta' name='cboBancoCuenta' class='comboMedio'>";
    	//$fila 		   .="<option value=''> ::Seleccione:: </option>";
    	$fila 		   .=  $cboBancoCuenta; 
    	$fila 		   .= "</select>";
    	echo $fila;
    }
    
    public function cargar_chequera($cuenta){
    	$cboSerie  = $this->seleccionar_chequera($cuenta);
    	$fila  = "<select id='cboSerie' name='cboSerie' class='comboMedio'>";
    	//$fila .="<option value=''> ::Seleccione:: </option>";
    	$fila .= $cboSerie;
    	$fila .= "</select>";
    	echo $fila;
    }
    
    public function seleccionar_chequera($cuenta){
    	$chequera = $this->caja_model->listar_chequera($cuenta);
    	$arreglo = array();
    	if(count($chequera)>0){
    		foreach($chequera as $indice=>$valor){
    			$indice1   = $valor->CHEK_Codigo;
    			$valor1    = $valor->SERIP_Codigo;
    			$valor2    = $valor->CHEK_Numero;
    			$arreglo[$indice1] = $valor1."-".$valor2;
    		}
    	}
    	$resultado = $this->html->optionHTML($arreglo,array('00','::Seleccione::'));
    	return $resultado;
    }
	
    public function cargar_tabla_cuenta($cuenta){
    	if($cuenta != null){
    		$Datoscuenta  = $this->caja_model->obtener_datosCuenta($cuenta);
    		$monedaCodigo = $Datoscuenta[0]->MONED_Codigo;
    		$bancoCodigo  = $Datoscuenta[0]->BANP_Codigo;
    		$compania = $this->session->userdata('compania');
    		$cboCuentas   = $this->seleccionar_cuenta($compania);
    		$cbo_banco 	  = $this->seleccionar_banco($bancoCodigo);
    		$cbo_moneda   = $this->seleccionar_moneda($monedaCodigo);
    		$fila	      = "<tr>";
    		$fila	      .= "<td>Bancos</td>";
    		$fila	      .= "<td>";
    		$fila     	  .= "<select id='cboBancos' name='cboBancos' class='comboMedio'>";
    		$fila 		  .="<option value=''> ::Seleccione:: </option>";
    		$fila    	  .= $cbo_banco;
    		$fila    	  .= "</select>&nbsp;&nbsp;";
    		$fila	      .= "</td>";
    		$fila	      .= "<td>Moneda</td>";
    		$fila	      .= "<td>";
    		$fila    	  .= "<select id='cboMoneda' name='cboMoneda' class='comboMedio'>";
    		$fila    	  .= $cbo_moneda;
    		$fila    	  .= "</select>&nbsp;&nbsp;";
    		$fila	      .= "</td>";
    		$fila	      .= "</tr>";
    		echo $fila;
    	}
    	
    }

    public function seleccionar_cuenta($compania){
    	$cuenta = $this->caja_model->listar_cuenta($compania);
    	$arreglo = array();
    	if(count($cuenta)>0){
    		foreach($cuenta as $indice=>$valor){
    			$indice1   = $valor->CUENT_Codigo;
    			$valor1    = $valor->CUENT_NumeroEmpresa;
    			$arreglo[$indice1] = $valor1;
    		}
    	}
    	$resultado = $this->html->optionHTML($arreglo,array('00','::Seleccione::'));
    	return $resultado;
    }
    
    public function seleccionar_cuenta_banco($banco="",$index=""){
    	$cuenta = $this->caja_model->listar_cuenta_banco($banco);
    	$arreglo = array();
    	if(count($cuenta)>0){
    		foreach($cuenta as $indice=>$valor){
    			$indice1   = $valor->CUENT_Codigo;
    			$valor1    = $valor->CUENT_NumeroEmpresa;
    			$arreglo[$indice1] = $valor1;
    		}
    	}
    	$resultado = $this->html->optionHTML($arreglo,$index,array('00','::Seleccione::'));
    	return $resultado;
    }
    
    public function seleccionar_banco($cuenta){
    	$bancos = $this->caja_model->listar_banco_cuenta($cuenta);
    	$arreglo = array();
    	if(count($bancos)>0){
    		foreach($bancos as $indice=>$valor){
    			$indice1   = $valor->BANP_Codigo;
    			$valor1    = $valor->BANC_Nombre;
    			$arreglo[$indice1] = $valor1;
    		}
    	}
    	$resultado = $this->html->optionHTML($arreglo,array('00','::Seleccione::'));
    	return $resultado;
    }
    
    public function seleccionar_banco_cuenta($banco){
    	$bancos = $this->caja_model->listar_banco_cuenta($banco);
    	$arreglo = array();
    	if(count($bancos)>0){
    		foreach($bancos as $indice=>$valor){
    			$indice1   = $valor->BANP_Codigo;
    			$valor1    = $valor->BANC_Nombre;
    			$arreglo[$indice1] = $valor1;
    		}
    	}
    	$resultado = $this->html->optionHTML($arreglo,array('00','::Seleccione::'));
    	return $resultado;
    }
    public function seleccionar_CuentaEmpresa($codigo,$indSel=''){
    $array_area = $this->caja_model->getCajaDetalleCuentaEmpresa($codigo);
        $arreglo = array();
        foreach($array_area as $indice=>$valor){
                $indice1   = $valor->CUENT_Codigo;
                $valor1    = $valor->CUENT_NumeroEmpresa;
                $arreglo[$indice1] = $valor1;
        }
        $resultado = $this->html->optionHTML($arreglo,$indSel,array('00','::Seleccione::'));
        return $resultado;
    }
    
    public function seleccionar_moneda($cuenta){
    	$moneda = $this->caja_model->listar_moneda_cuenta($cuenta);
    	$arreglo = array();
    	if(count($moneda)>0){
    		foreach($moneda as $indice=>$valor){
    			$indice1   = $valor->MONED_Codigo;
    			$valor1    = $valor->MONED_Descripcion;
    			$arreglo[$indice1] = $valor1;
    		}
    	}
    	$resultado = $this->html->optionHTML($arreglo,array('00','::Seleccione::'));
    	return $resultado;
    }


}       
?>