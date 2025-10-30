<?php
/**
 * Template Name: フォーム送信用テンプレート
 */
get_header();
?>

<main class="site-main form-send-page">
  <section class="container">
    <h1 class="page-title"><?php the_title(); ?></h1>
    <div class="page-content">
      <?php the_content(); ?>
      <!-- PardotやHubSpotフォームなど埋め込み予定 -->
    </div>
  </section>
</main>

<?php get_footer(); ?>
