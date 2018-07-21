// JavaScript Document
function enviarFormulario()
{
	var usuario=$('#usuario').val();
	var clave=$('#clave').val();
	
	if(errorObligatorio(usuario))
	{
		error('ERROR USUARIO');
		$('#usuario').focus();
	}
	else if(errorObligatorio(clave))
	{
		error('ERROR CLAVE');
		$('#clave').focus();
	}
	else
	{
		$('#formulario').submit();
	}
}

function error(mensaje)
{
	$('#alerta').html('<span class="fas fa-exclamation-triangle"></span> '+mensaje);
	
	$('#alerta').removeClass('alert-success');
	$('#alerta').addClass('alert-danger');
	
	$('#alerta').animate({'top':'1px'},800,function()
	{
		$('#alerta').animate({'top':'1px'},2000,function()
		{
			$('#alerta').animate({'top':'-100px'},800);
		});
	});
}