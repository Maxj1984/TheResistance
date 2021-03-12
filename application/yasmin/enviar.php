<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['enviar'])){
$nombre= $_POST['nombre'];
$correo= $_POST['correo'];
$direccion= $_POST['direccion'];
$numero= $_POST['numero'];
$Vacante= $_POST['Vacante'];

$file_temp = $_FILES['cv']['tmp_name'];
$archivo = $_FILES['cv']['name'];
$ext = pathinfo($archivo, PATHINFO_EXTENSION);

$foto = $_FILES['imagen']['tmp_name'];
$archi = $_FILES['imagen']['name'];
$jp = pathinfo($archi, PATHINFO_EXTENSION);


$body = "Nombre: " .$nombre. "<br> correo  electronico: ".$correo."<br>Domicilio: ".$direccion."<br>Número de telefono: ".$numero;



$usrMail = 'fact.theresistance@gmail.com';
$usrPass = 'Theresistance-2020'; 
require 'libraries/phpmailer/Exception.php';
require 'libraries/phpmailer/PHPMailer.php';
require 'libraries/phpmailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = 0;                     
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com	';                 
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    //$mail->Username   = 'theresistance@inventweb.site';  
    $mail->Username   = $usrMail;                   // SMTP username
    //$mail->Password   = 'u.K5zq@D6iL';      
    $mail->Password   = $usrPass;                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($usrMail, 'theresistance');
    $mail->addAddress($correo, $nombre);     // Add a recipient
    /*$mail->addAddress('elln@example.com');               // Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');*/
    
    $mail->addBCC('jtorres@catedratico.uspg.edu.gt');
    $mail->addBCC('emapj22@gmail.com');

    // Attachments
    /*$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name*/
	
	$mail->addAttachment($file_temp,"curriculum.".$ext);
	
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Solicitud de Empleo';
    $mail->Body    = $body;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo'<script> alert("El Mensaje fue enviado");
    
    </script>';
} catch (Exception $e) {
    echo "Error. Mailer Error: {$mail->ErrorInfo}";
}

}
?>