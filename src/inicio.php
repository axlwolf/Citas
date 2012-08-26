<?php

	require_once('mysql.php');

	session_start();
	
	$usuario = $_SESSION['usuario'];
	$contraseña = $_SESSION['contraseña'];
	
	$mysql = new mysql();
	$datos_persona = $mysql->devolver_datos_personas($usuario,$contraseña);

	while($Rs = mysql_fetch_assoc($datos_persona)){
		foreach($Rs as $key => $value){
			$_SESSION['persona'][$key] = $value;
			//echo $_SESSION['persona'][$key].'<br>';
		}
	}
	
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<title>Citas Medicas</title>
		<link rel="stylesheet" href="../css/style.css" type="text/css" media="screen">
		<script type="text/javascript" src="../js/prototype-1.7.js"></script>
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
					<?php 
						$_SESSION['time']=date('d/m/Y h:i:s a',time()-(3600*7));
						echo '<div><center><p class="fz14">Informacion del dia: '.$_SESSION['time'].'</p></center></div>';
						echo '<hr>';
						echo '<div id="busuario"><center><p class="fz14">Bienvenido '.$_SESSION['usuario'].'</p></center></div>';
					?>
				</div>
				<div id="menu" class="curved_all">
					<ul>
						<li class="curved_all"><label><a href="logout.php">Salir</a></label></li>
						<li class="curved_all"><label><a href="crear_cita.php">Crear Cita</a></label></li>
						<li class="curved_all"><label><a onClick="new Ajax.Updater('contenido', 'consultar_cita.php', { method: 'get' });">Consultar Cita</a></label></li>
						<li class="curved_all"><label><a href="modificar_cita.php"><label>Modificar Cita</label></a></li>
						<li class="curved_all"><label><a onClick="new Ajax.Updater('contenido', 'eliminar_cita.php', { method: 'get' });">Eliminar Cita</a></label></li>
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