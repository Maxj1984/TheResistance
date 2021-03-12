$(document).ready(function()
{
	$('#aceptar').click(function(){
 		var info = {
			descripcion:$("#descripcion").val()
			,estado_registro:$("#estado_registro").val()
			,id:"_empty"
			,oper:"add"
		};

		$.post(base_url+"catalogos/departamento/edit_departamento",info,function( data )
		{
			//alert('Grabado con exito');
			//document.getElementById("frmUsuario").reset();
			var resp =JSON.parse(data);
			if(resp.status=='ok')
				{
				alert (resp.message);
				document.getElementById("frmDepartamento").reset();			
				}else{
					alert(resp.message);
				}
		});

	})
});