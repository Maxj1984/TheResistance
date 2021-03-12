<?php
class Dispatch{
	public static function run(Request $peticion){
		try{
			$modulo = $peticion->obtener_modulo();
			$controlador = $peticion->obtener_controlador()."Controller";
			$metodo = $peticion->obtener_metodo();
			$parametros = $peticion->obtener_parametros();
			$ruta_controlador = $peticion->obtener_controlador();
			
			
			if ($modulo) {
				$rutaModulo = APP_PATH . 'modules' . DS . $modulo . DS . $ruta_controlador . DS . $controlador . '.php';
			}else{
				$rutaModulo = APP_PATH . $ruta_controlador . DS . $controlador . '.php';
			}
			
			if (is_readable($rutaModulo)) {
				require_once $rutaModulo;
			
				$controlador = new $controlador;
				
				if (!is_callable(array($controlador,$metodo))) {
					$metodo='index';
				}
				
				if (isset($parametros) && count($parametros)>0) {
					call_user_func_array(array($controlador,$metodo),$parametros);
				}else{
					call_user_func(array($controlador,$metodo));
				}
			}
			
			
		} catch (Exception $e) {
			$mensaje="Ocurrio un error en la clase ".get_class($e).": ".$e->getMessage().", en el archivo ".$e->getFile().", en la linea:".$e->getLine();
			echo $mensaje;
		}
	}
}
