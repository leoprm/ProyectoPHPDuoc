
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
			$this->db->conexion->prepare($sqlins);
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


	function porCategoria($categoria,$limit = null){
		/*Definición del query que permitira buscar un registrocon filtro*/
		$limitText = ( is_integer($limit) ) ? ' LIMIT '.$limit : '';
		$sql = "SELECT * FROM PRODUCTO WHERE idcategori=:cat".$limitText;;
		
		$query = $this->db->conexion->prepare($sql);
		$query->bindParam(':cat',$categoria);		
		
		$query->execute();		
		return $query;		
	}

	function TraerProducto($idprod){
		/*Definición del query que permitira traer un nuevo registro*/
		$sqlsel="select * from producto
		where idproducto=:prod";

		/*Preparación SQL*/
		$querysel=$this->db->conexion->prepare($sqlsel);

		/*Asignación de parametros utilizando bindparam*/
		$querysel->bindParam(':prod',$idprod);

		$querysel->execute();

		return $querysel;

	}

	function obtenerTodos($limit = null){
		$limitText = ( is_integer($limit) ) ? ' LIMIT '.$limit : '';
		$sql = "SELECT * FROM PRODUCTO ORDER BY RAND()".$limitText;

		$query = $this->db->conexion->prepare($sql);		
		$query->execute();
		
		return $query;
	}

	function eliminaProducto($idproducto){

		/*Definición del query que permitira eliminar un registro*/
		$sqldel="delete from producto where idproducto=:id";

		/*Preparación SQL*/
		$querydel=$this->db->conexion->prepare($sqldel);

		$querydel->bindParam(':id',$idproducto);

		$valaux=$querydel->execute();

		return $valaux;
	}

    function ActualizaDatos($idproducto){
		/*Definicion del query que permitira actualizar los datos*/
		$sqlupd="update producto set idcategori=:,idcolor,idusuario,nombreprod,descripprod,precio,dimancho,dimalto,imagenprod,cantidad pwdusuario=:pwd	where idacceso=:id";
		
		try {
			$this->db->conexion->prepare($sqlins);
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

		/*Preparaci�n SQL*/
		$querysel=$db->prepare($sqlupd);
	
		/*Asignaci�n de parametros utilizando bindparam*/
		$querysel->bindParam(':pwd',md5($snewpwd));
		$querysel->bindParam(':id',$this->nidacceso);
		

		$valaux=$querysel->execute();
	
		return $valaux;
	}
	
}
?>	