<?php
/**
 * enqueue all theme assets (RCP2026)
 */
function rcp2026_enqueue_assets() {
  $theme_uri = get_template_directory_uri();
  $theme_dir = get_template_directory();

// ===================================
  // 共通CSS（全ページ読み込み）
  // ===================================
  $common_css = ['reset', 'common', 'footer'];
  foreach ($common_css as $file) {
    $path = "{$theme_dir}/assets/css/{$file}.css";
    if (file_exists($path)) {
      wp_enqueue_style(
        "rcp2026-{$file}",
        "{$theme_uri}/assets/css/{$file}.css",
        [],
        filemtime($path)
      );
    }
  }

  // ===================================
  // ヘッダーCSSの切り替え（ここを追加）
  // ===================================
  $partner_templates = [
    'page-partner.php',
    'page-partner-list.php',
    'page-partnercontactselect.php',
    'page-partner-contact-select.php',
  ];

  $use_partner_header = false;
  foreach ($partner_templates as $tpl) {
    if (is_page_template($tpl)) {
      $use_partner_header = true;
      break;
    }
  }

  // スラッグでも判定
  if (
    is_page('partner') ||
    is_page('partner-list') ||
    is_page('partnercontactselect') 
  ) {
    $use_partner_header = true;
  }

  // header-partner.css か header.css を出し分け
  $header_css = $use_partner_header ? 'header-partner' : 'header';
  $header_path = "{$theme_dir}/assets/css/{$header_css}.css";

  if (file_exists($header_path)) {
    wp_enqueue_style(
      'rcp2026-header',
      "{$theme_uri}/assets/css/{$header_css}.css",
      [],
      filemtime($header_path)
    );
  }
  
  // ===================================
  // 共通JS（全ページ読み込み）
  // ===================================
  wp_enqueue_script('jquery', includes_url('/js/jquery/jquery.js'), [], null, true);

  $common_js = ['main', 'footer'];
  foreach ($common_js as $file) {
    $path = "{$theme_dir}/assets/js/{$file}.js";
    if (file_exists($path)) {
      wp_enqueue_script(
        "rcp2026-{$file}",
        "{$theme_uri}/assets/js/{$file}.js",
        ['jquery'],
        filemtime($path),
        true
      );
    }
  }

  // ===================================
  // セクションCSS（sections ディレクトリ配下）
  // トップページでも他ページでも再利用される共通ブロック群
  // ===================================
  $sections = [
    'logo-slider', 'about', 'cost', 'logo-grid', 'reasons', 'solutions',
    'selectcase', 'cta', 'series', 'clientlogo', '4voice',
    'partner-flow', 'partner-list', 'partner-hero',
    'partner-merit', 'partner-program'
  ];

  foreach ($sections as $file) {
    $path = "{$theme_dir}/assets/css/sections/{$file}.css";
    if (file_exists($path)) {
      wp_enqueue_style(
        "rcp2026-section-{$file}",
        "{$theme_uri}/assets/css/sections/{$file}.css",
        [],
        filemtime($path)
      );
    }
  }

  // ===================================
  // アーカイブCSS（共通＋タイプ別）
  // ===================================
  $archive_common = "{$theme_dir}/assets/css/archive/archive.css";
  if (file_exists($archive_common) && (is_archive() || is_home())) {
    wp_enqueue_style(
      'rcp2026-archive-common',
      "{$theme_uri}/assets/css/archive/archive.css",
      [],
      filemtime($archive_common)
    );
  }

  $archives = ['case', 'event', 'news', 'resource', 'post', 'partner'];
  foreach ($archives as $type) {
    $path = "{$theme_dir}/assets/css/archive/{$type}.css";
    if (file_exists($path)) {
      if (is_post_type_archive($type) || ($type === 'post' && (is_home() || is_category() || is_tag()))) {
        wp_enqueue_style(
          "rcp2026-archive-{$type}",
          "{$theme_uri}/assets/css/archive/{$type}.css",
          ['rcp2026-archive-common'],
          filemtime($path)
        );
      }
    }
  }

  // ===================================
  // シングルCSS（共通＋タイプ別）
  // ===================================
  $single_common = "{$theme_dir}/assets/css/single/single.css";
  if (file_exists($single_common) && is_singular()) {
    wp_enqueue_style(
      'rcp2026-single-common',
      "{$theme_uri}/assets/css/single/single.css",
      [],
      filemtime($single_common)
    );
  }

  $singles = ['case', 'event', 'resource', 'news', 'post', 'partner'];
  foreach ($singles as $type) {
    $path = "{$theme_dir}/assets/css/single/{$type}.css";
    if (file_exists($path)) {

      $is_match = (
        ($type === 'post' && is_single()) ||
        is_singular($type)
      );

      if ($is_match) {
        wp_enqueue_style(
          "rcp2026-single-{$type}",
          "{$theme_uri}/assets/css/single/{$type}.css",
          ['rcp2026-single-common'],
          filemtime($path)
        );
      }
    }
  }

  // ===================================
  // 固定ページCSS（共通＋自動検出）
  // ===================================
  $page_common = "{$theme_dir}/assets/css/page/page.css";
  if (file_exists($page_common) && is_page()) {
    wp_enqueue_style(
      'rcp2026-page-common',
      "{$theme_uri}/assets/css/page/page.css",
      [],
      filemtime($page_common)
    );
  }

  $page_dir = "{$theme_dir}/assets/css/page/";
  foreach (glob($page_dir . 'page-*.css') as $path) {
    $basename = basename($path, '.css');
    $slug = str_replace('page-', '', $basename);
    if (is_page($slug) || is_page_template("{$basename}.php")) {
      wp_enqueue_style(
        "rcp2026-{$basename}",
        "{$theme_uri}/assets/css/page/{$basename}.css",
        ['rcp2026-page-common'],
        filemtime($path)
      );
    }
  }

  // ===================================
  // 固定ページ専用JS（自動検出）
  // ===================================
  $page_js_dir = "{$theme_dir}/assets/js/";
  foreach (glob($page_js_dir . 'page-*.js') as $path) {
    $basename = basename($path, '.js');
    $slug = str_replace('page-', '', $basename);
    if (is_page($slug) || is_page_template("{$basename}.php")) {
      wp_enqueue_script(
        "rcp2026-{$basename}",
        "{$theme_uri}/assets/js/{$basename}.js",
        ['jquery'],
        filemtime($path),
        true
      );
    }
  }

// ===================================
// パートナーページ群CSS（共通＋自動検出・安全版）
// ===================================
$partner_templates = [
  'page-partner.php',
  'page-partner-list.php',
  'page-partner-contact.php',
  'page-partner-contact-select.php',
  'page-document-partner.php',
  'page-partner-series.php',
];

// partnerページを判定（テンプレート or 固定ページスラッグ）
$is_partner_template = false;
foreach ($partner_templates as $tpl) {
  if (is_page_template($tpl)) { $is_partner_template = true; break; }
}
if (is_page('partner') || is_page('partner-list') || is_page('partner-contact') || is_page('partner-series')) {
  $is_partner_template = true;
}

if ($is_partner_template) {
  // 共通CSS
  $partner_common_path = "{$theme_dir}/assets/css/page/page-partner.css";
  $partner_common_handle = 'rcp2026-partner-common';
  $deps_for_child = [];

  if (file_exists($partner_common_path)) {
    wp_enqueue_style(
      $partner_common_handle,
      "{$theme_uri}/assets/css/page/page-partner.css",
      [],
      filemtime($partner_common_path)
    );
    $deps_for_child = [$partner_common_handle];
  }

  // 個別CSS（/assets/css/page/page-partner*.css）
  $partner_page_dir = "{$theme_dir}/assets/css/page/";
  if (is_dir($partner_page_dir)) {
    foreach (glob($partner_page_dir . 'page-partner*.css') as $path) {
      $basename = basename($path, '.css');
      if ($basename === 'page-partner') continue;
      wp_enqueue_style(
        "rcp2026-{$basename}",
        "{$theme_uri}/assets/css/page/{$basename}.css",
        $deps_for_child,
        filemtime($path)
      );
    }
  }

  // セクションCSS（/assets/css/partner/partner-*.css）
  $partner_section_dir = "{$theme_dir}/assets/css/partner/";
  if (is_dir($partner_section_dir)) {
    foreach (glob($partner_section_dir . 'partner-*.css') as $path) {
      $basename = basename($path, '.css');
      wp_enqueue_style(
        "rcp2026-{$basename}",
        "{$theme_uri}/assets/css/partner/{$basename}.css",
        $deps_for_child,
        filemtime($path)
      );
    }
  }
}

  // ===================================
  // 資料ダウンロード（resource投稿タイプ）専用
  // ===================================
  if (is_singular('resource')) {
    $resource_common = ['header-minimam.css', 'footer-minimam.css'];
    foreach ($resource_common as $file) {
      $path = "{$theme_dir}/assets/css/{$file}";
      if (file_exists($path)) {
        $handle = 'rcp2026-' . basename($file, '.css');
        wp_enqueue_style(
          $handle,
          "{$theme_uri}/assets/css/{$file}",
          [],
          filemtime($path)
        );
      }
    }

    $resource_js_dir = "{$theme_dir}/assets/js/";
    foreach (glob($resource_js_dir . 'resource-*.js') as $path) {
      $basename = basename($path, '.js');
      wp_enqueue_script(
        "rcp2026-{$basename}",
        "{$theme_uri}/assets/js/{$basename}.js",
        ['jquery'],
        filemtime($path),
        true
      );
    }
  }
}
add_action('wp_enqueue_scripts', 'rcp2026_enqueue_assets');

