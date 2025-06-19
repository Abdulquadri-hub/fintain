<?php
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class Mailer{

    public function sendEmail($email,$message,$subject,$email2="icisystemng@gmail.com"){

        $developmentmode = false;
        $mail = new PHPMailer($developmentmode);

        try{
            //$mail->SMTPDebug = 2;
            //$mail->isSMTP();
            
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = "mail.comeandsee.com.ng";
            
            $mail->SMTPAuth = true;
            $mail->Username   = 'elfrique@comeandsee.com.ng';
            $mail->Password   = 'TranChcAN23(&*';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            
            $mail->setFrom('elfrique@comeandsee.com.ng');
            $mail->AddAddress($email);
            //$mail->AddCC($email2);
            $mail->isHTML(true);
            //$mail->FromName = "Co-Work";
            $mail->Subject = $subject;
            $mail->Body = $message;
            
            if($mail->send()){
                return true;
            }else{
                return false;
            }
            $mail->ClearAllRecipients();
            
        }catch(Exception $ex){
            echo("Error sending email: " . $mail->ErrorInfo);
        }

    }
}
?>
