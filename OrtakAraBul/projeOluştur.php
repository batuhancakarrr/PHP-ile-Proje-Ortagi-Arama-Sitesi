<?php include('server.php');
$kadi = isset($_SESSION["k_adi"]) ? $_SESSION["k_adi"] : "";

if (isset($_POST["projeOluştur"])) {
    $başlık = kntrl($_POST["baslik"]);
    $tip = kntrl($_POST["tip"]);
    $tanım = kntrl($_POST["tanim"]);
    $beceriler = kntrl($_POST["beceriler"]);
    $özel_istekler = kntrl($_POST["ozel_beceriler"]);

    $vri = "INSERT INTO projeler (baslik, tip, tanim, beceriler, ozel_beceriler, e_kadi, valid) VALUES ('$başlık', '$tip', '$tanım', '$beceriler','$özel_istekler','$kadi',1)";
    $sonuc = $baglanti->query($vri);
    if ($sonuc == true) {
        $_SESSION["proje_id"] = $baglanti->insert_id;
        header("location: projeDetay.php");
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Proje Oluştur</title>
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
                    <h2>Bir Proje İlanı Oluştur</h2>
                </div>
                <form id="projeForm" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Proje Başlığı</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="baslik" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Proje Tipi</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="tip" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Proje Tanımı</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="tanim" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">İstenilen Beceriler</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="beceriler" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Özel İstekler</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="ozel_beceriler" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <button type="submit" name="projeOluştur" class="btn btn-danger btn-lg">Oluştur</button>
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
            $('#projeForm').bootstrapValidator({
                fields: {
                    baslik: {
                        validators: {
                            notEmpty: {
                                message: 'Başlık zorunludur ve boş bırakılamaz'
                            }
                        }
                    },
                    tip: {
                        validators: {
                            notEmpty: {
                                message: 'Tip gereklidir ve boş bırakılamaz'
                            }
                        }
                    },
                    tanim: {
                        validators: {
                            notEmpty: {
                                message: 'Tanım zorunludur ve boş bırakılamaz'
                            }
                        }
                    },
                }
            });
        });
    </script>
</body>

</html>