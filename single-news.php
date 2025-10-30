<?php get_header(); ?>

<main class="site-main main-content single-news">
  <div class="container max-w-7xl mx-auto py-16 flex gap-8">

    <!-- ▼ メインカラム -->
    <div class="main-column w-2/3">
 <!-- ▼ パンくずリスト -->
<nav class="breadcrumb text-sm text-gray-500 mb-6" aria-label="breadcrumb">
  <a href="<?php echo home_url(); ?>" class="text-blue-600 hover:underline">HOME</a> &gt;
  <a href="<?php echo home_url('/news'); ?>" class="text-blue-600 hover:underline">お知らせ</a> &gt;
  <span class="text-gray-500"><?php the_title(); ?></span>
</nav>
<!-- ▲ パンくずリスト -->

      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article <?php post_class(); ?>>

          <!-- ▼ タイトル・メタ情報 -->
          <header class="post-header mb-8">
            <h1 class="post-title text-3xl font-bold leading-snug mb-4"><?php the_title(); ?></h1>
            <div class="post-meta flex justify-between items-center text-sm text-gray-500">
              <div class="post-categories">
                <?php
                $categories = get_the_category();
                foreach ($categories as $category) {
                  echo '<span class="inline-block bg-black text-white rounded px-2 py-1 text-xs mr-2">' . esc_html($category->name) . '</span>';
                }
                ?>
              </div>
              <div class="post-date">
                <?php echo get_the_date('Y.m.d'); ?>
              </div>
            </div>
          </header>

          <!-- ▼ 本文 -->
          <div class="post-content prose">
            <?php the_content(); ?>
          </div>

        </article>
      <?php endwhile; endif; ?>
    </div>

    <!-- ▼ サイドバー：他のニュース -->
    <aside class="sidebar w-1/3">
      <h2 class="text-xl font-bold mb-4 border-b pb-2">お知らせ一覧</h2>
      <ul class="other-news-list space-y-4">
        <?php
        $args = [
          'post_type'      => 'news',
          'posts_per_page' => 5,
          'post__not_in'   => [get_the_ID()],
        ];
        $related_news = new WP_Query($args);
        if ($related_news->have_posts()) :
          while ($related_news->have_posts()) : $related_news->the_post();
        ?>
            <li>
<span class="block text-xs text-gray-500"><?php echo get_the_date('Y.m.d'); ?></span>
<a href="<?php the_permalink(); ?>" class="block text-sm text-blue-700 hover:underline">
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
