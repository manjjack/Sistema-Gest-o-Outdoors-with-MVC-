<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include_once '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
include_once '../vendor/phpmailer/phpmailer/src/SMTP.php';
include_once '../vendor/phpmailer/phpmailer/src/Exception.php';

include_once '../controllers/UserController.php';


class EmailService
{

    private $pass = "etqobesusuhkmrdc";
    private $port = 587;


public function mandarEmail($email, $msg, $til)
    {
        $use = new UserRepository();
        $novoemail = $use->getEmailAdm();
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $novoemail; // Insira seu e-mail do Gmail
        $mail->Password = 'etqobesusuhkmrdc'; // Insira sua senha do Gmail
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        // Configurações do e-mail
        $mail->setFrom($novoemail); // E-mail do remetente
        $mail->addAddress($email);
        
        $mail->isHTML(true);
        $mail->Subject = $til;
        $mail->Body = $msg;
        $mail->send();
    }



}