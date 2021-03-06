<?php
	class Sitio_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}

		
		function actualizar_sesion()
		{
            if( $_SESSION['tipo_usuario'] == 'normal' ) {
                if( $this->get_usuario($_SESSION['id'] ) ) {
                    $usuario = $this->get_usuario($_SESSION['id']);
                    foreach($usuario->result() as $u) {
			             $this->set_datos_sesion_by_usuario($u);
                    }
                }
            }       
		}
		function get_datos_session() {

		}
		public function get_usuarios(){
			$condicion = array(
				'tipo_usuario' 		=> 'normal'
			);
            return $this->db->where($condicion)->order_by("nombre", "asc")->get('usuario');
        }
        public function get_usuarios_con_creditos() {
            $condicion = array(
                'tipo_usuario'      => 'normal',
                'creditos > '          => '0'
            );
            return $this->db->where($condicion)->order_by("nombre", "asc")->get('usuario');
        }
        public function get_usuario($id) {
        	$condicion = array(
        		'usuarioID'	 	=> $id
        	);
        	return $this->db->where($condicion)->get('usuario');
        }
        public function get_historial($id) {
            $condicion = array(
                'usuarioID'     => $id
            );
            return $this->db->where($condicion)->get('historial');
        }
        public function get_citas(){

        	$query = "SELECT C.citaID, U.usuarioID, U.nombre, U.ap_paterno, U.ap_materno, C.fecha, C.hora, C.link FROM `cita` C
                INNER JOIN `usuario` U
                WHERE C.usuarioID = U.usuarioID AND C.estado = 'futura' AND U.usuarioID != '10'
                ORDER BY C.fecha ASC";
        	return $this->db->query($query);
        }
      
        public function get_citas_by_usuario($id) {
        	$condicion = array(
        		'usuarioID'		=> $id,
        		'estado' 		=> 'futura'
        	);
        	return $this->db->where($condicion)->get('cita');
        }
        public function get_citas_pasadas_by_usuario($id) {
            $condicion = array(
                'usuarioID'     => $id,
                'estado'        => 'pasada'
            );
            return $this->db->where($condicion)->get('cita');
        }
        public function get_cita($id) {
            $query = "SELECT C.citaID, U.usuarioID, U.nombre, U.ap_paterno, U.ap_materno, C.fecha, C.hora, C.link, U.correo FROM `cita` C
                INNER JOIN `usuario` U
                WHERE C.usuarioID = U.usuarioID AND C.citaID =" . $id;
            return $this->db->query($query);
        }
        public function get_citas_by_rango_meses($week, $year) {
            $days = $week * 7;

            $mes1 = floor($days/30);
            $mes2 = $mes1 + 1;
            if( strlen($mes1) ==  1 ) {
                $mes1 = '0' . $mes1;
            }
            if( strlen($mes2) == 1 ) {
                $mes2 = '0' . $mes2;
            }
            $query = "SELECT * FROM `cita` WHERE `fecha` LIKE '" . $year . "-" . $mes1 . "-%' OR `fecha` LIKE '" . $year . "-" . $mes2 . "-%' ORDER BY  `fecha` ,  `hora` ASC ";
            return $this->db->query($query);
        }
        public function cancelar_cita($data) {
            // eliminar cita
            // agregar credito a usuario

            $condiciones = array( 
                'citaID'             => $data['citaID']
            );
            $this->aumentar_credito($data['usuarioID']);
            return $this->db->where($condiciones)->delete('cita');


        }
        public function desbloquear_cita($data) {
            $condiciones = array(
                'usuarioID'         => $data['usuarioID'],
                'fecha'             => $data['fecha'],
                'hora'              => $data['hora']
            );
            return $this->db->where($condiciones)->delete('cita');
        }
        public function get_convenios() {
            $query = "SELECT * FROM `convenio` ";
            return $this->db->query($query);

            // return $this->db->where($condiciones)->get('convenio');
        }
        public function get_convenio($id) {
            $condicion = array ( 'convenioID' => $id );
            return $this->db->where($condicion)->get('convenio');
        }
        public function agregar_convenio($data) {
            $datos = array(
                'clave'         => $data['clave'],
                'nombre'        => $data['nombre'],
                'precio_cita'   => $data['precio_cita'],
                'precio_paquete'=> $data['precio_paquete']         
            );  
            return $this->db->insert('convenio',$datos);    
        }
        public function eliminar_convenio($data) {
            $condicion = array (
                'convenioID'    => $data['convenioID']
            );
            $datos = array (
                'convenioID'    => NULL
            );

            $this->db->where($condicion)->update('usuario', $datos);
            return $this->db->where($condicion)->delete('convenio');
        }
        public function editar_convenio($data) {
            $condicion = array (
                'convenioID'    => $data['convenioID']
            );
            $datos = array (
                'precio_cita'       => $data['precio_cita'],
                'precio_paquete'   => $data['precio_paquete']
            );
            return $this->db->where($condicion)->update('convenio',$datos);
        }
        



        public function agendar_cita($data) {
            $this->reducir_credito($data['id']);
            $datos = array(
				'usuarioID' 	=> $data['id'],
				'fecha' 		=> $data['fecha'],
				'hora'			=> $data['hora'],
				'estado'		=> $data['estado'],
				'link'			=> $data['link']             
			);      
            return $this->db->insert('cita',$datos);                        
        }
        public function agendar_cita_admin($data) {
            $this->reducir_credito($data['id']);
            $datos = array(
                'usuarioID'     => $data['id'],
                'fecha'         => $data['fecha'],
                'hora'          => $data['hora'],
                'estado'        => $data['estado'],
                'link'          => $data['link']             
            );
            return $this->db->insert('cita',$datos);                        
        }
        public function reducir_credito($id) {
            $usuario = $this->get_usuario($id);
            foreach( $usuario->result() as $u ) :
                $creditos = $u->creditos;
                $creditos = (int)$creditos - 1;
                $datos = array('creditos' => $creditos);
                $condicion = array('usuarioID' => $u->usuarioID);
                $this->db->where($condicion)->update('usuario', $datos);
            endforeach;
        }
        public function aumentar_credito($id) {
            $usuario = $this->get_usuario($id);
            foreach( $usuario->result() as $u ) :
                $creditos = $u->creditos;
                $creditos = (int)$creditos + 1;
                $datos = array('creditos' => $creditos);
                $condicion = array('usuarioID' => $u->usuarioID);
                $this->db->where($condicion)->update('usuario', $datos);
            endforeach;
        }
        public function agregar_link_cita($data) {
            $link = $data['link'];
            $id = $data['citaID'];

            $condiciones = array (
                'citaID'        => $id
            );
            $datos = array (
                'link'          => $link
            );
            return $this->db->where($condiciones)->update('cita', $datos);
        }
        public function editar_link_cita($data) {
            $condicion = array(
                'citaID'        => $data['citaID']
            );
            $datos = array (
                'link'          => $data['link']
            );
            return $this->db->where($condiciones)->update('cita', $datos);
        }
        















     
		public function alta_usuario($data) {
            $datos = array(
                        'username'      => $data['username'],
                        'contrasena'    => sha1($data['password']),
                        'nombre'        => $data['nombre'],
                        'ap_paterno'    => $data['ap_paterno'],
                        'ap_materno'    => $data['ap_materno'],
                        'correo'        => $data['email'],
                        'telefono'      => $data['telefono'],
                        'convenioID'    => $data['convenioID'],
                        'tipo_usuario'  => 'normal'                 
                    );             
                    return $this->db->insert('usuario',$datos);
                    
                    $this->iniciar_sesion($data['username'], $data['password']);




               //VARIFICANDO QUE NO EXISTA EL USUARIOOO
                    /*
               $condicion_username = array(
                 'username'     => $data['username']
               );
               $condicion_correo = array(
                 'correo' 		=> $data['correo']
               );

               $existe_username = $this->db->where($condicion_username)->get('usuario')->num_rows() > 0;
               $existe_correo = $this->db->where($condicion_correo)->get('usuario')->num_rows() > 0;
               if( $existe_username	 || $existe_correo )
               {
                    //La cuenta ya existe
               		if( $existe_username )
               			$_SESSION['error_username'] = 'Este nombre de usuario ya existe. Favor de elegir otro.';
               		if( $existe_correo )
               			$_SESSION['error_correo'] = 'Este correo ya existe. Favor de elegir otro.';
                    return false;
               }
               else
               {
                    $datos = array(
                    	'username' 		=> $data['username'],
                    	'contrasena' 	=> sha1($data['contrasena']),
                    	'nombre'		=> $data['nombre'],
                    	'ap_paterno'	=> $data['ap_paterno'],
                    	'ap_materno'	=> $data['ap_materno'],
                    	'correo'		=> $data['correo'],
                    	'telefono'		=> $data['telefono'],
                    	'convenioID'	=> $data['convenioID'],
                    	'tipo_usuario'  => 'normal'                 
                    );             
                    $this->db->insert('usuario',$datos);
                    if( $procedencia != 'by_admin') {
                    	iniciar_sesion($data['username'], $data['contrasena']);
                    }
                    return true;
               }          
               */     
        }
        public function actualizar_usuario($data) {
        	$condiciones = array (
        			'usuarioID' 		=> $data['usuarioID']
        		);
        	$datos = array(
                    	'nombre'		=> $data['nombre'],
                    	'ap_paterno'	=> $data['ap_paterno'],
                    	'ap_materno'	=> $data['ap_materno'],
                    	'telefono'		=> $data['telefono'],
                    	'creditos' 		=> $data['creditos'],
                    	'convenioID' 	=> $data['convenioID']
                    );       

        	return $this->db->where($condiciones)->update('usuario', $data);
        }
        public function eliminar_usuario($data) {
        	$condiciones = array( 
        		'usuarioID' 			=> $data['usuarioID']
        	);
        	$this->db->where($condiciones)->delete('cita');
        	return $this->db->where($condiciones)->delete('usuario');
        }

        public function check_usuario($usuario) {
            $condicion_username = array(
                 'username'     => $usuario
               );

               $existe_username = $this->db->where($condicion_username)->get('usuario')->num_rows() > 0;
               if( $existe_username ) {
                    return false;
               } else {
                    return true;
               }           
        }









        public function iniciar_sesion($username, $contrasena) {
			$condiciones = array(
				'username' 		=> $username,
				'contrasena' 	=> sha1($contrasena)
			);

			if($this->db->where($condiciones)->get('usuario')->num_rows() > 0) {
				//EL USUARIO EXISTE
				$_SESSION['mensaje'] = 'Encontro usuario';
				$usuario = $this->db->where($condiciones)->get('usuario')->row();
				$this->set_datos_sesion_by_usuario($usuario);
				return true;
			}
			else {
				$_SESSION['error_login'] = 'Usuario y/o contraseña incorrecta';
				return false;
			}
		}

        function agregar_historial_clinico($data) {
            $datos = array(
                'usuarioID'      => $data['usuarioID'],
                'edad'           => $data['edad'],
                'pregunta1'      => $data['pregunta1'],
                'pregunta2'      => $data['pregunta2'],
                'pregunta3'      => $data['pregunta3'],
                'pregunta4'      => $data['pregunta4'],
                'pregunta5'      => $data['pregunta5'],
                'pregunta6'      => $data['pregunta6'],
                'pregunta7'      => $data['pregunta7'],
                'pregunta8'      => $data['pregunta8'],
                'pregunta9'      => $data['pregunta9'],
                'pregunta10'     => $data['pregunta10'],
                'notas'          => $data['notas'],     
            );             
            return $this->db->insert('historial',$datos);
        }



        function set_datos_sesion_by_usuario($usuario) {
                $_SESSION['id'] = $usuario->usuarioID;
                $_SESSION['convenioID'] = $usuario->convenioID;
                $_SESSION['username'] = $usuario->username;
                $_SESSION['contrasena'] = $usuario->contrasena;
                $_SESSION['nombre'] = $usuario->nombre;
                $_SESSION['ap_paterno'] = $usuario->ap_paterno;
                $_SESSION['ap_materno'] = $usuario->ap_materno;
                $_SESSION['correo'] = $usuario->correo;
                $_SESSION['telefono'] = $usuario->telefono;
                $_SESSION['fecha_registro'] = $usuario->fecha_registro;
                $_SESSION['creditos'] = $usuario->creditos;
                $_SESSION['tipo_usuario'] = $usuario->tipo_usuario;
        }

	}































