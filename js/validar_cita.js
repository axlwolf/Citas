$(document).ready(function(){

	fecha = $('#fecha').val();
	$('#b').focus();
	//if($('#fecha').val() != ''){
	//	$('#a').html($('#fecha').val());
	//}
	
	$('#fecha').blur(function(){ //El evento es el que jode y trae la fecha previa a la que se selecciona
		$.post('horarios_disponibles.php', { date: $(this).val()}, function(horas){
			$("#horarios").html(horas);
		});
	});
});

/*
	$.ajax({
		url: 'horarios_disponibles.php',
		type: 'post',
		date: $this.val(),
		success: function(horas){
			$("#horarios").html(horas);
		}
	});
*/