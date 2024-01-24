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


$vri = "SELECT * FROM projeler WHERE proje_id='$proje_id'";
$sonuc = $baglanti->query($vri);
if ($sonuc->num_rows > 0) {
    while ($row = $sonuc->fetch_assoc()) {
        $başlık = $row["baslik"];
        $tip = $row["tip"];
        $tanım = $row["tanim"];
        $beceriler = $row["beceriler"];
        $istenen_beceriler = $row["ozel_beceriler"];
    }
}


if (isset($_POST["düzenle"])) {
    $başlık = kntrl($_POST["baslik"]);
    $tip = kntrl($_POST["tip"]);
    $tanım = kntrl($_POST["tanim"]);
    $beceriler = kntrl($_POST["beceriler"]);
    $istenen_beceriler = kntrl($_POST["ozel_beceriler"]);


    $vri = "UPDATE projeler SET baslik='$başlık',tip='$tip',tanim='$tanım', beceriler='$beceriler', ozel_beceriler='$istenen_beceriler', e_kadi='$kadi', valid=1 WHERE proje_id='$proje_id'";


    $sonuc = $baglanti->query($vri);
    if ($sonuc == true) {
        header("location: projeDetay.php");
    }
}


?>

<!DOCTYPE html>
<html>

<head>
    <title>Proje Düzenle</title>
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
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            background: #fff
        }
    </style>

</head>

<body>

    <?php
    include_once("navbar.php");
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="page-header">
                    <h2>Projeyi Düzenle</h2>
                </div>

                <form id="düzenleForm" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Proje Başlığı</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="baslik" value="<?php echo $başlık; ?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Proje Tipi</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="tip" value="<?php echo $tip; ?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Proje Tanımı</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="tanim" value="<?php echo $tanım; ?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">İstenen beceriler</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="beceriler" value="<?php echo $beceriler; ?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Özel İstekler</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="ozel_istek" value="<?php echo $istenen_beceriler; ?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <button type="submit" name="düzenle" class="btn btn-danger btn-lg">Düzenle</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    include_once("footer.php");
    ?>

    <script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="dist/js/bootstrapValidator.js"></script>

    <script>
        $(document).ready(function() {
            $('#düzenleForm').bootstrapValidator({
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