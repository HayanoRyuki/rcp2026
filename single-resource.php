<?php get_header('minimam'); ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/single-resource.css">

<main class="site-main main-content single-post">
  <div class="container py-16">

    <!-- ▼ パンくずリスト -->
    <?php if (function_exists('get_breadcrumb')) get_breadcrumb(); ?>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article <?php post_class(); ?>>

      <!-- ▼ タイトル -->
      <header class="post-header mb-8">
        <h1 class="post-title"><?php the_title(); ?></h1>
      </header>

      <!-- ▼ 本文＋フォームの2カラム -->
      <div class="resource-body">

        <!-- 左：アイキャッチ・概要・本文 -->
        <div class="main-column">

          <!-- アイキャッチ -->
          <?php if (has_post_thumbnail()) : ?>
            <div class="post-thumbnail mb-8">
              <?php the_post_thumbnail('full'); ?>
            </div>
          <?php endif; ?>

          <!-- ページ数＋更新日（1行） -->
<?php
  $page_count = get_post_meta(get_the_ID(), 'page_count', true);
  $last_updated = get_post_meta(get_the_ID(), 'last_updated', true);
?>
<div class="resource-meta-inline">
  <?php if ($page_count) : ?>
    <span class="label-badge">ページ数</span>
    <span class="label-value"><?php echo esc_html($page_count); ?></span>
  <?php endif; ?>
  <?php if ($last_updated) : ?>
    <span class="label-badge">最終更新日</span>
    <span class="label-value"><?php echo esc_html($last_updated); ?></span>
  <?php endif; ?>
</div>
          <!-- カスタム情報 -->
          <div class="resource-meta">

            <?php if ($audience = get_post_meta(get_the_ID(), 'audience', true)) : ?>
              <div class="meta-row">
                <span class="label-badge">対象者</span>
                <span class="label-value"><?php echo nl2br(esc_html($audience)); ?></span>
              </div>
            <?php endif; ?>

            <?php if ($summary = get_post_meta(get_the_ID(), 'summary', true)) : ?>
              <div class="meta-row">
                <span class="label-badge">資料の主な内容</span>
                <span class="label-value"><?php echo nl2br(esc_html($summary)); ?></span>
              </div>
            <?php endif; ?>

            <?php if ($points = get_post_meta(get_the_ID(), 'points', true)) : ?>
              <div class="meta-row">
                <span class="label-badge">おすすめポイント</span>
                <span class="label-value"><?php echo nl2br(esc_html($points)); ?></span>
              </div>
            <?php endif; ?>

          </div>

          <!-- 本文 -->
          <div class="post-content">
            <?php the_content(); ?>
          </div>

        </div>

        <!-- 右：フォーム -->
        <aside class="form-area">
          <?php if ($form = get_post_meta(get_the_ID(), 'form_embed', true)) : ?>
            <div class="form-embed">
              <?php echo $form; ?>
            </div>
          <?php endif; ?>
        </aside>

      </div>
    </article>
    <?php endwhile; endif; ?>

  </div>
</main>

<?php get_footer('minimam'); ?>
