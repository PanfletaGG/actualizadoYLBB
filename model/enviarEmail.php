<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpMailer/Exception.php';
require '../phpMailer/PHPMailer.php';
require '../phpMailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'YLBB.soporte@gmail.com';                     //SMTP username
    $mail->Password   = 'gchxknlyjvykedum';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    // emisor
    $mail->setFrom('YLBB.soporte@gmail.com', 'Soporte tecnico YLBB');
    // receptor
    $mail->addAddress('lfrestrepo004@gmail.com', 'Usuario');     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Conten
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->CharSet = 'UTF-8';
    $mail->Subject = 'Prueba de php';
    $mail->Body    = '<h1 style="font-size:50px; color: #2396bd; text-align:center> Your little big business </h1>"
    <p style="text-aling:center;font-size:22px"><strong style=color:red>Juan Camilo alvis:</strong>="que necesita un programador para bailar, algo-ritmo" <img src="https://lh3.googleusercontent.com/XSDv6XYZ973bdxMBDJ1adLHpSSUv4vsZJaePpms21eZDl-27JIfTHIYXnnudwPfAg_1-59bKAarMhWGNagsTR2Gq0pAWBUw6CwYwH2V0TzDXZT9z1fKvr1vCOrk8nxZ-U7wVfOJq" style="max-width:500px"> <br>
    <strong style=color:purple>Edison Ramirez:</strong>="intente ligar con una chica informatica, pero nose de-java" <img src="https://lh3.googleusercontent.com/XSDv6XYZ973bdxMBDJ1adLHpSSUv4vsZJaePpms21eZDl-27JIfTHIYXnnudwPfAg_1-59bKAarMhWGNagsTR2Gq0pAWBUw6CwYwH2V0TzDXZT9z1fKvr1vCOrk8nxZ-U7wVfOJq" style="max-width:400px"> <br>
    <strong style=color:green>Anderson Tovar:</strong>="¿Por qué los programadores prefieren el frío? Porque les da igual si hace 0 o 1 grados" <img src="https://c8.alamy.com/compes/hak0pc/codigo-de-programacion-hak0pc.jpg" style="max-width:300px"><br>
    <strong style=color:blue>Samuel Diaz:</strong>="¿Qué le dijo un HTML a otro HTML? ¡No me seas tan etiquetudo!" <img src="https://lh3.googleusercontent.com/XSDv6XYZ973bdxMBDJ1adLHpSSUv4vsZJaePpms21eZDl-27JIfTHIYXnnudwPfAg_1-59bKAarMhWGNagsTR2Gq0pAWBUw6CwYwH2V0TzDXZT9z1fKvr1vCOrk8nxZ-U7wVfOJq" style="max-width:200px"> <br>
     </p>
    <hr>
    <p>© copyright ADSO 2023</p>

    ';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo '<script> alert("Mensaje enviado") </script>';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>