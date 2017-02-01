<?php
	class Principal extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
		}
		
		public function index() {
			
			//$data = $this->sitio_model->get_datos_generales();
			if(@$_SESSION['tipo_usuario'] == '')
				redirect(base_url() . 'principal/login');
			if(@$_SESSION['tipo_usuario'] == 'normal')
				redirect(base_url() . 'principal/portal');
			if(@$_SESSION['tipo_usuario'] == 'admin')
				redirect(base_url() . 'admin/index');
			//$data['contenido_principal'] = 'principal';
			//$this->load->view('estructura/templete', $data);
			
			
			
			$data['contenido_principal'] = 'login';
			//$_SESSION['mensaje'] = 'sin mensaje';
			//$data['mensaje'] = 'Sin accion todavia';
			//$this->load->model('sitio_model');
			//$data = $this->sitio_model->get_datos_generales();
			$this->load->view('estructura/templete', $data);

		}
		function portal() {
			if(@$_SESSION['tipo_usuario'] == 'normal') {
				$data['citas'] = $this->sitio_model->get_citas_by_usuario($_SESSION['id']);
				$data['contenido_principal'] = 'portal';
				$this->load->view('estructura/templete', $data);
			}
			else {
				redirect(base_url());
			}
		}
		function login() {
			if(@$_SESSION['tipo_usuario'] == 'normal')
				redirect(base_url() . 'principal/portal');
			if(@$_SESSION['tipo_usuario'] == 'admin')
				redirect(base_url() . 'principal/admin');
			$data['contenido_principal'] = 'login';
			$this->load->view('estructura/templete', $data);
		}
		function signup() {
			if(@$_SESSION['tipo_usuario'] == 'normal')
				redirect(base_url() . 'principal/portal');
			if(@$_SESSION['tipo_usuario'] == 'admin')
				redirect(base_url() . 'principal/admin');
			$data['contenido_principal'] = 'signup';
			$this->load->view('estructura/templete', $data);
		}
		function administrador() {
			if(@$_SESSION['tipo_usuario'] == 'admin') {
				$data['contenido_principal'] = 'admin';
				$this->load->view('estructura/templete', $data);
			}
			else {
				redirect(base_url());
			}
		}
		function agendar() {
			if(@$_SESSION['tipo_usuario'] == '')
				redirect(base_url());
			$this->load->model('sitio_model');
          		$data['cuenta'] = $this->sitio_model->get_usuario($_SESSION['id']);
			$data['contenido_principal'] = 'agendar';
			$this->load->view('estructura/templete', $data);
		}
		function editar_cuenta() {
			if(@$_SESSION['tipo_usuario'] == '')
				redirect(base_url());
			$this->load->model('sitio_model');
          		$data['cuenta'] = $this->sitio_model->get_usuario($_SESSION['id']);
			$data['contenido_principal'] = 'editar_cuenta';
			$this->load->view('estructura/templete', $data);	
		}
		function mi_cuenta() {
			if(@$_SESSION['tipo_usuario'] == '')
				redirect(base_url());
			$this->load->model('sitio_model');
          	$data['cuenta'] = $this->sitio_model->get_usuario($_SESSION['id']);
			$data['contenido_principal'] = 'mi_cuenta';
			$this->load->view('estructura/templete', $data);	
		}
		function comprar_creditos() {
			if(@$_SESSION['tipo_usuario'] == '')
				redirect(base_url());
			$this->load->model('sitio_model');
          		$data['cuenta'] = $this->sitio_model->get_usuario($_SESSION['id']);
			$data['contenido_principal'] = 'comprar_creditos';
			$this->load->view('estructura/templete', $data);	
		}
		function historial_clinico() {
			if(@$_SESSION['tipo_usuario'] == '')
				redirect(base_url());
			$this->load->model('sitio_model');
          	$data['cuenta'] = $this->sitio_model->get_usuario($_SESSION['id']);
			$data['contenido_principal'] = 'historial_clinico';
			$this->load->view('estructura/templete', $data);	
		}






		public function iniciar_sesion() {
			$this->load->model('sitio_model');
			$this->load->helper('url');
			if($this->sitio_model->iniciar_sesion($_POST['usuario'], $_POST['contrasena'])) {

				//$data['contenido_principal'] = 'portal';
				//$this->load->view('estructura/templete', $data);
				redirect(base_url()) . 'principal/signup';

			} else {
				//$_SESSION['mensaje'] = 'Usuario y/o contrasena incorrecta';
				//$data['contenido_principal'] = 'login';
				//$this->load->view('estructura/templete', $data);
				redirect(base_url());
			}

		}
		function cerrar_sesion() {
			session_destroy();
			redirect(base_url());
		}
		



		function agendar_cita() {
			$this->load->model('sitio_model');

			if($this->sitio_model->agendar_cita($_POST)) {

	        }
			else {
	            $data['mensaje'] = "Error";
	            redirect(base_url() . 'principal/agendar');
          	}
          	redirect(base_url());
		}







		function alta_usuario() {
			//$_SESSION['error_username'] = '';
            //$_SESSION['error_correo'] = '';
            

			$this->load->helper('url');
			$this->load->model('sitio_model');

			if($this->sitio_model->alta_usuario($_POST, 'by_admin')) {

	        }
			else {
	            $data['mensaje'] = "Error";
	            redirect(base_url() . 'principal/signup');
          	}
          	redirect(base_url());

		}
		function actualizar_usuario() {
			$this->load->model('sitio_model');
			if ( $this->sitio_model->actualizar_usuario($_POST) ) {
				redirect(base_url() . 'principal/editar_cuenta');
			}
			else {
				$data['mensaje'] = 'Ha ocurrido un error';
			}
		}
		function eliminar_usuario() {
			$this->load->model('sitio_model');
			if ( $this->sitio_model->eliminar_usuario($_POST) ) {
				session_destroy();
				redirect(base_url());
				redirect(base_url() . 'principal/login');
			}
			else {
				$data['mensaje'] = 'Ha ocurrido un error';
			}
		}

		


	}