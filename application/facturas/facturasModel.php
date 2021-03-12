<?php
class facturasModel extends Model{
	function __construct(){
		parent::__construct();
		$this->tabla='opr_factura';
		$this->id_tabla='id_factura';
		$this->tablaC='opr_clientes';
		$this->id_tablaC='id_cliente';
		$this->tablaP='opr_producto';
		$this->id_tablaP='id_producto';
	}
	
	
	//para mantenimiento de clientes en JqGrid
	public function consultas_clientes($parametros){
		
			
		if($parametros['operacion']=='consulta_clientes')
		{
			$sql  = "select * from $this->tablaC";
			$i=0;
			$stmt = $this->cnMySQL->prepare($sql);
			$stmt->execute();
			foreach($stmt as $row){
				$respuesta->rows[$i]['id']=$row['id_cliente'];
				$respuesta->rows[$i]['cell']=array($row['id_cliente'], $row['descripcion_cliente']
				, $row['direccion'], $row['nit_cliente'], $row['estado_registro']
				);
				$i++;
			}
			return $respuesta;
		}
	}
	
	
	///
	public function crudClient($parametros){
		try{
			if ($parametros['operacion']=='add')
			{
				$sql  = "insert into $this->tablaC (";
				$sql .= " descripcion_cliente";
				$sql .= ",direccion";
				$sql .= ",nit_cliente";
				$sql .= ",estado_registro";
				$sql .= ") values (";
				$sql .= " :descripcion_cliente";
				$sql .= ",:direccion";
				$sql .= ",:nit_cliente";
				$sql .= ",:estado_registro";
				$sql .= ")";
				//echo $sql;
			}
			
			if ($parametros['operacion']=='edit')
			{
				$sql  = " update $this->tablaC set";
				$sql .= " descripcion_cliente=:descripcion_cliente";
				$sql .= ",direccion=:direccion";
				$sql .= ",nit_cliente=:nit_cliente";
				$sql .= ",estado_registro=:estado_registro";
				$sql .= " where $this->id_tablaC=:id";
			}	
			
			if ($parametros['operacion']=='del')
			{
				$sql  = "update $this->tablaC set ";
				$sql .= " estado_registro='B'";
				$sql .= " where $this->id_tablaC = :id";
				
			}
			
			$stmt = $this->cnMySQL->prepare($sql);

			if ($parametros['operacion']=='add' || $parametros ['operacion']=='edit')
			{
				$stmt->bindParam(':descripcion_cliente',$parametros['datos']['descripcion_cliente'],PDO::PARAM_STR);
				$stmt->bindParam(':direccion',$parametros['datos']['direccion'],PDO::PARAM_STR);
				$stmt->bindParam(':nit_cliente',$parametros['datos']['nit_cliente'],PDO::PARAM_STR);
				$stmt->bindParam(':estado_registro',$parametros['datos']['estado_registro'],PDO::PARAM_STR);
			}
			
			if ($parametros['operacion']=='edit' || $parametros['operacion']=='del')
			{
				$stmt->bindParam(':id',$parametros['id'],PDO::PARAM_INT);
			}

			$respuesta=$stmt->execute();
			$error = $stmt->errorInfo();

			if ($error[0]=='00000')
			{
				$resultado['status']='ok';
				switch ($parametros['operacion']) 
				{
					case 'add':
					$resultado['message']='Se grabo la informacion correctamente';
					break;
				
					case 'edit':
					$resultado['message']='Se actualizo la informacion correctamente';
					break;
				
					case 'del':
					$resultado['message']='Se elimino la informacion correctamente';
					break;
				}
				return $resultado;
			}
			else
			{
				throw new Exception('Ocurrio un error en la base de datos: '.$error[2]);
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	
	
	
	//para el CRUD de la vista de facturas
	
	
	public function generar_sql($parametros){
		try{
			
			if ($parametros['operacion']=='obtener_datos_cliente')
			{
				$sql  = "select * from $this->tablaC where $this->id_tablaC=".$parametros['id_cliente'];
				
			}	
			
			if ($parametros['operacion']=='obtener_datos_producto')
			{
				$sql  = "select * from $this->tablaP where $this->id_tablaP=".$parametros['id_producto'];
				
			}	
			
			if($parametros['operacion']=='obtener_consulta_cliente'){
				
				$sql = "select * from $this->tablaC";
			}
						
				return $sql;
		}
		catch (Exception $e) 
		{
			echo $e->getMessage();
		}
	}
	
	public function crudFact($parametros){
		try{
			if ($parametros['operacion']=='add')
			{
				$sql  = "insert into $this->tabla (";
				$sql .= " id_cliente";
				$sql .= ",fecha";
				$sql .= ",total";
				$sql .= ") values (";
				$sql .= " :id_cliente";
				$sql .= ",:fecha";
				$sql .= ",:total";
				$sql .= ")";
				//echo $sql;
			}
			
			if ($parametros['operacion']=='edit')
			{
				$sql  = " update $this->tabla set";
				$sql .= " id_cliente=:id_cliente";
				$sql .= ",fecha=:fecha";
				$sql .= ",total=:total";
				$sql .= " where $this->id_tabla=:id";
			}	
			
			if ($parametros['operacion']=='del')
			{
				/*$sql  = "delete from $this->tabla";
				$sql .= " where $this->id_tabla = :id";*/
				
				$sql  = "update $this->tabla set ";
				$sql .= " estado_registro='B'";
				$sql .= " where $this->id_tabla = :id";
				
			}
			
			$stmt = $this->cnMySQL->prepare($sql);

			if ($parametros['operacion']=='add' || $parametros ['operacion']=='edit')
			{
				$stmt->bindParam(':id_cliente',$parametros['datos']['id_cliente'],PDO::PARAM_STR);
				$stmt->bindParam(':fecha',$parametros['datos']['fecha'],PDO::PARAM_STR);
				$stmt->bindParam(':total',$parametros['datos']['total'],PDO::PARAM_STR);
			}
			
			if ($parametros['operacion']=='edit' || $parametros['operacion']=='del')
			{
				$stmt->bindParam(':id',$parametros['id'],PDO::PARAM_INT);
			}

			$respuesta=$stmt->execute();
			$error = $stmt->errorInfo();

			if ($error[0]=='00000')
			{
				$resultado['status']='ok';
				switch ($parametros['operacion']) 
				{
					case 'add':
					$resultado['message']='Se grabo la informacion correctamente';
					break;
				
					case 'edit':
					$resultado['message']='Se actualizo la informacion correctamente';
					break;
				
					case 'del':
					$resultado['message']='Se elimino la informacion correctamente';
					break;
				}
				return $resultado;
			}
			else
			{
				throw new Exception('Ocurrio un error en la base de datos: '.$error[2]);
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
}
?>