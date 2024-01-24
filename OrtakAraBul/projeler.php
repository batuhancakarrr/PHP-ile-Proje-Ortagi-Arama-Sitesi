<?php include('server.php');
$kadi = isset($_SESSION["k_adi"]) ? $_SESSION["k_adi"] : "";

if(isset($_POST["p_id"])){
	$_SESSION["proje_id"]=$_POST["p_id"];
	header("location: projeDetay.php");
}
$vri = "SELECT * FROM projeler";
$sonuc = $baglanti->query($vri);

if(isset($_POST["a_baslik"])){
	$t=$_POST["a_baslik"];
	$vri = "SELECT * FROM projeler WHERE baslik='$t'";
	$sonuc = $baglanti->query($vri);
}
if(isset($_POST["a_tip"])){
	$t=$_POST["a_tip"];
	$vri = "SELECT * FROM projeler WHERE tip='$t'";
	$sonuc = $baglanti->query($vri);
}
if(isset($_POST["a_id"])){
	$t=$_POST["a_id"];
	$vri = "SELECT * FROM projeler WHERE proje_id='$t'";
	$sonuc = $baglanti->query($vri);
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Projeler</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css">
	<!-- <link rel="stylesheet" type="text/css" href="awesome/css/fontawesome-all.min.css"> -->

<style>
	body{padding-top: 3%;margin: 0;}
	.card{box-shadow: 0 4px 6px rgba(0, 0, 0, 0.4);border-radius: 10px;}</style>
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
        <div class="card" style="padding:19px 19px 5px 19px;margin-top:19px">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <form action="projeler.php" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="a_baslik" style="margin-bottom: 5px;">
                                <center><button type="submit" class="btn btn-danger">Proje Başlığına Göre Ara</button></center>
                            </div>
                        </form>
                    </div>

                    <div class="col-lg-4">
                        <form action="projeler.php" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="a_tip" style="margin-bottom: 5px;">
                                <center><button type="submit" class="btn btn-danger">Proje Tipine Göre Ara</button></center>
                            </div>
                        </form>
                    </div>

                    <div class="col-lg-4">
                        <form action="projeler.php" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="a_id" style="margin-bottom: 5px;">
                                <center><button type="submit" class="btn btn-danger">Proje Numarasına Göre Ara</button></center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="card" style="padding:19px 19px 5px 19px;margin-top:19px">
				<div class="panel panel-danger">
				<div class="panel-heading"><h3>Ortaklık İlanları</h3></div>
				<div class="panel-body"><h4>
					<table style="width:100%">
						<tr>
							<td>Proje Numarası</td>
							<td>Başlık</td>
							<td>Tip</td>
							<td>Yayınlayan</td>
						</tr>
						<?php 
						if ($sonuc->num_rows > 0) {
							foreach ($sonuc as $row) {
								$proje_id = $row["proje_id"];
								$başlık = $row["baslik"];
								$tip = $row["tip"];
								$e_kadi = $row["e_kadi"];
								echo '<form action="projeler.php" method="post">
										<input type="hidden" name="p_id" value="'.$proje_id.'">
										<tr>
											<td>'.$proje_id.'</td>
											<td><input type="submit" class="btn btn-link btn-lg" value="'.$başlık.'"></td>
											<td>'.$tip.'</td>
											<td>'.$e_kadi.'</td>
										</tr>
									</form>';
							}
							
							} else {
								echo "<tr><td colspan='4'>Gösterilecek bir şey yok</td></tr>";
							}
						?>
						</table>
				</h4></div>
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