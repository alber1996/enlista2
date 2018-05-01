<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_usuarios extends CI_Controller {

	public function login($username,$passwd) {
		$this->load->database('default');
		/*Comprueba el login*/
		$query = $this->db->get_where("usuarios",array("username_user" => $username,
												  "contr_user" => md5($passwd)));

		$row = $query->result_array();

		if (empty($row)) {
			return false;
		}
		
		if (is_array($row)) {
			return true;
		}
		
		$this->db->close();
	}

	public function registrar_usuario($username,$email,$passwd) {
		$this->load->database('default');
		/*Si el registro es correcto se enviará un correo al usuario para cambiar la clave de acceso*/
		$query = $this->db->get_where('usuarios',array("username_user" => $username));
		$row = $query->row();

		if (isset($row)) {
			return false;
		}

		$this->db->set("username_user",$username);
		$this->db->set("email_user",$email);
		$this->db->set("contr_user",md5($passwd));

		if ($this->db->insert("usuarios")) {
			$this->db->close();
			return $username;
		} else {
			$this->db->close();
			return false;
		}

	}

}