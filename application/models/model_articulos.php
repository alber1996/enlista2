<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_articulos extends CI_Model {
	/*
	| Función que devuelve todos los artículos contenidos en una lista.
	| @param $id. ID de la lista de la cual queremos obtener los artículos. 
	*/
	public function ver_articulos($id) {
		$this->db->select("lista_articulo.nom_user_comprador as nom_user_comprador");
		$this->db->select("articulo.id_articulo as id_articulo");
		$this->db->select("articulo.nom_articulo as nom_articulo");
		$this->db->select("articulo.desc_articulo as desc_articulo");
		$this->db->select("articulo.cant_articulo as cant_articulo");
		$this->db->select("articulo.urlejemplo_articulo as urlejemplo_articulo");
 		$this->db->from('lista_articulo');
        $this->db->join('articulo','lista_articulo.id_articulo = articulo.id_articulo','INNER');
        $this->db->like('lista_articulo.id_lista',$id);
        $consulta = $this->db->get();
        $result = $consulta->result_array();
        return $result;
	}
	
	public function creador_lista($id) {
		$this->db->select("listas.creador_lista as creador_lista");
		$this->db->from('listas');
		$this->db->like('listas.id_lista',$id);
		$consulta = $this->db->get();
        $result = $consulta->result_array();
        return $result;
	}
	
	/*
	| Función para insertar datos en la tabla articulo y lista_articulo
	| @param $articulos. Array asociativo en el que se encuentran los datos.
	| @param $id. ID de la lista en la que vas a insertar los artículos.
	*/
	public function insertar_articulos($articulos, $id) {
		if (!is_array($articulos)) {
			return false;
		}
	
		if(!$this->db->insert("articulo",$articulos)) {
			return false;
		}
		
		$id_articulo = $this->db->insert_id();
		
		$lista_articulo = array(
			"id_lista" => $id,
			"id_articulo" => $id_articulo
		);
		
		if(!$this->db->insert("lista_articulo",$lista_articulo)) {
			return false;
		}
			
		return $id_articulo;
	}
	
	/*
	| Función para eliminar datos en la tabla articulo
	| @param $id_articulos. ID del artículo a eliminar.
	*/
	public function eliminar_articulo($id_articulo) {
		$this->db->where("id_articulo",$id_articulo);
		if($this->db->delete("articulo")) {
			return true;
		} else {
			return false;
		}
	}
	
	/*
	| Función para actualizar todos los campos de un artículo
	| @param $articulo. Artículo nuevo
	*/
	public function modificar_articulo($articulo,$id_articulo) {
		if(!is_array($articulo)) {return false;}
		$this->db->where("id_articulo",$id_articulo);
		if($this->db->update('articulo',$articulo)) {
			return true;
		} else {
			return false;
		}
	}
}
?>