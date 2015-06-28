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
	$titulo = "Productos";

	require __DIR__.'/../config/auth.php';
	require __DIR__.'/../config/env.php';
	require __DIR__.'/./templates/header.php';
	require __DIR__.'/./templates/menu.php';
	require __DIR__.'/./templates/sidebar.php';
	require __DIR__.'/../clases/Producto.php';

	$modeloProducto = new Producto();
	$listaProducto = $modeloProducto->obtenerTodos();
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
		<h1>Productos</h1>
		<ol class="breadcrumb">
		<li><a href="<?= ROOT_ADMIN ?>index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li class="active"><i class="fa fa-shopping-cart"></i> Prodcutos</li>
		</ol>
	</section>

	<!-- Contenido -->
	<section class="content">

		<!-- Otros Contenidos -->
		<div class="row">
			<div class="col-md-offset-1 col-md-10">
				<div class="box box-solid">
					<div class="box-header with-border">
			  			<h3 class="box-title">Lista de productos</h3>
			  			<div class="box-tools pull-right">
			    			<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimizar"><i class="fa fa-minus"></i></button>
			  			</div>
					</div>
					<div class="box-body">
			  			<table id="dataTablesTable" class="table table-striped table-bordered" width="100%">
		  			        <thead>
		  			            <tr>
		  			            	<th>#</th>
		  			                <th>Producto</th>
		  			                <th>Descripción</th>
		  			                <th>Precio</th>
		  			                <th>Ancho</th>
		  			                <th>Alto</th>
		  			                <th>imagen</th>
		  			                <th>cantidad</th>
		  			                <th>Acciones</th>
		  			            </tr>
		  			        </thead>		  			 
		  			        <tfoot>
		  			            <tr>
		  			            	<th>#</th>
		  			                <th>Producto</th>
		  			                <th>Descripción</th>
		  			                <th>Precio</th>
		  			                <th>Ancho</th>
		  			                <th>Alto</th>
		  			                <th>imagen</th>
		  			                <th>cantidad</th>
		  			                <th>Acciones</th>
		  			            </tr>
		  			        </tfoot>
		  			        <tbody>
							<?php foreach ($listaProducto as $row){ ?>	  			 
							<tr>
								<td><?=$row['CODPROD']?></td>
								<td><?=$row['NOMBREPROD']?></td>
								<td><?=$row['DESCRIPPROD']?></td>
								<td><?=$row['PRECIO']?></td>
								<td><?=$row['DIMANCHO']?></td>
								<td><?=$row['DIMALTO']?></td>
								<td><?=$row['IMAGENPROD']?></td>
								<td><?=$row['CANTIDAD']?></td>
								<td>
									<div class="form-group">
										<div class="col-md-2 col-sm-4 col-xs-8" >
											<button type="submit" class="btn btn-danger">Eliminar <span class="glyphicon glyphicon-trash"></span></button>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-2 col-sm-4 col-xs-8">
											<button type="submit" class="btn btn-info">Modificar <span class="glyphicon glyphicon-refresh"></span></button>
										</div>
									</div>
								</td>
							</tr>
		  			        <?php }  ?>  
		  			        </tbody>
		  			    </table>
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