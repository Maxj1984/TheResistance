<?php
class productosModel extends Model{
	function __construct(){
		parent::__construct();
		$this->tabla='opr_producto';
		$this->id_tabla='id_producto';
		$this->tabla2='opr_tipo_producto';
		$this->id_tabla2='id_tipo_producto';
	}
	
	public function generar_sql($parametros){
		try{
			
			if ($parametros['operacion']=='obtener_datos_productos')
			{
				$sql  = "select *,b.descripcion as tipo, a.descripcion as descrip_prod,a.estado_registro as estado from $this->tabla as a join opr_tipo_producto as b on a.id_tipo_producto = b.id_tipo_producto";
			}	
			if($parametros['operacion']=='obtener_consulta_solicitud')
			{
				
				$sql  = "select *,b.descripcion as tipo, a.descripcion as descrip_prod,a.estado_registro as estado from $this->tabla as a join opr_tipo_producto as b on a.id_tipo_producto = b.id_tipo_producto";
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
			$sql  = "select *,a.descripcion as desc_pro, b.descripcion as tipo, a.estado_registro as estado from $this->tabla as a join $this->tabla2 as b on a.id_tipo_producto = b.id_tipo_producto";
			$i=0;
			$stmt = $this->cnMySQL->prepare($sql);
			$stmt->execute();
			foreach($stmt as $row){
				$respuesta->rows[$i]['id']=$row['id_producto'];
				$respuesta->rows[$i]['cell']=array($row['id_producto'], $row['fecha'], $row['desc_pro'], $row['id_tipo_producto']
				, $row['tipo'], $row['clasificacion'], $row['destacado'], $row['foto'], $row['precio'], $row['estado']
				);
				$i++;
			}
			return $respuesta;
		}
	}
	
	public function consultas_jq2($parametros)
	{
		
			
		if($parametros['operacion']=='consultas_jqGrid2')
		{
			$sql  = "select * from $this->tabla2";
			$i=0;
			$stmt = $this->cnMySQL->prepare($sql);
			$stmt->execute();
			foreach($stmt as $row){
				$respuesta->rows[$i]['id']=$row['id_tipo_producto'];
				$respuesta->rows[$i]['cell']=array($row['id_tipo_producto'],$row['descripcion'], $row['estado_registro']
				);
				$i++;
			}
			return $respuesta;
		}
	}
	
	public function crudData2($parametros){
		try{
			if ($parametros['operacion']=='actualizaArchivoImagen')
			{
				$sql = "update $this->tabla set foto = :fileId where $this->id_tabla=:id";
			}	
					
			$stmt = $this->cnMySQL->prepare($sql);

			
			if ($parametros['operacion']=='actualizaArchivoImagen' )
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
				
					case 'actualizaArchivoImagen':
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
	
	
	
	//mantenimiento de categorias
	
	public function crudCategory($parametros){
		try{
			if ($parametros['operacion']=='add')
			{
				$sql  = "insert into $this->tabla2 (";
				$sql .= " descripcion";
				$sql .= ",estado_registro";
				$sql .= ") values (";
				$sql .= " :descripcion";
				$sql .= ",:estado_registro";
				$sql .= ")";
				//echo $sql;
			}
			
			if ($parametros['operacion']=='edit')
			{
				$sql  = " update $this->tabla2 set";
				$sql .= " descripcion=:descripcion";
				$sql .= ",estado_registro=:estado_registro";
				$sql .= " where $this->id_tabla2=:id";
			}	
			
			if ($parametros['operacion']=='del')
			{
				$sql  = "delete from $this->tabla";
				$sql .= " where $this->id_tabla2 = :id";
				
			}
			
			$stmt = $this->cnMySQL->prepare($sql);

			if ($parametros['operacion']=='add' || $parametros ['operacion']=='edit')
			{
				$stmt->bindParam(':descripcion',$parametros['datos']['descripcion'],PDO::PARAM_STR);
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
	
	
}
?>