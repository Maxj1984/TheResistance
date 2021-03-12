<?php
class indexController extends Controller {
	function __construct() {
		parent::__construct();
		
	}
	
	function index() {
		$this->view->rendering('index');
	}
	
	function shopping() {
		$this->view->rendering('shopping');
	}
	
}

?>