<?php
include("server.php");

$kadi = isset($_SESSION["k_adi"]) ? $_SESSION["k_adi"] : "";

if (isset($_POST["kaydet"])) {
    $baslik = kntrl($_POST['baslik']);
    $icerik = kntrl($_POST['icerik']);

    $sql = "INSERT INTO makale (k_adi, baslik, icerik) VALUES ('$kadi', '$baslik', '$icerik')";
    $sonuc = $baglanti->query($sql);
    $_SESSION["baslik"] = $baslik;
    header("location: görMakale.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Makale Yaz</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote/dist/summernote-lite.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote/dist/summernote-lite.min.js"></script>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f8f8f8;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .summernote {
            width: 100%;
            margin-bottom: 20px;
        }

        button {
            margin-top: 5px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button.cancel {
            margin-top: 5px;
            background-color: #ccc;
            margin-left: 10px;
        }
    </style>
</head>

<body>
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
    <div class="container">
        <h1>Makale Oluştur</h1>
        <?php if (isset($_SESSION['msg'])) : ?>
            <div class="alert">
                <?php echo $_SESSION['msg']; ?>
                <span class="close-btn" onclick="this.parentElement.style.display='none';">&times;</span>
            </div>
            <?php unset($_SESSION['msg']); ?>
        <?php endif; ?>
        <form action="makale_yaz.php" method="POST">
            <label for="baslik">Başlık:</label>
            <input type="text" name="baslik" id="baslik" autofocus required>

            <label for="icerik">İçerik:</label>
            <textarea name="icerik" id="icerik" class="summernote"></textarea>

            <button type="submit" name="kaydet">Kaydet</button>
            <button type="button" class="cancel" onclick="window.location.href='./'">İptal</button>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                placeholder: 'İçeriğinizi buraya yazınız.',
                tabsize: 2,
                height: 300
            });
        });
    </script>
</body>

</html>