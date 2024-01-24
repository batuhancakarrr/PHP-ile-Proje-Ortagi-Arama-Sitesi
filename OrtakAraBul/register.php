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
	body{padding-top: 1%;margin: 0;}
    .container{margin: 0 auto;
        width:960px;}
</style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="page-header">
                <h2>Kayıt Ol</h2>
            </div>

            <form id="kayıtFormu" method="post" class="form-horizontal">
                <div style="color:red;">
                    <p><?php echo $hatamsj2; ?></p>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">İsim</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="isim" value="<?php echo $isim; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Kullanıcı Adı</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="k_adi" value="<?php echo $kadi; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Email</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="email" value="<?php echo $email; ?>" />
                    </div>
                </div>
                <div class="form-group">
                <label class="col-sm-4 control-label">Şifre</label>
                    <div class="col-sm-5">
                        <input type="password" class="form-control" name="sifre" value="<?php echo $şifre; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Şifreyi Tekrar Giriniz</label>
                    <div class="col-sm-5">
                        <input type="password" class="form-control" name="sifre_d" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">İletişim Numarası</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="iletisim_no" value="<?php echo $iletişimNo; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Cinsiyet</label>
                    <div class="col-sm-5">
                        <div class="radio">
                            <label>
                                <input type="radio" name="cinsiyet" value="male" /> Erkek
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="cinsiyet" value="female" /> Kadın
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Doğum Tarihi</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="dogum_tarihi" value="<?php echo $doğumTarihi; ?>" placeholder="YYYY-AA-GG" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Adres</label>
                    <div class="col-sm-5">
                    <input type="text" class="form-control" name="adres" value="<?php echo $adres; ?>" />
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
                        <button type="submit" name="kayıt" class="btn btn-danger btn-lg">Kayıt Ol</button>&nbsp;&nbsp;&nbsp;
                        <a href="login.php"> Hesabınız var mı? Hemen giriş yapın.</a>
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
    $('#kayıtFormu').bootstrapValidator({
        fields: {
            isim: {
                validators: {
                    notEmpty: {
                        message: 'İsim zorunludur ve boş bırakılamaz'
                    }
                }
            },
            k_adi: {
                message: 'Kullanıcı adı geçerli değil',
                validators: {
                    notEmpty: {
                        message: 'Kullanıcı adı gereklidir ve boş bırakılamaz'
                    },
                    stringLength: {
                        min: 6,
                        max: 25,
                        message: 'Kullanıcı adı 6 dan fazla ve 25 karakterden kısa olmalıdır'
                    },
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Email adresi gereklidir ve boş bırakılamaz'
                    },
                    emailAddress: {
                        message: 'Email adresi geçerli değil'
                    }
                }
            },
            sifre: {
                validators: {
                    notEmpty: {
                        message: 'Şifre gereklidir ve boş olamaz'
                    },
                    different: {
                        field: 'k_adi',
                        message: 'Şifre, kullanıcı adı ile aynı olamaz'
                    },
                    stringLength: {
                        min: 6,
                        message: 'Parola en az 6 karakterden oluşmalıdır'
                    }
                }
            },
            sifre_d: {
                validators: {
                    notEmpty: {
                        message: 'Parola onayı gereklidir ve boş bırakılamaz'
                    },
                    identical: {
                        field: 'sifre',
                        message: 'Şifre eşleşmedi'
                    }
                }
            },
            iletisim_no: {
                validators: {
                    notEmpty: {
                        message: 'İletişim numarası gerekli'
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'Numara geçerli değil'
                    }
                }
            },
            cinsiyet: {
                validators: {
                    notEmpty: {
                        message: 'Cinsiyet gereklidir'
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
            kullanici_tip: {
                validators: {
                    notEmpty: {
                        message: 'Kullanıcı tipi gereklidir'
                    }
                }
            }
        }
})
});
</script>
</body>

</html>