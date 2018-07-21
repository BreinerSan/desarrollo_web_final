<?php 
require_once "../librerias/configuracion.php";

require_once "../librerias/conexion.php";
require_once "../librerias/perfil.php";
require_once "../librerias/persona.php";
require_once "../librerias/persona_perfil.php";

require_once "../librerias/funciones.php";

$f=new funciones();

if( $f->d($_POST[$f->c('pepe_accion')]) == 'actualizar'){
	$conexion=new conexion('U');	
}else{
	$conexion=new conexion('I');	
}

$perfil=new perfil($conexion);
$persona=new persona($conexion);
$persona_perfil = new persona_perfil($conexion);




//Llave de seguridad
if($_SESSION['AUTENTICADO']!="OK"){header("location: ../index.php"); exit;}

if($_POST[$f->c('pepe_id')]){
   	$pepe_id = $f->d($_POST[$f->c('pepe_id')]);
   	$pepe_activo = $f->d($_POST[$f->c('pepe_activo')]);
} 

if($_POST['pers_id']){
	$pers_id = $_POST['pers_id'];
	$perf_id = $_POST['perf_id'];
}

if( $f->d($_POST[$f->c('pepe_accion')]) == 'actualizar'){
	echo $pepe_id.' '.$pepe_activo;
	$persona_perfil->cambiarEstado($pepe_id, $pepe_activo);
	header("location: ../principal/asignar_rol.php"); 
	exit;

}else if($f->d($_POST[$f->c('pepe_accion')]) == 'insertar'){
	
	$persona_perfil->insertar($pers_id, $perf_id);
	header("location: ../principal/asignar_rol.php"); 
	exit;

}


?>