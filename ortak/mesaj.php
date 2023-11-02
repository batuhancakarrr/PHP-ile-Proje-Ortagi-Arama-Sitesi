<?php include('server.php');
$kadi = isset($_SESSION["k_adi"]) ? $_SESSION["k_adi"] : "";

$vri = "SELECT * FROM mesaj WHERE alici='$kadi' ORDER BY zaman DESC";
$sonuc = $baglanti->query($vri);
$f = 0;

if (isset($_POST["m"])) {
	$t = $_POST["m"];
	$vri = "SELECT * FROM ortakbekleyen WHERE k_adi='$t'";
	$sonuc = $baglanti->query($vri);
	if ($sonuc->num_rows > 0) {
		$_SESSION["b_klnc"] = $t;
		header("location: görOrtakBekleyen.php");
	} else {
		$vri = "SELECT * FROM ortakarayan WHERE k_adi='$t'";
		$sonuc = $baglanti->query($vri);
		if ($sonuc->num_rows > 0) {
			$_SESSION["a_klnc"] = $t;
			header("location: görOrtakArayan.php");
		}
	}
}
if (isset($_POST["gln_ara_kadi"])) {
	$t = $_POST["gln_ara_kadi"];
	$vri = "SELECT * FROM mesaj WHERE alici='$kadi' and gönderici='$t'";
	$sonuc = $baglanti->query($vri);
	$f = 0;
}
if (isset($_POST["gdn_ara_kadi"])) {
	$t = $_POST["gdn_ara_kadi"];
	$vri = "SELECT * FROM mesaj WHERE gönderici='$kadi' and alici='$t'";
	$sonuc = $baglanti->query($vri);
	$f = 1;
}
if (isset($_POST["gln_msj"])) {
	$vri = "SELECT * FROM mesaj WHERE alici='$kadi' ORDER BY zaman DESC";
	$sonuc = $baglanti->query($vri);
	$f = 0;
}
if (isset($_POST["gdn_msj"])) {
	$vri = "SELECT * FROM mesaj WHERE gönderici='$kadi' ORDER BY zaman DESC";
	$sonuc = $baglanti->query($vri);
	$f = 1;
}
if (isset($_POST["yntl"])) {
	$_SESSION["msjalc"] = $_POST["yntl"];
	header("location: mesajGönder.php");
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Mesajlar</title>
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
			<div class="col-lg-12">
				<div class="card col-lg-12" style="padding:19px 19px 5px 19px;margin-top:19px">
					<p></p>
					<form action="mesaj.php" method="post">
						<div class="form-group col-lg-3">
							<input type="text" class="form-control" name="gln_ara_kadi" style="margin-bottom: 5px;">
							<center><button type="submit" class="btn btn-danger">Gelen Mesajlarda Kullanıcı Adı Ara</button></center>
						</div>
					</form>
					<form action="mesaj.php" method="post">
						<div class="form-group col-lg-3">
							<input type="text" class="form-control" name="gdn_ara_kadi" style="margin-bottom: 5px;">
							<center><button type="submit" class="btn btn-danger">Giden Mesajlarda Kullanıcı Adı Ara</button></center>
						</div>
					</form>
					<form action="mesaj.php" method="post">
						<div class="form-group col-lg-3">
							<center><button type="submit" name="gln_msj" class="btn btn-warning">Gelen Mesajlar</button></center>
						</div>
					</form>
					<form action="mesaj.php" method="post">
						<div class="form-group col-lg-3">
							<center><button type="submit" name="gdn_msj" class="btn btn-warning">Gönderilen Mesajlar</button></center>
						</div>
					</form>
					<p></p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="card" style="padding:19px 19px 5px 19px;margin-top:19px">
					<div class="panel panel-danger">
						<div class="panel-heading">
							<h3>Bütün Mesajlar</h3>
						</div>
						<div class="panel-body">
							<h4>
								<table style="width:100%">
									<tr>
										<td>Mesaj</td>
										<td>Kullanıcı Adı</td>
									</tr>
									<?php
									if ($sonuc->num_rows > 0) {
										foreach ($sonuc as $row) {
											$gönderici = $row["gönderici"];
											$alıcı = $row["alici"];
											$msj = $row["msj"];
											$zaman = $row["zaman"];

											if ($f == 0) {
												$m = $gönderici;
											} else {
												$m = $alıcı;
											}
											echo '
								<form action="mesaj.php" method="post">
									<input type="hidden" name="m" value="' . $m . '">
									<tr>
										<td>' . $msj . '</td>
										<td><input type="submit" class="btn-link btn-lg" value="' . $m . '"></td>
								</form>
								<form action="mesaj.php" method="post">
									<input type="hidden" name="yntl" value="' . $m . '">
									<td><input type="submit" class="btn-link btn-lg" value="Yanıtla"></td>
									<td>' . $zaman . '</td>
									</tr>
								</form>';
										}
									} else {
										echo "<tr><td colspan='4'>Gösterilecek bir şey yok</td></tr>";
									}
									?>
								</table>
							</h4>
						</div>
					</div>
					<p></p>
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