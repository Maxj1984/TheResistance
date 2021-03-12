<?php
//ejecuta la conexion a la base de datos local
$db = mysqli_connect('localhost','web','inventW3b','db_inventweb');

/*ejecut la consulta a la tabla en mi base de datos, llamando los 
encabezados de mis columnas, ordenandolos por el Key */

$result = mysqli_query( $db,"SELECT invid, invdate, client_id, invname, amount,tax,total,note FROM invheader ORDER BY invid" ) or die("Couldn t execute query.".mysqli_error($db));

$i=0;
while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
	$responce->rows[$i]['id']=$row["invid"];
	$responce->rows[$i]['cell']=array($row["invid"],$row["invdate"],$row["client_id"],$row["invname"],$row["amount"],$row["tax"],$row["total"],$row["note"]);
	$i++;
}
echo json_encode($responce);




?>