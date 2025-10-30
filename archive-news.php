<?php get_header(); ?>

<main class="site-main main-content archive-news">
  <section class="py-16 px-4 bg-[#f4f7fb]">
    <div class="max-w-7xl mx-auto">
      <h1 class="page-title text-3xl md:text-4xl font-bold text-center text-gray-800 mb-12">
        お知らせ一覧
      </h1>
      <?php if (have_posts()) : ?>
        <ul class="news-list grid gap-8 md:grid-cols-3">
          <?php while (have_posts()) : the_post(); ?>
           <li class="news-item bg-white rounded-xl shadow hover:shadow-md transition overflow-hidden">
  <a href="<?php the_permalink(); ?>" class="block p-5 space-y-2">
    
    <!-- 日付＋カテゴリー（横並び） -->
    <div class="news-meta flex items-center gap-2 text-sm mb-1">
      <time class="news-date text-gray-500">
        <?php echo get_the_date(); ?>
      </time>

      <?php
        $terms = get_the_terms(get_the_ID(), 'news_category');
        if ($terms && !is_wp_error($terms)) :
      ?>
        <span class="news-category bg-blue-600 text-white text-xs px-2 py-0.5 rounded-full">
          <?php echo esc_html($terms[0]->name); ?>
        </span>
      <?php endif; ?>
    </div>

    <!-- タイトル -->
    <h2 class="text-lg font-semibold text-gray-800 leading-snug">
      <?php the_title(); ?>
    </h2>
  </a>
</li>

          <?php endwhile; ?>
        </ul>

        <!-- ページネーション -->
        <div class="mt-12 text-center">
          <?php the_posts_pagination([
            'mid_size' => 2,
            'prev_text' => '« 前へ',
            'next_text' => '次へ »',
          ]); ?>
        </div>

      <?php else : ?>
        <p class="text-center text-gray-600">現在お知らせはありません。</p>
      <?php endif; ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>
