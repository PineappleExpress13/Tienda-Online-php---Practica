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
                  <li class="hidden-xs"><a href="cart.html">Mi carrito</a></li>
                  <li><a href="" data-toggle="modal" data-target="#login-modal">Login</a></li>
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
                  <span class="aa-cart-notify">0</span>
                </a>
                  
                  
                  <!--PHP AQuí-->
                <div class="aa-cartbox-summary">
                  <ul>
                    <li>
                      <a class="aa-cartbox-img" href="#"><img src="img/woman-small-2.jpg" alt="img"></a>
                      <div class="aa-cartbox-info">
                        <h4><a href="#">Product Name</a></h4>
                        <p>1 x $250</p>
                      </div>
                      <a class="aa-remove-product" href="#"><span class="fa fa-times"></span></a>
                    </li>
                    <li>
                      <a class="aa-cartbox-img" href="#"><img src="img/woman-small-1.jpg" alt="img"></a>
                      <div class="aa-cartbox-info">
                        <h4><a href="#">Product Name</a></h4>
                        <p>1 x $250</p>
                      </div>
                      <a class="aa-remove-product" href="#"><span class="fa fa-times"></span></a>
                    </li>                    
                    <li>
                      <span class="aa-cartbox-total-title">
                        Total
                      </span>
                      <span class="aa-cartbox-total-price">
                        $500
                      </span>
                    </li>
                  </ul>
                  <a class="aa-cartbox-checkout aa-primary-btn" href="checkout.html">Checkout</a>
                </div>
              </div>
              <!-- / cart box -->
              <!-- search box -->
              <div class="aa-search-box">
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
              <li><a href="#">Perros <span class="caret"></span></a>
                <ul class="dropdown-menu">                
                  <li><a href="#">Alimentación<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="#">Pienso</a></li>
                      <li><a href="#">Comida húmeda</a></li>
                      <li><a href="#">Snacks</a></li>                                      
                    </ul>
                  </li>
                  <li><a href="#">Higiene<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="#">Cepillos</a></li>
                      <li><a href="#">Higiene para el hogar</a></li>
                      <li><a href="#">Belleza y cuidado</a></li>                                      
                    </ul>
                  </li>
                  <li><a href="#">Accesorios<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="#">Juguetes</a></li>
                      <li><a href="#">Transportines</a></li>
                      <li><a href="#">Correas</a></li>                                      
                    </ul>
                  </li>
                </ul>
              </li>
              <li><a href="#">Gatos<span class="caret"></span></a>
               <ul class="dropdown-menu">                
                  <li><a href="#">Alimentación<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="#">Pienso</a></li>
                      <li><a href="#">Comida húmeda</a></li>
                      <li><a href="#">Snacks</a></li>                                      
                    </ul>
                  </li>
                  <li><a href="#">Higiene<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="#">Cepillos</a></li>
                      <li><a href="#">Higiene</a></li>
                      <li><a href="#">Arena</a></li>                                      
                    </ul>
                  </li>
                  <li><a href="#">Accesorios<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="#">Juguetes</a></li>
                      <li><a href="#">Transportines</a></li>
                      <li><a href="#">Rascadores</a></li>                                      
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
