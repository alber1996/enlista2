function Controller_articulos(model,view) {
	this.model = model;
	this.view = view;
	this.baseurl = "http://localhost/enlistalo/";

	this.cargar_articulos = function(id_lista) {
		// Llamada Ajax a uno de los controladores php que retorna todos los artículos.
		$this = this;
		
		$.ajax({
			type: "POST",
			url: this.baseurl+"articulos/ver_creador?id="+id_lista
		}).done( function(data){
			var creador = jQuery.parseJSON(data);
	
			for(var i = 0; i < creador.data.length; i++) {
				$this.view.user_propietario = creador.data[i].creador_lista;
			}
			$this.instanciar_modelo(id_lista);
		});
	}
	
	this.instanciar_modelo = function(id_lista) {
		$.ajax({
			type: "POST",
			url: this.baseurl+"articulos/ver_articulos?id="+id_lista
		}).done( function(data){
			var articulos = jQuery.parseJSON(data);
			for (var i = 0; i < articulos.data.length; i++) {
				$this.model.add_articulo(
					articulos.data[i].id_articulo,
					articulos.data[i].nom_articulo,
					articulos.data[i].desc_articulo,
					articulos.data[i].cant_articulo,
					articulos.data[i].urlejemplo_articulo,
					articulos.data[i].nom_user_comprador
				);
			}
			
			$this.view.mostrar_articulos();
		});
	}
	
	this.eliminar_articulo = function(id_articulo) {
		$.ajax({
			type: "POST",
			url: this.baseurl+"articulos/eliminar_articulo?id="+id_articulo
		}).done( function(data){
			$this.model.drop_articulo(id_articulo);
			$this.view.mostrar_articulos();	
		});
	}
	
	this.aniadir_articulo = function(id,nombre,descripcion,cantidad,url) {
		// Llamada Ajax que añade un artículo.
		var data = id + "," +
				   nombre + "," + 
				   descripcion + "," + 
				   cantidad + "," + 
				   url;
		$this = this;
		
		$.ajax({
			type: "POST",
			url: this.baseurl+"articulos/aniadir_articulo?data="+data
		}).done( function(data){
			var id_articulo = jQuery.parseJSON(data);
			$this.model.add_articulo(
				id_articulo.data,
				nombre,
				descripcion,
				cantidad,
				url,
				" "
			);
			$this.view.mostrar_articulos();
		});
		
	}
	
	this.comprar_articulo = function(id_articulo, comprador) {
		$this = this;
		$.ajax({
			type: "POST",
			url: this.baseurl+"articulos/comprar_articulo/"+id_articulo+"/"+comprador
		}).done( function(data){
			data = jQuery.parseJSON(data);
			if(data.data) {
				$this.model.comprar_articulo(
					id_articulo,
					comprador
				);
			}
			$this.view.mostrar_articulos();
		});
	}
	
	this.devolver_articulo = function(id_articulo) {
		$this = this;
		$.ajax({
			type: "POST",
			url: this.baseurl+"articulos/devolver_articulo/"+id_articulo
		}).done( function(data){
			data = jQuery.parseJSON(data);
			if(data.data) {
				$this.model.devolver_articulo(
					id_articulo
				);
			}
			$this.view.mostrar_articulos();
		});
	}
	
	this.modificar_articulo = function(id,nombre,descripcion,cantidad,url,comprador) {
		// Llamada Ajax que modifica un artículo.
		var data = id + "," +
				   nombre + "," + 
				   descripcion + "," + 
				   cantidad + "," + 
				   url + "," +
			 	   comprador;
		$this = this;
		$.ajax({
			type: "POST",
			url: this.baseurl+"articulos/modificar_articulo?data="+data
		}).done( function(data){
			console.log(data);
			$this.model.update_articulo(
				id,
				nombre,
				descripcion,
				cantidad,
				url,
				null
			);
			$this.view.mostrar_articulos();
		});
	}
}