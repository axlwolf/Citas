<?php

	require_once('mysql.php');
	
class validar_cita{

	private $fecha;
	private $hora;
	private $boton_cita;

	public $horarios_consulta;
	public $horarios_consulta_length;
	
	private $actualizar;
	
	public $error;
	
	function __construct(){
		//global $actualizar;
		//$actualizar = false;
	}
	
	public function validar_cita(){
		//global $actualizar;
		$fecha = trim($_POST['date']);
		list($dia,$mes,$ano) = explode("-",$fecha);
		$fecha = $mes.'-'.$dia.'-'.$ano;
		if(isset($_POST['hours'])){$hora = trim($_POST['hours']);}else{$hora = "";};
		if(isset($_POST['boton_cita'])){$boton_cita = $_POST['boton_cita'];}else{$boton_cita = false;}
		$cedula = $_SESSION['persona']['cedula'];
		$error = "";
		
		$this->fecha = $fecha;
		$this->hora = $hora;
		$this->boton_cita = $boton_cita;
		$this->cedula = $cedula;
		$this->error = $error;
		
		if(isset($this->boton_cita)){
			$validar = true;
			if($this->fecha == '' || !checkdate($mes,$dia,$ano)){
				$error = 'MENSAJE 1.';
				$validar = false;
			}
			if($this->hora == ''){
				$error = 'MENSAJE 2.';
				$validar = false;
			}
			if($validar == true){ //&& $actualizar == true){
				$fecha = trim($_POST['date']);
				list($dia,$mes,$ano) = explode("-",$fecha);
				$fecha = $ano.'-'.$mes.'-'.$dia;
				
				$this->fecha = $fecha;
				
				echo $this->fecha;
				
				//$pdf = new crear_pdf();
				//$cita_pdf = $pdf->crear_pdf();
				
				$mysql = new mysql();
				$result = $mysql->insert_new_date($this->cedula,$this->fecha,$this->hora);
				//header('Location:inicio.php');
			}
		}
	}

	public function cargar_horas_disponibles(){
		$fecha = trim($_POST['date']);
		die('FECHA: '.$fecha);
		//list($dia,$mes,$ano) = explode("-",$fecha);
		//die ($dia.'-'.$mes.'-'.$ano);
		//$fecha = $ano.'-'.$mes.'-'.$dia;
		
		//$fecha = "2012-08-16";
		
		$this->fecha = $fecha;
		
		$mysql = new mysql();
		$result = $mysql->verificar_horarios($this->fecha);
		$horarios_consulta = array("1:00","1:30","2:00","2:30","3:00","3:30","4:00","4:30","5:00","5:30");
		$horarios_consulta_disponible_bd = array();
		while($Rs = mysql_fetch_assoc($result)){
			array_push($horarios_consulta_disponible_bd,substr($Rs['hora'],1, 4));
		}
		$horarios_consulta_length = count($horarios_consulta);
		$horarios_consulta_disponible_bd_length = count($horarios_consulta_disponible_bd);
		for($i = 0; $i < $horarios_consulta_length; $i++){
			for($j = 0; $j < $horarios_consulta_disponible_bd_length; $j++){
				if($horarios_consulta[$i] == $horarios_consulta_disponible_bd[$j]){
					unset($horarios_consulta[$i]);
					$horarios_consulta = array_values($horarios_consulta);
					$horarios_consulta_length--;
				}
			}
		}
		$horarios_consulta_length = count($horarios_consulta);
		$this->horarios_consulta = $horarios_consulta;
		$this->horarios_consulta_length = $horarios_consulta_length;
	}
}
?>