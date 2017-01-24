<body> 
    	<div class="container">
		<div class="col-md-6 offset-md-3">
			<div class="card card-block">
				<h3 class="card-title  text-md-center">Añadir usuario</h3>
				<hr class="hr_black">
				<form method="post" action="<?=site_url('/Login/Registrar')?>">
					<div class="form-group">
						<label for="usuario"><strong>Usuario</strong></label>
						<input type="text" name="usuario" class="form-control" value="<?php echo set_value('usuario'); ?>">
						<?php echo form_error('usuario'); ?>
					</div>
                                        <div class="form-group">
						<label for="email"><strong>Email</strong></label>
						<input type="text" name="mail" class="form-control" value="<?php echo set_value('mail'); ?>">
						<?php echo form_error('mail'); ?>
					</div>
                                        <div class="form-group">
						<label for="usuario"><strong>Nombre</strong></label>
						<input type="text" name="nombre" class="form-control" value="<?php echo set_value('nombre'); ?>">
						<?php echo form_error('nombre'); ?>
					</div>
                                        <div class="form-group">
						<label for="usuario"><strong>Apellidos</strong></label>
						<input type="text" name="apellidos" class="form-control" value="<?php echo set_value('apellidos'); ?>">
						<?php echo form_error('apellidos'); ?>
					</div>
                                        <div class="form-group">
						<label for="usuario"><strong>dni</strong></label>
						<input type="text" name="dni" class="form-control" value="<?php echo set_value('dni'); ?>">
						<?php echo form_error('dni'); ?>
					</div>
                                        <div class="form-group">
						<label for="usuario"><strong>direccion</strong></label>
						<input type="text" name="direccion" class="form-control" value="<?php echo set_value('direccion'); ?>">
						<?php echo form_error('direccion'); ?>
					</div>
                                        <div class="form-group">
						<label for="usuario"><strong>Codigo postal</strong></label>
						<input type="text" name="cp" class="form-control" value="<?php echo set_value('cp'); ?>">
						<?php echo form_error('cp'); ?>
					</div>
                                        <div class="form-group">
						<label for="usuario"><strong>Provincia</strong></label>
						<!--//todo-->
						<?php echo form_error('usuario'); ?>
					</div>

					<div class="form-group">
						<label for="pass"><strong>Contraseña</strong></label>
						<input type="password" name="pass" class="form-control">
						<?php echo form_error('pass'); ?>
					</div>
					<div class="form-group">
						<label for="conf_pass"><strong>Confirmar contraseña</strong></label>
						<input type="password" name="conf_pass" class="form-control">
						<?php echo form_error('conf_pass'); ?>
					</div>
					
					<div class="text-md-center">
						<button type="submit" class="btn btn-primary">Enviar</button>
					</div>
				</form>
			</div>
		</div>
	</div>

    
    
    
 </body>
</html>