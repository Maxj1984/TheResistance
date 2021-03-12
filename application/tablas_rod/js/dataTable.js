$(document).ready(function()
{
	
	$('#consultar').click(function(){
		
			$.post(base_url+"tablas_rod/obtener_consulta_solicitud",function( data )
			{
				var resp = JSON.parse(data);
				
				if(resp.status=='ok'){
					
					var html="<tbody>";
					for(i=0;i<resp.datos.length;i++){
						html+='<tr>';
						html+='<td>'+resp.datos[i].id_solicitud+'</td>';
						html+='<td>'+resp.datos[i].descripcion+'</td>';
						html+='<td>'+resp.datos[i].telefono+'</td>';
						html+='<td>'+resp.datos[i].direccion+'</td>';
						html+='<td>'+resp.datos[i].correo+'</td>';
						html+='<td>'+resp.datos[i].id_empleo+'</td>';
						html+='<td>'+resp.datos[i].fotografia+'</td>'; 
						html+='<td>'+resp.datos[i].curriculum+'</td>';
						html+='<td>'+resp.datos[i].estado_registro+'</td>';
						html+='</tr>';
					}
					html+='</tbody>';
					$('#consulta_solicitud tbody').remove();
					$('#consulta_solicitud').append(html);
					$('#consulta_solicitud').DataTable();
				}else{
					alert(resp.message);
				}
			});
		})
});