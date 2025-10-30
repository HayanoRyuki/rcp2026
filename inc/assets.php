<?php

function rcp2025_enqueue_assets() {
  $theme_uri = get_template_directory_uri();
  $theme_dir = get_template_directory();

  // 共通CSS
  $common_css = ['common', 'header', 'footer'];
  foreach ($common_css as $file) {
    wp_enqueue_style("rcp2025-{$file}", "{$theme_uri}/assets/css/{$file}.css", [], '1.0');
  }

  // jQuery（フッターで読み込む）
  wp_enqueue_script('jquery', includes_url('/js/jquery/jquery.js'), [], null, true);

  // 共通JS
  wp_enqueue_script('header-js', "{$theme_uri}/assets/js/header.js", ['jquery'], null, true);
  wp_enqueue_script('rcp2025-footer-js', "{$theme_uri}/assets/js/footer.js", ['jquery'], '1.0', true);
  wp_enqueue_script('rcp2025-main-js', "{$theme_uri}/assets/js/main.js", ['jquery'], '1.0', true);

  // style.css
  wp_enqueue_style('rcp2025-style', get_stylesheet_uri(), [], '1.0');

  // セクションCSS
  $sections = [
    'logo-slider', 'about', 'cost', 'logo-grid', 'reasons',
    'solutions', 'selectcase', 'cta', 'series', 'clientlogo',
    '4voice', 'partner-flow', 'partner-list', 'partner-hero',
    'partner-merit', 'partner-program'
  ];
  foreach ($sections as $section) {
    wp_enqueue_style("rcp2025-{$section}", "{$theme_uri}/assets/css/{$section}.css", [], '1.0');
  }

  // Swiper
  wp_enqueue_style('swiper', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css', [], null);
  wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js', [], null, true);
  wp_enqueue_script('logo-slider', "{$theme_uri}/assets/js/logo-slider.js", ['swiper'], '1.0', true);

  // アーカイブCSS
  $archives = ['case', 'event', 'news', 'resource', 'post'];
  foreach ($archives as $type) {
    $path = "/assets/css/archive-{$type}.css";
    if (file_exists($theme_dir . $path)) {
      wp_enqueue_style(
        "rcp2025-archive-{$type}",
        "{$theme_uri}{$path}",
        [],
        filemtime($theme_dir . $path)
      );
    }
  }

  // 固定ページ
  if (is_page()) {
    wp_enqueue_style('rcp2025-page', "{$theme_uri}/assets/css/page.css", [], '1.0');
  }

  // 料金ページテンプレート
  if (is_page_template('template-plan.php')) {
    wp_enqueue_style('page-price', "{$theme_uri}/assets/css/page-plan.css", [], '1.0');
  }

  // 広告LPテンプレート
  if (is_page_template('template-ads.php')) {
    foreach (['header-ads', 'footer-ads'] as $file) {
      $path = "/assets/css/{$file}.css";
      wp_enqueue_style("{$file}-style", "{$theme_uri}{$path}", [], filemtime("{$theme_dir}{$path}"));
    }
  }

  // Thanksページ
  if (is_page_template('page-thanks.php')) {
    $path = "/assets/css/page-thanks.css";
    wp_enqueue_style('rcp2025-page-thanks', "{$theme_uri}{$path}", [], filemtime("{$theme_dir}{$path}"));
  }

  // お問い合わせページ
  if (is_page('contact-without-account')) {
    wp_enqueue_style('rcp2025-contact', "{$theme_uri}/assets/css/contact.css", [], filemtime("{$theme_dir}/assets/css/contact.css"));
  }

  // パートナー問い合わせ
  if (is_page('contact-agency')) {
    wp_enqueue_style('rcp2025-contact-agency', "{$theme_uri}/assets/css/contact-agency.css", [], filemtime("{$theme_dir}/assets/css/contact-agency.css"));
  }

  if (is_page('contact-proposal')) {
    wp_enqueue_style('rcp2025-contact-proposal', "{$theme_uri}/assets/css/contact-proposal.css", [], filemtime("{$theme_dir}/assets/css/contact-proposal.css"));
  }

  // パートナー資料請求
  if (is_page_template('page-document-partner.php')) {
    $path = "/assets/css/contact-document-partner.css";
    wp_enqueue_style('rcp2025-contact-document-partner', "{$theme_uri}{$path}", [], filemtime("{$theme_dir}{$path}"));
  }

  // パートナーページ群
  if (
    is_page_template('page-partner.php') ||
    is_page_template('page-partner-list.php') ||
    is_page_template('page-partner-contact-select.php') ||
    is_page_template('page-document-partner.php')
  ) {
    $partner_css = ['page-partner', 'header-partner'];

    if (is_page_template('page-partner.php')) {
      $partner_css = array_merge($partner_css, ['partner-hero','series','partner-program','partner-merit','partner-flow','contact-select']);
    }

    if (is_page_template('page-partner-list.php')) {
      $partner_css = array_merge($partner_css, ['partner-about','partner-tabs']);
    }

    if (is_page_template('page-partner-contact-select.php')) {
      $partner_css = array_merge($partner_css, ['contact-select']);
    }

    foreach ($partner_css as $css) {
      wp_enqueue_style(
        "rcp2025-{$css}",
        "{$theme_uri}/assets/css/{$css}.css",
        [],
        filemtime("{$theme_dir}/assets/css/{$css}.css")
      );
    }
  }

  // ===============================
  // 無料トライアルページ専用JS
  // ===============================
  if (is_page_template('page-new-register.php')) {
    wp_enqueue_script(
      'rcp2025-register',
      "{$theme_uri}/assets/js/register.js",
      ['jquery'],
      filemtime("{$theme_dir}/assets/js/register.js"),
      true
    );
  }

  // ===============================
  // 新規登録ページ専用CSS
  // ===============================
  if (is_page_template('page-new-register.php')) {
    wp_enqueue_style(
      'rcp2025-new-register',
      "{$theme_uri}/assets/css/new-register.css",
      [],
      filemtime("{$theme_dir}/assets/css/new-register.css")
    );
  }

  // ===============================
  // 資料ダウンロードページ（resource）
  // ===============================
  if (is_singular('resource')) {
    wp_enqueue_style('rcp2025-header-minimam', "{$theme_uri}/assets/css/header-minimam.css", [], filemtime("{$theme_dir}/assets/css/header-minimam.css"));
    wp_enqueue_style('rcp2025-footer-minimam', "{$theme_uri}/assets/css/footer-minimam.css", [], filemtime("{$theme_dir}/assets/css/footer-minimam.css"));
    wp_enqueue_script('resource-form-guard', "{$theme_uri}/assets/js/resource-form-guard.js", [], filemtime("{$theme_dir}/assets/js/resource-form-guard.js"), true);
  }

  // カスタム投稿 single
  $singles = ['case', 'event', 'resource', 'news'];
  foreach ($singles as $type) {
    if (is_singular($type)) {
      wp_enqueue_style("rcp2025-single-{$type}", "{$theme_uri}/assets/css/single-{$type}.css", [], '1.0');
    }
  }

  // 通常投稿 single
  if (is_single() && get_post_type() === 'post') {
    wp_enqueue_style('rcp2025-single-post', "{$theme_uri}/assets/css/single-post.css", [], '1.0');
  }
}
add_action('wp_enqueue_scripts', 'rcp2025_enqueue_assets');


// ヒーローセクションCSS（画面幅別）
function enqueue_hero_css_by_screen_size() {
  $base = get_template_directory_uri() . '/assets/css/hero/';
  $hero_sizes = [
    'sm' => 'screen and (max-width: 767px)',
    'md' => 'screen and (min-width: 768px) and (max-width: 1023px)',
    'lg' => 'screen and (min-width: 1024px) and (max-width: 1279px)',
    'xl' => 'screen and (min-width: 1280px)',
  ];
  foreach ($hero_sizes as $key => $media) {
    wp_enqueue_style("rcp2025-hero-{$key}", "{$base}hero-{$key}.css", [], '1.0', $media);
  }
}
add_action('wp_enqueue_scripts', 'enqueue_hero_css_by_screen_size');
