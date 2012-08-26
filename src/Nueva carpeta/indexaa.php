<?php


?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<title>Citas Medicas</title>
		<link rel="stylesheet" href="../css/style.css" type="text/css" media="screen">
		<script type="text/javascript" src="../js/prototype-1.7.js"></script>
		<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
		<script type="text/javascript" src="../js/map.js"></script>
		<script language="javascript" src="../js/popcalendar.js"></script>
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
						<input type="text" name="usuario" id="" class=""><br>
						<label>Contrase&ntilde;a:</label>
						<input type="password" name="password" id="" class=""><br>
						<label>Recordar</label>
						<input type="checkbox" name="recordar" id="" class=""><br>
						<label><a href="logout.php" class="fz11 notextdeco">Cerrar Sesion</a></label>
						<input type="submit" name="entrar" id="" class="fz10" value="Entrar"><br>
					</form>
				</div>
				<div id="menu" class="curved_all">
					<ul>
						<li class="curved_all"><a onClick="new Ajax.Updater('contenido', 'curriculo.php', { method: 'get' });"><label>Curriculo</label></a></li>
						<li class="curved_all"><a onClick="new Ajax.Updater('contenido', 'precios.php', { method: 'get' });"><label>Precios</label></a></li>
						<li class="curved_all"><a href="citas.php"><label>Citas</label></a></li>
						<li class="curved_all"><a onClick="new Ajax.Updater('contenido', 'curriculo.php', { method: 'get' });"><label>Contacto</label></a></li>
						<li class="curved_all"><a onClick="initialize()"><label>Ubicacion</label></a></li>
						<li class="curved_all"><a href="registro.php"><label>Registro</label></a></li>
					</ul>
				</div>
			</div>
			<div id="contenido">
			</div>
			<div id="footer">
			</div>
		</div>
	</body>
</html>