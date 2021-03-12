<?php
class manuelController extends Controller
{

	function __construct()
	{
		parent::__construct();
		$this->view->rendering('manuel');
	}

	function index()
	{
		//echo "Este es el metodo por defecto de la clase MANUEL<br>";
	}
	
	
}
?>