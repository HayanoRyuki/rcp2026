<?php
/**
 * Theme Name: RCP2026
 * Description: RECEPTIONIST 2026 WordPress Theme
 * Author: Media Confidence Inc.
 */

/* -------------------------------------------------------------
 *  CSS / JS 読み込み
 * ------------------------------------------------------------- */
add_action('wp_enqueue_scripts', function () {
  $theme_uri = get_template_directory_uri();
  $theme_dir = get_template_directory();

  // ===== CSS =====
  wp_enqueue_style(
    'base-css',
    $theme_uri . '/assets/css/common.css',
    [],
    filemtime($theme_dir . '/assets/css/common.css')
  );

  // （必要時に有効化）
  // wp_enqueue_style(
  //   'swiper-css',
  //   $theme_uri . '/assets/css/swiper-bundle.min.css',
  //   ['base-css'],
  //   '8.4.4'
  // );

  // ===== JS =====
  // wp_enqueue_script(
  //   'swiper-js',
  //   $theme_uri . '/assets/js/lib/swiper-bundle.min.js',
  //   [],
  //   '8.4.4',
  //   true
  // );

  wp_enqueue_script(
    'base-script',
    $theme_uri . '/assets/js/lib/script.min.js',
    [], // swiper 依存を外す
    filemtime($theme_dir . '/assets/js/lib/script.min.js'),
    true
  );

  wp_enqueue_script(
    'main-js',
    $theme_uri . '/assets/js/main.js',
    ['base-script'],
    filemtime($theme_dir . '/assets/js/main.js'),
    true
  );
});

// ========== RCP main（contactUtilなど jQuery依存のJS） ==========
add_action('wp_enqueue_scripts', function () {
  $theme_dir = get_template_directory();
  $theme_uri = get_template_directory_uri();

  wp_enqueue_script(
    'rcp-main',
    $theme_uri . '/assets/js/lib/rcp-main.js',
    ['jquery'],
    filemtime($theme_dir . '/assets/js/lib/rcp-main.js'),
    true
  );
});


/* -------------------------------------------------------------
 *  inc ファイル群の読み込み
 * ------------------------------------------------------------- */
// 基本セットアップ
require_once get_template_directory() . '/inc/setup.php';

// 投稿タイプ登録・設定
require_once get_template_directory() . '/inc/post-types-register.php';
require_once get_template_directory() . '/inc/post-type-news.php';
require_once get_template_directory() . '/inc/post-type-case.php';
require_once get_template_directory() . '/inc/post-type-event.php';
require_once get_template_directory() . '/inc/post-type-resource.php';
require_once get_template_directory() . '/inc/post-type-logo.php';
require_once get_template_directory() . '/inc/post-type-partner.php';

// フォーム送信処理
require_once get_template_directory() . '/inc/contact-handler.php';

// アセット読み込み関連（追加のenqueueや最適化処理など）
require_once get_template_directory() . '/inc/assets.php';


/* -------------------------------------------------------------
 *  投稿アーカイブタイトルの変更
 * ------------------------------------------------------------- */
add_filter('document_title_parts', function ($title) {
  if (is_home() || (is_archive() && is_post_type_archive('post'))) {
    $title['title'] = 'コラム'; // タブに表示するタイトル
  }
  return $title;
});


/* -------------------------------------------------------------
 *  旧URL → 新URL のリダイレクト（WordPress内のみ）
 * ------------------------------------------------------------- */
add_action('template_redirect', function () {
  $redirects = [
    '/document-price/' => 'https://receptionist.jp/resources/price-book/',
    '/document-200/'   => 'https://receptionist.jp/resources/document-general/',
    '/partnerlist/'    => 'https://receptionist.jp/partner-list/',
    '/downloads/'      => 'https://receptionist.jp/resources/',
    '/column/'         => 'https://receptionist.jp/?post_type=post/',
  ];

  $request_uri = $_SERVER['REQUEST_URI'];

  foreach ($redirects as $old => $new) {
    if (stripos($request_uri, $old) === 0) {
      wp_redirect($new, 301);
      exit;
    }
  }
});
