<?php
include('server.php');
$tip = isset($_SESSION["kullanici_tip"]) ? $_SESSION["kullanici_tip"] : "";
$isim = isset($_SESSION["k_adi"]) ? $_SESSION["k_adi"] : "";
$email = isset($_SESSION["email"]) ? $_SESSION["email"] : "";

require 'mail/PHPMailer/src/PHPMailer.php';
require 'mail/PHPMailer/src/SMTP.php';
require 'mail/PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = 'batuyhan19@gmail.com';
$mail->Password = '';

$mail->setFrom('batuyhan19@gmail.com', 'Batuhan');
$mail->addAddress($email, $isim);
$mail->Subject = 'Hosgeldiniz';
$mail->Body = 'Sitemize ' . $isim . ' kullanıcı adı ile kayıt oldunuz. Sitemizi kullandığınız için teşekkürler.';

try {
    $mail->send();
    if ($tip == 1) {
        header("location: ortakBekleyenPrfl.php");
    } else {
        header("location: ortakArayanPrfl.php");
    }
} catch (Exception $e) {
    echo 'E-posta gönderilemedi. Hata: ' . $mail->ErrorInfo;
}
