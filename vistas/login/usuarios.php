<?php !isset($system)? header('Location:../../'):0;?>
<title>Iniciar Sesion</title>
<link rel="stylesheet" type="text/css" href="estilos/usuarios.css">

</head>

<body>

	<div class="container-fluid">
			
		<form method="get">
			<?php

				Crear::comun('navbar');

			?>


		</form>
		<div class="row">
			
			<div  id="registrarUsuario" class="col-md-5">
				
				<div class="col-md-10 offset-md-2 card" style="padding:0;">
					<div class="card-header">
						<h5 id="titulo" align="center"><strong>REGISTRAR USUARIO</strong></h5>	
					</div>
					
						<div class="card-body">
						
					

							<input id="usuario" class="form-control" type="text" name="usuario" placeholder="Usuario">

							<input id="contrasena" class="form-control" type="text" name="contrasena" placeholder="Contraseña">

							<input id="repContrasena" class="form-control" type="text" placeholder="Repetir Contraseña">
							
							<select id="permisos" class="form-control col-md-8 offset-md-2" name="permisos">

								<option value="100">Root</option>
								<option value="010">Administrador</option>
								<option value="001">Usuario</option>
								
							</select>
						
							<input hidden name="prov" value="reg">	
						</div>
					<div class="card-footer">

						<?php 

							Crear::botonEnviarAjax('botonRegistrar','btn btn-primary col-md-6 offset-md-3','login','registrarUsuario');
						?>
						
						
					</div>

					
							
				</div>
			</div>

			<div id="consultarUsuario" class="col-md-5 offset-md-1">
				
				<table style="text-align:center" class="table table-hover table-dark col-md-12">
					<thead>
						
						<tr>
							<th>Usuario</th>
							<th>Permisos</th>
							<th>Opciones</th>
						</tr>

					</thead>
						
				<?php 


					
					foreach ($usuarios as $clave => $valor){

						if(($valor['id']!=1)&&($valor['id']!=Funciones::PGSC('id'))){
						echo '<tr>';
						echo '<th>'.$valor["usuario"].'</th>';

						echo '<th>';

						switch($valor['permisos']){
							case '100':{
								echo 'Root';
								break;
							}
							case '010':{
								echo 'Administrador';
								break;
							}
							case '001':{
								echo 'Usuario';
								break;
							}


						}

						echo '</th>';

						echo '<th clave="'.$clave.'" id='.$valor["id"].' usuario="'.$valor["usuario"].'" permisos="'.$valor['permisos'].'"><button data-toggle="modal" data-target="#editarUsuario" class="editar btn btn-link fas fa-edit"></button><button data-toggle="modal" data-target="#eliminarUsuario" class="eliminar btn btn-link fas fa-times-circle"></button></th>';
						echo '</tr>';

						}
					}
				?>

				</table>		
			</div>



		</div>

		
	</div>
	
	<div class="modal fade" id="editarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header" style="margin:1%;padding:1%;">

	        <div class="modal-body">
		        <div class="row">
		        	<div class="co-md-4 offset-md-4">
		        		
			        	<h5 class="col-md-12 modal-title" id="exampleModalLabel">Editar Usuario</h5>
		        	</div>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span class="fa fa-times-circle" ></span>
			        </button>

		        </div>

		    </div>
	      </div>

	      <div class="modal-body">

	        <input id="usuario" class="col-md-8 offset-md-2 form-control" placeholder="Usuario" type="text">
	        <input id="contrasena" class="col-md-8 offset-md-2 form-control" placeholder="Contraseña" type="text">
	        <input id="repContrasena" class="col-md-8 offset-md-2 form-control" placeholder="Repetir Contraseña" name="">
	        <select id="permisos" class="col-md-4 offset-md-4 form-control">
	        	<option value="1">Administrador</option>
	        	<option value="2">Usuario</option>
	        </select>
	      </div>

	      <div class="modal-footer" style="margin:0;padding:0;">
	        
		      <div class="modal-body">
		        <div class="col-md-4 offset-md-4">
		        	
		        	<button type="button" class="btn btn-primary col-md-12">Guardar</button>
		        </div>
		      </div>
	      </div>

	    </div>
	  </div>
	</div>
	
	<div class="modal fade" id="eliminarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	    	<div class="modal-header" style="margin:0;padding:0;">
		    	<div class="modal-body">
		    		
	    		
		    		<h5 class="text-center">¿Esta seguro que desea eliminar a este usuario?</h5>
		    	</div>
		    	
	    	</div>
	      

		    <div class="modal-body">

		    	
		    	<div class="row">
		    		<div class="col-md-12">
		    			<div class="btn-group col-md-8 offset-md-2">
		    				
				    		<button data-dismiss="modal" class=" col-md-12 btn btn-primary">Aceptar</button>			    		
			    		
				    		<button data-dismiss="modal" class=" col-md-12 btn btn-danger">Cancelar</button>			    		
		    			</div>
		    		</div>
		    	</div>
		    	
		    </div>

	    </div>
	  </div>
	</div>
 	
		
<?php Crear::code();?>	
	<img id="imagenFondo" src="utilidades/imagenes/Cuaderno.jpg">
<script src="scripts/usuarios.js"></script>
</body>
</html>
