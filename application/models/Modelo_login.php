<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelo_login extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

        public function Login($user,$password)
        {
            $query=$this->db->get_where('tbl_usuario',array(
                'correo'=> $user,
                'password'=> sha1($password)));
            
            if($fila = $query->row_array())
            {
                $data = array(
                  'login' => TRUE,
                  'id' => $fila['id']
                );
                $this->session->set_userdata($data);
                return TRUE;
            }
            else
                redirect(base_url());
            return false;
        }
        
        public function Logout ()
        {
            $this->session->unset_userdata('login');
            redirect(base_url());
        }
        
        public function Registrar($datos)
        {
            $this->db->insert('tbl_usuario', $datos);
            redirect(base_url());
            
        }
         public function ListaProvincias()
        {
           $consulta =  $this->db->get('tbl_provincias');
           $consulta= $consulta->result_array();
           $datos=array('-1'=>'');
           foreach($consulta as $dato)
           {
               array_push($datos,$dato['nombre']);
           }
           return $datos;
        }
        
        public function ModificarUsuario($id,$datos)
        {
            $this->db->where('id',$id);
            $this->db->update('tbl_usuario',$datos);
        }
        
        public function Baja($id)
        {
            $this->db->where('id',$id);
            $this->db->update('tbl_usuario',array('alive'=>'N'));
        }
        
        public function Verificar($mail)
        {
           $this->db->where('correo',$mail);
           $query=$this->db->get('tbl_usuario');
           if($fila = $query->row_array())
           {
               return $fila['id'];
           }
           else
               return false;
        }
}