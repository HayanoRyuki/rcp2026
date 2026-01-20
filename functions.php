<?php
/**
 * Theme Name: RCP2026
 * Description: RECEPTIONIST 2026 WordPress Theme
 * Author: Media-Confidence Inc.
 */

/* -------------------------------------------------------------
 *  基本セットアップ（テーマ機能・ショートコード等）
 * ------------------------------------------------------------- */
require_once get_template_directory() . '/inc/setup.php';


/* -------------------------------------------------------------
 *  カスタム投稿タイプ登録・設定
 * ------------------------------------------------------------- */
$custom_post_types = [
  'post-types-register',
  'post-type-news',
  'post-type-case',
  'post-type-event',
  'post-type-resource',
  'post-type-logo',
  'post-type-partner',
];
foreach ($custom_post_types as $file) {
  $path = get_template_directory() . "/inc/{$file}.php";
  if (file_exists($path)) require_once $path;
}


/* -------------------------------------------------------------
 *  アセット（CSS / JS）管理
 * ------------------------------------------------------------- */
require_once get_template_directory() . '/inc/assets.php';


/* -------------------------------------------------------------
 *  フォーム送信関連
 * ------------------------------------------------------------- */
require_once get_template_directory() . '/inc/contact-handler.php';


/* -------------------------------------------------------------
 *  投稿アーカイブタイトルの変更（例：コラム）
 * ------------------------------------------------------------- */
add_filter('document_title_parts', function ($title) {
  if (is_home() || (is_archive() && is_post_type_archive('post'))) {
    $title['title'] = 'コラム';
  }
  return $title;
});


/* -------------------------------------------------------------
 *  旧URL → 新URL のリダイレクト
 * ------------------------------------------------------------- */
add_action('template_redirect', function () {

  $redirects = [
    '/document-price' => 'https://receptionist.jp/resources/price-book/',
    '/document-200'   => 'https://receptionist.jp/resources/document-general/',
    '/partnerlist'    => 'https://receptionist.jp/partner-list/',
    '/downloads'      => 'https://receptionist.jp/resources/',
    '/column'         => 'https://receptionist.jp/?post_type=post/',
    '/plan'           => 'https://receptionist.jp/resources/price-book/',
    '/news'           => 'https://receptionist.co.jp/news/release',
    '/company'        => 'https://receptionist.co.jp/about',
  ];

  // リクエストURI取得（クエリ除外）
  $request_uri = parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH);
  $request_uri = rtrim($request_uri, '/');

  foreach ($redirects as $old => $new) {
    if ($request_uri === $old || str_starts_with($request_uri, $old . '/')) {
      wp_redirect($new, 301);
      exit;
    }
  }
});


/* -------------------------------------------------------------
 * /cases → /case リダイレクト
 * ------------------------------------------------------------- */
add_action('template_redirect', function () {
    $request_uri = $_SERVER['REQUEST_URI'] ?? '';
    $request_uri = rtrim($request_uri, '/');

    if ($request_uri === '/cases' || str_starts_with($request_uri, '/cases/')) {
        $new_uri = preg_replace('#^/cases#', '/case', $request_uri);
        wp_redirect($new_uri . '/', 301);
        exit;
    }
});

// --------------------------------------------------
// 外部確認URLの閲覧制御
// --------------------------------------------------
add_action('template_redirect', function () {
  if (!is_singular('case')) return;

  global $post;
  if ($post->post_status === 'publish') return;

  $token   = $_GET['external_preview'] ?? '';
  $saved   = get_post_meta($post->ID, '_external_preview_token', true);
  $expires = intval(get_post_meta($post->ID, '_external_preview_expires', true));

  if ($token && $saved && hash_equals($saved, $token) && time() < $expires) {
    return; // 表示許可
  }

  wp_die('このページは確認期限が切れています。', '閲覧不可', ['response' => 403]);
});
