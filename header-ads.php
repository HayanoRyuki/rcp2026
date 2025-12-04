<?php
/**
 * Ads専用ヘッダー
 */
?>

<header class="site-header">
  <div class="container flex items-center justify-between py-4 px-6">

    <!-- ロゴ -->
    <a href="<?php echo home_url(); ?>" class="logo">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo/img-logo-reception.webp" alt="RECEPTIONISTロゴ">
    </a>

    <!-- ハンバーガーメニュー（SP） -->
    <button class="menu-toggle md:hidden" aria-label="メニューを開く">
      <span class="bar"></span>
      <span class="bar"></span>
      <span class="bar"></span>
    </button>

    <!-- ナビ -->
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

    <!-- CTA -->
    <a href="/resources/document-general/" class="cta-button">資料をもらう</a>

  </div>
</header>
