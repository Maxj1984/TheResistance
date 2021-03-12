<?php
class productosController extends Controller {
	function __construct() {
		parent::__construct();
		$this->registry = Registry::obtener_instancia();
		$this->modelo = $this->loadModel('productos');
		
	}
	
	function index() {
		$this->view->setJs(array('productos'));
		$this->view->rendering('productos');
	}
	
	function subirimagen() {
		$this->view->setJs(array('subirimagen'));
		$this->view->rendering('subirimagen');
	}
	
	function datatable()
	{
		$this->view->setJs(array('datatable'));
		$this->view->rendering('datatable');
	}
	
	
	
	public function obtener_consulta_solicitud()
	{
		$params=array('operacion'=>'obtener_consulta_solicitud');
		$respuesta= $this->modelo->consultas($params);
		echo json_encode($respuesta);
	}
	
	public function obtener_datos_productos(){
		$params=array('operacion'=>'obtener_datos_productos');
		$respuesta=$this->modelo->consultas($params);
		echo json_encode($respuesta);
	}
	
	function grids()
	{
		$this->view->setJs(array('grids'));
		$this->view->rendering('grids');
	}
	
	function categoria()
	{
		$this->view->setJs(array('categoria'));
		$this->view->rendering('categoria');
	}
	
	public function consulta_js()
	{
		$params=array('operacion'=>'consultas_jqGrid');
		$respuesta= $this->modelo->consultas_jq($params);
		echo json_encode($respuesta);
		
	}
	
	public function consulta_js2()
	{
		$params=array('operacion'=>'consultas_jqGrid2');
		$respuesta= $this->modelo->consultas_jq2($params);
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
	
	
	/* funcion para edicion de JqGrid*/
	public function edit_cat(){
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
		$respuesta= $this->modelo->crudCategory($params);
	}
	
	public function cargarArchivo(){
		$fileobj=$_POST['objArchivo'];
		$id=$_POST['id'];
		
		//carpeta temporal que almacena la imagen
		/*$nombre_archivo1 =$_FILES[$fileobj]['name'];
		$tempFile = $_FILES[$fileobj]['tmp_name'];
		$targetPath = "productos/fotos/";
		$targetFile = $targetPath.$nombre_archivo1;
		
		$subido = move_uploaded_file($tempFile,$targetFile);
		
		if($subido){
		$response=json_encode(array('uploaded'=>'OK'));
			
		echo $response;
		
		}
		else{
			echo "no subido";
		}*/
		
		$archivo = $_FILES[$fileobj]['tmp_name'];
$nombre = $_FILES[$fileobj]['name'];
$tipo = $_FILES[$fileobj]['type'];
$Size = $_FILES[$fileobj]['size'];

$destino = "productos/fotos/".$nombre;

$subido = move_uploaded_file($archivo,$destino);

if($subido)
{
	echo "Subido exitosamente <br/>";
	echo "<img src='productos/fotos/".$nombre."'>";
	}else{
		echo "Archivo no subido exitosamente <br/>";
	}
		
		
	}
	
	
}

?>