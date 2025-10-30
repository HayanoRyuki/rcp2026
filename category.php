<?php get_header(); ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/category.css">

<main class="site-main archive-post">
  <section class="blog-archive-section">
    <div class="container">

      <!-- カテゴリータイトル -->
      <header class="category-header">
        <h1 class="page-title"><?php single_cat_title(); ?></h1>

        <?php if (category_description()) : ?>
          <p><?php echo category_description(); ?></p>
        <?php endif; ?>
      </header>

      <!-- 投稿一覧 -->
      <ul class="blog-list">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <li <?php post_class('blog-item'); ?>>
            <a href="<?php the_permalink(); ?>" class="blog-link">
              <?php if (has_post_thumbnail()) : ?>
                <div class="blog-thumbnail">
                  <?php the_post_thumbnail('medium'); ?>
                </div>
              <?php endif; ?>

              <div class="blog-meta">
                <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y年n月j日'); ?></time>

<div class="blog-categories">
  <?php
    $categories = get_the_category();
    foreach ($categories as $category) {
      echo '<span class="blog-category">' . esc_html($category->name) . '</span>';
    }
  ?>
</div>


                <h2 class="blog-title"><?php the_title(); ?></h2>
              </div>
            </a>
          </li>
        <?php endwhile; else : ?>
          <p>このカテゴリには投稿がまだありません。</p>
        <?php endif; ?>
      </ul>

    </div>
  </section>
</main>

<?php get_footer(); ?>
