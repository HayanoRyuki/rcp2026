<?php
/*
Template Name: 講習会LP（最終修正版・既存CSS対応）
Description: 既存CSS構造（.p-fv, .p-curriculum等）に準拠しつつ、フォーム削除・ボタン統一版
*/

$post_id = get_the_ID();

// ✅ 新しいリピーター形式を優先的に取得
$basic_dates    = get_post_meta($post_id, 'basic_dates', true);
$advanced_dates = get_post_meta($post_id, 'advanced_dates', true);

// ✅ カリキュラム関連
$cur_title = get_post_meta($post_id, 'curriculum_title', true);
$cur_text  = get_post_meta($post_id, 'curriculum_text', true);
$cur_basic = get_post_meta($post_id, 'curriculum_basic', true);
$cur_adv   = get_post_meta($post_id, 'curriculum_advanced', true);

// ✅ 配列初期化（旧形式フォールバック対応）
if (!is_array($basic_dates)) {
  $basic_dates = array_filter([$basic1, $basic2]);
}
if (!is_array($advanced_dates)) {
  $advanced_dates = array_filter([$adv1]);
}
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

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
    <div class="l-inner js-in-view fade-in-up">
      <div class="p-fv__container">
        <div class="p-fv__info">

          <p class="p-fv__label">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/icn_online.svg" alt="オンライン開催" width="12" height="15">
            オンライン開催
          </p>

          <h2 class="p-fv__title">
            <img class="p-fv__title-img"
                 src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/img_fv-title--pc.webp"
                 alt="120分でわかる！RECEPTIONIST講習会 導入前の疑問や不安をすべて解決し、導入後の定着までサポートします"
                 width="460" height="331">
          </h2>

          <!-- ==============================
               日程リピーター対応部分
          =============================== -->
          <div class="p-fv__date">
            <div class="p-fv__date-item">
              <h4>基礎編の開催日程</h4>
              <div class="p-fv__date-item-inner">
                <?php if (!empty($basic_dates)): ?>
                  <?php foreach ($basic_dates as $date): ?>
                    <p><?php echo esc_html($date); ?></p>
                  <?php endforeach; ?>
                <?php else: ?>
                  <p>現在日程は調整中です。</p>
                <?php endif; ?>
              </div>
            </div>

            <div class="p-fv__date-item">
              <h4>応用編の開催日程</h4>
              <div class="p-fv__date-item-inner">
                <?php if (!empty($advanced_dates)): ?>
                  <?php foreach ($advanced_dates as $date): ?>
                    <p><?php echo esc_html($date); ?></p>
                  <?php endforeach; ?>
                <?php else: ?>
                  <p>現在日程は調整中です。</p>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <!-- ============================== -->

          <!-- ボタン部分 -->
          <div class="p-fv__btn-area fade-in-up">
            <a href="https://pi.pardot.com/form/read/id/54816" target="_blank" rel="noopener" class="c-button c-button-blue">
              <span>基礎編に申し込む</span><span>無料参加</span>
            </a>
            <a href="https://pi.pardot.com/form/read/id/54693" target="_blank" rel="noopener" class="c-button">
              <span>応用編に申し込む</span><span>無料参加</span>
            </a>
          </div>

        </div><!-- /.p-fv__info -->
      </div><!-- /.p-fv__container -->
    </div>
  </section>

  <!-- ここから下は既存LPにあった残りセクションを順次復活 -->

  <!--p-event-->
  <section class="p-event" id="event">
    <div class="l-inner">
      <div class="c-section-head js-in-view fade-in-up">
        <hgroup class="c-section-head__title-wrap">
          <p class="c-section-head__sub"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icn_section_head.svg" alt="Event Overview"> Event Overview</p>
          <h2 class="c-section-head__title">講習会概要</h2>
        </hgroup>
      </div>
      <div class="p-event__container js-in-view fade-in-up">
        <div class="p-event__contents">
          <div class="p-event__step">
            <div class="p-event__step-num">
              <h3 class="p-event__step-num-text"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icn_user.svg" alt="参加対象">参加対象</h3>
            </div>
            <div class="p-event__step-body">
              <p class="p-event__step-text">基礎編：トライアルご契約中の方、スタンダードプランご契約中の方<br>
                応用編：すでにご利用中で運用を開始している方</p>
            </div>
          </div>
          <div class="p-event__step">
            <div class="p-event__step-num">
              <h3 class="p-event__step-num-text"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icn_question.svg" alt="注意事項">注意事項</h3>
            </div>
            <div class="p-event__step-body">
              <p class="p-event__step-text">本イベントは同業他社や対象者以外のお申込みについては、お断りさせていただく場合がございます。<br>
                また、録画や静止画像の拡散はお断りしております。なお、本イベントは<b>事前準備</b>が必要になります。<br>
                詳細は申込後に送られるご案内メールをご参照ください。</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--/end p-event-->

    <!--p-support-->
    <section class="p-support" id="support">
      <div class="p-support-head js-in-view fade-in-up">
        <h2 class="p-support__title">RECEPTIONIST講習会で<br class="u-sp">導入前の不安から<br class="u-sp">導入後の定着までサポート！<br>
          少しでも設定に不安がある時は<br class="u-sp">ぜひご参加ください！</h2>
        <p class="p-support__text">基本設定の流れや運用のコツを実際の画面で解説。<br class="u-pc">
          初めての方でもスムーズに導入でき、社内への定着まで安心して進められます。</p>
      </div>
      <div class="l-inner u-pc">
        <div class="p-cta js-in-view fade-in-up">
          <a href="#" class="c-button c-button-blue c-button-l">
            <span>今すぐ申し込む</span>
            <span>基礎編はこちら</span>
          </a>
          <a href="#" class="c-button c-button-l">
            <span>今すぐ申し込む</span>
            <span>応用編はこちら</span>
          </a>
        </div>
      </div>
      <div class="p-fv__form u-sp">
        <div class="p-fv__form-inner">
          <form id="forms">
            <div class="c-form-group-set">
              <div class="c-form-group">
                <label>姓<span class="required">必須</span></label>
                <div class="c-form-input">
                  <input type="text" placeholder="山田">
                </div>
              </div>
              <div class="c-form-group">
                <label>名<span class="required">必須</span></label>
                <div class="c-form-input">
                  <input type="text" placeholder="太郎">
                </div>
              </div>
            </div>
            <div class="c-form-group">
              <label>貴社名<span class="required">必須</span></label>
              <div class="c-form-input">
                <input type="text" placeholder="貴社名">
              </div>
            </div>
            <div class="c-form-group">
              <label>メールアドレス<span class="required">必須</span></label>
              <div class="c-form-input">
                <input type="text" placeholder="example@company.com">
              </div>
            </div>
            <div class="c-form-group">
              <label>参加日時<span class="required">必須</span></label>
              <div class="c-form-select">
                <select>
                  <option>開催日を選択してください</option>
                </select>
              </div>
            </div>
            <div class="c-form-group">
              <label>この講習会をどこで知りましたか？<span class="cap">（任意）</span></label>
              <div class="c-form-select">
                <select>
                  <option>選択してください</option>
                </select>
              </div>
            </div>
            <div class="c-form-group">
              <label>導入目的<span class="cap">（任意）</span></label>
              <div class="c-form-input">
                <input type="text" placeholder="導入目的をご記入ください">
              </div>
            </div>
            <div class="c-form-group">
              <label>現在の課題<span class="cap">（任意）</span></label>
              <div class="c-form-input">
                <input type="text" placeholder="現在の課題をご記入ください">
              </div>
            </div>
            <div class="c-form-btn-area">
              <a href="#" class="c-button c-button-blue">
                <span>今すぐ申し込む</span>
                <span>基礎編はこちら</span>
              </a>
              <a href="#" class="c-button">
                <span>今すぐ申し込む</span>
                <span>応用編はこちら</span>
              </a>
            </div>
          </form>
        </div>
      </div>
    </section>
    <!--/end p-support-->

    
  <!-- ==============================
       カリキュラムセクション
  =============================== -->
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
            <h3><img src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/img_curriculum-title1--pc.webp" alt="基礎編"></h3>
          </div>
          <div class="p-curriculum__card-body">
            <div class="p-curriculum-list">
              <?php echo wpautop(esc_html($cur_basic)); ?>
            </div>
            <div class="p-curriculum-btn">
              <a href="https://pi.pardot.com/form/read/id/54816" target="_blank" rel="noopener" class="c-button c-button-blue">
                <span>基礎編に申し込む</span><span>無料参加</span>
              </a>
            </div>
          </div>
        </div>

        <!-- 応用編 -->
        <div class="p-curriculum__card">
          <div class="p-curriculum__card-img">
            <h3><img src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/img_curriculum-title2--pc.webp" alt="応用編"></h3>
          </div>
          <div class="p-curriculum__card-body">
            <div class="p-curriculum-list">
              <?php echo wpautop(esc_html($cur_adv)); ?>
            </div>
            <div class="p-curriculum-btn">
              <a href="https://pi.pardot.com/form/read/id/54693" target="_blank" rel="noopener" class="c-button">
                <span>応用編に申し込む</span><span>無料参加</span>
              </a>
            </div>
          </div>
        </div>
      </div><!-- /.p-curriculum__container -->
    </div>
  </section>
</main>

<?php get_footer(); ?>
</body>
</html>
