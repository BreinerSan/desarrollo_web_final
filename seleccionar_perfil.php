<?php
require_once "librerias/configuracion.php";

if($_SESSION['AUTENTICADO']!="OK"){
         header('location: index.php');
         exit;

}

require_once "librerias/conexion.php";
require_once "librerias/persona_perfil.php";

require_once "librerias/funciones.php";


$conexion=new conexion('S');
$persona_perfil=new persona_perfil($conexion);
$f = new funciones();

$pers_id=$_SESSION['pers_id'];
$lista_persona_perfil=$persona_perfil->seleccionar($pers_id);

    if(count($lista_persona_perfil)==0){
            header("location: index.php");
            $_SESSION["ERROR"]="Usted no tiene asignado un perfil";
            exit;
    }else if(count($lista_persona_perfil)==1){
            header("location: principal/menu.php");
            $_SESSION["perf_id"]=$lista_persona_perfil[0]["perf_id"];
            exit;
    
    
    }




?>

<!doctype html>
<html lang="es">
<head>
<title>HospitalSoft</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/fontawesome-all.min.css">
<link rel="stylesheet" href="css/estilos.css">

<style>
body
{
    background-image:url(img/fondo.jpg);
	background-size:100% 100%;
	background-attachment:fixed;
}
#sesion
{
    margin-top:-250px;
	opacity:0;
    
    animation-name:sesion_animacion;
	animation-delay:1s;
	animation-duration:0.8s;
	animation-timing-function:linear;
	animation-fill-mode:forwards;
}
@keyframes sesion_animacion
{
     100%
	 {
	      margin-top:50px;
		  opacity:0.9;
	 }
}
</style>
</head>
<body>
<div class="container-fluid">

    <div class="alert alert-danger" id="alerta"></div>

    <div class="row">
	
	    <div class="col-sm-2"></div>
		
		<div class="col-sm-8">
		
		    <div class="card" id="sesion">
			    <div class="card-header bg-info text-white">Seleccionar perfil</div>
			    <div class="card-body">
                    
		              <?php
                    $i=1;
                    foreach($lista_persona_perfil as $arreglo_persona_perfil){
                            $perf_id=$arreglo_persona_perfil["perf_id"];
                            $perf_nombre=$arreglo_persona_perfil["perf_nombre"];
                        
                       ?>
                    
                    <form id="formulario<?php echo $i;?>" class="form-control" method="post" action="principal/menu.php" >
                        <input type="hidden" name="<?php echo $f->c("perf_id"); ?>" value="<?php echo $f->c($perf_id); ?>">
                        <input type="submit" class="btn btn-primary" style="width:90%; margin-left:5%"  value="<?php echo $perf_nombre;?>">
                    
                    
                    </form>
                <br>
                    
                    <?php
                        $i++;
                    }
                    ?>
                    
				</div>
			</div>
		
		</div>
		
		<div class="col-sm-2"></div>
		
	</div>


</div>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/validar.js"></script>
<script src="js/funciones.js"></script>


</body>
</html>

