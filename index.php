<?php
ini_set('display_errors',1);
define('DS', DIRECTORY_SEPARATOR);
define('ROOT',realpath(dirname(__FILE__)).DS);	
define('APP_PATH',ROOT.'application'.DS);
define('SYS_PATH',ROOT.'system'.DS);
define('DEFAULT_CONTROLLER','index');


try {
	include_once SYS_PATH.'config.php';
	include_once SYS_PATH.'autoload.php';

	$registry = Registry::obtener_instancia();
	$registry->request=new Request();
	//$registry ->conexion = new Conexion('localhost','n4p6n7r2_progra4','n4p6n7r2_progra4','yjFjb(INQgNX','utf8');
	//$registry ->conexion = new Conexion('localhost','db_inventweb','web','inventW3b','utf8');
	//var_dump($registry);
	Dispatch::run($registry->request);
}
catch (Exception $e) {
	echo $e->getMessage(); //este metodo captura el mensaje de error que se genere en el SQL
}


?>