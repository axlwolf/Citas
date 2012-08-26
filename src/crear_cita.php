<?php

	require_once('validacion/validar_cita.php');
	//require_once('validacion/crear_pdf.php');
	
	session_start();
	
	if(isset($_POST['date'])){
		$cita = new validar_cita();
		//$cita->cargar_horas_disponibles();
		$cita->validar_cita();
	}
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<title>Citas Medicas</title>
		<link rel="stylesheet" href="../css/style.css" type="text/css" media="screen">
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
						$_SESSION['time']=date('d/m/Y h:i:s a',time()-(3600*4.5));
						echo '<div><center><p class="fz14">Informacion del dia: '.$_SESSION['time'].'</p></center></div>';
						echo '<hr>';
						echo '<div id="busuario"><center><p class="fz14">Bienvenido '.$_SESSION['usuario'].'</p></center></div>';
					?>
				</div>
				<div id="menu" class="curved_all">
					<ul>
						<li class="curved_all"><a href="logout.php"><label>Salir</label></a></li>
						<li class="curved_all"><a href="inicio.php"><label>Regresar</label></a></li>
					</ul>
				</div>
			</div>
			<div id="contenido">
				<form name="crear_cita" id="crear_cita" method="post" action="crear_cita.php">
					<fieldset><legend><h2>Cita</h2></legend>
					<div><h2>Debe suministrar todos los datos para crear una cita exitosa.</h2></div><hr>
					<div>
						<label for="fecha">Fecha: </label><br>
						<input type="text" name="date" id="fecha" class="curved_all" size="20" readonly maxlength="15" onClick="popUpCalendar(this, crear_cita.fecha, 'dd-mm-yyyy');" /><p></p>
					</div>
					<div id="horarios">
					</div>
					<p id="a"></p>
						<input type="submit" name="boton_cita" id="crearcita" class="curved_all" value="Crear cita" />
						<input type="text" id="b"/>
					</fieldset>
				</form>
			</div>
			<div id="footer">
			</div>
		</div>
		<script type="text/javascript" src="../js/jquery-1.8.0.min.js"></script>  
		<script type="text/javascript" src="../js/validar_cita.js"></script> 
	</body>
</html>