<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelo_pedido extends CI_Model {


    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('Carro');
        $this->load->helper('url');
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
            $iva=(10*$producto['total'])/100;
            $datos = array(
                'id'        => $idLinea,
                'codigo'    => $codigoLinea,
                'id_pedido' => $_SESSION['id_pedido'],
                'subtotal'  => $producto['total'],
                'iva'       => 10,
                'total'     => $producto['total']+$iva,
                'id_producto' => $producto['id'],
                'cantidad'  =>$producto['cantidad']);
            $this->db->insert('tbl_linea',$datos);
            $idLinea++;
            $codigoLinea++;
        }
        
    }
    
    public function GenerarPDF()
    {
        $total=0;
        $this->load->library('fpdf');
        $pdf = new FPDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',11);
        
        //Traemos la tabla pedido
        $this->db->where('id',$_SESSION['id_pedido']);
        $consulta=$this->db->get('tbl_pedido');
        //La imprimimos en el pdf
            foreach($consulta->result_array() as $dato)
            {
                $pdf->Cell(0,10,'Codigo de pedido : '.$dato['codigo'].'     Fecha: '.$dato['fecha'],0,1);
                $pdf->Cell(0,10,'Nombre: '.$dato['nombre'].'                DNI: '.$dato['dni'],0,1);
            }
        //Traemos la tabla linea
        $consulta=$this->db->get('tbl_linea');
        //La imprimimos en el pdf
            foreach($consulta->result_array() as $dato)
            {
                $this->db->where('id',$dato['id_producto']);
                $query=$this->db->get('tbl_producto');
                foreach($query->result_array() as $producto)
                {
                    $pdf->Cell(0,10,'Producto : '.$producto['nombre'].'     Codigo: '.$producto['codigo'].'     Cantidad: '.$dato['cantidad'].'     Total: '.$dato['total'],0,2);
                }
            }
          $pdf->Output('D');
    }
        
    
}
