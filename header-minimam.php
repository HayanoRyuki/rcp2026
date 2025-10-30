<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="header-minimam">
  <div class="header-minimam-inner">
	<a href="<?php echo home_url(); ?>" class="header-logo">
  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo/img-logo-reception.webp" alt="RECEPTIONISTロゴ">
</a>
  </div>
</header>

