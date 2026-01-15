<?php
/**
 * Header for Seminar LP
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="robots" content="noindex" />

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- header -->
<header class="l-header">
  <div class="l-header__inner">
    <a href="<?php echo esc_url(home_url('/')); ?>" class="l-header__logo">
      <img
  class="l-header__logo-img"
  src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/logo.svg"
  alt="RECEPTIONIST"
  width="173"
  height="42"
>
    </a>

    <!-- pc nav -->
    <nav class="l-header__nav">
      <p class="l-header__nav-text">
        受付システムをもっと活用したい方へ！
        <span>無料講習会</span>にご招待！
      </p>
      <div class="l-header__nav-cta">
        <a class="c-button__header u-pc" href="#form">申し込む</a>
        <a class="c-button__header u-sp" href="#form">申し込む</a>
      </div>
    </nav>
  </div>
</header>
<!-- /header -->
