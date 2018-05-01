<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function index() {
		$this->load->view('menu');
		$this->load->view('configuser');
		$this->load->view('footer');
	}
	public function login() {
		$this->load->model('model_usuarios');
		$row = $this->model_usuarios->login($_REQUEST['usuario'],$_REQUEST['clave']);
		session_start();

		if ($row) {
			$_SESSION['user'] = $_REQUEST['usuario'];
			header("Location:".base_url()."listas");
		} else {
			$_SESSION['msj'] = "Error, nombre de usuario y/o contraseña incorrectos";
			header("Location:".base_url());

		}
		
	}

	public function logout() {
		session_start();
		session_destroy();
		header("Location:".base_url());
	}

	public function registro() {
		$this->load->model('model_usuarios');
		
		$row = $this->model_usuarios->registrar_usuario($_REQUEST['usuario'],$_REQUEST['email'],$_REQUEST['clave']);
		session_start();
		
		if ($row) {
			/*Aquí es donde está fallando la llamada a la librería, la librería se encuentra en applications/libraries
			$this->load->library("email");

			$mailto = $_REQUEST['email'];
			$subject = 'Registro';
			$message = '<h2>Gracias por regitrarte en enlistalos</h2><hr><br>Nombre de usuario: '.$_REQUEST["usuario"].'<br>Correo electrónico: '.$_REQUEST["email"].'<br><h1>¡NOS VEMOS CREANDO MUCHAS LISTAS!</h1>';

			//configuracion para gmail
			$configGmail = array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.gmail.com',
				'smtp_port' => 465,
				'smtp_user' => 'noreplyenlistalos@gmail.com',
				'smtp_pass' => 'enlistalo12',
				'mailtype' => 'html',
				'charset' => 'utf-8',
				'newline' => "\r\n"
			);
			
			$this->email->initialize($configGmail);
			$this->email->from('enlistalo');
			$this->email->to($mailto);
			$this->email->subject($subject);
			$this->email->message($message);
			$this->email->send();*/
			
			$_SESSION['user'] = $_REQUEST['usuario'];
			$_SESSION['msj'] = "<h2>Bienvenido</h2>";
		} else {
			$_SESSION['msj'] = "Error, el nombre de usuario y/o el correo ya están registrado";
		}

		header("Location:".base_url());
	}
}