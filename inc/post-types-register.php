<?php

/**
 * カスタム投稿タイプとタクソノミーの登録（news, case, resource）
 */
function register_custom_post_types_and_taxonomies() {
  // ◆ NEWS投稿タイプとカテゴリ
  register_post_type('news', [
    'labels' => ['name' => 'ニュース', 'singular_name' => 'ニュース'],
    'public' => true,
    'has_archive' => true,
    'menu_position' => 6,
    'menu_icon' => 'dashicons-megaphone',
    'supports' => ['title', 'editor', 'thumbnail'],
    'rewrite' => ['slug' => 'news'],
    'show_in_rest' => true,
  ]);
  register_taxonomy('news_category', 'news', [
    'label' => 'ニュースカテゴリ',
    'hierarchical' => true,
    'show_ui' => true,
    'show_in_rest' => true,
    'rewrite' => ['slug' => 'news-category']
  ]);

  // ◆ 導入事例（CASE）投稿タイプとカテゴリ
  register_post_type('case', [
    'labels' => ['name' => '導入事例', 'singular_name' => '導入事例'],
    'public' => true,
    'has_archive' => true,
    'menu_position' => 7,
    'menu_icon' => 'dashicons-lightbulb',
    'supports' => ['title', 'editor', 'thumbnail'],
    'rewrite' => ['slug' => 'case'],
    'show_in_rest' => true,
  ]);
  register_taxonomy('case_category', 'case', [
    'label' => '導入事例カテゴリ',
    'hierarchical' => true,
    'show_ui' => true,
    'show_in_rest' => true,
    'rewrite' => ['slug' => 'case-category']
  ]);

  // ◆ 導入事例の絞り込み用タクソノミー
  register_taxonomy('employee_size', 'case', [
    'label' => '従業員規模',
    'hierarchical' => true,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'rewrite' => ['slug' => 'employee-size']
  ]);

  register_taxonomy('use_case', 'case', [
    'label' => '活用シーン',
    'hierarchical' => true,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'rewrite' => ['slug' => 'use-case']
  ]);

  register_taxonomy('case_challenge', 'case', [
    'label' => '課題',
    'hierarchical' => true,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'rewrite' => ['slug' => 'case-challenge']
  ]);

  // ◆ 資料（RESOURCE）投稿タイプとカテゴリ
  register_post_type('resource', [
    'labels' => ['name' => '資料', 'singular_name' => '資料'],
    'public' => true,
    'has_archive' => true,
    'menu_position' => 8,
    'menu_icon' => 'dashicons-media-document',
    'supports' => ['title', 'editor', 'thumbnail'],
    'rewrite' => ['slug' => 'resources'],
    'show_in_rest' => true,
    'taxonomies' => ['post_tag'], // タグも使用
  ]);
  register_taxonomy('resource_category', 'resource', [
    'label' => '資料カテゴリ',
    'hierarchical' => true,
    'show_ui' => true,
    'show_in_rest' => true,
    'rewrite' => ['slug' => 'resource-category']
  ]);
}
add_action('init', 'register_custom_post_types_and_taxonomies');


/**
 * イベント投稿タイプの登録
 */
function register_post_type_event() {
  register_post_type('event', [
    'labels' => [
      'name' => 'イベント情報',
      'singular_name' => 'イベント',
      'add_new' => '新規追加',
      'add_new_item' => '新規イベントを追加',
      'edit_item' => 'イベントを編集',
      'new_item' => '新しいイベント',
      'view_item' => 'イベントを見る',
      'search_items' => 'イベントを検索',
      'not_found' => 'イベントが見つかりませんでした',
      'not_found_in_trash' => 'ゴミ箱にイベントはありません',
    ],
    'public' => true,
    'has_archive' => true,
    'menu_position' => 5,
    'menu_icon' => 'dashicons-calendar-alt',
    'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'],
    'rewrite' => ['slug' => 'event'],
    'show_in_rest' => true,
  ]);
}
add_action('init', 'register_post_type_event');


/**
 * 導入企業ロゴ（client_logo）投稿タイプの登録
 */
