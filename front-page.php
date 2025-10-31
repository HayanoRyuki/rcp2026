<?php get_header(); ?>
<main class="site-main front-page">

  <!-- ヒーローセクション -->
  <?php get_template_part('sections/hero'); ?>

  <!-- ロゴスライダーセクション -->
  <?php get_template_part('sections/logo-slider'); ?>

  <!-- Aboutセクション -->
  <?php get_template_part('sections/about'); ?>

    <!-- ピックアップ -->
  <?php // get_template_part('sections/pickup'); ?>

  <!-- コスト -->
  <?php // get_template_part('sections/cost'); ?>

  <!-- 課題解決セクション -->
  <?php get_template_part('sections/solutions'); ?>

  <!-- 選ばれる理由 -->
  <?php get_template_part('sections/reasons'); ?>

  <!-- セレクトした導入事例 -->
  <?php get_template_part('sections/selectcase'); ?>

  <!-- 導入企業のロゴ -->
  <?php get_template_part('sections/clientlogo'); ?>

  <!-- CTA（資料請求） -->
  <?php get_template_part('sections/cta'); ?>

  <!-- シリーズ紹介 -->
  <?php get_template_part('sections/series'); ?>

</main>
<?php get_footer(); ?>
