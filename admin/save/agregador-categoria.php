<?php
	/*
	|--------------------------------------------------------------------------
	| Save
	|--------------------------------------------------------------------------
	|
	| Este archivo se encarga de guardar una nueva Categoria en el sistema.
	|
	*/
	require __DIR__.'/../../config/env.php';
	require __DIR__.'/../../config/auth.php';
	require __DIR__.'/../../clases/Categoria.php';

	if( !empty($_POST['nomCategoria']) && !empty($_POST['descripcion']) && !empty($_POST['imagen'] && !empty($_POST['name']) )
	{
		$nomCategoria= $_POST['nomCategoria'];
		$descripcion = $_POST['descripcion'];
		$imagen      = $_FILES['imagen']['name'];
		$categoria    = new Categoria($nomCategoria,$descripcion,$imagen);
		$extension   = pathinfo($imagen,PATHINFO_EXTENSION);

		if(	$extension == "jpg" ||
			$extension == "png" ||
			$extension == "jpeg" ||
			$extension == "gif" ) {


			if($categoria->Agregarcategoria()){
				$_SESSION['success_contact'] = true;
				$_SESSION['categoria']        = $nomCategoria;
				$target_path                 = ROOT_URL. "assets/dist/img/uploads/";
				$target_path                 = $target_path . basename( $_FILES['imagen']['name']);
				if(move_uploaded_file($_FILES['imagen']['tmp_name'], $target_path)) {
					echo "El archivo ". basename( $_FILES['imagen']['name']). " ha sido subido";
				}
				else{
					$_SESSION['error_tmp'] = "Ocurrio un error al moemento de subir la imagen, por favor intenete nuevamente.";
				}
			}
			else{
				$_SESSION['error_tmp'] = "Categoria no ingresada";
			}	


			
		}else{
			$_SESSION['error_tmp'] = "Sólo se permiten imagenes";

		}
	}
	else{
		$_SESSION['error_tmp'] = "Todos los campos son obligatorios.";
	}
	header('Location: ' .ROOT_ADMIN. 'agregar-categoria.php');
?>