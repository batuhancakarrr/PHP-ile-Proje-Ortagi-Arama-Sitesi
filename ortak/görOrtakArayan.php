<?php include('server.php');
$kadi = isset($_SESSION["k_adi"]) ? $_SESSION["k_adi"] : "";

if (isset($_SESSION["a_klnc"])) {
	$a_kullanıcı = $_SESSION["a_klnc"];
	$_SESSION["msjalc"] = $a_kullanıcı;
}

$vri = "SELECT * FROM ortakarayan WHERE k_adi='$a_kullanıcı'";
$sonuc = $baglanti->query($vri);

if ($sonuc->num_rows > 0) {
	while ($row = $sonuc->fetch_assoc()) {
		$isim = $row["isim"];
		$email = $row["email"];
		$iletişimNo = $row["iletisim_no"];
		$cinsiyet = $row["cinsiyet"];
		$doğumTarihi = $row["dogum_tarihi"];
		$adres = $row["adres"];
		$şirket = $row["sirket"];
		$profilÖzeti = $row["profil_ozet"];
	}
} else {
	echo "";
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Profil</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css">
	<style>
		body {
			padding-top: 3%;
			margin: 0;
		}

		.card {
			box-shadow: 0 4px 6px rgba(0, 0, 0, 0.4);
			border-radius: 10px;
		}
	</style>

</head>

<body>

	<?php
	include_once("navbar.php");
	?>

	<div style="padding:1% 3% 1% 3%;">
		<div class="row">
			<div class="col-lg-3">
				<div class="card" style="padding:19px 19px 5px 19px;margin-top:19px">
					<p></p>
					<img src="image/kul.jpg">
					<h2><?php echo $isim; ?></h2>
					<p><span class="user"></span> <?php echo $a_kullanıcı; ?></p>
					<center><a href="mesajGönder.php" class="btn btn-danger"><span class="glyphicon"></span> Mesaj Gönder</a></center>
					<p></p>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="card" style="padding:19px 19px 5px 19px;margin-top:19px">
					<div class="panel panel-danger">
						<div class="panel-heading">
							<h3>Profil Detayları</h3>
						</div>
					</div>
					<div class="panel panel-danger">
						<div class="panel-heading">Şirket Adı</div>
						<div class="panel-body">
							<h4><?php echo $şirket; ?></h4>
						</div>
					</div>
					<div class="panel panel-danger">
						<div class="panel-heading">Profil Özeti</div>
						<div class="panel-body">
							<h4><?php echo $profilÖzeti; ?></h4>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="card" style="padding:19px 19px 5px 19px;margin-top:19px">
					<div class="panel panel-warning">
						<div class="panel-heading">
							<h4>İletişim Bilgileri</h4>
						</div>
					</div>
					<div class="panel panel-warning">
						<div class="panel-heading">Email</div>
						<div class="panel-body"><?php echo $email; ?></div>
					</div>
					<div class="panel panel-warning">
						<div class="panel-heading">Telefon</div>
						<div class="panel-body"><?php echo $iletişimNo; ?></div>
					</div>
					<div class="panel panel-warning">
						<div class="panel-heading">Adres</div>
						<div class="panel-body"><?php echo $adres; ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->
	<?php
	include("footer.php");
	?>
	<!-- Footer -->

	<script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>