<?php
require_once "librerias/configuracion.php";
require_once "librerias/validaciones.php";


require_once "librerias/conexion.php";
require_once "librerias/acceso.php";

$v = new validaciones();


$conexion=new conexion('S'); //para decirle que solo haga la conexion con el rol select para que solo se puedan hacer select

$acceso=new acceso($conexion);

/*if(!in_array($_SERVER["HTTP_REFERER"],$_SESSION["SEGURIDAD_SERVIDOR"]))
{
     header('location: index.php');
	 $_SESSION['ERROR']="ERROR: Ruta No Encontrada";
	 exit;   
}*/

$usuario=$_POST['usuario'];
$clave=$_POST['clave'];

if($v->errorObligatorio($usuario)){
    header('location: index.php');
    $_SESSION['ERROR'] = "USUARIO OBLIGATORIO";
    exit;
}

if($v->errorCantidad(10, $usuario)){
    header('location: index.php');
    $_SESSION['ERROR'] = "USUARIO EXCEDE CARACTERES Maximos";
    exit;
}

if($v->errorSoloLetrasNumeros($usuario)){
    header('location: index.php');
    $_SESSION['ERROR'] = "Usuario mal escrito";
    exit;
}

$arreglo_acceso=$acceso->verificarLogin($usuario,$clave);

if(count($arreglo_acceso))
{
    $arreglo_real = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Z","a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","z","0","1","2","3","4","5","6","7","8","9","_","-","&","=","?","/","."); //69
    
    $arreglo_equivalente = array("AZ","BX","CW","DW","EV","FU","GT","HS","IR","JQ","KP","LO","MN","NM","OL","PK","QJ","RI","SH","TG","UF","VE","WD","XC","ZA","az","bx","cw","dw","ev","fu","gt","hs","ir","jq","kp","lo","mn","nm","ol","pk","qj","ri","sh","tg","uf","ve","wd","xc","za","aB","bC","cD","dE","eF","fG","gH","hI","iJ","jK","kL","lM","mN","nO","oP","pQ","qR"); //69
    
    shuffle($arreglo_real);
    shuffle($arreglo_equivalente);
    
    $_SESSION['arreglo_real']=$arreglo_real;
    $_SESSION['arreglo_equivalente']=$arreglo_equivalente;
    
    $_SESSION['AUTENTICADO']="OK";
    $_SESSION["pers_id"]=$arreglo_acceso["pers_id"];
    header('location: seleccionar_perfil.php'); 
    exit;
}
else
{
     header('location: index.php');
	 $_SESSION['USUARIO']=$usuario;
	 $_SESSION['ERROR']="ERROR: Datos Incorrectos";
	 exit;
}
?>