<?php
/**
 * Template Name: イベント詳細テンプレート
 */
get_header();
?>

<main class="site-main event-detail-page">
  <section class="container">
    <h1 class="page-title"><?php the_title(); ?></h1>
    <div class="page-content">
      <?php the_content(); ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>
