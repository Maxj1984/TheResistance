$(document).ready(function(){
	$("#prueba").click(function(){
		$.post(base_url+"catalogos\departamento\obtener_json",function(data){
			var resultado= JSON.parse(data);
		})
	});
});