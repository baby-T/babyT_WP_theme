<!DOCTYPE html>
<html lang="ja">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="index,follow">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width,user-scalable=yes,initial-scale=1.0">
    <?php get_template_part( 'module/meta', 'title' ); ?>
    <?php get_template_part( 'module/meta'); ?>
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
<?php if( is_front_page() && is_home() ): ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/top.css">
<?php elseif ( is_single() ): ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/detail.css">
<?php endif; ?>
    <?php wp_head(); ?>
</head>
<body>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.8";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <header class="global-header">
        <div class="toggle-overlay"></div>
        <div class="header__top-bar">
            <h1 class="header-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="header-logo__link"><img src="<?php echo get_template_directory_uri(); ?>/images/common/logo.png" alt="Baby-T"></a></h1>
            <div class="toggle-wrap">
                <div id="toggle"><a href="#" class="toggle__link"><span class="toggle-icon"></span></a></div>
            </div>
            <nav class="header-nav">
                <ul class="header-nav__list">
<?php
$args = array(
    'theme_location'=>'globalNavi',
    'container'     =>'',
    'items_wrap'    =>'%3$s'
);
wp_nav_menu($args);
?>
                    <li class="header-nav__item"><a href="/WP-babyt/member/" class="header-nav__item__link">MENBER</a></li>
                    <li class="header-nav__item"><a href="#" target="_blank" class="header-nav__item__link"><img src="<?php echo get_template_directory_uri(); ?>/images/common/icon_twitter.png" alt="twitter"></a></li>
                </ul>
            </nav>
        </div>
        </header>