jQuery("#mar_grid").jqGrid({ 
        sorting: true,
        paging: true,
			url:base_url+'margrids/consulta_solicitud',
			datatype: "json",
			
			colNames:['ID','Nombre', 'Telefono','Dirección', 'Correo','Puesto','Fotografía','Curriculum','Estado'],
			colModel:[
				{name:'id_solicitud',index:'id_solicitud', sorttype:"int",width:'40px'},
				{name:'descripcion',index:'descripcion', sorttype:"char",editable: true},
				{name:'telefono',index:'telefono', sorttype:"char",editable: true},
				{name:'direccion',index:'direccion', editable: true},
				{name:'correo',index:'correo', align:"center",sorttype:"char",editable: true},
				{name:'id_empleo',index:'id_empleo', align:"center",sorttype:"char",editable: true,width:'50px'},
				{name:'fotografia',index:'fotografia', align:"center", editable: true, edittype:'file', width:'60px'},
				{name:'curriculum',index:'curriculum', editable: true, edittype:'file'},
				{name:'estado_registro',index:'estado_registro', align:"center",sortable:false,editable: true,width:'60px'}
			],
			
			height: 300,
	width: 1200,
			rowNum:10,
			rowList:[10,20,30],
			pager: '#men',
			sortname: 'invid',
			viewrecords: true,
			sortorder: "asc",
			loadonce: true,
			caption: "Solicitudes",
			editurl:base_url+'margrids/edit_grid'
		});


		jQuery("#mar_grid").navGrid("#men",
			{
				add: true, edit: true, del:true, refresh:true,closeOnEscape: true,
				beforeRefresh: function() {$("#mar_grid").jqGrid('setGridParam',
				{url:base_url+'margrids/consulta_solicitud',datatype:"json"}).trigger('reloadGrid');
				},
				afterAdd:function() {$("#mar_grid").jqGrid('setGridParam',
					{url:base_url+'margrids/consulta_solicitud',datatype:"json"}).trigger('reloadGrid');
				}
		
			}
		);
		
		
		$(window).on("resize", function () {
		    var $grid = $("#list3"),
		        newWidth = $grid.closest(".ui-jqgrid").parent().width();
		    $grid.jqGrid("setGridWidth", newWidth, true);
		});