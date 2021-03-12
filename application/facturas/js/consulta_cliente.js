$(document).ready(function()
{
	
	$('#consultar').click(function(){
		
			$.post(base_url+"facturas/obtener_consulta_cliente",function( data )
			{
				var resp = JSON.parse(data);
				
				if(resp.status=='ok'){
					
					var html="<tbody>";
					for(i=0;i<resp.datos.length;i++){
						html+='<tr>';
						html+='<td>'+resp.datos[i].id_cliente+'</td>';
						html+='<td>'+resp.datos[i].descripcion_cliente+'</td>';
						html+='<td>'+resp.datos[i].direccion+'</td>';
						html+='<td>'+resp.datos[i].nit_cliente+'</td>';
						html+='<td>'+resp.datos[i].estado_registro+'</td>';
						html+='</tr>';
					}
					html+='</tbody>';
					$('#consulta_Cliente tbody').remove();
					$('#consulta_Cliente').append(html);
					$('#consulta_Cliente').DataTable();
				}else{
					alert(resp.message);
				}
			});
		})
});