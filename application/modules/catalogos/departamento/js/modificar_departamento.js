$(document).ready(function()
{
$('#id_departamento').blur(function()
{
	if($('#id_departamento').val()!=''){
		var info = {
			id_departamento:$('#id_departamento').val()
		};
		
		$.post(base_url+"catalogos/departamento/obtener_datos_departamento",info,function( data )
		{
			var resp=JSON.parse(data);
			if(resp.status=='ok'){
			
			$('#descripcion').val(resp.datos[0].descripcion);
			$('#estado_registro').val(resp.datos[0].estado_registro);
			}else{
				alert(datos.message);
			}
						
			
		});
		
	}else{
		alert('Debe ingresar datos para continuar...');
	}	
});


	$('#aceptar').click(function(){
 		var info = {
			descripcion:$("#descripcion").val()
			,estado_registro:$("#estado_registro").val()
			,id:$("#id_departamento").val()
			,oper:"edit"
		};

		$.post(base_url+"catalogos/departamento/edit_departamento",info,function( data )
		{
			var resp =JSON.parse(data);
			if(resp.status=='ok')
				{
				alert (resp.mensaje);
				document.getElementById("frmUsuario").reset();			
				}else{
					alert(resp.mensaje);
				}
		});

	})
});