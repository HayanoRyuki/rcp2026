<?php
/*
Template Name: 講習会LP（完全修正版）
Description: seminar LP / event overview 修正・画像パス修正・2カラムレイアウト最適化版
*/

$post_id = get_the_ID();

// 日程（リピーター）
$basic_dates    = get_post_meta($post_id, 'basic_dates', true);
$advanced_dates = get_post_meta($post_id, 'advanced_dates', true);

// カリキュラム
$cur_title = get_post_meta($post_id, 'curriculum_title', true);
$cur_text  = get_post_meta($post_id, 'curriculum_text', true);
$cur_basic = get_post_meta($post_id, 'curriculum_basic', true);
$cur_adv   = get_post_meta($post_id, 'curriculum_advanced', true);

// フォールバック
if (!is_array($basic_dates))    $basic_dates = array_filter([]);
if (!is_array($advanced_dates)) $advanced_dates = array_filter([]);

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="lp-header">
  <div class="lp-header__inner">
    <div class="lp-header__logo">
      <img src="<?php echo get_template_directory_uri(); ?>assets/img/logo/img-logo-reception.webp" alt="RECEPTIONIST" width="140">
    </div>
    <div class="lp-header__text">
      <p>受付システムをもっと活用したい方へ！<span class="highlight">無料講習会</span> にご招待！</p>
    </div>
  </div>
</header>


<!-- ==============================
     MAIN
============================== -->
<main class="l-main">

<!-- ==============================
     FV（メインビジュアル）
============================== -->
<section class="p-fv">
  <div class="l-inner js-in-view fade-in-up">
    <div class="p-fv__container">

      <div class="p-fv__info">

        <p class="p-fv__label">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/icn_online.svg" alt="" width="12">
          オンライン開催
        </p>

        <h2 class="p-fv__title">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/img_fv-title--pc.webp"
               alt="120分でわかる！RECEPTIONIST講習会"
               class="p-fv__title-img">
        </h2>

        <!-- 日程 -->
        <div class="p-fv__date">
          <div class="p-fv__date-item">
            <h4>基礎編の開催日程</h4>
            <?php if ($basic_dates): ?>
              <?php foreach ($basic_dates as $date): ?>
                <p><?php echo esc_html($date); ?></p>
              <?php endforeach; ?>
            <?php else: ?>
              <p>現在日程は調整中です。</p>
            <?php endif; ?>
          </div>

          <div class="p-fv__date-item">
            <h4>応用編の開催日程</h4>
            <?php if ($advanced_dates): ?>
              <?php foreach ($advanced_dates as $date): ?>
                <p><?php echo esc_html($date); ?></p>
              <?php endforeach; ?>
            <?php else: ?>
              <p>現在日程は調整中です。</p>
            <?php endif; ?>
          </div>
        </div>

        <!-- CTA -->
        <div class="p-fv__btn-area fade-in-up">
          <a href="https://pi.pardot.com/form/read/id/54816" target="_blank" rel="noopener" class="c-button c-button-blue">
            <span>基礎編に申し込む</span>
            <span>無料参加</span>
          </a>
          <a href="https://pi.pardot.com/form/read/id/54693" target="_blank" rel="noopener" class="c-button">
            <span>応用編に申し込む</span>
            <span>無料参加</span>
          </a>
        </div>

      </div>

    </div>
  </div>
</section>



<!-- ==============================
     講習会概要 - Event Overview
