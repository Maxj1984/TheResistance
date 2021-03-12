$(document).ready(function()
{
	
	$('#consultar').click(function(){
		
			$.post(base_url+"Productos/obtener_consulta_solicitud",function( data )
			{
				var resp = JSON.parse(data);
				
				if(resp.status=='ok'){
					
					var html="<tbody>";
					for(i=0;i<resp.datos.length;i++){
						html+='<tr>';
						html+='<td>'+resp.datos[i].id_producto+'</td>';
						html+='<td>'+resp.datos[i].fecha+'</td>';
						html+='<td>'+resp.datos[i].descrip_prod+'</td>';
						html+='<td>'+resp.datos[i].id_tipo_producto+'</td>';
						html+='<td>'+resp.datos[i].tipo+'</td>';
						html+='<td>'+resp.datos[i].clasificacion+'</td>';
						html+='<td>'+resp.datos[i].destacado+'</td>';
						html+='<td><img class:"foto" alt="" width="50 px" src="'+ruta_img+resp.datos[i].foto+'"></td>'; 
						html+='<td>'+resp.datos[i].precio+'</td>';
						html+='<td>'+resp.datos[i].iva+'</td>';
						html+='<td>'+resp.datos[i].estado+'</td>';
						html+='</tr>';
					}
					html+='</tbody>';
					$('#consulta_producto tbody').remove();
					$('#consulta_producto').append(html);
					$('#consulta_producto').DataTable();
				}else{
					alert(resp.message);
				}
			});
		})
});