<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendMail($email, $code)
{
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'tranquangthai.10102003@gmail.com';     //SMTP username
        $mail->Password   = 'kyqcwwsxghcehwfi';                     //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('tranquangthai.10102003@gmail.com');
        $mail->addAddress($email);

        //Content
        $mail->isHTML(true);                                        //Set email format to HTML
        $mail->Subject = 'Verification Email';
        $mail->Body    = 'Đây là link xác nhận email <b><a href="'. _WEB_ROOT .'/mat-khau-moi?reset=' . $code . '">Xác nhận</a></b>';

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
