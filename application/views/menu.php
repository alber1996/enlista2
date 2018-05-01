<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/menu.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
	<script src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/bootstrap/js/scripts.js"></script>
	<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
	
	<title>Enlistalo</title>
</head>
<body>
<?php session_start(); if(!isset($_SESSION['user'])){header("Location: ".base_url());}?>
	<div class="navbar-wrapper">
	<div class="container-fluid">
		<nav class="navbar navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
					</button>
					<a class="navbar-brand" href="<?php echo base_url(); ?>"><img id='img-menu' src="<?php echo base_url(); ?>assets/img/enlistalo/logotipo.png"></a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li class="down"><a id="crear" data-toggle="modal" data-target="#crearlista">Crear lista</a></li>
						<li class="down"><a href="<?php echo base_url(); ?>listas">Ver listas</a></li>
					</ul>
					<ul class="nav navbar-nav pull-right">
						<li class=" dropdown"><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
						 <?php
							echo "<b id='user_name'>".$_SESSION['user']."</b>";
						 ?>
						 <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo base_url(); ?>perfil"><span class="glyphicon glyphicon-cog"></span>  Mi perfil</a></li>
								<li><a href="<?php echo base_url(); ?>usuarios/logout"><span class="glyphicon glyphicon-log-out"></span> Cerrar Sesión</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</div>
</div>
<div class="clear"></div>
<div class="clear"></div>


<div id="crearlista" class="modal fade" role="dialog">
<form name="crear_lista" autocomplete='off' method='post' action="<?php echo base_url(); ?>listas/crear_lista">
  <div class="modal-dialog">
	
	<!-- Modal content-->
	<div class="modal-content">
	  <div class="modal-header" style="background-color:#87CEFA;color:white;border-radius:5px;">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title">Crear Lista</h4>
	  </div>
	  <div class="modal-body">
				<div class="form-group">
					<label for="nom_lista">Nombre de la lista:</label>
					<input type="text" required class="form-control" id='nom_lista' name="nom_lista" maxlength="25">
				</div>
				<div class="form-group">
					<label for="desc_lista">Descripción:</label>
					<textarea display="block" class="form-control" name="desc_lista" rows="5" id="desc_lista" maxlength="150"></textarea>
				</div>
				<div id="tipo">
				</div>	
	  </div>
	  <div class="modal-footer">
		<button id="btn-crear" class="btn btn-info" type="submit">Crear lista</button>
	  </div>
	</div>

  </div>
</form>
</div>
<script>
$("#crear").click( function (e){
		e.preventDefault();
		$("#tipo").load("<?php echo base_url(); ?>listas/vertipo");
});

$("#btn-crear").click(function(e) {
	console.log(e);
});	
</script>
