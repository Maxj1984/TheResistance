<?php
class departamentoModel extends Model{
	function __construct(){
		parent::__construct();
		$this->tabla='sys_departamento';
		$this->id_tabla='id_departamento';
	}
	
	public function generar_sql($parametros){
		try{
			
			if ($parametros['operacion']=='obtener_datos_departamento')
			{
				$sql  = "select * from $this->tabla where $this->id_tabla=".$parametros['id_departamento'];
				
			}	
			
			if($parametros['operacion']=='obtener_consulta_depto'){
				
				$sql = "select id_departamento, descripcion, estado_registro from $this->tabla";
			}
						
				return $sql;
		}
		catch (Exception $e) 
		{
			echo $e->getMessage();
		}
	}
}

?>