<?php
class persona_perfil
{
    private $conexion;
	
	function __construct($conexion)
	{
	    $this->conexion=$conexion;
	}
	
    
    function seleccionar($pers_id){
        $lista_persona_perfil=array();
 
        
        $sql="SELECT * FROM principal.persona_perfil pp, principal.perfil pe WHERE pp.pers_id='$pers_id' 
        AND pp.pepe_activo='SI'
        AND pp.perf_id=pe.perf_id";
    
        
         $this->conexion->consulta($sql);
        while($fila=$this->conexion->extraerRegistro()){
             $lista_persona_perfil[]=$fila;
        
        }
        return $lista_persona_perfil;
    }

    function seleccionarPerfil($pers_id){
        $lista_persona_perfil=array();
 
        
        $sql="SELECT * FROM principal.persona_perfil pp, principal.perfil pe WHERE pp.pers_id='$pers_id' 
        AND pp.perf_id=pe.perf_id";
    
        
         $this->conexion->consulta($sql);
        while($fila=$this->conexion->extraerRegistro()){
             $lista_persona_perfil[]=$fila;
        
        }
        return $lista_persona_perfil;
    }

    function cambiarEstado($pepe_id, $pepe_activo){
        $estado = 'SI';
        if($pepe_activo == 'SI'){
            $estado = 'NO';
        }

        $sql = "UPDATE principal.persona_perfil SET pepe_activo = '$estado' WHERE pepe_id = '$pepe_id'";
        $this->conexion->consulta($sql);
    }

    function insertar($pers_id, $perf_id){
        
        $sql = "INSERT INTO principal.persona_perfil (perf_id ,pers_id, pepe_activo) VALUES ('$perf_id', '$pers_id', 'SI') ";
        $this->conexion->consulta($sql);
    }

    function perfilesNoSeleccionados($pers_id){
        $lista_persona_perfil=array();
 
        $sql = "SELECT * FROM principal.perfil WHERE perf_id NOT IN ( SELECT perf_id FROM principal.persona_perfil WHERE pers_id = '$pers_id' ) ";
    
        
         $this->conexion->consulta($sql);
        while($fila=$this->conexion->extraerRegistro()){
             $lista_persona_perfil[]=$fila;
        
        }
        return $lista_persona_perfil;
    }

     function perfilesSeleccionados($pers_id){
        $lista_persona_perfil=array();
 
        $sql = "SELECT pe.* FROM principal.persona_perfil pp, principal.perfil pe WHERE pp.pers_id='$pers_id' 
        AND pp.perf_id=pe.perf_id";
    
        
         $this->conexion->consulta($sql);
        while($fila=$this->conexion->extraerRegistro()){
             $lista_persona_perfil[]=$fila;
        
        }
        return $lista_persona_perfil;
    }

}
?>