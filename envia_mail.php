<?php
use PHPMailer\PHPMailer\PHPMailer;
function enviarEmail($msg, $email){
     
//Import the PHPMailer class into the global namespace

        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';

        //Create a new PHPMailer instance
        $mail = new PHPMailer();

        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'gbrdias2807@gmail.com'; // Your Mailtrap username
        $mail->Password = 'nnif rcfg nphk vzoa'; // Your Mailtrap password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; //PHPMailer::ENCRYPTION_SMTPS
        //$mail->Port = 465; // se usar ENCRYPTION_SMTPS
        $mail->Port = 587;

        // Sender and recipient settings
        $mail->setFrom('gbrdias2807@gmail.com', 'Gestor Sistema');
        $mail->addAddress($email);

        // Sending plain text email
        $mail->isHTML(false); // Set email format to plain text
        $mail->Subject = 'Clinica';
        $mail->Body    = $msg;

        // Send the email
        if($mail->send()){
            return true;
        } else {
            return false;
        }
   
    }   
    
?>
