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
	require __DIR__.'/../../config/env.php';
	require __DIR__.'/../../config/auth.php';
	require __DIR__.'/../../clases/Producto.php';
	require __DIR__.'/../../clases/Usuario.php';
	
	if( !empty($_POST['nomProducto']) && !empty($_POST['descripcion']) && !empty($_POST['precio']) && !empty($_POST['ancho']) && !empty($_POST['alto']) && !empty($_POST['cantidad'])&& !empty($_POST['color'])&& !empty($_POST['categoria']) ){
		$nomProducto   = $_POST['nomProducto'];
		$descripcion  = $_POST['descripcion'];
		$precio  = $_POST['precio'];
		$ancho   = $_POST['ancho'];
		$alto   = $_POST['alto'];
		$cantidad = $_POST['cantidad'];
		$color   = $_POST['color'];
		$categoria   = $_POST['categoria'];
		$imagen = $_POST['imagen'];
		$usuario= $_SESSION['usuario']['id'];
		$producto = new Producto($nomProducto,$descripcion,$precio,$ancho,$alto,$cantidad,$imagen);

		if($producto->AgregarProducto($categoria,$color,$usuario)){
	    	$_SESSION['success_contact'] = true;
		}
		else{
			$_SESSION['error_tmp'] = "Credenciales de acceso incorrectas";
		}		
	}
	else{
		$_SESSION['error_tmp'] = "Todos los campos son obligatorios.";
	}
	/*
	header('Location:' <?= ROOT_ADMIN ?> '/agregar-producto.php');
	*/
?>