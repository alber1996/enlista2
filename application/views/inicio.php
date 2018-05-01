<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Kalam|Love+Ya+Like+A+Sister" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
	<script src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/scripts.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <sript src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></sript>
    
	<title>Enlistalo</title>
</head>
<body>
	
	<!-- TODO Comprobar que no se haga un registro de usuario ya existente mediante ajax-->
	<div class="prin">
		<div class="container">
			<img class='logo' src="<?php echo base_url(); ?>assets/img/enlistalo/logotipo.png">

		<div class="row col-md-12">
		<?php
		session_start();
		if (isset($_SESSION['user'])) {
			header("Location: ".base_url()."listas");
		}
		
		if (isset($_SESSION['msj'])) {
			echo $_SESSION['msj'];
			unset($_SESSION['msj']);
		}
		?>
		<div class="col-md-6">
			<fieldset><legend>Registro</legend>
        	<form name="registro" autocomplete='off' method='post' action="<?php echo base_url()?>usuarios/registro">
				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					<input type="text" required class="form-control" id='usuario' name="usuario" placeholder="Escriba un nombre usuario">
				</div>
				<div class='error' id="user_error">
				</div>
				<div class="form-group"></div>
				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
					<input type="text" required class="form-control" name="email" id="email" placeholder="Escriba un correo electrónico">
				</div>
				<div class='error' id="email_error"></div>

				<div class="form-group"></div>
				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
					<input type="password" required class="form-control" id='clave1' name="clave" placeholder="Escriba una contraseña">
				</div>
				<div class="form-group"></div>
				<center>		
					<button class="btn btn-default" id="registro" type="submit">Registrarse</button>
				</center>
				<div class="form-group"></div>	
			</form>
			</fieldset>
		</div>
		<div class="col-md-6">
			<fieldset><legend>Login</legend>
        	<form name="login" autocomplete='off' method='post' action="<?php echo base_url()?>usuarios/login">
				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					<input type="text" required class="form-control" id='usuario' name="usuario" placeholder="Escriba un nombre usuario">
				</div>
				<div class='error' id="user_error">
				</div>
				<div class="form-group"></div>
				<div class='error' id="email_error"></div>
				<div class="form-group"></div>				
				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
					<input type="password" required class="form-control" id='clave1' name="clave" placeholder="Escriba una contraseña">
				</div>
				<div class="form-group"></div>				
				<div class='error' id="clave_error"></div>

				<div class="form-group"></div>
			
				<center>				
					<button class="btn btn-default" id="login" type="submit">Login</button>
				</center>
				<div class="form-group"></div>	
			</form>
		</fieldset>
	</div>
	</div>
		</div>
	</div>
	<div class="sec">
		<div class="container">
			<div class="row">
			<div class="col-md-4">
				<h2>
					Quienes somos
				</h2>
				<p>
					Con está aplicación podemos crear listas de regalos para eventos como bodas, comuniones, cumpleaños ... 
					Además de poder realizar el listado de la compra.
				</p>
				
			</div>
			<div class="col-md-4">
				<h2>
					Que hacemos
				</h2>
				<p>
					Con está aplicación podemos crear listas de regalos para eventos como bodas, comuniones, cumpleaños ... 
					Además de poder realizar el listado de la compra.
				</p>
				
			</div>
			<div class="col-md-4">
				<h2>
					Contacta con nosotros
				</h2>
				<p>
					Nombre xxxxxxxxxx<br>
					Apellido xxxxxxxxx<br>
					tel xxxxxxxxx
				</p>
			</div>
		</div>
		</div>
	</div>
	<div class="footer">
		<div class="container">
			<h5>@copyright enlistalo</h5>
		</div>
	</div>
</body>
</html>