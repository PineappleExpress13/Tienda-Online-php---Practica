<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelo_pedido extends CI_Model {


    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('Carro');
    }
    
    public function GeneraPedido($id)
    {
        $this->load->model('Modelo_usuario');
        
        $idPedido=1;
        $codigoPedido=100;
        $consulta=$this->db->query('SELECT max(id)id FROM `tbl_pedido`');
        foreach($consulta->result_array() as $fila)
        {
            $idPedido=$fila['id']+1;
        }
        $codigoPedido=$codigoPedido+$idPedido;
        //date('Y-m-d');
        $usuario=$this->Modelo_usuario->getUser($id);
        $datos = array(
            'id'        => $idPedido,
            'codigo'    => $codigoPedido,
            'fecha'     => date('Y-m-d'),
            'estado'    => 'P',
            'id_usuario'=> $id,
            'direccion' => $usuario['direccion'],
            'dni'       => $usuario['dni'],
            'nombre'    => $usuario['nombre']);
        $this->db->insert('tbl_pedido',$datos);
        $this->session->set_userdata(array(
            'pedido' => true,
            'id_pedido' => $idPedido
        ));
    }
    
    public function AddLineas()
    {
        $this->db->where('id_pedido',$_SESSION['id_pedido']);
        $this->db->delete('tbl_linea');
        $idLinea=1;
        $codigoLinea=100;
        $consulta=$this->db->query('SELECT max(id)id FROM `tbl_linea`');
        foreach($consulta->result_array() as $fila)
        {
            $idLinea=$fila['id']+1;
        }
        $codigoLinea=$codigoLinea+$idLinea;
        foreach($this->carro->get_content() as  $producto)
        {
            $datos = array(
                'id'        => $idLinea,
                'codigo'    => $codigoLinea,
                'id_pedido' => $_SESSION['id_pedido'],
                'subtotal'  => $producto['total'],
                'iva'       => 10,
                'total'     => $producto['total']*10,
                'id_producto' => $producto['id'],
                'cantidad'  =>$producto['cantidad']);
            $this->db->insert('tbl_linea',$datos);
            $idLinea++;
            $codigoLinea++;
        }
        
    }
        
        
    

}
