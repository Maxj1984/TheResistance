<?php


try{
	$gbd = new PDO("mysql:host=localhost;dbname=n4p6n7r2_progra4;charset=utf8","n4p6n7r2_progra4","yjFjb(INQgNX");
	$respuesta = $gbd->prepare("select descripcion, total from empleo ORDER BY total");
	
	$respuesta->execute();
	
	$json =[];
	$json2 =[];
	
	while ($row = $respuesta->fetch(PDO::FETCH_ASSOC)) {
		extract($row);
		$json[]= $descripcion;
		$json2[]=(int)$total;
  	
}


	
	

}
catch(PDOException $e) {
    echo $e->getMessage();
}

?>