function register_client_logo_cpt() {
  register_post_type('client_logo', [
    'labels' => [
      'name' => '導入企業ロゴ',
      'singular_name' => '導入企業ロゴ',
      'add_new_item' => '新しいロゴを追加',
      'edit_item' => 'ロゴを編集',
      'new_item' => '新しいロゴ',
      'view_item' => 'ロゴを見る',
      'search_items' => 'ロゴを検索',
      'not_found' => 'ロゴが見つかりませんでした',
      'not_found_in_trash' => 'ゴミ箱にロゴはありません',
    ],
    'public' => true,
    'menu_position' => 5,
    'menu_icon' => 'dashicons-format-image',
    'supports' => ['title', 'thumbnail'],
    'has_archive' => false,
    'rewrite' => false,
    'show_in_rest' => true,
  ]);
}
add_action('init', 'register_client_logo_cpt');


function rcp2025_register_post_types() {
  register_post_type('partner', [
    'labels' => [
      'name' => 'パートナー',
      'singular_name' => 'パートナー',
    ],
    'public' => true,
    'has_archive' => true, // ← true に戻す
    'rewrite' => ['slug' => 'partners', 'with_front' => false], // ← slug を変更
    'menu_position' => 5,
    'menu_icon' => 'dashicons-groups',
    'show_in_rest' => true,
    'supports' => ['title', 'editor', 'thumbnail', 'revisions'],
  ]);
}
add_action('init', 'rcp2025_register_post_types');
	
/**
 * 投稿（post）のアーカイブURLを /blog に変更
 */
function change_post_archive_slug() {
  add_rewrite_rule('^blog/?$', 'index.php?post_type=post', 'top');
}
add_action('init', 'change_post_archive_slug');

function change_post_archive_link($link, $post_type) {
  if ($post_type === 'post') {
    return home_url('/blog/');
  }
  return $link;
}
add_filter('post_type_archive_link', 'change_post_archive_link', 10, 2);

function custom_post_type_args($args, $post_type) {
  if ($post_type === 'post') {
    $args['has_archive'] = 'blog';
  }
  return $args;
}
add_filter('register_post_type_args', 'custom_post_type_args', 10, 2);


/**
 * アーカイブページの表示件数を12件に設定
 */
function change_archive_posts_per_page($query) {
  if (!is_admin() && $query->is_main_query() && $query->is_archive()) {
    $query->set('posts_per_page', 12);
  }
}
add_action('pre_get_posts', 'change_archive_posts_per_page');


/**
 * 固定ページ「/column」アクセス時に /blog へリダイレクト
 */
function redirect_column_to_archive() {
  if (is_page('column')) {
    wp_redirect(home_url('/?post_type=post'), 301);
    exit;
  }
}
add_action('template_redirect', 'redirect_column_to_archive');


/**
 * ピックアップ投稿のメタボックスを追加（投稿タイプ post）
 */
function add_pickup_meta_box() {
  add_meta_box('pickup_meta_box', 'ピックアップ記事に設定', 'pickup_meta_box_callback', 'post', 'side');
}
add_action('add_meta_boxes', 'add_pickup_meta_box');

/**
 * ピックアップメタボックスの表示内容
 */
function pickup_meta_box_callback($post) {
  $value = get_post_meta($post->ID, '_pickup', true);
  wp_nonce_field('save_pickup_meta', 'pickup_meta_nonce');
  echo '<label><input type="checkbox" name="pickup" value="1"' . checked($value, '1', false) . '> おすすめコラムに表示</label>';
}

/**
 * ピックアップ投稿メタの保存処理
 */
function save_pickup_meta($post_id) {
  if (!isset($_POST['pickup_meta_nonce']) || !wp_verify_nonce($_POST['pickup_meta_nonce'], 'save_pickup_meta')) return;
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
  if (isset($_POST['pickup'])) {
    update_post_meta($post_id, '_pickup', '1');
  } else {
    delete_post_meta($post_id, '_pickup');
  }
}
add_action('save_post', 'save_pickup_meta');
