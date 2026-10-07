<?php

namespace assets\includes;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class mailer
{
    public static function send(string $to, string $subject, string $body): bool {
        $env = parse_ini_file(init::getRootDir() . '/../env.ini', true);

        if (!$env || !isset($env['smtp'])) {
            error_log('Erreur mailer : env.ini ou section [smtp] introuvable.');
            return false;
        }

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = $env['smtp']['host'];
            $mail->SMTPAuth = true;
            $mail->Username = $env['smtp']['username'];
            $mail->Password = $env['smtp']['password'];
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = (int) $env['smtp']['port'];

            $mail->setFrom('no-reply@cyber-cigales.alwaysdata.net', 'Cyber Cigales');
            $mail->addAddress($to);
            $mail->Subject = $subject;
            $mail->Body = $body;

            return $mail->send();
        } catch (Exception $e) {
            error_log('Erreur envoi mail : ' . $mail->ErrorInfo);
            return false;
        }
    }

}