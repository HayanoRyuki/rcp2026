<?php
// セクション専用CSSを読み込み（基準と同じ方法）
echo '<link rel="stylesheet" href="' . get_template_directory_uri() . '/assets/css/partner-contact-select.css">';
?>

<section class="partner-contact">

  <!-- 基準と同じ配置ルール（section直下に page-title） -->
  <h1 class="partner-title">パートナー向け お問い合わせ・資料請求</h1>
  <p class="partner-lead">
    パートナー企業でアカウント希望の方は、その他のお問合せからお問合せください。
  </p>

  <!-- グリッドも基準と同じ位置 -->
  <div class="partner-grid">

    <!-- カード1 -->
    <div class="partner-card">
      <img class="icon"
           src="<?php echo get_template_directory_uri(); ?>/assets/img/contact/contacticon_1.svg"
           alt="パートナー専用サイト">

      <h3 class="partner-card-title">パートナー専用サイト</h3>
      <p class="partner-card-desc">
        最新販促物やFAQなどをご確認いただけます。
      </p>

      <div class="btn-group">
        <a href="https://relation.partnersuccess.app/auth/login"
           target="_blank"
           class="btn">ログインはこちら</a>
      </div>
    </div>

    <!-- カード2 -->
    <div class="partner-card">
      <img class="icon"
           src="<?php echo get_template_directory_uri(); ?>/assets/img/contact/contacticon_2.svg"
           alt="資料希望">

      <h3 class="partner-card-title">ご紹介資料をご希望の方</h3>
      <p class="partner-card-desc">
        ・パートナーポータル未登録の方<br>
        ・販売店様
      </p>

      <div class="btn-group">
        <a href="/document-partner/"
           target="_blank"
           class="btn">資料請求はこちら</a>
      </div>
    </div>

    <!-- カード3 -->
    <div class="partner-card">
      <img class="icon"
           src="<?php echo get_template_directory_uri(); ?>/assets/img/contact/contacticon_3.svg"
           alt="その他のお問合せ">

      <h3 class="partner-card-title">その他のお問合せ</h3>
      <p class="partner-card-desc">
        その他のお問い合わせはこちらからご連絡ください。
      </p>

      <div class="btn-group">
        <a href="/contact/" class="btn">お問合せはこちら</a>
      </div>
    </div>

  </div><!-- /.partner-grid -->

</section>
