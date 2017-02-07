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
   <!-- product category -->
  <section id="aa-product-category">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
          <div class="aa-product-catg-content">
            <div class="aa-product-catg-body">
              <ul class="aa-product-catg">
                <!-- start single product item -->
                <?php foreach ($productos as $producto):?>
                <li>
                  <figure>
                    <img src="<?=base_url().$producto['imagen']?>">
                    <a class="aa-add-card-btn" href="<?= site_url('/Carrito/Add/'.$producto["id"].'/1')?>"><span class="fa fa-shopping-cart"></span>Añadir al carro</a>
                    <figcaption>
                      <h4 class="aa-product-title"><a href="<?=base_url().'Productos/Producto/'.$producto['id']?>"><?=$producto['nombre']?></a></h4>
                      <span class="aa-product-price"><?=$producto['precio_venta']?> €</span>
                      <p class="aa-product-descrip"><?=$producto['descripcion']?></p>
                    </figcaption>
                  </figure>                         
                  <!-- product badge -->
                  <span class="aa-badge aa-sale" href="#">SALE!</span>
                </li>  
                <?php endforeach;?>
              </ul> 
            </div>

                <?=$this->pagination->create_links();?>

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
