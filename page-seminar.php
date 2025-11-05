<?php
/*
Template Name: 講習会LP
Description: RECEPTIONIST講習会のランディングページ（独自プラグイン連動）
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
       ヒーローセクション
  =============================== -->
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
        </div>

        <!-- ===== フォーム部分 ===== -->
        <div class="p-fv__form u-pc">
          <div class="p-fv__form-inner">
            <form id="form">
              <div class="c-form-group-set">
                <div class="c-form-group">
                  <label>姓<span class="required">必須</span></label>
                  <div class="c-form-input"><input type="text" placeholder="山田"></div>
                </div>
                <div class="c-form-group">
                  <label>名<span class="required">必須</span></label>
                  <div class="c-form-input"><input type="text" placeholder="太郎"></div>
                </div>
              </div>
              <div class="c-form-group">
                <label>貴社名<span class="required">必須</span></label>
                <div class="c-form-input"><input type="text" placeholder="貴社名"></div>
              </div>
              <div class="c-form-group">
                <label>メールアドレス<span class="required">必須</span></label>
                <div class="c-form-input"><input type="text" placeholder="example@company.com"></div>
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
                  <select><option>選択してください</option></select>
                </div>
              </div>
              <div class="c-form-group">
                <label>導入目的<span class="cap">（任意）</span></label>
                <div class="c-form-input"><input type="text" placeholder="導入目的をご記入ください"></div>
              </div>
              <div class="c-form-group">
                <label>現在の課題<span class="cap">（任意）</span></label>
                <div class="c-form-input"><input type="text" placeholder="現在の課題をご記入ください"></div>
              </div>
              <div class="c-form-btn-area">
                <a href="#" class="c-button c-button-blue">
                  <span>今すぐ申し込む</span><span>基礎編はこちら</span>
                </a>
                <a href="#" class="c-button">
                  <span>今すぐ申し込む</span><span>応用編はこちら</span>
                </a>
              </div>
            </form>
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
