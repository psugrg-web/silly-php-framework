<?php

$name = $_POST["name"];
$email_addr = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];


use PHPMailer\PHPMailer\PHPMailer;
use Core\MailException;

$email = new PHPMailer(true);

try {
    $email->isSMTP();
    $email->SMTPAuth = true;

    $config = require base_path('config.php');
    $email->Host = $config['email']['smtp']['host'];
    $email->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $email->Port = $config['email']['smtp']['port'];

    $email->Username = $_ENV['EMAIL_USERNAME'];
    $email->Password = $_ENV['EMAIL_PASSWORD'];

    // Address the mail will be sent to
    $email->addAddress('noreply@u356087.stronazen.pl', 'Contact Form');
    // Address from the message will be sent
    $email->setFrom('noreply@u356087.stronazen.pl', 'Contact Form');
    // Address to reply to
    $email->addReplyTo($email_addr, $name);

    $email->Subject = $subject;
    $email->Body = $message;

    $email->send();
} catch (Exception $e) {
    MailException::throw([
        "email" => "Message could not be sent. Cause: {$email->ErrorInfo}"
    ], [
        "name" => $name,
        "email_addr" => $email_addr,
        "subject" => $subject,
        "message" => $message,
    ]);
}

redirect('/');
