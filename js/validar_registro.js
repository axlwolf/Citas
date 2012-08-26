$(document).ready(function(){
	
	$('#nombre').focus(function(){
		$('#resultado-nombre').remove();
		$('#validar-nombre').append('<span class="advertencia"> *** Obligatorio (Rango 3-15) - (Solo Letras)</span>');
	});
	
	$('#nombre').blur(function(){
		$('.advertencia').remove();
		if(($('#nombre').val()!="") && (($('#nombre').val().length > 2) && ($('#nombre').val().length < 16))){
			if($('#nombre').val().match(/^[a-zA-Z]+$/)){
				$('<img src="../img/validacion/accept.png" id="resultado-nombre" />').appendTo('#validar-nombre');
			}else{
				$('<img src="../img/validacion/delete.png" id="resultado-nombre" />').appendTo('#validar-nombre');
			}
		}else{
			$('<img src="../img/validacion/delete.png" id="resultado-nombre" />').appendTo('#validar-nombre');
		}
	});
	
	$('#apellido').focus(function(){
		$('#resultado-apellido').remove();
		$('#validar-apellido').append('<span class="advertencia"> *** Obligatorio (Rango 3-15) - (Solo Letras)</span>');
	});
	
	$('#apellido').blur(function(){
		$('.advertencia').remove();
		if(($('#apellido').val()!="") && (($('#apellido').val().length > 2) && ($('#apellido').val().length < 16))){
			if($("#apellido").val().match(/^[a-zA-Z]+$/)){
				$('<img src="../img/validacion/accept.png" id="resultado-apellido" />').appendTo('#validar-apellido');
			}else{
				$('<img src="../img/validacion/delete.png" id="resultado-apellido" />').appendTo('#validar-apellido');
			}
		}else{
			$('<img src="../img/validacion/delete.png" id="resultado-apellido" />').appendTo('#validar-apellido');
		}
	});
	
	$('#usuario').focus(function(){
		$('#resultado-usuario').remove();
		$('#validar-usuario').append('<span class="advertencia"> *** Obligatorio (Rango 3-8) - (Solo Letras y/o Numeros)</span>');
	});
	
	$('#usuario').blur(function(){
		$('.advertencia').remove();
		if(($('#usuario').val()!="") && (($('#usuario').val().length > 2) && ($('#usuario').val().length < 9))){
			if($("#usuario").val().match(/^[a-zA-Z0-9]+$/)){
				$.ajax({
					type: "POST",
					url: "validacion/usuario_unico.php",
					data: "usuario="+$('#usuario').val(),
					success: function ( respuesta ){
						if(respuesta == '1'){
							$('<img src="../img/validacion/accept.png" id="resultado-usuario" />').appendTo('#validar-usuario');
						}else{
							$('<img src="../img/validacion/delete.png" id="resultado-usuario" />').appendTo('#validar-usuario');
							$('#msgUsuario').append('<span class="advertencia"> Usuario no disponible, utilice otro.</span>');
						}
					}
				});
			}else{
				$('<img src="../img/validacion/delete.png" id="resultado-usuario" />').appendTo('#validar-usuario');
			}
		}else{
			$('<img src="../img/validacion/delete.png" id="resultado-usuario" />').appendTo('#validar-usuario');
		}
	});
	
	$('#contrasenia1').focus(function(){
		$('#resultado-contrasenia1').remove();
		$('#validar-contrasenia1').append('<span class="advertencia"> * Obligatorio (Rango 4-8) - (Solo Letras y/o Numeros)</span>');
	});
	
	$('#contrasenia1').blur(function(){
		$('.advertencia').remove();
		if(($('#contrasenia1').val()!="") && (($('#contrasenia1').val().length > 3) && ($('#contrasenia1').val().length < 9))){
			if($("#contrasenia1").val().match(/^[a-zA-Z0-9]+$/)){
				$('<img src="../img/validacion/accept.png" id="resultado-contrasenia1" />').appendTo('#validar-contrasenia1');
			}else{
				$('<img src="../img/validacion/delete.png" id="resultado-contrasenia1" />').appendTo('#validar-contrasenia1');
			}
		}else{
			$('<img src="../img/validacion/delete.png" id="resultado-contrasenia1" />').appendTo('#validar-contrasenia1');
		}
	});
	
	$('#contrasenia2').focus(function(){
		$('#resultado-contrasenia2').remove();
		$('#validar-contrasenia2').append('<span class="advertencia"> *** Obligatorio (No coincide con la contraseña previa)</span>');
	});
	
	$('#contrasenia2').blur(function(){
		$('.advertencia').remove();
		if(($('#contrasenia2').val()!="") && (($('#contrasenia2').val().length > 3) && ($('#contrasenia2').val().length < 9))){
			if($("#contrasenia2").val()==($("#contrasenia1").val())){
				$('<img src="../img/validacion/accept.png" id="resultado-contrasenia2" />').appendTo('#validar-contrasenia2');
			}else{
				$('<img src="../img/validacion/delete.png" id="resultado-contrasenia2" />').appendTo('#validar-contrasenia2');
				$('#comparar-contrasenias').html('Las contraseñas no coinciden.');
			}
		}else{
			$('<img src="../img/validacion/delete.png" id="resultado-contrasenia2" />').appendTo('#validar-contrasenia2');
		}
	});
	
	$('#cedula').focus(function(){
		$('#resultado-cedula').remove();
		$('#validar-cedula').append('<span class="advertencia"> *** Obligatorio (Rango 8) - (Solo Numeros) - Ej.V00000000</span>');
	});
	
	$('#cedula').blur(function(){
		$('.advertencia').remove();
		var cedula=$('#nacionalidad').val()+$('#cedula').val();
		if(($('#cedula').val()!="") && cedula.length == 9){
			if(cedula.match(/^(V|E){1}[0-9]+$/)){
				$.ajax({
					type: "POST",
					url: "validacion/cedula_unica.php",
					data: "cedula="+cedula,
					success: function ( respuesta ){
						if(respuesta == '1'){
							$('<img src="../img/validacion/accept.png" id="resultado-cedula" />').appendTo('#validar-cedula');
						}else{
							$('<img src="../img/validacion/delete.png" id="resultado-cedula" />').appendTo('#validar-cedula');
							$('#msgCedula').append('<span class="advertencia"> Cedula repetida, utilice otra.</span>');
						}
					}
				})
			}else{
				$('<img src="../img/validacion/delete.png" id="resultado-cedula" />').appendTo('#validar-cedula');
			}
		}else{
			$('<img src="../img/validacion/delete.png" id="resultado-cedula" />').appendTo('#validar-cedula');
		}
	});
	
	$('#codigoarea').focus(function(){
		$('#resultado-codigoarea').remove();
		$('#validar-codigoarea').append('<span class="advertencia"> *** Obligatorio (Rango 4) - (Solo Numeros) - Ej.0212</span>');
	});
	
	$('#codigoarea').blur(function(){
		$('.advertencia').remove();
		if(($('#codigoarea').val()!="") && (($('#codigoarea').val().length == 4))){
			if($("#codigoarea").val().match(/^[0-9]+$/)){
				$('<img src="../img/validacion/accept.png" id="resultado-codigoarea" />').appendTo('#validar-codigoarea');
			}else{
				$('<img src="../img/validacion/delete.png" id="resultado-codigoarea" />').appendTo('#validar-codigoarea');
			}
		}else{
			$('<img src="../img/validacion/delete.png" id="resultado-codigoarea" />').appendTo('#validar-codigoarea');
		}
	});
	
	$('#telefono').focus(function(){
		$('#resultado-telefono').remove();
		$('#validar-telefono').append('<span class="advertencia"> *** Obligatorio (Rango 7) - (Solo Numeros) - Ej.5767778</span>');
	});
	
	$('#telefono').blur(function(){
		$('.advertencia').remove();
		if(($('#telefono').val()!="") && (($('#telefono').val().length == 7))){
			if($("#telefono").val().match(/^[0-9]+$/)){
				$('<img src="../img/validacion/accept.png" id="resultado-telefono" />').appendTo('#validar-telefono');
			}else{
				$('<img src="../img/validacion/delete.png" id="resultado-telefono" />').appendTo('#validar-telefono');
			}
		}else{
			$('<img src="../img/validacion/delete.png" id="resultado-telefono" />').appendTo('#validar-telefono');
		}
	});
	
	$('#celular').focus(function(){
		$('#resultado-celular').remove();
		$('#validar-celular').append('<span class="advertencia"> *** Obligatorio (Rango 7) - (Solo Numeros) - Ej.3214322</span>');
	});
	
	$('#celular').blur(function(){
		$('.advertencia').remove();
		if(($('#celular').val()!="") && (($('#celular').val().length == 7))){
			if($("#celular").val().match(/^[0-9]+$/)){
				$('<img src="../img/validacion/accept.png" id="resultado-celular" />').appendTo('#validar-celular');
			}else{
				$('<img src="../img/validacion/delete.png" id="resultado-celular" />').appendTo('#validar-celular');
			}
		}else{
			$('<img src="../img/validacion/delete.png" id="resultado-celular" />').appendTo('#validar-celular');
		}
	});
	
	$('#correo').focus(function(){
		$('#resultado-correo').remove();
		$('#validar-correo').append('<span class="advertencia"> *** Obligatorio - Ej.correo@hotmail.com</span>');
	});

	$('#correo').blur(function(){
		$('.advertencia').remove();
		if($('#correo').val()!=""){
			if($('#correo').val().match(/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})+$/)){
				$.ajax({
					type: "POST",
					url: "validacion/correo_unico.php",
					data: "correo="+$('#correo').val(),
					success: function ( respuesta ){
						if(respuesta == '1'){
							$('<img src="../img/validacion/accept.png" id="resultado-correo" />').appendTo('#validar-correo');
						}else{
							$('<img src="../img/validacion/delete.png" id="resultado-correo" />').appendTo('#validar-correo');
							$('#msgCorreo').append('<span class="advertencia"> Correo repetido, utilice otro.</span>');
						}
					}
				})
			}
			else {
				$('<img src="../img/validacion/delete.png" id="resultado-correo" />').appendTo("#validar-correo");
			}
		}
		else {
			$('<img src="../img/validacion/delete.png" id="resultado-correo" />').appendTo('#validar-correo');
		}
	});

	$('#enviar').click(function(){
		if($('#nombre').val()!= '' && $('#apellido').val()!='' && $('#usuario').val()!='' && $('#contrasenia1')!='' && $('#contrasenia2')!='' && $('#cedula')!='' && $('#codigoarea')!='' && $('#telefono')!='' && $('#celular')!='' && $('#correo')!=''){
			$('.advertencia').remove();
			return true;
		}else{
			$('#msgEnviar').html('');
			$('#msgEnviar').append('<span class="advertencia"> Datos incompletos o vacios.</span>');
			return false;
		}
	});
});