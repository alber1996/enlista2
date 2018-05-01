$(document).ready(inicio);

function inicio() {
	// Sacar de la url el id_lista.
	var location = window.location;
	var id_lista = location.pathname.substring(location.pathname.lastIndexOf('/') + 1);
	
	// Lo primero que hay que hacer es comprobar si está instanciado el modelo.
	if (!this.model_articulos) {
		// Instanciar modelo, vista y controlador.
		this.model_articulos = new Model_articulos();
		this.view_articulos = new View_articulos(this.model_articulos);
		this.view_articulos.id_lista = id_lista;
		this.controller_articulos = new Controller_articulos(this.model_articulos,this.view_articulos);
			
		// Cargar los datos mediante llamada Ajax en el controlador.
		this.controller_articulos.cargar_articulos(id_lista);
	}
	
	// Event listeners.
	$(document).click(function(event){
		if(event.target.className.includes('eliminar-lista')) {
			var eliminar = confirm("Eliminar lista");
			if(eliminar) {
				event.submit();
			} else {
				event.preventDefault();
			}
		} else if(event.target.className.includes('eliminar')) {
			this.controller_articulos.eliminar_articulo(event.target.id);
		} else if(event.target.className.includes('modificar')) {
			var parametros_actualizar = $("."+event.target.id);
			var	nombre = parametros_actualizar[0].value;
			var descripcion = parametros_actualizar[1].value;
			var cantidad = parametros_actualizar[2].value;
			var url= parametros_actualizar[3].value;
			var comprador = "";
			this.controller_articulos.modificar_articulo(event.target.id,nombre,descripcion,cantidad,url,comprador);
		} else if(event.target.className.includes('invitar')) {
			this.view_articulos.crear_modal(1,"invitar","asa");
		} else if(event.target.className.includes('comprar')) {
			this.controller_articulos.comprar_articulo(event.target.id, $("#user_name").html());
		} else if(event.target.className.includes('devolver')) {
			this.controller_articulos.devolver_articulo(event.target.id);
		}
		
	});
	
	// Insertar artículo en la bbdd.
	$(document).submit(function(event){
		event.preventDefault();
		switch(event.target.id) {
			case "aniadir_articulo":
				$(".funcion-modal").modal('toggle');
				var nombre = $("#nombre_art").val();
				var descripcion = $("#desc_art").val();
				var cantidad = $("#cant_art").val();
				var url = $("#url_art").val();
				this.controller_articulos.aniadir_articulo(id_lista,nombre,descripcion,cantidad,url);
			break;		
		}
	});
}