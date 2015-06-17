<?php
require __DIR__.'/../../config/env.php';
class DB{
	
	private $conexion;

	function __construct(){
		$this->conexion = $this->conectar();
	}

	private function connect(){
		$db=new PDO(MYSQL_SERVER.";".MYSQL_DB,MYSQL_USER,MYSQL_PASS);
		$db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $db;
	}

	public function select(){
		
	}
}
?>