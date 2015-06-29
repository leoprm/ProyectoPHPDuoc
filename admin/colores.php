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
	$titulo = "Colores";

	require __DIR__.'/../config/auth.php';
	require __DIR__.'/../config/env.php';
	require __DIR__.'/./templates/header.php';
	require __DIR__.'/./templates/menu.php';
	require __DIR__.'/./templates/sidebar.php';
	require __DIR__.'/../clases/Color.php';

	/*
	|--------------------------------------------------------------------------
	| Contenido del Sitio
	|--------------------------------------------------------------------------
	|
	| Aqui se agrega toda la funcionalidad de la pagina, especialmente deberia 
	| haber solo HTML cn algunos tags para PHP para acceder a variables.
	|
	*/
	$color = new color();
	$listaCol = $color->ObtenerLista();
?>

<div class="content-wrapper">
	<!-- Header de la pagina -->
	<section class="content-header">
		<h1>
			Colores
			<small>Filtrad por "Reclamos"</small>
		</h1>
		<ol class="breadcrumb">
		<li><a href="<?= ROOT_ADMIN ?>index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li class="active"><i class="fa fa-group"></i> Colores</li>
		</ol>
	</section>

	<!-- Contenido -->
	<section class="content">

		<!-- Otros Contenidos -->
		<div class="row">
			<div class="col-md-8">
				<div class="box box-solid">
					<div class="box-header with-border">
			  			<h3 class="box-title">Lista de Colores</h3>
			  			<div class="box-tools pull-right">
			    			<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimizar"><i class="fa fa-minus"></i></button>
			  			</div>
					</div>
					<div class="box-body">
			  			<table id="dataTablesTable" class="table table-striped table-bordered" width="100%">
		  			       <thead>
		  			            <tr>
		  			                <th>Nombre</th>
		  			                <th>Color</th>
		  			            </tr>
		  			        </thead>
		  			 
		  			        <tfoot>
		  			            <tr>
		  			                <th>Nombre</th>
		  			                <th>Color</th>
		  			            </tr>
		  			        </tfoot>
		  			 
		  			       <tbody>
		  			      		 <?php foreach ($listaCol as $lista) { ?>
			  			            <tr>
			  			                <td><?=$lista['NOMBRECOLOR']?></td>
			  			                <td><?=$lista['COD_HEX']?></td>
			  			                <td> <a href="<?= ROOT_ADMIN ?>editarColor.php?id=<?= $lista['IDCOLOR'] ?>" class="btn btn-warning"> Editar </a> </td>
			  			            </tr>
			  			    	<?php };?>
		  			        </tbody>
		  			    </table>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="box box-solid">
					<div class="box-header with-border">
			  			<h3 class="box-title">Un grafico?</h3>
			  			<div class="box-tools pull-right">
			    			<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimizar"><i class="fa fa-minus"></i></button>
			  			</div>
					</div>
					<div class="box-body">
						Aqui va a ir un grafico comparativo
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