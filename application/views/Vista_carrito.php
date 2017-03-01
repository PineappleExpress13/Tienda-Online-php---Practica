<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   </head>
  <body>

  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
             <form action="">
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                          <th></th>
                          <th></th>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php if($this->carro->get_content()!=null) : ?>
                        <?php foreach($this->carro->get_content() as $campo) :
                        
                            if(is_array($campo)) : ?>
                            
                         <tr>
                            <td><a href='<?=site_url('/Carrito/Borrar/'.$campo['unique_id'])?>'><span class="fa fa-times" aria-hidden="true"></span></a></td>
                            <td><img src="<?=base_url().$campo['imagen']?>"></td>
                            <td><a class="aa-cart-title" href="<?=
                            site_url('/Productos/Producto/'.$campo['id'])?>"><?=$campo['nombre']?></a></td>
                            <td><?=$campo['precio']?>€</td>
                            <td>
                                    <?=$campo['cantidad']?>
                                <a href="<?=site_url('/Carrito/UnoMas/'.md5($campo['id']))?>"><span class='fa fa-plus-square'></span></a>
                                <a href="<?=site_url('/Carrito/UnoMenos/'.md5($campo['id']))?>"><span class='fa fa-minus-square'></span></a>
                            
                            </td>
                            <td><?=$campo['total']?>€</td>
                      </tr>
                            
                       <?php
                       endif; 
                       endforeach;
                       endif;?>
                      </tbody>
                  </table>
                </div>
             </form>
             <!-- Cart Total view -->
             <div class="cart-view-total">
               <h4>Totales</h4>
               <table class="aa-totals-table">
                 <tbody>
                   <tr>
                     <th>Total</th>
                     <td><?=$this->carro->precio_total()?>€</td>
                   </tr>
                 </tbody>
               </table>
               <a href="<?= site_url('/Carrito/Pedido')?>" class="aa-cart-view-btn">Pagar</a>
               <a href="<?=site_url('/Carrito/Vaciar')?>" class="aa-cart-view-btn">Vaciar</a>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
   </body>
</html>