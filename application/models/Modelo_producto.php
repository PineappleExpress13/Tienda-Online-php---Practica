<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelo_producto extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
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
            $consulta=$this->db->get_where('tbl_producto',array('tbl_categoria_id'=>$categoria));
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
