<?php get_header(); ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/archive.css?test=1">

<main class="site-main archive-post">
  <section class="blog-archive-section">
    <div class="container">

      <h1 class="page-title">お役立ちコラム</h1>

<?php
// ピックアップ記事（最大3件）を取得
$pickup_args = [
  'post_type'      => 'post',
  'posts_per_page' => 3,
  'meta_key'       => '_pickup',
  'meta_value'     => '1',
  'orderby'        => 'date',
  'order'          => 'DESC',
];

$pickup_query = new WP_Query($pickup_args);

if ($pickup_query->have_posts()) :
?>
  <section class="pickup-section">
    <div class="pickup-grid">
      <?php while ($pickup_query->have_posts()) : $pickup_query->the_post(); ?>
        <article class="pickup-card">
  <span class="pickup-badge">おすすめ記事</span> <!-- ← ここに移動 -->
  <a href="<?php the_permalink(); ?>">
    <?php if (has_post_thumbnail()) : ?>
      <div class="pickup-thumb">
        <?php the_post_thumbnail('medium'); ?>
      </div>
    <?php endif; ?>
    <h3 class="pickup-title"><?php the_title(); ?></h3>
  </a>
</article>
      <?php endwhile; ?>
    </div>
  </section>
  <?php wp_reset_postdata(); ?>
<?php endif; ?>

      <?php if (have_posts()) : ?>
        <ul class="blog-list">
          <?php while (have_posts()) : the_post(); ?>
            <li <?php post_class('blog-item'); ?>>
              <div class="blog-link">
                <?php if (has_post_thumbnail()) : ?>
                  <div class="blog-thumbnail">
                    <?php the_post_thumbnail('medium', ['alt' => get_the_title()]); ?>
                  </div>
                <?php endif; ?>
                <div class="blog-meta">
                  <time datetime="<?php echo get_the_date('Y-m-d'); ?>">
                    <?php echo get_the_date('Y年n月j日'); ?>
                  </time>

                  <?php
                    $cats = get_the_category();
                    if (!empty($cats)) {
                      echo '<div class="blog-categories">';
                      foreach ($cats as $cat) {
                        echo '<a href="' . esc_url(get_category_link($cat->term_id)) . '" class="blog-category">' . esc_html($cat->name) . '</a>';
                      }
                      echo '</div>';
                    }
                  ?>

                  <a href="<?php the_permalink(); ?>" class="blog-title">
                    <?php the_title(); ?>
                  </a>
                </div>
              </div>
            </li>
          <?php endwhile; ?>
        </ul>

        <nav class="pagination" aria-label="ページナビゲーション">
          <?php the_posts_pagination([
            'mid_size' => 1,
            'prev_text' => '« 前へ',
            'next_text' => '次へ »',
          ]); ?>
        </nav>
      <?php else : ?>
        <p>まだ投稿がありません。</p>
      <?php endif; ?>

    </div>
  </section>
</main>

<?php get_footer(); ?>
