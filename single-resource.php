<?php get_header('minimam'); ?>

<main class="site-main resource">
  <div class="resource-container">

    <!-- パンくず -->
    <?php if (function_exists('get_breadcrumb')) get_breadcrumb(); ?>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article class="resource-article">

      <!-- タイトル -->
      <header class="resource-header">
        <h1 class="resource-title"><?php the_title(); ?></h1>
      </header>

      <!-- 本文＋フォーム 2カラム -->
      <div class="resource-columns">

        <!-- 左カラム -->
        <div class="resource-main">
          <?php if (has_post_thumbnail()) : ?>
            <div class="resource-thumbnail">
              <?php the_post_thumbnail('full'); ?>
            </div>
          <?php endif; ?>

          <?php
            $page_count = get_post_meta(get_the_ID(), 'page_count', true);
            $last_updated = get_post_meta(get_the_ID(), 'last_updated', true);
          ?>
          <div class="resource-meta-inline">
            <?php if ($page_count) : ?>
              <span class="resource-badge">ページ数</span>
              <span class="resource-value"><?php echo esc_html($page_count); ?></span>
            <?php endif; ?>
            <?php if ($last_updated) : ?>
              <span class="resource-badge">最終更新日</span>
              <span class="resource-value"><?php echo esc_html($last_updated); ?></span>
            <?php endif; ?>
          </div>

          <!-- カスタム情報 -->
          <div class="resource-meta">
            <?php if ($audience = get_post_meta(get_the_ID(), 'audience', true)) : ?>
              <div class="resource-row">
                <span class="resource-badge">対象者</span>
                <span class="resource-value"><?php echo nl2br(esc_html($audience)); ?></span>
              </div>
            <?php endif; ?>

            <?php if ($summary = get_post_meta(get_the_ID(), 'summary', true)) : ?>
              <div class="resource-row">
                <span class="resource-badge">資料の主な内容</span>
                <span class="resource-value"><?php echo nl2br(esc_html($summary)); ?></span>
              </div>
            <?php endif; ?>

            <?php if ($points = get_post_meta(get_the_ID(), 'points', true)) : ?>
              <div class="resource-row">
                <span class="resource-badge">おすすめポイント</span>
                <span class="resource-value"><?php echo nl2br(esc_html($points)); ?></span>
              </div>
            <?php endif; ?>
          </div>

          <div class="resource-content">
            <?php the_content(); ?>
          </div>
        </div>

        <!-- 右カラム（フォーム） -->
        <aside class="resource-sidebar">
          <?php if ($form = get_post_meta(get_the_ID(), 'form_embed', true)) : ?>
            <div class="resource-form">
              <?php echo $form; ?>
            </div>
          <?php endif; ?>
        </aside>

      </div><!-- /.resource-columns -->
    </article>
    <?php endwhile; endif; ?>

  </div>
</main>

<?php get_footer('minimam'); ?>
