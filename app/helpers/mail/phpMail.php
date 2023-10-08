<?php

namespace App\helpers\mail;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$m = new PHPMailer(true);


class phpMail
{
    // static function sendMail($to, $subject, $message, $from, $fromName, $replyTo = null, $replyToName = null, $cc = null, $ccName = null, $bcc = null, $bccName = null, $attachment = null, $attachmentName = null, $host,$encry,$port,$username,$password)
    // {
    //     $mail = new PHPMailer(true);
    //     try {
    //         $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    //         $mail->isSMTP();
    //         $mail->Host       = $host;
    //         $mail->SMTPAuth   = true;
    //         $mail->Username   = $username;
    //         $mail->Password   = $password;
    //         $mail->SMTPSecure = $encry;
    //         $mail->Port       = $port;
    //         $mail->CharSet = 'UTF-8';
    //         $mail->setFrom($from, $fromName);
    //         $mail->addAddress($to);
    //         if ($replyTo != null) {
    //             $mail->addReplyTo($replyTo, $replyToName);
    //         }
    //         if ($cc != null) {
    //             $mail->addCC($cc, $ccName);
    //         }
    //         if ($bcc != null) {
    //             $mail->addBCC($bcc, $bccName);
    //         }
    //         if ($attachment != null) {
    //             $mail->addAttachment($attachment, $attachmentName);
    //         }
    //         $mail->isHTML(true);
    //         $mail->Subject = $subject;
    //         $mail->Body    = $message;
    //         $mail->AltBody = $message;
    //         $mail->send();
    //         return true;
    //     } catch (\Throwable $th) {
    //         return false;
    //     }
    // }
}
