<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,viewport-fit=cover">
  <meta name="format-detection" content="telephone=no">
  <!-- <meta name="robots" content="noindex,nofollow"> -->

  <!-- トップページと下層ページでのタイトルとディスクリプションの切り替え -->
  <?php
    if ( is_front_page()) :
      $page_title = 'Shinichiro Ono | Portfolio';
      $page_description = 'エンジニアのポートフォリオサイトです。';
    else :
      $page_title = wp_title('|', false, 'right') . 'Shinichiro Ono';
      $page_description = 'このページでは、' . get_the_title() . 'について解説しています。';
    endif;
  ?>

  <title><?php echo esc_html($page_title); ?></title>
  <meta name="description" content="<?php echo esc_attr($page_description); ?>">
  <meta name="keywords" content="エンジニア、ポートフォリオ、Shinichiro Ono、大野慎一郎、engineer、portfolio、engineer portfolio">

  <!-- OGP -->
  <meta property="og:title" content="<?php echo esc_html($page_title); ?>">
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo esc_url( get_permalink() ); ?>">
  <meta property="og:image" content="<?php echo esc_url(get_template_directory_uri() . '/assets/images/ogp.jpg'); ?>">
  <meta property="og:site_name" content="Shinichiro Ono">
  <meta property="og:description" content="<?php echo esc_attr($page_description); ?>">
  <meta name="twitter:card" content="summary">

  <!-- ファビコン -->
  <link rel="icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/favicon.ico'); ?>">
  <link rel="apple-touch-icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/apple-touch-icon.png'); ?>">
  <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <header class="header js-header">
    <h1 class="header__logo">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="logo" aria-label="ポートフォリオのトップページへ戻る">
        <div class="header__circle"></div>
      </a>
    </h1>
    <div class="header__right">
      <div class="header__btns">
        <div class="header__btn">
          <a class="header__link" href="<?php echo esc_url(home_url('/works')); ?>" aria-label="作品一覧へ移動">
            <p class="header__btn-text" data-chaffle="en">WORKS</p>
          </a>
        </div>
        <div class="header__btn">
          <a class="header__link" href="<?php echo esc_url(home_url('/about')); ?>" aria-label="自己紹介へ移動">
            <p class="header__btn-text" data-chaffle="en">ABOUT</p>
          </a>
        </div>
        <div class="header__btn">
          <a class="header__link" href="<?php echo esc_url(home_url('/blog')); ?>" aria-label="ブログへ移動">
            <p class="header__btn-text" data-chaffle="en">BLOG</p>
          </a>
        </div>
        <div class="header__btn">
          <a class="header__link" href="<?php echo esc_url(home_url('/contact')); ?>" aria-label="お問い合わせへ移動">
            <p class="header__btn-text" data-chaffle="en">CONTACT</p>
          </a>
        </div>
      </div>
    </div>
  </header>

  
