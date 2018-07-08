<?php

	
	class Enrutador{

		private static $out = ['mod'=>'login','pag'=>'autenticacion'];
		
		private static $default = ['mod'=>'principal','pag'=>'principal'];


		private static $tipo = [

			/*configurar metodos:
			
			0:Metodos Publicoss (se puede acceder estando o no logeado)
			1:Metodos a los que se puede acceder solo si se esta logeado
			2:Metodos a los que se puede acceder solo si NO se esta logeado

			*/

			'principal'=>[
				'principal'=>[1,[0,1,2]],
			],
			'login'=>[
				'autenticacion'=>[2],
				'iniciarSesion'=>[0],
				'usuarios'=>[1,[0]],
				'registrarUsuario'=>[1,[0]],
				'cerrarSesion'=>[1,[0,1,2]]
			]	

		];
		public static function cargar(){

			if(Funciones::PGSC('petAjax')!==0){
				PeticionesAjax::cargar();
			}else if(isset($_GET['err'])){

				Accion::cargarPaginaError();

			}else{


				$dir = Funciones::PGSC('mod');

		
				if($dir!==0){
			
					$pag=Funciones::obtenerPagina($dir);

					$controlador=Funciones::obtenerModulo($dir);
					$tipoPagina = self::$tipo[$controlador][$pag][0];
					
					$controlador = Funciones::definirControlador($controlador);

					if ($tipoPagina===0){

					$controlador::$pag();

					}else{
						session_start();

						if(Funciones::verificarLogin()){

							if($tipoPagina===1){
								$permisos = Funciones::definirTipoUsuario($_SESSION['permisos']);
								$permisoConsedido = 0;
								$mod=strtolower(substr($controlador,11,strlen($controlador)-10));

								foreach (self::$tipo[$mod][$pag][1] as $clavePaginas => $valorPaginas) {



									foreach ($permisos as $clavePermisos => $valorPermisos) {
										if($valorPaginas==$valorPermisos){
											$permisoConsedido = 1;
											break;
										}
										
									}
								}

							
								if($permisoConsedido){

									$controlador::$pag();
								}else{

									Accion::cargarPaginaError(403);
								}
								

							}else if($tipoPagina===2){

								header('Location:./?mod='.self::$default['mod'].'/'.self::$default['pag']);

							}

						}else{
							if($tipoPagina===1){

							header('Location:./?mod='.self::$out['mod'].'/'.self::$out['pag']);

							}else if($tipoPagina===2){

								$controlador::$pag();
								
							}
						}

					}

					//if(Funciones::PGSC('usuario')===0){
				
						//require_once(self::$default);

				}else{
					session_start();
					if(Funciones::verificarLogin()){

						
						$controlador = Funciones::definirControlador(self::$default['mod']);

						$metodo = self::$default['pag'];

						$controlador::$metodo();

						
					}else{

						$controlador = Funciones::definirControlador(self::$out['mod']);
						
						$metodo = self::$out['pag'];

						$controlador::$metodo();
					}
				
				}
			}


		}

		public static function ajax(){

			echo 'Peticion Ajax';
			
		}


 	}

?>