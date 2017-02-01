<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wokiki | Detalles del producto</title>

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
  <!-- product category -->
  <section id="aa-product-details">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-product-details-area">
            <div class="aa-product-details-content">
              <div class="row">
                <!-- Modal view slider -->
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <div class="aa-product-view-slider">
                    <div id="demo-1" class="simpleLens-gallery-container">
                      <div class="simpleLens-container">
                        <div class="simpleLens-big-image-container"><img src="<?=base_url().$producto[0]['imagen']?>" class="simpleLens-big-image"></div>
                      </div>
                      
                    </div>
                  </div>
                </div>
                <!-- Modal view content -->
                <div class="col-md-7 col-sm-7 col-xs-12">
                  <div class="aa-product-view-content">
                    <h3><?=$producto[0]['nombre']?></h3>
                    <div class="aa-price-block">
                      <span class="aa-product-view-price"><?=$producto[0]['precio_venta']?>€</span>
                      <?php if($producto[0]['stock']>0):?>
                             <span class="aa-badge aa-sale" href="#">DISPONIBLE!</span>
                            <?php else:?>
                             <span class="aa-badge aa-sold-out" href="#">AGOTADO!</span>
                            <?php endif;?>
                    </div>
                    <p><?=$producto[0]['descripcion']?></p>
 
                    
                    <div class="aa-prod-quantity">
                      <form action="">
                        <select id="" name="">
                          <option selected="1" value="0">1</option>
                          <option value="1">2</option>
                          <option value="2">3</option>
                          <option value="3">4</option>
                          <option value="4">5</option>
                          <option value="5">6</option>
                        </select>
                      </form>
                      <p class="aa-prod-category">
                        Category: <a href="#"></a>
                      </p>
                    </div>
                    <div class="aa-prod-view-bottom">
                      <a class="aa-add-to-cart-btn" href="#">Añadir al carrito</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            





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

