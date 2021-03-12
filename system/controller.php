<?php
abstract class Controller {
	public $request;
	public $modelo;
	
	
	function __construct() {
		$this->registry = Registry::obtener_instancia();
		$this->view = new View($this->registry->request);
	}
	
	abstract public function index();
	
	protected function loadModel($modelo,$modulo=FALSE){

		if ($modulo!=FALSE)
		{
			$rutaModelo = APP_PATH . 'modules' . DS . $modulo . DS . $modelo . DS . $modelo.'Model.php';
		}else{
			$rutaModelo = APP_PATH . $modelo . DS . $modelo . 'Model.php';
		}
		
		$clase = $modelo . 'Model';
		
		if (is_readable($rutaModelo))
		{
			require_once $rutaModelo;
			$model = new $clase;
			return $model;
			
		}else{
			throw new Exception('No se pudo cargar el archivo');
		}
		
		
		
	}
	
	
	
}

?>