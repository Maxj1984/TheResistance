<?php
class parcialController extends Controller
{
	function __construct()
	{
		parent::__construct();
		
	}

	function index()
	{
		$this->view->setJs(array('parcial'));
		$this->view->rendering('parcial');
	}
	
	public function bootstrap(){
		$this->view->setJs(array('bootstrap'));
		$this->view->rendering('bootstrap');
	}
	
	public function jquerys(){
		$this->view->setJs(array('jquerys'));
		$this->view->rendering('jquerys');
	}
}

?>