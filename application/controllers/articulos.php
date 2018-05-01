<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articulos extends CI_Controller {

	public function ver_articulos() {
		if(!isset($_REQUEST['id'])) {return false;}
		$id = $_REQUEST['id'];
		$this->load->model('model_articulos');
		$resultado = $this->model_articulos->ver_articulos($id);
		exit(json_encode(array("data"=>$resultado)));
	}
	
	public function ver_creador() {
		if(!isset($_REQUEST['id'])) {return false;}
		$id = $_REQUEST['id'];
		$this->load->model('model_articulos');
		$resultado = $this->model_articulos->creador_lista($id);
		exit(json_encode(array("data"=>$resultado)));
	}
	
	public function aniadir_articulo() {
		if(!isset($_REQUEST['data'])) {return false;}
		$data = $_REQUEST['data'];
		$id = substr($data, 0, strpos($data,","));
		$data = substr($data, strpos($data,",")+1);

		if(!$data = explode(",",$data)) {
			return false;
		}
		
		if(sizeOf($data) != 4) {
			return false;
		}
		
		$data = array(
			"id_articulo"	=> "",
			"nom_articulo" 	=> $data[0],
			"desc_articulo"	=> $data[1],
			"cant_articulo"	=> $data[2],
			"urlejemplo_articulo" => $data[3]
		);
		
		$this->load->model('model_articulos');
		$resultado = $this->model_articulos->insertar_articulos($data,$id);
		
		if(!$resultado) {
			return false;
		}
		
		exit(json_encode(array("data"=>$resultado)));
	}
	
	public function eliminar_articulo() {
		if(!isset($_REQUEST['id'])) {return false;}
		$id = $_REQUEST['id'];
		
		$this->load->model('model_articulos');
		$resultado = $this->model_articulos->eliminar_articulo($id);
		
		exit(json_encode(array("data"=>$resultado)));
	}
	
	public function modificar_articulo() {
		if(!isset($_REQUEST['data'])) {return false;}
		$data = $_REQUEST['data'];
		$id = substr($data, 0, strpos($data,","));
		$data = substr($data, strpos($data,",")+1);

		if(!$data = explode(",",$data)) {
			return false;
		}
		
		$data = array(
			"nom_articulo" 	=> $data[0],
			"desc_articulo"	=> $data[1],
			"cant_articulo"	=> $data[2],
			"urlejemplo_articulo" => $data[3]
		);
		
		$this->load->model('model_articulos');
		$resultado = $this->model_articulos->modificar_articulo($data,$id);
		
		if(!$resultado) {
			return false;
		}
		
		exit(json_encode(array("data"=>$resultado)));
	}
	
	public function comprar_articulo($id_art, $comprador) {
		$this->load->model('model_lista_articulo');
		$resultado = $this->model_lista_articulo->comprar_articulo($id_art, $comprador);
		
		exit(json_encode(array("data"=>$resultado)));
	}
	
	public function devolver_articulo($id_art) {
		$this->load->model('model_lista_articulo');
		$resultado = $this->model_lista_articulo->comprar_articulo($id_art);
		
		exit(json_encode(array("data"=>$resultado)));
	}
}