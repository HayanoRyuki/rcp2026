<?php
/**
 * Template Name: Seminar
 * Description: RECEPTIONIST 講習会LPテンプレート
 */
get_header();
?>

<main class="seminar-page">

  <!-- ==============================
       FV
  ============================== -->
  <section class="p-fv">
    <div class="l-inner">
      <div class="p-fv__container">
        <div class="p-fv__info">

          <p class="p-fv__label">オンライン開催</p>

          <h1 class="p-fv__title">120分でわかる！RECEPTIONIST講習会</h1>

          <div class="p-fv__date">
            <div class="p-fv__date-item">
              <h2 class="p-fv__date-heading">基礎編の開催日程</h2>
              <p>現在日程は調整中です。</p>
            </div>

            <div class="p-fv__date-item">
              <h2 class="p-fv__date-heading">応用編の開催日程</h2>
              <p>現在日程は調整中です。</p>
            </div>
          </div>

          <div class="p-fv__btn-area">
            <a class="c-button c-button-blue c-button-lg"
               href="https://t.receptionist.jp/l/436112/2025-09-29/8m2fgb"
               target="_blank" rel="noopener">
              <span>基礎編に申し込む</span>
              <span class="c-button__sub">無料参加</span>
            </a>

            <a class="c-button c-button-green c-button-lg"
               href="https://t.receptionist.jp/l/436112/2025-09-16/8m1k4b"
               target="_blank" rel="noopener">
              <span>応用編に申し込む</span>
              <span class="c-button__sub">無料参加</span>
            </a>
          </div>

        </div>
      </div>
    </div>
  </section>


  <!-- ==============================
       講習会概要
  ============================== -->
  <section id="event" class="p-event">
    <div class="l-inner">

      <header class="c-section-head">
        <p class="c-section-head__sub">Event Overview</p>
        <h2 class="c-section-head__title">講習会概要</h2>
      </header>

      <div class="p-event__container">

        <article class="p-event__step">
          <h3 class="p-event__step-title">参加対象</h3>
          <div class="p-event__step-body">
            <p>
              基礎編：トライアルご契約中の方、スタンダードプランご契約中の方<br>
              応用編：すでにご利用中で運用を開始している方
            </p>
          </div>
        </article>

        <article class="p-event__step">
          <h3 class="p-event__step-title">注意事項</h3>
          <div class="p-event__step-body">
            <p>
              本イベントは同業他社や対象者以外のお申込みについては、お断りさせていただく場合があります。<br>
              録画や静止画像の拡散はお断りしております。<br>
              本イベントは<strong>事前準備</strong>が必要です。詳細は申込後の案内メールをご確認ください。
            </p>
          </div>
        </article>

      </div>

    </div>
  </section>


  <!-- ==============================
       Support
  ============================== -->
  <section id="support" class="p-support">
    <div class="l-inner">

      <div class="p-support-head">
        <h2 class="p-support__title">
          RECEPTIONIST講習会で導入前の不安から導入後の定着までサポート。
        </h2>

        <p class="p-support__text">
          基本設定の流れや運用のコツを実際の画面で解説します。<br>
          初めての方でもスムーズに導入でき、社内の定着まで安心して進められます。
        </p>
      </div>

      <div class="p-support__cta">
        <a class="c-button c-button-blue c-button-lg"
           href="https://t.receptionist.jp/l/436112/2025-09-29/8m2fgb"
           target="_blank" rel="noopener">
          <span>今すぐ申し込む</span>
          <span class="c-button__sub">基礎編はこちら</span>
        </a>

        <a class="c-button c-button-green c-button-lg"
           href="https://t.receptionist.jp/l/436112/2025-09-16/8m1k4b"
           target="_blank" rel="noopener">
          <span>今すぐ申し込む</span>
          <span class="c-button__sub">応用編はこちら</span>
        </a>
      </div>

    </div>
  </section>


  <!-- ==============================
       Curriculum
  ============================== -->
  <section id="curriculum" class="p-curriculum">
    <div class="l-inner">

      <header class="c-section-head">
        <p class="c-section-head__sub">Curriculum</p>
        <h2 class="c-section-head__title">カリキュラム</h2>
      </header>

      <div class="p-curriculum__container">

        <!-- 基礎編 -->
        <article class="p-curriculum__card">
          <h3 class="p-curriculum__card-title">基礎編</h3>
          <div class="p-curriculum__card-body">
            <ul class="p-curriculum-list">
              <?php /* 略 */ ?>
            </ul>

            <div class="p-curriculum-btn">
              <a class="c-button c-button-blue c-button-lg"
                 href="https://t.receptionist.jp/l/436112/2025-09-29/8m2fgb"
                 target="_blank" rel="noopener">
                <span>基礎編に申し込む</span>
                <span class="c-button__sub">無料参加</span>
              </a>
            </div>
          </div>
        </article>

        <!-- 応用編 -->
        <article class="p-curriculum__card">
          <h3 class="p-curriculum__card-title">応用編</h3>
          <div class="p-curriculum__card-body">
            <ul class="p-curriculum-list">
              <?php /* 略 */ ?>
            </ul>

            <div class="p-curriculum-btn">
              <a class="c-button c-button-green c-button-lg"
                 href="https://t.receptionist.jp/l/436112/2025-09-16/8m1k4b"
                 target="_blank" rel="noopener">
                <span>応用編に申し込む</span>
                <span class="c-button__sub">無料参加</span>
              </a>
            </div>
          </div>
        </article>

      </div>

    </div>
  </section>

</main>

<?php get_footer(); ?>
