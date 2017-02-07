<?php
class Carrito extends CI_Controller {

public function __construct()
	{
		parent::__construct();
                $this->load->Library('Carro');
               
        }

        public function Add($id,$cantidad)
        {
          $this->load->model('Modelo_producto');
          $articulo=array(
            'id'         => $id,
            'cantidad'   => $cantidad,
            'nombre'     => $this->Modelo_producto->NombreProducto($id),
            'imagen'     => $this->Modelo_producto->ImagenProducto($id),
            'precio'     => $this->Modelo_producto->PrecioProducto($id)
          );
          
          $this->carro->Add($articulo);
          redirect(site_url('/Carrito/Index'));
        }
        
        public function Borrar($id)
        {
            $this->carro->remove_producto($id);
            redirect(site_url('/Carrito/Index'));
        }
        
        public function Vaciar()
        {
            $this->carro->destroy();
            redirect(site_url('/Carrito/Index'));
            
        }
        
        public function Index()
        {
            $this->load->view('Vista_cabecera');
            $this->load->view('Vista_carrito');
            $this->load->view('Vista_pie');
        }

        public function UnoMas($id)
        {
            $this->carro->UnoMas($id);
            redirect(site_url('/Carrito/Index'));
        }
        
        public function UnoMenos($id)
        {
            $this->carro->UnoMenos($id);
            redirect(site_url('/Carrito/Index'));
        }
        
        

}


