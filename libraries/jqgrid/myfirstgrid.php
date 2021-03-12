<?php
//Invoca la conexion al servidor
include("cn.php");


//linea para realizar la consulta a la BD
$datos= "SELECT * FROM invheader";
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Ejemplo de JqGrid</title>

		<link rel="stylesheet" type="text/css" href="css/estilo.css"/>
		<link rel="stylesheet" type="text/css" media="screen"
		href="text/css/ui-lightness/jquery-ui-1.10.1.custom.min.css" />
		
		<link rel="stylesheet" 
		href="https://cdnjs.cloudflare.com/ajax/libs/free-jqgrid/4.14.0/css/ui.jqgrid.min.css">

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"> </script>
		<!--script que carga el idioma de jqgrid, visible al usuario-->
		<script src="js/i18n/grid.locale-es.js" type="text/javascript"> </script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/free-jqgrid/4.14.0/jquery.jqgrid.min.js">
		 </script>
		
		
		
	</head>

	<body>
		<div>
			<h1 align="center">Ejemplo de JqGrid</h1>
			<div align="center">
					
				<table id="list3"></table>
				<div id="pager3"></div>
	
			</div>
		</div>
			
	</body>
	
	
	
	<!-- JqGrid llamando datos de cn.php-->
	<script type="text/javascript">
	$(function () {
		$("#grid_id").jqGrid({
			
			//Coloca Nombres a las Columnas
			colNames: ["ID Cliente", "Fecha", "Monto", "Impuesto", "Total"],
	
	//modelo de carga de los datos, tiene que ser los mismos que los encabezados, sino muestra error
			colModel: [
			{ name: "client_id", align: "center" },
				{ name: "invdate", align: "center" },
				{ name: "amount", align: "center" },
				{ name: "tax",  align: "center" },
				{ name: "total",  align: "center" }

			],
			//llena la tabla con los datos de mySQL y Json
			data: [
				<?php $resultado = mysqli_query($conexion,$datos);
				/*ciclo para validar informaion en la tabla se detiene 
				cuando ya no hay mas informacion*/
				while ($row=mysqli_fetch_assoc($resultado)) {
					?>
					{
						client_id: <?php echo $row["client_id"];?>,
						invdate: <?php echo $row["invdate"];?>,
						amount: <?php echo $row["amount"];?>,
						tax: <?php echo $row["tax"];?>,
						total: <?php echo $row["total"];?>,
					},
					<?php } ?>
//con la linea comentada, es como se ingresan datos manualmente				
//{ invid: 10, invdate: "10/09/2020", amount: "20.00", tax: 				"2.00", total: "22.00", note: "prueba de gjqGrid" },
			],
			//paginador de JqGrid
			pager: "#gridpager",
			rowNum: 20,
			rowList: [1,5,10,20,30],
			sortname: 'client_id',
			sortorder: 'asc',
			viewrecords: true,
			gridview: true,
			autoencode: true,

			caption: "Mi Primer JqGrid"
		});
		
		//barra de acciones de jqgrid, aqui se puede instalar el CRUD
		jQuery("#grid_id").navGrid('#gridpager',
		{
			
		}
		
		
		);
	});
	</script>
	
	
	<!--script para llamar datos usando Json -->
	<script type="text/javascript">
		jQuery("#list3").jqGrid({
			url:'server.php',
			datatype: "json",
			colNames:['ID','Fecha', 'Codigo','Nombre', 'Monto','Impuesto','Total','Notas'],
			colModel:[
				{name:'invid',index:'invid', width:60, sorttype:"int"},
				{name:'invdate',index:'invdate', width:90, sorttype:"date",editable: true},
				{name:'client_id',index:'client_id', width:100, sorttype:"int",editable: true},
				{name:'invname',index:'invname', width:150,editable: true},
				{name:'amount',index:'amount', width:80, align:"right",sorttype:"float",editable: true},
				{name:'tax',index:'tax', width:80, align:"right",sorttype:"float",editable: true},
				{name:'total',index:'total', width:80,align:"right",sorttype:"float",editable: true},
				{name:'note',index:'note', width:150, sortable:false,editable: true}
			],
			rowNum:20,
			rowList:[10,20,30, 40 , 50],
			pager: '#pager3',
			sortname: 'invid',
			viewrecords: true,
			sortorder: "asc",
			loadonce: true,
			caption: "JqGrid con Json",
			
			editurl:'btnaccion.php'
		});
		
			
		
		//barra de acciones propias de JqGrid, se puede invocar un metodo en php
		jQuery("#list3").navGrid("#pager3",
			{
				add: true, edit: true, del:true, refresh:true,closeOnEscape: true,
				beforeRefresh: function() {$("#list3").jqGrid('setGridParam',
				{url:'server.php',datatype:"json"}).trigger('reloadGrid');
				},
				afterAdd:function() {$("#list3").jqGrid('setGridParam',
					{url:'server.php',datatype:"json"}).trigger('reloadGrid');
				}
		
			}
		);
		
		/*esta linea permite cargar botones para editar directamente en el jqgrid sin
		un menu emergente
		jQuery("#list3").inlineNav("#pager3");*/
		
		jQuery("#list3").filter();
		
	</script>

</html>