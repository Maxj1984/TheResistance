<?php
class tablas_rodController extends Controller
{

	function __construct()
	{
		parent::__construct();
		$this->registry = Registry::obtener_instancia();
		$this->cnMySQL = $this->registry->conexion;
		$this->modelo = $this->loadModel('tablas_rod');	
	}

	
	function index()
	{
		$this->view->setJs(array('JqGrid'));
		$this->view->rendering('tablas_rod');
	}
	
	
	function DataTables()
	{
		$this->view->setJs(array('dataTable'));
		$this->view->rendering('DataTables');
	}
	
	
	public function obtener_consulta_solicitud()
	{
		$params=array('operacion'=>'obtener_consulta_solicitud');
		$respuesta= $this->modelo->consultas($params);
		echo json_encode($respuesta);
	}
	
	
	public function consulta_js()
	{
		$params=array('operacion'=>'consultas_jqGrid');
		$respuesta= $this->modelo->consultas_jq($params);
		echo json_encode($respuesta);
		
	}
	
	
	public function edit_jqgrid(){
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
		$params=array('operacion'=>$operacion,'datos'=>$datos,'fotografia'=>$ruta);	
		}
		$respuesta= $this->modelo->crudData($params);
		echo json_encode($respuesta);
	}
}
?>