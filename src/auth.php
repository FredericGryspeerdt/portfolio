<?php
	session_start();
	
    if(!isset($_SESSION["username"])){
		//header("Location: login.php");
		$_SESSION['step'] = 'login';
		//exit(); 
	}
?>