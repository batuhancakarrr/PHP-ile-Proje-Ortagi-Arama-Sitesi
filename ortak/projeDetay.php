<?php include('server.php');
if (isset($_SESSION["k_adi"])) {
	$kadi = $_SESSION["k_adi"];
	if ($_SESSION["kullanici_tip"] == 1) {
		$onay = "projeBasvuru.php";
		$text = "Projeye başvur";
	} else {
		$onay = "düzenleProje.php";
		$text = "Projeyi düzenle";
	}
} else {
	$kadi = "";
}
if (isset($_SESSION["proje_id"])) {
	$proje_id = $_SESSION["proje_id"];
} else {
	$proje_id = "";
}
if (isset($_POST["b_klnc"])) {
	$_SESSION["b_klnc"] = $_POST["b_klnc"];
	$_SESSION["msjalc"] = $kadi;
	header("location: görOrtakBekleyen.php");
}
if (isset($_POST["on_yazi"])) {
	$_SESSION["on_yazi"] = $_POST["on_yazi"];
	header("location: önYazı.php");
}
if (isset($_POST["b_onay"])) {
	$b_onay = $_POST["b_onay"];
	$b_ucret = $_POST["b_ucret"];
	$vri = "INSERT INTO onayli (b_kadi, proje_id, e_kadi, ucret, valid) VALUES ('$b_onay', '$proje_id', '$kadi','$b_ucret',1)";

	$sonuc = $baglanti->query($vri);
	if ($sonuc == true) {
		$vri = "DELETE FROM basvuru WHERE proje_id='$proje_id'";
		$sonuc = $baglanti->query($vri);
		if ($sonuc == true) {
			$vri = "UPDATE projeler SET valid=0 WHERE proje_id='$proje_id'";
			$sonuc = $baglanti->query($vri);
			if ($sonuc == true) {
				header("location: projeDetay.php");
			}
		}
	}
}
if (isset($_POST["b_bitir"])) {
	$b_bitir = $_POST["b_bitir"];
	$vri = "UPDATE onayli SET valid=0 WHERE proje_id='$proje_id'";
	$sonuc = $baglanti->query($vri);
	if ($sonuc == true) {
		header("location: projeDetay.php");
	}
}

