<?php
	class Login extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
		}
		
		function index()
		{
			/*
			$data = $this->sitio_model->get_datos_generales();
			if(@$_SESSION['tipo'] != '')
				redirect(base_url() . 'principal/inicio');
			$data['contenido_principal'] = 'principal';
			$this->load->view('estructura/templete', $data);
			*/

			/*
			$data['nombre'] = 'La bri';
			$this->load->view('estructura/templete', $data);
			*/

			//$data = $this->sitio_model->get_datos_generales();
			//$data['contenido_principal'] = 'login';
			$data['title'] = 'Sin accion';
			//$this->load->model('sitio_model');
			//$data = $this->sitio_model->get_datos_generales();
			$this->load->view('estructura/templete', $data);
		}
		function login() {
			echo 'Login';
			$data['contenido_principal'] = 'login';
			$data['title'] = 'Sin accion';
			$this->load->view('estructura/templete', $data);
		}
		function signup() {
			$data['contenido_principal'] = 'signup';
			$this->load->view('estructura/templete', $data);
		}

		function registrar_usuario() {
			$this->load->helper('form');
		    $this->load->library('form_validation');

		    $data['title'] = 'Crear nuevo usuario';

		    $this->form_validation->set_rules('usuario', 'Usuario', 'required');
		    $this->form_validation->set_rules('contrasena', 'Contrasena', 'required');

		    if ($this->form_validation->run() === FALSE)
		    {
		    	$data['title'] = 'NO TAN RAPIDO';
		        $data['contenido_principal'] = 'login';
				$this->load->view('estructura/templete', $data);

		    }
		    else
		    {
		        $this->news_model->set_news();
		        $data['title'] = 'CUENTA CREADA';
		        $data['contenido_principal'] = 'login';
				$this->load->view('estructura/templete', $data);
		    }
		}























		function create_member() {
			$this->load->library('form_validation');
			//Validation rules
			$this->form_validation->set_rules('nombre','Nombre', 'trim|required');
			$this->form_validation->set_rules('ap_paterno', 'Apellido Paterno', 'trim|required');
			$this->form_validation->set_rules('ap_materno', 'Apellido Materno', 'trim|required');
			$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|callback_check_if_email_exists');
			$this->form_validation->set_rules('usuario', 'Usuario', 'trim|required|min_length[4]|max_length[20]|callback_check_if_user_exists');
			$this->form_validation->set_rules('contrasena','Contrasena','trim|required|min_length[4]|max_length[20]');
			$this->form_validation->set_rules('confirm_contrasena','Confirmar Contrasena','trim|required|matches[contrasena]');


			if($this->form_validation->run() == FALSE) {
				$data['contenido_principal'] = 'login';
				$this->load->view('estructura/templete', $data);
			}
			else {
				$this->load->model('sitio_model');
				if ($query = $this->sitio_model->create_member()) {
					$data['account_created'] = 'Tu cuenta ha sido creada';
					$data['contenido_principal'] = 'login';
					$this->load->view('estructura/templete', $data);
				}
				else {
					$data['contenido_principal'] = 'signup';
					$this->load->view('estructura/templete', $data);
				}
			}
		}

		function check_if_email_exists($requested_email) {
			return true;
		}
		function check_if_user_exists($requested_user) {
			return true;
		}


	}





































