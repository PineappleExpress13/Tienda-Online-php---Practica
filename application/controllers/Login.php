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
           $this->NormasRegistro();
            if(!$this->form_validation->run())
            {
            $this->load->view('vista_cabecera');
            $this->load->view('Vista_registro');
            $this->load->view('Vista_pie');
            }
        }
        
        public function NormasRegistro()
        {
            //Usuario
             $this->form_validation->set_rules('usuario','usuario','required|is_unique',
                    array('required'=>'Debe introducir un usuario',
                        'is_unique'=>'El usuario ya existe'));
             //Mail
             $this->form_validation->set_rules('mail','mail','required|valid_email|is_unique',
                    array('required'=>'Debe introducir un mail',
                        'valid_email'=>'El mail debe tener un formato valido',
                        'is_unique'=>'Este mail ya esta registrado'));
             //Nombre
             $this->form_validation->set_rules('nombre','nombre','required',
                    array('required'=>'Debe introducir un nombre'));
             //Apellido
             $this->form_validation->set_rules('apellidos','apellido','required',
                    array('required'=>'Debe introducir un apellido'));
             //DNI
             $this->form_validation->set_rules('dni','dni','required',
                    array('required'=>'Debe introducir un dni'));
             //direccion
             $this->form_validation->set_rules('direccion','direccion','required',
                    array('required'=>'Debe introducir una dirección'));
             //CP
             $this->form_validation->set_rules('cp','cp','required',
                    array('required'=>'Debe introducir un código postal'));
             //Contraseña
             $this->form_validation->set_rules('pass','pass','required',
                    array('required'=>'Debe introducir una contraseña'));
             //ReContraseña
             $this->form_validation->set_rules('conf_pass','pass','required|matches[pass]',
                    array('required'=>'Debe introducir el campo',
                        'matches' => 'Deben coincidir las contraseñas'));
             
             
             
        }
        
}