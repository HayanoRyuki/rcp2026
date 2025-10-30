<?php get_header(); ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/archive-resource.css">

<main class="site-main archive-resource">
  <section class="resource">
    <div class="resource-inner">
      <h1 class="archive-title">資料一覧</h1>

      <p class="resource-intro">
        RECEPTIONISTのサービスや導入事例に関する資料をダウンロードいただけます。
      </p>

      <?php
      $tags = get_tags([
        'taxonomy' => 'post_tag',
        'orderby' => 'name',
        'order' => 'ASC',
        'hide_empty' => true,
      ]);
      $current_tag = isset($_GET['tag']) ? sanitize_text_field(urldecode($_GET['tag'])) : '';
      ?>

      <?php if ($current_tag): ?>
        <?php $tag_obj = get_term_by('slug', $current_tag, 'post_tag'); ?>
        <?php if ($tag_obj): ?>
          <p class="current-tag">
            現在の絞り込みタグ：<?php echo esc_html($tag_obj->name); ?>
          </p>
        <?php endif; ?>
      <?php endif; ?>

      <?php if ($tags) : ?>
        <form method="get" action="<?php echo esc_url(get_post_type_archive_link('resource')); ?>" class="tag-filter-form">
          <select name="tag" onchange="this.form.submit()">
            <option value="">タグで絞り込む</option>
            <?php foreach ($tags as $tag) : ?>
              <option value="<?php echo esc_attr($tag->slug); ?>" <?php selected($current_tag, $tag->slug); ?>>
                <?php echo esc_html($tag->name); ?>
              </option>
            <?php endforeach; ?>
          </select>
        </form>
      <?php endif; ?>

      <?php if (have_posts()) : ?>
        <ul class="resource-list">
          <?php while (have_posts()) : the_post(); ?>
            <li <?php post_class('resource-item'); ?>>
              <a href="<?php the_permalink(); ?>" class="resource-link">
                <?php if (has_post_thumbnail()) : ?>
                  <div class="resource-thumb">
                    <?php the_post_thumbnail('medium'); ?>
                  </div>
                <?php endif; ?>
                <h2 class="resource-title"><?php the_title(); ?></h2>
              </a>
              <div class="resource-button-wrap">
                <a href="<?php the_permalink(); ?>" class="resource-download-button">ダウンロード</a>
              </div>
            </li>
          <?php endwhile; ?>
        </ul>

        <div class="resource-pagination">
          <?php the_posts_pagination(); ?>
        </div>
      <?php else : ?>
        <p class="resource-empty">現在、公開中の資料はありません。</p>
      <?php endif; ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>
