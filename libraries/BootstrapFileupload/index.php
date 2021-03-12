<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8"/>
    <title>Bootstrap File Upload</title>
        
	<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
       
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/fileinput.min.js" type="text/javascript"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js" type="text/javascript"></script>
    
	</head>
    
	<body>

	<input id="archivos" name="imagenes[]" type="file" multiple=true class="file-loading">
	</body>
	<?php 	
	$directory = "imagenes_/";      
	$images = glob($directory . "*.*");
	?>
	
	<script>
	$("#archivos").fileinput({
	uploadUrl: "upload.php", 
    uploadAsync: true,
    minFileCount: 1,
    maxFileCount: 20,
	showUpload: true, 
	showRemove: false,
	initialPreview: [
	],
    initialPreviewConfig: [<?php foreach($images as $image){ $infoImagenes=explode("/",$image);?>
	{caption: "<?php echo $infoImagenes[1];?>",  height: "120px", url: "borrar.php", key:"<?php echo $infoImagenes[1];?>"},
	<?php } ?>]
	});
	
	</script>
</html>