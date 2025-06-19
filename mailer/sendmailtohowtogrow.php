<?php
require "howtogrowmailer.php";

$data = json_decode(file_get_contents('php://input'), true);
$message = (isset($data["message"]) && $data["message"] !== "") ? $data["message"] : "-";
$email = filter_var($data["email"], FILTER_VALIDATE_EMAIL) ? $data["email"] : "BAD";
$subject = (isset($data["subject"]) && $data["subject"] !== "") ? $data["subject"] : "-";
if($message === "-" || $email === "BAD" || $subject === "-"){
    exit("Bad parameters");
}
//exit("Msg: " . $message . " Email: " . $email . " Subject: " . $subject);

$mailer = new Mailer();
$response = $mailer->sendEmail($email,$message,$subject);
if($response){
    echo "Successful";
}else{
    echo "Not successful";
}
?>
