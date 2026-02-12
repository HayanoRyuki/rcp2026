<?php
/* Template Name: Thanksページ */
get_header();
?>

<main class="thanks-page">

  <h1 class="thanks-title">お問い合わせありがとうございます</h1>

  <p class="thanks-lead">
    この度は弊社サービスにお問い合わせをいただき、誠にありがとうございます。<br>
    2営業日（土日祝を除く）以内に担当者からご連絡いたします。
  </p>

  <!-- ===== イベント利用案内カード ===== -->
  <div class="thanks-event-card">
    <div class="thanks-event-card__notice">
      <p class="thanks-event-card__notice-title">※ イベントやセミナーでのご利用をご検討中の方へ ※</p>
      <p class="thanks-event-card__notice-text">
        メールにお送りしている資料は<strong>「オフィス受付」</strong>向けの内容となっております。<br>
        もしイベント・展示会・学会等での受付システムをお探しの場合は、<br>
        下記の<strong>「招待レセプション」</strong>がおすすめです。
      </p>
    </div>

    <a href="https://receptionist.my.salesforce.com/sfc/p/7F000001xBPZ/a/Nn000003dNEL/7eNydQQD_.Ijx6u_ASRMOazwLEomMdd4iW8C_Ge9x7E"
       target="_blank" rel="noopener" class="thanks-event-card__banner">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/cta/shotai-reception-banner.webp"
           alt="招待レセプション - イベント用受付システム"
           class="thanks-event-card__banner-img">
    </a>

    <div class="thanks-event-card__cta">
      <a href="https://receptionist.my.salesforce.com/sfc/p/7F000001xBPZ/a/Nn000003dNEL/7eNydQQD_.Ijx6u_ASRMOazwLEomMdd4iW8C_Ge9x7E"
         target="_blank" rel="noopener" class="btn-thanks danger">
        ▼ イベント用受付システム「招待レセプション」はこちら ▼
      </a>
    </div>
  </div>

  <!-- ===== パートナー関連 ===== -->
  <div class="thanks-links">
    <div class="section-block">
      <div class="section-title">
        ▼お客様への紹介や協業について▼
      </div>
      <div class="link-list">
        <a href="/partner-contact-select/" target="_blank" rel="noopener">
          パートナーお問い合わせはこちら
        </a>
      </div>
    </div>
  </div><!-- /.thanks-links -->

</main>

<?php get_footer(); ?>
