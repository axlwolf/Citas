<?php
	require_once('validaciones.php');
	
	if(isset($_POST['nombre'])){$nombre=$_POST['nombre'];}else{$nombre="";}
	if(isset($_POST['apellido'])){$apellido=$_POST['apellido'];}else{$apellido="";}
	if(isset($_POST['usuario'])){$usuario=$_POST['usuario'];}else{$usuario="";}
	if(isset($_POST['cedula'])){$cedula=$_POST['nacionalidad'].$_POST['cedula'];}else{$cedula="";}
	if(isset($_POST['telefono'])){$telefono=$_POST['codigoarea'].$_POST['telefono'];}else{$telefono="";}
	if(isset($_POST['celular'])){$celular=$_POST['operadora'].$_POST['celular'];}else{$celular="";}
	if(isset($_POST['mail'])){$mail=$_POST['mail'];}else{$mail="";}
	$mensaje="";
	$bgcolor="";
	
	if(($nombre!="") && ($apellido!="") && ($usuario!="") && ($cedula!="") && ($telefono!="") && ($celular!="") && ($mail!="")){
		$validaciones=new validaciones();
		if($validaciones->validar_registro($nombre,$apellido,$usuario,$cedula,$telefono,$celular,$mail)){
			//mysql (guardar datos)
			$mensaje="Registro Exitoso!";
			$bgcolor="#40E0D0";
			//header('Location:registro_satisfactorio.php');
		}else{
			$mensaje="Error, verifique los datos e intente de nuevo!";
			$bgcolor="#F08080";
			//header('Location:registro_invalido.php');
		}
	}else{
		if(isset($_POST['registrar'])){
			$mensaje="Error, verifique los datos e intente de nuevo!";
			$bgcolor="#F08080";
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
				</div>
				<div id="titulocita" class="curved_sup_der"><p><h1>Datos de la Cuenta</h1></p></div>
				<div id="cita">
					<form name="registro" action="registro.php" method="post">
					<table style="width:670px; text-align:left";>
						<col style="width:60px;"/>
						<col style="width:120px;"/>
						<col style="width:440px;"/>
						<tr>
						<td><label class="fz12">Nombre:</label></td>
						<td><input type="text" name="nombre" class="fz10" size="25"></input></td>
						<td><label class="fz12">Solo letras. Se debe Comenzar con Mayuscula, seguido de minusculas. Ej. Mariana</label></td>
						</tr>
						<tr>
						<td><label class="fz12">Apellido:</label></td>
						<td><input type="text" name="apellido" class="fz10" size="25"></input></td>
						<td><label class="fz12">Solo letras. Se debe Comenzar con Mayuscula, seguido de minusculas. Ej. Martinez</label></td>
						</tr>
						<td><label class="fz12">Usuario:</label></td>
						<td><input type="text" name="usuario" class="fz10" size="25" maxlength="8"></input></td>
						<td><label class="fz12">Solo letras. Minimo 4 y maximo 8. Ej. Lanana</label></td>
						</tr>
						<tr>
						<td><label class="fz12">Cedula:</label></td>
						<td><select name="nacionalidad" class="fz10">
						<option>V</option>
						<option>E</option></select>
						<input type="text" name="cedula" class="fz10" size="16" maxlength="8"></input></td>
						<td><label class="fz12">Debe cumplir con el formato. Ej. V9999999</label></td>
						</tr>
						<tr>
						<td><label class="fz12">Telefono:</label></td>
						<td><input type="text" name="codigoarea" class="fz10" size="3" maxlength="4"></input>&nbsp;
						<input type="text" name="telefono" class="fz10" size="14" maxlength="7"></input></td>
						<td><label class="fz12">Debe cumplir con el formato. Ej. 02125555555</label></td>
						</tr>
						<tr>
						<td><label class="fz12">Celular:</label></td>
						<td><select name="operadora" class="fz10">
						<option>0412</option>
						<option>0414</option>
						<option>0416</option>
						<option>0422</option>
						<option>0424</option>
						<option>0426</option></select>
						<input type="text" name="celular"  class="fz10" size="11" maxlength="7"></input></td>
						<td><label class="fz12">Debe cumplir con el formato. Ej. 04127777777</label></td>
						</tr>
						<tr>
						<td><label class="fz12">Correo:</label></td>
						<td><input type="mail" name="mail" class="fz10" size="24"></input></td>
						<td><label class="fz12">Debe cumplir con el formato. Ej. doc@gmail.com</label></td>
						</tr>
						<tr>
						<td></td>
						<td><center><input type="submit" name="registrar" id="" class="fz10" value="Registrar"></center></td>
						<td></td>
						</tr>
					</table>
					<input name="fecharegistro" type="hidden" id="fecha"value="<?php echo date("d-m-Y");?>"></input></td>
					</form>
				</div>
				<div id="mensajeregistro" style="background-color:<?php echo $bgcolor;?>;height:40px;"><?php if(isset($mensaje)){echo "<center><h1 style=background-color:".$bgcolor.";>".$mensaje."</h1></center>";}?></div>
			</div>
			<div id="footer">
			</div>
		</div>
	</body>
</html>