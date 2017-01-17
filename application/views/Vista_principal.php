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
   
  <!-- / menu -->
  
  <!-- / slider -->
  <!-- Start Promo section -->
  
  
  <!--PHP AQUÍ-->
  
  <section id="aa-promo">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-promo-area">
            <div class="row">
              <!-- promo left -->
              <div class="col-md-5 no-padding">                
                <div class="aa-promo-left">
                  <div class="aa-promo-banner">                    
                    <img src="Assets/img/piensos-perro/principal.jpg" alt="img">                    
                    <div class="aa-prom-content">
                      <span>25% Descuento</span>
                      <h4><a href="<?=site_url('Productos/Categoria/1')?>">Pienso para perros</a></h4>                      
                    </div>
                  </div>
                </div>
              </div>
              <!-- promo right -->
              <div class="col-md-7 no-padding">
                <div class="aa-promo-right">
                  <div class="aa-single-promo-right">
                    <div class="aa-promo-banner">                      
                      <img src="Assets/img/juguete-gato/principal.jpg" alt="img">                      
                      <div class="aa-prom-content">
                        <h4><a href="<?=site_url('Productos/Categoria/16')?>">Juguetes gatos!</a></h4>                        
                      </div>
                    </div>
                  </div>
                  <div class="aa-single-promo-right">
                    <div class="aa-promo-banner">                      
                      <img src="Assets/img/juguete-perro/principal.jpg" alt="img">                      
                      <div class="aa-prom-content">
                        <h4><a href="<?=site_url('Productos/Categoria/7')?>">Juguetes perro</a></h4>                        
                      </div>
                    </div>
                  </div>
                  <div class="aa-single-promo-right">
                    <div class="aa-promo-banner">                      
                      <img src="Assets/img/arena-gato/principal.jpg" alt="img">                      
                      <div class="aa-prom-content">
                        <h4><a href="<?=site_url('Productos/Categoria/15')?>">Arena gato</a></h4>                        
                      </div>
                    </div>
                  </div>
                  <div class="aa-single-promo-right">
                    <div class="aa-promo-banner">                      
                      <img src="Assets/img/transportin-perro/principal.jpg" alt="img">                      
                      <div class="aa-prom-content">
                        <h4><a href="<?=site_url('Productos/Categoria/8-17')?>">Transportines</a></h4>                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
 
  <!-- / Products section -->

  <!-- popular section -->
  <section id="aa-popular-category">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-popular-category-area">
              <!-- start prduct navigation -->
             <ul class="nav nav-tabs aa-products-tab">
                <li class="active"><a href="#popular" data-toggle="tab">Gatos</a></li>
                <li><a href="#featured" data-toggle="tab">Perros</a></li>                   
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <!-- Start Gatos popular category -->
                <div class="tab-pane fade in active" id="popular">
                  <ul class="aa-product-catg aa-popular-slider">
                    <!-- start single product item -->
                    <?php 
                    foreach($gatos as $gato):?>
                        <li>
                            <figure>
                                <img src="<?=base_url().$gato['imagen']?>">
                                <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Añadir al carro</a>
                                <figcaption>
                                    <h4 class="aa-product-title"><a href="<?=site_url('Productos/Producto/'.$gato['id'])?>"><?=$gato['nombre']?></a></h4>
                                    <span class="aa-product-price"><?=$gato['precio_venta']?>€</span>
                                </figcaption>
                            </figure>                     
                      <!-- product badge -->
                            <?php if($gato['stock']>0):?>
                             <span class="aa-badge aa-sale" href="#">DISPONIBLE!</span>
                            <?php else:?>
                             <span class="aa-badge aa-sold-out" href="#">AGOTADO!</span>
                            <?php endif;?>
                        </li>
                    <?php endforeach;?>                                                                               
                  </ul>
                  <a class="aa-browse-btn" href="#">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
                </div>
                <!-- / popular product category -->
                
                <!-- start featured product category -->
                <div class="tab-pane fade" id="featured">
                 <ul class="aa-product-catg aa-featured-slider">
                    <!-- start single product item -->
                     <?php 
                    foreach($perros as $perro):?>
                        <li>
                            <figure>
                                <img src="<?=base_url().$perro['imagen']?>">
                                <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Añadir al carro</a>
                                <figcaption>
                                    <h4 class="aa-product-title"><a href="<?=site_url('Productos/Producto/'.$perro['id'])?>"><?=$perro['nombre']?></a></h4>
                                    <span class="aa-product-price"><?=$perro['precio_venta']?>€</span>
                                </figcaption>
                            </figure>                     
                            <div class="aa-product-hvr-content">
                                <a href="#" data-toggle2="tooltip" data-placement="top" title="Detalles" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
                            </div>
                      <!-- product badge -->
                            <?php if($perro['stock']>0):?>
                             <span class="aa-badge aa-sale" href="#">DISPONIBLE!</span>
                            <?php else:?>
                             <span class="aa-badge aa-sold-out" href="#">AGOTADO!</span>
                            <?php endif;?>
                        </li>
                    <?php endforeach;?>                                                                         
                  </ul>
                  <a class="aa-browse-btn" href="#">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
                </div>
                <!-- / latest product category -->              
              </div>
            </div>
          </div> 
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