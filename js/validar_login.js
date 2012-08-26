$(document).ready(function(){
	
	$('#user').focus();
	
	function validar_user(){
		usuario = $('#user').val();
		if(usuario != '' &&  (usuario.length > 2 && usuario.length < 9)){
			return true;
		}else{
			return false;
		}
	}
	
	function validar_password(){
		contrasena = $('#password').val();
		if(contrasena != '' &&  (contrasena.length > 2 && contrasena.length < 9)){
			return true;
		}else{
			return false;
		}
	}
	
	$('#entrar').click(function(){
		if(validar_user() && validar_password()){
			return true;
		}else{
			$('#error').html('Nombre de usuario y/o contrase&ntilde;a incorrectos');
			return false;
		}
	});
	
	$('#cargar_precios').click(function(){
		$('#contenido').load('precios.php');
	});
	
	$('#cargar_contacto').click(function(){
		$('#contenido').load('contacto.php');
	});
});