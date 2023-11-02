<?php include('server.php');
$kadi = isset($_SESSION["k_adi"]) ? $_SESSION["k_adi"] : "";

if (isset($_POST["p_id"])) {
	$_SESSION["proje_id"] = $_POST["p_id"];
	header("location: projeDetay.php");
}
if (isset($_POST["b_klnc"])) {
	$_SESSION["b_klnc"] = $_POST["b_klnc"];
	header("location: görOrtakBekleyen.php");
}

$vri = "SELECT * FROM ortakarayan WHERE k_adi='$kadi'";
$sonuc = $baglanti->query($vri);
if ($sonuc->num_rows > 0) {
	while ($row = $sonuc->fetch_assoc()) {
		$isim = $row["isim"];
		$email = $row["email"];
		$iletişimNo = $row["iletisim_no"];
		$adres = $row["adres"];
		$profilÖzeti = $row["profil_ozet"];
		$şirket = $row["sirket"];
	}
} else {
	echo "";
}

$vri = "SELECT * FROM projeler WHERE e_kadi='$kadi' and valid=1";
$sonuc = $baglanti->query($vri);
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
						<a href="projeOluştur.php" class="list-group-item list-group-item-success">Proje İlanı Oluştur</a>
						<a href="düzenleOrtakArayan.php" class="list-group-item list-group-item-success">Profili Güncelle</a>
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
						<div class="panel-heading">Şirket İsmi</div>
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
					<div class="panel panel-danger">
						<div class="panel-heading">Mevcut Proje İlanları</div>
						<div class="panel-body">
							<h4>
								<table style="width:100%">
									<tr>
										<td>Proje ID</td>
										<td>Başlık</td>
									</tr>
									<?php
									if ($sonuc->num_rows > 0) {
										while ($row = $sonuc->fetch_assoc()) {
											$proje_id = $row["proje_id"];
											$başlık = $row["baslik"];
											echo '
                                <form action="ortakArayanPrfl.php" method="post">
                                <input type="hidden" name="p_id" value="' . $proje_id . '">
                                    <tr>
                                    <td>' . $proje_id . '</td>
                                    <td><input type="submit" class="btn btn-link btn-lg" value="' . $başlık . '"></td>
                                    </tr>
                                </form>
                                ';
										}
									} else {
										echo "<tr><td>Gösterilecek Proje Yok</td></tr>";
									}

									?>
								</table>
							</h4>
						</div>
					</div>
					<div class="panel panel-danger">
						<div class="panel-heading">Önceki Proje İlanları</div>
						<div class="panel-body">
							<h4>
								<table style="width:100%">
									<tr>
										<td>Proje ID</td>
										<td>Başlık</td>
									</tr>
									<?php
									$vri = "SELECT * FROM projeler WHERE e_kadi='$kadi' and valid=0";
									$sonuc = $baglanti->query($vri);
									if ($sonuc->num_rows > 0) {
										while ($row = $sonuc->fetch_assoc()) {
											$proje_id = $row["proje_id"];
											$başlık = $row["baslik"];

											echo '
                                <form action="ortakArayanPrfl.php" method="post">
                                <input type="hidden" name="p_id" value="' . $proje_id . '">
                                    <tr>
                                    <td>' . $proje_id . '</td>
                                    <td><input type="submit" class="btn btn-link btn-lg" value="' . $başlık . '"></td>
                                    </tr>
                                </form>
                                ';
										}
									} else {
										echo "<tr><td>Gösterilecek Proje Yok</td></tr>";
									}
									?>
								</table>
							</h4>
						</div>
					</div>
					<div class="panel panel-danger">
						<div class="panel-heading">Şu Anda Ortak Olunan Kişiler</div>
						<div class="panel-body">
							<h4>
								<table style="width:100%">
									<tr>
										<td>Proje ID</td>
										<td>Başlık</td>
										<td>Ortak</td>
									</tr>
									<?php
									$vri = "SELECT * FROM projeler,onayli WHERE projeler.proje_id=onayli.proje_id AND onayli.e_kadi='$kadi' AND onayli.valid=1";
									$sonuc = $baglanti->query($vri);
									if ($sonuc->num_rows > 0) {
										while ($row = $sonuc->fetch_assoc()) {
											$proje_id = $row["proje_id"];
											$başlık = $row["baslik"];
											$b_kadi = $row["b_kadi"];
											echo '
                                <form action="ortakArayanPrfl.php" method="post">
                                <input type="hidden" name="p_id" value="' . $proje_id . '">
                                    <tr>
                                    <td>' . $proje_id . '</td>
                                    <td><input type="submit" class="btn btn-link btn-lg" value="' . $başlık . '"></td>
                                    </form>
                                    <form action="ortakArayanPrfl.php" method="post">
                                    <input type="hidden" name="b_klnc" value="' . $b_kadi . '">
                                    <td><input type="submit" class="btn btn-link btn-lg" value="' . $b_kadi . '"></td>
                                    </tr>
                                </form>
                                ';
										}
									} else {
										echo "<tr><td>Gösterilecek Proje Yok</td></tr>";
									}

									?>
								</table>
							</h4>
						</div>
					</div>
					<div class="panel panel-danger">
						<div class="panel-heading">Önceden Ortak Olunan Kişiler</div>
						<div class="panel-body">
							<h4>
								<table style="width:100%">
									<tr>
										<td>Proje ID</td>
										<td>Başlık</td>
										<td>Ortak</td>
									</tr>
									<?php
									$vri = "SELECT * FROM projeler,onayli WHERE projeler.proje_id=onayli.proje_id AND onayli.e_kadi='$kadi' AND onayli.valid=0";
									$sonuc = $baglanti->query($vri);
									if ($sonuc->num_rows > 0) {
										while ($row = $sonuc->fetch_assoc()) {
											$proje_id = $row["proje_id"];
											$başlık = $row["baslik"];
											$b_kadi = $row["b_kadi"];
											echo '
                                <form action="ortakArayanPrfl.php" method="post">
                                <input type="hidden" name="p_id" value="' . $proje_id . '">
                                    <tr>
                                    <td>' . $proje_id . '</td>
                                    <td><input type="submit" class="btn btn-link btn-lg" value="' . $başlık . '"></td>
                                    </form>
                                    <form action="ortakArayanPrfl.php" method="post">
                                    <input type="hidden" name="b_klnc" value="' . $b_kadi . '">
                                    <td><input type="submit" class="btn btn-link btn-lg" value="' . $b_kadi . '"></td>
                                    </tr>
                                </form>
                                ';
										}
									} else {
										echo "<tr><td>Gösterilecek Proje Yok</td></tr>";
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