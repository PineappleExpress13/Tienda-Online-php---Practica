<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelo_usuario extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
        
        public function Registrar($datos)
        {
            $this->db->insert('tbl_usuario',$datos);
        }
        
        public function Baja($id)
        {
            $this->db->where('id',$id);
            $this->db->update('tbl_usuario',array('alive'=>'N'));
        }
        
        public function ModificarUsuario($id,$datos)
        {
            $this->db->where('id',$id);
            $this->db->update('tbl_usuario',$datos);
        }
        
        //todo
        public function RecuperarPass($id)
        {
            
        }
        
}
