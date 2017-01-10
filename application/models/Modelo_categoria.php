<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelo_categoria extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
        
        public function ListaCategorias($inicio,$tam_pag)
        {
            $this->db->limit($inicio,$tam_pag);
            $consulta = $this->db->get('tbl_categoria');
            return $consulta->result_array();
        }
        
        public function TotalCategorias()
        {
            return $this->db->count_all('tbl_categoria');
        }
        
        public function InsertarCategoria($datos)
        {
            $this->db->insert('tbl_categoria',$datos);
        }
        public function BorrarCategoria($id)
        {
            $this->db->delete('tbl_categoria',$id);
        }
        public function ModificarCategoria($id,$datos)
        {
            $this->db->where('id',$id);
            $this->db->update('tbl_cagetoria',$datos);
        }
}


