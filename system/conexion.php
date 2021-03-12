<?php
class Conexion extends PDO {
	function __construct($host,$dbname,$usuario,$clave,$tabla) {
		parent::__construct(
			'mysql:host='. $host .
			';dbname='. $dbname ,
			$usuario,
			$clave,
			array(
				PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES '.$tabla
			)
		);
		
	}
}

?>