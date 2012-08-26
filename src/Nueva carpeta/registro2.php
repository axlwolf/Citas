<?php
	require_once('validaciones.php');
	require_once('mysql.php');
	
	if(isset($_POST['nombre'])){$nombre=trim($_POST['nombre']);}else{$nombre="";}
	if(isset($_POST['apellido'])){$apellido=trim($_POST['apellido']);}else{$apellido="";}
	if(isset($_POST['usuario'])){$usuario=trim($_POST['usuario']);}else{$usuario="";}
	if(isset($_POST['contrasenia1'])){$contrasenia1=trim($_POST['contrasenia1']);}else{$contrasenia1="";}
	if(isset($_POST['contrasenia2'])){$contrasenia2=trim($_POST['contrasenia2']);}else{$contrasenia2="";}
	if(isset($_POST['cedula'])){$cedula=trim($_POST['nacionalidad'].$_POST['cedula']);}else{$cedula="";}
	if(isset($_POST['telefono'])){$telefono=trim($_POST['codigoarea'].$_POST['telefono']);}else{$telefono="";}
	if(isset($_POST['celular'])){$celular=trim($_POST['operadora'].$_POST['celular']);}else{$celular="";}
	if(isset($_POST['mail'])){$mail=trim($_POST['mail']);}else{$mail="";}
	
	if(($nombre!="") && ($apellido!="") && ($usuario!="") && ($contrasenia1!="") && ($contrasenia2!="") && ($cedula!="") && ($telefono!="") && ($celular!="") && ($mail!="")){
		$validaciones=new validaciones();
		if($validaciones->validar_registro($nombre,$apellido,$usuario,$contrasenia1,$contrasenia2,$cedula,$telefono,$celular,$mail)){
			$mysql=new mysql();
			$mysql->add_new_usser($nombre,$apellido,$usuario,$contrasenia1,$cedula,$telefono,$celular,$mail);
			header('Location:registro_satisfactorio.php');
		}else{
			header('Location:registro_invalido.php');
		}
	}else{
		if(isset($_POST['submit'])){
			header('Location:registro_invalido.php');
		}
	}
?>

	<div id="form_container" class="curved_all">
		<form id="form_469305" class="appnitro"  method="post" action="registro.php">
			<div class="form_description">
				<h2>Registro de Cuenta</h2>
				<p>A continuacion debe suministrar todos los datos que se le solicitan de forma correcta. Todos los campos son obligatorios!.</p>
			</div>						
			<ul>
				<li id="li_1" >
					<label class="description" for="nombre">Nombre </label>
					<div>
						<input id="nombre" name="nombre" class="element text curved_all" type="text" maxlength="15" value="Rqweqw"/> 
					</div><p class="guidelines curved_all" id="guide_1"><small>Solo se aceptan letras. Se debe comenzar por una may&uacute;scula seguida de min&uacute;sculas. Ej. Ana</small></p> 
				</li>		
				<li id="li_2" >
					<label class="description" for="apellido">Apellido </label>
					<div>
						<input id="apellido" name="apellido" class="element text curved_all" type="text" maxlength="15" value="Dqweqw"/> 
					</div><p class="guidelines curved_all" id="guide_2"><small>Solo se aceptan letras. Se debe comenzar por una may&uacute;scula seguida de min&uacute;sculas. Ej. Martinez</small></p> 
				</li>
				<li id="li_3" >
					<label class="description" for="usuario">Usuario </label>
					<div>
						<input id="usuario" name="usuario" class="element text curved_all" type="text" maxlength="8" value="aaaaa"/> 
					</div><p class="guidelines curved_all" id="guide_3"><small>Solo se aceptan letras. M&iacute;nimo 4 y m&aacute;ximo 8. Ej. Lanana</small></p> 
				</li>
				<li id="li_3" >
					<label class="description" for="contrasenia1">Contrase&ntilde;a </label>
					<div>
						<input id="contrasenia1" name="contrasenia1" class="element text curved_all" type="password" maxlength="15" value="12345"/> 
					</div><p class="guidelines curved_all" id="guide_3"><small>Solo se aceptan letras. M&iacute;nimo 4 y m&aacute;ximo 15. Ej. Lanana</small></p> 
				</li>
				<li id="li_3" >
					<label class="description" for="contrasenia2">Confirme Contrase&ntilde;a </label>
					<div>
						<input id="contrasenia2" name="contrasenia2" class="element text curved_all" type="password" maxlength="15" value="12345"/> 
					</div><p class="guidelines curved_all" id="guide_3"><small>Solo se aceptan letras. M&iacute;nimo 4 y m&aacute;ximo 15. Ej. Lanana</small></p> 
				</li>
				<li id="li_4" >
					<label class="description" for="cedula">C&eacute;dula </label>
					<div>
						<select class="element select curved_all" id="nacionalidad" name="nacionalidad" > 
							<option>V</option>
							<option>E</option>
						</select>
						<input id="cedula" name="cedula" class="element text curved_all" type="text" maxlength="8" value="12312321" size="13"/> 
					</div><p class="guidelines curved_all" id="guide_4"><small>Introduzca su c&eacute;dula. Indique si es Venezolana o Extranjera. Ej. V20123321</small></p> 
				</li>
				<li id="li_5" >
					<label class="description" for="telefono">Codigo Area y Tel&eacute;fono </label>
					<div>
						<input id="codigoarea" name="codigoarea" class="element text curved_all" type="text" maxlength="4" value="0212" size="4" /> 
						<input id="telefono" name="telefono" class="element text curved_all" type="text" maxlength="7" value="12312323" size="10"/> 
					</div><p class="guidelines curved_all" id="guide_5"><small>Introduzca su tel&eacute;fono. Indique codigo de area. Ej. 0212123456</small></p> 
				</li>
				<li id="li_6" >
					<label class="description" for="celular">Celular </label>
					<div>
						<select class="element select curved_all" id="operadora" name="operadora"> 
							<option>0412</option>
							<option>0414</option>
							<option>0416</option>
							<option>0422</option>
							<option>0424</option>
							<option>0426</option>
						</select>
						<input id="celular" name="celular" class="element text curved_all" type="text" maxlength="7" value="1232123" size="10"/> 
					</div><p class="guidelines curved_all" id="guide_6"><small>Introduzca su celular. Indique su codigo de operadora. Ej. 041243212323</small></p> 
				</li>
				<li id="li_7" >
					<label class="description" for="mail">Correo </label>
					<div>
						<input id="mail" name="mail" class="element text curved_all" type="text" maxlength="255" value="gigio@hotmail.com"/> 
					</div><p class="guidelines curved_all" id="guide_7"><small>Introduzca su correo. Ej. gigio@hotmail.com</small></p> 
				</li>
				<li class="buttons">
					<input id="saveForm" class="button_text curved_all" type="submit" name="submit" value="Registrar" />
				</li>
			</ul>
		</form>	
	</div>