<?php get_header(); ?>

<main class="site-main event">
  <div class="event__container">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article <?php post_class('event__article'); ?>>

      <?php if (function_exists('get_breadcrumb')) echo get_breadcrumb(); ?>

      <div class="event__columns">
        <!-- 左カラム -->
        <div class="event__left">
          <?php if (has_post_thumbnail()) : ?>
            <div class="event__thumbnail">
              <?php the_post_thumbnail('large'); ?>
            </div>
          <?php endif; ?>

          <div class="event__content">
            <?php the_content(); ?>
          </div>
        </div>

        <!-- 右カラム -->
        <aside class="event__sidebar">
          <?php
            $terms = get_the_terms(get_the_ID(), 'event_category');
            if (!empty($terms) && !is_wp_error($terms)) :
              $term_names = wp_list_pluck($terms, 'name');
          ?>
            <div class="event__category"><?php echo esc_html(implode(', ', $term_names)); ?></div>
          <?php endif; ?>

          <h1 class="event__title"><?php the_title(); ?></h1>

          <ul class="event__meta">
            <?php if ($event_date = get_post_meta(get_the_ID(), 'event_date', true)) : ?>
              <li class="event__meta-item">
                <span class="event__label">開催日</span>
                <span class="event__value"><?php echo esc_html($event_date); ?></span>
              </li>
            <?php endif; ?>

            <?php if ($event_location = get_post_meta(get_the_ID(), 'event_location', true)) : ?>
              <li class="event__meta-item">
                <span class="event__label">開催場所</span>
                <span class="event__value"><?php echo esc_html($event_location); ?></span>
              </li>
            <?php endif; ?>

            <?php if ($event_organizer = get_post_meta(get_the_ID(), 'event_organizer', true)) : ?>
              <li class="event__meta-item">
                <span class="event__label">主催企業</span>
                <span class="event__value"><?php echo esc_html($event_organizer); ?></span>
              </li>
            <?php endif; ?>

            <?php if ($event_product = get_post_meta(get_the_ID(), 'event_product', true)) : ?>
              <li class="event__meta-item">
                <span class="event__label">対象プロダクト</span>
                <span class="event__value"><?php echo esc_html($event_product); ?></span>
              </li>
            <?php endif; ?>
          </ul>

          <div class="event__form">
            <?php
              $form_script = get_post_meta(get_the_ID(), 'event_form_script', true);
              if (!empty($form_script)) {
                echo $form_script;
              }
            ?>
          </div>
        </aside>
      </div><!-- /.event__columns -->

    </article>
    <?php endwhile; endif; ?>

  </div>
</main>

<?php get_footer(); ?>
