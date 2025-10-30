<?php get_header(); ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/single-post.css">

<main class="site-main single-post">
  <div class="container">

    <div class="post-body">

      <!-- 左：記事エリア -->
      <div class="post-main">

        <!-- パンくず -->
        <nav class="breadcrumb">
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
        echo '<a href="' . esc_url(get_category_link($category->term_id)) . '" class="category-badge">' . esc_html($category->name) . '</a>';
      }
    }
  ?>
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

      <!-- 右：バナーエリア -->
<aside class="post-sidebar">
  <div class="sticky-box">

    <?php if (in_category('factory')) : ?>
      <!-- factoryカテゴリ専用サイドバー -->
      <div class="sidebar-box">
        <p class="sidebar-title">工場向け特集</p>
        <a href="/factory-special/" class="sidebar-button">工場DXの資料を見る</a>
      </div>

      <div class="sidebar-box">
        <p class="sidebar-title">関連イベント</p>
        <a href="/event/?category=factory" class="sidebar-button">工場関連イベント一覧</a>
      </div>

    <?php else : ?>
      <!-- 通常サイドバー -->
      <div class="sidebar-box">
        <p class="sidebar-title">資料ダウンロードはこちら</p>
        <a href="/resources/document-general/" class="sidebar-button">資料をもらう</a>
      </div>

      <div class="sidebar-box">
        <p class="sidebar-title">関連セミナー</p>
        <a href="/event/" class="sidebar-button">イベント一覧を見る</a>
      </div>
    <?php endif; ?>

  </div>
</aside>


    </div>

  </div>
</main>

<?php get_footer(); ?>
