<?php
	/*
	|--------------------------------------------------------------------------
	| Login
	|--------------------------------------------------------------------------
	|
	| Archivo encargado de crear el inicio de sesion
	|
	*/
	require './config/env.php';
	include 'clases/Usuario.php';
	header('Location: index.php');
	

	$usr=new Usuario($_POST['email'],"",$_POST['pass'],"","","");
	
	if($usr->VerificaAcceso()){
		echo "Todo bien";
	}
	else{
		echo "error en la PWD";
	}
	?>