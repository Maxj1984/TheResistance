$(document).ready(function()
{
	
	$('#consultar').click(function(){
		
			$.post(base_url+"grids/obtener_consulta_detalle",function( data )
			{
				var resp = JSON.parse(data);
				
				if(resp.status=='ok'){
					
					var html="<tbody>";
					for(i=0;i<resp.datos.length;i++){
						html+='<tr>';
						html+='<td>'+resp.datos[i].id_dt_fact+'</td>';
						html+='<td>'+resp.datos[i].id_producto+'</td>';
						html+='<td>'+resp.datos[i].id_cantidad+'</td>';
						html+='<td>'+resp.datos[i].precio+'</td>';
						html+='<td>'+resp.datos[i].pago+'</td>';
						html+='<td>'+resp.datos[i].id_empleo+'</td>';
						html+='</tr>';
					}
					html+='</tbody>';
					$('#consulta_detalle tbody').remove();
					$('#consulta_detalle').append(html);
					$('#consulta_detalle').DataTable();
				}else{
					alert(resp.message);
				}
			});
		})
});