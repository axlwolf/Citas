<?php
Class validaciones{	
	
	function validar_nombre($nombre){
		if (preg_match("/^[A-Z]{1}[a-z]{2,15}$/",$nombre)){
			return true;
		}else{
			return false;
		}
	}
	function validar_apellido($apellido){
		if (preg_match("/^[A-Z]{1}[a-z]{2,15}$/",$apellido)){
			return true;
		}else{
			return false;
		}
	}
	function validar_usuario($usuario){
		if(preg_match("/^[A-Za-z]{4,8}$/",$usuario)){
			return true;
		}else{
			return false;
		}
	}
	function validar_contrasenia($contrasenia1,$contrasenia2){
		if(preg_match("/^[A-Za-z0-9]{4,10}$/",$contrasenia1)){
			if($contrasenia1==$contrasenia2){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	function validar_cedula($cedula){
		if(preg_match("/^(V|E){1}[0-9]{8}$/",$cedula)){
			return true;
		}else{
			return false;
		}
	}
	function validar_telefono($telefono){
		if(preg_match("/^[0]{1}[0-9]{9,10}$/",$telefono)){
			return true;
		}else{
			return false;
		}
	}
	function validar_celular($celular){
		if(preg_match("/^04(1|2){1}(2|4|6){1}[0-9]{7}$/",$celular)){
			return true;
		}else{
			return false;
		}
	}
	function validar_mail($mail){
		if(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/",$mail)){
			return true;
		}else{
			return false;
		}
	}
	function validar_registro($nombre,$apellido,$usuario,$contrasenia1,$contrasenia2,$cedula,$telefono,$celular,$mail){
		if($this->validar_nombre($nombre)){
			if($this->validar_apellido($apellido)){
				if($this->validar_usuario($usuario)){
					if($this->validar_contrasenia($contrasenia1,$contrasenia2)){
						if($this->validar_cedula($cedula)){
							if($this->validar_telefono($telefono)){
								if($this->validar_celular($celular)){
									if($this->validar_mail($mail)){
										return true;
									}else{
										return true;
									}
								}else{
									return true;
								}
							}else{
								return true;
							}
						}else{
							return true;
						}
					}else{
						return true;
					}
				}else{
					return true;
				}
			}else{
				return true;
			}
		}else{
			return true;
		}
	}
}
?>