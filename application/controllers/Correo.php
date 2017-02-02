<?php
	class Correo extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
		}
		function enviar_correo($destinatario, $asunto, $mensaje) {
			$config = Array(        
	            'protocol' => 'sendmail',
	            'smtp_host' => 'your domain SMTP host',
	            'smtp_port' => 25,
	            'smtp_user' => 'SMTP Username',
	            'smtp_pass' => 'SMTP Password',
	            'smtp_timeout' => '4',
	            'mailtype'  => 'html', 
	            'charset'   => 'iso-8859-1'
	        );
			$this->load->library('email',$config);
			$this->email->from('briandacebreros@gmail.com', 'MenteNET');
			$this->email->to($destinatario);
			$this->email->subject($asunto);
			$this->email->message($mensaje);

			return $this->email->send();
		}
		function registro_exitoso() {
			$destinatario = $_POST['correo'];
			$asunto = 'MentaNET: Registro exitoso';
			$mensaje = $this->get_mensaje_registro_exitoso();
			$vista = '';
			if ( $this->enviar_correo($destinatario, $asunto, $mensaje) ) {
				redirect(base_url() . 'admin');
			} else {
				redirect(base_url() . 'admin/calendario');
			}
		}
		function cita_eliminada() {
			$destinatario = $_POST['correo'];
			$asunto = 'MentaNET: Cita cancelada';
			$mensaje = $this->get_mensaje_cita_eliminada();
			$vista = '';
			if ( $this->enviar_correo($destinatario, $asunto, $mensaje) ) {
				redirect(base_url() . 'admin');
			} else {
				redirect(base_url() . 'admin/calendario');
			}
		}
		function link_agregado() {
			$destinatario = $_POST['correo'];
			$asunto = 'MentaNET: Link agregado';
			$mensaje = $this->get_mensaje_link_agregado();
			$vista = '';
			if ( $this->enviar_correo($destinatario, $asunto, $mensaje) ) {
				redirect(base_url() . 'admin');
			} else {
				redirect(base_url() . 'admin/calendario');
			}
		}
		function cita_agendada() {
			$destinatario = $_POST['correo'];
			$asunto = 'MentaNET: Cita agendada';
			$mensaje = $this->get_mensaje_cita_agendada($_POST);
			$vista = '';
			if ( $this->enviar_correo($destinatario, $asunto, $mensaje) ) {
				redirect(base_url() . 'admin');
			} else {
				redirect(base_url() . 'admin/calendario');
			}
		}
		
		function get_mensaje_registro_exitoso() {
			$mensaje = '
				<HTML>
				<HEAD></HEAD>
				<BODY>
					<h1 style="font-size: 16px; color: red;">MENSAJE PRUEBA</h1><br>
					<p style="color:purple">Aqui va todo el texto del registro exitoso</p>
				</BODY>
				<HTML>
				
			';
			return $mensaje;
		}
		function get_mensaje_cita_eliminada() {
			$mensaje = '
				<HTML>
				<HEAD></HEAD>
				<BODY>
					<h1 style="font-size: 16px; color: red;">MENSAJE PRUEBA</h1><br>
					<p style="color:purple">Aqui va todo la confirmacion de que la cita se ha cancelado</p>
				</BODY>
				<HTML>
				
			';
			return $mensaje;
		}
		function get_mensaje_link_agregado() {
			$mensaje = '
				<HTML>
				<HEAD></HEAD>
				<BODY>
					<h1 style="font-size: 16px; color: red;">MENSAJE PRUEBA</h1><br>
					<p style="color:purple">Aqui va todo aviso de que el link de la cita se ha agregado</p>
				</BODY>
				<HTML>
				
			';
			return $mensaje;
		}
		function get_mensaje_cita_agendada($datos) {
			$mensaje = '
				<HTML>
				<HEAD></HEAD>
				<BODY>
					<h1 style="font-size: 16px; color: red;">MENSAJE PRUEBA</h1><br>
					<p style="color:purple">Aqui va los datos de la cita agendada</p>
				</BODY>
				<HTML>
				
			';
			return $mensaje;
		}
}