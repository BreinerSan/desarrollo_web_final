<?php
class conexion
{
    private $conexion;
    private $resultado;
    
    function __construct($rol)
    {
        $this->conectarBaseDatos($rol);
    }
    
    private function conectarBaseDatos($rol)
    {
        
        switch($rol){
            case"S":
            $user="rol_select";
            $pass="rol_select_2018";
            break;
            
            case"I":
            $user="rol_insert";
            $pass="rol_insert_2018";
            break;
        
            case"U":
            $user="rol_update";
            $pass="rol_update_2018";
            break;
            
            case"D":
            $user="rol_delete";
            $pass="rol_delete_2018";
            break;
            
            case"A":
            $user="rol_all";
            $pass="rol_all_2018";
            break;
            
            default:
            
            echo "sin conexion a la base de datos";
            exit;
        }
        
        
        $user="rol_all";
        $pass="rol_all_2018";
        $host="localhost";
        $db="empresa";
        $puerto="5432";
        
        $this->conexion=pg_connect("host=$host dbname=$db user=$user password=$pass port=$puerto");
    }
	
	function consulta($consulta)
	{
	     $this->resultado=pg_query($this->conexion,$consulta);
	}
	
	function extraerRegistro()
	{
	    if($fila=pg_fetch_assoc($this->resultado))
		{
		    return $fila;
		}
		else
		{
		    return false;
		}
	}
}
?>