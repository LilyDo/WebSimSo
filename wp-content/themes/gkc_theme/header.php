<?php
    global $wp;
    $cur_url = home_url( $wp->request )
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="<?=base_url()?>/assets/styles/homePage.css" rel="stylesheet" type="text/css">
  <link href="<?=base_url()?>/assets/styles/simSoDep.css" rel="stylesheet" type="text/css">
  <link href="<?=base_url()?>/assets/styles/media.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/styles/semantic/semantic.min.css">
  <link href="<?=base_url()?>/assets/fonts/fonts.css" rel='stylesheet'>
</head>

<body>
  <div class="header">
    <div class="headerLeft">
      <div id="headerLogo">
        <img src="<?=base_url()?>/assets/images/logo.png"></div>
    </div>
    <div class=headerRight>
      <div class="headerUpper">
        <div class="headerHotLine">
          <span> <img src="<?=base_url()?>/assets/images/phone.svg"> </span>
          <span class="text">
            Hotline 0932 100 700
          </span>
        </div>
        <div class="HeaderAddress">Điểm giao dịch:</br>249 Minh Phụng, P.2, Q11</div>
      </div>

      <div class="headerLower">
        <button class="navigationButton <?=($cur_url == get_site_url())? 'simSoDep' : ''?>" onclick="location.href = '<?=get_site_url()?>'">HOME</button>
        <button class="navigationButton <?=($cur_url == get_site_url('', 'sim-so-dep'))? 'simSoDep' : ''?>" onclick="location.href = '<?=get_site_url('', 'sim-so-dep')?>'">SIM SỐ ĐẸP</button>
        <button class="navigationButton">NẠP TIỀN</button>
        <button class="navigationButton">ĐĂNG KÝ 4G ONLINE</button>
        <button class="navigationButton">CHUYỂN SANG MOBI</button>
        <button class="navigationButton" id="lienHe">LIÊN HỆ</button>
      </div>
      <div class="hamburger">
        <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
      </div>
    </div>
  </div>