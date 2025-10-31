<?php
/**
 * Template Name: パートナー制度について
 */
get_header('partner');
?>
<main class="site-main main wrapper page factory-page">
  <div class="btm_nav sticky-wrapper" uk-sticky="bottom: true"></div>

  <?php get_template_part('sections/partner-hero'); ?>
  <?php get_template_part('sections/partner-series'); ?>
  <?php get_template_part('sections/partner-program'); ?>
  <?php get_template_part('sections/partner-merit'); ?>
  <?php get_template_part('sections/partner-flow'); ?>
  <?php get_template_part('sections/partner-contact'); ?>
</main>

<?php get_footer(); ?>

<script src="<?php echo get_template_directory_uri(); ?>/assets/js/common.js"></script>
