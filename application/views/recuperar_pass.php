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
      <?php if(isset($cambio)) : ?>
        <div class="alert alert-success" role="alert">Se ha recuperado la contraseña con éxito</div>
      <?php endif; ?>
      <?php if(isset($error)) :?>
        <div class="alert alert-danger" role="alert">Se ha producido un error,vuelva a introducir las password</div>
      <?php endif; ?>

        <div class="container">
		<div class="col-md-6 offset-md-3">
			<div class="card card-block">
				<h3 class="card-title  text-md-center">Añadir usuario</h3>
				<hr class="hr_black">
				<form method="post" action="">
					<div class="form-group">
						<label for="usuario"><strong>Password</strong></label>
						<input type="password" name="password" class="form-control" value="<?php echo set_value('password'); ?>">
					</div>
                                            <div class="text-md-center">
						<button type="submit" class="btn btn-primary">Enviar</button>
					</div>
				</form>
			</div>
		</div>
	</div>

