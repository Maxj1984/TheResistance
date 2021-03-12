<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['enviar'])){
$nombre = $_POST['nom-ap'];
$email = $_POST['correo'];
$tel = $_POST['telefono'];
$direccion = $_POST['address'];
$plaza = $_POST['plaza'];
$docto_temp = $_FILES['docto']['tmp_name'];
$docto = $_FILES['docto']['name'];
$ext = pathinfo($docto, PATHINFO_EXTENSION);

$imagen_temp=$_FILES['perfil']['tmp_name'];
$imagen=$_FILES['perfil']['name'];
$ext2=pathinfo($imagen, PATHINFO_EXTENSION);




$cuerpo ="<br><h1>Datos ingresados en Formulario Solicitud de Empleo</h1> <br>"."Nombre completo: ". $nombre.
"<br> Correo electronico: ".$email."<br>Telefono: ".$tel.
"<br>Dirección: ".$direccion."<br>Puesto solicitado: ".$plaza;

$user = 'fact.theresistance@gmail.com';
$password = 'Theresistance-2020'; 
require 'libraries/phpmailer/Exception.php';
require 'libraries/phpmailer/PHPMailer.php';
require 'libraries/phpmailer/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                    
    $mail->isSMTP();                                        
   // $mail->Host       = 'mail.inventweb.site';     
    $mail->Host       = 'smtp.gmail.com	';                  
    $mail->SMTPAuth   = true;                               
    //$mail->Username   = 'theresistance@inventweb.site';  
    $mail->Username   = $user;                   
    //$mail->Password   = 'u.K5zq@D6iL';      
    $mail->Password   = $password;                               
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
    $mail->Port       = 587;                                    

    //emisor y receptor
    $mail->setFrom($user, 'The Resistance');
    $mail->addAddress($email, $nombre);     

	//adjuntos
	$mail->addAttachment($docto_temp,"Curriculum.".$ext);
	$mail->addAttachment($imagen_temp,"Solicitante.".$ext2);
	
    // Contenido del correo
    $mail->isHTML(true);                                 
    $mail->Subject = 'Solicitud de Empleo';
    $mail->Body    = $cuerpo;
    $mail->AltBody = 'Mensaje de envio';

    $mail->send();
    echo'<script> alert("Su mensaje ha sido enviado, espere nuestra respuesta");
    
    </script>';
} catch (Exception $e) {
    echo "El Mensaje no ha sido enviado. Mailer Error: {$mail->ErrorInfo}";
}
}

?>

<?php
