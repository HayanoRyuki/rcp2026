<?php
// セクション専用CSSを読み込み
echo '<link rel="stylesheet" href="' . get_template_directory_uri() . '/assets/css/contact-select.css">';
?>

<section class="contact-select">
  <h1 class="page-title">お問い合わせ一覧</h1>

  <div class="contact-select-grid">

    <!-- カード1：使い方や料金 -->
    <div class="contact-card">
      <img
        src="<?php echo get_template_directory_uri(); ?>/assets/img/contact/contacticon_1.svg"
        alt="使い方アイコン"
        class="icon"
      >
      <h3>使い方や料金</h3>
      <p>RECEPTIONIST製品に関するお問い合わせ</p>
      <div class="btn-group">
        <a href="/contact-user/" class="btn">契約中の方</a>
        <a href="/contact-without-account/" class="btn">未契約の方</a>
      </div>
    </div>

    <!-- カード2：代理店販売・紹介 -->
    <div class="contact-card">
      <img
        src="<?php echo get_template_directory_uri(); ?>/assets/img/contact/contacticon_2.svg"
        alt="代理店アイコン"
        class="icon"
      >
      <h3>代理店販売・紹介</h3>
      <p>販売パートナーや紹介制度に関するお問い合わせ</p>
      <div class="btn-group">
        <a href="/contact-agency/" class="btn">お問い合わせ</a>
      </div>
    </div>

    <!-- カード3：弊社への提案 -->
    <div class="contact-card">
      <img
        src="<?php echo get_template_directory_uri(); ?>/assets/img/contact/contacticon_3.svg"
        alt="提案アイコン"
        class="icon"
      >
      <h3>弊社への提案</h3>
      <p>サービス連携・取材・業務提携などのご提案</p>
      <div class="btn-group">
        <a href="/contact-proposal/" class="btn">お問い合わせ</a>
      </div>
    </div>

  </div>
</section>
