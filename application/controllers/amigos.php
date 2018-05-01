<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Amigos extends CI_Controller {
	// Comprueba si el usuario existe.
	public function comprobar_usuario($user){
		  $this->load->model('model_amigos');
		  $resultado = $this->model_amigos->ver_usuarios($user);
		  exit(json_encode(array("data"=>$resultado)));
	}

}