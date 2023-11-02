<?php include('server.php');
if (isset($_SESSION["k_adi"])) {
    $kadi = $_SESSION["k_adi"];
} else {
    $kadi = "";
}

if (isset($_SESSION["on_yazi"])) {
    $o_yazi = $_SESSION["on_yazi"];
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Ön Yazı</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css">

    <style>
        body {
            padding-top: 3%;
            margin: 0;
        }
    </style>

</head>

<body>

    <?php
    include_once("navbar.php");
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2" style="margin-bottom:9%">
                <div class="page-header">
                    <h2>Başvuru</h2>
                </div>
                <div class="page-header">
                    <h4><?php echo nl2br($o_yazi); ?></h4>
                </div>
            </div>
        </div>
    </div>

    <?php
    include_once("footer.php");
    ?>

    <script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

</body>

</html>