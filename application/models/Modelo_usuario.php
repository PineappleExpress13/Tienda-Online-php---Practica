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
        
        public function RecuperCuenta($mail)
        {
             $this->load->library('email');
             
            $this->db->where('correo',$mail);
            $consulta=$this->db->get('tbl_usuario');
            foreach($consulta->result_array() as $dato)
            {
                   $id = $dato['id'];
            }
            
                
                $config['mailpath'] = '/usr/sbin/sendmail';
                $config['charset'] = 'utf-8';
                $config['wordwrap'] = TRUE;
                $config['protocol'] = 'smtp';
                $config['smtp_host'] = 'mail.iessansebastian.com';
                $config['smtp_user'] = 'aula4@iessansebastian.com';
                $config['smtp_pass']='dawanyo2017';
                $config['mailtype'] = 'html';
                $this->email->initialize($config);
                
                $html='<h3>Si usted no ha solicitado este email no preste atención al enlace a continuación</h3>';
                $html.='<p>Para recuperar su contraseña haga click en el siguiente <a href="'. site_url('Login/RecuperarCuenta/').$id.'">Enlace</a>';
                
                $this->email->clear();
                $this->email->from('aula4@iessansebastian.com');
                $this->email->to('josuepinarodriguez@gmail.com');
                $this->email->subject('Recuperación de contraseña de wokiki');
                $this->email->message($html);
                $this->email->send();
 
        }
        public function CambiarPass($id,$password)
        {
            $password=sha1($password);
            $this->db->where('id',$id);
            if($this->db->update('tbl_usuario',array(
                'password' => $password)));
        }
        
        public function getUser($id)
        {
            $this->db->where('id',$id);
            $consulta=$this->db->get('tbl_usuario');
            foreach($consulta->result_array() as $dato)
            {
                   $usuario =  array(
                    'nombre' => $dato['nombre'],
                    'direccion' => $dato['direccion'],
                    'dni' => $dato['dni']
                );
            }
            return $usuario;
        
        }
}
