<?php
require __DIR__.'/../libs/db/db.php';

class Categoria
{ 
	private $snombre;
	private $sdescripcion;
	private $simagen;
	private $conexion;

	function __construct($snom,$sdes,$simg){
		$this->snombre=$snom;
		$this->sdescripcion=$des;
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
					$this->db->conexion->prepare($sqlins);
				}
				catch( PDOException $Exception ) {
					echo "Clase Categoria:ERROR:Preparacion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
					return false;
				}
		
		/*Asignación de parametros utilizando bindparam*/
		
		$queryins->bindParam(':nom',$this->snombre);
		$queryins->bindParam(':desc',$this->sdescripcion);
		$queryins->bindParam(':imag',$this->simg);
		
		try {
			$queryins->execute();
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
}
 ?>