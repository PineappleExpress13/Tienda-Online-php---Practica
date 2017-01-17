<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function Producto($id)
	{
            $this->load->model('Modelo_producto');
            $this->load->view('Vista_cabecera');
            $this->load->view('Vista_producto',array(
                'producto'=>$this->Modelo_producto->getProducto($id)
            ));
            $this->load->view('Vista_pie');
	}
        public function Categoria($id)
        {
            $this->load->model('Modelo_producto');
            $this->load->view('Vista_cabecera');
            $this->load->view('Vista_categoria',array(
                    'productos' => $this->Modelo_producto->ListaProductosByCat($id,0,8)));
            //$this->load->view('Vista_pie');
        }
        
        
}
