jQuery("#category").jqGrid({ 
        sorting: true,
        paging: true,
			url: base_url+'productos/consulta_js2',
			datatype: "json",
			
			
			colNames:['No.', 'Descripcion de Categoria','Estado'],
			colModel:[
				{name:'id_tipo_producto',index:'id_tipo_producto', sorttype:"int", width:'60px', align:"center",key:true},
				
				{name:'descripcion',index:'descripcion', sorttype:"char",editable: true},
				
                {name:'estado_registro',index:'estado_registro', align:"center",sortable:false,editable: true,width:'60px'},
				
			],
			
			
			rowNum:10,
			rowList:[10,20,30],
			pager: '#menu_category',
			sortname: 'id_tipo_producto',
			viewrecords: true,
			sortorder: "asc",
			loadonce: true,
			autowidth: true,
			caption: "Categorias",
			editurl: base_url+'productos/edit_cat'	,
			
		});


		
		/*barra de acciones propias de JqGrid, se puede invocar un metodo en php*/
		$("#category").navGrid("#menu_category",
			{add: true, edit: true, del:true, refresh:true,search:true, view: true,
			afterRefresh: function() {$("#category").jqGrid('setGridParam',
				{url: base_url+'productos/consulta_js2',datatype:"json"}).trigger('reloadGrid');
				},
			},
			
		);
		
		
		/* script para hacer responsive el jqGrid*/
		$(window).on("resize", function () {
		    var $grid = $("#category"),
		        newWidth = $grid.closest(".ui-jqgrid").parent().width();
		    $grid.jqGrid("setGridWidth", newWidth, true);
		});
		