<?php
class Bancocta_Model extends Model{

    protected $_name = "cji_bancocta";

    public function  __construct(){
        parent::__construct();
    }

    ########################
    ##### FUNCTIONS NEW
    ########################

        public function getCtasEmpresa($filter = NULL){
            $limit = ( isset($filter->start) && isset($filter->length) ) ? " LIMIT $filter->start, $filter->length " : "";
            $order = ( isset($filter->order) && isset($filter->dir) ) ? "ORDER BY $filter->order $filter->dir " : "";

            $where = '';

            if (isset($filter->empresa) && $filter->empresa != '' && $filter->empresa != 0)
                $where .= " AND ce.EMPRE_Codigo = $filter->empresa";

            if (isset($filter->persona) && $filter->persona != '' && $filter->persona != 0)
                $where .= " AND ce.PERSP_Codigo = $filter->persona";

            if (isset($filter->banco) && $filter->banco != '')
                $where .= " AND ce.BANP_Codigo LIKE '%$filter->banco%'";

            if (isset($filter->moneda) && $filter->moneda != '')
                $where .= " AND ce.MONEDA_Codigo LIKE '%$filter->moneda%'";

            if (isset($filter->tipo_cuenta) && $filter->tipo_cuenta != '')
                $where .= " AND ce.CUENT_TipoCuenta LIKE '%$filter->tipo_cuenta%'";

            $sql = "SELECT ce.*, b.BANC_Nombre, b.BANC_Siglas, m.MONED_Simbolo, m.MONED_Descripcion
                            FROM cji_cuentasempresas ce
                            INNER JOIN cji_banco b ON b.BANP_Codigo = ce.BANP_Codigo
                            INNER JOIN cji_moneda m ON m.MONED_Codigo = ce.MONED_Codigo
                            WHERE ce.CUENT_FlagEstado LIKE '1'
                            $where
                            $order $limit
                    ";

            $query = $this->db->query($sql);
            if ($query->num_rows > 0)
                return $query->result();
            else
                return NULL;
        }

        public function getCtaEmpresa($cuenta){
            $sql = "SELECT ce.*, b.BANC_Nombre, b.BANC_Siglas, m.MONED_Simbolo, m.MONED_Descripcion
                        FROM cji_cuentasempresas ce
                        INNER JOIN cji_banco b ON b.BANP_Codigo = ce.BANP_Codigo
                        INNER JOIN cji_moneda m ON m.MONED_Codigo = ce.MONED_Codigo
                        WHERE ce.CUENT_Codigo = '$cuenta'
                ";
            $query = $this->db->query($sql);

            if ($query->num_rows > 0)
                return $query->result();
            else
                return NULL;
        }

        public function insertar_CtaBancaria($filter){
            $this->db->insert("cji_cuentasempresas", (array) $filter);
            return $this->db->insert_id();
        }

        public function actualizar_CtaBancaria($cta, $filter){
            $this->db->where('CUENT_Codigo',$cta);
            return $this->db->update('cji_cuentasempresas', $filter);
        }



    ########################
    ##### FUNCTIONS OLDS
    ########################

    public function seleccionar($banco, $default="")
    {
        $nombre_defecto = $default==""?":: Seleccione ::":$default;
        $arreglo = array(''=>$nombre_defecto);
        foreach($this->listar($banco) as $indice=>$valor)
        {
            $indice1   = $valor->CTAP_Codigo;
            $valor1    = $valor->CTAC_Nro.' - '.($valor->CTAC_Nro=='S' ? 'SOLES' : 'DOLARES');
            $arreglo[$indice1] = $valor1;
        }
        return $arreglo;
    }
    public function listar($banco)
    {   $where = array("CTAC_FlagEstado"=>"1", "BANP_Codigo"=>$banco);
        
        $query = $this->db
                ->where($where)
                ->get('cji_bancocta');
        if($query->num_rows>0){
          return $query->result();
        }
    }
    public function obtener($cta)
    {   $where = array("CTAP_Codigo"=>$cta);
        
        $query = $this->db
                ->where($where)
                ->get('cji_bancocta');
        if($query->num_rows>0){
          return $query->result();
        }
    }
    
   
}
?>