// JavaScript Document
$(document).ready(function(){
$("#Nombre").keyup(function(event) {

			  var Plantilla=$('#Nombre').val();
			  $("#crud").jqGrid('setGridParam',{url:'Operaciones.php?oper=8'+'&valor='+Plantilla,datatype:'json',mtype: 'GET'}).trigger('reloadGrid');


});



	
	
	

});// cierre general de la aplicacion
		