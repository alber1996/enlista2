<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller {

	public function index() {
		session_start();
		
		if(!isset($_SESSION['user'])) {
			session_destroy();
			$this->load->view('menu');
			$this->load->view('index');
			$this->load->view('footer');	
		}
		
		$this->load->model('model_perfil');
		$res = $this->model_perfil->ver_perfil($_SESSION['user']);
		session_write_close();
		$resultado = array('resultado' => $res);
		$this->load->view('menu');
		$this->load->view('perfil',$resultado);
		$this->load->view('footer');
	}
	
	public function validar_clave($claveavalidar) {
		session_start();
		$username = $_SESSION['user'];
		
		$this->load->model('model_perfil');
		$clave = $this->model_perfil->devolver_campo('contr_user',$username);
		if(md5($claveavalidar) == $clave) {
			exit(json_encode(array("data"=>true)));
		} else {
			exit(json_encode(array("data"=>false)));
		}
	}
	
	public function modificar_perfil() {
		session_start();
		$username = $_SESSION['user'];
		
		
		$this->load->model('model_perfil');
		$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : $this->model_perfil->devolver_campo('username_user',$username);
		$correo = isset($_POST['email']) ? $_POST['email'] : $this->model_perfil->devolver_campo('email_user',$username);
		$clave = (isset($_POST['clave_nueva']) && $_POST['clave'] != null) ? md5($_POST['clave']) : $this->model_perfil->devolver_campo('contr_user',$username);
		
		$_SESSION['user'] = $usuario;
		$data = array(
			"username_user" => $usuario,
			"email_user" => $correo,
			"contr_user" => $clave
		);
		session_write_close();
		if($this->model_perfil->modificar_perfil($username, $data)) {
			header("Location: ".base_url()."perfil");
		}
		
	}
	
}