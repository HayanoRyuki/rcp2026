<section class="client-logo-section">
  <div class="client-logo-container">
    <h2 class="client-logo-title">導入企業</h2>
    <div class="client-logo-grid">
      <?php
        $args = array(
          'post_type' => 'client_logo',
          'posts_per_page' => -1,
          'orderby' => 'menu_order',
          'order' => 'ASC'
        );
        $client_logos = new WP_Query($args);
        if ($client_logos->have_posts()) :
          while ($client_logos->have_posts()) : $client_logos->the_post();
      ?>
        <div class="client-logo-item">
          <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('medium'); ?>
          <?php endif; ?>
        </div>
      <?php endwhile; wp_reset_postdata(); endif; ?>
    </div>
  </div>
</section>
