$(document).ready(function()
{
	$.post(base_url+"productos/obtener_datos_productos",function( data )
	{
		var datos = JSON.parse(data);
		var info = datos.datos;
		var html='';
		if (datos.status=='ok')
		{
			if (info.length>0)
			{
				for (i = 0; i < info.length ; i++)
				{
					if (info[i].estado=='A')
					{
						html += '<li class="span3">';
						html += '<div class="product-box">';
						html += '<span class="sale_tag"></span>';
						html += '<a href="#"><img class:"foto" alt="" src="'+ruta_img+info[i].foto+'"></a><br/>';
						html += '<a href="#" class="title">'+info[i].tipo+'</a><br/>';
						html += '<a href="#" class="category">ID: '+info[i].id_producto+'</a><br>';
						html += '<a href="#" class="category">'+info[i].descrip_prod+'</a>';
						html += '<p class="price">'+info[i].precio+'</p>';
						html += '</div>';
						html += '</li>';

					}
				}
				
				$("#detalle_productos").html(html);
			}
		}
		
	
	});
	
});