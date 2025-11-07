<?php
/*
Template Name: 講習会LP（最終版）
Description: RECEPTIONIST講習会LP フル版（フォーム削除・2リンク・カリキュラム付き）
*/

$post_id = get_the_ID();
$basic1 = get_post_meta($post_id, 'basic_date_1', true);
$basic2 = get_post_meta($post_id, 'basic_date_2', true);
$adv1   = get_post_meta($post_id, 'advanced_date_1', true);
$cur_title = get_post_meta($post_id, 'curriculum_title', true);
$cur_text  = get_post_meta($post_id, 'curriculum_text', true);
$cur_basic = get_post_meta($post_id, 'curriculum_basic', true);
$cur_adv   = get_post_meta($post_id, 'curriculum_advanced', true);
?>

<!-- ==============================
     LP専用ヘッダー
============================== -->
<header class="lp-header">
  <div class="lp-header__inner">
    <div class="lp-header__logo">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-receptionist.svg" alt="RECEPTIONIST" width="140" height="20">
    </div>
    <div class="lp-header__text">
      <p>
        受付システムをもっと活用したい方へ！
        <span class="highlight">無料講習会</span> にご招待！
      </p>
    </div>
  </div>
</header>

<!-- ==============================
     HEROセクション
============================== -->
<main class="l-main">
  <section class="hero">
    <div class="hero__inner">
      <div class="hero__left">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/hero-image.webp" alt="RECEPTIONIST講習会" width="600" height="400">
      </div>

      <div class="hero__right">
        <h1 class="hero__title">RECEPTIONIST 無料講習会</h1>
        <p class="hero__lead">基礎編・応用編の2コースをご用意しています。</p>
        <div class="hero__btn-area">
          <a href="https://pi.pardot.com/form/read/id/54816" target="_blank" rel="noopener" class="c-button c-button--primary">
            基礎編に申し込む
          </a>
          <a href="https://pi.pardot.com/form/read/id/54693" target="_blank" rel="noopener" class="c-button c-button--secondary">
            応用編に申し込む
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- ==============================
       開催日程
  =============================== -->
  <section class="seminar-dates">
    <div class="inner">
      <h2>開催日程</h2>
      <div class="seminar-dates__wrap">
        <div class="seminar-dates__item">
          <h3>基礎編</h3>
          <ul>
            <?php if ($basic1) echo "<li>{$basic1}</li>"; ?>
            <?php if ($basic2) echo "<li>{$basic2}</li>"; ?>
          </ul>
        </div>
        <div class="seminar-dates__item">
          <h3>応用編</h3>
          <ul>
            <?php if ($adv1) echo "<li>{$adv1}</li>"; ?>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- ==============================
       カリキュラム
  =============================== -->
  <section class="curriculum">
    <div class="inner">
      <h2><?php echo esc_html($cur_title ?: 'カリキュラム'); ?></h2>
      <?php if ($cur_text): ?>
        <p class="curriculum__intro"><?php echo nl2br(esc_html($cur_text)); ?></p>
      <?php endif; ?>

      <div class="curriculum__wrap">
        <div class="curriculum__card">
          <h3>基礎編</h3>
          <div class="curriculum__list">
            <?php echo wpautop(esc_html($cur_basic)); ?>
          </div>
        </div>
        <div class="curriculum__card">
          <h3>応用編</h3>
          <div class="curriculum__list">
            <?php echo wpautop(esc_html($cur_adv)); ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ==============================
       CTA再掲
  =============================== -->
  <section class="lp-cta">
    <div class="inner">
      <h2>今すぐ講習会に参加する</h2>
      <div class="lp-cta__btns">
        <a href="https://pi.pardot.com/form/read/id/54816" target="_blank" rel="noopener" class="c-button c-button--primary">
          基礎編に申し込む
        </a>
        <a href="https://pi.pardot.com/form/read/id/54693" target="_blank" rel="noopener" class="c-button c-button--secondary">
          応用編に申し込む
        </a>
      </div>
    </div>
  </section>
</main>
