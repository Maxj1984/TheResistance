jQuery("#mantenimientofa").jqGrid({ 
        sorting: true,
        paging: true,
        height: 300,
	width: 1200,

			url:'grids/consulta_detalle',
			datatype: "json",
			
			colNames:['id_dt_fact, id_producto, id_factura, cantidad, precio, 
				pago'],
			colModel:[
				{name:'id_dt_fact',index:'id_dt_fact', sorttype:"int"},
				{name:'id_producto',index:'id_producto', sorttype:"int",editable: true},
				{name:'id_factura',index:'id_factura', sorttype:"int",editable: true},
				{name:'cantidad',index:'cantidad', editable: true},
				{name:'precio',index:'precio', align:"center",sorttype:"decimal",editable: true},
				{name:'pago',index:'pago', align:"center",sorttype:"decimal",editable: true},
			],
			
			
			rowNum:10,
			rowList:[10,20,30],
			pager: '#pagermf',
			sortname: 'invid',
			viewrecords: true,
			sortorder: "asc",
			loadonce: true,
			caption: "Detalle de facturacion",
			editurl:'grids/edit_grid'
		});


/* script para hacer responsive el jqGrid*/
$(window).on("resize", function () {
    var $grid = $("#mantenimientofa"),
        newWidth = $grid.closest(".ui-jqgrid").parent().width();
    $grid.jqGrid("setGridWidth", newWidth, true);
});

		
/*barra de acciones propias de JqGrid, se puede invocar un metodo en php*/
		jQuery("#mantenimientofa").navGrid("#pagermf",
			{
				add: true, edit: true, del:true, refresh:true,closeOnEscape: true,
				beforeRefresh: function() {$("#mantenimientofa").jqGrid('setGridParam',
				{url:'grids/consulta_detalle',datatype:"json"}).trigger('reloadGrid');
				},
				afterAdd:function() {$("#mantenimientofa").jqGrid('setGridParam',
					{url:'grids/consulta_detalle',datatype:"json"}).trigger('reloadGrid');
				}
		
			}
		);