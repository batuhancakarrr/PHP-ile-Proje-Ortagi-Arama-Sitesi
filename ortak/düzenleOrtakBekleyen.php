<?php include('server.php');
$kadi = isset($_SESSION["k_adi"]) ? $_SESSION["k_adi"] : "";

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

if (isset($_POST["düzenleOrtakBekleyen"])) {
    $isim = kntrl($_POST["isim"]);
    $email = kntrl($_POST["email"]);
    $iletişimNo = kntrl($_POST["iletisim_no"]);
    $cinsiyet = kntrl($_POST["cinsiyet"]);
    $doğumTarihi = kntrl($_POST["dogum_tarihi"]);
    $adres = kntrl($_POST["adres"]);
    $uzmanlıkAlanı = kntrl($_POST["prof_baslik"]);
    $beceriler = kntrl($_POST["beceriler"]);
    $profilÖzet = kntrl($_POST["profil_ozet"]);
    $eğitim = kntrl($_POST["egitim"]);
    $deneyim = kntrl($_POST["deneyim"]);


    $vri = "UPDATE ortakbekleyen SET isim='$isim',email='$email',iletisim_no='$iletişimNo', adres='$adres', cinsiyet='$cinsiyet',prof_baslik='$uzmanlıkAlanı',profil_ozet='$profilÖzet',egitim='$eğitim',deneyim='$deneyim', dogum_tarihi='$doğumTarihi', beceriler='$beceriler' WHERE k_adi='$kadi'";


    $sonuc = $baglanti->query($vri);
    if ($sonuc == true) {
        header("location: ortakBekleyenPrfl.php");
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Profil</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="dist/css/bootstrapValidator.css">

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


    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="page-header">
                    <h2>Profili Düzenle</h2>
                </div>

                <form id="kontrolFormu" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">İsim</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="isim" value="<?php echo $isim; ?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="email" value="<?php echo $email; ?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">İletişim Numarası</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="iletisim_no" value="<?php echo $iletişimNo; ?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Doğum Tarihi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="dogum_tarihi" placeholder="YYYY/AA/GG" value="<?php echo $doğumTarihi; ?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Adres</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="adres" value="<?php echo $adres; ?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Uzmanlık Alanı</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="prof_baslik" value="<?php echo $uzmanlıkAlanı; ?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Beceriler</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="beceriler" value="<?php echo $beceriler; ?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Profil Özeti</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="profil_ozet" value="<?php echo $profilÖzet; ?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Eğitim</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="egitim" value="<?php echo $eğitim; ?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Deneyim</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="deneyim" value="<?php echo $deneyim; ?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <button type="submit" name="düzenleOrtakBekleyen" class="btn btn-danger btn-lg">Değişiklikleri Kaydet</button>
                        </div>
                    </div>
                </form>
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
    <script type="text/javascript" src="dist/js/bootstrapValidator.js"></script>

    <script>
        $(document).ready(function() {
            $('#kontrolFormu').bootstrapValidator({
                fields: {
                    isim: {
                        validators: {
                            notEmpty: {
                                message: 'İsim zorunludur ve boş bırakılamaz'
                            }
                        }
                    },
                    email: {
                        validators: {
                            notEmpty: {
                                message: 'E-posta adresi gereklidir ve boş bırakılamaz'
                            },
                            emailadres: {
                                message: 'E-posta adresi geçerli değil'
                            }
                        }
                    },
                    iletisim_no: {
                        validators: {
                            notEmpty: {
                                message: 'İletişim numarası giriniz'
                            },
                            regexp: {
                                regexp: /^[0-9]+$/,
                                message: 'Numara geçerli değil'
                            }
                        }
                    },
                    dogum_tarihi: {
                        validators: {
                            notEmpty: {
                                message: 'Doğum tarihi gereklidir'
                            },
                            date: {
                                format: 'YYYY-MM-DD',
                                message: 'Doğum tarihi geçerli değil'
                            }
                        }
                    },
                    adres: {
                        validators: {
                            notEmpty: {
                                message: 'Adres gereklidir'
                            }
                        }
                    },
                }
            });
        });
    </script>

</body>

</html>