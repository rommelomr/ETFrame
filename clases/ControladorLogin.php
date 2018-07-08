<?php

	class ControladorLogin{

		public static function autenticacion(){

			Accion::cargarPagina('login','autenticacion');
		}
		
		public static function usuarios(){

			$usuarios = self::extraerUsuarios();

			Accion::cargarPagina('login','usuarios',['usuarios'=>$usuarios]);
		}

		public static function cerrarSesion(){

			session_start();	
			session_destroy();
			header('Location:.');

		}

		public static function iniciarSesion(){
			$user[] =Funciones::PGSC('usuario');
			$user[] =Funciones::PGSC('contrasena');
			if((Funciones::validarCampoUsuario($user[0]))&&($user[0]!=="")&&($user[1]!=="") ){

				$usuario = new Usuario($user[0],$user[1]);
				$datos = $usuario->extraerUsuario();

				if($datos!=0){

					if($usuario->verificarContrasena($datos[0]['contrasena'])){


						session_start();
						$_SESSION['id']=$datos[0]['id'];
						$_SESSION['usuario']=$datos[0]['usuario'];
						$_SESSION['contrasena']=$datos[0]['contrasena'];
						$_SESSION['permisos']=$datos[0]['permisos'];
						$_SESSION['estado']=$datos[0]['estado'];


						header('Location:.');


					}else{

						header('Location:./?log=2');
					}
				}else{

					header('Location:./?log=1');
					
				}
			}else{

				header('Location:./?log=0');

			
			}

		}
		public static function registrarUsuario(){

			
			$Usuario = new Usuario($_POST['usuario'],$_POST['contrasena'],$_POST['permisos'],1);
			unset($_POST);
			
			if ($Usuario->crearUsuario()){
				echo '<script>alert("Usuario creado")</script>';
			}else{
				echo '<script>alert("Usuario no creado")</script>';
			}
			self::usuarios();

		}
		public function extraerUsuarios(){

			$con = new Conexion();
			return $con->extraer('select * from etusuario');			

		}
		public static function prueba(){

			if(Ajax::verificarCode()){

				$usuario[] = Funciones::PGSC('varUsuario');
				$usuario[] = Funciones::PGSC('varContrasena');
				$usuario[] = Funciones::PGSC('varPermisos');
				$usuario = new Usuario($usuario[0],$usuario[1],$usuario[2],1);
				$res= $usuario->crearUsuario();

				if($res){

					echo json_encode(1);
				}else{
					echo json_encode(0);

				}
			}

		}
		public static function pruebaDos(){

			echo 'Dos';
		}




	}

?>