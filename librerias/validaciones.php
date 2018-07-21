<?php 

class validaciones{
    
    function errorObligatorio($valor){
        
        if(strlen($valor) > 0){
        	return false;
        }else{
        	return true;
        }
        
    }

    function errorCantidad($cantidad, $valor){

    	if($cantidad && strlen($valor) > $cantidad){
    		return true;
    	}else{
    		return false;
    	}

    }

    function errorSoloLetrasNumeros($valor){

    	if(empty($valor)){
    		return false;
    	}else{
    		if(ctype_alnum($valor)){
    			return false;
    		}else{
    			return true;
    		}
    	}

    }

}

?>