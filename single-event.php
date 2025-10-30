<?php get_header(); ?>
<main class="site-main main-content single-event">
  <div class="event-container">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article <?php post_class('event-article'); ?>>

      <?php if (function_exists('get_breadcrumb')) echo get_breadcrumb(); ?>

      <div class="event-columns">
        <!-- 左カラム -->
        <div class="event-left">
          <?php if (has_post_thumbnail()) : ?>
            <div class="event-thumbnail">
              <?php the_post_thumbnail('large'); ?>
            </div>
          <?php endif; ?>

          <div class="event-content">
            <?php the_content(); ?>
          </div>
        </div>

  <!-- 右カラム -->
<aside class="event-sidebar">

  <!-- カテゴリー（投稿タイプがtaxonomyに対応している前提） -->
  <?php
    $terms = get_the_terms(get_the_ID(), 'event_category'); // 'event_category' を適宜変更
    if (!empty($terms) && !is_wp_error($terms)) :
      $term_names = wp_list_pluck($terms, 'name');
  ?>
    <div class="event-category"><?php echo esc_html(implode(', ', $term_names)); ?></div>
  <?php endif; ?>

  <!-- タイトル -->
  <h1 class="event-title"><?php the_title(); ?></h1>

  <!-- メタ情報 -->
 <ul class="event-meta-list">
  <?php if ($event_date = get_post_meta(get_the_ID(), 'event_date', true)) : ?>
    <li><span class="label">開催日</span><span class="value"><?php echo esc_html($event_date); ?></span></li>
  <?php endif; ?>
  <?php if ($event_location = get_post_meta(get_the_ID(), 'event_location', true)) : ?>
    <li><span class="label">開催場所</span><span class="value"><?php echo esc_html($event_location); ?></span></li>
  <?php endif; ?>
  <?php if ($event_organizer = get_post_meta(get_the_ID(), 'event_organizer', true)) : ?>
    <li><span class="label">主催企業</span><span class="value"><?php echo esc_html($event_organizer); ?></span></li>
  <?php endif; ?>
  <?php if ($event_product = get_post_meta(get_the_ID(), 'event_product', true)) : ?>
    <li><span class="label">対象プロダクト</span><span class="value"><?php echo esc_html($event_product); ?></span></li>
  <?php endif; ?>
</ul>

  <!-- フォーム格納エリア -->
  <div class="event-form-box">
    <?php
      $form_script = get_post_meta(get_the_ID(), 'event_form_script', true);
      if (!empty($form_script)) {
        echo $form_script;
      }
    ?>
  </div>
</aside>



    </article>
    <?php endwhile; endif; ?>

  </div>
</main>
<?php get_footer(); ?>