============================== -->
<section class="p-event" id="event">
  <div class="l-inner">

    <div class="c-section-head js-in-view fade-in-up">
      <hgroup class="c-section-head__title-wrap">
        <p class="c-section-head__sub">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/icn_section_head.svg" alt="">
          Event Overview
        </p>
        <h2 class="c-section-head__title">講習会概要</h2>
      </hgroup>
    </div>

    <div class="p-event__container js-in-view fade-in-up">

      <!-- 参加対象 -->
      <div class="p-event__step">
        <h3 class="p-event__step-num-text">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/icn_user.svg" alt="">
          参加対象
        </h3>
        <div class="p-event__step-body">
          <p class="p-event__step-text">
            基礎編：トライアルご契約中の方、スタンダードプランご契約中の方<br>
            応用編：すでにご利用中で運用を開始している方
          </p>
        </div>
      </div>

      <!-- 注意事項 -->
      <div class="p-event__step">
        <h3 class="p-event__step-num-text">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/icn_question.svg" alt="">
          注意事項
        </h3>
        <div class="p-event__step-body">
          <p class="p-event__step-text">
            本イベントは同業他社や対象者以外のお申込みについては、お断りさせていただく場合がございます。<br>
            また、録画や静止画像の拡散はお断りしております。なお、本イベントは<b>事前準備</b>が必要になります。<br>
            詳細は申込後に送られるご案内メールをご参照ください。
          </p>
        </div>
      </div>

    </div>

  </div>
</section>



<!-- ==============================
     Support Section
============================== -->
<section class="p-support" id="support">
  <div class="p-support-head js-in-view fade-in-up">
    <h2 class="p-support__title">
      RECEPTIONIST講習会で<br class="u-sp">
      導入前の不安から導入後の定着までサポート！<br>
      少しでも設定に不安がある時はぜひご参加ください！
    </h2>

    <p class="p-support__text">
      基本設定の流れや運用のコツを実際の画面で解説。<br class="u-pc">
      初めての方でもスムーズに導入でき、社内への定着まで安心して進められます。
    </p>
  </div>

  <div class="l-inner u-pc">
    <div class="p-cta js-in-view fade-in-up">
      <a href="https://pi.pardot.com/form/read/id/54816" target="_blank" rel="noopener" class="c-button c-button-blue c-button-l">
        <span>今すぐ申し込む</span>
        <span>基礎編はこちら</span>
      </a>
      <a href="https://pi.pardot.com/form/read/id/54693" target="_blank" rel="noopener" class="c-button c-button-l">
        <span>今すぐ申し込む</span>
        <span>応用編はこちら</span>
      </a>
    </div>
  </div>

</section>



<!-- ==============================
     Curriculum Section
============================== -->
<section class="p-curriculum" id="curriculum">
  <div class="l-inner">

    <div class="c-section-head js-in-view fade-in-up">
      <hgroup class="c-section-head__title-wrap">
        <p class="c-section-head__sub">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/icn_section_head.svg" alt=""> Curriculum
        </p>
        <h2 class="c-section-head__title">
          <?php echo esc_html($cur_title ?: 'カリキュラム'); ?>
        </h2>
        <?php if($cur_text): ?>
          <p class="c-section-head__text"><?php echo nl2br(esc_html($cur_text)); ?></p>
        <?php endif; ?>
      </hgroup>
    </div>


    <div class="p-curriculum__container js-in-view fade-in-up">

      <!-- 基礎編 -->
      <div class="p-curriculum__card">
        <div class="p-curriculum__card-img">
          <h3><img src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/img_curriculum-title1--pc.webp" alt=""></h3>
        </div>
        <div class="p-curriculum__card-body">
          <div class="p-curriculum-list">
            <?php echo wpautop(esc_html($cur_basic)); ?>
          </div>
          <div class="p-curriculum-btn">
            <a href="https://pi.pardot.com/form/read/id/54816" class="c-button c-button-blue" target="_blank" rel="noopener">
              <span>基礎編に申し込む</span><span>無料参加</span>
            </a>
          </div>
        </div>
      </div>

      <!-- 応用編 -->
      <div class="p-curriculum__card">
        <div class="p-curriculum__card-img">
          <h3><img src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/img_curriculum-title2--pc.webp" alt=""></h3>
        </div>
        <div class="p-curriculum__card-body">
          <div class="p-curriculum-list">
            <?php echo wpautop(esc_html($cur_adv)); ?>
          </div>
          <div class="p-curriculum-btn">
            <a href="https://pi.pardot.com/form/read/id/54693" class="c-button" target="_blank" rel="noopener">
              <span>応用編に申し込む</span><span>無料参加</span>
            </a>
          </div>
        </div>
      </div>

    </div>

  </div>
</section>

</main>

<?php get_footer(); ?>
</body>
</html>
