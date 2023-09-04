<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpMailer/Exception.php';
require '../phpMailer/PHPMailer.php';
require '../phpMailer/SMTP.php';

class GenerarClave{

    public function enviarNuevaClave($identificacion, $email){
        $f = null;

        $objConexion = new conexion();
        $conexion = $objConexion->get_conexion();

        $consultar = "SELECT * from usuario where ID=:identificacion and Email=:email";

        $result = $conexion->prepare($consultar);

        $result->bindParam(":identificacion", $identificacion);
        $result->bindParam(":email", $email);
        
        $result->execute();

        $f = $result->fetch();
            if($f){
                //Gerenamos la nueva clase a partir de un codigo aleatorio
                $caracteres = "0123456789abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ";
                $longitud = 8;
                $newPass = substr(str_shuffle($caracteres),0,$longitud); 

                $claveMd = md5($newPass);

                $actualizarClave = "UPDATE usuario Set clave=:claveMd where ID=:identificacion";

                $result = $conexion->prepare($actualizarClave);

                $result->bindParam(":identificacion", $identificacion);
                $result->bindParam(":claveMd", $claveMd);

                $result->execute();



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
                    $emailFor=$f['Email'];
                    $mail->addAddress($emailFor);     //Add a recipient
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
                    $mail->Subject = 'Reasignacion de contraseña';
                    $mail->Body    = '<body style="margin: 0; padding: 0;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <td style="padding: 10px 0 30px 0;">
                                <table align="center" border="0" cellpadding="0" cellspacing="0" width="600"
                                    style="border: 1px solid #cccccc; border-collapse: collapse;">
                                    <tr>
                                        <td align="center" bgcolor="#BDD0FF"
                                            style="padding: 20px 0 20px 0; color: #000000; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
                                            <img src="https://github.com/Andercmdsena/imagenes/blob/main/Mi%20proyecto.png?raw=true" alt="" width="120"
                                                height="120" style="display: block;" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#BDD0FF" style="padding: 40px 30px 40px 30px;">
                                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                <tr>
                                                    <td align="center"
                                                        style="color:#000000; font-family: Arial, sans-serif; font-size: 24px;">
                                                        <b>RECUPERACIÓN DE CONTRASEÑA</b>
                                                    </td>
                                                </tr><tr>
                                                    
                                                </tr> 
                                                <tr>
                                                    <td>
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                            <tr>
                                                                <td style="font-size: 0; line-height: 0;" width="100">
                                                                    &nbsp;
                                                                </td>
                                                                <td width="400" valign="top">
                                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                        <tr>
                                                                            <td align="center">
                                                                            <p style="color:#000000; font-size:22px; padding-top: 30px">Hola '.$f['Nombre'].' '.$f['Apellido'].' tu nueva clave de acceso para el rol de '.$f['Rol'].' es: </p>
                                                                            <p style="color:#000000; font-size:25px; padding-top: 30px">'.$newPass.' </p>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="center"
                                                                                style="padding: 0; color: #FFFFFF; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                                <td style="font-size: 0; line-height: 0;" width="100">
                                                                    &nbsp;
                                                                </td>
                
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td bgcolor="#33CB98" style="padding: 30px 30px 30px 30px;">
                                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                <tr>
                                                    <td align="center"
                                                        style="color: #010A43; font-family: Arial, sans-serif; font-size: 14px;"
                                                        width="75%; text-aling:center">
                                                        &reg; Your Little Big Business - 2023<br />
                                                        <a href="https://www.youtube.com/@codingnow6059" target="_blank"
                                                            style="color: #010A43;">
                                                            <font color="#010A43">www.Your Little Big Business.com.co/</font>
                                                        </a>
                                                        
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </body>'
                    
                 

                    ;
                  

                    $mail->send();
                    echo '<script> alert("Mensaje enviado") </script>';
                    echo"<script> location.href='../theme/login.php'</script>";
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            }
            else{
                echo'<script> alert("Los datos no se encuentrar en el sistema")</script>';
                echo"<script> location.href='../views/administrador/page-reset-password.php'</script>";
            }
        
    }

}


?>