// ===================================
// Swiper (CDN固定)
// ===================================
function rcp2026_enqueue_swiper() {
  if (is_front_page() || is_page_template('page-partner-list.php')) {
    wp_enqueue_style('swiper', 'https://cdn.jsdelivr.net/npm/swiper@10.3.1/swiper-bundle.min.css', [], '10.3.1');
    wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@10.3.1/swiper-bundle.min.js', [], '10.3.1', true);
    $theme_dir = get_template_directory();
    $theme_uri = get_template_directory_uri();
    $swiper_custom = "{$theme_dir}/assets/js/logo-slider.js";
    if (file_exists($swiper_custom)) {
      wp_enqueue_script(
        'rcp2026-logo-slider',
        "{$theme_uri}/assets/js/logo-slider.js",
        ['swiper'],
        filemtime($swiper_custom),
        true
      );
    }
  }
}
add_action('wp_enqueue_scripts', 'rcp2026_enqueue_swiper', 15);

// ===================================
// Heroセクション（画面幅別CSS）
// ===================================
function rcp2026_enqueue_hero_css() {
  $dir  = get_template_directory();
  $uri  = get_template_directory_uri();
  $hero_sizes = [
    'sm' => 'screen and (max-width: 767px)',
    'md' => 'screen and (min-width: 768px) and (max-width: 1023px)',
    'lg' => 'screen and (min-width: 1024px) and (max-width: 1279px)',
    'xl' => 'screen and (min-width: 1280px)',
  ];

  foreach ($hero_sizes as $key => $media) {
    $file = "hero-{$key}.css";
    $path = "{$dir}/assets/css/hero/{$file}";
    if (file_exists($path)) {
      wp_enqueue_style(
        "rcp2026-hero-{$key}",
        "{$uri}/assets/css/hero/{$file}",
        [],
        filemtime($path),
        $media
      );
    }
  }
}
add_action('wp_enqueue_scripts', 'rcp2026_enqueue_hero_css', 20);
