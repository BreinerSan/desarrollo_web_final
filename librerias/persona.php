<?php
class persona
{
    private $conexion;
	
	function __construct($conexion)
	{
	    $this->conexion=$conexion;
	}
	
    
    function seleccionar($pers_id){
        
        $lista_perfil=array();
        
        $sql="SELECT * FROM principal.persona WHERE pers_id='$pers_id'";
    
        $this->conexion->consulta($sql);
        
        while($fila=$this->conexion->extraerRegistro()){
            
             $lista_persona[]=$fila;
        
        }
        return $lista_persona;
    }

    function all(){
        $lista_persona=array();
        
        $sql="SELECT * FROM principal.persona";
    
        $this->conexion->consulta($sql);
        
        while($fila=$this->conexion->extraerRegistro()){
            
             $lista_persona[]=$fila;
        
        }
        return $lista_persona;
    }
}
?>