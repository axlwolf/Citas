<?php
    $conexion= new mysqli('127.0.0.1','root','','consultas');
    $correo = $_POST['correo'];
    $query = "SELECT correo FROM persona WHERE correo = '$correo'";
    $result = $conexion->query($query);
    if( $result->num_rows>0){
        echo 0;
    }else{
        echo 1;
	}
?>