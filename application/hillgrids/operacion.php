<?php
switch ($_POST['action']) {
	case 'refresh':
		$actualizar = mysqli_query( $db,"SELECT id_solicitud, descripcion, telefono, direccion, correo, id_empleo,estado_registro
			FROM solicitudes ORDER BY id_solicitud" ) 
		or die("Fallo al conectar.".mysqli_error($db));
		
		$i=0;
		while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) 
		{
		$response->rows[$i]['id']=$row["id_solicitud"];
		$response->rows[$i]['cell']=array($row["id_solicitud"],$row["descripcion"],$row["telefono"],$row["direccion"],$row["correo"], $row["id_empleo"],$row["estado_registro"]);
		$i++;
		}
		echo json_encode($response);
	
		break;
	
	case 'add':
		$result = "INSERT INTO solicitudes(id_solicitud, descripcion, telefono, direccion, correo, id_empleo,estado_registro) VALUES ('$id_solicitud','$descripcion','$telefono','$direccion','$correo','$id_empleo','$estado_registro')" ;
		mysqli_query($db,$result);
		break;
		
	case 'edit':
		$editar = "UPDATE solicitudes SET id_solicitud= '$id_solicitud', descripcion = '$descripcion', telefono = '$telefono',direccion ='$direccion',correo='$correo',id_empleo ='$id_empleo', estado_registro = '$estado_registro' WHERE (`id_solicitud` = $id_solicitud)";
		mysqli_query($db,$editar);
		break;
		
	case 'del':
		$eliminar = mysqli_query($db,"DELETE FROM solicitudes WHERE id_solicitud = $id_solicitud");
		break;
}
?>