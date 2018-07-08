function funciona(data){

	console.log(data);

}
function error(){

	window.location.reload();
}

$(function(){

	$('#botonRegistrar').click(function(){

		var usuario = $('#usuario').val();

		if(usuario==''){
			alertify.alert('El campo usuario no puede estar vacio');
		}else{
		
			var contrasena = $('#contrasena').val();
			if(contrasena==''){
				alertify.alert('Debe especificar una contraseña');
			}else{
				var repContrasena = $('#repContrasena').val();
				if(repContrasena!==contrasena){
					
					alertify.alert('Las contraseas no coinciden');

				}else{
					permisos = $('#permisos').val();
					datos={
						varUsuario:usuario,
						varContrasena:contrasena,
						varPermisos:permisos
					};
					
					ETFPost(datos,funciona,error);
				}
			}




		}



	});


});