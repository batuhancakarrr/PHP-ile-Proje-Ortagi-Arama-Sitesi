<?php
if (isset($_SESSION["k_adi"])) {
    $kadi = $_SESSION["k_adi"];
    if ($_SESSION["kullanici_tip"] == 1) {
        $profil = "ortakBekleyenPrfl.php";
        $profilDüzenle = "düzenleOrtakBekleyen.php";
    } else {
        $profil = "ortakArayanPrfl.php";
        $profilDüzenle = "düzenleOrtakArayan.php";
    }
} else {
    $kadi = "";
}
?>


<nav class="navbar navbar-custom navbar-fixed-top" id="navbar">
    <div class="container">
        <div class="navbar-header">
            <a href="index.php" class="navbar-brand">OrtakAraBul</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="projeler.php">Ortaklık İlanları</a></li>
            <li><a href="ortakBekleyenler.php">Ortaklık Bekleyenler</a></li>
            <li><a href="ortakArayanlar.php">Ortak Arayanlar</a></li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Makale
                </a>
                <ul class="dropdown-menu">
                    <li><a href="makaleler.php">Tüm Makaleler</a></li>
                    <li><a href="makale_yaz.php">Makale Oluştur</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <?php echo $kadi; ?>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo $profil; ?>">Profili Görüntüle</a></li>
                    <li><a href="<?php echo $profilDüzenle; ?>">Profili Güncelle</a></li>
                    <li><a href="mesaj.php">Mesajlar</a></li>
                    <li><a href="çıkış.php">Çıkış Yap</a></li>
                </ul>
            </li>
        </ul>
    </div>

</nav>

<style>
    .navbar-custom {
        background-color: #292b2c;
        /* Arka plan rengi */
        border-color: #337ab7;
    }

    .navbar-custom .navbar-brand {
        color: #fff;
        /* Başlık metin rengi */
    }

    .navbar-custom .navbar-nav>li>a {
        color: #fff;
        /* Menü metin rengi */
    }

    .navbar-custom .navbar-nav>li>a:hover,
    .navbar-custom .navbar-nav>li>a:focus {
        color: #000;
        /* Menü metin rengi (hover/focus durumu) */
        background-color: #fff;
        /* Menü arka plan rengi (hover/focus durumu) */
    }

    .navbar-custom .dropdown-menu {
        background-color: #292b2c;
        /* Dropdown menü arka plan rengi */
    }

    .navbar-custom .dropdown-menu>li>a {
        color: #fff;
        /* Dropdown menü metin rengi */
    }

    .navbar-custom .dropdown-menu>li>a:hover,
    .navbar-custom .dropdown-menu>li>a:focus {
        color: #000;
        /* Dropdown menü metin rengi (hover/focus durumu) */
        background-color: #fff;
        /* Dropdown menü arka plan rengi (hover/focus durumu) */
    }
</style>