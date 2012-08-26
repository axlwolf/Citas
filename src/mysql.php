<?php

Class mysql{
	
	var $xml;
	var $dom;
	var $localhost ;
	var $mysql_user;
	var $mysql_password;
	var $db;

	function __construct(){
		global $xml,$dom,$localhost,$mysql_user,$mysql_password,$db;
		$xml = "config.xml";
		$dom = new DOMDocument();
		$dom->Load($xml);
		
		$localhost = $dom->getElementsByTagName('localhost')->item(0)->textContent;
		$mysql_user = $dom->getElementsByTagName('mysql_user')->item(0)->textContent;
		$mysql_password = $dom->getElementsByTagName('mysql_password')->item(0)->textContent;
		$db = $dom->getElementsByTagName('db')->item(0)->textContent;
		$query = "";
		$result = "";
	}
	
	function connect_to_mysql(){
		global $localhost,$mysql_user,$mysql_password,$link;
		$link = mysql_connect($localhost,$mysql_user,$mysql_password);
		if(!$link){
			die('Could not connect: ' . mysql_error());
		}
	}
	
	function connect_to_db(){
		global $db,$link;
		$db_selected = mysql_select_db($db, $link);
		if(!$db_selected){
			die('Could not select database: ' . mysql_error());
		}
	}
	
	function close_connection_to_mysql(){
		global $link;
		mysql_close($link);
	}
	
	function autenticar($usuario,$contraseña){
		$this->connect_to_mysql();
		$this->connect_to_db();
		global $query,$result;
		$query = "SELECT usuario,contraseña FROM persona WHERE usuario='$usuario' AND contraseña='$contraseña';";
		$result = mysql_query($query);
		if(!$result){
			die('Could not query: ' . mysql_error());
		}else{
			if(mysql_num_rows($result)==1){
				return true;
			}
		}
		$this->close_connection_to_mysql();
		return false;
	}
	
	function insert_new_date($cedula,$fecha,$hora){
		$this->connect_to_mysql();
		$this->connect_to_db();
		global $query,$result;
		$query = "INSERT INTO cita (cedula,fecha,hora) VALUES ('$cedula','$fecha','$hora');";
		$result = mysql_query($query);
		if(!$result){
			die('Could not query: ' . mysql_error());
		}else{
			echo "INSERSION EXITOSA.";
		}
		$this->close_connection_to_mysql();
	}
	
	function add_new_usser($nombre,$apellido,$usuario,$contraseña,$cedula,$telefono,$celular,$mail){
		$this->connect_to_mysql();
		$this->connect_to_db();
		global $query,$result;
		$query = "INSERT INTO persona (cedula,nombre,apellido,usuario,contraseña,telefono,celular,correo) VALUES ('$cedula','$nombre','$apellido','$usuario','$contraseña','$telefono','$celular','$mail');";
		$result = mysql_query($query);
		if(!$result){
			die('Could not query: ' . mysql_error());
		}else{
			echo "Usuario ".$usuario." registered.";
		}
		$this->close_connection_to_mysql();
	}
	
	function remove_usser($usuario){
		$this->connect_to_mysql();
		$this->connect_to_db();
		global $query,$result;
		$query = "DELETE FROM user WHERE usuario='$usuario';";
		$result = mysql_query($query);
		if(!$result){
			die('Could not query: ' . mysql_error());
		}else{
			echo "User ".$usuario." deleted.";
		}
		$this->close_connection_to_mysql();
	}
	
	function list_ussers(){
		$this->connect_to_mysql();
		$this->connect_to_db();
		global $query,$result;
		$query = "SELECT * FROM user;";
		$result = mysql_query($query);
		if(!$result){
			die('Could not query: ' . mysql_error());
		}else{
			while($Rs = mysql_fetch_assoc($result)){
				echo "Usuario: ".$Rs['usuario']." - Contrase&ntilde;a: ".$Rs['contraseña']."<br>";
			}
		}
		$this->close_connection_to_mysql();
	}
	
	function verificar_horarios($fecha){
		$this->connect_to_mysql();
		$this->connect_to_db();
		global $query,$result;
		$query = "SELECT hora FROM cita WHERE fecha='$fecha';";
		$result = mysql_query($query);
		if(!$result){
			return "";
		}else{
			return $result;
		}
		$this->close_connection_to_mysql();
	}
	
	function devolver_datos_personas($usuario,$contraseña){
		$this->connect_to_mysql();
		$this->connect_to_db();
		global $query,$result;
		$query = "SELECT * FROM persona WHERE usuario='$usuario' AND contraseña='$contraseña';";
		$result = mysql_query($query);
		if(!$result){
			return "";
		}else{
			return $result;
		}
		$this->close_connection_to_mysql();
	}
	
	function verificar_disponibilidad_usuario($usuario){
		$this->connect_to_mysql();
		$this->connect_to_db();
		global $query,$result;
		$query = "SELECT * FROM persona WHERE usuario='$usuario';";
		$result = mysql_query($query);
		if(!$result){
			return true;
		}else{
			return false;
		}
		$this->close_connection_to_mysql();
	}
}
?>