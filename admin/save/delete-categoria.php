<?php
	/*
	|--------------------------------------------------------------------------
	| Save
	|--------------------------------------------------------------------------
	|
	| Este archivo se encarga de eliminar una categoria del sistema.
	|
	*/
	require __DIR__.'/../../config/env.php';
	require __DIR__.'/../../config/auth.php';
	require __DIR__.'/../../clases/Categoria.php';
	$categoria = new Categoria;
	
		$idcat= ( isset($_GET['id']) && $_GET['id'] != "" ) ? $_GET['id'] : null;
		$imgn= ( isset($_GET['img']) && $_GET['img'] != "" ) ? $_GET['img'] : null;
		$nomcat= ( isset($_GET['nom']) && $_GET['nom'] != "" ) ? $_GET['nom'] : null;

		if($categoria->eliminaCategoria($idcat)){
			$_SESSION['success_contact'] = true;
            $_SESSION['categoria'] = $nomcat;
            
			/*Metodo de php que elimina las imagenes del servidor*/
			$file = ROOT_URL. "assets/dist/img/uploads/" . $imgn;
			$do = unlink($file);
 
			
              
		}else{
			echo "Ha ocurrido un error, trate de nuevo!";
		}
	

header('Location: ' .ROOT_ADMIN. 'categorias.php');
?>