<?php


?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Citas Medicas</title>
		<link rel="stylesheet" href="../css/style.css" type="text/css" media="screen">
		<script type="text/javascript" src="../js/prototype-1.7.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/view.css" media="all">
		<script type="text/javascript" src="../js/view.js"></script>
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
					<form action="" method="post">
						<label>Usuario:</label>
						<input type="text" name="usuario" id="" class=""/><br>
						<label>Contrase&ntilde;a:</label>
						<input type="password" name="password" id="" class=""/><br>
						<label>Recordar</label>
						<input type="checkbox" name="recordar" id="" class=""/><br>
						<label><a href="logout.php" class="fz11 notextdeco">Cerrar Sesion</a></label>
						<input type="submit" name="entrar" id="" class="fz10" value="Entrar"/><br>
					</form>
				</div>
				<div id="menuregistro" class="curved_all">
					<ul>
						<li class="curved_all"><a onClick="new Ajax.Updater('contenido', 'registro.php', { method: 'get' });"><div style="width:100%;height:100%;">Registrarse</div></a></li>
					</ul>
				</div>
			</div>
			<div id="contenido">
				<center>
					<h1>Error, "Alguno de sus datos de cuenta pueden estar incorrectos o vacios".<h1><p>
					<h1>Consulte el ejemplos y descripcion</h1>
					<h3 class="red">Intente registrarse nuevamente, pise Registrarse nuevamente</h3>
				</center>
			</div>
			<div id="footer">
			</div>
		</div>
	</body>
</html>

