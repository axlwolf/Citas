<?php
    $conexion= new mysqli('127.0.0.1','root','','consultas');
    $cedula = $_POST['cedula'];
    $query = "SELECT cedula FROM persona WHERE cedula = '$cedula'";
    $result = $conexion->query($query);
    if( $result->num_rows>0){
        echo 0;
    }else{
        echo 1;
	}
?>