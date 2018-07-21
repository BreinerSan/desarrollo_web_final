<?php
require_once "librerias/configuracion.php";

$usuario=$_SESSION['USUARIO'];
$error=$_SESSION['ERROR'];

unset($_SESSION['USUARIO']);
unset($_SESSION['ERROR']);
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
			    <div class="card-header bg-info text-white">Inicio de Sesi&oacute;n</div>
			    <div class="card-body">
				    <form id="formulario" method="post" autocomplete="off" action="validar_sesion.php">
					
                    <div class="form-group">
                        <div class="input-group">
                            
							<input type="text" id="usuario" name="usuario" value="<?php echo $usuario;?>" autofocus class="form-control" placeholder="Usuario" maxlength="100">
							<div class="input-group-append">
							    <span class="input-group-text">
							    	<span class="fas fa-user"></span>
								</span>
							</div>
                             
                        </div>
                    </div>    
					
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend" onClick="verClave()">
							    <span class="input-group-text">
									<span id="icono" class="fas fa-lock"></span>
								</span>
							</div>
					        <input type="password" id="clave" name="clave" class="form-control" placeholder="Clave" maxlength="20">
                        </div>
                    </div>   
                        
					
					<button type="button" class="btn btn-warning float-right" onClick="enviarFormulario()">Entrar</button>
					</form>
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

<script>
var cambio=true;

function verClave()
{
    if(cambio)
    {
        $('#icono').removeClass('fa-lock');
        $('#icono').addClass('fa-lock-open');
        
        $('#clave').attr('type','text');
    }
    else
    {
        $('#icono').removeClass('fa-lock-open');
        $('#icono').addClass('fa-lock');
        
        $('#clave').attr('type','password');
    }
    
    cambio=!cambio;
}
<?php
if(isset($error))
{
	?>
	error('<?php echo $error;?>');
	<?php
}
?>
</script>
</body>
</html>




