<?php
class View {
	public $mainjs = array();
	public $maincss = array();
	public $js = array();
	public $css = array();
	
	public $peticion;
	public $rutas;
	
	/* en la linea de abajo se puede cambiar el template a utlizar	*/
	
	public $template = 'admin';
	
	public function __construct(Request $request){
		$this->peticion= $request;
		$modulo = $this->peticion->obtener_modulo();
		$controlador = $this->peticion->obtener_controlador();
		
		if ($modulo) {
			$this->rutas['view'] = APP_PATH . 'modules' . DS . $modulo . DS . $controlador . DS;
			$this->rutas['js'] = BASE_URL . 'application/modules/' . $modulo . '/' . $controlador . '/js/';
			$this->rutas['css'] = BASE_URL . 'application/modules/' . $modulo . '/' . $controlador . '/css/';
		}else{
			$this->rutas['view'] = APP_PATH . $controlador . DS;
			$this->rutas['js'] = BASE_URL . 'application/' . $controlador . '/js/';
			$this->rutas['css'] = BASE_URL . 'application/' . $controlador . '/css/';

		}
	}
	
	
	public function rendering($vista){
		$js = array();
		$css = array();
		$mainjs = array();
		$maincss = array();
		
		if (count($this->mainjs)) {
			$mainjs=$this->mainjs;
		}

		if (count($this->maincss)) {
			$maincss=$this->maincss;
		}

		if (count($this->js)) {
			$js=$this->js;
		}

		if (count($this->css)) {
			$css=$this->css;
		}
		
		$layout['mainjs'] =$mainjs;
		$layout['maincss'] =$maincss;
		$layout['js'] =$js;
		$layout['css'] =$css;
		$layout['ruta_fotos']= LAYOUT_PATH . $this->template . '/fotos/';
		$layout['img']= LAYOUT_PATH . $this->template . '/img/';
		
		$rutavista = $this->rutas['view'] . $vista . 'View.phtml';
		
		if (is_readable($rutavista)) {
			include_once ROOT . 'layout' . DS . $this->template . DS . 'template.php';
		}else{
			throw new Exception('No se encontro la vista');
		}
	}
	
	public function setJS(array $js){
		if (is_array($js) && count($js))
		{
			for ($i=0; $i<count($js); $i++)
			{
				$this->js[]=$this->rutas['js'] . $js[$i] . '.js';
			}
		}
	}

	public function setCss(array $css)
	{
		if (is_array($css) && count($css))
		{
			for ($i=0; $i<count($css); $i++)
			{
				$this->css[]=$this->rutas['css'] . $css[$i] . '.css';
			}
		}
	}	
	
	
	
}
?>