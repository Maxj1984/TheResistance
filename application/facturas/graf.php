<?php

try{
	//$gbd = new PDO("mysql:host=localhost;dbname=db_inventweb;charset=utf8","web","inventW3b");
	$gbd = new PDO("mysql:host=localhost;dbname=n4p6n7r2_progra4;charset=utf8","n4p6n7r2_progra4","yjFjb(INQgNX");
}
catch(PDOException $e) {
    echo $e->getMessage();
}
	/**
	* esta consulta debe ser la ultima para que se actualice la grafica
	*/
	
	$respuesta = $gbd->prepare("select * from opr_factura  ORDER BY id_factura");
	
	$respuesta->execute();
	//estas variables van a almacenar la cadena de cada columna
	$date =[];
	$datchart =[];
	
	
	while ($row = $respuesta->fetch(PDO::FETCH_ASSOC)) {
		extract($row);	
		$date[]= $fecha;
		$datchart[]=(int)$total;
		
		
}
/*echo json_encode($date);
		echo json_encode($datchart);*/

?>