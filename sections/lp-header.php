<?php
/**
 * LP専用ヘッダー（グレー背景＋ロゴのみ）
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- グレー背景のヘッダー -->
<header class="lp-header">
  <div class="lp-header-inner">
    <a href="<?php echo home_url(); ?>">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img-logo-reception.webp" alt="RECEPTIONISTロゴ" class="lp-logo">
    </a>
  </div>
</header>
