<?php
     //Clase encargada de mostrar la vista correspondiente.

     class Accion{

     	public static function cargarPagina($mod,$pag,$arr=null){
               //metodo que arranca el sistema. Si hay un error carga la página de error. Si no carga un módulo (que está seteado en $_POST). Si no hay nada seteado se cargará el modulo principal en la pagina index.php
              $system = true;
              if($arr!=null){
                   foreach ($arr as $key => $value) {
                        $$key = $value;
                   }

              }
              require_once('vistas/'.$mod.'/'.$pag.'.php');


        
                   		
     	}

          public static function cargarPaginaError($err=null){
            /*funcion que carga una pagina de error. 
            Si recibe un parametro carga el error especificado en dicho parametro. Si no, carga un error recibido por get proveniente del .htaccess

            */


              if($err==null){

               if(file_exists('utilidades/errores/error'.$_GET['err'].'.php')){

                    require_once('utilidades/errores/error'.$_GET['err'].'.php');

               }else{

                 require_once("utilidades/errores/error404.php");

               }
              }else{
                 require_once('utilidades/errores/error'.$err.'.php');

              }
          }

     	



     }

?>