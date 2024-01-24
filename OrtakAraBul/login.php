<?php include('server.php');
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>OrtakAraBul</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="dist/css/bootstrapValidator.css">
<style>
	body{padding-top: 3%;margin: 0;}
    .container{margin: 0 auto;
        width:960px;}
</style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="page-header">
                <h2>Giriş Yap</h2>
            </div>
            <form id="girişFormu" method="post" class="form-horizontal">
                <div style="color:red;">
                    <p><?php echo $hatamsj; ?></p>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Kullanıcı Adı</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="k_adi" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Şifre</label>
                    <div class="col-sm-5">
                        <input type="password" class="form-control" name="sifre" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Kullanıcı Tipi</label>
                    <div class="col-sm-5">
                        <div class="radio">
                            <label>
                                <input type="radio" name="kullanici_tip" value="ortakbekleyen" /> Ortaklık Bekleyen
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="kullanici_tip" value="ortakarayan" /> Ortak Arayan
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2">
                        <button type="submit" name="giriş" class="btn btn-danger btn-lg">Giriş</button>&nbsp;&nbsp;&nbsp;
                        <a href="register.php"> Hesabınız yok mu? Hemen kayıt olun.</a>
                    </div>
                </div>
                <div>

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
$('#girişFormu').bootstrapValidator({ 
        fields: {
            k_adi: {
                message: 'Kullanıcı adı geçerli değil',
                validators: {
                    notEmpty: {
                        message: 'Kullanıcı adı gereklidir ve boş bırakılamaz'
                    }
                }
            },
            sifre: {
                validators: {
                    notEmpty: {
                        message: 'Şifre gereklidir ve boş bırakılamaz'
                    }
                }
            },
            kullanici_tip: {
                validators: {
                    notEmpty: {
                        message: 'Kullanıcı tipi seçilmelidir'
                    }
                }
            }
        }
    })
});
</script>
</body>
</html>