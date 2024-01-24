<?php include('server.php');
$kadi = isset($_SESSION["k_adi"]) ? $_SESSION["k_adi"] : "";

if (isset($_POST["p_id"])) {
	$_SESSION["proje_id"] = $_POST["p_id"];
	header("location: projeDetay.php");
}
if (isset($_POST["b_klnc"])) {
	$_SESSION["b_klnc"] = $_POST["b_klnc"];
	header("location: görOrtakArayan.php");
}

$vri = "SELECT * FROM ortakbekleyen WHERE k_adi='$kadi'";
$sonuc = $baglanti->query($vri);
if ($sonuc->num_rows > 0) {
	while ($row = $sonuc->fetch_assoc()) {
		$isim = $row["isim"];
		$email = $row["email"];
		$iletişimNo = $row["iletisim_no"];
		$cinsiyet = $row["cinsiyet"];
		$doğumTarihi = $row["dogum_tarihi"];
		$adres = $row["adres"];
		$uzmanlıkAlanı = $row["prof_baslik"];
		$beceriler = $row["beceriler"];
		$profilÖzet = $row["profil_ozet"];
		$eğitim = $row["egitim"];
		$deneyim = $row["deneyim"];
	}
} else {
	echo "";
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Profil</title>
	<meta charset="utf-8">
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
	<!--Navbar-->
	<?php
	include_once("navbar.php");
	?>
	<!--Navbar-->

	<div style="padding:1% 3% 1% 3%;">
		<div class="row">
			<div class="col-lg-3">
				<div class="card" style="padding:19px 19px 5px 19px;margin-top:19px">
					<p></p>
					<img src="image/kul.jpg">
					<h2><?php echo $isim; ?></h2>
					<p><span class="user"></span> <?php echo $kadi; ?></p>
					<ul class="list-group">
						<a href="düzenleOrtakBekleyen.php" class="list-group-item list-group-item-success">Profili Düzenle</a>
						<a href="mesaj.php" class="list-group-item list-group-item-success">Mesajlar</a>
						<a href="çıkış.php" class="list-group-item list-group-item-success">Çıkış Yap</a>
					</ul>
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
						<div class="panel-heading">Uzmanlık Alanı</div>
						<div class="panel-body">
							<h4><?php echo $uzmanlıkAlanı; ?></h4>
						</div>
					</div>
					<div class="panel panel-danger">
						<div class="panel-heading">Beceriler</div>
						<div class="panel-body">
							<h4><?php echo $beceriler; ?></h4>
						</div>
					</div>
					<div class="panel panel-danger">
						<div class="panel-heading">Profil Özeti</div>
						<div class="panel-body">
							<h4><?php echo $profilÖzet; ?></h4>
						</div>
					</div>
					<div class="panel panel-danger">
						<div class="panel-heading">Eğitim</div>
						<div class="panel-body">
							<h4><?php echo $eğitim; ?></h4>
						</div>
					</div>
					<div class="panel panel-danger">
						<div class="panel-heading">Deneyim</div>
						<div class="panel-body">
							<h4><?php echo $deneyim; ?></h4>
						</div>
					</div>
					<div class="panel panel-danger">
						<div class="panel-heading">Mevcut Projeler</div>
						<div class="panel-body">
							<h4>
								<table style="width:100%">
									<tr>
										<td>Proje Id</td>
										<td>Başlık</td>
										<td>Proje Sahibi</td>
									</tr>
									<?php
									$vri = "SELECT * FROM projeler,onayli WHERE projeler.proje_id=onayli.proje_id AND onayli.b_kadi='$kadi' AND onayli.valid=1";
									$result = $baglanti->query($vri);
									if ($result->num_rows > 0) {
										while ($row = $result->fetch_assoc()) {
											$proje_id = $row["proje_id"];
											$başlık = $row["baslik"];
											$a_kadi = $row["e_kadi"];

											echo '
                                <form action="ortakArayanPrfl.php" method="post">
                                <input type="hidden" name="p_id" value="' . $proje_id . '">
                                    <tr>
                                    <td>' . $proje_id . '</td>
                                    <td><input type="submit" class="btn btn-link btn-lg" value="' . $başlık . '"></td>
                                    </form>
                                    <form action="ortakArayanPrfl.php" method="post">
                                    <input type="hidden" name="e_user" value="' . $a_kadi . '">
                                    <td><input type="submit" class="btn btn-link btn-lg" value="' . $a_kadi . '"></td>
                                    </tr>
                                </form>
                                ';
										}
									} else {
										echo "<tr><td>Gösterilecek bir şey yok</td></tr>";
									}

									?>
								</table>
							</h4>
						</div>
					</div>
					<div class="panel panel-danger">
						<div class="panel-heading">Önceki Projeler</div>
						<div class="panel-body">
							<h4>
								<table style="width:100%">
									<tr>
										<td>Proje Id</td>
										<td>Başlık</td>
										<td>Proje Sahibi</td>
									</tr>
									<?php
									$vri = "SELECT * FROM projeler,onayli WHERE projeler.proje_id=onayli.proje_id AND onayli.b_kadi='$kadi' AND onayli.valid=0";
									$result = $baglanti->query($vri);
									if ($result->num_rows > 0) {
										while ($row = $result->fetch_assoc()) {
											$proje_id = $row["proje_id"];
											$başlık = $row["baslik"];
											$a_kadi = $row["e_kadi"];

											echo '
                                <form action="ortakBekleyenPrfl.php" method="post">
                                <input type="hidden" name="p_id" value="' . $proje_id . '">
                                    <tr>
                                    <td>' . $proje_id . '</td>
                                    <td><input type="submit" class="btn btn-link btn-lg" value="' . $başlık . '"></td>
                                    </form>
                                    <form action="ortakBekleyenPrfl.php" method="post">
                                    <input type="hidden" name="e_user" value="' . $a_kadi . '">
                                    <td><input type="submit" class="btn btn-link btn-lg" value="' . $a_kadi . '"></td>
                                    </tr>
                                </form>
                                ';
										}
									} else {
										echo "<tr><td>Gösterilecek bir şey yok</td></tr>";
									}

									?>
								</table>
							</h4>
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

	<!--Footer-->
	<?php
	include("footer.php");
	?>
	<!--Footer-->

	<script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>