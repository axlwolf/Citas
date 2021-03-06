<?php

	require_once('mysql.php');
	
class validar_login{
	
	private $usuario;
	private $contraseņa;
	private $recordar;
	private $boton_login;
	public $error;
	
	public function validar_login(){
	
		$usuario = trim($_POST['user']);
		$contraseņa = trim($_POST['password']);
		$recordar = isset($_POST['remember']) ? true : false;
		$boton_login = $_POST['entrar'];
		$error = "";
	
		$this->usuario = $usuario;
		$this->contraseņa = $contraseņa;
		$this->recordar = $recordar;
		$this->boton_login = $boton_login;
		$this->error = $error;
	
		if(isset($this->boton_login)){
			$validar = true;
			if($this->usuario == '' || !preg_match("/^[a-zA-Z0-9]{3,9}$/",$this->usuario)){
				$error = 'Nombre vacio o invalido.';
				$validar = false;
			}
			if($this->contraseņa == '' || !preg_match("/^[A-Za-z0-9]{4,8}$/",$this->contraseņa)){
				$error = 'Contraseņa vacia o invalida.';
				$validar = false;
			}
			
			if($validar == true){
				$mysql = new mysql();
				if($mysql->autenticar($this->usuario,$this->contraseņa)){
					if($this->recordar){
						setcookie("user",$this->usuario,time()+(3600*24));
						setcookie("password",$this->contraseņa,time()+(3600*24));
					}else{
						setcookie("user","",false);
						setcookie("password","",false);
					}
					session_start();
					$_SESSION['usuario'] = $this->usuario;
					$_SESSION['contraseņa'] = $this->contraseņa;
					header('Location:inicio.php');
				}else{
					$error = "Nombre de usuario y/o contrase&ntilde;a incorrectos";
					$this->error = $error;
				}
			}
		}
	}
}
?>