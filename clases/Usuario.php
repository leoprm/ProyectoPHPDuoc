<?php
require __DIR__.'/../libs/db/db.php';

class Usuario{
	public $id;
	public $email;
	public $usuario;
	public $password;
	public $nombre;
	public $fechaIngreso;
	public $edita;
	public $db;

	function __construct($sema,$susr,$sclave,$nom,$fech,$edit){
		$this->email        = $sema;
		$this->usuario      = $susr;		
		$this->password     = md5($sclave);	
		$this->nombre       = $nom;	
		$this->fechaIngreso = $fech;
		$this->edita        = $edit;
		
		$this->db           = new DB();
	}
	
	public function login(){
		$sqlsel="select nombreuser,idusuario,username,fechaingreso,edita from USUARIO
		where emailuser=:usr and password=:pwd";

		$query = $this->db->conexion->prepare($sqlsel);

		$query->bindParam(':usr',$this->email);
		$query->bindParam(':pwd',$this->password);
		
		$query->execute();
		
		if($query->rowcount() == 1){
			//Si existe el usuario reasignamos los valores traidos de la DB
			$usuario            = $query->fetch();
			$this->id           = $usuario['idusuario'];
			$this->usuario      = $usuario['username'];
			$this->nombre       = $usuario['nombreuser'];	
			$this->fechaIngreso = $usuario['fechaingreso'];
			$this->edita        = $usuario['edita'];
			return true;
		}

		return false;
	}
	
	/*Trae Nombre usuario cuando inicia sesion*/
	function VerificaUsuario(){
		/*Definición del query que permitira buscar un nuevo registro*/
		$sqlsel="select username from usuario
		where emailuser=:usr";
	
		/*Preparación SQL*/
		$this->db->conexion->prepare($sqlsel);
	
		/*Asignación de parametros utilizando bindparam*/
		$querysel->bindParam(':usr',$this->email);
	
		$datos=$querysel->execute();
	
		if ($querysel->rowcount()==1)return true; else return false;
	
	}
	
}
?>