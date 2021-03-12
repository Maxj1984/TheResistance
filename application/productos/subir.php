<?php

$archivo = $_FILES['archivo']['tmp_name'];
$nombre = $_FILES['archivo']['name'];
$tipo = $_FILES['archivo']['type'];
$Size = $_FILES['archivo']['size'];

$destino = "productos/fotos/".$nombre;

$subido = move_uploaded_file($archivo,$destino);

if($subido)
{
	echo "Subido exitosamente <br/>";
	echo "<img src='productos/fotos/".$nombre."'>";
	}else{
		echo "Archivo no subido exitosamente <br/>";
	}

?>