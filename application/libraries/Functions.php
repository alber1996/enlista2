<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Functions extends CI_Email{
	private $CI;
	
	public function __construct() {
		$this->CI = get_instance();
	}
	
	// Enviar e-mail.
	function send_mail($emailto,$subject,$message) {
		@$this->CI->load->library("email");

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
		echo "asasa";
		@$this->CI->email->initialize($configGmail);
		@$this->CI->email->from('enlistalo');
		@$this->CI->email->to($emailto);
		@$this->CI->email->subject($subject);
		@$this->CI->email->message($message);
		@$this->CI->email->send();
	}
}
?>