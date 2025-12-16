<?php get_header(); ?>

<main class="site-main case">
  <div class="case-container">
    <!-- 本文 -->
    <div class="case-main">
      <article class="case-article">
        <h1 class="case-title"><?php the_title(); ?></h1>

        <?php if (has_post_thumbnail()) : ?>
          <div class="case-eyecatch">
            <?php the_post_thumbnail('large'); ?>
          </div>
        <?php endif; ?>

        <?php
        $summary = get_post_meta(get_the_ID(), '_case_summary', true);
        if (!empty($summary)) :
          $lines = array_filter(array_map('trim', explode("\n", $summary)));
          if (!empty($lines)) :
        ?>
        <div class="case-summary">
          <h2 class="case-summary-title">この記事の要約</h2>
          <ul class="case-summary-list">
            <?php foreach ($lines as $line) : ?>
              <li class="case-summary-item">
                <span class="case-check-icon">✔</span><?php echo esc_html($line); ?>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
        <?php endif; endif; ?>

        <div class="case-content">
          <?php the_content(); ?>
        </div>
        <?php get_template_part('template-parts/case/cta'); ?>
      </article>
    </div>

    <!-- サイドバー -->
    <aside class="case-sidebar">
      <div class="case-company">
        <?php
        $logo_id = get_post_meta(get_the_ID(), '_case_logo_image_id', true);
        if ($logo_id) :
          $logo_url = wp_get_attachment_image_url($logo_id, 'medium');
        ?>
          <div class="case-logo">
            <img src="<?php echo esc_url($logo_url); ?>" alt="">
          </div>
        <?php endif; ?>

        <table class="case-table">
          <tbody>
            <tr>
              <th>企業名</th>
              <td><?php echo esc_html(get_post_meta(get_the_ID(), '_case_company_name', true)); ?></td>
            </tr>
            <tr>
              <th>業種</th>
              <td><?php echo esc_html(get_post_meta(get_the_ID(), '_case_industry', true)); ?></td>
            </tr>
            <tr>
              <th>従業員数</th>
              <td><?php echo esc_html(get_post_meta(get_the_ID(), '_case_employee_size', true)); ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </aside>
  </div>
</main>

<nav class="breadcrumb" aria-label="breadcrumb">
  <div class="breadcrumb-inner">
    <ol class="breadcrumb-list">
      <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">HOME</a></li>
      <li class="breadcrumb-item"><a href="<?php echo get_post_type_archive_link('case'); ?>">導入事例</a></li>
      <li class="breadcrumb-item breadcrumb-item--current"><?php the_title(); ?></li>
    </ol>
  </div>
</nav>

<?php get_footer(); ?>
