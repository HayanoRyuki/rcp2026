<?php

/**
 * Template Name: セミナーLP納品
 */
get_header('seminar');
?>

<!--l-main-->
<main class="lp-seminar__main">

  <!--p-fv-->
  <section class="lp-seminar__fv">
    <div class="lp-seminar__inner js-in-view fade-in-up">
      <div class="lp-seminar__fv-container">
        <div class="lp-seminar__fv-info">
          <h2 class="lp-seminar__fv-title">
            <img class="lp-seminar__fv-title-img" src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/img_fv-title--pc.webp" alt="120分でわかる！RECEPTIONIST講演会導入前の疑問や不安をすべて解決し、導入後の定着までサポートします" width="460" height="331.75">
          </h2>
        </div>
        <div class="lp-seminar__fv-date">
          <div class="lp-seminar__fv-date-item">
            <h4>基礎編の開催日程</h4>
            <div class="lp-seminar__fv-date-item-inner">
              <?php
                $page_id = 1812;
                $meta_key = 'basic_dates';
                $meta_key2 = 'basic_week';
                $meta_key3 = 'basic_times';
                $basic_dates = get_post_meta( $page_id, $meta_key, false );
                $basic_week = get_post_meta( $page_id, $meta_key2, false );
                $basic_times = get_post_meta( $page_id, $meta_key3, false );
                foreach ($basic_dates[0] as $index => $basic_date) {
                  if ($basic_date) {
                    echo '<p>'.$basic_date.'<span>'.$basic_week[0][$index].'</span> '.$basic_times[0][$index].'</p>';
                  }
                }
              ?>
            </div>
          </div>
          <div class="lp-seminar__fv-date-item">
            <h4>応用編の開催日程</h4>
            <div class="lp-seminar__fv-date-item-inner">
              <?php
                $page_id = 1812;
                $meta_key4 = 'advanced_dates';
                $meta_key5 = 'advanced_week';
                $meta_key6 = 'advanced_times';
                $advanced_dates = get_post_meta( $page_id, $meta_key4, false );
                $advanced_week = get_post_meta( $page_id, $meta_key5, false );
                $advanced_times = get_post_meta( $page_id, $meta_key6, false );
                foreach ($advanced_dates[0] as $index => $advanced_date) {
                  if ($advanced_date) {
                    echo '<p>'.$advanced_date.'<span>'.$advanced_week[0][$index].'</span> '.$advanced_times[0][$index].'</p>';
                  }
                }
              ?>
            </div>
          </div>
        </div>
      </div>
      <div class="lp-seminar__fv-application">
        <div class="lp-seminar__fv-application-inner">
          <div class="lp-seminar__fv-basics-area">
            <p class="lp-seminar__fv-basics-lead">今すぐ申し込む</p>
            <div class="lp-seminar__fv-basics-btn"><a href="https://t.receptionist.jp/l/436112/2025-12-09/8m6tzv">基礎編はこちら</a></div>
          </div>
          <div class="lp-seminar__fv-advanced-area">
            <p class="lp-seminar__fv-advanced-lead">今すぐ申し込む</p>
            <div class="lp-seminar__fv-advanced-btn"><a href="https://t.receptionist.jp/l/436112/2025-09-16/8m1k4b">応用編はこちら</a></div>
          </div>
        </div>
      </div>

    </div>
  </section>
  <!--/end p-fv-->

  <!--p-about-->
  <div class="lp-seminar__about">
    <div class="lp-seminar__about-head">
      <div class="lp-seminar__inner js-in-view fade-in-up">
        <div class="lp-seminar__about-head-title-wrap">
          <h2 class="lp-seminar__about-head-title-h2">
            <img class="lp-seminar__about-head-title-img u-pc" src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/img_about-title--pc.webp" alt="管理者の皆さん、受付システムを最大限活用できていますか？" width="972" height="237">
            <img class="lp-seminar__about-head-title-img u-sp" src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/img_about-title--sp.webp" alt="管理者の皆さん、受付システムを最大限活用できていますか？" width="972" height="237">
          </h2>
        </div>
        <div class="lp-seminar__about-case-top">
          <h3>ありがちなケースとして―<span class="u-pc">―</span></h3>
          <div class="lp-seminar__about-case-box">
            <div class="lp-seminar__about-case-item-top">
              <img class="lp-seminar__about-case-item-top-img u-pc" src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/img_about-case1--pc.webp" alt="基本設定をそのままにしている…" width="321" height="148">
              <img class="lp-seminar__about-case-item-top-img u-sp" src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/img_about-case1--sp.webp" alt="基本設定をそのままにしている…" width="321" height="148">
            </div>
            <div class="lp-seminar__about-case-item-top">
              <img class="lp-seminar__about-case-item-top-img u-pc" src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/img_about-case2--pc.webp" alt="管理者自身が「理解しているつもり」で止まっている" width="321" height="175">
              <img class="lp-seminar__about-case-item-top-img u-sp" src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/img_about-case2--sp.webp" alt="管理者自身が「理解しているつもり」で止まっている" width="321" height="175">
            </div>
            <div class="lp-seminar__about-case-item-top">
              <img class="lp-seminar__about-case-item-top-img u-pc" src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/img_about-case3--pc.webp" alt="新機能が出ても追えていない" width="262" height="148">
              <img class="lp-seminar__about-case-item-top-img u-sp" src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/img_about-case3--sp.webp" alt="新機能が出ても追えていない" width="262" height="148">
            </div>
          </div>
        </div>
        <div class="lp-seminar__about-text-box">
          <p class="lp-seminar__about-text js-in-view fade-in-up">コストだけがかかって<br class="u-sp">効果は半減してしまうこの状態。<br>
            DX化の本質は<br class="u-sp">「導入すること」ではなく<br class="u-sp">「正しく活用して定着させること」です。</p>
          <p class="lp-seminar__about-text--2 js-in-view fade-in-up">そのコツを、<br class="u-sp"><span>RECEPTIONIST講習会で</span><br class="u-sp">学んでみませんか？</p>
        </div>
      </div>
    </div>
    <div class="lp-seminar__about-body">
      <div class="lp-seminar__inner js-in-view fade-in-up">
        <h2 class="lp-seminar__about-body-title">RECEPTIONIST講習会とは</h2>
        <p class="lp-seminar__about-body-text">RECEPTIONISTの導入直後に必要な準備から、<br class="u-pc">活用を広げるためのノウハウまでを120分で学べる講習会です。<br>
          導入前の不安を解消し、導入後に定着させるためのポイントを凝縮してお伝えします。</p>
        <div class="lp-seminar__about-case-title js-in-view fade-in-up">
          <img class="lp-seminar__about-case-title-img u-pc" src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/img_about__case_title--pc.webp" alt="この120分の講義を受けるだけで…" width="642" height="87">
          <img class="lp-seminar__about-case-title-img u-sp" src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/img_about__case_title--sp.webp" alt="この120分の講義を受けるだけで…" width="642" height="87">
        </div>
        <div class="lp-seminar__about-case js-in-view fade-in-up">
          <div class="lp-seminar__about-case-item js-in-view fade-in-up">
            <figure><img class="lp-seminar__about-case-item-img" src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/img_about__case1--pc.webp" alt="導入準備でつまづかない！" width="262" height="184"></figure>
            <h3>導入準備でつまづかない！</h3>
            <p>導入手順や設定のポイントをわかりやすく解説。スムーズに導入を進めるためのコツを習得できます。</p>
          </div>
          <div class="lp-seminar__about-case-item js-in-view fade-in-up">
            <figure><img class="lp-seminar__about-case-item-img" src="<?php echo get_template_directory_uri(); ?>//assets/img/seminar/img_about__case2--pc.webp" alt="導入後の利用定着につながる！" width="262" height="184"></figure>
            <h3>導入後の利用定着につながる！</h3>
            <p>社内での活用を広げるための実践的なノウハウを共有。利用促進や社内展開のコツがつかめます。</p>
          </div>
          <div class="lp-seminar__about-case-item js-in-view fade-in-up">
            <figure><img class="lp-seminar__about-case-item-img" src="<?php echo get_template_directory_uri(); ?>//assets/img/seminar/img_about__case3--pc.webp" alt="新機能を理解し即活用！" width="262" height="184"></figure>
            <h3>新機能を理解し即活用！</h3>
            <p>RECEPTIONISTの最新機能やアップデート内容をわかりやすく解説します。</p>
          </div>
        </div>
        <div class="lp-seminar__about-text--3 js-in-view fade-in-up">
          <h3><span class="line"><span class="blue">「導入準備」</span>も<span class="blue">「活用」</span>も、</span><span class="line">不安なく始められます。</span></h3>
          <p>受講スタイルは無料参加・顔出し不要で、操作や設定は「ハンズオン形式」にて学んでいただけます。<br>
            参加のハードルはありません。<br class="u-sp">ぜひお気軽にご参加ください。</p>
        </div>
        <div class="lp-seminar__cta js-in-view fade-in-up">
          <a href="https://t.receptionist.jp/l/436112/2025-12-09/8m6tzv" class="lp-seminar__button lp-seminar__button--l lp-seminar__button--blue">
            <span>今すぐ申し込む</span>
            <span>基礎編はこちら</span>
          </a>
          <a href="https://t.receptionist.jp/l/436112/2025-09-16/8m1k4b" class="lp-seminar__button lp-seminar__button--l">
            <span>今すぐ申し込む</span>
            <span>応用編はこちら</span>
          </a>
        </div>
      </div>
    </div>
  </div>
  <!--/end p-about-->

  <!--p-curriculum-->
  <section class="lp-seminar__curriculum" id="curriculum">
    <div class="lp-seminar__inner">
      <div class="lp-seminar__section-head js-in-view fade-in-up">
        <hgroup class="lp-seminar__section-head-title-wrap">
          <p class="lp-seminar__section-head-sub"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/icn_section_head.svg" alt=""> Curriculum</p>
          <h2 class="lp-seminar__section-head-title">カリキュラム</h2>
          <p class="lp-seminar__section-head-text">RECEPTIONISTの<br class="u-sp">導入状況・ご利用状況に合わせた<br class="u-sp">カリキュラムをご用意しております。</p>
        </hgroup>
      </div>
      <div class="lp-seminar__curriculum-container js-in-view fade-in-up">
        <div class="lp-seminar__curriculum-card">
          <div class="lp-seminar__curriculum-card-img">
            <h3><img src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/img_curriculum-title1--pc.webp" alt="基礎編"></h3>
          </div>
          <div class="lp-seminar__curriculum-card-body">
            <div class="lp-seminar__curriculum-list">
              <?php
                $page_id = 1812;
                $cur_key = 'curriculum_basic';
                $cur_key2 = 'curriculum_basic_text';
                $curriculum_basic = get_post_meta( $page_id, $cur_key, false );
                $curriculum_basic_text = get_post_meta( $page_id, $cur_key2, false );
                foreach ($curriculum_basic[0] as $index => $curriculum_data) {
                  if ($curriculum_data) {
                    echo '<h3 class="lp-seminar__curriculum-card-title"><img src="'.get_template_directory_uri().'/assets/img/seminar/icn_check.svg" alt="">'.$curriculum_data.'</h3>';
                    if ($curriculum_basic_text[0][$index]) {
                      echo '<ul>';
                      $curriculum_basic_txt = str_replace(["\r\n", "\r", "\n"], '</li><li>', $curriculum_basic_text[0][$index]);
                      echo '<li>'.$curriculum_basic_txt.'</li>';
                      echo '</ul>';
                    }
                  }
                }
              ?>
            </div>
            <div class="lp-seminar__curriculum-btn">
              <a href="https://t.receptionist.jp/l/436112/2025-12-09/8m6tzv" class="lp-seminar__button lp-seminar__button--m lp-seminar__button--blue">
                <span>今すぐ申し込む</span>
                <span>基礎編はこちら</span>
              </a>
            </div>
          </div>
        </div>
        <div class="lp-seminar__curriculum-card">
          <div class="lp-seminar__curriculum-card-img">
            <h3><img src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/img_curriculum-title2--pc.webp" alt="応用編"></h3>
          </div>
          <div class="lp-seminar__curriculum-card-body">
            <div class="lp-seminar__curriculum-list">
              <?php
                $page_id = 1812;
                $cur_key3 = 'curriculum_advanced';
                $cur_key4 = 'curriculum_advanced_text';
                $curriculum_advanced = get_post_meta( $page_id, $cur_key3, false );
                $curriculum_advanced_text = get_post_meta( $page_id, $cur_key4, false );
                foreach ($curriculum_advanced[0] as $index => $curriculum_adata) {
                  if ($curriculum_adata) {
                    echo '<h3 class="lp-seminar__curriculum-card-title"><img src="'.get_template_directory_uri().'/assets/img/seminar/icn_check.svg" alt="">'.$curriculum_adata.'</h3>';
                    if ($curriculum_advanced_text[0][$index]) {
                      echo '<ul>';
                      $curriculum_advanced_txt = str_replace(["\r\n", "\r", "\n"], '</li><li>', $curriculum_advanced_text[0][$index]);
                      echo '<li>'.$curriculum_advanced_txt.'</li>';
                      echo '</ul>';
                    }
                  }
                }
              ?>
            </div>
            <div class="lp-seminar__curriculum-btn">
              <a href="https://t.receptionist.jp/l/436112/2025-09-16/8m1k4b" class="lp-seminar__button lp-seminar__button--m">
                <span>今すぐ申し込む</span>
                <span>応用編はこちら</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/end p-curriculum-->

  <!--p-event-->
  <section class="lp-seminar__event" id="event">
    <div class="lp-seminar__inner">
      <div class="lp-seminar__section-head js-in-view fade-in-up">
        <hgroup class="lp-seminar__section-head-title-wrap">
          <p class="lp-seminar__section-head-sub"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/icn_section_head.svg" alt="Event Overview"> Event Overview</p>
          <h2 class="lp-seminar__section-head-title">講習会概要</h2>
        </hgroup>
      </div>
      <div class="lp-seminar__event-container js-in-view fade-in-up">
        <div class="lp-seminar__event-contents">
          <div class="lp-seminar__event-step">
            <div class="lp-seminar__event-step-num">
              <h3 class="lp-seminar__event-step-num-text"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/icn_user.svg" alt="参加対象">参加対象</h3>
            </div>
            <div class="lp-seminar__event-step-body">
              <p class="lp-seminar__event-step-text">基礎編：RECEPTIONISTの導入を検討中の方／導入済みの方（基本操作を中心に解説）<br>
                応用編：RECEPTIONIST導入済みの方（基本的な設定・操作を理解している方向け）</p>
            </div>
          </div>
          <div class="lp-seminar__event-step">
            <div class="lp-seminar__event-step-num">
              <h3 class="lp-seminar__event-step-num-text"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/icn_question.svg" alt="注意事項">注意事項</h3>
            </div>
            <div class="lp-seminar__event-step-body">
              <p class="lp-seminar__event-step-text">本イベントは同業他社や対象者以外のお申込みについては、お断りさせていただく場合がございます。<br>
                また、録画や静止画像の拡散はお断りしております。なお、本イベントは<b>事前準備</b>が必要になります。<br>
                詳細は申込後に送られるご案内メールをご参照ください。</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/end p-event-->

  <!--p-support-->
  <section class="lp-seminar__support" id="support">
    <div class="lp-seminar__support-head js-in-view fade-in-up">
      <h2 class="lp-seminar__support-title">RECEPTIONIST講習会で<br class="u-sp">導入前の不安から<br class="u-sp">導入後の定着までサポート！<br>
        少しでも設定に不安がある時は<br class="u-sp">ぜひご参加ください！</h2>
      <p class="lp-seminar__support-text">基本設定の流れや運用のコツを実際の画面で解説。<br class="u-pc">
        初めての方でもスムーズに導入でき、社内への定着まで安心して進められます。</p>
    </div>
    <div class="lp-seminar__inner u-pc">
      <div class="lp-seminar__cta js-in-view fade-in-up">
        <a href="https://t.receptionist.jp/l/436112/2025-12-09/8m6tzv" class="lp-seminar__button lp-seminar__button--blue lp-seminar__button--l">
          <span>今すぐ申し込む</span>
          <span>基礎編はこちら</span>
        </a>
        <a href="https://t.receptionist.jp/l/436112/2025-09-16/8m1k4b" class="lp-seminar__button lp-seminar__button--l">
          <span>今すぐ申し込む</span>
          <span>応用編はこちら</span>
        </a>
      </div>
    </div>
    <div class="lp-seminar__fv-form u-sp">
      <div class="lp-seminar__fv-form-inner">
        <form id="forms">
          <div class="lp-seminar__form-group-set">
            <div class="lp-seminar__form-group">
              <label>姓<span class="required">必須</span></label>
              <div class="lp-seminar__form-group-input">
                <input type="text" placeholder="山田">
              </div>
            </div>
            <div class="lp-seminar__form-group">
              <label>名<span class="required">必須</span></label>
              <div class="lp-seminar__form-group-input">
                <input type="text" placeholder="太郎">
              </div>
            </div>
          </div>
          <div class="lp-seminar__form-group">
            <label>貴社名<span class="required">必須</span></label>
            <div class="lp-seminar__form-group-input">
              <input type="text" placeholder="貴社名">
            </div>
          </div>
          <div class="lp-seminar__form-group">
            <label>メールアドレス<span class="required">必須</span></label>
            <div class="lp-seminar__form-group-input">
              <input type="text" placeholder="example@company.com">
            </div>
          </div>
          <div class="lp-seminar__form-group">
            <label>参加日時<span class="required">必須</span></label>
            <div class="lp-seminar__form-select">
              <select>
                <option>開催日を選択してください</option>
              </select>
            </div>
          </div>
          <div class="lp-seminar__form-group">
            <label>この講習会をどこで知りましたか？<span class="cap">（任意）</span></label>
            <div class="lp-seminar__form-select">
              <select>
                <option>選択してください</option>
              </select>
            </div>
          </div>
          <div class="lp-seminar__form-group">
            <label>導入目的<span class="cap">（任意）</span></label>
            <div class="lp-seminar__form-group-input">
              <input type="text" placeholder="導入目的をご記入ください">
            </div>
          </div>
          <div class="lp-seminar__form-group">
            <label>現在の課題<span class="cap">（任意）</span></label>
            <div class="lp-seminar__form-group-input">
              <input type="text" placeholder="現在の課題をご記入ください">
            </div>
          </div>
          <div class="lp-seminar__form-btn-area">
            <a href="https://t.receptionist.jp/l/436112/2025-12-09/8m6tzv" class="lp-seminar__button lp-seminar__button--blue">
              <span>今すぐ申し込む</span>
              <span>基礎編はこちら</span>
            </a>
            <a href="https://t.receptionist.jp/l/436112/2025-09-16/8m1k4b" class="lp-seminar__button">
              <span>今すぐ申し込む</span>
              <span>応用編はこちら</span>
            </a>
          </div>
        </form>
      </div>
    </div>
  </section>
  <!--/end p-support-->

</main>
<!--l-main-->

<?php get_footer(); ?>