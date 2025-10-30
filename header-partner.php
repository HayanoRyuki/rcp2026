<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Google Tag Manager -->
  <script>
    (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-W6K2TFC');
  </script>
  <!-- End Google Tag Manager -->

  <?php wp_head(); ?>
</head>

<body <?php body_class('partner-page'); ?>>

  <!-- Google Tag Manager (noscript) -->
  <noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W6K2TFC"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
  </noscript>
  <!-- End Google Tag Manager (noscript) -->

  <header class="partner-header">
    <div class="partner-header-inner">

      <!-- ロゴ -->
      <a href="<?php echo home_url(); ?>" class="partner-logo">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo/img-logo-reception.webp" alt="RECEPTIONIST ロゴ">
      </a>

      <!-- ハンバーガーメニュー（SP用） -->
      <button class="partner-menu-toggle" aria-label="メニューを開く">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
      </button>

<!-- ナビゲーション -->
      <nav class="main-nav">
        <ul class="main-nav-list">
          <li><a href="/function">機能</a></li>
          <li><a href="/case">導入事例</a></li>
          <li><a href="/resources/price-book">料金表</a></li>
          <li><a href="/resources">資料一覧</a></li>
          <li><a href="/event">イベント情報</a></li>
          <li><a href="/?post_type=post">コラム</a></li>
<li class="has-submenu">
  <a href="/partner" target="_blank" rel="noopener">パートナーについて</a>
  <ul class="submenu">
    <li><a href="/partner">パートナーについて</a></li>
    <li><a href="/partner-list">パートナー企業一覧</a></li>
    <li><a href="/partner-contact">パートナーお問い合わせ</a></li>
  </ul>
</li>
        </ul>
      </nav>

      <!-- CTAボタン -->
      <div class="partner-cta">
        <a href="/partner/contact/" class="btn-cta">問い合わせする</a>
      </div>

    </div>
  </header>
