<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_amigos extends CI_Model {

	public function ver_usuarios($user){
		$this->db->select('username_user');
		$this->db->from('usuarios');
		$this->db->where('username_user',$user);
		$consulta = $this->db->get();
		$result = $consulta->result_array();
		return $result;
	}
}