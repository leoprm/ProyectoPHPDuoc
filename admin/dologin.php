<?php
	/*
	|--------------------------------------------------------------------------
	| Login
	|--------------------------------------------------------------------------
	|
	| Archivo encargado de crear el inicio de sesion
	|
	*/
	ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
	
	require __DIR__.'/../config/env.php';
	require __DIR__.'/../clases/Usuario.php';
	
	if( !empty($_POST['email']) && !empty($_POST['pass']) ){
		$usr = new Usuario($_POST['email'],"",$_POST['pass'],"","","");
	    var_dump($usr);
		if($usr->VerificaAcceso()){
			echo "Todo bien";
			header('Location: index.php');
		}
		else{
			echo "error en la PWD";
		}		
	}
	else{
		$_SESSION['error_tmp'] = "Se requiren los datos de acceso";
		header('Location: login.php');
	}

?>
