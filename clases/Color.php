<?php
/*
|--------------------------------------------------------------------------
| Clase conexion a tabla 
|--------------------------------------------------------------------------
|
| Clase que linkea la tabla COLOR de la base de datos
|
*/


require __DIR__.'/../libs/db/db.php';

class Color
{ 
	private $idProducto;
	private $nombre;
	private $codHex;
	private $db;

	function __construct($idprod=null,$nom=null,$hex=null){
		$this->idProducto=$idprod;
		$this->nombre=$nom;
		$this->codHex=$hex;

		$this->db = new DB();
	}

	function AgregarColor(){
		/*Definición del query que permitira ingresar un nuevo registro*/
		$sqlins="insert into COLOR(IDCOLOR,IDPRODUCTO, NOMBRECOLOR, COD_HEX)
		values(null,:idprod,:nom,:hex)";
		/*Verifica que la Color no exista*/
		if ($this->VerificaColor()){
			echo "El Color $this->nombre ya existe en la base de datos.";
			return false;
		}
		/*Preparación SQL*/
				try {
					$query = $this->db->conexion->prepare($sqlins);
				}
				catch( PDOException $Exception ) {
					echo "Clase Color:ERROR:Preparacion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
					return false;
				}
		
		/*Asignación de parametros utilizando bindparam*/
		
		$query->bindParam(':idprod',$this->idProducto);
		$query->bindParam(':nom',$this->nombre);
		$query->bindParam(':hex',$this->hex);
		
		try {
			$query->execute();
		}
		catch( PDOException $Exception ) {
			echo "Clase Color:ERROR:Ejecución Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
			return false;
		}
		return true;
	}

	function VerificaColor(){
		/*Definición del query que permitira ingresar un nuevo registro*/
		$sqlsel="select NOMBRECOLOR from COLOR
		where NOMBRECOLOR=:col";
	
		/*Preparación SQL*/
		$querysel=$db->prepare($sqlsel);
	
		/*Asignación de parametros utilizando bindparam*/
		$querysel->bindParam(':col',$this->nombre);
	
		$datos=$querysel->execute();
	
		if ($querysel->rowcount()==1)return true; else return false;
	
	}


	function ObtenerLista(){
		/*Definición del query que permitira obtener la lista de Colores*/
		$sqlsel="select * from COLOR";
		
		/*Preparación SQL*/
		$querylis = $this->db->conexion->prepare($sqlsel);
		$querylis->execute();	

		return $querylis;
	}

	function eliminaColor($idColor){

		/*Definición del query que permitira eliminar un registro*/
		$sqldel="delete from COLOR where IDCOLOR=:id";

		/*Preparación SQL*/
		$querydel=$this->db->conexion->prepare($sqldel);

		$querydel->bindParam(':id',$idColor);

		$valaux=$querydel->execute();

		return $valaux;
	}

	public function buscarPorID($idColor){
		$sql = "SELECT * FROM Color where IDCOLOR=:id";
		$query = $this->db->conexion->prepare($sql);

		$query->bindParam(':id',$idColor);
		$query->execute();

		return $query->fetch();
	}
}
 ?>