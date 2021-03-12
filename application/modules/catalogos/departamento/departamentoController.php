<?php
class departamentoController extends Controller{
	function __construct(){
		parent::__construct();
		$this->registry = Registry::obtener_instancia();
		$this->modelo = $this->loadModel('departamento','catalogos');
		
	}
	
	function index()
	{
		$this->view->setJs(array('departamento'));
		$this->view->rendering('departamento');
	}
	
	
	public function edit_departamento(){
		$datos=$_POST;
		$operacion=$_POST['oper'];
		if($operacion!='add'){
			$id=$datos['id'];
		}
		unset($datos['id']);
		unset($datos['oper']);
		
		if($operacion!='add')
		{
			if($operacion=='del'){
				$params=array('operacion'=>$operacion,'id'=>$id);
			}
		$params=array('operacion'=>$operacion,'id'=>$id,'datos'=>$datos);
		}else{
		$params=array('operacion'=>$operacion,'datos'=>$datos);	
		}
		$respuesta= $this->modelo->crudData($params);
		echo json_encode($respuesta);
	}
	
	/* vista para el formulario de modificar	*/
	public function modificar_departamento(){
		$this->view->setJs(array('modificar_departamento'));
		$this->view->rendering('modificar_departamento');
	}
	
	/* funcion para cargar los datos al ingresar el ID	*/
	public function obtener_datos_departamento(){
		$id_departamento=$_POST['id_departamento'];
		$params=array('operacion'=>'obtener_datos_departamento','id_departamento'=>$id_departamento);
		$respuesta=$this->modelo->consultas($params);
		echo json_encode($respuesta);
	}
	
	/* vista para el formulario de eliminar	*/
	public function eliminar_departamento(){
		$this->view->setJs(array('eliminar_departamento'));
		$this->view->rendering('eliminar_departamento');
	}
	
	/* vista para el formulario de consulta	*/
	public function consulta_departamento(){
		$this->view->setJs(array('consulta_departamento'));
		$this->view->rendering('consulta_departamento');
	}
	
	/* funcion para la tabla de consultas	*/
	public function obtener_consulta_depto()
	{
		$params=array('operacion'=>'obtener_consulta_depto');
		$respuesta= $this->modelo->consultas($params);
		echo json_encode($respuesta);
	}
	
	
	
	function obtener_json(){
		$facturas=array('factura1'=>5464,'saldo1'=>1000,'factura2'=>5465,'saldo2'=>2000,'saldo3'=>3000);
		
		$datos=array(
		'nombre'=>'Luis Perez'
		,'edad'=>35
		,'carnet'=>'1900325'
		,'direccion'=>'cualquiera'
		,'departamento'=>'Guatemala'
		,'ciudad'=>'Santa Catarina Pinula'
		,'saldo'=>5000
		,'facturas_pendientes'=>$facturas);
		var_dump($datos);
		echo '<br>';
		echo '<p>Creacion de JSON</p>';
		$json_datos=json_encode($datos);
		echo $json_datos;
	}
}

?>