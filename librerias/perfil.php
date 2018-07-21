<?php
class perfil
{
    private $conexion;
	
	function __construct($conexion)
	{
	    $this->conexion=$conexion;
	}
	
    
    function seleccionar($perf_id){
        
        $lista_perfil=array();
        
        $sql="SELECT * FROM principal.perfil WHERE perf_id='$perf_id'";
    
        $this->conexion->consulta($sql);
        
        while($fila=$this->conexion->extraerRegistro()){
            
             $lista_perfil[]=$fila;
        
        }
        return $lista_perfil;
    }
}
?>