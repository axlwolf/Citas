<?php

	require_once('mysql.php');
	
class validar_login{
	
	private $usuario;
	private $contrase�a;
	private $recordar;
	private $boton_login;
	public $error;
	
	public function validar_login(){
	
		$usuario = trim($_POST['user']);
		$contrase�a = trim($_POST['password']);
		$recordar = isset($_POST['remember']) ? true : false;
		$boton_login = $_POST['entrar'];
		$error = "";
	
		$this->usuario = $usuario;
		$this->contrase�a = $contrase�a;
		$this->recordar = $recordar;
		$this->boton_login = $boton_login;
		$this->error = $error;
	
		if(isset($this->boton_login)){
			$validar = true;
			if($this->usuario == '' || !preg_match("/^[a-zA-Z0-9]{3,9}$/",$this->usuario)){
				$error = 'Nombre vacio o invalido.';
				$validar = false;
			}
			if($this->contrase�a == '' || !preg_match("/^[A-Za-z0-9]{4,8}$/",$this->contrase�a)){
				$error = 'Contrase�a vacia o invalida.';
				$validar = false;
			}
			
			if($validar == true){
				$mysql = new mysql();
				if($mysql->autenticar($this->usuario,$this->contrase�a)){
					if($this->recordar){
						setcookie("user",$this->usuario,time()+(3600*24));
						setcookie("password",$this->contrase�a,time()+(3600*24));
					}else{
						setcookie("user","",false);
						setcookie("password","",false);
					}
					session_start();
					$_SESSION['usuario'] = $this->usuario;
					$_SESSION['contrase�a'] = $this->contrase�a;
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