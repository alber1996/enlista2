function View_articulos(model) {
	this.model = model;
	this.user_propietario = "";
	this.id_lista = "";
	
	this.mostrar_articulos = function() {
		user_actual = $("#user_name").html();
		
		if (this.model.articulos.length == 0) {
			if(user_actual == this.user_propietario) {
				var mostrar = "<div class='alert alert-warning'>No tiene artículos, por favor, cree alguno</div>";
			}else{
				var mostrar = "<div class='alert alert-warning'>Esta lista no tiene artículos, por favor, espere</div>";
			}
		} else {
			// Muestro todos los artículos en formato de tabla.
			var mostrar = "<table border='1' id='article_table' class='table'><thead><tr><th>Nombre</th><th>Descripción</th><th>Cantidad</th><th>Url</th><th>Comprado</th><th>	</th></tr></thead>";
			for (var i = 0; i < this.model.articulos.length; i++) {
				if (user_actual != this.user_propietario) {
					mostrar += "<tr>";
					mostrar += "<td>"+this.model.articulos[i].nombre+"</td>";
					mostrar += "<td>"+this.model.articulos[i].descripcion+"</td>";
					mostrar += "<td>"+this.model.articulos[i].cantidad+"</td>";
					mostrar += "<td>"+this.model.articulos[i].url+"</td>";
					if (!this.model.articulos[i].comprador) {
						mostrar += "<td>Sin comprar</td>";
						mostrar += "<td><button type='button' id='"+this.model.articulos[i].id+"' class='comprar btn btn-info'>Comprar Artículo</button></td>"
					} else if (this.model.articulos[i].comprador != user_actual) {
						mostrar += "<td>"+this.model.articulos[i].comprador+"</td>";
						mostrar += "<td>Sin acción posible</td>";
					} else {
						mostrar += "<td>Tú</td>";
						mostrar += "<td><button type='button' id='"+this.model.articulos[i].id+"' class='devolver btn btn-danger'>Devolver</button></td>"
					}
				} else {
					mostrar += "<tr>";
					mostrar += "<td><input type='text' id='nombre' class='input_lista "+this.model.articulos[i].id+"' value='"+this.model.articulos[i].nombre+"'></td>";
					mostrar += "<td><input type='text' id='descripcion' class='input_lista "+this.model.articulos[i].id+"' value='"+this.model.articulos[i].descripcion+"'></td>";
					mostrar += "<td><input type='text' id='cantidad' class='input_lista "+this.model.articulos[i].id+"' value='"+this.model.articulos[i].cantidad+"'></td>";
					mostrar += "<td><input type='text' id='url' class='input_lista "+this.model.articulos[i].id+"' value='"+this.model.articulos[i].url+"'></td>";
					mostrar += "<td></td>";
				}
				
				if(user_actual == this.user_propietario) {
					mostrar += "<td><button type='button' id="+this.model.articulos[i].id+" class='modificar btn btn-success'>Modificar Artículo</button>";
					mostrar += "<button type='button' id="+this.model.articulos[i].id+" class='eliminar btn btn-danger'>Eliminar Artículo</button></td>";
				}
				
				mostrar += "</tr>";
			}
		mostrar += "</table>";
		}
		
		if(user_actual == this.user_propietario) {
			var body_modal = "<div class='form-group'><label for='nombre_art'>Nombre</label>";
			body_modal += "<input type='text' id='nombre_art' class='form-control' autofocus='autofocus' autocomplete='off' required='required'></div>";
			body_modal += "<div class='form-group'><label for='nombre_art'>Descripcion</label>";
			body_modal += "<input type='text' id='desc_art' class='form-control' autofocus='autofocus' autocomplete='off' required='required'></div>";
			body_modal += "<div class='form-group'><label for='nombre_art'>Cantidad</label>";
			body_modal += "<input type='text' id='cant_art' class='form-control' autofocus='autofocus' autocomplete='off' required='required'></div>";
			body_modal += "<div class='form-group'><label for='nombre_art'>Url Ejemplo</label>";
			body_modal += "<input type='text' id='url_art' class='form-control' autofocus='autofocus' autocomplete='off' required='required'></div>";
			body_modal += "</div>";
			mostrar += "<a href='http://localhost/enlistalo/listas/eliminar/"+this.id_lista+"'><button type='button' class='eliminar-lista btn btn-danger'>Eliminar Lista</button></a>";
			mostrar += "<button type='button' class='btn btn-info' data-toggle='modal' data-target='#crear_articulo'>Añadir Artículo</button>";
			mostrar += "<button type='button' class='invitar btn btn-default'>Invitar amigos</button>";
			mostrar += this.crear_modal("crear_articulo","Crear Artículo",body_modal);
		}
		
		$("#content-wrapper").html(mostrar);
		
		// Tabla con formato de datatable.
		$("#article_table").DataTable();
	}
	
	this.crear_modal = function(id_modal,header_modal,body_modal) {
		var modal = "<div id='"+id_modal+"' class='modal fade funcion-modal' role='dialog'>";
		modal += "<form action='' id='aniadir_articulo' method='POST'>";
		modal += "<div class='modal-dialog'>";
		modal += "<div class='modal-content'>";
		modal += "<div class='modal-header' style='background-color:#87CEFA;color:white;border-radius:5px;'>";
		modal += "<button type='button' class='close' data-dimiss='modal'>&times;</button>";
		modal += "<h3 class='modal-title'>"+header_modal+"</h3>";
		modal += "</div>";
		modal += "<div class='modal-body'>";
		modal += body_modal;
		modal += "<div class='modal-footer'>";
		modal += "<button id='btn-crear' class='btn btn-info' type='submit'>Añadir artículo</button>";
		modal += "</form>";
		modal += "</div>";
		modal += "</div>";
		modal += "</div>";
		modal += "</div>";
		return modal;
	}
}