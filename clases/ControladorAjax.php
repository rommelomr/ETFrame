<?php
	class ControladorAjax{

		public static function cargar(){
			//recibir controlador y metodo;
			if(Funciones::PGSC('con')!==0){

				$controlador = Funciones::PGSC('con');

				$con = Funciones::obtenerModulo($controlador);
				$met = Funciones::obtenerPagina($controlador);
				$controller = Funciones::definirControlador($con);
			
				$controller::$met();
			}else{
				header('Location:.');
			}

		}
		public static function verificarCode(){
			session_start();
			if ( (isset($_GET['code'])) && (isset($_SESSION['etCodeForm']))){
				$code = $_GET['code'];
				$codeForm = $_SESSION['etCodeForm'];
			}else{
				$code = null;
				$codeForm=null;
			}
			if(password_verify($codeForm,$code)){
				return 1;
			}else{
				$error = 'Always throw this error';
				throw new Exception($error);
			}
		}
		public static function index(){

			echo "El accion solicitada no tiene ningun destino";

		}


	}
?>
