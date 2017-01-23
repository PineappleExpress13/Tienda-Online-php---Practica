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
            $this->Pagination_Conf($id);
            $page=($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
            $this->load->model('Modelo_producto');
            $this->load->view('Vista_cabecera');
            $this->load->view('Vista_categoria',array(
                    'productos' => $this->Modelo_producto->ListaProductosByCat($id,$page,$this->pagination->per_page)));
            //$this->load->view('Vista_pie');
        }
        
        public function Pagination_Conf($categoria)
        {
            $this->load->library('pagination');
            $this->load->model('Modelo_producto');
            
            $config['base_url'] = site_url('/Productos/Categoria/'.$categoria);
            $config['total_rows'] = $this->Modelo_producto->TotalProductosByCat($categoria);
            $config['per_page'] = 4;
            $config['uri_segment'] = 4;
            $config['num_links'] = 2;
            $config['full_tag_open'] = '<div class="aa-product-catg-pagination">
              <nav>
                <ul class="pagination">';
            $config['full_tag_close'] = '  </ul></nav></div>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['first_link'] = '&lt;&lt;';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_link'] = '&gt;&gt;';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['next_link'] = '&gt;';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['prev_link'] = '&lt;';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li><a href="">';
            $config['cur_tag_close'] = '</a></li>';

            $this->pagination->initialize($config);
        }
        
}
