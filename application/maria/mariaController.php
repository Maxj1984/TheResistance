<?php
class mariaController extends Controller
{

	function __construct()
	{
		parent::__construct();
		$this->view->rendering('maria');
	}

	function index()
	{
		//echo "Este es el metodo por defecto de la clase <br>";
	}
	
	
}
?>