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

  $request_uri = $_SERVER['REQUEST_URI'] ?? '';

  foreach ($redirects as $old => $new) {
    if (stripos($request_uri, $old) === 0) {
      wp_redirect($new, 301);
      exit;
    }
  }
});
