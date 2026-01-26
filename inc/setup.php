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


// ===================================
// Canonical URL 出力（UTMパラメータ除外）
// ===================================
function rcp2026_output_canonical() {
  // 管理画面・フィード・検索結果・404では出力しない
  if (is_admin() || is_feed() || is_search() || is_404()) {
    return;
  }

  $canonical_url = '';

  // トップページ
  if (is_front_page() || is_home()) {
    $canonical_url = home_url('/');
  }
  // 個別投稿・固定ページ
  elseif (is_singular()) {
    $canonical_url = get_permalink();
  }
  // カスタム投稿タイプのアーカイブ
  elseif (is_post_type_archive()) {
    $canonical_url = get_post_type_archive_link(get_post_type());
  }
  // カテゴリー・タグ・タクソノミーアーカイブ
  elseif (is_category() || is_tag() || is_tax()) {
    $term = get_queried_object();
    $canonical_url = get_term_link($term);
  }
  // 著者アーカイブ
  elseif (is_author()) {
    $canonical_url = get_author_posts_url(get_queried_object_id());
  }
  // 日付アーカイブ
  elseif (is_date()) {
    if (is_year()) {
      $canonical_url = get_year_link(get_query_var('year'));
    } elseif (is_month()) {
      $canonical_url = get_month_link(get_query_var('year'), get_query_var('monthnum'));
    } elseif (is_day()) {
      $canonical_url = get_day_link(get_query_var('year'), get_query_var('monthnum'), get_query_var('day'));
    }
  }

  // ページネーション：1ページ目を正規URLとする
  if (is_paged()) {
    // アーカイブの場合は1ページ目のURLを取得
    if (is_post_type_archive()) {
      $canonical_url = get_post_type_archive_link(get_post_type());
    } elseif (is_category() || is_tag() || is_tax()) {
      $term = get_queried_object();
      $canonical_url = get_term_link($term);
    }
  }

  // URLが取得できた場合のみ出力
  if ($canonical_url && !is_wp_error($canonical_url)) {
    // クエリパラメータを除去（UTM等）
    $canonical_url = strtok($canonical_url, '?');
    // 末尾スラッシュを統一
    $canonical_url = trailingslashit($canonical_url);

    echo '<link rel="canonical" href="' . esc_url($canonical_url) . '" />' . "\n";
  }
}
add_action('wp_head', 'rcp2026_output_canonical', 1);
