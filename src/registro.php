<?php

	require_once('validacion/validar_login.php');
	require_once('validacion/validar_registro.php');
	
	if(isset($_POST['user']) && isset($_POST['password'])){
		$login = new validar_login();
		$login->validar_login();
	}
	
	if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['user_reg']) && isset($_POST['password_1']) && isset($_POST['password_2']) && isset($_POST['nationality']) && isset($_POST['id_card']) && isset($_POST['phone']) && isset($_POST['cell_phone']) && isset($_POST['e_mail'])){
		$registro = new validar_registro();
		$registro->validar_registro($_POST['first_name'],$_POST['last_name'],$_POST['user_reg'],$_POST['password_1'],$_POST['password_2'],$_POST['nationality'],$_POST['id_card'],$_POST['area_code'],$_POST['phone'],$_POST['operator'],$_POST['cell_phone'],$_POST['e_mail']);
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
						<input type="text" name="user" id="" class="" value="<?php if(isset($_COOKIE['user'])){echo $_COOKIE['user'];}?>"/><br>
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
						<li class="curved_all"><label><a href="login.php">Regresar</a><label></li>
					</ul>
				</div>
			</div>
			<div id="contenido">
				<form name="formulario" id="formulario" method="post" action="registro.php">
					<fieldset><legend><h2>Contacto</h2></legend>
					<div><h2>Debe suministrar todos los datos para un registro exitoso.</h2></div><hr>
					<div>
						<label for="nombre">Nombre: </label><br>
						<input type="text" name="first_name" id="nombre" class="curved_all" size="20" maxlength="15"/><span id="validar-nombre"></span><p></p>
					</div>
					<div>
						<label for="apellido">Apellido: </label><br>
						<input type="text" name="last_name" id="apellido" class="curved_all" size="20" maxlength="15"/><span id="validar-apellido"></span><p></p>
					</div>
					<div>
						<label for="usuario">Usuario: </label><br>
						<input type="text" name="user_reg" id="usuario" class="curved_all" size="20" maxlength="8"/><span id="validar-usuario"></span><span id="msgUsuario"></span><p></p>
					</div>
					<div>
						<label for="contrasenia1">Contrase&ntilde;a: </label><br>
						<input type="text" name="password_1" id="contrasenia1" class="curved_all" size="20" maxlength="8"/><span id="validar-contrasenia1"></span><p></p>
					</div>
					<div>
						<label for="contrasenia2">Confirme Contrase&ntilde;a: </label><br>
						<input type="text" name="password_2" id="contrasenia2" class="curved_all" size="20" maxlength="8"/><span id="validar-contrasenia2"></span><span id="comparar-contrasenias"></span><p></p>
					</div>
					<div>
						<label for="nacionalidad">C&eacute;dula: </label><br>
						<select class="element select curved_all" id="nacionalidad" class="curved_all" name="nationality"> 
							<option>V</option>
							<option>E</option>
						</select>
						<input type="text" name="id_card" id="cedula" class="curved_all" size="13" maxlength="8"/><span id="validar-cedula"></span><span id="msgCedula"></span><p></p>
					</div>
					<div>
						<label for="codigoarea">Codigo Area y Tel&eacute;fono: </label><br>
						<input type="text" name="area_code" id="codigoarea" class="curved_all" size="4" maxlength="4"/><input type="text" name="phone" id="telefono" class="curved_all" size="10" maxlength="7"/><span id="validar-codigoarea"></span><span id="validar-telefono"></span><p></p>
					</div>
					<div>
						<label for="celular">Celular: </label><br>
						<select name="operator" id="operadora" class="element select curved_all"> 
							<option>0412</option>
							<option>0414</option>
							<option>0416</option>
							<option>0422</option>
							<option>0424</option>
							<option>0426</option>
						</select>
						<input type="text" name="cell_phone" id="celular" class="curved_all" size="10" maxlength="7"/><span id="validar-celular"></span><p></p>
					</div>
					<div>
						<label for="correo">Correo: </label><br>
						<input type="text" name="e_mail" id="correo" class="curved_all" size="20" maxlength="30"/><span id="validar-correo"></span><span id="msgCorreo"></span><p></p>
					</div>
						<input type="reset" name="borrar" id="borrar" class="curved_all" value="Borrar"/><input type="submit" name="registrar" id="enviar" class="curved_all" value="Enviar" /><span id="msgEnviar"></span>
					</fieldset>
				</form>
			</div>
			<div id="footer">
			</div>
		</div>
		<script type="text/javascript" src="../js/jquery-1.8.0.min.js"></script>  
		<script type="text/javascript" src="../js/validar_registro.js"></script> 
	</body>
</html>