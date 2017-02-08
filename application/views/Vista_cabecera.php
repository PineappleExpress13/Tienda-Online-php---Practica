<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Wokiki | Home</title>
    
    <!--Cuando esto se ejecute desde el servidor del instituto
    en vez de en local,hay que cambiar todos los href y poner delante de 
    la ruta actual la siguiente linea:
    <?//php echo base_url();?>-->
  <!-- Font awesome -->
    <link href="<?=base_url('Assets/css/font-awesome.css')?>" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="<?=base_url('Assets/css/bootstrap.css')?>" rel="stylesheet">   
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="<?=base_url('Assets/css/jquery.smartmenus.bootstrap.css')?>" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="<?=base_url('Assets/css/jquery.simpleLens.css')?>">    
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="<?=base_url('Assets/css/slick.css')?>">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="<?=base_url('Assets/css/nouislider.css')?>">
    <!-- Theme color -->
    <link id="switcher" href="<?=base_url('Assets/css/theme-color/red-theme.css')?>" rel="stylesheet">

    <!-- Main style sheet -->
    <link href="<?=base_url('Assets/css/style.css')?>" rel="stylesheet">  

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  

  </head>
  <body> 
   <!-- wpf loader Two -->
    <div id="wpf-loader-two">          
      <div class="wpf-loader-two-inner">
        <span>Cargando</span>
      </div>
    </div> 
    <!-- / wpf loader Two -->       
  <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->


  <!-- Start header section -->
  <header id="aa-header">
    <!-- start header top  -->
    <div class="aa-header-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-top-area">
              <!-- start header top left -->
              <div class="aa-header-top-left">
                <!-- start cellphone -->
                <div class="cellphone hidden-xs">
                  <p><span class="fa fa-phone"></span>959 80 83 84</p>
                </div>
                <!-- / cellphone -->
              </div>
              <!-- / header top left -->
              <div class="aa-header-top-right">
                <ul class="aa-head-top-nav-right">
                  <li class="hidden-xs"><a href="<?=site_url('Carrito/Index')?>">Mi carrito</a></li>
                  <?php if(!$this->session->userdata('login')):?>
                  <li><a href="" data-toggle="modal" data-target="#login-modal">Login</a></li>
                  <?php else:?>
                  <li><a href="" >Mi cuenta</a></li>
                  <li><a href="<?=site_url('/Login/Logout')?>">Logout</a></li>
                  <?php endif;?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header top  -->

    <!-- start header bottom  -->
    <div class="aa-header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-bottom-area">
              <!-- logo  -->
              <div class="aa-logo">
                <!-- Text based logo -->
                <?=anchor(base_url(),'<span class="fa fa-github-square"></span>
                  <p>Wo<strong>kiki</strong> <span>Mundo animal</span></p>')?>
              </div>
              <!-- / logo  -->
               <!-- cart box -->
              <div class="aa-cartbox">
                <a class="aa-cart-link" href="#">
                  <span class="fa fa-shopping-basket"></span>
                  <span class="aa-cart-title">Carrito</span>
                  <span class="aa-cart-notify"><?=$this->carro->articulos_total();?></span>
                </a>
                  
                  
                  
                <div class="aa-cartbox-summary">
                  <ul>
                      <?php if($this->carro->get_content()!=null) : ?>
                        <?php foreach($this->carro->get_content() as $campo) :
                        
                            if(is_array($campo)) : ?>
                            <li>
                           <a class="aa-cartbox-img" href="<?=site_url('/Productos/Producto/'.$campo['id'])?>"><img src="<?=base_url().$campo['imagen']?>"></a>
                            <div class="aa-cartbox-info">
                            <h4><a class="aa-cart-title" href="<?=site_url('/Productos/Producto/'.$campo['id'])?>"><?=$campo['nombre']?></a></h4>
                            <p><?=$campo['cantidad']?> x <?=$campo['precio']?>€</p>
                            </div>
                            <a class ="aa-remove-product" href='<?=site_url('/Carrito/Borrar/'.$campo['unique_id'])?>'><span class="fa fa-times" aria-hidden="true"></span></a>
                            </li>
                            
                       <?php
                       endif; 
                       endforeach;
                       endif;?>                  
                    <li>
                      <span class="aa-cartbox-total-title">
                        Total
                      </span>
                      <span class="aa-cartbox-total-price">
                        <?=$this->carro->precio_total()?>€
                      </span>
                    </li>
                  </ul>
                  <a class="aa-cartbox-checkout aa-primary-btn" href="checkout.html">Pagar</a>
                  <a  class="aa-cartbox-checkout aa-primary-btn" href="<?=site_url('/Carrito/Vaciar')?>" class="aa-cart-view-btn">Vaciar</a>
                </div>
              </div>
              <!-- / cart box -->
              <!-- search box -->
              <!--<div class="aa-search-box">
                <form action="">
                  <input type="text" name="" id="" placeholder="Buscar aquí ej: 'Gatos' ">
                  <button type="submit"><span class="fa fa-search"></span></button>
                </form>
              </div>
              <!-- / search box -->             
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header bottom  -->
  </header>
  <!-- / header section -->
  <!-- menu -->
  <section id="menu">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>          
          </div>
          <div class="navbar-collapse collapse">
            <!-- Left nav -->
            <ul class="nav navbar-nav">
              <li><?= anchor(base_url(),"Pagina principal"); ?></li>
              <li><a href="<?=site_url('Productos/Categoria/1-2-3-4-5-6-7-8-9')?>">Perros <span class="caret"></span></a>
                <ul class="dropdown-menu">                
                  <li><a href="<?=site_url('Productos/Categoria/1-2-3')?>">Alimentación<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="<?=site_url('Productos/Categoria/1')?>">Pienso</a></li>
                      <li><a href="<?=site_url('Productos/Categoria/2')?>">Comida húmeda</a></li>
                      <li><a href="<?=site_url('Productos/Categoria/3')?>">Snacks</a></li>                                      
                    </ul>
                  </li>
                  <li><a href="<?=site_url('Productos/Categoria/4-5-6')?>">Higiene<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="<?=site_url('Productos/Categoria/4')?>">Cepillos</a></li>
                      <li><a href="<?=site_url('Productos/Categoria/5')?>">Higiene para el hogar</a></li>
                      <li><a href="<?=site_url('Productos/Categoria/6')?>">Belleza y cuidado</a></li>                                      
                    </ul>
                  </li>
                  <li><a href="<?=site_url('Productos/Categoria/7-8-9')?>">Accesorios<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="<?=site_url('Productos/Categoria/7')?>">Juguetes</a></li>
                      <li><a href="<?=site_url('Productos/Categoria/8')?>">Transportines</a></li>
                      <li><a href="<?=site_url('Productos/Categoria/9')?>">Correas</a></li>                                      
                    </ul>
                  </li>
                </ul>
              </li>
              <li><a href="<?=site_url('Productos/Categoria/10-11-12-13-14-15-16-17-18')?>">Gatos<span class="caret"></span></a>
               <ul class="dropdown-menu">                
                  <li><a href="<?=site_url('Productos/Categoria/10-11-12')?>">Alimentación<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="<?=site_url('Productos/Categoria/10')?>">Pienso</a></li>
                      <li><a href="<?=site_url('Productos/Categoria/11')?>">Comida húmeda</a></li>
                      <li><a href="<?=site_url('Productos/Categoria/12')?>">Snacks</a></li>                                      
                    </ul>
                  </li>
                  <li><a href="<?=site_url('Productos/Categoria/13-14-15')?>">Higiene<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="<?=site_url('Productos/Categoria/13')?>">Cepillos</a></li>
                      <li><a href="<?=site_url('Productos/Categoria/14')?>">Higiene</a></li>
                      <li><a href="<?=site_url('Productos/Categoria/15')?>">Arena</a></li>                                      
                    </ul>
                  </li>
                  <li><a href="<?=site_url('Productos/Categoria/16-17-18')?>">Accesorios<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="<?=site_url('Productos/Categoria/16')?>">Juguetes</a></li>
                      <li><a href="<?=site_url('Productos/Categoria/17')?>">Transportines</a></li>
                      <li><a href="<?=site_url('Productos/Categoria/18')?>">Rascadores</a></li>                                      
                    </ul>
                  </li>
                </ul>             
              </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>       
    </div>
  </section>
   <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="<?=base_url('Assets/js/bootstrap.js')?>"></script>  
  <!-- SmartMenus jQuery plugin -->
  <script type="text/javascript" src="<?=base_url('Assets/js/jquery.smartmenus.js')?>"></script>
  <!-- SmartMenus jQuery Bootstrap Addon -->
  <script type="text/javascript" src="<?=base_url('Assets/js/jquery.smartmenus.bootstrap.js')?>"></script>  
  <!-- Product view slider -->
  <script type="text/javascript" src="<?=base_url('Assets/js/jquery.simpleGallery.js')?>"></script>
  <script type="text/javascript" src="<?=base_url('Assets/js/jquery.simpleLens.js')?>"></script>
  <!-- slick slider -->
  <script type="text/javascript" src="<?=base_url('Assets/js/slick.js')?>"></script>
  <!-- Price picker slider -->
  <script type="text/javascript" src="<?=base_url('Assets/js/nouislider.js')?>"></script>
  
  <!-- Custom js -->
  <script src="<?=base_url('Assets/js/custom.js')?>"></script> 

  </body>
</html>