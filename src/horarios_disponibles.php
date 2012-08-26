<?php
	require_once('validacion/validar_cita.php');
	
	$cita = new validar_cita();
	$cita->cargar_horas_disponibles();
	
?>


<div id="horarios">
	<label for="horario">Horario: </label><br>
	<select name="hours" id="horario" class="element select curved_all"> 
		<?php
			$i = 0;
			while($i < $cita->horarios_consulta_length){
				echo '<option>'.$cita->horarios_consulta[$i].'</option>';
				$i++;
			}
		?>
	</select>
</div>