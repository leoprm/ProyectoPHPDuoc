<?php
	/*
	|--------------------------------------------------------------------------
	| Save
	|--------------------------------------------------------------------------
	|
	| Este archivo se encarga de guardar un nuevo Color en el sistema.
	|
	*/
	require __DIR__.'/../../config/env.php';
	require __DIR__.'/../../config/auth.php';
	require __DIR__.'/../../clases/Color.php';

	if( !empty($_POST['nomColor']) && !empty($_POST['hex'] && !empty($_POST['producto']) )
	{
		$idProd		= $_POST['producto'];
		$nomColor	= $_POST['nomColor'];
		$codigo 	= $_POST['hex'];
		$color  	= new Color($idProd,$nomColor,$codigo);

		if($color->AgregarColor()){
			$_SESSION['success_contact'] = true;
			$_SESSION['color']       	 = $nomColor;
		}
		else{
			$_SESSION['error_tmp'] = "Color no ingresado";
		}	
	}
	else{
		$_SESSION['error_tmp'] = "Todos los campos son obligatorios.";
	}
	header('Location: ' .ROOT_ADMIN. 'agregar-color.php');
?>