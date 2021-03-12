jQuery("#product").jqGrid({ 
        sorting: true,
        paging: true,
			url: base_url+'productos/consulta_js',
			datatype: "json",
			
			
			colNames:['No.','Fecha', 'Descripcion de Producto','Id Tipo', 'Tipo Producto','Clasificación','Destacado','Fotografía','Precio','Estado'/*,'Subir Foto'*/],
			colModel:[
				{name:'id_producto',index:'id_producto', sorttype:"int", width:'60px', align:"center",key:true},
				
				{name:'fecha',index:'fecha', sorttype:"date", width:'60px', align:"center",editable: true, formatter: 'date', formatoptions: { srcformat: 'Y/m/d', newformat: 'd/m/Y'}},
				
				{name:'descripcion',index:'descripcion', sorttype:"char",editable: true},
				
				{name:'id_tipo_producto',index:'id_tipo_producto', align:"center",sorttype:"char", editable: true,width:'40px'},
				{name:'tipo',index:'tipo', sorttype:"char", width: '80px'},
				
				{name:'clasificacion',index:'clasificacion', sorttype:"char",editable: true, align:"center", width:'60px'},
				
				{name:'destacado',index:'destacado', editable: true, width:'60px'},
				
				{name:'foto',index:'foto', align:"center", sorttype:"char", editable: true },
				
        		{name:'precio',index:'precio', sorttype:"int", width:'60px', align:"center", editable: true},
                
                {name:'estado_registro',index:'estado_registro', align:"center",sortable:false,editable: true,width:'60px'},
                
               /* {name:'foto_up',index:'foto_up', width:'75px',sortable:false, formatter: function (cellValue, options, rowObject) {
            return "<button type='button' class='btn btn-info' onclick='clickfoto("+options.rowID+")' id='btn-foto' data-toggle='modal' data-target='#Mod_foto'>Subir Foto </button>";
        }, aling:"center"},*/
				
			],
			
			
			rowNum:10,
			rowList:[10,20,30],
			pager: '#menu_product',
			sortname: 'id_producto',
			viewrecords: true,
			sortorder: "asc",
			loadonce: true,
			autowidth: true,
			caption: "Productos",
			editurl: base_url+'productos/edit_grid'	,
			
		});


		
		/*barra de acciones propias de JqGrid, se puede invocar un metodo en php*/
		$("#product").navGrid("#menu_product",
			{add: true, edit: true, del:true, refresh:true,search:true, view: true,
			afterRefresh: function() {$("#product").jqGrid('setGridParam',
				{url: base_url+'productos/consulta_js',datatype:"json"}).trigger('reloadGrid');
				},
			},
			
		);
		
		
		/* script para hacer responsive el jqGrid*/
		$(window).on("resize", function () {
		    var $grid = $("#product"),
		        newWidth = $grid.closest(".ui-jqgrid").parent().width();
		    $grid.jqGrid("setGridWidth", newWidth, true);
		});
        
        
        
        function clickfoto(idRow) {
        	$("#product").jqGrid('setSelection',idRow);
            $("#input-b1").fileinput('clear');
        }


		$("#input-b1").fileinput({
				showPreview: true,
				showUpload: true,
				elErrorContainer:'#kartik-file-errors',
				allowedFileExtensions: ["png","jpg","jpeg"],
				language: "es",
			    uploadUrl:  base_url+'productos/cargaArchivo',
			    uploadExtraData: function(){
			    	return {id:$("#product").jqGrid('getGridParam','selrow'),objArchivo:'input-b1'}
			    }
			});
		