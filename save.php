<?php
	/*
	|--------------------------------------------------------------------------
	| Save
	|--------------------------------------------------------------------------
	|
	| Este archivo se encarga de guardar un nuevo contacto en el sistema y
	| enviar email de confirmacion al admin del sistema y el cliente.
	|
	*/
	require __DIR__.'/./config/env.php';
	require __DIR__.'/./clases/Contacto.php';
	
	if( !empty($_POST['email']) && !empty($_POST['nombre']) && !empty($_POST['comentario']) && !empty($_POST['asunto']) ){
		$email   = $_POST['email'];
		$nombre  = $_POST['nombre'];
		$mensaje = $_POST['comentario'];
		$asunto  = $_POST['asunto'];
		$contacto = new Contacto($email,$nombre,$mensaje,$asunto);
		if($contacto->guardar()){
	    	$_SESSION['success_contact'] = true;
		}
		else{
			$_SESSION['error_tmp'] = "Credenciales de acceso incorrectas";
		}		
	}
	else{
		$_SESSION['error_tmp'] = "Todos los campos son obligatorios.";
	}
	header('Location: contacto.php');
?>
