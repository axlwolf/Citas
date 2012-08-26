<?php

	require_once('mysql.php');
	
class validar_registro{
	
	private $nombre;
	private $apellido;
	private $usuario;
	private $contraseña1;
	private $contraseña2;
	private $cedula;
	private $telefono;
	private $celular;
	private $correo;
	private $boton_registro;
	public $error;
	
	public function validar_registro(){

		$nombre = trim($_POST['first_name']);
		$apellido = trim($_POST['last_name']);
		$usuario = trim($_POST['user_reg']);
		$contraseña1 = trim($_POST['password_1']);
		$contraseña2 = trim($_POST['password_2']);
		$cedula = trim($_POST['nationality'].$_POST['id_card']);
		$telefono = trim($_POST['area_code'].$_POST['phone']);
		$celular = trim($_POST['operator'].$_POST['cell_phone']);
		$correo = trim($_POST['e_mail']);
		$boton_registrar = $_POST['registrar'];
	
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->usuario = $usuario;
		$this->contraseña1 = $contraseña1;
		$this->contraseña2 = $contraseña2;
		$this->cedula = $cedula;
		$this->telefono = $telefono;
		$this->celular = $celular;
		$this->correo = $correo;
		$this->boton_registrar = $boton_registrar;
	
		if(isset($this->boton_registrar)){
			$registrar = true;
			if($this->nombre == '' || !preg_match("/^[a-zA-Z]{3,15}$/",$this->nombre)){
				$error = 'Nombre vacio o invalido.';
				$registrar = false;
			}
			if($this->apellido == '' || !preg_match("/^[a-zA-Z]{3,15}$/",$this->apellido)){
				$error = 'Apellido vacio o invalido.';
				$registrar = false;
			}
			if($this->usuario == '' || !preg_match("/^[a-zA-Z0-9]{3,9}$/",$this->usuario)){
				$error = 'Usuario vacio o invalido.';
				$registrar = false;
			}else{
				$mysql = new mysql();
				if(!($mysql->verificar_disponibilidad_usuario($usuario))){
					$error = " Usuario no disponible, utilice otro.";
				}
			}
			if($this->contraseña1 == '' || !preg_match("/^[A-Za-z0-9]{4,8}$/",$this->contraseña1)){
				$error = 'Contraseña vacia o invalida.';
				$registrar = false;
			}
			if($this->contraseña2 == '' || !preg_match("/^[A-Za-z0-9]{4,8}$/",$this->contraseña2)){
				$error = 'Confirmar Contraseña vacia o invalida.';
				$registrar = false;
			}
			if($this->contraseña1 != $this->contraseña2){
				$error = 'Las contraseñas no coinciden.';
				$registrar = false;
			}
			if($this->cedula == '' || !preg_match("/^(V|E){1}[0-9]{1,8}$/",$this->cedula)){
				$error = 'cedula vacia o invalida.';
				$registrar = false;
			}
			if($this->telefono == '' || !preg_match("/^[0-9]{11}$/",$this->telefono)){
				$error = 'Telefono vacio o invalido.';
				$registrar = false;
			}
			if($this->celular == '' || !preg_match("/^[0-9]{11}$/",$this->celular)){
				$error = 'Celular vacio o invalido.';
				$registrar = false;
			}
			if($this->correo == '' || !preg_match("/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/",$this->correo)){
				$error = 'Correo vacio o invalido.';
				$registrar = false;
			}
			
			if($registrar == true){
				$mysql = new mysql();
				$mysql->add_new_usser($this->nombre,$this->apellido,$this->usuario,$this->contraseña1,$this->cedula,$this->telefono,$this->celular,$this->correo);
				header('Location:registro_satisfactorio.php');
			}else{
				header('Location:registro_invalido.php');
			}
		}
	}
}
?>