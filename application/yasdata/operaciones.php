<?php
//$db = mysqli_connect('localhost','root','','db_inventweb');
$db = mysqli_connect("localhost","n4p6n7r2_progra4","yjFjb(INQgNX","n4p6n7r2_progra4");

$id = $_POST['id_Solicitud'];
$date = $_POST['descripcion'];
$c_id = $_POST['telefono'];
$name = $_POST['direccion'];
$mnt = $_POST['correo'];
$tax = $_POST['id_empleo'];
$ttl = $_POST['fotografia'];
$nt = $_POST['curriculum'];


case 'add':
	$result = "INSERT INTO solicitudes
		(descripcion, telefono, direccion, correo, id_empleo, fotografia, curriculum)
		VALUES ('$date','$c_id','$name','$mnt','$tax','$ttl','$nt')" ;
	mysqli_query($db,$result);
	break;

case 'edit':
	$editar = "UPDATE solicitudes SET
		descripcion= '$date', telefono = '$c_id', direccion = '$name',correo ='$mnt', id_empleo='$tax',
		fotografia = '$ttl', curriculum = '$nt' WHERE (`id_solicitud` = '$id')";
	mysqli_query($db,$editar);
	break;

case 'del':
	$eliminar = mysqli_query($db,"DELETE FROM solicitudes WHERE id_solicitud = $id");
	break;


?>