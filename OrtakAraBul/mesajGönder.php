<?php include('server.php');
$kadi = isset($_SESSION["k_adi"]) ? $_SESSION["k_adi"] : "";

if(isset($_SESSION["msjalc"])){
    $alıcıKadi=$_SESSION["msjalc"];
}
if(isset($_POST["gonder"])){
    $kime=$_POST["alici"];
    $mesaj=$_POST["mesaj"];
    $vri = "INSERT INTO mesaj (gönderici, alici, msj) VALUES ('$kadi', '$kime', '$mesaj')";
    $sonuc = $baglanti->query($vri);
    if($sonuc==true){
        header("location: mesaj.php");
    }
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Mesaj Gönder</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="dist/css/bootstrapValidator.css">

<style>
	body{padding-top: 3%;margin: 0;}
    .card{box-shadow: 0 4px 6px rgba(0, 0, 0, 0.4);border-radius: 10px;}</style>

</head>
<body>

<!--Navbar-->
<?php
include_once("navbar.php");
?>
<!--Navbar-->

<div class="container">
        <div class="row">
            <div class="col-md-7 col-md-offset-2">
                <div class="page-header">
                    <h2>Mesaj Gönder</h2>
                </div>
                <form id="mesajFormu" method="post" class="form-horizontal">
                <div class="form-group">
                    <label class="col-sm-4 control-label">Kime</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="alici" value="<?php echo $alıcıKadi; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Mesaj İçeriği</label>
                    <div class="col-sm-7">
                        <textarea class="form-control" rows="10" name="mesaj"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-8 col-sm-offset-2">
                        <button type="submit" name="gonder" class="btn btn-danger btn-lg">Mesaj Gönder</button>
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
    $('#mesajFormu').bootstrapValidator({
        fields: {
            alici: {
                validators: {
                    notEmpty: {
                        message: 'Burası boş bırakılamaz!!'
                    }
                }
            },
            mesaj: {
                validators: {
                    notEmpty: {
                        message: 'Burası boş bırakılamaz!!'
                    }
                }
            }  
        }
    });
});
</script>
</body>
</html>