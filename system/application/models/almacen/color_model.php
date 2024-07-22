<?php

class Color_model extends Model{
    var $somevar;
	
	function __construct(){
            parent::__construct();
            $this->load->database();
            $this->somevar ['compania'] = $this->session->userdata('compania');
			$this->load->model('maestros/companiaconfiguracion_model');
	}

    public function insertar_color($filter){
        $this->db->insert("cji_color", (array) $filter);
        return $this->db->insert_id();
    }

    public function getTable($filter = null) {
        $this->db->select("*");
        $this->db->from("cji_color");
        $this->db->where("COLOR_FlafEstado", "1");
        
        if ($filter->length !== null && $filter->start !== null) {
            $this->db->limit($filter->length, $filter->start);
        }
        $query = $this->db->get();
       
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }

        
    }

    public function getColor($id){
        $this->db->select("*");
        $this->db->from("cji_color");
        $this->db->where('COLOR_id', $id);
        
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function actualizar_color($color, $filter){
        $this->db->where('COLOR_id',$color);
        return $this->db->update('cji_color', $filter);
    }

    public function deshabilitar_color($color, $filter){
        $this->db->where('COLOR_id',$color);
        return $this->db->update('cji_color', $filter);
    }

    public function obtenerUltimoCodigoUsuario() {
        $this->db->select('COLOR_codInterno	');
        $this->db->from('cji_color');
        $this->db->order_by('COLOR_id', 'DESC');
        $this->db->limit(5);
    
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->COLOR_codInterno;
        } else {
            // No se encontraron registros
            return null;
        }
    }

    public function verificarCodigoUsuarioRepetido($codigo) {
        $this->db->select('COLOR_codInterno	');
        $this->db->from('cji_color');
        $this->db->where('COLOR_codInterno	', $codigo);
        $query = $this->db->get();
    
        return $query->num_rows() > 0;
    }

    public function buscar_color($search) {
        $search = $this->db->escape_str($search);
    
        $where = "(COLOR_Nombre LIKE '%$search%' OR COLOR_codInterno LIKE '%$search%') AND COLOR_FlafEstado = 1";
    
        $sql = "SELECT COLOR_codInterno, COLOR_Nombre FROM cji_color WHERE $where LIMIT 10";
    
        $query = $this->db->query($sql);
    
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
    
    
    
}

?>