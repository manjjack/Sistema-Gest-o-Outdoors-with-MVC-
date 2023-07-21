<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include_once '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
include_once '../vendor/phpmailer/phpmailer/src/SMTP.php';
include_once '../vendor/phpmailer/phpmailer/src/Exception.php';

class EmailService
{

    private $pass = "etqobesusuhkmrdc";
    private $port = 587;

    public function mandarEmail($email, $msg, $til)
    {
        $mail = new PHPMailer;

        $mail->isSMTP();
        $mail->Host = $mail;
        $mail->SMTPAuth = true;
        $mail->Username = $email; // Insira seu e-mail do Gmail
        $mail->Password = $this->pass; // Insira sua senha do Gmail
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Configurações do e-mail
        $mail->setFrom('inteligentejackson@gmail.com', 'Jackson Junior'); // E-mail do remetente
        $mail->addAddress($email, 'Nome do Destinatário');

        $mail->Subject = $til;
        $mail->Body = $msg;
        $mail->send();
    }



}