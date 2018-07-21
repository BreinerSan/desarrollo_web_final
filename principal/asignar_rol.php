<?php
require_once "../librerias/configuracion.php";

require_once "../librerias/conexion.php";
require_once "../librerias/perfil.php";
require_once "../librerias/persona.php";
require_once "../librerias/persona_perfil.php";

require_once "../librerias/funciones.php";

$conexion=new conexion('S');
$perfil=new perfil($conexion);
$persona=new persona($conexion);
$persona_perfil = new persona_perfil($conexion);

$f=new funciones();


//Llave de seguridad
if($_SESSION['AUTENTICADO']!="OK"){header("location: ../index.php"); exit;}

if($_POST[$f->c('pers_id')]){
	$_SESSION["pers_id"] = $f->d($_POST[$f->c('pers_id')]);
    $pers_id = $f->d($_POST[$f->c('pers_id')]);
}else{
    $pers_id = $_SESSION["pers_id"];
}     


//$lista_perfil=$perfil->seleccionar($perf_id);
$lista_persona=$persona->seleccionar($pers_id);
$lista_perfiles = $persona_perfil->seleccionarPerfil($pers_id);

$listar_no_perfiles = $persona_perfil->perfilesNoSeleccionados($pers_id);



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
			    <div class="card-header bg-primary text-white">Menu ( Administrador )</div>
			    <div class="card-body">

			    	<ul class="nav flex-column">
						<li class="nav-item">
						<a class="btn btn-primary" href="menu.php">Volver atras</a>
						</li>
						
					</ul>
                  
				</div>
			</div>
        </div>
		
		<div class="col-sm-8">
		
		    <div class="card" id="">
			    <div class="card-header bg-primary text-white">Administrar perfiles de <?php echo $lista_persona[0]['pers_nombre']; ?></div>
			    <div class="card-body">

			    	<h3>Insertar Perfiles</h3>
			    	<label class="mr-sm-2" for="inlineFormCustomSelect">Perfiles</label>
			    	<form method="post" action="../librerias/change_persona_perfil.php">

			    		<input type="hidden" name="<?php echo $f->c("pepe_accion"); ?>" value="<?php echo $f->c("insertar"); ?>">
			    		<input type="hidden" name="pers_id" value="<?php echo $pers_id; ?>">
			    		<div class="form-row align-items-center">

						    <div class="col-md-8 my-1">
						      
						      <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="perf_id">
						        <option selected>Selecciona...</option>
						        <?php foreach ($listar_no_perfiles as $perfil){ ?>
						        	<option value="<?php echo $perfil['perf_id']; ?>"><?php echo $perfil['perf_nombre']; ?></option>
						        <?php } ?>
						    
						      </select>
						    </div>
						    <div class="col-md-4 my-1">
						      <input type="submit" class="btn btn-primary" value="Agregar">
						    </div>
						  </div>
			    	</form>
					
			    	
			    	<table class="table">
						<h3>Perfiles</h3>
			    		<thead>
			    			<tr>
			    				<th>Id</th>
			    				<th>Perfil</th>
			    				<th>Activo</th>
			    			</tr>
			    		</thead>
			    		<tbody>
			    			<?php $cont = 1; ?>
			    			<?php foreach ($lista_perfiles as $perfil){ ?>
			    				<tr>
			    					<td><?php echo $cont++; ?></td>
									<td><?php echo $perfil['perf_nombre']; ?></td>
									<td>
										<?php echo $perfil['pepe_activo'] ?>
										<form method="post" action="../librerias/change_persona_perfil.php">
											<input type="hidden" name="<?php echo $f->c("pepe_id"); ?>" value="<?php echo $f->c($perfil["pepe_id"]); ?>">
											<input type="hidden" name="<?php echo $f->c("pepe_activo"); ?>" value="<?php echo $f->c($perfil["pepe_activo"]); ?>">
											<input type="hidden" name="<?php echo $f->c("pepe_accion"); ?>" value="<?php echo $f->c("actualizar"); ?>">
	                        				<input type="submit" class="btn btn-primary" style=""  value="Cambiar">
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
