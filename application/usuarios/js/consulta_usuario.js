$(document).ready(function()
{
	
	$('#consultar').click(function(){
		
			$.post(base_url+"usuarios/obtener_consulta_usuario",function( data )
			{
				var resp = JSON.parse(data);
				
				if(resp.status=='ok'){
					
					var html="<tbody>";
					for(i=0;i<resp.datos.length;i++){
						html+='<tr>';
						html+='<td>'+resp.datos[i].id_usuario+'</td>';
						html+='<td>'+resp.datos[i].descripcion+'</td>';
						html+='<td>'+resp.datos[i].usuario+'</td>';
						html+='<td>'+resp.datos[i].estado_registro+'</td>';
						html+='</tr>';
					}
					html+='</tbody>';
					$('#consulta_usuarios tbody').remove();
					$('#consulta_usuarios').append(html);
					$('#consulta_usuarios').DataTable();
				}else{
					alert(resp.message);
				}
			});
		})
});