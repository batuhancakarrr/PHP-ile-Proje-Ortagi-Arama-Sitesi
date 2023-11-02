<?php
include('server.php');

$proje_id = isset($_SESSION["proje_id"]) ? $_SESSION["proje_id"] : "";
$vri = "SELECT * FROM projeler WHERE proje_id ='$proje_id'";
$sonuc = $baglanti->query($vri);
if ($sonuc->num_rows > 0) {
    while($row = $sonuc->fetch_assoc()) {
		$a_kadi=$row["e_kadi"];
    }
}

$vri = "SELECT * FROM ortakarayan WHERE k_adi='$a_kadi'";
$sonuc = $baglanti->query($vri);
if ($sonuc->num_rows > 0) {
    while($row = $sonuc->fetch_assoc()) {
		$isim=$row["isim"];
        $email=$row["email"];
    }
}

$b_kadi = isset($_SESSION["k_adi"]) ? $_SESSION["k_adi"] : "";

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
$mail->Password = 'ouuwqiltkwqhaccl';

$mail->setFrom('batuyhan19@gmail.com', 'Batuhan');
$mail->addAddress($email, $isim);
$mail->Subject = 'Proje Istegi';
$mail->Body = ''. $b_kadi . ' kullanıcı adlı üye projenize katılmak için size bir istek gönderdi.';

try {
    $mail->send();
    echo 'İstek gönderildi.';
    header("location: projeler.php");
} catch (Exception $e) {
    echo 'E-posta gönderilemedi. Hata: ' . $mail->ErrorInfo;
}
