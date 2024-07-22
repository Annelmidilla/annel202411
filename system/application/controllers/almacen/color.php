<?php
require_once 'system/application/libraries/PHPExcel/IOFactory.php';

class Color extends Controller{
    private $url;

    public function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->helper('util');
        $this->load->helper('utf_helper');
        
        $this->load->library('form_validation');
        $this->load->library('pagination');
        $this->load->library('html');
        $this->load->library('table');
        $this->load->library('lib_props');

        $this->load->model('almacen/atributo_model');
        $this->load->model('almacen/almacen_model');
        $this->load->model('almacen/almacenproducto_model');

        $this->load->model('almacen/fabricante_model');
        $this->load->model('almacen/familia_model');
        $this->load->model('almacen/marca_model');
        $this->load->model('almacen/color_model');
        
        $this->load->model('almacen/guiarem_model');
        $this->load->model('almacen/guiatrans_model');
        
        $this->load->model('almacen/producto_model');
        $this->load->model('almacen/productounidad_model');
        $this->load->model('almacen/productoprecio_model');
        $this->load->model('almacen/productopublicacion_model');
        $this->load->model('almacen/unidadmedida_model');

        $this->load->model('almacen/lote_model');
        $this->load->model('almacen/loteprorrateo_model');
        
        $this->load->model('almacen/serie_model');
        $this->load->model('almacen/seriemov_model');
        $this->load->model('almacen/seriedocumento_model');
        
        $this->load->model('almacen/plantilla_model');
        $this->load->model('almacen/tipoproducto_model');

        $this->load->model('compras/proveedor_model');
        
        $this->load->model('maestros/empresa_model');
        $this->load->model('maestros/moneda_model');
        $this->load->model('maestros/persona_model');
        $this->load->model('maestros/moneda_model');
        $this->load->model('maestros/companiaconfiguracion_model');
        $this->load->model('maestros/emprestablecimiento_model');
        $this->load->model('maestros/tipocambio_model');
        $this->load->model('maestros/categoriapublicacion_model');
        
        $this->load->model('ventas/tipocliente_model');
        $this->load->model('ventas/cliente_model');
        $this->load->model('seguridad/usuario_model');
        
        $this->somevar['user'] = $this->session->userdata('user');
        $this->somevar['compania'] = $this->session->userdata('compania');
        $this->somevar['establec'] = $this->session->userdata('establec');

        $this->url = base_url();
    }

    public function index(){
        $this->layout->view('almacen/color_index');
    }

    
    public function datatable_color(){

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
        $filter->compania = $this->compania;
        $colorInfo = $this->color_model->getTable($filter);
        $lista = array();
        
        if (count($colorInfo) > 0) {
            foreach ($colorInfo as $indice => $valor) {

                $btn_editar= "<button type='button' onclick='editar($valor->COLOR_id)' class='btn btn-default'>
                                <img src='".$this->url."/images/edit.png' class='image-size-1b'>
                            </button>";

                $btn_eliminar = "<button type='button' onclick='deshabilitar($valor->COLOR_id)' class='btn btn-default'>
                            <img src='".$this->url."/images/eliminar.png' class='image-size-1b'>
                        </button>";

                $lista[] = array(
                                    0 => $indice + 1,
                                    1 => $valor->COLOR_codInterno,
                                    2 => $valor->COLOR_Nombre,
                                    3 => $btn_editar,
                                    4 => $btn_eliminar,

                                );
            }
        }

        unset($filter->start);
        unset($filter->length);

        $json = array(
                            "draw"            => intval( $this->input->post('draw') ),
/*                                 "recordsTotal"    => count($this->cajacierre_model->getTable()),
*/                                "recordsFiltered" => intval( count($this->color_model->getTable()) ),
                            "data"            => $lista
                    );

        echo json_encode($json);
    }

    public function guardar_registro(){
        $color = $this->input->post("idcolor");
        $codigo_usuario = $this->input->post("Codigocolor");
        $nombre_color = $this->input->post("txtColor");

        /*RGB*/
        $red = $this->input->post("red");
        $green = $this->input->post("green");
        $blue = $this->input->post("blue");
/* 
        if ($this->color_model->verificarCodigoUsuarioRepetido($codigo_usuario)) {
            $json = array("result" => "error", "message" => "El código de usuario ya existe.");
        } else {
         } */
            $filter = new stdClass();
            $filter->COLOR_codInterno = $codigo_usuario;
            $filter->COLOR_Nombre = strtoupper($nombre_color);
            $filter->COLOR_fecha = date("Y-m-d");
            $filter->COLOR_FlafEstado = "1";
            $filter->COLOR_red = $red;
            $filter->COLOR_green = $green;
            $filter->COLOR_blue = $blue;
            
    
            if ($color != ""){
                $filter->COLOR_id = $color;
                $result = $this->color_model->actualizar_color($color, $filter);
            } else {
                $result = $this->color_model->insertar_color($filter);
            }
    
            if ($result) {
                $json = array("result" => "success");
            } else {
                $json = array("result" => "error", "message" => "Error al guardar el registro.");
            }
        
    
        echo json_encode($json);
    }
    
    public function getColor($id){

        if (empty($id)) {
            echo json_encode(array("success" => false, "message" => "El ID de caja de cierre no puede estar vacío."));
            return;
        }

        $colorInfo= $this->color_model->getColor($id);
        if ($colorInfo) {
            echo json_encode(array("success" => true, "data" => $colorInfo));
        } else {
            echo json_encode(array("success" => false, "message" => "No se encontraron datos para el ID proporcionado."));
        }
    }

    public function deshabilitar_color($id){

        if (empty($id)) {
            echo json_encode(array("success" => false, "message" => "El ID de caja de cierre no puede estar vacío."));
            return;
        }
        $filter = new stdClass();
        $filter->COLOR_FlafEstado = "0"; 
        $colorInfo= $this->color_model->deshabilitar_color($id, $filter);
        if ($colorInfo) {
            echo json_encode(array("success" => true, "data" => $colorInfo));
        } else {
            echo json_encode(array("success" => false, "message" => "No se encontraron datos para el ID proporcionado."));
        }
    }

    /* public function obtenerUltimocodigo(){
        $colorInfo = $this->color_model->obtenerUltimoCodigoUsuario();
        
        if ($colorInfo) {
            $siguienteCorrelativo = $this->generarSiguienteCorrelativo($colorInfo);
            echo json_encode(['success' => true, 'data' => ['modeloInfo' => $colorInfo, 'siguienteCorrelativo' => $siguienteCorrelativo]]);
        } else {
            echo json_encode(['success' => false, 'message' => 'No se encontraron datos para el ID proporcionado.']);
        }
    } */
    
    
    
   /*  private function generarSiguienteCorrelativo($ultimoCodigo) {
        if (!$ultimoCodigo) {
            return '01';
        }
    
        $numero = intval($ultimoCodigo) + 1;
    
        $siguienteCorrelativo = str_pad($numero, 2, '0', STR_PAD_LEFT);
      
        return $siguienteCorrelativo;
    } */

    public function obtenerColoresAutocompletado() {
        $term = $this->input->post('term');
        $datosColor = $this->color_model->buscar_color($term);
        $result = array();
    
        if ($datosColor != NULL) {
            foreach ($datosColor as $key => $valor) {
                $descripcion = $valor->COLOR_Nombre;
                $codigo = $valor->COLOR_codInterno;
                $result[] = array("descripcion" => $descripcion . ' - ' . $codigo , "codigo" => $codigo);
            }
        }
    
        echo json_encode($result);
    }
    

}


?>