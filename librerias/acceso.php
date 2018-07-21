<?php
class acceso
{
    private $conexion;
	
	function __construct($conexion)
	{
	    $this->conexion=$conexion;
	}
	
	function verificarLogin($usuario,$clave)
	{
	    $arreglo_acceso=array();
		
		$sql="SELECT * from principal.acceso WHERE acce_usuario='$usuario'";
		
		$this->conexion->consulta($sql);
		
		if($fila=$this->conexion->extraerRegistro())
		{
            
            //hacer esto para que no se permitan hacer inyecciones SQL
		    if(password_verify($clave,$fila["acce_clave"]))
			{
			    $arreglo_acceso=$fila;
			}
		}
		
		return $arreglo_acceso;
	}
}
?>