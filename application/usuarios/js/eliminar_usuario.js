$(document).ready(function()
{
$('#id_usuario').blur(function()
{
	if($('#id_usuario').val()!=''){
		var info = {
			id_usuario:$('#id_usuario').val()
		};
		
		$.post(base_url+"usuarios/obtener_datos_usuario",info,function( data )
		{
			var resp=JSON.parse(data);
			if(resp.status=='ok'){
			
			$('#descripcion').val(resp.datos[0].descripcion);
			$('#usuario').val(resp.datos[0].usuario);
			$('#clave').val(resp.datos[0].clave);
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
			id:$("#id_usuario").val()
			,oper:"del"
		};

		$.post(base_url+"usuarios/eliminar_datos_usuario",info,function( data )
		{
			var resp =JSON.parse(data);
			if(resp.status=='ok')
				{
				alert (resp.message);
				document.getElementById("frmUsuario").reset();			
				}else{
					alert(resp.message);
				}
		});

	})
});