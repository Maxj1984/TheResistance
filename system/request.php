<?php
class Request {
	private $_modulos;
	private $_modulo;
	private $_controlador;
	private $_metodo;
	private $_argumentos;
	
	function __construct() {
		if (isset($_GET['url'])) {
			$url = filter_input(INPUT_GET,'url',FILTER_SANITIZE_URL);
			$url = explode('/',$url);
			$url = array_filter($url);
			
			$modulos = scandir(APP_PATH . 'modules');
			$this->_modulo=strtolower(array_shift($url));
			
			if (!in_array($this->_modulo,$modulos)) {
				$this->_controlador=$this->_modulo;
				$this->_modulo = FALSE;
			}else{
				$this->_controlador=strtolower(array_shift($url));
				if (!$this->_controlador) {
					$this->_controlador = DEFAULT_CONTROLLER;
				}
			}
			
			$this->_metodo = strtolower(array_shift($url));
			$this->_argumentos = $url;
		}
		
		if (!$this->_controlador) {
			$this->_controlador= DEFAULT_CONTROLLER;
		}
		
		if (!$this->_metodo) {
			$this->_metodo='index';
		}
		
		if (!$this->_argumentos) {
			$this->_argumentos=array();
		}
		
	}
	
	function obtener_modulo(){
		return $this->_modulo;
	}
	
	function obtener_controlador(){
		return $this->_controlador;
	}
	
	function obtener_metodo(){
		return $this->_metodo;
	}
	
	function obtener_parametros(){
		return $this->_argumentos;
	}
}
?>