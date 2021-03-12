<?php
	if ($_SERVER['HTTP_HOST']=='localhost') {
		define('BASE_URL', 'http://localhost/Progra4/Proyecto/');
		define('HOST','localhost');
		define('USER','root');
		define('PASSWORD','');
		define('DB_NAME','db_proyecto');
	}else{
		define('BASE_URL', 'http://theresistance.inventweb.site/');
		define('HOST','localhost');
		define('USER','n4p6n7r2_progra4');
		define('PASSWORD','yjFjb(INQgNX');
		define('DB_NAME','n4p6n7r2_progra4');
	}
	
	
	/**
	* Codigo de Prueba para deshopping
	*/

	define('LAYOUT_PATH', BASE_URL . 'layout/');
?>