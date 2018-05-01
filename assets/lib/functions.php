<?php
/*Enviar e-mail*/
function sendMail($emailto,$subject,$message) {
	
	$this->load->library("email");
	
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
	$this->email->to($emailto);
	$this->email->subject($subject);
	$this->email->message($message);
	$this->email->send();
}
?>