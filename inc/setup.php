<?php
/**
 * Theme setup and core utilities (RCP2026)
 */

// ===================================
// テーマサポート機能
// ===================================
function rcp2026_theme_setup() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('menus');
}
add_action('after_setup_theme', 'rcp2026_theme_setup');


// ===================================
// シンプルなパンくずリスト
// ===================================
if (!function_exists('rcp2026_get_breadcrumb')) {
  function rcp2026_get_breadcrumb() {
    if (!is_singular()) return '';

    $home = '<a href="' . esc_url(home_url()) . '">ホーム</a>';

    $post_type = get_post_type_object(get_post_type());
    $archive_link = get_post_type_archive_link(get_post_type());

    // 投稿タイプにアーカイブが存在しない場合のフォールバック
    if ($archive_link) {
      $archive = '<a href="' . esc_url($archive_link) . '">' . esc_html($post_type->labels->name) . '</a>';
      $trail = $home . ' &gt; ' . $archive;
    } else {
      $trail = $home;
    }

    $current = '<span>' . esc_html(get_the_title()) . '</span>';
    return '<nav class="breadcrumb">' . $trail . ' &gt; ' . $current . '</nav>';
  }
}


// ===================================
// 内部リンクカードショートコード [linkcard id="123"]
// ===================================
function rcp2026_internal_link_card($atts) {
  $atts = shortcode_atts(['id' => ''], $atts);
  $post_id = intval($atts['id']);
  if (!$post_id || get_post_status($post_id) !== 'publish') return '';

  $title = get_the_title($post_id);
  $permalink = get_permalink($post_id);
  $thumb = get_the_post_thumbnail($post_id, 'medium', ['class' => 'link-card-thumb']);
  $excerpt = get_the_excerpt($post_id);
  if (empty($excerpt)) $excerpt = wp_trim_words(strip_tags(get_post_field('post_content', $post_id)), 20);

  ob_start(); ?>
  <div class="internal-link-card">
    <a href="<?php echo esc_url($permalink); ?>" class="link-card-inner">
      <?php if ($thumb): ?>
        <div class="link-card-image"><?php echo $thumb; ?></div>
      <?php endif; ?>
      <div class="link-card-content">
        <h4 class="link-card-title"><?php echo esc_html($title); ?></h4>
        <?php if ($excerpt): ?>
          <p class="link-card-excerpt"><?php echo esc_html($excerpt); ?></p>
        <?php endif; ?>
      </div>
    </a>
  </div>
  <?php
  return ob_get_clean();
}
add_shortcode('linkcard', 'rcp2026_internal_link_card');


// ===================================
// メディアアップローダーを管理画面で有効化
// ===================================
add_action('admin_enqueue_scripts', function() {
  wp_enqueue_media();
});


// ===================================
// フロントページ専用 <title> の上書き
// ===================================
add_filter('pre_get_document_title', function($title) {
  if (is_front_page()) {
    return '受付システム「RECEPTIONIST」 - 導入法人数・売上シェアNo.1 -';
  }
  return $title;
});
