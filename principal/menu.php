<?php
require_once "../librerias/configuracion.php";

require_once "../librerias/conexion.php";
require_once "../librerias/perfil.php";
require_once "../librerias/persona.php";

require_once "../librerias/funciones.php";

$conexion=new conexion('S');
$perfil=new perfil($conexion);
$persona=new persona($conexion);

$f=new funciones();


//Llave de seguridad
if($_SESSION['AUTENTICADO']!="OK"){header("location: ../index.php"); exit;}

if($_POST[$f->c('perf_id')]){
	$_SESSION['perf_id'] = $f->d($_POST[$f->c('perf_id')]);
    $perf_id = $f->d($_POST[$f->c('perf_id')]);
}else{
    $perf_id = $_SESSION["perf_id"];
}    


$lista_perfil=$perfil->seleccionar($perf_id);
$lista_persona=$persona->seleccionar($_SESSION['pers_id']);

$lista_all_personas = $persona->all();

?>





<!doctype html>
<html lang="es">
<head>
<title>HospitalSoft</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/fontawesome-all.min.css">
<link rel="stylesheet" href="../css/estilos.css">

<style>
body
{
    background-image:url(../img/fondo.jpg);
	background-size:100% 100%;
	background-attachment:fixed;
}

</style>
</head>
<body>
<div class="container-fluid">

    <div class="alert alert-danger" id="alerta"></div>

    <div class="row">
	
	    <div class="col-sm-4">
            <div class="card" id="">
			    <div class="card-header bg-primary text-white">Menu ( <?php echo $lista_perfil[0]['perf_nombre']; ?> )</div>
			    <div class="card-body">

			    	<ul class="nav flex-column">
						<li class="nav-item">
						<a class="btn btn-primary" href="../seleccionar_perfil.php">Volver atras</a>
						</li>
						
					</ul>
          
				</div>
			</div>
        </div>
		
		<div class="col-sm-8">
		
		    <div class="card" id="">
			    <div class="card-header bg-primary text-white">Bienvenido ( <?php echo $lista_persona[0]['pers_nombre']." ".$lista_persona[0]['pers_apellido']; ?> )</div>
			    <div class="card-body">
			    	<h1 class="text-primary">Administrar perfiles a usuarios</h1>
                    <table class="table">
                    	<thead>
                    		<tr>
                    			<th>Nombre</th>
                    			<th>Acciones</th>
                    		</tr>
                    	</thead>
                    	
                    	<tbody>
                    		<?php foreach ($lista_all_personas as $person){ ?>
                    		<tr>
                    			<td><?php echo $person["pers_nombre"]; ?></td>
								<td>
									<form class="" method="post" action="asignar_rol.php" >
	                        			<input type="hidden" name="<?php echo $f->c("pers_id"); ?>" value="<?php echo $f->c($person["pers_id"]); ?>">
	                        			<input type="submit" class="btn btn-primary" style=""  value="Ver">
	                   				</form>

								</td>
                    		</tr>
                    		<?php } ?>
                    	</tbody>
                    </table>
				</div>
			</div>
		
		</div>
		
		
		
	</div>


</div>
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/validar.js"></script>
<script src="../js/funciones.js"></script>


</body>
</html>
