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
				<div id="opciones" class="curved_all_iz">
					<ul>
						<li class="curved_all"><a onClick=""><label>Crear Cita</label></a></li>
						<li class="curved_all"><a onClick=""><label>Editar Cita</label></a></li>
						<li class="curved_all"><a onClick=""><label>Eliminar Cita</label></a></li>
						<li class="curved_all"><a onClick=""><label>Consultar Cita</label></a></li>
					</ul>
				</div>
				<div id="titulocita" class="curved_sup_der"><p><h1>Datos de la Cita Medica</h1></p></div>
				<div id="cita">
					<form name="registro" action="" method="post">
					<table style="width:670px; text-align:left";>
						<col style="width:60px;"/>
						<col style="width:150px;"/>
						<col style="width:410px;"/>
						<tr>
						<td><label>Nombre:</label></td>
						<td><input type="text" class="fz10" size="30"></input></td>
						<td><label class="red strong">No se permiten caracteres especiales</label></td>
						</tr>
						<tr>
						<td><label>Apellido:</label></td>
						<td><input type="text" class="fz10" size="30"></input></td>
						<td><label class="red strong">No se permiten caracteres especiales</label></td>
						</tr>
						<tr>
						<td><label>Cedula:</label></td>
						<td><select class="fz10">
						<option>V</option>
						<option>E</option></select>
						<input type="text" class="fz10" size="21" maxlength="8"></input></td>
						<td><label class="red strong">Debe cumplir con el formato. Ej. V9999999</label></td>
						</tr>
						<tr>
						<td><label>Telefono:</label></td>
						<td><input type="text" class="fz10" size="3" maxlength="4"></input>&nbsp;<input type="text" class="fz10" size="19" maxlength="7"></input></td>
						<td><label class="red strong">Debe cumplir con el formato. Ej. 02125555555</label></td>
						</tr>
						<tr>
						<td><label>Celular:</label></td>
						<td><select class="fz10">
						<option>0412</option>
						<option>0414</option>
						<option>0416</option>
						<option>0422</option>
						<option>0424</option>
						<option>0426</option></select>
						<input type="text" class="fz10" size="16" maxlength="7"></input></td>
						<td><label class="red strong">Debe cumplir con el formato. Ej. 04127777777</label></td>
						</tr>
						<tr>
						<td><label>Fecha:</label></td>
						<td>
						<input name="f" type="text" class="fz10" id="fecha" size="30" onClick="popUpCalendar(this, registro.fecha, 'dd-mm-yyyy');" size="10" readonly></input></td>
						<td><label class="red strong">Debe introducir la fecha con el calendario. Ej. dia-mes-a&ntilde;o</label></td>
						</tr>
						<tr>
						<td><label>Hora:</label></td>
						<td><input type="text" class="fz10" size="30"></input></td>
						<td><label class="red strong">Debe seleccionar una de las horas disponibles para la cita de ese dia.</label></td>
						</tr>
						<tr>
						<td></td>
						<td><center><input type="submit" name="crearcita" id="" class="fz10" value="Crear Cita"></center></td>
						<td></td>
						</tr>
					</table>
					</form>
				</div>
			</div>
			<div id="footer">
			</div>
		</div>
		<script type="text/javascript" src="../js/jquery-1.6.2.min.js"></script>  
		<script type="text/javascript" src="../js/validaciones.js"></script> 
	</body>
</html>