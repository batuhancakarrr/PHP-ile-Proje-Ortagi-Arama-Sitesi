<?php include('server.php');

if(isset($_POST["b_klnc"])){
	$_SESSION["b_klnc"]=$_POST["b_klnc"];
	header("location: görOrtakBekleyen.php");
}
$vri = "SELECT * FROM ortakbekleyen";
$sonuc = $baglanti->query($vri);

if(isset($_POST["a_kadi"])){
	$t=$_POST["a_kadi"];
	$vri = "SELECT * FROM ortakbekleyen WHERE k_adi='$t'";
	$sonuc = $baglanti->query($vri);
}
if(isset($_POST["a_uzmanlik_alani"])){
	$t=$_POST["a_uzmanlik_alani"];
	$vri = "SELECT * FROM ortakbekleyen WHERE prof_baslik='$t'";
	$sonuc = $baglanti->query($vri);
}
if(isset($_POST["a_beceri"])){
	$t=$_POST["a_beceri"];
	$vri = "SELECT * FROM ortakbekleyen WHERE beceriler='$t'";
	$sonuc = $baglanti->query($vri);
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Ortaklık Bekleyenler</title>
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
        <div class="card" style="padding:19px 19px 5px 19px;margin-top:19px;width:100%">
            <div class="row">
                <div class="col-lg-4">
                    <form action="ortakBekleyenler.php" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="a_kadi" style="margin-bottom:5px">
                            <center><button type="submit" class="btn btn-danger">Kullanıcı Adına Göre Ara</button></center>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <form action="ortakBekleyenler.php" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="a_uzmanlik_alani" style="margin-bottom:5px">
                            <center><button type="submit" class="btn btn-danger">Uzmanlık Alanına Göre Ara</button></center>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <form action="ortakBekleyenler.php" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="a_beceri" style="margin-bottom:5px">
                            <center><button type="submit" class="btn btn-danger">Beceriye Göre Ara</button></center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="card" style="padding:19px 19px 5px 19px;margin-top:19px">
			<div class="panel panel-danger">
			  <div class="panel-heading"><h3>Ortaklık Bekleyenler</h3></div>
			  <div class="panel-body"><h4>
                  <table style="width:100%">
                      <tr>
                          <td>Kullanıcı Adı</td>
                          <td>İsim</td>
                          <td>Uzmanlık Alanı</td>
                          <td>Email</td>
                          <td>Beceriler</td>
                      </tr>
                      <?php 
							if ($sonuc->num_rows > 0) {
								foreach ($sonuc as $row) {
									$b_kadi = $row["k_adi"];
									$isim = $row["isim"];
									$uzmanlıkAlanı = $row["prof_baslik"];
									$email = $row["email"];
									$beceriler = $row["beceriler"];
									echo '
									<form action="ortakBekleyenler.php" method="post">
										<input type="hidden" name="b_klnc" value="'.$b_kadi.'">
										<tr>
											<td><input type="submit" class="btn btn-link btn-lg" value="'.$b_kadi.'"></td>
											<td>'.$isim.'</td>
											<td>'.$uzmanlıkAlanı.'</td>
											<td>'.$email.'</td>
											<td>'.$beceriler.'</td>
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