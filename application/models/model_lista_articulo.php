<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_lista_articulo extends CI_Model {

	public function comprar_articulo($id_articulo, $user_comprador = NULL){
		$this->db->where('id_articulo',$id_articulo);
		
		$datos = array(
			"nom_user_comprador" => $user_comprador
		);
		
		if($this->db->update('lista_articulo',$datos)) {
			return true;
		} else {
			return false;
		}
	}
}