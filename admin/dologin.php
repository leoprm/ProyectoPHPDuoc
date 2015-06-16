<?php
	/*
	|--------------------------------------------------------------------------
	| Login
	|--------------------------------------------------------------------------
	|
	| Archivo encargado de crear el inicio de sesion
	|
	*/
	/*Cambio ./ delante de config */
	require 'config/env.php';
	include  ROOT_URL.'/clases/Usuario.php';
	


	$usr=new Usuario($_POST['email'],"",$_POST['pass'],"","","");
    var_dump($usr);
	if($usr->VerificaAcceso()){
		echo "Todo bien";
		header('Location: index.php');
	}
	else{
		echo "error en la PWD";
	}
?>
