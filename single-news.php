<?php get_header(); ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/single-news.css">

<main class="site-main news">
  <div class="news__container">

    <!-- ===== メインカラム ===== -->
    <div class="news__main">

      <!-- パンくず -->
      <nav class="breadcrumb" aria-label="breadcrumb">
        <a href="<?php echo home_url(); ?>">HOME</a> &gt;
        <a href="<?php echo home_url('/news'); ?>">お知らせ</a> &gt;
        <span><?php the_title(); ?></span>
      </nav>

      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article class="news__article">

          <!-- タイトル・メタ情報 -->
          <header class="news__header">
            <h1 class="news__title"><?php the_title(); ?></h1>

            <div class="news__meta">
              <div class="news__categories">
                <?php
                $categories = get_the_category();
                foreach ($categories as $category) {
                  echo '<span class="news__category">' . esc_html($category->name) . '</span>';
                }
                ?>
              </div>
              <time class="news__date"><?php echo get_the_date('Y.m.d'); ?></time>
            </div>
          </header>

          <!-- 本文 -->
          <div class="news__content">
            <?php the_content(); ?>
          </div>
        </article>
      <?php endwhile; endif; ?>
    </div>

    <!-- ===== サイドバー ===== -->
    <aside class="news__sidebar">
      <h2 class="news__sidebar-title">お知らせ一覧</h2>
      <ul class="news__sidebar-list">
        <?php
        $args = [
          'post_type'      => 'news',
          'posts_per_page' => 5,
          'post__not_in'   => [get_the_ID()],
        ];
        $related_news = new WP_Query($args);
        if ($related_news->have_posts()) :
          while ($related_news->have_posts()) : $related_news->the_post(); ?>
            <li class="news__sidebar-item">
              <time class="news__sidebar-date"><?php echo get_the_date('Y.m.d'); ?></time>
              <a href="<?php the_permalink(); ?>" class="news__sidebar-link">
                <?php the_title(); ?>
              </a>
            </li>
        <?php endwhile;
          wp_reset_postdata();
        endif;
        ?>
      </ul>
    </aside>

  </div>
</main>

<?php get_footer(); ?>
