<?php
class gridsModel extends Model{
	function __construct(){
		parent::__construct();
		$this->tabla='solicitudes';
		$this->id_tabla='id_solicitud';
	}
	
	public function generar_sql($parametros){
		try{
						
			if($parametros['operacion']=='obtener_consulta_solicitud')
			{
				
				$sql = "select id_solicitud, descripcion, telefono, direccion, correo, 
				id_empleo, fotografia, curriculum, estado_registro from $this->tabla";
			}
			
			/*solamente para ejecutar la consulta del JqGrid, en el model se tiene la otra condicion para generar los Rows */
			if($parametros['operacion']=='consulta_solicitud')
			{
				$sql = "select id_solicitud, descripcion, telefono, direccion, correo, 
				id_empleo, fotografia, curriculum, estado_registro from $this->tabla";
				/*$sql = "select sol.id_solicitud, sol.descripcion, sol.telefono,
				 sol.direccion, sol.correo, sol.id_empleo, emp.descripcion_emp, sol.fotografia, 
				 sol.curriculum, sol.estado_registro
				from solicitudes sol  JOIN empleo emp ON sol.id_empleo = emp.id_empleo";*/
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