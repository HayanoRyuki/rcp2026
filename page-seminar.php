<?php
/*
Template Name: 講習会LP（最終修正版・既存CSS対応）
Description: 既存CSS構造（.p-fv, .p-curriculum等）に準拠しつつ、フォーム削除・ボタン統一版
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
      <p>受付システムをもっと活用したい方へ！<span class="highlight">無料講習会</span> にご招待！</p>
    </div>
  </div>
</header>

<!-- ==============================
     FV（メインビジュアル）
============================== -->
<main class="l-main">
  <section class="p-fv">
    <div class="l-inner">
      <div class="p-fv__container single-col">

        <div class="p-fv__info center fade-in-up">
          <h1 class="p-fv__title">RECEPTIONIST 無料講習会</h1>
          <p class="p-fv__lead">基礎編・応用編の2コースをご用意しています。</p>
        </div>

        <div class="p-fv__image fade-in-up">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/img_fv-visual.webp" alt="講習会イメージ">
        </div>

        <div class="p-fv__btn-area fade-in-up">
          <a href="https://pi.pardot.com/form/read/id/54816" target="_blank" rel="noopener" class="c-button">
            <span>基礎編に申し込む</span>
            <span>無料参加</span>
          </a>
          <a href="https://pi.pardot.com/form/read/id/54693" target="_blank" rel="noopener" class="c-button c-button-blue">
            <span>応用編に申し込む</span>
            <span>無料参加</span>
          </a>
        </div>

      </div>
    </div>
  </section>

  <!-- ==============================
       カリキュラム
  =============================== -->
  <section class="p-curriculum fade-in-up">
    <div class="l-inner">
      <div class="c-section-head">
        <div class="c-section-head__title-wrap">
          <p class="c-section-head__sub">CURRICULUM</p>
          <h2 class="c-section-head__title">講習会カリキュラム</h2>
        </div>
      </div>

      <div class="p-curriculum__container">
        <div class="p-curriculum__card">
          <div class="p-curriculum__card-img">
            <h3><img src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/title_basic.webp" alt="基礎編"></h3>
          </div>
          <div class="p-curriculum__card-body">
            <?php echo wpautop(esc_html($cur_basic)); ?>
            <div class="p-curriculum-btn">
              <a href="https://pi.pardot.com/form/read/id/54816" target="_blank" rel="noopener" class="c-button">
                <span>基礎編に申し込む</span>
                <span>無料参加</span>
              </a>
            </div>
          </div>
        </div>

        <div class="p-curriculum__card">
          <div class="p-curriculum__card-img">
            <h3><img src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/title_advanced.webp" alt="応用編"></h3>
          </div>
          <div class="p-curriculum__card-body">
            <?php echo wpautop(esc_html($cur_adv)); ?>
            <div class="p-curriculum-btn">
              <a href="https://pi.pardot.com/form/read/id/54693" target="_blank" rel="noopener" class="c-button c-button-blue">
                <span>応用編に申し込む</span>
                <span>無料参加</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
