<?php
/*
Template Name: 講習会LP（修正版）
Description: RECEPTIONIST講習会LP 修正対応版（フォーム削除・リンク統一）
*/
get_header();

$post_id = get_the_ID();
$basic1 = get_post_meta($post_id, 'basic_date_1', true);
$basic2 = get_post_meta($post_id, 'basic_date_2', true);
$adv1   = get_post_meta($post_id, 'advanced_date_1', true);
$cur_title = get_post_meta($post_id, 'curriculum_title', true);
$cur_text  = get_post_meta($post_id, 'curriculum_text', true);
$cur_basic = get_post_meta($post_id, 'curriculum_basic', true);
$cur_adv   = get_post_meta($post_id, 'curriculum_advanced', true);
?>

<main class="l-main">

  <!-- ==============================
       HEROセクション（フォーム削除・画像左配置）
  =============================== -->
  <section class="p-fv">
    <div class="l-inner js-in-view fade-in-up">
      <div class="p-fv__container single-col">
        <div class="p-fv__info center">
          <p class="p-fv__label">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/icn_online.svg" alt="オンライン開催" width="12" height="15">
            オンライン開催
          </p>

          <!-- HEROタイトル画像 -->
          <h2 class="p-fv__title">
            <img class="p-fv__title-img"
              src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/img_fv-title--pc.webp"
              alt="120分でわかる！RECEPTIONIST講習会"
              width="460" height="331">
          </h2>

          <!-- HERO新メイン画像 -->
          <div class="p-fv__image">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/img_fv-main--pc.webp" alt="RECEPTIONIST講習会イメージ" width="640" height="360">
          </div>

          <!-- 日程 -->
          <div class="p-fv__date">
            <div class="p-fv__date-item">
              <h4>基礎編の開催日程</h4>
              <div class="p-fv__date-item-inner">
                <?php if($basic1): ?><p><?php echo esc_html($basic1); ?></p><?php endif; ?>
                <?php if($basic2): ?><p><?php echo esc_html($basic2); ?></p><?php endif; ?>
              </div>
            </div>
            <div class="p-fv__date-item">
              <h4>応用編の開催日程</h4>
              <div class="p-fv__date-item-inner">
                <?php if($adv1): ?><p><?php echo esc_html($adv1); ?></p><?php endif; ?>
              </div>
            </div>
          </div>

          <!-- 申し込みボタン -->
          <div class="p-fv__btn-area">
            <a href="https://pi.pardot.com/form/read/id/54816" target="_blank" rel="noopener" class="c-button c-button-blue">
              <span>今すぐ申し込む</span><span>基礎編はこちら</span>
            </a>
            <a href="https://pi.pardot.com/form/read/id/54693" target="_blank" rel="noopener" class="c-button">
              <span>今すぐ申し込む</span><span>応用編はこちら</span>
            </a>
          </div>

        </div>
      </div>
    </div>
  </section>

  <!-- ==============================
       カリキュラムセクション
  =============================== -->
  <section class="p-curriculum" id="curriculum">
    <div class="l-inner">
      <div class="c-section-head js-in-view fade-in-up">
        <hgroup class="c-section-head__title-wrap">
          <p class="c-section-head__sub">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/icn_section_head.svg" alt="">
            Curriculum
          </p>
          <h2 class="c-section-head__title">
            <?php echo esc_html($cur_title ?: 'カリキュラム'); ?>
          </h2>
          <?php if($cur_text): ?>
            <p class="c-section-head__text">
              <?php echo nl2br(esc_html($cur_text)); ?>
            </p>
          <?php endif; ?>
        </hgroup>
      </div>

      <div class="p-curriculum__container js-in-view fade-in-up">
        <div class="p-curriculum__card">
          <div class="p-curriculum__card-img">
            <h3><img src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/img_curriculum-title1--pc.webp" alt="基礎編"></h3>
          </div>
          <div class="p-curriculum__card-body">
            <div class="p-curriculum-list">
              <?php echo wpautop(esc_html($cur_basic)); ?>
            </div>
          </div>
        </div>

        <div class="p-curriculum__card">
          <div class="p-curriculum__card-img">
            <h3><img src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/img_curriculum-title2--pc.webp" alt="応用編"></h3>
          </div>
          <div class="p-curriculum__card-body">
            <div class="p-curriculum-list">
              <?php echo wpautop(esc_html($cur_adv)); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>
