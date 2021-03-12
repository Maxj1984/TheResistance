jQuery("#crud").jqGrid({
	url: base_url+'yasdata/consulta_js',
	datatype: "json",
	width: 1200,

	colNames:['Id','Descripcion','Telefono','Direccion','Correo','Empleo','Fotografia','Curriculum','Estado'],
	colModel:[
		{name:'id_solicitud',
			index:'id_solicitud',
			width:55, align: 'center',
			editable:false,
			editoptions:{readonly:true},
			sorttype:'int'
		},

		{name:'descripcion',
			index:'descripcion',
			width: 100, align: 'center',
			editable: true,editrules:{required:true},
			
			edittype:"text",
		},


		{name:'telefono',
			index:'telefono',
			width: 80, align: 'center',
			editable: true,
			editrules:{required:true},
			
			edittype:"text"
		},

		{name:'direccion',
			index:'direccion',
			width:90, align: 'center',
			editable:true, editrules:{required:true},
			
			edittype:"text"
		},

		{name:'correo',
			index:'correo',
			width: 200, align: 'center',
			editable: true,editrules:{required:true},
			formatter:'text',edittype:"text"
		},

		{name:'id_empleo',
			index:'id_empleo',
			width: 80, align: 'center',
			editable: true,editrules:{required:true},
			formatter:'select',edittype:"select",editoptions:{value:"1:Informatica;2:Ventas;4:Servicio al Cliente;5:Bodega;7:Analista Finanzas;12:Soporte Tecnico;17:Marketing;18:Tecnico;19:Maestro;23:Programador Web;24:Gerente Comercial;28:Analista Finanzas;29:Analista IT;60:Contabilidad"}
		},

		{name:'fotografia',
			index:'fotografia',
			width: 80, align: 'center',
			editable: true,
			
			hidden:true,
		} ,


		{name:'curriculum',
			index:'curriculum',
			width: 80,  align: 'center',
			editable: true,
			
			hidden:true,
		},


		{name:'estado_registro',
			index:'estado_registro',
			width: 80, align: 'center',
			editable: true,
			editrules:{required:true},
			formatter:'text',
			edittype:"text",
		},

	],


	sorting: true,
    paging: true,
	rowNum:10,
	rowTotal: 50,
	rowList:[5,10,30],
	pager: '#pcrud',
	sortname: 'id_solicitud',
	//caption: 'Local grid with images',
	loadonce: true,
	viewrecords: true,
	sortorder: "desc",
	editurl: base_url+'yasdata/edit_jqgrid',

});



jQuery("#crud").navGrid('#pcrud',
{
	search:false,
	cloneToTop: true,
	edit:true, edittitle: "Edit Post", width: 500, //editar
	add:true, addtitle: "Add Post", width: 500, //agregar
	del:true, // eliminar
	refresh:false, //actualizar


} ,
);


jQuery("#crud").jqGrid('navButtonAdd','#pcrud',

{ caption: " Consultar Empleados ",
	buttonicon: "ui-icon-bookmark",
	onClickButton: genCSV, position: "last",


});

function genCSV()
{

	window.open(base_url+'yasdata/DataTable', '_self');
}