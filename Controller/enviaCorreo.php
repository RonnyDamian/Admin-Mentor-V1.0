<?php
session_start();
$email = $_SESSION['email'];
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../public/email/Exception.php';
require '../public/email/PHPMailer.php';
require '../public/email/SMTP.php';





//$abeja= "http://mentoria.juntadeaguapilalo.com/img/Abeja08.png";

$mail = new PHPMailer(true);
$html='<img src="http://dashboard.juntadeaguapilalo.com/img/icono2.png" alt="iDR.Crop. Recuperacion de contraseña" width="200"> <br>
       <h3>¡Saludos!</h3>
       <p>Se ha contactado con el equipo de soporte con el objetivo de recuperar su cuenta</p> <br>
       <p>Para restablecer su contraseña deberá acceder al siguiente enlace </p> <a href="https://admin.mentorecuador.com/View/restablecerClave.php?email='.$email.'">click aquí</a><br>              
       <p><small><strong>Nota:</strong> Si consideras que no solicitado un cambion de contraseña, puede aborat el proceso no accediendo al enlace proporcionado</small></p>';
try {
    //Server settings
//    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.hostinger.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'recupera@contrataecuador.com';                     // SMTP username
    $mail->Password   = 'RecuperaClave2020*_';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    //Recipients
    $mail->setFrom('recupera@contrataecuador.com', 'Girat - Soporte Técnico');
    $mail->addAddress($email);     // Add a recipient
    //$mail->addAddress('ronnydamianrodrigueznole@gmail.com');
    // Attachments

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $subject = "Solicitud cambio de clave";   // << No reconoce la Ñ
    $mail->Subject = $subject;
    $mail->Body = $html;
    $mail->send();
    echo "<script>
    if(confirm('Se ha enviado un email a su correo electronico')){
    window.location = '../index.php';
    }
    </script>";
} catch (Exception $e) {
    echo "Error al enviar mensaje: {$mail->ErrorInfo}";
}
?>

