<?php
class gridsController extends Controller
{

	function __construct()
	{
		parent::__construct();
		$this->registry = Registry::obtener_instancia();
		$this->cnMySQL = $this->registry->conexion;
		$this->modelo = $this->loadModel('grids');	
	}

	/* vista para el formulario de JqGrid	*/
	function index()
	{
		$this->view->setJs(array('grids'));
		$this->view->rendering('grids');
	}
	
	/* vista para el formulario de DataTable	*/
	function datatable()
	{
		$this->view->setJs(array('datatable'));
		$this->view->rendering('datatable');
	}
	
	/* funcion para obtener datos para DataTable	*/
	public function obtener_consulta_solicitud()
	{
		$params=array('operacion'=>'obtener_consulta_solicitud');
		$respuesta= $this->modelo->consultas($params);
		echo json_encode($respuesta);
	}
	
	/* funcion para obtener datos para JqGrid*/
	public function consulta_solicitud()
	{
		$params=array('operacion'=>'consulta_solicitud');
		$respuesta= $this->modelo->consultas($params);
		echo json_encode($respuesta);
		
	}
	
	/* funcion para edicion de JqGrid*/
	public function edit_grid(){
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
	
	
	public function cargarArchivo($tipo){
		$fileobj=$_POST['objArchivo'];
		
	}
	
}
?>