<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelo_producto extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
        public function getProducto($id)
        {
            $this->db->where('id',$id);
            $consulta=$this->db->get('tbl_producto');
            return $consulta->result_array();
        }
        public function ListaProductos($inicio,$tam_pag)
        {
            $this->db->limit($inicio,$tam_pag);
            $consulta = $this->db->get('tbl_producto');
            return $consulta->result_array();
        }
        
        public function ListaProductosByCat($categoria,$inicio,$tam_pag)
        {
            $this->db->limit($inicio,$tam_pag);
            if(is_array($categoria))
            {
                $string='(';
                foreach($categoria as $id)
                {
                    $string.= $id.',';
                }
            }
            else
            $consulta=$this->db->query('SELECT * FROM tbl_producto WHERE tbl_categoria_id in '.$categoria.' AND selected = 1');
            return $consulta->result_array();
        }
        public function SelectedPerro()
        {
         $consulta=$this->db->query('SELECT * FROM tbl_producto WHERE tbl_categoria_id in (1,2,3,4,5,6,7,8,9) AND selected = 1');
         return $consulta->result_array();
        }
         public function SelectedGato()
        {
         $consulta=$this->db->query('SELECT * FROM tbl_producto WHERE tbl_categoria_id in (10,11,12,13,14,15,16,17,18) AND selected = 1');
         return $consulta->result_array();
        }
        
        public function TotalProductos()
        {
            return $this->db->count_all('tbl_producto');
        }
        public function TotalProductosByCat($categoria)
        {
            $consulta = $this->db->query('SELECT count(*) as cuenta FROM tbl_producto where tbl_categoria_id = '.$categoria);
            return $consulta->row('cuenta');
        }
        public function InsertarProducto($datos)
        {
            $this->db->insert('tbl_producto',$datos);
        }
        public function BorrarProducto($id)
        {
            $this->db->delete('tbl_producto',$id);
        }
        public function ModificarProducto($id,$datos)
        {
            $this->db->where('id',$id);
            $this->db->update('tbl_producto',$datos);
        }
}
