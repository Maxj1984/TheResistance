jQuery("#list3").jqGrid({ 
        sorting: true,
        paging: true,
			url: base_url+'grids/consulta_solicitud',
			datatype: "json",
			
			
			colNames:['No.','Nombre', 'Telefono','Dirección', 'Correo','ID Puesto','Fotografía','Curriculum','Estado','Subir Foto', 'Subir PDF'],
			colModel:[
				{name:'id_solicitud',index:'id_solicitud', sorttype:"int", width:'60px', align:"center",key:true},
				{name:'descripcion',index:'descripcion', sorttype:"char",editable: true},
				{name:'telefono',index:'telefono', sorttype:"char",editable: true, align:"center"},
				{name:'direccion',index:'direccion', editable: true},
				{name:'correo',index:'correo', align:"center",sorttype:"char",editable: true},
				{name:'id_empleo',index:'id_empleo', align:"center",sorttype:"char", editable: true,
				width:'40px'},
				
				{name:'fotografia',index:'fotografia', align:"center", editable: false},
				{name:'curriculum',index:'curriculum', editable: false},
				{name:'estado_registro',index:'estado_registro', align:"center",sortable:false,editable: true,width:'60px'},
				{name:'img_pic',index:'img_pic', width:'75px',sortable:false, 
				formatter: buttonhtml, aling:"center"},
				  
				{name:'pdf_doc',index:'pdf_doc', 
				width:'75px',sortable:false, 
				formatter: function (cellValue, options, rowObject) {
            return "<button type='button' class='btn btn-secondary' id='btn-foto' onclick='clickpdf("+options.rowID+")' id='btn-foto' data-toggle='modal' data-target='#Mod_pdf'>Subir PDF </button>";
            return btnpdf;
        }, aling:"center"}
				
			],
			
			
			rowNum:10,
			rowList:[10,20,30],
			pager: '#pager3',
			sortname: 'id_solicitud',
			viewrecords: true,
			sortorder: "asc",
			loadonce: true,
			autowidth: true,
			caption: "Solicitudes",
			editurl: base_url+'grids/edit_grid'	,
			
		});


		
		/*barra de acciones propias de JqGrid, se puede invocar un metodo en php*/
		$("#list3").navGrid("#pager3",
			{add: true, edit: true, del:true, refresh:true,search:false, view: true,
			afterRefresh: function() {$("#list3").jqGrid('setGridParam',
				{url: base_url+'grids/consulta_solicitud',datatype:"json"}).trigger('reloadGrid');
				},
			},
			
		);
		
		
		/* script para hacer responsive el jqGrid*/
		$(window).on("resize", function () {
		    var $grid = $("#list3"),
		        newWidth = $grid.closest(".ui-jqgrid").parent().width();
		    $grid.jqGrid("setGridWidth", newWidth, true);
		});
		
		
		/* funcion para crear el boton en la columna y fila de subir fotografia*/
		
		function buttonhtml(cellValue, options, rowObject) {
            var btnhtml = "<button type='button' class='btn btn-primary' id='btn-foto' data-toggle='modal' data-target='#Mod_foto'>Subir Foto</button>";
            return btnhtml;   
        }
    
    
        /* funcion para crear el boton en la columna y fila de subir PDF*/
        
        function buttonpdf(cellValue, options, rowObject) {
           /* var btnpdf ="<button type='button' class='btn btn-secondary' id='btn-foto' data-toggle='modal' data-target='#Mod_pdf'>Subir PDF</button>";
            return btnpdf;*/
            
            var btnpdf ="<button type='button' class='btn btn-secondary' id='btn-foto' onclick='clickpdf()'>Subir PDF </button>";
            return btnpdf;
        }
        
        
        
        
        
        
        function clickpdf(idRow) {
        	$("#list3").jqGrid('setSelection',idRow);
            $("#input-pdf").fileinput('clear');
        }


		$("#input-pdf").fileinput({
				showPreview: true,
				showUpload: false,
				elErrorContainer:'#kartik-file-errors',
				allowedFileExtensions: ["png","pdf","jpg"],
				language: "es",
			    uploadUrl:  base_url+'grids/upload.php',
			    uploadExtraData: function(){
			    	return {id:$("#list3").jqGrid('getGridParam','selrow'),objArchivo:'input-pdf'}
			    }
			});
		