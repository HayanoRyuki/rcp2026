<?php get_header(); ?>

<main class="site-main main-content archive-event">
  <section class="event-archive-section">
    <div class="container">
      <h1 class="page-title">イベント情報一覧</h1>

   

      <?php if (have_posts()) : ?>
        <div class="event-grid">
          <?php while (have_posts()) : the_post(); ?>
            <article class="event-card">
              <?php if (has_post_thumbnail()) : ?>
                <a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail('medium'); ?>
                </a>
              <?php endif; ?>
              <div class="event-card-body">
                <h2>
                  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>

                <?php
                $event_date = get_post_meta(get_the_ID(), 'event_date', true);
                $event_place = get_post_meta(get_the_ID(), 'event_place', true);
                $event_product = get_post_meta(get_the_ID(), 'event_product', true);
                ?>

                <ul class="event-meta">
                  <?php if ($event_date) : ?>
                    <li><span class="event-meta-label">開催日</span><?php echo esc_html($event_date); ?></li>
                  <?php endif; ?>
                  <?php if ($event_place) : ?>
                    <li><span class="event-meta-label">開催場所</span><?php echo esc_html($event_place); ?></li>
                  <?php endif; ?>
                  <?php if ($event_product) : ?>
                    <li><span class="event-meta-label">対象プロダクト</span><?php echo esc_html($event_product); ?></li>
                  <?php endif; ?>
                </ul>

                <p><?php echo get_the_excerpt(); ?></p>
              </div>
            </article>
          <?php endwhile; ?>
        </div>
      <?php else : ?>
        <p class="no-event">現在、公開中のイベントはありません。</p>
      <?php endif; ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>
