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
            'precio'     => $this->Modelo_producto->PrecioProducto($id)
          );
          
          $this->carro->Add($articulo);
        }
        
        public function Borrar()
        {
            
        }
        
        public function Vaciar()
        {
            
        }
        
        

}


