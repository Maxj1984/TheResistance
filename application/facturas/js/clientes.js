jQuery("#clientes").jqGrid({ 
        sorting: true,
        paging: true,
			url: base_url+'facturas/consulta_clientes',
			datatype: "json",
			
			
			colNames:['No.','Nombre de Cliente', 'Dirección', 'Nit','Estado'],
			colModel:[
				{name:'id_cliente',index:'id_cliente', sorttype:"int", width:'60px', align:"center",key:true},
				{name:'descripcion_cliente',index:'descripcion_cliente', sorttype:"char",editable: true},
				{name:'direccion',index:'direccion', sorttype:"char",editable: true},
				{name:'nit_cliente',index:'nit_cliente', align:"center",sorttype:"char",editable: true},
				{name:'estado_registro',index:'estado_registro', align:"center",sortable:false,editable: true,width:'60px'},
			],
			
			
			rowNum:10,
			rowList:[10,20,30],
			pager: '#menu_clientes',
			sortname: 'id_cliente',
			viewrecords: true,
			sortorder: "asc",
			loadonce: true,
			autowidth: true,
			caption: "Clientes",
			editurl: base_url+'facturas/edit_clientes'	,
			
		});


		
		/*barra de acciones propias de JqGrid, se puede invocar un metodo en php*/
		$("#clientes").navGrid("#menu_clientes",
			{add: true, edit: true, del:true, refresh:true,search:false, view: true,
			afterRefresh: function() {$("#clientes").jqGrid('setGridParam',
				{url: base_url+'facturas/consulta_clientes',datatype:"json"}).trigger('reloadGrid');
				},
			},
			
		);
		
		
		/* script para hacer responsive el jqGrid*/
		$(window).on("resize", function () {
		    var $grid = $("#clientes"),
		        newWidth = $grid.closest(".ui-jqgrid").parent().width();
		    $grid.jqGrid("setGridWidth", newWidth, true);
		});
		