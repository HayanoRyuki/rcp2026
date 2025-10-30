<?php get_header(); ?>

<main class="site-main archive-news">
  <section class="news">
    <div class="news__inner">
      <h1 class="news__title">お知らせ一覧</h1>

      <?php if (have_posts()) : ?>
        <ul class="news__list">
          <?php while (have_posts()) : the_post(); ?>
            <li class="news__item">
              <a href="<?php the_permalink(); ?>" class="news__link">
                <div class="news__meta">
                  <time class="news__date"><?php echo get_the_date(); ?></time>
                  <?php
                    $terms = get_the_terms(get_the_ID(), 'news_category');
                    if ($terms && !is_wp_error($terms)) :
                  ?>
                    <span class="news__category">
                      <?php echo esc_html($terms[0]->name); ?>
                    </span>
                  <?php endif; ?>
                </div>
                <h2 class="news__heading"><?php the_title(); ?></h2>
              </a>
            </li>
          <?php endwhile; ?>
        </ul>

        <div class="news__pagination">
          <?php the_posts_pagination([
            'mid_size' => 2,
            'prev_text' => '« 前へ',
            'next_text' => '次へ »',
          ]); ?>
        </div>
      <?php else : ?>
        <p class="news__empty">現在お知らせはありません。</p>
      <?php endif; ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>
