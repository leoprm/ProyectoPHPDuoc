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

	require './config/env.php';
	include './templates/header.php';
	include './templates/menu.php';
	include './templates/sidebar.php';

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
		  			                <th>Name</th>
		  			                <th>Position</th>
		  			                <th>Office</th>
		  			                <th>Age</th>
		  			                <th>Start date</th>
		  			                <th>Salary</th>
		  			            </tr>
		  			        </thead>
		  			 
		  			        <tfoot>
		  			            <tr>
		  			                <th>Name</th>
		  			                <th>Position</th>
		  			                <th>Office</th>
		  			                <th>Age</th>
		  			                <th>Start date</th>
		  			                <th>Salary</th>
		  			            </tr>
		  			        </tfoot>
		  			 
		  			        <tbody>
		  			            <tr>
		  			                <td>Tiger Nixon</td>
		  			                <td>System Architect</td>
		  			                <td>Edinburgh</td>
		  			                <td>61</td>
		  			                <td>2011/04/25</td>
		  			                <td>$320,800</td>
		  			            </tr>
		  			            <tr>
		  			                <td>Garrett Winters</td>
		  			                <td>Accountant</td>
		  			                <td>Tokyo</td>
		  			                <td>63</td>
		  			                <td>2011/07/25</td>
		  			                <td>$170,750</td>
		  			            </tr>
		  			            <tr>
		  			                <td>Ashton Cox</td>
		  			                <td>Junior Technical Author</td>
		  			                <td>San Francisco</td>
		  			                <td>66</td>
		  			                <td>2009/01/12</td>
		  			                <td>$86,000</td>
		  			            </tr>
		  			            <tr>
		  			                <td>Cedric Kelly</td>
		  			                <td>Senior Javascript Developer</td>
		  			                <td>Edinburgh</td>
		  			                <td>22</td>
		  			                <td>2012/03/29</td>
		  			                <td>$433,060</td>
		  			            </tr>
		  			            <tr>
		  			                <td>Airi Satou</td>
		  			                <td>Accountant</td>
		  			                <td>Tokyo</td>
		  			                <td>33</td>
		  			                <td>2008/11/28</td>
		  			                <td>$162,700</td>
		  			            </tr>
		  			            <tr>
		  			                <td>Brielle Williamson</td>
		  			                <td>Integration Specialist</td>
		  			                <td>New York</td>
		  			                <td>61</td>
		  			                <td>2012/12/02</td>
		  			                <td>$372,000</td>
		  			            </tr>
		  			            <tr>
		  			                <td>Herrod Chandler</td>
		  			                <td>Sales Assistant</td>
		  			                <td>San Francisco</td>
		  			                <td>59</td>
		  			                <td>2012/08/06</td>
		  			                <td>$137,500</td>
		  			            </tr>
		  			            <tr>
		  			                <td>Rhona Davidson</td>
		  			                <td>Integration Specialist</td>
		  			                <td>Tokyo</td>
		  			                <td>55</td>
		  			                <td>2010/10/14</td>
		  			                <td>$327,900</td>
		  			            </tr>
		  			            <tr>
		  			                <td>Colleen Hurst</td>
		  			                <td>Javascript Developer</td>
		  			                <td>San Francisco</td>
		  			                <td>39</td>
		  			                <td>2009/09/15</td>
		  			                <td>$205,500</td>
		  			            </tr>
		  			            <tr>
		  			                <td>Sonya Frost</td>
		  			                <td>Software Engineer</td>
		  			                <td>Edinburgh</td>
		  			                <td>23</td>
		  			                <td>2008/12/13</td>
		  			                <td>$103,600</td>
		  			            </tr>
		  			            <tr>
		  			                <td>Lael Greer</td>
		  			                <td>Systems Administrator</td>
		  			                <td>London</td>
		  			                <td>21</td>
		  			                <td>2009/02/27</td>
		  			                <td>$103,500</td>
		  			            </tr>
		  			            <tr>
		  			                <td>Donna Snider</td>
		  			                <td>Customer Support</td>
		  			                <td>New York</td>
		  			                <td>27</td>
		  			                <td>2011/01/25</td>
		  			                <td>$112,000</td>
		  			            </tr>
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
	include './templates/footer.php';
?>