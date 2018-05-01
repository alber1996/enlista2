function Model_articulos() {
	this.articulos = new Array();
	
	this.add_articulo = function(id,nombre,descripcion,cantidad,url,comprador) {
		this.articulos.push({ 
			id: id,
			nombre : nombre, 
			descripcion : descripcion, 
			cantidad : cantidad, 
			url : url, 
			comprador : comprador 
		});
	}
	
	this.drop_articulo = function(id) {
		for(var i = 0; i < this.articulos.length; i++) {
			if(this.articulos[i].id == id) {
				this.articulos.splice(i,1);
			}
		}
	}
	
	this.update_articulo = function(id,nombre,descripcion,cantidad,url,comprador) {
		for(var i = 0; i < this.articulos.length; i++) {
			if(this.articulos[i].id == id) {
				this.articulos[i].nombre = nombre,
				this.articulos[i].descripcion = descripcion,
				this.articulos[i].cantidad = cantidad,
				this.articulos[i].url = url,
				this.articulos[i].comprador = comprador
			}
		}
		console.log(this.articulos);
	}
	
	this.comprar_articulo = function(id,comprador) {
		for(var i = 0; i < this.articulos.length; i++) {
			if(this.articulos[i].id == id) {
				this.articulos[i].comprador = comprador
			}
		}
	}
	
	this.devolver_articulo = function(id) {
		for(var i = 0; i < this.articulos.length; i++) {
			if(this.articulos[i].id == id) {
				this.articulos[i].comprador = null
			}
		}
	}
}