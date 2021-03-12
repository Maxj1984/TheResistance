$(document).ready(function()
{
	
	$('#consultar').click(function(){
		
			$.post(base_url+"catalogos/departamento/obtener_consulta_depto",function( data )
			{
				var resp = JSON.parse(data);
				
				if(resp.status=='ok'){
					
					var html="<tbody>";
					for(i=0;i<resp.datos.length;i++){
						html+='<tr>';
						html+='<td>'+resp.datos[i].id_departamento+'</td>';
						html+='<td>'+resp.datos[i].descripcion+'</td>';
						html+='<td>'+resp.datos[i].estado_registro+'</td>';
						html+='</tr>';
					}
					html+='</tbody>';
					$('#consulta_depto tbody').remove();
					$('#consulta_depto').append(html);
					$('#consulta_depto').DataTable();
				}else{
					alert(resp.message);
				}
			});
		})
});