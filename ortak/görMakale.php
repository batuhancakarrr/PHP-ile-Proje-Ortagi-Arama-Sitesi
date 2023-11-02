<?php include('server.php');
$kadi = isset($_SESSION["k_adi"]) ? $_SESSION["k_adi"] : "";
if ($_SESSION["kullanici_tip"] == 1) {
    $link = "ortakBekleyenPrfl.php";
} else {
    $link = "ortakArayanPrfl.php";
}

if (isset($_SESSION["baslik"])) {
    $baslik = $_SESSION["baslik"];
}

$vri = "SELECT * FROM makale WHERE baslik='$baslik'";
$sonuc = $baglanti->query($vri);

if ($sonuc->num_rows > 0) {
    while ($row = $sonuc->fetch_assoc()) {
        $yazar = $row["k_adi"];
        $icerik = $row["icerik"];
        $tarih = $row["tarih"];
        $goruntulenme = $row["goruntulenme"];

        $goruntulenme++;
        $vri = "UPDATE makale SET goruntulenme=$goruntulenme WHERE baslik='$baslik'";
        $baglanti->query($vri);
    }
} else {
    echo "";
}
$duzgun_icerik = htmlspecialchars_decode($icerik);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Profil</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Makale</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
</head>

<body>
    <style>
        @media (min-width: 768px) {
            .makale .text p {
                font-size: 16px;
            }
        }

        .makale {
            color: #56585b;
            font-family: Lora, serif;
            font-size: 14px;
        }

        .makale .baslik p {
            color: #929292;
            font-size: 12px;
        }

        .makale .baslik p .by {
            font-style: italic;
        }

        .makale .baslik p .zaman {
            text-transform: uppercase;
            padding: 4px 0 4px 10px;
            margin-left: 10px;
            border-left: 1px solid #ddd;
        }
    </style>
    <div>
        <nav class="navbar navbar-light navbar-expand-md navigation-clean-button">
            <div class="container"><a class="navbar-brand" href="index.php">OrtakAraBul</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav mr-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link" href="makaleler.php">Makaleler</a></li>
                </div>
            </div>
        </nav>
    </div>

    <div class="makale">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-8 offset-lg-1 offset-xl-2" style="margin-bottom: 15%">
                    <div class="baslik">
                        <h1 class="text-center"><?php echo $baslik ?></h1>
                        <p class="text-center"><span class="by">by</span> <a href="<?php echo $link ?>"><?php echo $kadi ?></a><span class="zaman"><?php echo $tarih ?> </span></p>
                    </div>
                    <div class="text">
                        <?php
                        echo $duzgun_icerik;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>