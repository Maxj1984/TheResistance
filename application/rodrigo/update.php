<?php
try{

	$bd = new PDO("mysql:host=localhost;dbname=db_inventweb;charset=utf8","web","inventW3b");
	//$bd = new PDO("mysql:host=localhost;dbname=n4p6n7r2_progra4; charset=utf8","n4p6n7r2_progra4","yjFjb(INQgNX");
}
catch(PDOException $e) {
    echo $e->getMessage();
}
	
if(isset($_POST['enviar'])){
	$plaza = $_REQUEST['plaza'];
	$sumar = 1;
	
	try{
		$agregar = "UPDATE empleo SET total = total + '$sumar' 
		WHERE descripcion = '$plaza' ";
		$sql= $bd->prepare($agregar);
		$sql->execute();
		}
		catch(PDOException $e) {
			echo $e->getMessage();
			}

}
?>