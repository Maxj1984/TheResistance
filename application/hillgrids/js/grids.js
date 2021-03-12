jQuery("#hillgrid").jqGrid({ 
        sorting: true,
        paging: true,
        height: 300,
	width: 1200,

			url:'grids/consulta_solicitud',
			datatype: "json",
			
			colNames:['ID','Nombre', 'Telefono','Dirección', 'Correo','Puesto','Fotografía','Curriculum','Estado'],
			colModel:[
				{name:'id_solicitud',index:'id_solicitud', sorttype:"int"},
				{name:'descripcion',index:'descripcion', sorttype:"char",editable: true},
				{name:'telefono',index:'telefono', sorttype:"char",editable: true},
				{name:'direccion',index:'direccion', editable: true},
				{name:'correo',index:'correo', align:"center",sorttype:"char",editable: true},
				{name:'id_empleo',index:'id_empleo', align:"center",sorttype:"char",editable: true},
				{name:'fotografia',index:'fotografia', align:"center", editable: false, width:'60px'},
				{name:'curriculum',index:'curriculum', editable: false},
				{name:'estado_registro',index:'estado_registro', align:"center",sortable:false,editable: true,width:'60px'}
			],
			
			
			rowNum:10,
			rowList:[10,20,30],
			pager: '#pagerhg',
			sortname: 'invid',
			viewrecords: true,
			sortorder: "asc",
			loadonce: true,
			caption: "Solicitudes",
			editurl:'grids/edit_grid'
		});


/* script para hacer responsive el jqGrid*/
$(window).on("resize", function () {
    var $grid = $("#hillgrid"),
        newWidth = $grid.closest(".ui-jqgrid").parent().width();
    $grid.jqGrid("setGridWidth", newWidth, true);
});

		
/*barra de acciones propias de JqGrid, se puede invocar un metodo en php*/
		jQuery("#hillgrid").navGrid("#pagerhg",
			{
				add: true, edit: true, del:true, refresh:true,closeOnEscape: true,
				beforeRefresh: function() {$("#hillgrid").jqGrid('setGridParam',
				{url:'grids/consulta_solicitud',datatype:"json"}).trigger('reloadGrid');
				},
				afterAdd:function() {$("#hillgrid").jqGrid('setGridParam',
					{url:'grids/consulta_solicitud',datatype:"json"}).trigger('reloadGrid');
				}
		
			}
		);