<?php include('server.php');

$kadi = isset($_SESSION["k_adi"]) ? $_SESSION["k_adi"] : "";

$vri = "SELECT * FROM ortakarayan WHERE k_adi='$kadi'";
$sonuc = $baglanti->query($vri);

if ($sonuc->num_rows == 1) {
    $row = $sonuc->fetch_assoc();
    $isim = $row["isim"];
    $email = $row["email"];
    $iletişimNo = $row["iletisim_no"];
    $cinsiyet = $row["cinsiyet"];
    $doğumTarihi = $row["dogum_tarihi"];
    $adres = $row["adres"];
    $profilÖzet = $row["profil_ozet"];
    $şirket = $row["sirket"];
} else {
    echo "hata";
}

if (isset($_POST["düzenleOrtakArayan"])) {
    $isim = kntrl($_POST["isim"]);
    $email = kntrl($_POST["email"]);
    $iletişimNo = kntrl($_POST["iletisim_no"]);
    $cinsiyet = kntrl($_POST["cinsiyet"]);
    $doğumTarihi = kntrl($_POST["dogum_tarihi"]);
    $adres = kntrl($_POST["adres"]);
    $profilÖzet = kntrl($_POST["profil_ozet"]);
    $şirket = kntrl($_POST["sirket"]);

    $vri = "UPDATE ortakarayan SET isim='$isim',email='$email',iletisim_no='$iletişimNo', adres='$adres', cinsiyet='$cinsiyet', profil_ozet='$profilÖzet', dogum_tarihi='$doğumTarihi', sirket='$şirket' WHERE k_adi='$kadi'";

    $sonuc = $baglanti->query($vri);
    if ($sonuc == true) {
        header("location: ortakArayanPrfl.php");
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
    
    .card{box-shadow: 0 4px 6px rgba(0, 0, 0, 0.4);border-radius: 10px;}
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
          <h2>Profil Ayarları</h2>
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
            <label class="col-sm-2 control-label">Adres</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="adres" value="<?php echo $adres; ?>" />
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Şirket Adı</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="sirket" value="<?php echo $şirket; ?>" />
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Profil Özeti</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="profil_ozet" value="<?php echo $profilÖzet; ?>" />
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" name="düzenleOrtakArayan" class="btn btn-danger btn-lg">Değişiklikleri Kaydet</button>
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
            k_adi: {
                message: 'Kullanıcı adı gerekli ve boş bırakılamaz',
                validators: {
                    notEmpty: {
                        message: 'Kullanıcı adı gereklidir ve boş bırakılamaz'
                    },
                    stringLength: {
                        min: 6,
                        max: 25,
                        message: 'Kullanıcı adı 6 dan fazla ve 25 karakterden kısa olmalıdır.'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9]+$/,
                        message: 'Kullanıcı adı yalnızca alfabetik ve sayıdan oluşabilir'
                    },
                    different: {
                        field: 'password',
                        message: 'Kullanıcı adı ve şifre birbiriyle aynı olamaz'
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
            sifre: {
                validators: {
                    notEmpty: {
                        message: 'Parola gereklidir ve boş olamaz'
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
                        field: 'password',
                        message: 'Şifreler eşleşmiyor'
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
            cinsiyet: {
                validators: {
                    notEmpty: {
                        message: 'Cinsiyet giriniz'
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
                        message: 'Kullanıcı türü gereklidir'
                    }
                }
            }
        }
    });
});
</script>

</body>
</html>