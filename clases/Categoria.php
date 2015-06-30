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
	private $nombre;
	private $descripcion;
	private $imagen;
	private $db;

	function __construct($nom=null,$sdes=null,$img=null){
		$this->nombre=$nom;
		$this->descripcion=$sdes;
		$this->imagen=$img;

		$this->db = new DB();
	}

	function AgregarCategoria(){
		/*Definición del query que permitira ingresar un nuevo registro*/
		$sqlins="insert into categoria(IDCATEGOR, NOMCATEGOR, DESCIPTCATEGO, IMAGECAT)
		values(null,:nom,:desc,:imag)";
		/*Verifica que la categoria no exista*/
		if ($this->VerificaCategoria()){
			echo "La categoria $this->nombre existe en la base de datos.";
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
		
		$query->bindParam(':nom',$this->nombre);
		$query->bindParam(':desc',$this->descripcion);
		$query->bindParam(':imag',$this->img);
		
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
		$sqlsel="select NOMCATEGOR from categoria
		where NOMCATEGOR=:cat";
	
		/*Preparación SQL*/
		$querysel=$db->prepare($sqlsel);
	
		/*Asignación de parametros utilizando bindparam*/
		$querysel->bindParam(':cat',$this->nombre);
	
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

	public function buscarPorID($idCategoria){
		$sql = "SELECT * FROM CATEGORIA where IDCATEGORI=:id";
		$query = $this->db->conexion->prepare($sql);

		$query->bindParam(':id',$idCategoria);
		$query->execute();

		return $query->fetch();
	}


		function actualizaCategoria($idcat){

			/*Definicion del query que permitira actualizar */
			$sqlupd="update CATEGORIA
			set NOMCATEGOR=:nom ,DESCRIPCATEGO=:desc,IMAGENCAT=:img
			where IDCATEGORI=:id";


			/*Preparación SQL*/
			try {
				$queryup=$this->db->conexion->prepare($sqlupd);
			}
			catch( PDOException $Exception ) {
				echo "Clase Categoria:ERROR:Preparacion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
				return false;
			}
			
			/*Asignacion de parametros utilizando bindparam*/
			$queryup->bindParam(':cate',$categoria);
			$queryup->bindParam(':nom',$this->nombre);
			$queryup->bindParam(':desc',$this->descripcion);
			$queryup->bindParam(':img',$this->imagen);

			try {
				$queryup->execute();
			}
			catch( PDOException $Exception ) {
				echo "Clase Categoria:ERROR:Ejecución Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
				die();
				return false;
			}
			return true;
		}
}
 ?>