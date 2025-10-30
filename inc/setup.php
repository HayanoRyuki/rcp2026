<?php

// テーマサポート機能を有効化
function rcp2025_theme_setup() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('menus');
}
add_action('after_setup_theme', 'rcp2025_theme_setup');


if (!function_exists('get_breadcrumb')) {
  function get_breadcrumb() {
    // シンプルなパンくず例：ホーム > 投稿タイプ名 > 投稿タイトル
    if (!is_singular()) return '';

    $home = '<a href="' . home_url() . '">ホーム</a>';
    $post_type = get_post_type_object(get_post_type());
    $archive_link = get_post_type_archive_link(get_post_type());
    $archive = '<a href="' . esc_url($archive_link) . '">' . esc_html($post_type->labels->name) . '</a>';
    $current = '<span>' . get_the_title() . '</span>';

    return '<nav class="breadcrumb">' . $home . ' &gt; ' . $archive . ' &gt; ' . $current . '</nav>';
  }
}

// 内部リンクカードショートコード
function internal_link_card_shortcode($atts) {
  $atts = shortcode_atts([
    'id' => '',
  ], $atts);

  $post_id = intval($atts['id']);
  if (!$post_id || get_post_status($post_id) !== 'publish') return '';

  $title = get_the_title($post_id);
  $permalink = get_permalink($post_id);
  $thumb = get_the_post_thumbnail($post_id, 'medium', ['class' => 'link-card-thumb']);
  $excerpt = get_the_excerpt($post_id);

  ob_start();
  ?>
  <div class="internal-link-card">
    <a href="<?php echo esc_url($permalink); ?>" class="link-card-inner">
      <?php if ($thumb): ?>
        <div class="link-card-image"><?php echo $thumb; ?></div>
      <?php endif; ?>
      <div class="link-card-content">
        <h4 class="link-card-title"><?php echo esc_html($title); ?></h4>
        <p class="link-card-excerpt"><?php echo esc_html($excerpt); ?></p>
      </div>
    </a>
  </div>
  <?php
  return ob_get_clean();
}
add_shortcode('linkcard', 'internal_link_card_shortcode');



// メディアアップローダーを有効にする
add_action('admin_enqueue_scripts', function () {
    wp_enqueue_media();
});


// フロントページの<title>を上書き
add_filter('pre_get_document_title', function($title) {
  if (is_front_page()) {
    return '受付システム「RECEPTIONIST」 - 導入法人数・売上シェアNo.1 -';
  }
  return $title;
});
