
<?php
require __DIR__.'/../libs/db/db.php';

class Usuario{
	private $nombreprod;
	private $sdescripcion;
	private $sprecio;
	private $sdimanc;
	private $sdimal;
	private $imagen;
	private $cantidad;

	function __construct($nom,$descr,$sprec,$diman,$dimal,$dimg,$cant){
		$this->nombreprod=$nom;
		$this->sdescripcion=$descr;	
		$this->sprecio=$sprec;	
		$this->sdimanc=$diman;
		$this->sdimal=$dimal;	
		$this->imagen=$dimg;
		$this->cantidad=$cant;

		$this->conexion = new DB();
	}

	function AgregarProducto($categoria,$color,$usuario){
		/*Definición del query que permitira ingresar un nuevo registro*/
		$sqlins="insert into producto(idcategori,idcolor,idusuario,nombreprod,descripprod,precio,dimancho,dimalto,imagenprod,cantidad)
		values(:cate,:colr,:usr,:nomprod,:desc,:prec,:danc,:dalt,:img,:cant)";
		/*Verifica que el producto no exista*/
		if ($this->VerificaProducto()){
			echo "El produto $this->nombreprod existe en la base de datos.";
			return false;
		}
		/*Preparación SQL*/
				try {
					$this->conexion->prepare($sqlins);
				}
				catch( PDOException $Exception ) {
					echo "Clase Usuario:ERROR:Preparaci�n Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
					return false;
				}
		
		/*Asignación de parametros utilizando bindparam*/
		$queryins->bindParam(':cate',$categoria);
		$queryins->bindParam(':colr',$color);
		$queryins->bindParam(':usr',$usuario);
		$queryins->bindParam(':nomprod',$this->nombreprod);
		$queryins->bindParam(':desc',$this->sdescripcion);
		$queryins->bindParam(':prec',$this->sprecio);
		$queryins->bindParam(':danc',$this->sdimanc);
		$queryins->bindParam(':dalt',$this->sdimat);
		$queryins->bindParam(':img',$this->dimal);
		$queryins->bindParam(':cant',$this->sclave);
		
		try {
			$queryins->execute();
		}
		catch( PDOException $Exception ) {
			echo "Clase Usuario:ERROR:Ejecución Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
			return false;
		}
		return true;
	}


	function ObtenerPorCategoria($categoria){
		/*Definición del query que permitira buscar un registrocon filtro*/
		$sqlsel="select * from producto
		where idcategori=:cat ";
		
		/*Preparación SQL*/
		$this->conexion->prepare($sqlsel);
		
		/*Asignación de parametros utilizando bindparam*/
		$querysel->bindParam(':cat',$categoria);
		
		
		$datos=$querysel->execute();
		
		if ($querysel->rowcount()==1)return $querysel; else return false;
		
	}

	function VerificaProducto(){
		/*Definición del query que permitira ingresar un nuevo registro*/
		$sqlsel="select nombreprod from producto
		where nombreprod=:prod";
	
		/*Preparación SQL*/
		$querysel=$db->prepare($sqlsel);
	
		/*Asignación de parametros utilizando bindparam*/
		$querysel->bindParam(':prod',$this->nombreprod);
	
		$datos=$querysel->execute();
	
		if ($querysel->rowcount()==1)return true; else return false;
	
	}
}
?>	