<?php
class conexion{
	private $servidor="localhost";
	private $usuario="root";
	private $contrasenia="";
	private $conexion;

	public function __construct(){
		try{
			$this->conexion=new PDO("mysql:host=$this->servidor;dbname=contenido",$this->usuario,$this->contrasenia);
			$this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		}catch(PDOException $e){
			return "Falla de conexion".$e;
		}
	}
	#este metodo lo puedo ejecutar para insertar/borrar/actualizar
	public function ejecutar($sql){
		$this->conexion->exec($sql);
		//regresa un id de insercion
		return $this->conexion->lastInsertId();
	}
	public function consultar($sql){
		$sentencia=$this->conexion->prepare($sql);
		$sentencia->execute();
		return $sentencia->fetchAll();
	}
}
?>
