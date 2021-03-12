<?php
class usuariosModel extends Model {
	function __construct() {
		parent::__construct();
		$this->tabla = "sys_usuario";
		$this->id_tabla = "id_usuario";
	}
	
	public function consultas($parametros){
		try{
			
			if ($parametros['operacion']=='obtener_datos_usuario')
			{
				$sql  = 'select * from sys_usuario where id_usuario=:id_usuario';
				
			}
			
			if($parametros['operacion']=='obtener_consulta_usuario'){
				
				$sql = "select id_usuario, descripcion, usuario, estado_registro from $this->tabla";
			}
			
			$stmt = $this->cnMySQL->prepare($sql);
		
			if ($parametros['operacion']=='obtener_datos_usuario')
			{
				$stmt->bindParam(':id_usuario',$parametros['id_usuario'],PDO::PARAM_INT);
			}

			$respuesta=$stmt->execute();
			$error = $stmt->errorInfo();

			if ($error[0]=='00000')
			{
				$resultado['status']='ok';
				$resultado['message']='';
				$resultado['datos']=$stmt->fetchall(PDO::FETCH_ASSOC);
				
				return $resultado;
			}
			else
			{
				$resultado['status']='error';
				$resultado['message']=$error[2];
				$resultado['datos']='';
				return $resultado;
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	
	public function crudData($parametros){
		try{
			if ($parametros['operacion']=='add')
			{
				$sql  = "insert into $this->tabla (";
				$sql .= " descripcion";
				$sql .= ",usuario";
				$sql .= ",clave";
				$sql .= ",estado_registro";
				$sql .= ") values (";
				$sql .= " :descripcion";
				$sql .= ",:usuario";
				$sql .= ",:clave";
				$sql .= ",:estado_registro";
				$sql .= ")";
				//echo $sql;
			}
			
			if ($parametros['operacion']=='edit')
			{
				$sql  = " update $this->tabla set";
				$sql .= " descripcion=:descripcion";
				$sql .= ",usuario=:usuario";
				$sql .= ",clave=:clave";
				$sql .= ",estado_registro=:estado_registro";
				$sql .= " where $this->id_tabla=:id";
			}	
			
			if ($parametros['operacion']=='del')
			{
				$sql  = "delete from $this->tabla";
				$sql .= " where $this->id_tabla = :id";
				
			}
			
			$stmt = $this->cnMySQL->prepare($sql);

			if ($parametros['operacion']=='add' || $parametros ['operacion']=='edit')
			{
				$stmt->bindParam(':descripcion',$parametros['datos']['descripcion'],PDO::PARAM_STR);
				$stmt->bindParam(':usuario',$parametros['datos']['usuario'],PDO::PARAM_STR);
				$stmt->bindParam(':clave',$parametros['datos']['clave'],PDO::PARAM_STR);
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
	
	//ddd
}
?>