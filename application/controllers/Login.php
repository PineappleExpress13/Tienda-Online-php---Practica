<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'form'));
		$this->load->model('Modelo_login');
		$this->load->library(array('form_validation', 'session'));
	}
        
        public function Log()
        {
          $email = $this->input->post('usuario');
          $password = $this->input->post('password');
          $this->Modelo_login->Login($email,$password);
          
        }
        
        public function Logout()
        {
          $this->Modelo_login->Logout();
        }
        
        public function Registro()
        {
            $this->load->view('vista_cabecera');
            $this->load->view('Vista_registro');
            $this->load->view('Vista_pie');
        }
        
        public function Registrar()
        {
            
        }
}