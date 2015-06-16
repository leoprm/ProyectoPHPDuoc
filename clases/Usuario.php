<?php
include 'constantes.php';
include (PATHAPP.'/dbconnect/db_funciones.php');

class Usuario{
	private $semail;
	private $susuario;
	private $spass;
	private $nombre;
	private $fechaingreso;
	private $edita;

	function __construct($sema,$susr,$sclave,$nom,$fech,$edit){
		$this->semail=$sema;
		$this->susuario=$susr;		
		$this->spass=md5($sclave);	
		$this->snombre=$snom;	
		$this->fechaingreso=$fech;
		$this->edita=$edit;	
	}
	
    /*Verifica el acceso a la sesion*/
	function VerificaAcceso(){
		$db=dbconnect();
		/*Definición del query que permitira ingresar un nuevo registro*/
		$sqlsel="select nombreuser from usuario
		where username=:usr and password=:pwd";
		
		/*Preparación SQL*/
		$querysel=$db->prepare($sqlsel);
		
		/*Asignación de parametros utilizando bindparam*/
		$querysel->bindParam(':usr',$this->susuario);
		$querysel->bindParam(':pwd',$this->spass);
		
		$datos=$querysel->execute();
		
		if ($querysel->rowcount()==1)return true; else return false;
		
	}
	
	/*Trae Nombre usuario cuando inicia sesion*/
	function VerificaUsuario(){
		$db=dbconnect();
		/*Definición del query que permitira ingresar un nuevo registro*/
		$sqlsel="select nombreuser from usuario
		where username=:usr";
	
		/*Preparación SQL*/
		$querysel=$db->prepare($sqlsel);
	
		/*Asignación de parametros utilizando bindparam*/
		$querysel->bindParam(':usr',$this->susuario);
	
		$datos=$querysel->execute();
	
		if ($querysel->rowcount()==1)return true; else return false;
	
	}
	
}
?>