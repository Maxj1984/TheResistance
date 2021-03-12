<?php
try{
	$gbd = new PDO("mysql:host=localhost;dbname=db_inventweb;charset=utf8","web","inventW3b");
	//$gbd = new PDO("mysql:host=localhost;dbname=n4p6n7r2_progra4;charset=utf8","n4p6n7r2_progra4","yjFjb(INQgNX");
}
catch(PDOException $e) {
    echo $e->getMessage();
}
	
	/**
	* condicion para actualizar informacion  de puestos a la BD
	*/

if(isset($_POST['enviar'])){
	$nombres = $_REQUEST['firtsnames'];
	$puesto = $_REQUEST['descripcion_emp'];
	$val = 1;
	if(empty($nombres)){
		$message = "debe ingresar datos";
		echo "<script type='text/javascript'>alert('$message');</script>";		
	}else{
	try{
		$agregar = "UPDATE empleo SET total = total + '$val' 
		WHERE descripcion_emp = '$puesto' ";
		$sql= $gbd->prepare($agregar);
		$sql->execute();
		}
		catch(PDOException $e) {
			echo $e->getMessage();
			}
}
}

	/**
	* esta consulta debe ser la ultima para que se actualice la grafica
	*/
	
	$respuesta = $gbd->prepare("select * from empleo  ORDER BY id_empleo");
	
	$respuesta->execute();
	//estas variables van a almacenar la cadena de cada columna
	$descrip =[];
	$datchart =[];
	
	
	while ($row = $respuesta->fetch(PDO::FETCH_ASSOC)) {
		extract($row);	
		$descrip[]= $descripcion_emp;
		$datchart[]=(int)$total;
		
		
}
echo json_encode($descrip);
echo json_encode($datchart);












?>