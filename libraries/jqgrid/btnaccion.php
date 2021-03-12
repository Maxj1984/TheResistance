<?php
$db = mysqli_connect('localhost','web','inventW3b','db_inventweb');



$id = $_POST['id'];
$date = $_POST['invdate'];
$c_id = $_POST['client_id'];
$name = $_POST['invname'];
$mnt = $_POST['amount'];
$tax = $_POST['tax'];
$ttl = $_POST['total'];
$nt = $_POST['note'];

switch ($_POST['oper']) {
	case 'refresh':
		$actualizar = mysqli_query( $db,"SELECT invid, invdate, client_id, invname, 
		amount,tax,total,note FROM invheader ORDER BY invid" ) 
		or die("Couldn t execute query.".mysqli_error($db));
		
		$i=0;
		while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) 
		{
		$responce->rows[$i]['id']=$row["invid"];
		$responce->rows[$i]['cell']=array($row["invid"],$row["invdate"],$row["client_id"],
		$row["invname"],$row["amount"],$row["tax"],$row["total"],$row["note"]);
		$i++;
		}
		echo json_encode($responce);
	
		break;
	
	case 'add':
		$result = "INSERT INTO invheader
		(invdate, client_id, invname, amount, tax, total, note) 
		VALUES ($date,$c_id,'$name',$mnt,$tax,$ttl,'$nt')" ;
		mysqli_query($db,$result);
		break;
		
	case 'edit':
		$editar = "UPDATE invheader SET
		invdate= $date, client_id = $c_id, invname = '$name',amount =$mnt,tax=$tax,
		total = $ttl, note = '$nt' WHERE (`invid` = $id)";
		mysqli_query($db,$editar);
		break;
		
	case 'del':
		$eliminar = mysqli_query($db,"DELETE FROM invheader WHERE invid = $id");
		break;
}



?>