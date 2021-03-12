jQuery("#list3").jqGrid({ 
        sorting: true,
        paging: true,
			url: base_url+'tablas_rod/consulta_js',
			datatype: "json",
			
			colNames:['Indice','Descripción', 'Teléfono','Dirección', 'Correo Electronico','Puesto','Fotografía','Curriculum','Estado Registro'],
			colModel:[
				{name:'id_solicitud',index:'id_solicitud', sorttype:"int", width:'60px', align:'center'},
				{name:'descripcion',index:'descripcion', sorttype:"char",editable: true, align:'center'},
				{name:'telefono',index:'telefono', sorttype:"char",editable: true, align:'center'},
				{name:'direccion',index:'direccion', editable: true, align:'center'},
				{name:'correo',index:'correo', align:"center",sorttype:"char",editable: true},
				{name:'id_empleo',index:'id_empleo', align:"center",sorttype:"char", editable: true,
				width:'80px'},
				{name:'fotografia',index:'fotografia', align:"center", editable: true, edittype:'file',
				editoptions: {enctype: "multipart/form-data"}, width:'60px'},
				{name:'curriculum',index:'curriculum', editable: true, edittype:'file',
				editoptions: {enctype: "multipart/form-data"}, align:'center'},
				{name:'estado_registro',index:'estado_registro', align:"center",sortable:false,editable: true,width:'90px'}
			],
			
			
			rowNum:10,
			rowList:[10,20,30],
			pager: '#pager3',
			sortname: 'id_solicitud',
			viewrecords: true,
			sortorder: "asc",
			loadonce: true,
			caption: "Solicitudes",
			editurl: base_url+'tablas_rod/edit_jqgrid'
		});


		
		/*barra de acciones propias de JqGrid, se puede invocar un metodo en php*/
		jQuery("#list3").navGrid("#pager3",
			{
				add: true, edit: true, del:true, refresh:true,closeOnEscape: true,
				afterRefresh: function() {$("#list3").jqGrid('setGridParam',
				{url: base_url+'tablas_rod/consulta_js',datatype:"json"}).trigger('reloadGrid');
				},
				closeAfterAdd: true,
				closeAfterEdit: true
				
		
			}
			
		);
