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
                'password'=> $password));
            
            if($fila = $query->row_array())
            {
                $data = array(
                  'login' => TRUE,
                );
                $this->session->set_userdata($data);
                return TRUE;
            }
            else
            return false;
            redirect(base_url());
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
        
        
        }