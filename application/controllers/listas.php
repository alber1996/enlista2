<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listas extends CI_Controller {

	public function index() {
		$this->load->view('menu');
		$this->load->model('model_listas');
		$res = $this->model_listas->ver_listas();
		$resultado = array('resultado' => $res->result_array());
		$this->load->view('verlista',$resultado);
		$this->load->view('footer');
	}
	public function ver_listas(){
		$this->load->view('menu');
		$this->load->view('lista_user');
		$this->load->view('footer');
	}
	/* Función para ver los tipos de lista alojados en la base de datos */
	public function vertipo(){
		$this->load->model('model_listas');
		$this->model_listas->ver_tipo();

	}
	
	/* Función para insertar en la base de datos las listas creadas */
	public function crear_lista() {
		$this->load->model('model_listas');
		$crear=$this->model_listas->crear_lista($_REQUEST['nom_lista'],$_REQUEST['desc_lista'],$_REQUEST['tipo_lista']);
		
		if($crear){
			header("Location: ".base_url()."listas/ver_listas/".$crear);
		}
	}
	
	public function eliminar($id_lista) {
		$this->load->model("model_listas");
		if($this->model_listas->eliminar_lista($id_lista)) {
			header("Location: ".base_url()."listas");
		}
	}
}