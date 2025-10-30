<?php get_header(); ?>

<main class="site-main main-content blog-archive">
  <section class="blog-archive-section">
    <div class="container">
      <h1 class="page-title">ブログ一覧</h1>

      <?php if (have_posts()) : ?>
        <ul class="blog-list">
          <?php while (have_posts()) : the_post(); ?>
            <li class="blog-item">
              <a href="<?php the_permalink(); ?>">
                <?php if (has_post_thumbnail()) : ?>
                  <div class="blog-thumbnail"><?php the_post_thumbnail('medium'); ?></div>
                <?php endif; ?>
                <div class="blog-meta">
                  <time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date(); ?></time>
                  <div class="blog-title"><?php the_title(); ?></div>
                </div>
              </a>
            </li>
          <?php endwhile; ?>
        </ul>
        <?php the_posts_pagination(); ?>
      <?php else : ?>
        <p>投稿がありません。</p>
      <?php endif; ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>
