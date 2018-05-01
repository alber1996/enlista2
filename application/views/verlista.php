<div class="col-sm-12">
<div class="clear"></div>
	<?php if ($resultado): ?>
	<?php for ($i = 0; $i < sizeof($resultado); $i++): ?>
	<a href="<?php echo base_url();?>listas/ver_listas/<?php echo $resultado[$i]['id_lista']?>">
		<div class="col-sm-6 col-md-4 col-lg-3 ver-lista">
			<img class="img-lista" src="<?php echo base_url(); ?>assets/img/enlistalo/listas.png">
			<h2><?php echo $resultado[$i]['nom_lista'];?></h2>
			<h4><?php echo $resultado[$i]['desc_lista'];?></h4>
		</div>
	</a>
	<?php endfor; ?>
	<?php else:?>
	<div class="alert alert-info"><h3>No hay listas, prueba a crear una.</h3></div>
	<?php endif; ?>
</div>
<script src="<?php echo base_url();?>assets/js/redireccionar_lista.js"></script>