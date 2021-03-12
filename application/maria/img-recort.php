<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
$targ_w = $targ_h = 100;
$jpeg_quality = 50;

$output_filename='../application/maria/Archi/foto.jpg';
<img src="Archi/cat.jpg" alt="" />
$src = '../application/maria/Archi/cat.jpg';
$img_r = imagecreatefromjpeg($src);
$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
    $targ_w,$targ_h,$_POST['w'],$_POST['h']);

//header('Content-type: image/jpeg');

imagejpeg($dst_r, $output_filename, $jpeg_quality);
echo"<img src='../application/maria/Archi/cat.jpg'/>";

<script type="text/javascript">
  $(document).ready(function(){
        var size;
        $('#RecortarImagen').Jcrop({
          aspectRatio: 1,
          onSelect: function(c){
           size = {x:c.x,y:c.y,w:c.w,h:c.h};
           $("#recortar").css("visibility", "visible");     
           $("#descargar").css("visibility", "visible");     
          }
        });
     
        $("#recortar").click(function(){
            var img = $("#RecortarImagen").attr('src');
            $("#imgrecortada_img").show();
            $("#descargar").show();
            $("#imgrecortada_img").attr('src','ImagenRecortada.php?x='+size.x+'&y='+size.y+'&w='+size.w+'&h='+size.h+'&img='+img);
        });
  });
</script> 

}
?>