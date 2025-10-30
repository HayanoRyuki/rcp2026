<?php get_header(); ?>

<main class="site-main case">
  <div class="case__container">
    <!-- 本文 -->
    <div class="case__main">
      <article class="case__article">
        <h1 class="case__title"><?php the_title(); ?></h1>

        <?php if (has_post_thumbnail()) : ?>
          <div class="case__eyecatch">
            <?php the_post_thumbnail('large'); ?>
          </div>
        <?php endif; ?>

        <?php
        $summary = get_post_meta(get_the_ID(), '_case_summary', true);
        if (!empty($summary)) :
          $lines = array_filter(array_map('trim', explode("\n", $summary)));
          if (!empty($lines)) :
        ?>
        <div class="case__summary">
          <h2 class="case__summary-title">この記事の要約</h2>
          <ul class="case__summary-list">
            <?php foreach ($lines as $line) : ?>
              <li class="case__summary-item">
                <span class="case__check-icon">✔</span><?php echo esc_html($line); ?>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
        <?php endif; endif; ?>

        <div class="case__content">
          <?php the_content(); ?>
        </div>
      </article>
    </div>

    <!-- サイドバー -->
    <aside class="case__sidebar">
      <div class="case__company">
        <?php
        $logo_id = get_post_meta(get_the_ID(), '_case_logo_image_id', true);
        if ($logo_id) :
          $logo_url = wp_get_attachment_image_url($logo_id, 'medium');
        ?>
          <div class="case__logo">
            <img src="<?php echo esc_url($logo_url); ?>" alt="">
          </div>
        <?php endif; ?>

        <table class="case__table">
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

<!-- パンくず -->
<nav class="breadcrumb" aria-label="breadcrumb">
  <div class="breadcrumb__inner">
    <ol class="breadcrumb__list">
      <li class="breadcrumb__item"><a href="<?php echo home_url(); ?>">HOME</a></li>
      <li class="breadcrumb__item"><a href="<?php echo get_post_type_archive_link('case'); ?>">導入事例</a></li>
      <li class="breadcrumb__item breadcrumb__item--current"><?php the_title(); ?></li>
    </ol>
  </div>
</nav>

<?php get_footer(); ?>
