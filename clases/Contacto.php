<?php
require __DIR__.'/../libs/db/db.php';

class Contacto{
	public $id;
	public $email;
	public $nombre;
	public $mensaje;
	public $asunto;
	public $fechaIngreso;
	public $db;

	function __construct($email=null,$nombre=null,$mensaje=null,$asunto=null){
		$this->email        = $email;
		$this->nombre       = $nombre;		
		$this->mensaje      = $mensaje;	
		$this->asunto       = $asunto;	
		$this->fechaIngreso = date('Y-m-d h:i:s');
		
		$this->db           = new DB();
	}
	
	public function guardar(){
		$sqlsel="INSERT INTO CONTACTO VALUES(null, :nombre, :email, :mensaje, :asunto, :fecha)";

		$query = $this->db->conexion->prepare($sqlsel);

		$query->bindParam(':nombre',$this->nombre);
		$query->bindParam(':email',$this->email);
		$query->bindParam(':mensaje',$this->mensaje);
		$query->bindParam(':asunto',$this->asunto);
		$query->bindParam(':fecha',$this->fechaIngreso);
		
		return $query->execute();
	}	

	function ObtenerLista(){
		/*Definición del query que permitira obtener la lista de categorias*/
		$sqlsel="select * from CONTACTO";
		
		/*Preparación SQL*/
		$querylis = $this->db->conexion->prepare($sqlsel);
		$querylis->execute();	

		return $querylis;
	}

	function eliminaContacto($idcontacto){

		/*Definición del query que permitira eliminar un registro*/
		$sqldel="delete from contacto where idcontacto=:id";

		/*Preparación SQL*/
		$querydel=$this->db->conexion->prepare($sqldel);

		$querydel->bindParam(':id',$idcontacto);

		$valaux=$querydel->execute();

		return $valaux;
	}
}
?>