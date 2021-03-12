<?php
class parcial1Controller extends Controller
{
	function __construct()
	{
		parent::__construct();
		$this->view->rendering('index');
		echo 'Este es el constructor de Parcial 1<br>';
	}

	function index()
	{
		echo"Este es el metodo por defecto de la clase Parcial 1<br>";
	}
}

?>