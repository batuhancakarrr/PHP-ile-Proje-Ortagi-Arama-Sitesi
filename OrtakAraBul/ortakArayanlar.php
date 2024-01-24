<?php include('server.php');

if (isset($_POST["a_klnc"])) {
    $_SESSION["a_klnc"] = $_POST["a_klnc"];
    header("location: görOrtakArayan.php");
}

$vri = "SELECT * FROM ortakarayan";
$sonuc = $baglanti->query($vri);

if (isset($_POST["a_kadi"])) {
    $t = $_POST["a_kadi"];
    $vri = "SELECT * FROM ortakarayan WHERE k_adi='$t'";
    $sonuc = $baglanti->query($vri);
}
if (isset($_POST["a_isim"])) {
    $t = $_POST["a_isim"];
    $vri = "SELECT * FROM ortakarayan WHERE isim='$t'";
    $sonuc = $baglanti->query($vri);
}
if (isset($_POST["a_email"])) {
    $t = $_POST["a_email"];
    $vri = "SELECT * FROM ortakarayan WHERE email='$t'";
    $sonuc = $baglanti->query($vri);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Ortak Arayanlar</title>
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
            <div class="col-lg-12">
                <div class="card" style="padding:19px 19px 5px 19px;margin-top:19px">
                    <div class="row">
                        <div class="col-lg-4">
                            <form action="ortakArayanlar.php" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="a_kadi" style="margin-bottom:5px">
                                    <center><button type="submit" class="btn btn-danger">Kullanıcı Adına Göre Ara</button></center>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-4">
                            <form action="ortakArayanlar.php" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="a_isim" style="margin-bottom:5px">
                                    <center><button type="submit" class="btn btn-danger">İsime Göre Ara</button></center>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-4">
                            <form action="ortakArayanlar.php" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="a_email" style="margin-bottom:5px">
                                    <center><button type="submit" class="btn btn-danger">Emaile Göre Ara</button></center>
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
                        <div class="panel-heading">
                            <h3>Bütün Ortak Arayanlar</h3>
                        </div>
                        <div class="panel-body">
                            <h4>
                                <table style="width:100%">
                                    <tr>
                                        <td>Kullanıcı Adı</td>
                                        <td>İsim</td>
                                        <td>Email</td>
                                        <td>Şirket</td>
                                    </tr>
                                    <?php
                                    if ($sonuc->num_rows > 0) {
                                        foreach ($sonuc as $row) {
                                            $a_kadi = $row["k_adi"];
                                            $isim = $row["isim"];
                                            $email = $row["email"];
                                            $şirket = $row["sirket"];
                                            echo '
                                    <form action="ortakArayanlar.php" method="post">
                                        <input type="hidden" name="a_klnc" value="' . $a_kadi . '">
                                        <tr>
                                            <td><input type="submit" class="btn btn-link btn-lg" value="' . $a_kadi . '"></td>
                                            <td>' . $isim . '</td>
                                            <td>' . $email . '</td>
                                            <td>' . $şirket . '</td>
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