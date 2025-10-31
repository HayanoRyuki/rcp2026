<?php get_header(); ?>

<main class="site-main post">
  <div class="post-container">

    <div class="post-body">
      <!-- ===== 左カラム：記事エリア ===== -->
      <div class="post-main">

        <!-- パンくず -->
        <nav class="breadcrumb" aria-label="breadcrumb">
          <a href="<?php echo home_url(); ?>">ホーム</a> &gt;
          <a href="<?php echo home_url('/?post_type=post'); ?>">お役立ちコラム</a> &gt;
          <span><?php the_title(); ?></span>
        </nav>

        <!-- タイトル -->
        <h1 class="post-title"><?php the_title(); ?></h1>

        <!-- 日付・カテゴリ -->
        <div class="post-meta">
          <?php
            $categories = get_the_category();
            if ($categories) {
              foreach ($categories as $category) {
                echo '<a href="' . esc_url(get_category_link($category->term_id)) . '" class="post-category">' . esc_html($category->name) . '</a>';
              }
            }
          ?>
          <time class="post-date"><?php echo get_the_date('Y.m.d'); ?></time>
        </div>

        <!-- アイキャッチ -->
        <?php if (has_post_thumbnail()) : ?>
          <div class="post-thumbnail">
            <?php the_post_thumbnail('large'); ?>
          </div>
        <?php endif; ?>

        <!-- 本文 -->
        <article class="post-content">
          <?php the_content(); ?>
        </article>
      </div>

      <!-- ===== 右カラム：サイドバー ===== -->
      <aside class="post-sidebar">
        <div class="post-sticky">
          <?php if (in_category('factory')) : ?>
            <!-- factoryカテゴリ専用 -->
            <div class="post-sidebar-box">
              <p class="post-sidebar-title">工場向け特集</p>
              <a href="/factory-special/" class="post-sidebar-button">工場DXの資料を見る</a>
            </div>
            <div class="post-sidebar-box">
              <p class="post-sidebar-title">関連イベント</p>
              <a href="/event/?category=factory" class="post-sidebar-button">工場関連イベント一覧</a>
            </div>
          <?php else : ?>
            <!-- 通常サイドバー -->
            <div class="post-sidebar-box">
              <p class="post-sidebar-title">資料ダウンロードはこちら</p>
              <a href="/resources/document-general/" class="post-sidebar-button">資料をもらう</a>
            </div>
            <div class="post-sidebar-box">
              <p class="post-sidebar-title">関連セミナー</p>
              <a href="/event/" class="post-sidebar-button">イベント一覧を見る</a>
            </div>
          <?php endif; ?>
        </div>
      </aside>
    </div>
  </div>
</main>

<?php get_footer(); ?>
