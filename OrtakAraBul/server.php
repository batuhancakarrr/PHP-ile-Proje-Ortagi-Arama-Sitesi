<?php
session_start();

$baglanti = new mysqli("localhost", "root", "", "ortak");
if ($baglanti->connect_error) {
	die("Bağlantı hatalı: " . $baglanti->connect_error);
}
$kadi = $isim = $email = $şifre = $iletişimNo = $doğumTarihi = $adres = "";

if (isset($_POST["kayıt"])) {
	$kadi = kntrl($_POST["k_adi"]);
	$isim = kntrl($_POST["isim"]);
	$email = kntrl($_POST["email"]);
	$şifre = kntrl($_POST["sifre"]);
	$şifreTekrar = kntrl($_POST["sifre_d"]);
	$iletişimNo = kntrl($_POST["iletisim_no"]);
	$cinsiyet = kntrl($_POST["cinsiyet"]);
	$doğumTarihi = kntrl($_POST["dogum_tarihi"]);
	$adres = kntrl($_POST["adres"]);
	$kullaniciTipi = kntrl($_POST["kullanici_tip"]);

	if ($kullaniciTipi == "ortakbekleyen") {
		$vri = "SELECT * FROM ortakbekleyen,ortakarayan WHERE ortakbekleyen.k_adi = '$kadi' OR ortakarayan.k_adi = '$kadi'";
		$sonuc = $baglanti->query($vri);
		if ($sonuc->num_rows > 0) {
			$_SESSION["hatamsj2"] = "Kullanıcı Adı kullanılmaktadır";
		} else {
			unset($_SESSION["hatamsj2"]);
			$vri = "INSERT INTO ortakbekleyen (k_adi,sifre,isim,email,iletisim_no,adres,cinsiyet,dogum_tarihi) VALUES ('$kadi', '$şifre', '$isim','$email','$iletişimNo','$adres','$cinsiyet','$doğumTarihi')";
			$sonuc = $baglanti->query($vri);
			if ($sonuc == true) {
				$_SESSION["k_adi"] = $kadi;
				$_SESSION["kullanici_tip"] = 1;
				$_SESSION["email"] = $email;
				header("location: kayitMail.php");
			}
		}
	} else {
		$vri = "SELECT * FROM ortakbekleyen,ortakarayan WHERE ortakbekleyen.k_adi = '$kadi' OR ortakarayan.k_adi = '$kadi'";
		$sonuc = $baglanti->query($vri);
		if ($sonuc->num_rows > 0) {
			$_SESSION["hatamsj2"] = "Kullanıcı Adı kullanılmaktadır";
		} else {
			unset($_SESSION["hatamsj2"]);
			$vri = "INSERT INTO ortakarayan (k_adi,sifre,isim,email,iletisim_no,adres,cinsiyet,dogum_tarihi) VALUES ('$kadi', '$şifre', '$isim','$email','$iletişimNo','$adres','$cinsiyet','$doğumTarihi')";
			$sonuc = $baglanti->query($vri);
			if ($sonuc == true) {
				$_SESSION["k_adi"] = $kadi;
				$_SESSION["kullanici_tip"] = 2;
				$_SESSION["email"] = $email;
				header("location: kayitMail.php");
			}
		}
	}
}
if (isset($_POST["giriş"])) {
	session_unset();
	$kadi = kntrl($_POST["k_adi"]);
	$şifre = kntrl($_POST["sifre"]);
	$kullaniciTipi = kntrl($_POST["kullanici_tip"]);

	if ($kullaniciTipi == "ortakbekleyen") {
		$vri = "SELECT * FROM ortakbekleyen WHERE k_adi = '$kadi' AND sifre = '$şifre'";
		$sonuc = $baglanti->query($vri);
		if ($sonuc->num_rows == 1) {
			$_SESSION["k_adi"] = $kadi;
			$_SESSION["kullanici_tip"] = 1;
			unset($_SESSION["hatamsj"]);
			header("location: ortakBekleyenPrfl.php");
		} else {
			$_SESSION["hatamsj"] = "kullanıcı adı veya şifre hatalı";
		}
	} else {
		$vri = "SELECT * FROM ortakarayan WHERE k_adi = '$kadi' AND sifre = '$şifre'";
		$sonuc = $baglanti->query($vri);
		if ($sonuc->num_rows == 1) {
			$_SESSION["k_adi"] = $kadi;
			$_SESSION["kullanici_tip"] = 2;
			unset($_SESSION["hatamsj"]);
			header("location: ortakArayanPrfl.php");
		} else {
			$_SESSION["hatamsj"] = "kullanıcı adı veya şifre hatalı";
		}
	}
}

if (isset($_SESSION["hatamsj"])) {
	$hatamsj = $_SESSION["hatamsj"];
	unset($_SESSION["hatamsj"]);
} else {
	$hatamsj = "";
}
if (isset($_SESSION["hatamsj2"])) {
	$hatamsj2 = $_SESSION["hatamsj2"];
	unset($_SESSION["hatamsj2"]);
} else {
	$hatamsj2 = "";
}

function kntrl($veri)
{
	$veri = trim($veri); // baştaki ve sondaki boşlukları kaldır
	$veri = stripslashes($veri); // ters eğik çizgileri kaldırır
	$veri = htmlspecialchars($veri); // HTML etiketlerini özel karakterlere dönüştürür
	return $veri;
}
