<?php
 class Detalle_caja extends Controller{

    public function __construct(){
        parent::__construct();

        $this->load->helper('form');
        $this->load->helper('date');
        $this->load->helper('my_permiso');
        
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

    public function detalle($cierre){
    
        $this->layout->view('tesoreria/detalle_caja_index',$cierre);
    }
 }


?>