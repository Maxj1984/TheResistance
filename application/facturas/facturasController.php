<?php
class facturasController extends Controller {
	function __construct() {
		parent::__construct();
		$this->registry = Registry::obtener_instancia();
		$this->modelo = $this->loadModel('facturas');
	}
	
	function index() {
		$this->view->setJs(array('facturas'));
		$this->view->rendering('facturas');
	}
	
	function graficas() {
		$this->view->setJs(array('graficas'));
		$this->view->rendering('graficas');
	}
	
	
	
	//funciones para la vista de clientes
	function clientes() {
		$this->view->setJs(array('clientes'));
		$this->view->rendering('clientes');
	}
	
	public function consulta_clientes()
	{
		$params=array('operacion'=>'consulta_clientes');
		$respuesta= $this->modelo->consultas_clientes($params);
		echo json_encode($respuesta);	
	}
	
	function consulta_cliente()
	{
		$this->view->setJs(array('consulta_cliente'));
		$this->view->rendering('consulta_cliente');
	}
	
	public function obtener_consulta_cliente()
	{
		$params=array('operacion'=>'obtener_consulta_cliente');
		$respuesta= $this->modelo->consultas($params);
		echo json_encode($respuesta);
	}
	
	
	public function edit_clientes(){
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
		$respuesta= $this->modelo->crudClient($params);
		echo json_encode($respuesta);
	}
	
	
	//funciones para el formato de factura
	public function obtener_datos_cliente(){
		$id_cliente=$_POST['id_cliente'];
		$params=array('operacion'=>'obtener_datos_cliente','id_cliente'=>$id_cliente);
		$respuesta=$this->modelo->consultas($params);
		echo json_encode($respuesta);
	}
	
	public function obtener_datos_producto(){
		$id_producto=$_POST['id_producto'];
		$params=array('operacion'=>'obtener_datos_producto','id_producto'=>$id_producto);
		$respuesta=$this->modelo->consultas($params);
		echo json_encode($respuesta);
	}
	
	public function edit_facturas(){
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
		$respuesta= $this->modelo->crudFact($params);
		echo json_encode($respuesta);
	}
	
}

?>