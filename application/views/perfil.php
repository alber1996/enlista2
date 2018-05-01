	<div class="col-sm-12">
<div class="clear"></div>
<fieldset>
	<legend>Mi Perfil</legend>
    	<form id="camb_perfil" name="camb_perfil" autocomplete='off' method='post' action="<?php echo base_url();?>perfil/modificar_perfil">
    	<?php if($resultado):?>
    	<?php for($i = 0; $i < sizeof($resultado); $i++):?>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				<input type="text" class="form-control" value="<?php echo $resultado[$i]['username_user'];?>" id='usuario' name="usuario">
			</div>
			<div class='error' id="user_error">
			</div>
			<div class="form-group"></div>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
				<input type="mail" class="form-control" value="<?php echo $resultado[$i]['email_user'];?>" name="email" id="email">
			</div>
			<div class='error' id="email_error"></div>

			<div class="form-group"></div>
			<div class="input-group" id="div_clave_antigua">
				<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				<input type="password" class="form-control" id="clave_antigua" name="clave_antigua" placeholder="Escriba su antigua contraseña">
			</div>
			<div class="form-group"></div>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				<input type="password" class="form-control" id="clave_nueva" name="clave_nueva" placeholder="Escriba su nueva contraseña">
			</div>
			<div class="form-group"></div>
			<center>		
				<button class="btn btn-default" id="actualizar" type="submit">Actualizar</button>
			</center>
			<div class="form-group"></div>
		<?php endfor;?>
		<?php endif;?>
		</form>
</fieldset>
</div>
<script>
	$("#camb_perfil").submit(function(event){
		var clave_antigua = $("#clave_antigua").val();
		$this = this;
		event.preventDefault();
		if(clave_antigua) {
			$.ajax({
				type: "POST",
				url: "http://localhost/enlistalo/perfil/validar_clave/" + $("#clave_antigua").val()
			}).done(function(data){
				data = jQuery.parseJSON(data);
				if(!data.data) {
					$("#div_clave_antigua").focus();
					$("#div_clave_antigua").addClass("has-error");
				} else {
					$("#div_clave_antigua").removeClass("has-error");
					$this.submit();
				}
			});
		}
	});
</script>