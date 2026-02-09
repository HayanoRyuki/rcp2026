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
  'post-type-seminar',
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

  // 完全一致リダイレクト
  $redirects = [
    '/document-price' => 'https://receptionist.jp/resources/price-book/',
    '/document-200'   => 'https://receptionist.jp/resources/document-general/',
    '/partnerlist'    => 'https://receptionist.jp/partner-list/',
    '/downloads'      => 'https://receptionist.jp/resources/',
    '/column'         => 'https://receptionist.jp/blog/',
    '/plan'           => 'https://receptionist.jp/resources/price-book/',
    '/news'           => 'https://receptionist.co.jp/news/release',
    '/company'        => 'https://receptionist.co.jp/about',

    // 旧 .html ページ
    '/register.html'           => 'https://receptionist.jp/new-register/',
    '/contact.html'            => 'https://receptionist.jp/contact/',
    '/contact-select.html'     => 'https://receptionist.jp/contact-select/',
    '/contact-agency.html'     => 'https://receptionist.jp/contact-agency/',
    '/function.html'           => 'https://receptionist.jp/function/',
    '/price.html'              => 'https://receptionist.jp/resources/price-book/',
    '/company.html'            => 'https://receptionist.co.jp/about',
    '/faq.html'                => 'https://receptionist.jp/',
    '/chatwork.html'           => 'https://receptionist.jp/',
    '/slack.html'              => 'https://receptionist.jp/',
    '/office.html'             => 'https://receptionist.jp/',
    '/office-workers.html'     => 'https://receptionist.jp/',
    '/simulator.html'          => 'https://receptionist.jp/',
    '/trademark.html'          => 'https://receptionist.jp/',
    '/for-space.html'          => 'https://receptionist.jp/',
    '/scheduling-appointment.html' => 'https://receptionist.jp/',
    '/document-apo.html'       => 'https://receptionist.jp/resources/',
    '/document-request.html'   => 'https://receptionist.jp/resources/',
    '/2nd-anniversary.html'    => 'https://receptionist.jp/',

    // 旧ページ（拡張子なし）
    '/about'                   => 'https://receptionist.co.jp/about',
    '/office-case'             => 'https://receptionist.jp/case/',
    '/for-space'               => 'https://receptionist.jp/',
    '/chatwork'                => 'https://receptionist.jp/',
    '/functions'               => 'https://receptionist.jp/function/',
    '/privacy'                 => 'https://receptionist.jp/',
    '/scheduling-appointment'  => 'https://receptionist.jp/',
    '/adjust-apo'              => 'https://receptionist.jp/',
    '/career'                  => 'https://receptionist.co.jp/',
    '/store'                   => 'https://receptionist.jp/case/',
    '/smb'                     => 'https://receptionist.jp/',
    '/microsoft365'            => 'https://receptionist.jp/',
    '/factory-special'         => 'https://receptionist.jp/',

    // 削除したページ
    '/document-function'       => 'https://receptionist.jp/resources/',
    '/security_reception'      => 'https://receptionist.jp/',
    '/office-case'             => 'https://receptionist.jp/case/',
    '/standby-screen'          => 'https://receptionist.jp/',
    '/receptionist-keyboard'   => 'https://receptionist.jp/',
    '/custombutton'            => 'https://receptionist.jp/',
    '/receptionist_custom'     => 'https://receptionist.jp/',

    // サンクスページ（削除済み）
    '/receptionist_rooms_dx_thanks'              => 'https://receptionist.jp/',
    '/apo_garoon_thanks'                         => 'https://receptionist.jp/',
    '/document-function-thanks'                  => 'https://receptionist.jp/',
    '/meetingroom-operational-efficiency-thanks' => 'https://receptionist.jp/',
    '/document-partner-thanks'                   => 'https://receptionist.jp/',
    '/document-200-thanks'                       => 'https://receptionist.jp/',

    // カテゴリ・タグ関連
    '/category/blog'           => 'https://receptionist.jp/blog/',
    '/category/column'         => 'https://receptionist.jp/blog/',
    '/category/office-relocation' => 'https://receptionist.jp/blog/',

    // その他
    '/prices'                  => 'https://receptionist.jp/resources/price-book/',
    '/office-workers'          => 'https://receptionist.jp/',
    '/default.xsl'             => 'https://receptionist.jp/',

  ];

  // リクエストURI取得（クエリ除外）
  $request_uri = parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH);
  $request_uri = rtrim($request_uri, '/');

  // 完全一致チェック
  if (isset($redirects[$request_uri])) {
    wp_redirect($redirects[$request_uri], 301);
    exit;
  }
  if (isset($redirects[$request_uri . '/'])) {
    wp_redirect($redirects[$request_uri . '/'], 301);
    exit;
  }

  // 前方一致チェック（サブパス含む）
  foreach ($redirects as $old => $new) {
    if (str_starts_with($request_uri, $old . '/')) {
      wp_redirect($new, 301);
      exit;
    }
  }
});


