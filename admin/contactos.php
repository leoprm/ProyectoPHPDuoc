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
	$titulo = "Contactos";

	require __DIR__.'/../config/auth.php';
	require __DIR__.'/../config/env.php';
	require __DIR__.'/./templates/header.php';
	require __DIR__.'/./templates/menu.php';
	require __DIR__.'/./templates/sidebar.php';
	require __DIR__.'/../clases/Contacto.php';

	/*
	|--------------------------------------------------------------------------
	| Contenido del Sitio
	|--------------------------------------------------------------------------
	|
	| Aqui se agrega toda la funcionalidad de la pagina, especialmente deberia 
	| haber solo HTML cn algunos tags para PHP para acceder a variables.
	|
	*/
	$contacto = new contacto();
	$listaCont = $contacto->ObtenerLista();
?>

<div class="content-wrapper">
	<!-- Header de la pagina -->
	<section class="content-header">
		<h1>
			Contactos
			<small>Filtrad por "Reclamos"</small>
		</h1>
		<ol class="breadcrumb">
		<li><a href="<?= ROOT_ADMIN ?>index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li class="active"><i class="fa fa-group"></i> Contactos</li>
		</ol>
	</section>

	<!-- Contenido -->
	<section class="content">

		<!-- Otros Contenidos -->
		<div class="row">
			<div class="col-md-8">
				<div class="box box-solid">
					<div class="box-header with-border">
			  			<h3 class="box-title">Lista de Contactos</h3>
			  			<div class="box-tools pull-right">
			    			<button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Minimizar"><i class="fa fa-minus"></i></button>
			  			</div>
					</div>
					<div class="box-body">
			  			<table id="dataTablesTable" class="table table-striped table-bordered" width="100%">
		  			       <thead>
		  			            <tr>
		  			                <th>Nombre</th>
		  			                <th>Email</th>
		  			                <th>Asunto</th>	
		  			                <th>Mensaje</th>	
		  			                <th>Fecha de envío</th>	
		  			            </tr>
		  			        </thead>
		  			 
		  			        <tfoot>
		  			            <tr>
		  			                <th>Nombre</th>
		  			                <th>Email</th>
		  			                <th>Asunto</th>	
		  			                <th>Mensaje</th>	
		  			                <th>Fecha de envío</th>	
		  			            </tr>
		  			        </tfoot>
		  			 
		  			       <tbody>
		  			      		 <?php foreach ($listaCont as $lista) { ?>
			  			            <tr>
			  			                <td><?=$lista['NOMBRECONTACTO']?></td>
			  			                <td><?=$lista['EMAILCONTAC']?></td>
			  			                <td><?=$lista['ASUNTO']?></td>
			  			                <td><?=utf8_encode($lista['MENSAJE'])?></td>
			  			                <td><?=$lista['FECHAENVIO']?></td>
			  			                <td> <a href="<?= ROOT_ADMIN ?>editarColor.php?id=<?= $lista['IDCONTACTO'] ?>" class="btn btn-warning"> Editar </a> </td>
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