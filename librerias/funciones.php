<?php 

class funciones{

    function c($valor_real){
        
        if($valor_real == '0' || $valor_real){
            return $this->cifrarPalabra($valor_real);
        }else{
            return ''; 
        }
        
    }
    
    function cifrarPalabra($valor_real){
        
        $valor_equivalente = '';
        $arreglo_caracteres = str_split($valor_real);
        
        foreach($arreglo_caracteres as $caracter){
            $indice_del_array_real = array_search($caracter, $_SESSION['arreglo_real']);
            $caracter_equivalente = $_SESSION['arreglo_equivalente'][$indice_del_array_real];
            $valor_equivalente.= $caracter_equivalente;
        }
        
        return $valor_equivalente;
            
    }
    
    function d($valor_equivalente){ 
        
        if($valor_equivalente == '0' || $valor_equivalente){
            return $this->decifrarPalabra($valor_equivalente);
        }else{
            return ''; 
        }
        
    }
    
    function decifrarPalabra($valor_equivalente){
        
        $valor_real='';
        $arreglo_caracteres = str_split($valor_equivalente, 2);
        
        foreach($arreglo_caracteres as $caracter){
            $indice_del_array_equivalente = array_search($caracter, $_SESSION['arreglo_equivalente']);
            $caracter_real = $_SESSION['arreglo_real'][$indice_del_array_equivalente];
            $valor_real.= $caracter_real;
        }
        
        return $valor_real;
        
    }

}
?>