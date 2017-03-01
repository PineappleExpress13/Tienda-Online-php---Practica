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
            if(isset($_SESSION['pedido']))
            {
                $this->AnularPedido($_SESSION['id_pedido']);
                $this->session->unset_userdata('pedido');
            }
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
        
        public function Pedido()
        {
            $this->load->model('Modelo_pedido');
            if(isset($_SESSION['login']))
            {
                if(!isset($_SESSION['pedido']) || $_SESSION['pedido']!=true)
                {
                    $this->Modelo_pedido->GeneraPedido($_SESSION['id']);
                }
                else
                {
                    
                }
                $this->Modelo_pedido->AddLineas();
                redirect(site_url('/Login/Mispedidos'));
            }
            else
            {
               redirect(site_url('/Login/Registro')); 
            }
        }
        
        public function ConfirmarPedido()
        {
            $this->session->unset_userdata('pedido');
        }
        
        public function PDF($id)
        {
           $this->load->model('Modelo_pedido');
           $this->Modelo_pedido->GenerarPDF($id);
        }
        
        public function AnularPedido($id)
        {
            $this->load->model('Modelo_pedido');
            $this->Modelo_pedido->BorrarPedido($id);
            if(isset($_SESSION['pedido']) && $_SESSION['id_pedido'] == $id)
            {
                $this->session->unset_userdata('pedido');
                $this->carro->destroy();
            }
            redirect(site_url('/Login/Mispedidos'));
        }
        


}


