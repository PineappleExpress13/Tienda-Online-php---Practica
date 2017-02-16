<body> 
    	<div class="container">
		<div class="col-md-6 offset-md-3">
			<div class="card card-block">
				<h3 class="card-title  text-md-center">Recuperar Contraseña</h3>
				<hr class="hr_black">
                                <form method="post" action="<?=site_url('/Login/Recuperar')?>">
                                <div class="form-group">
                                    <?php if(isset($fallo)) : ?>
                                    <p> El mail introducido no existe </p>
                                    <?php endif;?>
                                    <?php if(isset($envio)) : ?>
                                    <div class="alert alert-success" role="alert">Se ha recuperado la contraseña con éxito</div>
                                    <?php endif;?>
						<label for="email"><strong>Email</strong></label>
						<input type="text" name="mail" class="form-control" value="<?php echo set_value('mail'); ?>">
						<?php echo form_error('mail'); ?>
                                </div>
                                    <div class="text-md-center">
						<button type="submit" class="btn btn-primary">Enviar</button>
                                    </div>
                                </form>
                        </div>
                </div>
        </div>    
