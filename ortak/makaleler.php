<?php include('server.php');

$vri = "SELECT * FROM makale";
$sonuc = $baglanti->query($vri);
if ($sonuc->num_rows > 0) {
    while ($row = $sonuc->fetch_assoc()) {
        $baslik = $row["baslik"];
        $icerik = $row["icerik"];
        $tarih = $row["tarih"];
        $goruntulenme = $row["goruntulenme"];
    }
} else {
    echo "";
}

if (isset($_POST["baslik"])) {
    $_SESSION["baslik"] = $_POST["baslik"];
    header("location: görMakale.php");
}

if (isset($_POST["a_kadi"])) {
    $t = $_POST["a_kadi"];
    $vri = "SELECT * FROM makale WHERE k_adi='$t'";
    $sonuc = $baglanti->query($vri);
}
if (isset($_POST["a_baslik"])) {
    $t = $_POST["a_baslik"];
    $vri = "SELECT * FROM makale WHERE baslik='$t'";
    $sonuc = $baglanti->query($vri);
}


?>

<!DOCTYPE html>
<html>

<head>
    <title>Makaleler</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
            <div class="col-lg-9" style="margin-bottom: 3%;">
                <div class="card" style="padding:19px 19px 5px 19px;margin-top:19px">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <h3>Makaleler</h3>
                        </div>
                        <div class="panel-body">
                            <h4>
                                <table style="width:100%">
                                    <tr>
                                        <td>Yazar</td>
                                        <td>Makale Başlığı</td>
                                        <td>Eklenme Tarihi</td>
                                        <td>Görüntülenme Sayısı</td>
                                    </tr>
                                    <?php
                                    if ($sonuc->num_rows > 0) {
                                        foreach ($sonuc as $row) {
                                            $kadi = $row["k_adi"];
                                            $baslik = $row["baslik"];
                                            $tarih = $row["tarih"];
                                            $goruntulenme = $row["goruntulenme"];

                                            echo '
                                    <form action="makaleler.php" method="post">
                                        <input type="hidden" name="baslik" value="' . $baslik . '">
                                        <tr>
                                            <td>' . $kadi . '</td>
                                            <td><input type="submit" class="btn btn-link btn-lg" value="' . $baslik . '"></td>
                                            <td>' . $tarih . '</td>
                                            <td>' . $goruntulenme . '</td>
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
            <div class="col-lg-3">
                <div class="card" style="padding:19px 19px 5px 19px;margin-top:19px">
                    <form action="makaleler.php" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="a_kadi" style="margin-bottom:5px">
                            <center><button type="submit" class="btn btn-danger">Kullanıcı Adına Göre Ara</button></center>
                        </div>
                    </form>
                    <form action="makaleler.php" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="a_baslik" style="margin-bottom:5px">
                            <center><button type="submit" class="btn btn-danger">Başlığa Göre Ara</button></center>
                        </div>
                    </form>
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