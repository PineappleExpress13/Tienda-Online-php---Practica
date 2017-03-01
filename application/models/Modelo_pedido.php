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
    public function getPedido($id)
    {
        $this->db->where('id',$id);
        $consulta=$this->db->get('tbl_pedido');
        foreach($consulta->result_array() as $dato)
        {
            $pedido=array(
              'id' => $dato['id'],
              'fecha' => $dato['fecha'],
              'direccion' => $dato['direccion'],
              'nombre' => $dato['nombre'],
              'estado' => $dato['estado'],
              'dni'    => $dato['dni'],
              'codigo' => $dato['codigo']);
        }
        return $pedido;
    }
    public function getPedidos($id)
    {
        $this->db->where('id_usuario',$id);
        $consulta=$this->db->get('tbl_pedido');
        $datos;
        $i=0;
        foreach($consulta->result_array() as $dato)
        {
            $pedido=array(
              'id' => $dato['id'],
              'fecha' => $dato['fecha'],
              'direccion' => $dato['direccion'],
              'nombre' => $dato['nombre'],
              'estado' => $dato['estado'],
              'dni'    => $dato['dni'],
              'codigo' => $dato['codigo']);
            $datos[$i]=$pedido;
            $i++;
        }
        $i=0;
        return $datos;
    }
    public function getLineas($idpedido)
    {
        $this->load->model('Modelo_producto');
        $this->db->where('id_pedido',$idpedido);
        $consulta=$this->db->get('tbl_linea');
        $datos;
        $i=0;
        foreach($consulta->result_array() as $dato)
        {
            $linea=array(
              'subtotal' => $dato['subtotal'],
              'total' => $dato['total'],
              'cantidad' => $dato['cantidad'],
              'id_producto' =>$dato['id_producto'],
              'nombre' => $this->Modelo_producto->NombreProducto($dato['id_producto']),
              'imagen'    => $this->Modelo_producto->ImagenProducto($dato['id_producto']));
            $datos[$i]=$linea;
            $i++;
        }
        $i=0;
        return $datos;
    }
    public function BorrarPedido($id)
    {
        $this->db->where('id_pedido',$id);
        $this->db->delete('tbl_linea');
        $this->db->where('id',$id);
        $this->db->delete('tbl_pedido');
    }
    
    public function ConfirmarPedido($id)
    {
        $this->db->where('id',$id);
        $this->db->update('tbl_pedido',array('estado'=>'C'));
        $this->load->library('email');
             
        $this->db->where('id',$_SESSION['id']);
        $consulta=$this->db->get('tbl_usuario');
        foreach($consulta->result_array() as $dato)
        {
               $mail = $dato['correo'];
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
            $pedido=$this->getPedido($id);
            $html='<p>Fecha de creación: '.$pedido['fecha'].'</p>';
            $html.='<p>Dirección de facturación: '.$pedido['direccion'].'</p>';
            $html.='<p>Nombre: '.$pedido['nombre'].'</p>';
            $html.='<p>DNI: '.$pedido['dni'].'</p>';
            $html.='<hr>';
            $html.='<table>';
            $html.='<tr><td>Nombre</td><td>Cantidad</td><td>Subtotal</td><td>Total</td>';
            $lineas=$this->getLineas($id);
            foreach($lineas as $linea)
            {
                $html.='<tr>';
                $html.='<td>'.$linea['nombre'].'</td>';
                $html.='<td>'.$linea['cantidad'].'</td>';
                $html.='<td>'.$linea['subtotal'].'€</td>';
                $html.='<td>'.$linea['total'].'€</td>';
                $html.='</tr>';
            }
            $html.='</table>';

            $this->email->clear();
            $this->email->from('aula4@iessansebastian.com');
            $this->email->to($mail);
            $this->email->subject('Detalles del pedido '.$pedido['codigo']);
            $this->email->message($html);
            $this->email->send();
    }
    public function GenerarPDF($id)
    {
        $total=0;
        $this->load->library('fpdf');
        $pdf = new FPDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',11);
        
        //Traemos la tabla pedido
        $this->db->where('id',$id);
        $consulta=$this->db->get('tbl_pedido');
        //La imprimimos en el pdf
            foreach($consulta->result_array() as $dato)
            {
                $pdf->Cell(0,10,utf8_decode('Codigo de pedido : '.$dato['codigo'].'     Fecha: '.$dato['fecha']),0,1);
                $pdf->Cell(0,10,utf8_decode('Nombre: '.$dato['nombre'].'                DNI: '.$dato['dni']),0,1);
            }
        //Traemos la tabla linea
        $this->db->where('id_pedido',$id);
        $consulta=$this->db->get('tbl_linea');
        $total=0;
        //La imprimimos en el pdf
            foreach($consulta->result_array() as $dato)
            {
                $this->db->where('id',$dato['id_producto']);
                $query=$this->db->get('tbl_producto');
                foreach($query->result_array() as $producto)
                {
                    $pdf->Cell(0,10,utf8_decode('Producto : '.$producto['nombre'].'     Codigo: '.$producto['codigo'].'     Cantidad: '.$dato['cantidad'].'     Total: '.$dato['total']).iconv('UTF-8','windows-1252','€'),0,2);
                    $total+=$dato['total'];
                }
            }
             $pdf->Cell(0,10,utf8_decode('Total : '.$total).iconv('UTF-8','windows-1252','€'),0,2);
          $pdf->Output('D');
    }
        
    
}
