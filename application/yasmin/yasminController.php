<?php
class yasminController extends Controller
{

	function __construct()
	{
		parent::__construct();
		$this->view->rendering('yasmin');
	}

	function index()
	{
		//echo "Este es el metodo por defecto de la clase <br>";
	}
	
	
}
?>