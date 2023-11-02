<?php include('server.php');
if(isset($_SESSION["k_adi"])){
	$kadi=$_SESSION["k_adi"];
	if ($_SESSION["kullanici_tip"]==1) {
		header("location: ortakBekleyenPrfl.php");
	}
	else{
		header("location: ortakArayanPrfl.php");
	}
}
else{
    $kadi="";
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>OrtakAraBul</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
</head>
<body>

<!--Navbar-->
<?php
include_once("navbar3.php");
?>
<!--Navbar-->

	<div class="container">
		<div class="jumbotron text-center">
			<h1>OrtakAraBul</h1>
			<p>Başarıya Giden Yolda Ortak Olun</p>
			<a href="register.php" class="btn btn-danger btn-lg">Ücretsiz!! Hemen Katıl!!!</a>
		</div>

		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
			</ol>

			<div class="carousel-inner" role="listbox">
				<div class="item active">
					<img src="image/nt.jpg" alt="Chania">
					<div class="carousel-caption">
						<h3>İş</h3>
						<p>Başarılı olmak için çok çalışın.</p>
					</div>
				</div>
				<div class="item">
					<img src="image/pc.jpg" alt="Chania">
					<div class="carousel-caption">
						<h3>Zaman</h3>
						<p>Zamanını boşa harcama.</p>
					</div>
				</div>
			</div>

			<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				<span class="chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Geri</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				<span class="chevron-right" aria-hidden="true"></span>
				<span class="sr-only">İleri</span>
			</a>
		</div>

		<div style="background: wheat; padding: 4%;" id="nasıl">
			<h1 class="header">Nasıl Kullanılır</h1>

			<div class="row card" style="padding:30px; margin: 30px;">
				<div class="col-lg-6">
					<h3>Ücretsiz Proje Yayınlayın</h3>
					<p>Projenizi yayınlamak her zaman ücretsizdir. Kullanıcılarımızdan hemen teklif almaya başlayacaksınız. Ayrıca sitemizde bulunan yeteneklere göz atabilir ve iletişim bilgilerinden onlara ulaşabilirsiniz.</p>
				</div>
				<div class="col-lg-6">
					<img src="image/grsl1.jpg">
				</div>
			</div>

			<div class="row card" style="padding:30px; margin: 30px;">
				<div class="col-lg-6">
					<h3>Bir Profil Oluşturun</h3>
					<p>Yapacak çok işiniz varsa bir ortağa ihtiyaç duyuyorsanız veya bir konuda uzmansanız ve bir projeye dahil olmak istiyorsanız hemen bir profil oluşturun.</p>
				</div>
				<div class="col-lg-6">
					<img src="image/kul.jpg">
				</div>
			</div>

			<div class="row card" style="padding:30px; margin: 30px;">
				<div class="col-lg-6">
					<h3>Konuşmaktan Çekinmeyin</h3>
					<p>Burada diğer kullanıcılar ile konuşmak daha kolay. Bu nedenle, herhangi biriyle proje ortağı olmadan önce onlarla konuşmaktan çekinmeyin. Onlara neye ihtiyacınız olduğunu söyleyin ve projeyi mümkün olan en kısa sürede tamamlayın.</p>
				</div>
				<div class="col-lg-6">
					<img src="image/msj.jpg">
				</div>
			</div>
		</div>
	</div>

</body>
</html>


<!--Footer-->
<?php
include("footer.php");
?>
<!--Footer-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script></body>
</html>

<style>
		.carousel-caption {
			background: rgba(0, 0, 0, 0.7);
			padding: 10px;
			bottom: 30px;
		}

		.header {
			color: wheat;
			margin-top: 30px;
			padding: 20px;
			background: gray
		}

		.card {
			background: #fff;
			border-radius: 5px;
		}
		.jumbotron {
		background-color: wheat; /* Jumbotron arkaplan rengi */
		color: gray; /* Jumbotron metin rengi */
		}
	</style>