<?php
global $wp;
$cur_url = home_url($wp->request)
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="<?= base_url() ?>/assets/owl-carousel/assets/owl.carousel.css" rel='stylesheet'>
    <link href="<?= base_url() ?>/assets/owl-carousel/assets/owl.theme.default.css" rel='stylesheet'>
    <link href="<?= base_url() ?>/assets/font-awesome/web-fonts-with-css/css/fontawesome-all.min.css" rel='stylesheet'>
    <link href="<?= base_url() ?>/assets/styles/homePage.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>/assets/styles/media.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>/assets/styles/napTien.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>/assets/styles/simSoDep.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>/assets/styles/dangKy4g.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/styles/semantic/semantic.min.css">
    <link href="<?= base_url() ?>/assets/fonts/fonts.css" rel='stylesheet'>
    <script src="<?= base_url() ?>/assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
</head>

<body>
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function () {
        FB.init({
            xfbml: true,
            version: 'v4.0'
        });
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- Your customer chat code -->
<div class="fb-customerchat"
     attribution=setup_tool
     page_id="363173421096027"
     theme_color="#0084ff"
     logged_in_greeting="Chào bạn! Bạn cần tư vấn gì ạ ?"
     logged_out_greeting="Chào bạn! Bạn cần tư vấn gì ạ ?">
</div>
<div class="header">
    <div class="headerLeft">
        <div class="headerLogo">
            <img src="<?= base_url() ?>/assets/images/logo.png">
        </div>
        <div class="hamburger">
            <img onClick="toggleDropdownContainer()" src="<?= base_url() ?>/assets/images/nav_menu.png">
        </div>
    </div>
    <div class=dropdownContainer>
        <button class="hamburgerDropdown <?= ($cur_url == get_site_url()) ? 'simSoDep' : '' ?>"
                onclick="location.href = '<?= get_site_url() ?>'">HOME
        </button>
        <button class="hamburgerDropdown <?= ($cur_url == get_site_url('', 'sim-so-dep')) ? 'simSoDep' : '' ?>"
                onclick="location.href = '<?= get_site_url('', 'sim-so-dep') ?>'">SIM SỐ ĐẸP
        </button>
        <button class="hamburgerDropdown <?= ($cur_url == get_site_url('', 'nap-tien')) ? 'simSoDep' : '' ?>"
                onclick="location.href = '<?= get_site_url('', 'nap-tien') ?>'">NẠP TIỀN</button>
        <button class="hamburgerDropdown <?= ($cur_url == get_site_url('', 'dang-ky-4g')) ? 'simSoDep' : '' ?>"
                onclick="location.href = '<?= get_site_url('', 'dang-ky-4g') ?>'">ĐĂNG KÝ 4G ONLINE</button>
        <button class="hamburgerDropdown">CHUYỂN SANG MOBI</button>
        <button class="hamburgerDropdown lienHe">LIÊN HỆ</button>
    </div>
    <div class=headerRight>
        <div class="headerUpper">
            <div class="headerHotLine">
                <span> <img src="<?= base_url() ?>/assets/images/phone.svg"> </span>
                <a href="tel:0773885678" class="text">Hotline 077 388 5678</a>
            </div>
            <div class="HeaderAddress">Điểm giao dịch:</br>249 Minh Phụng, P.2, Q11</div>
        </div>

        <div class="headerLower">
            <button class="navigationButton threeDimensionBlueButton threeDimensionShortWhiteButton <?= ($cur_url == get_site_url()) ? 'simSoDep' : '' ?>"
                    onclick="location.href = '<?= get_site_url() ?>'">HOME
            </button>
            <button class="navigationButton threeDimensionBlueButton threeDimensionShortWhiteButton <?= ($cur_url == get_site_url('', 'sim-so-dep')) ? 'simSoDep' : '' ?>"
                    onclick="location.href = '<?= get_site_url('', 'sim-so-dep') ?>'">SIM SỐ ĐẸP
            </button>
            <button class="navigationButton threeDimensionBlueButton threeDimensionShortWhiteButton <?= ($cur_url == get_site_url('', 'nap-tien')) ? 'simSoDep' : '' ?>"
                    onclick="location.href = '<?= get_site_url('', 'nap-tien') ?>'">NẠP TIỀN</button>
            <button class="navigationButton threeDimensionBlueButton threeDimensionShortWhiteButton <?= ($cur_url == get_site_url('', 'dang-ky-4g')) ? 'simSoDep' : '' ?>"
                    onclick="location.href = '<?= get_site_url('', 'dang-ky-4g') ?>'">ĐĂNG KÝ 4G ONLINE
            </button>
            <button class="navigationButton threeDimensionBlueButton threeDimensionShortWhiteButton">CHUYỂN SANG MOBI
            </button>
            <button class="navigationButton threeDimensionBlueButton threeDimensionShortWhiteButton lienHe">LIÊN HỆ
            </button>
        </div>
        <div class="hamburger">
            <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
        </div>
    </div>
</div>