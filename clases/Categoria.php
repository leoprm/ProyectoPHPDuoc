<?php
/*
|--------------------------------------------------------------------------
| Clase conexion a tabla 
|--------------------------------------------------------------------------
|
| Clase que linkea la tabla CATEGORIA de la base de datos
|
*/


require __DIR__.'/../libs/db/db.php';

class Categoria
{ 
	private $snombre;
	private $sdescripcion;
	private $simagen;
	private $db;

	function __construct($snom=null,$sdes=null,$simg=null){
		$this->snombre=$snom;
		$this->sdescripcion=$sdes;
		$this->simagen=$simg;

		$this->db = new DB();
	}

	function AgregarCategoria(){
		/*Definición del query que permitira ingresar un nuevo registro*/
		$sqlins="insert into categoria(nomcategor, descriptcatego, imagecat)
		values(:nom,:desc,:imag)";
		/*Verifica que la categoria no exista*/
		if ($this->VerificaCategoria()){
			echo "La categoria $this->snombre existe en la base de datos.";
			return false;
		}
		/*Preparación SQL*/
				try {
					$query = $this->db->conexion->prepare($sqlins);
				}
				catch( PDOException $Exception ) {
					echo "Clase Categoria:ERROR:Preparacion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
					return false;
				}
		
		/*Asignación de parametros utilizando bindparam*/
		
		$query->bindParam(':nom',$this->snombre);
		$query->bindParam(':desc',$this->sdescripcion);
		$query->bindParam(':imag',$this->simg);
		
		try {
			$query->execute();
		}
		catch( PDOException $Exception ) {
			echo "Clase Categoria:ERROR:Ejecución Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
			return false;
		}
		return true;
	}

	function VerificaCategoria(){
		/*Definición del query que permitira ingresar un nuevo registro*/
		$sqlsel="select nomcategor from categoria
		where nomcategor=:cat";
	
		/*Preparación SQL*/
		$querysel=$db->prepare($sqlsel);
	
		/*Asignación de parametros utilizando bindparam*/
		$querysel->bindParam(':cat',$this->snombre);
	
		$datos=$querysel->execute();
	
		if ($querysel->rowcount()==1)return true; else return false;
	
	}


	function ObtenerLista(){
		/*Definición del query que permitira obtener la lista de categorias*/
		$sqlsel="select * from CATEGORIA";
		
		/*Preparación SQL*/
		$querylis = $this->db->conexion->prepare($sqlsel);
		$querylis->execute();	

		return $querylis;

		//EJEMPLO DE FOREACH
		// $productos es lo mismo que $querylis
		//foreach ($productos->fetch() as $producto) {
		  //  $producto['nombre'];
		//}		
	}

	function eliminaCategoria($idcategoria){

		/*Definición del query que permitira eliminar un registro*/
		$sqldel="delete from categoria where idcategori=:id";

		/*Preparación SQL*/
		$querydel=$this->db->conexion->prepare($sqldel);

		$querydel->bindParam(':id',$idcategoria);

		$valaux=$querydel->execute();

		return $valaux;
	}
}
 ?>