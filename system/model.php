<?php
class Model {
	protected $registry;
	protected $cnMySQL;
	public $tabla;
	public $id_tabla;
	
	function __construct() {
		$this->registry = Registry::obtener_instancia();
		$this->cnMySQL = $this->registry->conexion;
	}
	
	public function crudData($parametros)
	{
		try
		{
			$i=0;
			if ($parametros['operacion']=='add')
			{
				$sql  = "insert into $this->tabla (";
				foreach ($parametros['datos'] as $clave => $valor)
				{
					if ($i==0)
					{
						$sql .= "$clave";
					}
					else
					{
						$sql .= ",$clave";
					}
					$i=1;
				}
				$sql .= ") values (";
				$i=0;
				foreach ($parametros['datos'] as $clave => $valor)
				{
					if ($i==0)
					{
						$sql .= ":$clave";
					}
					else
					{
						$sql .= ",:$clave";
					}
					$i=1;
				}
				$sql .= ")";
			}

			if ($parametros['operacion']=='edit')
			{
				$i=0;
				$sql  = "update $this->tabla set ";
				foreach ($parametros['datos'] as $clave => $valor)
				{
					if ($i==0)
					{
						$sql .= "$clave=:$clave";
					}
					else
					{
						$sql .= ",$clave=:$clave";
					}
					$i=1;

				}
				$sql .= " where $this->id_tabla = :id";
			}

			if ($parametros['operacion']=='del')
			{
				$sql  = "update $this->tabla set ";
				$sql .= " estado_registro='B'";
				$sql .= " where $this->id_tabla = :id";
			}

			if ($parametros['operacion']=='delr')
			{
				$sql  = "delete from $this->tabla ";
				$sql .= " where $this->id_tabla = :id";
			}


			$sth = $this->cnMySQL->prepare($sql);

			if ($parametros['operacion']=='edit' || $parametros['operacion']=='del' || $parametros['operacion']=='delr')
			{
				$sth->bindValue(':id', $parametros['id'], PDO::PARAM_INT);
			}

			if ($parametros['operacion']=='edit' || $parametros['operacion']=='add')
			{
				foreach ($parametros['datos'] as $clave => $valor)
				{
					$sth->bindValue(":$clave",$valor,PDO::PARAM_STR);
				}
			}

			$getinfo = $sth->execute();
			$error = $sth->errorInfo();
			$response=array();
			if ($error[0]=='00000')
			{
				$response['estado']='ok';
				switch ($parametros['operacion']) {
					case 'add':
						if (!isset($parametros['datos']['descripcion']))
						{
							$parametros['datos']['descripcion']='descripcion';
						}
						$id = $this->cnMySQL->lastInsertId();
						$response['id']=$id;
						$response['descripcion']=$parametros['datos']['descripcion'];
						$response['datos']=$id;
						$response['mensaje']='Operacion de Adición ejecutada exitosamente.';
						break;
					case 'edit':
						$response['mensaje']='Operacion de Modificación ejecutada exitosamente.';
						break;
					case 'eliminarSolicitud':
						$response['mensaje']='Operacion de Eliminacion ejecutada exitosamente.';
						break;
					default:
						$registros = $sth->fetchall(PDO::FETCH_ASSOC);
						$response['datos']=$registros;
						break;
				}
			}
			else
			{
				if ($error[2]==NULL)
				{
					$response['estado']='error';
					$response['mensaje']='No se devolvieron datos.';
				}
				else
				{
					$response['estado']='error';
					$response['mensaje']=$error[2];
					$response['descripcion']=$error[2];
				}
			}
			return $response;
		}
		catch (\Exception $e)
		{
			echo get_class($e), ": ", $e->getMessage(), "<br>";
			echo " File=", $e->getFile(), "<br>";
			echo " Line=", $e->getLine(), "<br>";
			echo '<pre>'.$e->getTraceAsString();
		}
	}	
	
	public function generar_sql($parametros){}
	
	
	public function consultas($parametros){
		try{
			
			$sql = $this->generar_sql($parametros);
			
			
		if($parametros['operacion']=='consulta_solicitud')
		{
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
		}else
		{
				
			$stmt = $this->cnMySQL->prepare($sql);
		
			
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
		}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}	
	
	
	
	
	
}


?>