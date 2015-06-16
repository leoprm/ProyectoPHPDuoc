<?php
	/*
	|--------------------------------------------------------------------------
	| Logout
	|--------------------------------------------------------------------------
	|
	| Archivo encargado de cerrar la sesion de adminitracion
	|
	*/
	require __DIR__.'/../config/env.php';

  	header('Location: login.php');
?>