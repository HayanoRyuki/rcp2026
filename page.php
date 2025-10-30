<?php
// 共通ヘッダーを読み込み
get_header();
?>

<main class="site-main page-main">
  <div class="page-content inner">
    <?php
    if (have_posts()) :
      while (have_posts()) : the_post();
        ?>
        <!-- ページタイトル -->
        <h1 class="page-title"><?php the_title(); ?></h1>

        <!-- 本文 -->
        <div class="page-entry">
          <?php the_content(); ?>
        </div>
        <?php
      endwhile;
    endif;
    ?>
  </div>

  <?php
  // CTA セクションを読み込み
  get_template_part('sections/cta');

  // シリーズ紹介セクションを読み込み
  get_template_part('sections/series');
  ?>
</main>

<?php
// フッターを読み込み
get_footer();
?>
