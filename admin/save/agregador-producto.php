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
		$imagen = $_FILES['imagen']['name'];
		$usuario= $_SESSION['usuario']['id'];
		$producto = new Producto($nomProducto,$descripcion,$precio,$ancho,$alto,$imagen,$cantidad);

		if($producto->AgregarProducto($categoria,1,$usuario)){
			$_SESSION['success_contact'] = true;
			$target_path =ROOT_URL. "assets/dist/img/uploads/";
			$target_path = $target_path . basename( $_FILES['imagen']['name']);
			if(move_uploaded_file($_FILES['imagen']['tmp_name'], $target_path)) {
			echo "El archivo ". basename( $_FILES['imagen']['name']). " ha sido subido";
		}else{
			echo "Ha ocurrido un error, trate de nuevo!";
		}
	}
	else{
		ECHO "Producto no ingresado";
	}		
}
else{
	echo "Todos los campos son obligatorios.";
}
header('Location: ' .ROOT_ADMIN. 'agregar-producto.php');
?>