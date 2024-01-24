<?php include('server.php');
if (isset($_SESSION["k_adi"])) {
    $kadi = $_SESSION["k_adi"];
} else {
    $kadi = "";
}

if (isset($_SESSION["proje_id"])) {
    $proje_id = $_SESSION["proje_id"];
} else {
    $proje_id = "";
}

$vri = "SELECT * FROM basvuru WHERE proje_id='$proje_id' and b_kadi='$kadi'";
$sonuc = $baglanti->query($vri);
if ($sonuc->num_rows > 0) {
    $msj = "Bu proje için zaten başvurdunuz. Tekrar başvuru yapamazsınız.";
} else {
    $msj = "";
}

if (isset($_POST["basvuru"]) && $msj == "") {
    $yazı = kntrl($_POST["yazi"]);
    $teklif = kntrl($_POST["teklif"]);

    $vri = "INSERT INTO basvuru (b_kadi, proje_id, teklif, on_yazi) VALUES ('$kadi', '$proje_id', '$teklif','$yazı')";


    $sonuc = $baglanti->query($vri);
    if ($sonuc == true) {
        header("location: istekmail.php");
    }
}


?>

<!DOCTYPE html>
<html>

<head>
    <title>Proje Başvurusu</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="page-header">
                    <h2>Proje Başvurusu</h2>
                </div>

                <form id="gonderiFormu" method="post" class="form-horizontal">
                    <?php echo $msj; ?>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Bir Ön Yazı Yaz</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" rows="17" name="yazi"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Bir Teklif Ver</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="teklif" value="" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <button type="submit" name="basvuru" class="btn btn-danger btn-lg">Gönder</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="dist/js/bootstrapValidator.js"></script>

    <script>
        $(document).ready(function() {
            $('#gonderiFormu').bootstrapValidator({

                fields: {
                    yazi: {
                        validators: {
                            notEmpty: {
                                message: 'Başlık zorunludur ve boş bırakılamaz.'
                            }
                        }
                    },
                    teklif: {
                        validators: {
                            notEmpty: {
                                message: 'Teklif gereklidir ve boş bırakılamaz.'
                            },
                            stringLength: {
                                max: 11,
                                message: 'Sayı çok büyük'
                            },
                            regexp: {
                                regexp: /^[0-9]+$/,
                                message: 'Sayı geçersiz'
                            }
                        }
                    }
                }
            });
        });
    </script>

</body>

</html>