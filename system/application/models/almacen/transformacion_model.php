<?php
    class Transformacion_model extends Model{

        var $somevar;
        public $compania = NULL;
    
        public function __construct()
        {
            parent::__construct();
            #$this->load->database();
            $this->compania = $this->session->userdata('compania');
            $this->somevar['idcompania'] = $this->session->userdata('idcompania');
        }

        public function listar_combos($filter) {
           
            $comp = $this->compania = $this->session->userdata('compania');
            $establecimiento = $this->somevar['establec'];
        
            // Iniciar la consulta con Active Record
            $this->db->select('p.*, ap.ALMPROD_Stock, ap.ALMAC_Codigo, pc.PROD_Codigo_combo');
            $this->db->from('cji_producto p');
            $this->db->join('cji_productocombo pc', 'pc.PROD_Codigo_combo = p.PROD_Codigo', 'left');
            $this->db->join('cji_almacenproducto ap', 'ap.PROD_Codigo = p.PROD_Codigo', 'left');
            $this->db->where('pc.PRODCB_Codigo IS NOT NULL');
            $this->db->where('ap.COMPP_Codigo', $comp);
            $this->db->group_by('pc.PROD_Codigo_combo');
            $this->db->order_by('p.PROD_FechaRegistro', 'desc');
        
            // Aplicar filtros
            if (isset($filter->combo) && $filter->combo !== '') {
                $this->db->like('p.PROD_Nombre', $filter->combo, 'both');
            }
        
            if (isset($filter->fechai) && $filter->fechai !== '' && isset($filter->fechaf) && $filter->fechaf !== '') {
                $this->db->where('p.PROD_FechaRegistro >=', $filter->fechai . ' 00:00:00');
                $this->db->where('p.PROD_FechaRegistro <=', $filter->fechaf . ' 23:59:59');
            }
        
            // Aplicar orden y límite
            if (isset($filter->order) && isset($filter->dir)) {
                $this->db->order_by($filter->order, $filter->dir);
            }
        
            if (isset($filter->length) && isset($filter->start)) {
                $this->db->limit($filter->length, $filter->start);
            }
        
            // Ejecutar la consulta
            $query = $this->db->get();
        
            // Verificar y retornar resultados
            if ($query->num_rows() > 0) {
                return $query->result_array();
            } else {
                return array();
            }
        }
        

        public function listar_articulos_combo($filter= null ,$prod_codigo) {
            $compania_almacen = $this->session->userdata('compania');
            $this->db->select('*');
            $this->db->from('cji_producto p');
            $this->db->join('cji_productocombo pc', 'pc.PROD_Codigo = p.PROD_Codigo', 'left');
            // $this->db->join('cji_almacenproducto ap', 'ap.PROD_Codigo = p.PROD_Codigo', 'left');
            $this->db->where('pc.PROD_Codigo_combo', $prod_codigo);
            // $this->db->where('ap.COMPP_Codigo', $compania_almacen);
        
            // Añadir cláusula ORDER BY
            $this->db->order_by('p.PROD_Codigo', 'ASC'); // Cambia 'ASC' a 'DESC' si necesitas orden descendente
        
            // Aplicar paginación si se especifica
            if ($filter->length !== null && $filter->start !== null) {
                $this->db->limit($filter->length, $filter->start);
            }
        
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                return $query->result_array();
            } else {
                return array();
            }
        }
        

        public function validar_si_tiene_almacen($prods, $companiaa){
           
            $this->db->select('*');
            $this->db->from('cji_almacenproducto almp');
            $this->db->where_in('almp.PROD_Codigo', $prods);
            $this->db->where('almp.COMPP_Codigo', $companiaa);

            $query = $this->db->get();
			if ($query->num_rows() > 0) {
				return $query->result_array();
			} else {
				return array();
			}
        }

        public function asignar_almacen($data){
           
            $this->db->insert("cji_almacenproducto", $data);
            return $this->db->insert_id();

        }

        public function registrarCantidad($filter){
            $this->db->insert("cji_combocantidad", (array) $filter);
            return $this->db->insert_id();
        }

        public function getProductoC($codigo){
            $this->db->select('*');
            $this->db->from('cji_producto p');
            $this->db->join('cji_productocombo pc','pc.PROD_Codigo = p.PROD_Codigo','left');
            $this->db->where('p.PROD_Codigo', $codigo);

            $query = $this->db->get();
		
			if ($query->num_rows() > 0) {
				return $query->result_array();
			} else {
				return array();
			}
        }
    }



?>