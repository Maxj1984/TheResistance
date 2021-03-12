<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['enviar'])){
$nombre = $_POST['firtsnames'];
$apellido = $_POST['lastnames'];
$correo = $_POST['email'];
$telefono = $_POST['phone'];
$direccion = $_POST['address'];
$plaza = $_POST['descripcion'];
$file_temp = $_FILES['archivo']['tmp_name'];
$archivo = $_FILES['archivo']['name'];
$ext = pathinfo($archivo, PATHINFO_EXTENSION);

/*$imagen_temp=$_FILES['imagen']['tmp_name'];
$imagen=$_FILES['imagen']['name'];
$imagenext=pathinfo($imagen, PATHINFO_EXTENSION);*/




$cuerpo ="<br> <br>"."<br>Puesto solicitado: ".$plaza."<br><br>Nombre completo: ". $nombre." ".$apellido.
"<br> Correo electronico: ".$correo."<br>Telefono: ".$telefono."<br>Dirección: ".$direccion;

$usrMail = 'fact.theresistance@gmail.com';
$usrPass = 'Theresistance-2020'; 
require 'libraries/phpmailer/Exception.php';
require 'libraries/phpmailer/PHPMailer.php';
require 'libraries/phpmailer/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
   // $mail->Host       = 'mail.inventweb.site';     
    $mail->Host       = 'smtp.gmail.com	';                  // Set the SMTP server to send through
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
    $mail->addBCC('jtorres@catedratico.uspg.edu.gt');
    /*$mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('jtorres@catedratico.uspg.edu.gt');*/

    // Attachments
    /*$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name*/
	
	$mail->addAttachment($file_temp,"CV.".$ext);
	/*$mail->addAttachment($imagen_temp,"foto.".$imagenext);*/
	
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Solicitud de Empleo';
    $mail->Body    = $cuerpo;
    $mail->AltBody = 'Mensaje de envio';

    $mail->send();
    echo'<script> alert("El Mensaje ha sido enviado");
    
    </script>';
} catch (Exception $e) {
    echo "El Mensaje no ha sido enviado. Mailer Error: {$mail->ErrorInfo}";
}

}
?>