<?php
// セクション専用CSSを読み込み（2つ）
echo '<link rel="stylesheet" href="' . get_template_directory_uri() . '/assets/css/header-partner.css">';
echo '<link rel="stylesheet" href="' . get_template_directory_uri() . '/assets/css/partner-contact-select.css">';
?>

<section class="contact-select" id="partner-contact-select">
  <h1 class="page-title">パートナー向け　お問い合わせ・資料請求</h1>
<p class="contact-lead">パートナー企業でアカウント希望の方は、その他のお問合せからお問合せください。</p>

  <div class="contact-select-grid">

    <!-- カード1：パートナー専用サイト -->
    <div class="contact-card">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/contact/contacticon_1.svg" alt="アイコン1" class="icon">
      <h3>パートナー専用サイト</h3>
      <div class="card-desc">
        最新販促物やFAQなどをご確認いただけます。
      </div>
      <div class="btn-group">
        <a href="https://relation.partnersuccess.app/auth/login" target="_blank" class="btn">ログインはこちら</a>
      </div>
    </div>

    <!-- カード2：資料希望 -->
    <div class="contact-card">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/contact/contacticon_2.svg" alt="アイコン2" class="icon">
      <h3>ご紹介資料をご希望の方</h3>
      <div class="card-desc">
        ・パートナーポータル未登録の方<br>
        ・販売店様
      </div>
      <div class="btn-group">
        <a href="/document-partner/" target="_blank" class="btn">資料請求はこちら</a>
      </div>
    </div>

    <!-- カード3：その他 -->
    <div class="contact-card">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/contact/contacticon_3.svg" alt="アイコン3" class="icon">
      <h3>その他のお問合せ</h3>
      <div class="card-desc">
        その他のお問い合わせはこちらからご連絡ください。
      </div>
      <div class="btn-group">
        <a href="/contact/" class="btn">お問合せはこちら</a>
      </div>
    </div>

  </div>
</section>