<?php
try{
	//$gbd = new PDO("mysql:host=localhost;dbname=db_inventweb;charset=utf8","web","inventW3b");
	$gbd = new PDO("mysql:host=localhost;dbname=n4p6n7r2_progra4;charset=utf8","n4p6n7r2_progra4","yjFjb(INQgNX");
}
catch(PDOException $e) {
    echo $e->getMessage();
}


if(isset($_POST['crear']))
	{
	
		try{
			$agregar = "CREATE TABLE `opr_tipo_producto` (`id_tipo_producto` int(11) NOT NULL AUTO_INCREMENT, `descripcion` varchar(50) NOT NULL, `estado_registro` enum('A','B') NOT NULL DEFAULT 'A', PRIMARY KEY (`id_tipo_producto`))";
			$sql= $gbd->prepare($agregar);
			$sql->execute();
			}
			catch(PDOException $e) {
				echo $e->getMessage();
				}

	}

?>