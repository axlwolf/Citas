<?php
	if($_COOKIE['u'] && $_COOKIE['c']){
		//header('Location:inicio.php');
		header('Location:login.php');
	}else{
		header('Location:login.php');
	}
?>