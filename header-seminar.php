<?php

/**
 * Header for Seminar LP
 */
?>
<!DOCTYPE html>
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
  <header class="lp-seminar__header">
    <div class="lp-seminar____inner">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="lp-seminar__header-logo">
        <img
          class="lp-seminar__header-logo-img"
          src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/logo.svg"
          alt="RECEPTIONIST"
          width="173"
          height="42">
      </a>

      <!-- pc nav -->
      <nav class="lp-seminar__header-nav">
        <p class="lp-seminar__header-nav-text">受付システムをもっと活用したい方へ！<span>無料講習会</span>にーご招待！</p>
        <div class="lp-seminar__header-nav-cta">
          <p class="lp-seminar__header-nav-label"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/icn_online.svg" alt="オンライン開催" width="12.81"
              height="15.73">オンライン開催</p>
        </div>
      </nav>
    </div>
  </header>
  <!-- /header -->