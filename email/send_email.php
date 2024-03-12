<?php
require_once('../conn.php');

$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];

require "../vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);
$mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;
$mail->CharSet = "utf-8";

$mail->Username = $email_adress;
$mail->Password = $email_password;

$mail->setFrom($email, $name);
$mail->addAddress($email_adress);

$mail->Subject = $subject;
$mail->Body = $message;

$mail->send();

header("Location: ../contact.php");
?>