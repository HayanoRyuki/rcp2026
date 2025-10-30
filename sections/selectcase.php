<section class="case-top-section">
  <div class="case-container">
    <h2 class="case-title">導入事例</h2>

    <div class="case-grid">
      <?php
      $args = [
        'post_type'      => 'case',
        'posts_per_page' => 6,
        'meta_key'       => '_show_on_top',
        'meta_value'     => '1',
      ];
      $top_cases = new WP_Query($args);

      if ($top_cases->have_posts()) :
        while ($top_cases->have_posts()) : $top_cases->the_post();

          $logo_id = get_post_meta(get_the_ID(), 'logo', true);
          $company = get_post_meta(get_the_ID(), 'company_name', true);
          $employee_count = get_post_meta(get_the_ID(), 'employee_count', true);
      ?>
        <article class="case-card">
          <div class="case-thumbnail">
            <a href="<?php the_permalink(); ?>">
              <?php the_post_thumbnail('large'); ?>
            </a>
            <?php if ($logo_id): ?>
              <?php
                $logo_url = is_numeric($logo_id) ? wp_get_attachment_url($logo_id) : $logo_id;
              ?>
              <?php if ($logo_url): ?>
                <img src="<?php echo esc_url($logo_url); ?>" alt="ロゴ画像" class="case-logo">
              <?php endif; ?>
            <?php endif; ?>
          </div>

          <div class="case-body">
            <h3 class="case-heading">
              <a href="<?php the_permalink(); ?>" class="case-title-link">
                <?php the_title(); ?>
              </a>
            </h3>

            <?php if ($company): ?>
              <p class="case-company"><?php echo esc_html($company); ?></p>
            <?php endif; ?>

            <?php if ($employee_count): ?>
              <p class="case-count">従業員数：<?php echo esc_html($employee_count); ?></p>
            <?php endif; ?>

            <a href="<?php the_permalink(); ?>" class="case-link">詳しく見る</a>
          </div>
        </article>
      <?php
        endwhile;
        wp_reset_postdata();
      endif;
      ?>
    </div>

    <!-- 一覧ページへのリンクボタン -->
    <div class="case-more-button">
      <a href="<?php echo esc_url(home_url('/case/')); ?>" class="button">導入事例一覧を見る</a>
    </div>

  </div>
</section>
