<?php
	include_once (dirname(__FILE__) . "/Correo.php");
	class Principal extends Correo
	{
		function __construct()
		{
			parent::__construct();
		}
		
		public function index() {
			if(@$_SESSION['tipo_usuario'] == '')
				redirect(base_url() . 'principal/login');
			if(@$_SESSION['tipo_usuario'] == 'normal') {
				$this->load->model('sitio_model');
				redirect(base_url() . 'principal/portal');
			}
			if(@$_SESSION['tipo_usuario'] == 'admin')
				redirect(base_url() . 'admin/index');
			$data['contenido_principal'] = 'login';
			
			$this->load->view('estructura/templete', $data);

		}
		function portal() {
			if(@$_SESSION['tipo_usuario'] == 'normal') {
				$data['citas'] = $this->sitio_model->get_citas_by_usuario($_SESSION['id']);
				$this->load->model('sitio_model');
				$this->sitio_model->actualizar_sesion($_SESSION['id']);
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
		function mi_cita($id) {
			if(@$_SESSION['tipo_usuario'] == 'normal') {
				$data['contenido_principal'] = 'mi_cita';
				$this->load->model('sitio_model');
				$this->sitio_model->actualizar_sesion($_SESSION['id']);
          		$data['cita'] = $this->sitio_model->get_cita($id);
				$this->load->view('estructura/templete', $data);
			}
			else {
				redirect(base_url());
			}
		}
		function agendar($week = null, $year = null) {
			if(@$_SESSION['tipo_usuario'] == '')
				redirect(base_url());
			$this->load->model('sitio_model');
			$this->sitio_model->actualizar_sesion($_SESSION['id']);
				if( $week == null && $year == null ) {
					$dt = new DateTime;
	                if (isset($year) && isset($week) ) {
	                    $dt->setISODate($year, $week );
	                   
	                } else {
	                    $dt->setISODate($dt->format('o'), $dt->format('W'));
	                }
	                $year = $dt->format('o');
	                $week = $dt->format('W');
				} else {
					$year_temp = null;
					$week_temp = null;
					$dt = new DateTime;
	                if (isset($year_temp) && isset($week_temp) ) {
	                    $dt->setISODate($year, $week_temp );
	                   
	                } else {
	                    $dt->setISODate($dt->format('o'), $dt->format('W'));
	                }
	                $year_now = $dt->format('o');
	                $week_now = $dt->format('W');
	                if( $year < $year_now ) {
	                	redirect(base_url() . 'principal/agendar/' . $week_now . '/' . $year_now );
	                }
	                if( $week < $week_now && $year == $year_now ) {
	                	redirect(base_url() . 'principal/agendar/' . $week_now . '/' . $year_now );
	                }
				}

				$data['week'] = $week;
				$data['year'] = $year;

				$data['citas'] = $this->sitio_model->get_citas_by_rango_meses($week, $year);
			$data['contenido_principal'] = 'agendar';
			$this->load->view('estructura/templete', $data);
		}
		function editar_cuenta() {
			if(@$_SESSION['tipo_usuario'] == '')
				redirect(base_url());
			$this->load->model('sitio_model');
			$this->sitio_model->actualizar_sesion($_SESSION['id']);
          	$data['cuenta'] = $this->sitio_model->get_usuario($_SESSION['id']);
			$data['contenido_principal'] = 'editar_cuenta';
			$this->load->view('estructura/templete', $data);	
		}
		function mi_cuenta() {
			if(@$_SESSION['tipo_usuario'] == '')
				redirect(base_url());
			$this->load->model('sitio_model');
			$this->sitio_model->actualizar_sesion($_SESSION['id']);
          	$data['cuenta'] = $this->sitio_model->get_usuario($_SESSION['id']);
			$data['contenido_principal'] = 'mi_cuenta';
			$this->load->view('estructura/templete', $data);	
		}
		function comprar_creditos() {
			if(@$_SESSION['tipo_usuario'] == '')
				redirect(base_url());
			$this->load->model('sitio_model');
			$this->sitio_model->actualizar_sesion($_SESSION['id']);
			$usuario = $this->sitio_model->get_usuario($_SESSION['id']);
			
          	$data['cuenta'] = $usuario;
          	$data['convenio'] = $this->sitio_model->get_convenio($_SESSION['convenioID']);
			$data['contenido_principal'] = 'comprar_creditos';

			$this->load->view('estructura/templete', $data);	
		}
		function historial_clinico() {
			if(@$_SESSION['tipo_usuario'] == '')
				redirect(base_url());
			$this->load->model('sitio_model');
			$this->sitio_model->actualizar_sesion($_SESSION['id']);
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
				if( $this->cita_agendada($_POST) ) {
					redirect(base_url() . 'principal/portal');
				}
	        }
			else {
	            $data['mensaje'] = "Error";
	            redirect(base_url() . 'principal/agendar');
          	}
          	redirect(base_url());
		}
		function cancelar_cita() {
			$this->load->model('sitio_model');
			if ( $this->sitio_model->cancelar_cita($_POST) ) {
				if( $this->cita_eliminada($_POST) ) {
					redirect(base_url() . 'principal/agendar');
				}
			}
			else {
				$data['mensaje'] = 'Ha ocurrido un error';
			}
		}






		function alta_usuario() {

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