<?php

	require_once('validacion/validar_login.php');
	
	if(isset($_POST['user']) && isset($_POST['password'])){
		$login = new validar_login();
		$login->validar_login();
	}
	
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Citas Medicas</title>
		<link rel="stylesheet" href="../css/style.css" type="text/css" media="screen">
		<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
		<script type="text/javascript" src="../js/map.js"></script> 
	</head>
	<body>
		<div id="wrapper">
			<div id="header">
				<div id="logo">
					<a href="index.php">
						<div style="width:100%;height:100%;"></div>
					</a>
				</div>
				<div id="login" class="curved_sup_der">
					<form action="login.php" method="post">
						<label>Usuario:</label>
						<input type="text" name="user" id="user" class="" value="<?php if(isset($_COOKIE['user'])){echo $_COOKIE['user'];}?>"/><br>
						<label>Contrase&ntilde;a:</label>
						<input type="password" name="password" id="" class="" value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];}?>"/><br>
						<label>Recordar</label>
						<input type="checkbox" name="remember" id="" class=""/><br>
						<label><a href="logout.php" class="fz11 notextdeco">Cerrar Sesion</a></label>
						<input type="submit" name="entrar" id="entrar" class="fz10" value="Entrar"/><br>
					</form>
					<p id="error" class="advertencia1"><?php if(isset($login->error)){echo $login->error;}?></p>
				</div>
				<div id="menu" class="curved_all">
					<ul>
						<li class="curved_all"><label><a href="registro.php">Registrarse</a></label></li>
						<li class="curved_all"><label><a id="cargar_precios">Precios</a></label></li>
						<li class="curved_all"><label><a onClick="initialize()">Ubicacion</a></label></li>
						<li class="curved_all"><label><a id="cargar_contacto">Contacto</a></label></li>
					</ul>
				</div>
			</div>
			<div id="contenido">
				
			</div>
			<div id="footer">
			</div>
		</div>
		<script type="text/javascript" src="../js/jquery-1.8.0.min.js"></script> 
		<script type="text/javascript" src="../js/validar_login.js"></script>
	</body>
</html>