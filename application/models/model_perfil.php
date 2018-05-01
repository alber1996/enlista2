<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_perfil extends CI_Controller {

	public function ver_perfil($nombre_ususario) {
		$this->db->select('username_user');
		$this->db->select('email_user');
		$this->db->where("username_user", $nombre_ususario);
		$consulta = $this->db->get("usuarios");
		
		if($consulta) {
			return $consulta->result_array();
		} else {
			return false;
		}
	}
	
	public function modificar_perfil($nombre_usuario,$datos) {
		if(!is_array($datos)) {return false;}
		
		$this->db->where("username_user", $nombre_usuario);
		
		if($this->db->update('usuarios',$datos)) {
			return true;
		} else {
			return false;
		}
	}
	
	public function devolver_campo($campo,$nombre_usuario) {
		$this->db->select($campo);
		$this->db->where("username_user", $nombre_usuario);
		$consulta = $this->db->get("usuarios");
		
		if($consulta) {
			$aux = $consulta->result_array();
			return $aux[0][$campo];
		} else {
			return false;
		}
	}

	public function ver_contraseña() {
		session_start();
		$this->db->select('contr_user');
		$this->db->where("username_user", $_SESSION['user']);
		$consulta = $this->db->get("usuarios");
		
		if($consulta) {
			return $consulta->result_array();
		} else {
			return false;
		}
	}
}