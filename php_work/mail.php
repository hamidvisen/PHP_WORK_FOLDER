
<?php
extract($_POST);
$email = $_POST['email'];
$name = $_POST['name'];


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master\PHPMailer-master\src\Exception.php';
require 'PHPMailer-master\PHPMailer-master\src\PHPMailer.php';
require 'PHPMailer-master\PHPMailer-master\src\SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'abdulhamid.31102@gmail.com';                     //SMTP username
    $mail->Password   = 'jtwsmutlrxeqbfxm';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('abdulhamid.31102@gmail.com', 'Abdul Hamid');
    $mail->addAddress($email, $name);     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $otp = mt_rand(1000, 9999);
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Hello '.$name;
    $mail->Body    = 'Your Otp for Verification <b>' .$otp.'</b>';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
    
    
session_start();
$_SESSION['start'] = time();

    $_SESSION["otp"] = $otp;
    $_SESSION['expire'] = $_SESSION['start'] + (2 * 60);
    header("Location: otpvar.php");
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>