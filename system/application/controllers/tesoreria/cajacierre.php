<?php

class Cajacierre extends Controller{

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

        
        $this->load->library('html');
        $this->load->library('pagination');
        $this->load->library('layout','layout');
        
        $this->empresa = $this->session->userdata('empresa');
        $this->compania = $this->session->userdata('compania');
        $this->usuario = $this->session->userdata('user');
        $this->url = base_url();
    }
    
    public function index(){
        $this->cierre();
    }

    #########################
    ###### FUNCTIONS NEWS
    #########################

        public function cierre(){
            $data['base_url'] = $this->url;
            $data['titulo_busqueda'] = "BUSCAR CAJAS";
            $data['titulo'] = "RELACIÓN DE CAJAS";

            $data['tipo_caja'] = $this->tipocaja_model->getTipoCajas();
			$data['cajeros']   = $this->usuario_compania_model->getUsuariosCompania(); //Vendedores
            $this->layout->view('tesoreria/caja_index', $data);
        }

        public function datatable_cajacierre($id){
            $columnas = array(
                                0 => "",
                                1 => "CACIER_Codigo",
                                2 => "CAJA_Nombre",
                                3 => "tipCa_Descripcion"
                            );
            $idCaja = $id;
          /*   $datosCaja = $this->caja_model->getCaja($id);
            var_dump($datosCaja[0]->nombres);
            exit;   */              

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

            $filter->descripcion = $this->input->post('descripcion');
            /* var_dump($filter);
            exit; */
            $cierreInfo = $this->caja_model->getcierres($filter,$idCaja);
           
            $lista = array();
            
            if (count($cierreInfo) > 0) {
                foreach ($cierreInfo as $indice => $valor) {
                    $cierre = $valor['CACIER_Codigo'];
                    $situacion = $valor['CACIER_FlagSituacion'];
                    
                    $datosCaja = array(
                        'cierre' => $valor['CACIER_Codigo'],
                        'caja' => $valor['CAJA_Codigo'],
                        'situacion' => $valor['CACIER_FlagSituacion'],
                        'fechaapertura' => $valor['CACIER_Feapertura'],
                        'fechacierre' => $valor['CACIER_Fecierre'],
                        'cajero' => $valor['CACIER_usuario']
                    );


                    if($situacion == 1){
                        $btn_cierre = "<button type='button' onclick='CierreCaja($cierre)' class='btn btn-default' style='background-color: red; color: red' title = 'Cerrar caja'>
                                    <img src='".$this->url."/images/cerrarcaja.png' class='image-size-1b'>
                                </button>";
                        $btn_cuadre= "<button type='button' onclick='mensaje()' class='btn btn-default' title = 'recibiendo ingresos...esperando cuadre'>
                                <img src='".$this->url."/images/barloading.gif' class='image-size-1b'>
                            </button>";
                       
                    }else{
                        $btn_cierre = "<button type='button'  class='btn btn-default' title= cerrada>
                                    <img src='".$this->url."/images/delete.gif' class='image-size-1b' >
                                </button>";
                        $btn_cuadre = "<button type='button' onclick='ticketCaja(" . json_encode(json_encode($datosCaja)) . ")' class='btn btn-default' title = 'Cuadre caja'>
                                <img src='".$this->url."/images/boleto.png' class='image-size-1b'>
                        </button>";
                    }

                        $btn_detalle = "<button type='button' onclick='detalleCierre(". json_encode(json_encode($datosCaja)) .")' class='btn btn-default' title = 'Detalle cierre'>
                                <img src='".$this->url."/images/aumentar.png' class='image-size-1b'>
                        </button>";                    
                     
                    $lista[] = array(
                                        0 => $indice + 1,
                                        1 => $valor['CACIER_Feapertura'],
                                        2 => $valor['CACIER_Fecierre'],
                                        3 => $valor['CACIER_usuario'],
										4 => $valor['CACIER_CAJACHICA'],
										5 => '',
										6 => $btn_cierre,
                                        7 => $btn_cuadre,
                                        8 => $btn_detalle,
                                    );
                }
            }

            unset($filter->start);
            unset($filter->length);

            $json = array(
                                "draw"            => intval( $this->input->post('draw') ),
                                "recordsTotal"    => count($this->caja_model->getcierres($filter,$idCaja)),
                                "recordsFiltered" => intval( count($this->caja_model->getcierres($filter,$idCaja)) ),
                                "data"            => $lista
                        );

            echo json_encode($json);
        }

        public function datatable_compcaja($id, $fecja_ini, $fecha_cierre){
         
            $columnas = array(
                                0 => "",
                                1 => "CACIER_Codigo",
                                2 => "CAJA_Nombre",
                                3 => "tipCa_Descripcion"
                            );
            $idCaja = $id;
            $fehcaini = $fecja_ini;
            $fechacierre = $fecha_cierre;           

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

            $cierreInfo = $this->caja_model->getComprobanteCaja($filter, $fehcaini, $fechacierre, $idCaja);
          /*   var_dump($cierreInfo);
            exit; */
            $lista = array();
            
            if (count($cierreInfo) > 0) {
                foreach ($cierreInfo as $indice => $valor) {
                    $comprobante = $valor['CPP_Codigo'];
                    $estado = $valor['CPC_FlagEstado'];
                    $nota = $valor['CRED_FlagEstado'];
                    $tipo_nota = $valor['DOCUP_Codigo'];

                    if($estado == 1 && $nota == null){
                        $estadoDoc = "<button type='button' title = 'aprobado' style ='background-color: #58B81E'>
                            APROBADO
                        </button>";
                        $nota_credito = "";

                    }else{
                        $estadoDoc = "<button type='button' title = 'anulado' style ='background-color: #F71616; color: #FFFFFF'>
                            ANULADO
                        </button>";  
                    }

                    if($tipo_nota == 1){
                        $nota_credito =  "<button type='button' title = 'anulado por nota de credito' style ='background-color: #FF9319;'>
                                        ANULADO POR NOTA
                        </button>";  

                    }

                    if($tipo_nota == 5){
                        $nota_credito =  "<button type='button' title = 'anulado por nota de credito(anulacion por item)' style ='background-color: #FF9319;'>
                                        ANULADO POR NOTA
                        </button>";  

                    }
                    
                    $btn_documento =   "<button type='button' onclick='ticket($comprobante)' class='btn btn-default' title = 'ticket'>
                             <img src='".$this->url."/images/imprimir.png' class='image-size-1b'>
                    </button>";  
                     
                    $lista[] = array(
                                        0 => $indice + 1,
                                        1 => $valor['CPC_FechaRegistro'],
                                        2 => $valor['CPC_Serie'],
                                        3 => $valor['CPC_Numero'],
										4 => $valor['CPC_total'],
										5 => $estadoDoc,
										6 => $nota_credito,
                                        7 => $btn_documento,
                                    );
                }
            }

            unset($filter->start);
            unset($filter->length);

            $json = array(
                                "draw"            => intval( $this->input->post('draw') ),
                                "recordsTotal"    => count($this->caja_model->getComprobanteCaja($filter, $fehcaini, $fechacierre, $idCaja)),
                                "recordsFiltered" => intval( count($this->caja_model->getComprobanteCaja($filter, $fehcaini, $fechacierre, $idCaja)) ),
                                "data"            => $lista
                        );

            echo json_encode($json);
        }

        public function datatable_cajapanel($id){
            $columnas = array(
                                0 => "",
                                1 => "CACIER_Codigo",
                                2 => "CAJA_Nombre",
                                3 => "tipCa_Descripcion"
                            );
            $idCaja = $id;
          /*   $datosCaja = $this->caja_model->getCaja($id);
            var_dump($datosCaja[0]->nombres);
            exit;   */              

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

            $filter->descripcion = $this->input->post('descripcion');
            /* var_dump($filter);
            exit; */
            $cierreInfo = $this->caja_model->getcierres($filter,$idCaja);
           
            $lista = array();
            
            if (count($cierreInfo) > 0) {
                foreach ($cierreInfo as $indice => $valor) {
                    $cierre = $valor['CACIER_Codigo'];
                    $situacion = $valor['CACIER_FlagSituacion'];
                    
                    $datosCaja = array(
                        'cierre' => $valor['CACIER_Codigo'],
                        'caja' => $valor['CAJA_Codigo'],
                        'situacion' => $valor['CACIER_FlagSituacion'],
                        'fechaapertura' => $valor['CACIER_Feapertura'],
                        'fechacierre' => $valor['CACIER_Fecierre'],
                        'cajero' => $valor['CACIER_usuario']
                    );

                    if($situacion == 1){
                        $btn_cierre = "<button type='button' onclick='CierreCaja($cierre)' class='btn btn-default' style='background-color: red; color: red' title = 'Cerrar caja'>
                                    <img src='".$this->url."/images/cerrarcaja.png' class='image-size-1b'>
                                </button>";
                        $btn_cuadre= "<button type='button' onclick='mensaje()' class='btn btn-default' title = 'recibiendo ingresos...esperando cuadre'>
                                <img src='".$this->url."/images/barloading.gif' class='image-size-1b'>
                            </button>";
                       
                    }else{
                        $btn_cierre = "<button type='button'  class='btn btn-default' title= cerrada>
                                    <img src='".$this->url."/images/delete.gif' class='image-size-1b' >
                                </button>";
                        $btn_cuadre = "<button type='button' onclick='ticketCaja(" . json_encode(json_encode($datosCaja)) . ")' class='btn btn-default' title = 'Cuadre caja'>
                                <img src='".$this->url."/images/boleto.png' class='image-size-1b'>
                        </button>";
                    }
     
                     
                    $lista[] = array(
                                        0 => $indice + 1,
                                        1 => $valor['CAJA_Nombre'],
                                        2 => $valor['CACIER_usuario'],
                                        3 => $btn_cierre,
										4 => $valor['CACIER_CAJACHICA'],
										5 => '',
										6 => '',
                                        
                                    );
                }
            }

            unset($filter->start);
            unset($filter->length);

            $json = array(
                                "draw"            => intval( $this->input->post('draw') ),
                                "recordsTotal"    => count($this->caja_model->getcierres($filter,$idCaja)),
                                "recordsFiltered" => intval( count($this->caja_model->getcierres($filter,$idCaja)) ),
                                "data"            => $lista
                        );

            echo json_encode($json);
        }


       

}       
?>