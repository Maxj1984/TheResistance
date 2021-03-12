<?php

try{

	$bd = new PDO("mysql:host=localhost;dbname=db_inventweb; charset=utf8","web","inventW3b");
	//$bd = new PDO("mysql:host=localhost;dbname=n4p6n7r2_progra4; charset=utf8","n4p6n7r2_progra4","yjFjb(INQgNX");
}
catch(PDOException $e) {
    echo $e->getMessage();
}
$respuesta = $bd->prepare("select * from empleo ORDER BY id_empleo");
	
	$respuesta->execute();
	//estas variables van a almacenar la cadena de cada columna
	$json =[];
	$json2 =[];
	
	
	while ($row = $respuesta->fetch(PDO::FETCH_ASSOC)) {
		extract($row);	
		$json[]= $descripcion_emp;
		$json2[]=(int)$total;
		
		
}




?>
<script src="layout/admin/plugins/jquery/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-1.12.4.js"> </script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"> </script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
		<script src="layout/admin/js/Chart.min.js"></script>
		
<div class="card card-info">
		    <div class="card-header">
		        <h3 class="card-title">Empleos más solicitados</h3>
		    </div>
		    
		    <div class="card-body">
		        <canvas id="pieChart" style="min-height: 250px; height: 250px; 
		        max-height: 250px; max-width: 100%;"></canvas>
		    </div>
		</div>
	
<script>$(function () {
	
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    
    var pieData        = {
      labels: <?php echo json_encode($json); ?>,
      datasets: [{
      data: <?php echo json_encode($json2);?>, 
      backgroundColor :
       ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc'],}]}
    
    var pieOptions     = {maintainAspectRatio : false, responsive : true, }
    
    var pieChart = 
    new Chart(pieChartCanvas, {type: 'bar', data: pieData,options: pieOptions})
    
})</script>