/* -------------------------------------------------------------
 *  /case-tag/ → /case/ リダイレクト（タクソノミー削除対応）
 * ------------------------------------------------------------- */
add_action('template_redirect', function () {
  $request_uri = parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH);

  if (str_starts_with($request_uri, '/case-tag/')) {
    wp_redirect('https://receptionist.jp/case/', 301);
    exit;
  }
});


/* -------------------------------------------------------------
 *  /topics/ → /case/ リダイレクト
 * ------------------------------------------------------------- */
add_action('template_redirect', function () {
  $request_uri = parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH);

  if (str_starts_with($request_uri, '/topics/')) {
    wp_redirect('https://receptionist.jp/case/', 301);
    exit;
  }
});


/* -------------------------------------------------------------
 *  /tag/ → /blog/ リダイレクト（削除されたタグ）
 * ------------------------------------------------------------- */
add_action('template_redirect', function () {
  $request_uri = parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH);

  if (str_starts_with($request_uri, '/tag/')) {
    wp_redirect('https://receptionist.jp/blog/', 301);
    exit;
  }
});


/* -------------------------------------------------------------
 *  /partner-cat/ → /partner-list/ リダイレクト
 * ------------------------------------------------------------- */
add_action('template_redirect', function () {
  $request_uri = parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH);

  if (str_starts_with($request_uri, '/partner-cat/')) {
    wp_redirect('https://receptionist.jp/partner-list/', 301);
    exit;
  }
});


/* -------------------------------------------------------------
 *  /news-tag/ → トップへリダイレクト
 * ------------------------------------------------------------- */
add_action('template_redirect', function () {
  $request_uri = parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH);

  if (str_starts_with($request_uri, '/news-tag/')) {
    wp_redirect('https://receptionist.jp/', 301);
    exit;
  }
});


/* -------------------------------------------------------------
 *  /blog/page/N/ → /blog/ リダイレクト（ページネーション）
 * ------------------------------------------------------------- */
add_action('template_redirect', function () {
  $request_uri = parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH);

  if (preg_match('#^/blog/page/\d+/?$#', $request_uri)) {
    wp_redirect('https://receptionist.jp/blog/', 301);
    exit;
  }
});


/* -------------------------------------------------------------
 *  register.html?utm_... → /new-register/ リダイレクト
 * ------------------------------------------------------------- */
add_action('template_redirect', function () {
  $request_uri = parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH);

  if ($request_uri === '/register.html' || $request_uri === '/register') {
    wp_redirect('https://receptionist.jp/new-register/', 301);
    exit;
  }
});


/* -------------------------------------------------------------
 *  /system/ → /function/ リダイレクト（リダイレクトエラー対応）
 * ------------------------------------------------------------- */
add_action('template_redirect', function () {
  $request_uri = parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH);

  if (str_starts_with($request_uri, '/system/')) {
    wp_redirect('https://receptionist.jp/function/', 301);
    exit;
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