$vri = "SELECT * FROM projeler WHERE proje_id='$proje_id'";
$sonuc = $baglanti->query($vri);
if ($sonuc->num_rows > 0) {
	while ($row = $sonuc->fetch_assoc()) {
		$a_kadi = $row["e_kadi"];
		$başlık = $row["baslik"];
		$tip = $row["tip"];
		$tanım = $row["tanim"];
		$beceriler = $row["beceriler"];
		$özelİstekler = $row["ozel_beceriler"];
		$valid = $row["valid"];
	}
} else {
	echo "";
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Proje Detayları</title>
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
			<div class="col-lg-9">
				<div class="card" style="padding:19px 19px 5px 19px;margin-top:19px">
					<div class="panel panel-danger">
						<div class="panel-heading">
							<h3>Proje Detayları</h3>
						</div>
					</div>
					<div class="panel panel-danger">
						<div class="panel-heading">Proje Başlığı</div>
						<div class="panel-body">
							<h4><?php echo $başlık; ?></h4>
						</div>
					</div>
					<div class="panel panel-danger">
						<div class="panel-heading">Proje Tipi</div>
						<div class="panel-body">
							<h4><?php echo $tip; ?></h4>
						</div>
					</div>
					<div class="panel panel-danger">
						<div class="panel-heading">Proje Tanımı</div>
						<div class="panel-body">
							<h4><?php echo $tanım; ?></h4>
						</div>
					</div>
					<div class="panel panel-danger">
						<div class="panel-heading">İstenen Beceriler</div>
						<div class="panel-body">
							<h4><?php echo $beceriler; ?></h4>
						</div>
					</div>
					<div class="panel panel-danger">
						<div class="panel-heading">Özel Gereksinimler</div>
						<div class="panel-body">
							<h4><?php echo $özelİstekler; ?></h4>
						</div>
					</div>
					<div>
						<a href="<?php echo $onay; ?>" id="istek" type="button" class="btn btn-danger btn-lg"><?php echo $text; ?></a>
					</div>
					<p></p>
				</div>
			</div>

			<?php
			$vri = "SELECT * FROM ortakarayan WHERE k_adi='$a_kadi'";
			$sonuc = $baglanti->query($vri);
			if ($sonuc->num_rows > 0) {
				while ($row = $sonuc->fetch_assoc()) {
					$a_isim = $row["isim"];
					$email = $row["email"];
					$iletişimNo = $row["iletisim_no"];
					$adres = $row["adres"];
				}
			} else {
				echo "";
			}
			?>

			<div class="col-lg-3">
				<div class="card" style="padding:19px 19px 5px 19px;margin-top:19px">
					<p></p>
					<img src="image/kul.jpg">
					<h2><?php echo $a_isim; ?></h2>
					<p><span class="klnc"></span> <?php echo $a_kadi; ?></p>
					<center><a href="mesajGönder.php" class="btn btn-danger"><span class="mesaj"></span> Mesaj Gönder</a></center>
					<p></p>
				</div>

				<div class="card" style="padding:19px 19px 5px 19px;margin-top:19px">
					<div class="panel panel-danger">
						<div class="panel-heading">
							<h4>İletişim Bilgileri</h4>
						</div>
					</div>
					<div class="panel panel-danger">
						<div class="panel-heading">Email</div>
						<div class="panel-body"><?php echo $email; ?></div>
					</div>
					<div class="panel panel-danger">
						<div class="panel-heading">Telefon</div>
						<div class="panel-body"><?php echo $iletişimNo; ?></div>
					</div>
					<div class="panel panel-danger">
						<div class="panel-heading">Adres</div>
						<div class="panel-body"><?php echo $adres; ?></div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<!--Başvuranlar kısmı-->
			<div class="col-lg-12">
				<div id="applicant" class="card" style="padding:19px 19px 5px 19px;margin-top:19px">
					<div class="panel panel-danger">
						<div class="panel-heading">
							<h3>Bu proje için başvuranlar</h3>
						</div>
						<div class="panel-body">
							<h4>
								<table style="width:100%">
									<tr>
										<td>Başvuranın kullanıcı adı</td>
										<td>Teklif</td>
									</tr>
									<?php
									$sql = "SELECT * FROM basvuru WHERE proje_id='$proje_id' ORDER BY teklif";
									$result = $baglanti->query($sql);
									if ($result->num_rows > 0) {
										while ($row = $result->fetch_assoc()) {
											$b_kadi = $row["b_kadi"];
											$teklif = $row["teklif"];
											$on_yazi = $row["on_yazi"];

											echo '
								<form action="projeDetay.php" method="post">
								<input type="hidden" name="b_klnc" value="' . $b_kadi . '">
									<tr>
									<td><input type="submit" class="btn btn-link btn-lg" value="' . $b_kadi . '"></td>
									<td>' . $teklif . '</td>
									</form>
									<form action="projeDetay.php" method="post">
									<input type="hidden" name="on_yazi" value="' . $on_yazi . '">
									<td><input type="submit" class="btn btn-link btn-lg" value="Ön Yazı"></td>
									</form>
									<form action="projeDetay.php" method="post">
									<input type="hidden" name="b_onay" value="' . $b_kadi . '">
									<input type="hidden" name="b_ucret" value="' . $teklif . '">
									<td><input type="submit" class="btn btn-link btn-lg" value="Onayla"></td>
									</tr>
								</form>';
										}
									} else {
										$sql = "SELECT * FROM onayli WHERE proje_id='$proje_id'";
										$result = $baglanti->query($sql);
										if ($result->num_rows > 0) {
											while ($row = $result->fetch_assoc()) {
												$b_kadi = $row["b_kadi"];
												$teklif = $row["ucret"];
												$v = $row["valid"];

												if ($v == 0) {
													$tc = "Proje bitti";
													$tv = "";
												} else {
													$tc = "Projeyi bitir";
													$tv = "b_bitir";
												}

												echo '
										<form action="projeDetay.php" method="post">
										<input type="hidden" name="b_klnc" value="' . $b_kadi . '">
											<tr>
											<td><input type="submit" class="btn btn-link btn-lg" value="' . $b_kadi . '"></td>
											<td>' . $teklif . '</td>
											</form>
											<form action="projeDetay.php" method="post">
											<input type="hidden" name="' . $tv . '" value="' . $b_kadi . '">
											<td><input type="submit" class="btn btn-link btn-lg" value="' . $tc . '"></td>
											</tr>
										</form>

																	
										';
											}
										} else {
											echo "<tr><td colspan='4'> </br>Projeye başvuran yok</td></tr>";
										}
									}

									?>
								</table>
							</h4>
						</div>
					</div>
					<p></p>
				</div>
			</div>
			<!--Başvuranlar kısmı-->
		</div>
		<div class="row">
			<!-- Soru-Cevap Bölümü -->
			<div class="col-lg-12">
				<div id="question-answer" class="card" style="padding:19px 19px 5px 19px;margin-top:19px">
					<div class="panel panel-danger">
						<div class="panel-heading">
							<h3>Soru-Cevap</h3>
						</div>
					</div>
					<?php
					if ($a_kadi != $kadi) {
						echo '
                <form action="projeDetay.php" method="post">
                    <div class="form-group">
                        <textarea name="soru" class="form-control" rows="3" placeholder="Soru Sor"></textarea>
                    </div>
                    <input type="submit" class="btn btn-danger" value="Soru Gönder"><p></p>
                </form>
                ';
					}

					if ($_SERVER["REQUEST_METHOD"] == "POST") {
						if (isset($_POST["soru"])) {
							$soru = $_POST["soru"];
							$query = "INSERT INTO soru_cevap (proje_id, soru) VALUES ('$proje_id', '$soru')";
							$result = mysqli_query($baglanti, $query);
						}
						// Cevap gönderildiyse
						elseif (isset($_POST["cevap"]) && isset($_POST["soru_id"])) {
							$cevap = $_POST["cevap"];
							$soru_id = $_POST["soru_id"];
							$query = "UPDATE soru_cevap SET cevap='$cevap' WHERE id='$soru_id' AND proje_id='$proje_id'";
							$result = mysqli_query($baglanti, $query);

							if ($result) {
								// Başarılı bir şekilde cevap eklendi
								// İstediğiniz yönlendirme veya mesajları burada yapabilirsiniz
							} else {
								// Cevap eklenirken hata oluştu
								// Hata mesajını burada gösterebilir veya işlem yapabilirsiniz
							}
						}
					}

					// Soruları listele
					$query = "SELECT * FROM soru_cevap WHERE proje_id='$proje_id' ORDER BY tarih DESC";
					$result = mysqli_query($baglanti, $query);

					if (mysqli_num_rows($result) > 0) {
						echo '<div class="panel panel-danger">
                        <div class="panel-heading">
                            <h4>Sorular</h4>
                        </div>
                    </div>
                    <div class="panel panel-danger">
                        <div class="panel-body">
                            <ul>';

						while ($row = mysqli_fetch_assoc($result)) {
							$soru = $row["soru"];
							$cevap = $row["cevap"];
							$soru_id = $row["id"];

							echo '<li><strong>Soru:</strong> ' . $soru . '</li>';

							// Sadece proje sahibi soruları cevaplayabilir
							if ($a_kadi == $kadi && empty($cevap)) {
								echo '
                        <form action="projeDetay.php" method="post">
                            <div class="form-group">
                                <input type="hidden" name="soru_id" value="' . $soru_id . '">
                                <textarea name="cevap" class="form-control" rows="3" placeholder="Cevap Yaz"></textarea>
                            </div>
                            <input type="submit" class="btn btn-danger" value="Cevapla">
                        </form>';
							}

							if (!empty($cevap)) {
								echo '<li><strong>Cevap:</strong> ' . $cevap . '</li>';
							}

							echo '<hr>';
						}

						echo '</ul></div></div>';
					} else {
						echo '<p>Henüz soru sorulmamış.</p>';
					}

					?>
				</div>
			</div>
			<!-- Soru-Cevap Bölümü -->

			<!-- Diğer kodlar devam eder... -->


		</div>
	</div>

	<!--Footer-->
	<?php
	include("footer.php");
	?>
	<!--Footer-->

	<script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

	<?php

	if ($a_kadi != $kadi && $_SESSION["kullanici_tip"] != 1) {
		echo "<script>
		        $('#istek').hide();
		</script>";
	}

	if ($_SESSION["kullanici_tip"] == 1 && $valid == 0) {
		echo "<script>
		        $('#istek').hide();
		</script>";
	}

	if ($a_kadi != $kadi) {
		echo "<script>
		        $('#applicant').hide();
		</script>";
	}


	?>

</body>

</html>