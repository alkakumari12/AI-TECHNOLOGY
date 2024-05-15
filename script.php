
<?php
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\STMP; 


require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php'; 

require 'config.php';
@param
@param
@param
@param
function send($name, $email,$country_code, $contact, $message){
    $mail =new PHPMailer(true);

    $mail->isSMTP();

    $mail->SMTPAuth = true;


    $mail->Host = MAILHOST;
    $mail->username = UERNAME;
    $mail->password = PASSWORD;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->port =587;
    $mail->setFrom(SEND_FROM, SEND_FORM_NAME);
    $mail->addAddress($email);
    $mail->addReplyTo(REPLY_TO, REPLY_TO_NAME);
    $mail->IsHTML(true);
    $mail->name =$name;
    $mail->body =$message;
    $mail->AltBody =$message;
    if(!$mail->send()){
        return "Email not send. Please try again";

    }else{
        return "succes";
    }
}
?>
