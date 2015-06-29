<?php


	require __DIR__.'/../config/auth.php';
	require __DIR__.'/../config/env.php';
	require __DIR__.'/../clases/Producto.php';



	$modeloProducto = new Producto();
	$listaProducto = $modeloProducto->obtenerTodos();

	ob_start();
?>
<style type="text/css">
<!--
    .table-bordered {border: 1px solid #ecf0f1}
 
	.table-bordered>thead>tr>th,.table-bordered>tbody>tr>th,.table-bordered>tfoot>tr>th,.table-bordered>thead>tr>td,.table-bordered>tbody>tr>td,.table-bordered>tfoot>tr>td {border: 1px solid #ecf0f1}
 
	.table-bordered>thead>tr>th,.table-bordered>thead>tr>td {border-bottom-width: 2px}
 
	.table-striped>tbody>tr:nth-of-type(odd) {background-color: #f9f9f9}
</style>

<table name="dataTablesTabler" id="dataTablesTabler" class="table table-striped table-bordered" width="100%">
	<thead>
		<tr>
			<th>#</th>
			<th>Producto</th>
			<th>Descripcion</th>
			<th>Precio</th>
			<th>Ancho</th>
			<th>Alto</th>
			<th>imagen</th>
			<th>cantidad</th>
			
		</tr>
	</thead>		  			 

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
			
		</tr>
		<?php }  ?>  
	</tbody>
</table>

<?php
require_once(__DIR__.'/../assets/extra/dompdf/dompdf_config.inc.php');
$dompdf = new DOMPDF();
$dompdf->load_html(ob_get_clean());
$dompdf->render();
$pdf = $dompdf->output();
$filename = time().'.pdf';

$dompdf->stream($filename,array("Attachment" => false));
?>
