<!DOCTYPE html>
<html lang="ja">
  <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="index,follow">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width,user-scalable=yes,initial-scale=1.0">
    <title>＊＊＊＊＊＊＊＊</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta property="og:description" content="">
    <meta property="og:image" content="">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="">
    <meta property="og:url" content="">
    <meta property="og:title" content="">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/top.css">
    <?php wp_head(); ?>
  </head>
  <body>
    <header class="global-header">
      <div class="toggle-overlay"></div>
      <div class="header__top-bar">
        <h1 class="header-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="header-logo__link"><img src="<?php echo get_template_directory_uri(); ?>/images/common/logo.png" alt="Baby-T"></a></h1>
        <div class="toggle-wrap">
          <div id="toggle"><a href="#" class="toggle__link"><span class="toggle-icon"></span></a></div>
        </div>
        <nav class="header-nav">
          <ul class="header-nav__list">
            <li class="header-nav__item"><a href="#" class="header-nav__item__link">HTML・CSS</a></li>
            <li class="header-nav__item"><a href="#" class="header-nav__item__link">CMS</a></li>
            <li class="header-nav__item"><a href="#" class="header-nav__item__link">DESIGN</a></li>
            <li class="header-nav__item"><a href="#" class="header-nav__item__link">MENBER</a></li>
            <li class="header-nav__item"><a href="#" target="_blank" class="header-nav__item__link"><img src="<?php echo get_template_directory_uri(); ?>/images/common/icon_twitter.png" alt="twitter"></a></li>
          </ul>
        </nav>
      </div>
    </header>
