<title>Iniciar Sesion</title>

<link rel="stylesheet" type="text/css" href="estilos/login.css">
</head>

<body>
	
	<div class="container-fluid">

		<div class="row">

			<div class="col-md-4 offset-md-4">

				<center>
					<div id="cajaLogin" class="align-middle col-md-10 offset-md-1">
					
						
						<h2>Iniciar Sesión</h2>
						
						
							<div class="form-group">
								
								<input class="form-control" type="text" maxlength="15" name="usuario" placeholder="Usuario">
							
								<input class="form-control" type="password" maxlength="255" name="contrasena" placeholder="Contraseña" style="margin-bottom:3%">

								<input hidden name="prov" value="index">
								<?php

									Crear::botonEnviarAjax('Iniciar Sesión','login','prueba','iniciarSesion','btn btn-primary');

								?>
								<br>
								<span id="mensaje" style="color:red;"></span>


							</div>
						

					</div>
				</center>
			</div>
		</div>
	</div>
	<img id="imagenFondo" src="utilidades/imagenes/Laptop.jpg">
	<script src="scripts/autenticacion.js"></script>
</body>
</html>
