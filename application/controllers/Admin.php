<?php
	include_once (dirname(__FILE__) . "/Correo.php");
	class Admin extends Correo
	{
		function __construct()
		{
			parent::__construct();
		}
		
		public function index() {
			if(@$_SESSION['tipo_usuario'] == 'admin') {
				$data['contenido_principal'] = 'admin';
				$this->load->view('estructura/templete', $data);
			}
			else {
				redirect(base_url());
			}
		}
		function admin() {
			if(@$_SESSION['tipo_usuario'] == 'admin') {
				$data['contenido_principal'] = 'admin';
				$this->load->view('estructura/templete', $data);
			}
			else {
				redirect(base_url());
			}
		}
		function clientes() {
			if(@$_SESSION['tipo_usuario'] == 'admin') {
				$data['contenido_principal'] = 'clientes';
				$this->load->model('sitio_model');
          		$data['usuarios'] = $this->sitio_model->get_usuarios();
				$this->load->view('estructura/templete', $data);
			}
			else {
				redirect(base_url());
			}
		}
		function cliente($id) {
			if(@$_SESSION['tipo_usuario'] == 'admin') {
				$data['contenido_principal'] = 'cliente';
				$this->load->model('sitio_model');
          		$data['cliente'] = $this->sitio_model->get_usuario($id);
          		$data['historial'] = $this->sitio_model->get_historial($id);
          		$data['citas_futuras'] = $this->sitio_model->get_citas_by_usuario($id);
          		$data['citas_pasadas'] = $this->sitio_model->get_citas_pasadas_by_usuario($id);
          		$data['convenios'] = $this->sitio_model->get_convenios();
				$this->load->view('estructura/templete', $data);
			}
			else {
				redirect(base_url());
			}
		}
		function cita($id) {
			if(@$_SESSION['tipo_usuario'] == 'admin') {
				$data['contenido_principal'] = 'cita';
				$this->load->model('sitio_model');
          		$data['cita'] = $this->sitio_model->get_cita($id);
				$this->load->view('estructura/templete', $data);
			}
			else {
				redirect(base_url());
			}
		}
		function citas(){
			if(@$_SESSION['tipo_usuario'] == 'admin') {
				$data['contenido_principal'] = 'citas';
				$this->load->model('sitio_model');
          		$data['citas'] = $this->sitio_model->get_citas();
				$this->load->view('estructura/templete', $data);
			}
			else {
				redirect(base_url());
			}
		}
		function calendario($week = null, $year = null ) {
			if(@$_SESSION['tipo_usuario'] == 'admin') {
				$data['contenido_principal'] = 'calendario';
				$this->load->model('sitio_model');
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
	                	redirect(base_url() . 'admin/calendario/' . $week_now . '/' . $year_now );
	                }
	                if( $week < $week_now && $year == $year_now ) {
	                	redirect(base_url() . 'admin/calendario/' . $week_now . '/' . $year_now );
	                }
				}

				$data['week'] = $week;
				$data['year'] = $year;

				$data['citas'] = $this->sitio_model->get_citas_by_rango_meses($week, $year);

				$data['usuarios'] = $this->sitio_model->get_usuarios_con_creditos();				
				$this->load->view('estructura/templete', $data);
			}
			else {
				redirect(base_url());
			}
		}
		
		function precios() {
			if(@$_SESSION['tipo_usuario'] == 'admin') {
				$this->load->model('sitio_model');
				$data['convenio'] = $this->sitio_model->get_convenio('6'); // El id nunca va a cambiar
				$data['contenido_principal'] = 'precios';
				$this->load->view('estructura/templete', $data);
			}
			else {
				redirect(base_url());
			}
		}
		function nuevo_cliente() {
			if(@$_SESSION['tipo_usuario'] == 'admin') {
				$data['contenido_principal'] = 'nuevo_cliente';
				$this->load->model('sitio_model');
          		$data['convenios'] = $this->sitio_model->get_convenios();
				$this->load->view('estructura/templete', $data);
			}
			else {
				redirect(base_url());
			}
		}
		function convenios() {
			if(@$_SESSION['tipo_usuario'] == 'admin') {
				
				$this->load->model('sitio_model');
          		$data['convenios'] = $this->sitio_model->get_convenios();
          		$data['contenido_principal'] = 'convenios';
				$this->load->view('estructura/templete', $data);
			}
			else {
				redirect(base_url());
			}
		}



		function cerrar_sesion() {
			session_destroy();
			redirect(base_url());
		}
		function get_usuarios() {
			$this->load->model('sitio_model');
          	$data['usuarios'] = $this->sitio_model->get_usuarios();
		}
		function alta_usuario() {
			$this->load->helper(array('form', 'url'));

			$this->load->library('form_validation');
			$this->form_validation->set_rules('username', 'Username', 'callback_username_check');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

			$this->form_validation->set_message('error_username', '{field} must have at least {param} characters.');


			if ($this->form_validation->run() == FALSE)
                {
                    $data['contenido_principal'] = 'nuevo_cliente';
					$this->load->view('estructura/templete', $data);	
                }
                else
                {
                	if ($this->sitio_model->alta_usuario($_POST) ) {
                		redirect(base_url() . 'admin/clientes');
					}
                }
		}
		public function username_check($usuario)
        {
        	$this->load->model('sitio_model');
        	return $this->sitio_model->check_usuario($usuario);
        }
		function actualizar_usuario() {
			$this->load->model('sitio_model');
			if ( $this->sitio_model->actualizar_usuario($_POST) ) {
				redirect(base_url() . 'admin/clientes');
			}
			else {
				$data['mensaje'] = 'Ha ocurrido un error';
			}
		}
		function eliminar_usuario() {
			$this->load->model('sitio_model');
			if ( $this->sitio_model->eliminar_usuario($_POST) ) {
				redirect(base_url() . 'admin/clientes');
			}
			else {
				$data['mensaje'] = 'Ha ocurrido un error';
			}
		}
		function agregar_historial_clinico() {
			$this->load->model('sitio_model');
			if($this->sitio_model->agregar_historial_clinico($_POST)) {
				redirect(base_url() . 'principal/agendar');
	        }
			else {
	            $data['mensaje'] = "Error";
	            redirect(base_url() . 'principal/portal');
          	}
          	redirect(base_url());
		}

		function agendar_cita() {
			$this->load->model('sitio_model');

			if($this->sitio_model->agendar_cita($_POST)) {
				redirect(base_url() . 'admin/calendario/' . $_POST['week'] . '/' . $_POST['year']);
	        }
			else {
	            $data['mensaje'] = "Error";
	            redirect(base_url() . 'admin/calendario');
          	}
          	redirect(base_url());
		}
		function agendar_cita_admin() {
			$this->load->model('sitio_model');
			if($this->sitio_model->agendar_cita_admin($_POST)) {
				if( $this->cita_agendada($_POST) ) {
					redirect(base_url() . 'admin/calendario/' . $_POST['week'] . '/' . $_POST['year']);
				}
	        }
			else {
	            $data['mensaje'] = "Error";
	            redirect(base_url() . 'admin/calendario');
          	}
          	redirect(base_url());
		}
		function agregar_link_cita() {
			$this->load->model('sitio_model');
			if ( $this->sitio_model->agregar_link_cita($_POST) ) {
				//if( $this->link_agregado($_POST) ) {
					redirect(base_url() . 'admin/cita/' . $_POST['citaID']);
				//}
				
			}
			else {
				$data['mensaje'] = 'Ha ocurrido un error';
			}
		}
		function editar_link_cita() {
			$this->load->model('sitio_model');
			if ( $this->sitio_model->edit_link_cita($_POST) ) {
				redirect(base_url() . 'admin/citas');
			}
			else {
				$data['mensaje'] = 'Ha ocurrido un error';
			}
		}
		function cancelar_cita() {
			$this->load->model('sitio_model');
			if ( $this->sitio_model->cancelar_cita($_POST) ) {
				if( $this->cita_eliminada($_POST) ) {
					redirect(base_url() . 'admin/calendario');
				}
			}
			else {
				$data['mensaje'] = 'Ha ocurrido un error';
			}
		}
		function desbloquear_cita() {
			$this->load->model('sitio_model');
			if ( $this->sitio_model->desbloquear_cita($_POST) ) {
				redirect(base_url() . 'admin/calendario/' . $_POST['week'] . '/' . $_POST['year'] );
			}
			else {
				$data['mensaje'] = 'Ha ocurrido un error';
			}
		}

		function agregar_convenio() {
			$this->load->model('sitio_model');
			if ( $this->sitio_model->agregar_convenio($_POST) ) {
				redirect(base_url() . 'admin/convenios');
			}
			else {
				$data['mensaje'] = 'Ha ocurrido un error';
			}
		}
		function eliminar_convenio() {
			$this->load->model('sitio_model');
			if ( $this->sitio_model->eliminar_convenio($_POST)) {
				redirect(base_url() . 'admin/convenios' );
			}
			else {

			}
		}
		function editar_convenio() {
			$this->load->model('sitio_model');
			if ( $this->sitio_model->editar_convenio($_POST)) {
				if( $_POST['convenioID'] != '6') {
					redirect(base_url() . 'admin/convenios' );
				}
				else {
					redirect(base_url() . 'admin/precios' );
				}
			}
			else {

			}
		}

	

	}