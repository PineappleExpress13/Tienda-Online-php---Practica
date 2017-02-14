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
          redirect(site_url());
          
        }
        
        public function Logout()
        {
          $this->Modelo_login->Logout();
        }
        
        public function Registro()
        {
            $this->load->view('vista_cabecera');
            $this->load->view('Vista_registro',array(
                'provincias' => $this->Modelo_login->ListaProvincias()));
            $this->load->view('Vista_pie');
        }
        
        public function Recuperar()
        {
            if(empty($_POST))
            {
                $this->load->view('vista_cabecera');
                $this->load->view('Vista_recuperar');
                $this->load->view('Vista_pie');
            }
            else if(!$this->Modelo_login->Verificar($this->input->post('mail')))
            {
                $this->load->view('vista_cabecera');
                $this->load->view('Vista_recuperar',array(
                    'fallo' => TRUE
                ));
                $this->load->view('Vista_pie');
            }
            else if($this->Modelo_login->Verificar($this->input->post('mail')))
            {
                $this->load->library('email');
                
                $config['mailpath'] = '/usr/sbin/sendmail';
                $config['charset'] = 'utf-8';
                $config['wordwrap'] = TRUE;
                $config['protocol'] = 'smtp';
                $config['smtp_host'] = 'mail.iessansebastian.com';
                $config['smtp_user'] = 'aula4@iessansebastian.com';
                $config['mailtype'] = 'html';
                $config['smtp_pass'] = 'daw2alumno';
                
                $this->email->initialize($config);
                
                $this->email->clear();
                $this->email->from('aula4@iessansebastian.com');
                $this->email->to('josuepinarodriguez@gmail.com');
                $this->email->subject('Probando');
                $this->email->message('Testing the email class.');

                if($this->email->send())
                {
                    echo ' se ha enviado';
                }
                else
                {
                    echo "error";
                }
                $this->email->print_debugger(array('headers','body','subject'));
            }
        }
        
        public function Registrar()
        {
           $this->NormasRegistro();
            if(!$this->form_validation->run())
            {
                $this->load->view('vista_cabecera');
                $this->load->view('Vista_registro',array(
                    'provincias' => $this->Modelo_login->ListaProvincias()));
                $this->load->view('Vista_pie');
            }
            else
            {
              $datos =array(
                  'nombre_usuario'  =>  $this->input->post('usuario'),
                  'password'        =>  sha1($this->input->post('pass')),
                  'correo'          =>  $this->input->post('mail'),
                  'nombre'          =>  $this->input->post('nombre'),
                  'apellidos'       =>  $this->input->post('apellidos'),
                  'dni'             =>  $this->input->post('dni'),
                  'direccion'       =>  $this->input->post('direccion'),
                  'cp'              =>  $this->input->post('cp'),
                  'provincia'       =>  $this->input->post('provincia'),
                  'tipo'            => 'U',
                  'alive'           => 'S');
              
              $this->Modelo_login->Registrar($datos);
            }
        }

        public function NormasRegistro()
        {
            //Usuario
             $this->form_validation->set_rules('usuario','usuario','required',
                    array('required'=>'Debe introducir un usuario',
                        'is_unique'=>'El usuario ya existe'));
             //Mail
             $this->form_validation->set_rules('mail','mail','required|valid_email',
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
             $this->form_validation->set_rules('dni','dni','required|valid_dni',
                    array('required'=>'Debe introducir un dni',
                        'valid_dni'=>'Debe introducir un dni valido'));
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