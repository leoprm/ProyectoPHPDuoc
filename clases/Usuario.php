<?php
require __DIR__.'/../libs/db/db.php';

class Usuario{
	private $semail;
	private $susuario;
	private $spass;
	private $nombre;
	private $fechaingreso;
	private $edita;
	private $conexion;

	function __construct($sema,$susr,$sclave,$nom,$fech,$edit){
		$this->semail=$sema;
		$this->susuario=$susr;		
		$this->spass=md5($sclave);	
		$this->snombre=$nom;	
		$this->fechaingreso=$fech;
		$this->edita=$edit;

		$this->conexion = new DB();
	}
	
    /*Verifica el acceso a la sesion*/
	function VerificaAcceso(){
		/*Definición del query que permitira verificar un nuevo registro*/
		$sqlsel="select nombreuser from usuario
		where emailuser=:usr and password=:pwd";
		
		/*Preparación SQL*/
		$this->conexion->prepare($sqlsel);
		
		/*Asignación de parametros utilizando bindparam*/
		$querysel->bindParam(':usr',$this->semail);
		$querysel->bindParam(':pwd',$this->spass);
		
		$datos=$querysel->execute();
		
		if ($querysel->rowcount()==1)return true; else return false;
		
	}
	
	/*Trae Nombre usuario cuando inicia sesion*/
	function VerificaUsuario(){
		/*Definición del query que permitira buscar un nuevo registro*/
		$sqlsel="select username from usuario
		where emailuser=:usr";
	
		/*Preparación SQL*/
		$this->conexion->prepare($sqlsel);
	
		/*Asignación de parametros utilizando bindparam*/
		$querysel->bindParam(':usr',$this->semail);
	
		$datos=$querysel->execute();
	
		if ($querysel->rowcount()==1)return true; else return false;
	
	}
	
}
?>