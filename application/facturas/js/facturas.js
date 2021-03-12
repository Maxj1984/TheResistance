$(document).ready(function()
{
	
	//scrip para obtener datos de cliente
	
	$('#id_cliente').blur(function()
{
	if($('#id_cliente').val()!=''){
		var info = {
			id_cliente:$('#id_cliente').val()
		};
		
		$.post(base_url+"facturas/obtener_datos_cliente",info,function( data )
		{
			var resp=JSON.parse(data);
			if(resp.status=='ok'){
			
			$('#descripcion_cliente').val(resp.datos[0].descripcion_cliente);
			$('#nit_cliente').val(resp.datos[0].nit_cliente);
			$('#direccion').val(resp.datos[0].direccion);
			}else{
				alert(datos.message);
			}
						
			
		});
		
	}else{
		alert('Debe ingresar datos para continuar...');
	}	
});

//scrip para obtener datos de producto
$('#id_producto').blur(function()
{
	if($('#id_producto').val()!=''){
		var info = {
			id_producto:$('#id_producto').val()
		};
		
		$.post(base_url+"facturas/obtener_datos_producto",info,function( data )
		{
			var resp=JSON.parse(data);
			if(resp.status=='ok'){
			
			$('#descripcion').val(resp.datos[0].descripcion);
			$('#precio').val(resp.datos[0].precio);
			}else{
				alert(datos.message);
			}
						
			
		});
		
	}else{
		alert('Debe ingresar datos para continuar...');
	}	
});


//script para agregar productos a la lista
$('#adicionar').click(function() 
{
  var descripcionP = document.getElementById("descripcion").value;
  var precioP = document.getElementById("precio").value;
  var cantidadP = document.getElementById("cantidad").value;
  var totalP =precioP * cantidadP;
  var i = 1; //contador para asignar id al boton que borrara la fila
  var fila = '<tr id="row' + i + '"><td>' + descripcionP + '</td><td>' + cantidadP + '</td><td>' + precioP + '</td><td class="sumTotal">'+totalP+'</td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">Quitar</button></td></tr>'; //esto seria lo que contendria la fila

  i++;

  $('#mytable tr:first').after(fila);
    $("#adicionados").text(""); //esta instruccion limpia el div adicioandos para que no se vayan acumulando
    var nFilas = $("#mytable tr").length;
    $("#adicionados").append(nFilas - 1);
    //le resto 1 para no contar la fila del header
    document.getElementById("id_producto").value = "";
    document.getElementById("precio").value ="";
    document.getElementById("cantidad").value = "";
    //document.getElementById("total").value = "";
    document.getElementById("descripcion").value = "";
    document.getElementById("descripcion").focus();
  });
  
$(document).on('click', '.btn_remove', function() {
  var button_id = $(this).attr("id");
    //cuando da click obtenemos el id del boton
    $('#row' + button_id + '').remove(); //borra la fila
    //limpia el para que vuelva a contar las filas de la tabla
    $("#adicionados").text("");
    var nFilas = $("#mytable tr").length;
    $("#adicionados").append(nFilas - 1);
  });	
  
var data = [];

$("td.sumTotal").each(function(){
  data.push(parseFloat($(this).text()));
});


var suma = data.reduce(function(a,b){ return a+b; },0);

console.log(data);
console.log(suma);



//scrip para actualizar tabla de factura	
	$('#aceptar').click(function(){
 		var info = {
			
			id_cliente:$("#id_cliente").val()
			,fecha:$("#fecha").val()
			,total:$("#total").val()
			,id:"_empty"
			,oper:"add"
		};

		$.post(base_url+"facturas/edit_facturas",info,function( data )
		{
			//alert('Grabado con exito');
			//document.getElementById("frmUsuario").reset();
			var resp =JSON.parse(data);
			if(resp.status=='ok')
				{
				alert ('Datos Ingresados correctamente');
				document.getElementById("detail_fact").reset();			
				}else{
					alert('Datos no Ingresados');
				}
		});

	})
	
	})