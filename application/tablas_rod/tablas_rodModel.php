<?php
class tablas_rodModel extends Model{
	function __construct(){
		parent::__construct();
		$this->tabla='solicitudes';
		$this->id_tabla='id_solicitud';
	}
	
	public function generar_sql($parametros)
	{
		try{
						
			if($parametros['operacion']=='obtener_consulta_solicitud')
			{
				
				$sql = "select id_solicitud, descripcion, telefono, direccion, correo, 
				id_empleo, fotografia, curriculum, estado_registro from $this->tabla";
			}			
				return $sql;
		}
		catch (Exception $e) 
		{
			echo $e->getMessage();
		}
	}
	
	public function consultas_jq($parametros)
	{
		
			
		if($parametros['operacion']=='consultas_jqGrid')
		{
			$sql = "select id_solicitud, descripcion, telefono, direccion, correo, 
				id_empleo, fotografia, curriculum, estado_registro from $this->tabla";	
			$i=0;
			$stmt = $this->cnMySQL->prepare($sql);
			$stmt->execute();
			foreach($stmt as $row){
				$respuesta->rows[$i]['id']=$row['id_solicitud'];
				$respuesta->rows[$i]['cell']=array($row['id_solicitud'], $row['descripcion'], $row['telefono']
				, $row['direccion'], $row['correo'], $row['id_empleo']
				, $row['fotografia'], $row['curriculum'], $row['estado_registro']
				);
				$i++;
			}
			return $respuesta;
		}
	}	
	
		
	
}

?>