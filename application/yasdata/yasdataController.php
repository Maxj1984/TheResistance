<?php
class yasdataController extends Controller
{

	function __construct()
	{
		parent::__construct();
		$this->registry = Registry::obtener_instancia();
		$this->cnMySQL = $this->registry->conexion;
		$this->modelo = $this->loadModel('yasdata');	
	}

	
	function index()
	{
		$this->view->setJs(array('jq'));
		$this->view->rendering('Jqgrid');
	}
	
	
	function DataTable()
	{
		$this->view->setJs(array('dt'));
		$this->view->rendering('DataTable');
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