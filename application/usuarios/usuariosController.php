<?php
class usuariosController extends Controller{
	public $registry;
	public $cnMySQL;
	
	
	function __construct() {
		parent::__construct();
		$this->registry = Registry::obtener_instancia();
		$this->cnMySQL = $this->registry->conexion;
		$this->modelo = $this->loadModel('usuarios');
		
	}	
	
	function index(){
		$this->view->setJs(array('usuarios'));		
		$this->view->rendering('usuarios');
		
	}
	
	function ver_usuario($parametro1,$parametro2){
		echo "Este es el método de ver usuario de la clase usuariosController<br>";
		echo $parametro1+$parametro2;
	}
	
	public function ver_tabla(){
		$this->registry = Registry::obtener_instancia();
		$this->cnMySQL = $this->registry->conexion;
		$sql = "select * from sys_usuario";
		$stmt = $this->cnMySQL->prepare($sql);
		$stmt->execute();
		$error = $stmt->errorInfo();
		if ($error[0]==='00000')
		{
			$registros = $stmt->fetchall(PDO::FETCH_ASSOC);
			echo json_encode($registros);
		}
	}
	
	public function insertar_datos(){
		$datos=$_POST['datos'];
		$params=array('operacion'=>'add','datos'=>$datos);
		$respuesta= $this->modelo->crudData[$params];
		echo json_encode($respuesta);
	}
	
	public function ingresar_usuario()
	{
		$datos=$_POST;
		$datos['estado_registro']='A';
		$params=array('operacion'=>'add','datos'=>$datos);
		$respuesta= $this->modelo->crudData($params);
		echo json_encode($respuesta);
	}	
	
	public function modificar_usuario(){
		$this->view->setJs(array('modificar_usuario'));
		$this->view->rendering('modificar_usuario');
	}
	
	public function obtener_datos_usuario(){
		$id_usuario=$_POST['id_usuario'];
		$params=array('operacion'=>'obtener_datos_usuario','id_usuario'=>$id_usuario);
		$respuesta=$this->modelo->consultas($params);
		echo json_encode($respuesta);
	}
	
	public function modificar_datos_usuario()
	{
		$datos=$_POST;
		$datos['estado_registro']='A';
		$params=array('operacion'=>$datos['oper'],'datos'=>$datos,'id'=>$datos['id']);
		$respuesta= $this->modelo->crudData($params);
		echo json_encode($respuesta);
	}	
	
	public function eliminar_usuario(){
		$this->view->setJs(array('eliminar_usuario'));
		$this->view->rendering('eliminar_usuario');
	}
	
	public function eliminar_datos_usuario()
	{
		$datos=$_POST;
		$params=array('operacion'=>$datos['oper'],'id'=>$datos['id']);
		$respuesta= $this->modelo->crudData($params);
		echo json_encode($respuesta);
	}	
	
	public function consulta_usuario(){
		$this->view->setJs(array('consulta_usuario'));
		$this->view->rendering('consulta_usuario');
	}
	
	public function obtener_consulta_usuario()
	{
		$params=array('operacion'=>'obtener_consulta_usuario');
		$respuesta= $this->modelo->consultas($params);
		echo json_encode($respuesta);
	}	
	
	public function tabla(){
		
		$this->view->rendering('tabla');
	}
	
}
?>