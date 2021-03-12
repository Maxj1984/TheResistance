$(document).ready(function()
{
	$('#aceptar').click(function(){
 		var info = {
			descripcion:$("#descripcion").val()
			,usuario:$("#usuario").val()
			,clave:$("#clave").val()
			,id:"_empty"
			,oper:"add"
		};

		$.post(base_url+"usuarios/ingresar_usuario",info,function( data )
		{
			//alert('Grabado con exito');
			//document.getElementById("frmUsuario").reset();
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