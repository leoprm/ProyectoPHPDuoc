
<?php
require __DIR__.'/../libs/db/db.php';

class Producto{
	private $nombreprod;
	private $sdescripcion;
	private $sprecio;
	private $sdimanc;
	private $sdimal;
	private $imagen;
	private $cantidad;
	private $db;

	function __construct($nom = '',$descr = '',$sprec = 0,$diman = 0,$dimal = 0,$dimg = '',$cant = 0){
		$this->nombreprod=$nom;
		$this->sdescripcion=$descr;	
		$this->sprecio=$sprec;	
		$this->sdimanc=$diman;
		$this->sdimal=$dimal;	
		$this->imagen=$dimg;
		$this->cantidad=$cant;

		$this->db = new DB();
	}

	function AgregarProducto(){
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
					echo "Clase Producto:ERROR:Preparacion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
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
			echo "Clase Producto:ERROR:Ejecución Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
			return false;
		}
		return true;
	}


	public function porCategoria($categoria,$limit = null){
		/*Definición del query que permitira buscar un registrocon filtro*/
		$limitText = ( is_integer($limit) ) ? ' LIMIT '.$limit : '';
		$sql = "SELECT * FROM PRODUCTO WHERE idcategori=:cat".$limitText;;
		
		$query = $this->db->conexion->prepare($sql);
		$query->bindParam(':cat',$categoria);		
		
		$query->execute();		
		return $query;		
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

	public function obtenerTodos($limit = null){
		$limitText = ( is_integer($limit) ) ? ' LIMIT '.$limit : '';
		$sql = "SELECT * FROM PRODUCTO ORDER BY RAND()".$limitText;

		$query = $this->db->conexion->prepare($sql);		
		$query->execute();
		
		return $query;
	}
}
?>	