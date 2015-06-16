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
	$titulo = "Dashboard";

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
			<h1>
			Dashboard
			<small>Algunas estadisticas</small>
			</h1>
			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
			</ol>
	</section>

	<!-- Contenido -->
	<section class="content">
		<!-- Indicadores -->
		<div class="row">
			<div class="col-md-3 col-sm-6 col-xs-12">
			  	<div class="info-box">
			    	<span class="info-box-icon bg-aqua"><i class="fa fa-user-secret "></i></span>
			    	<div class="info-box-content">
			      		<span class="info-box-text">Administradores</span>
			      		<span class="info-box-number">5</span>
			    	</div>
			  	</div>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12">
			  	<div class="info-box">
			    	<span class="info-box-icon bg-red"><i class="fa fa-tags"></i></span>
			    	<div class="info-box-content">
			      		<span class="info-box-text">Categorias</span>
			      		<span class="info-box-number">4</span>
			    	</div>
				</div>
			</div>

			<!-- fix for small devices only -->
			<div class="clearfix visible-sm-block"></div>

			<div class="col-md-3 col-sm-6 col-xs-12">
			  	<div class="info-box">
			    	<span class="info-box-icon bg-green"><i class="fa fa-shopping-cart"></i></span>
			    	<div class="info-box-content">
			      		<span class="info-box-text">Productos</span>
			      		<span class="info-box-number">254</span>
			    	</div>
			  	</div>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12">
			  	<div class="info-box">
			    	<span class="info-box-icon bg-yellow"><i class="fa fa-group"></i></span>
			    	<div class="info-box-content">
			      		<span class="info-box-text">Contactos</span>
			      		<span class="info-box-number">30</span>
			    	</div>
			  	</div>
			</div>
		</div>

		<!-- Otros Contenidos -->
		<div class="row">
			<div class="col-md-6">
				<div class="box box-solid">
					<div class="box-header with-border">
			  			<h3 class="box-title">Algún grafico?</h3>
			  			<div class="box-tools pull-right">
			    			<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimizar"><i class="fa fa-minus"></i></button>
			  			</div>
					</div>
					<div class="box-body">
			  			Aqui desplegamos infoe
					</div>
					<div class="box-footer text-right">
			  			<button class="btn btn-default">Esto tiene botones?</button>
					</div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="box box-solid">
					<div class="box-header with-border">
			  			<h3 class="box-title">Otro Contenido</h3>
			  			<div class="box-tools pull-right">
			    			<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimizar"><i class="fa fa-minus"></i></button>
			  			</div>
					</div>
					<div class="box-body">
			  			Contactos? Producos?
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