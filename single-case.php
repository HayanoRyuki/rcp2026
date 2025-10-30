<?php get_header(); ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/single-case.css">

<main class="site-main single-case-wrapper">
  <div class="container">
    <!-- 左：本文 -->
    <div class="main-column">
      <div class="article-box">
        <h1 class="page-title"><?php the_title(); ?></h1>

        <?php if (has_post_thumbnail()) : ?>
          <div class="eyecatch">
            <?php the_post_thumbnail('large'); ?>
          </div>
        <?php endif; ?>

        <?php
        $summary = get_post_meta(get_the_ID(), '_case_summary', true);
        if (!empty($summary)) :
          $lines = array_filter(array_map('trim', explode("\n", $summary)));
          if (!empty($lines)) :
        ?>
        <div class="summary-box">
          <h2>この記事の要約</h2>
          <ul class="check-list">
            <?php foreach ($lines as $line) : ?>
              <li><span class="check-icon">✔</span><?php echo esc_html($line); ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
        <?php endif; endif; ?>

        <div class="content">
          <?php the_content(); ?>
        </div>
      </div>
    </div>

    <!-- 右：企業情報 -->
    <aside class="sidebar">
      <div class="company-profile sticky-box">
        <?php
        $logo_id = get_post_meta(get_the_ID(), '_case_logo_image_id', true);
        if ($logo_id) :
          $logo_url = wp_get_attachment_image_url($logo_id, 'medium');
        ?>
          <div class="logo">
            <img src="<?php echo esc_url($logo_url); ?>" alt="">
          </div>
        <?php endif; ?>

        <table class="company-table">
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

<!-- パンクズ（本文の下に出す） -->
<nav class="breadcrumb" aria-label="breadcrumb">
  <div class="container">
    <ol>
      <li><a href="<?php echo home_url(); ?>">HOME</a></li>
      <li><a href="<?php echo get_post_type_archive_link('case'); ?>">導入事例</a></li>
      <li><?php the_title(); ?></li>
    </ol>
  </div>
</nav>

<?php get_footer(); ?>
