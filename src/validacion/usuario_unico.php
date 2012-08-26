<?php
    $conexion= new mysqli('127.0.0.1','root','','consultas');
    $usuario = $_POST['usuario'];
    $query = "SELECT usuario FROM persona WHERE usuario = '$usuario'";
    $result = $conexion->query($query);
    if( $result->num_rows>0){
        echo 0;
    }else{
        echo 1;
	}
?>