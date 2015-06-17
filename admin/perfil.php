<?php
	/*
	|--------------------------------------------------------------------------
	| Archivos y configuracion de Pagina
	|--------------------------------------------------------------------------
	|
	| Aqui se hace "required" de archivos minimos de funcionamiento para armar
	| cada pagina, mas declaraion de variables para el header, menu, sidebar.
	|
	*/
	$titulo = "Mi Perfil";

	require __DIR__.'/../config/env.php';
	require __DIR__.'/./templates/header.php';
	require __DIR__.'/./templates/menu.php';
	require __DIR__.'/./templates/sidebar.php';

	/*
	|--------------------------------------------------------------------------
	| Contenido del Sitio
	|--------------------------------------------------------------------------
	|
	| Aqui se agrega toda la funcionalidad de la pagina, especialmente deberia 
	| haber solo HTML cn algunos tags para PHP para acceder a variables.
	|
	*/
?>

<div class="content-wrapper">
	<!-- Header de la pagina -->
	<section class="content-header">
		<h1>Mi Perfil</h1>
		<ol class="breadcrumb">
		<li><a href="<?= ROOT_ADMIN ?>index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li class="active"><i class="fa fa-user"></i> Mi Perfil</li>
		</ol>
	</section>

	<!-- Contenido -->
	<section class="content">

		<!-- Otros Contenidos -->
		<div class="row">
			<div class="col-md-8">
				<div class="box box-solid">
					<div class="box-header with-border">
			  			<h3 class="box-title">Mis Datos</h3>
			  			<div class="box-tools pull-right">
			    			<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimizar"><i class="fa fa-minus"></i></button>
			  			</div>
					</div>
					<div class="box-body">

					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="col-md-12">
					<div class="box box-solid">
						<div class="box-header with-border">
				  			<h3 class="box-title">Productos que carge</h3>
				  			<div class="box-tools pull-right">
				    			<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimizar"><i class="fa fa-minus"></i></button>
				  			</div>
						</div>
						<div class="box-body">
							Lista de productos
						</div>
					</div>
				</div>

				<div class="col-md-12">
					<div class="box box-solid">
						<div class="box-header with-border">
				  			<h3 class="box-title">Contactos resuletos</h3>
				  			<div class="box-tools pull-right">
				    			<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimizar"><i class="fa fa-minus"></i></button>
				  			</div>
						</div>
						<div class="box-body">
							Contactos que resolvi yo
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<?php
	/*
	|--------------------------------------------------------------------------
	| Footer
	|--------------------------------------------------------------------------
	|
	| Solo se hace un require del footer de la pagina de admin.
	|
	*/
	require __DIR__.'/./templates/footer.php';
?>