<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ver_listas extends CI_Controller {
	public function index(){
		$this->load->view('menu');
		$this->load->view('lista_user');
		$this->load->view('footer');
	}
}