<?php

function add_case_top_checkbox() {
  add_meta_box(
    'case_top_display',
    'TOP表示設定',
    'render_case_top_checkbox',
    'case', // カスタム投稿タイプが 'case' の場合
    'side',
    'high'
  );
}
add_action('add_meta_boxes', 'add_case_top_checkbox');

function render_case_top_checkbox($post) {
  $value = get_post_meta($post->ID, '_show_on_top', true);
  wp_nonce_field('save_case_top_checkbox', 'case_top_checkbox_nonce');
  ?>
  <label>
    <input type="checkbox" name="show_on_top" value="1" <?php checked($value, '1'); ?> />
    TOPに表示する
  </label>
  <?php
}

function save_case_top_checkbox($post_id) {
  if (!isset($_POST['case_top_checkbox_nonce']) || !wp_verify_nonce($_POST['case_top_checkbox_nonce'], 'save_case_top_checkbox')) {
    return;
  }
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
  if (isset($_POST['show_on_top'])) {
    update_post_meta($post_id, '_show_on_top', '1');
  } else {
    delete_post_meta($post_id, '_show_on_top');
  }
}
add_action('save_post', 'save_case_top_checkbox');


// 導入事例投稿タイプ（case）にカスタムメタボックス追加
function render_case_meta_box($post) {
    $logo_image_id = get_post_meta($post->ID, '_case_logo_image_id', true);
    $company_name = get_post_meta($post->ID, '_case_company_name', true);
    $industry = get_post_meta($post->ID, '_case_industry', true);
    $employee_size = get_post_meta($post->ID, '_case_employee_size', true);
    $summary = get_post_meta($post->ID, '_case_summary', true);
    $summary_lines = $summary ? explode("\n", $summary) : [''];

    $image_url = $logo_image_id ? wp_get_attachment_image_url($logo_image_id, 'medium') : '';

    wp_nonce_field('save_case_meta_fields', 'case_meta_nonce');
    ?>
    <style>
      .image-preview { margin-bottom: 1em; }
      #summary-fields input { margin-bottom: 5px; display: block; width: 100%; }
    </style>

    <!-- ロゴ画像 -->
    <p>
        <label for="case_logo_image">ロゴ画像：</label><br>
        <div class="image-preview">
            <?php if ($image_url): ?>
                <img src="<?php echo esc_url($image_url); ?>" style="max-width: 150px;">
            <?php endif; ?>
        </div>
        <input type="hidden" name="case_logo_image_id" id="case_logo_image_id" value="<?php echo esc_attr($logo_image_id); ?>">
        <button type="button" class="button" id="upload_logo_button">画像を選択</button>
        <button type="button" class="button" id="remove_logo_button">画像を削除</button>
    </p>

    <!-- テキスト情報 -->
    <p><label for="case_company_name">企業名：</label><br>
        <input type="text" name="case_company_name" value="<?php echo esc_attr($company_name); ?>" style="width:100%;">
    </p>
    <p><label for="case_industry">業種：</label><br>
        <input type="text" name="case_industry" value="<?php echo esc_attr($industry); ?>" style="width:100%;">
    </p>
    <p><label for="case_employee_size">従業員数：</label><br>
        <input type="text" name="case_employee_size" value="<?php echo esc_attr($employee_size); ?>" style="width:100%;">
    </p>

    <!-- 要約（複数行追加可能） -->
    <p><label>この記事の要約：</label></p>
    <div id="summary-fields">
        <?php foreach ($summary_lines as $line) : ?>
            <input type="text" name="case_summary_lines[]" value="<?php echo esc_attr($line); ?>">
        <?php endforeach; ?>
    </div>
    <p>
        <button type="button" class="button" id="add-summary-line">＋ 行を追加</button>
    </p>

    <script>
    jQuery(document).ready(function($){
        // メディアアップローダー
        let frame;
        $('#upload_logo_button').on('click', function(e){
            e.preventDefault();
            if (frame) {
                frame.open();
                return;
            }
            frame = wp.media({
                title: 'ロゴ画像を選択',
                button: { text: 'この画像を使う' },
                multiple: false
            });
            frame.on('select', function(){
                const attachment = frame.state().get('selection').first().toJSON();
                $('#case_logo_image_id').val(attachment.id);
                $('.image-preview').html('<img src="' + attachment.url + '" style="max-width: 150px;">');
            });
            frame.open();
        });

        $('#remove_logo_button').on('click', function(){
            $('#case_logo_image_id').val('');
            $('.image-preview').html('');
        });

        // 要約行を追加
        $('#add-summary-line').on('click', function(){
            $('#summary-fields').append('<input type="text" name="case_summary_lines[]" value="">');
        });
    });
    </script>
    <?php
}

// メタデータ保存
function save_case_meta_fields($post_id) {
    if (!isset($_POST['case_meta_nonce']) || !wp_verify_nonce($_POST['case_meta_nonce'], 'save_case_meta_fields')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    update_post_meta($post_id, '_case_logo_image_id', intval($_POST['case_logo_image_id']));
    update_post_meta($post_id, '_case_company_name', sanitize_text_field($_POST['case_company_name']));
    update_post_meta($post_id, '_case_industry', sanitize_text_field($_POST['case_industry']));
    update_post_meta($post_id, '_case_employee_size', sanitize_text_field($_POST['case_employee_size']));

    $summary_lines = isset($_POST['case_summary_lines']) ? array_map('sanitize_text_field', $_POST['case_summary_lines']) : [];
    $summary_combined = implode("\n", array_filter($summary_lines));
    update_post_meta($post_id, '_case_summary', $summary_combined);
}
add_action('save_post', 'save_case_meta_fields');

// メタボックス登録
function add_case_meta_box() {
    add_meta_box(
        'case_meta_box',
        '導入企業情報・要約',
        'render_case_meta_box',
        'case',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'add_case_meta_box');

// 「case」投稿タイプ一覧にアイキャッチ画像カラムを追加
function add_thumbnail_column_to_case($columns) {
  $columns['thumbnail'] = 'アイキャッチ';
  return $columns;
}
add_filter('manage_case_posts_columns', 'add_thumbnail_column_to_case');

// 「case」投稿タイプ一覧にアイキャッチ画像を表示
function show_thumbnail_column_in_case($column_name, $post_id) {
  if ($column_name === 'thumbnail') {
    $thumbnail = get_the_post_thumbnail($post_id, [60, 60]); // サイズ調整可
    echo $thumbnail ?: '—';
  }
}
add_action('manage_case_posts_custom_column', 'show_thumbnail_column_in_case', 10, 2);


// 導入事例（case）用のカスタムタクソノミー登録
function register_case_taxonomies() {
  // タクソノミー1：従業員規模
  register_taxonomy(
    'employee_size',
    'case',
    array(
      'labels' => array(
        'name' => '従業員規模',
        'singular_name' => '従業員規模',
        'search_items' => '従業員規模で検索',
        'all_items' => 'すべての従業員規模',
        'edit_item' => '従業員規模を編集',
        'update_item' => '従業員規模を更新',
        'add_new_item' => '新しい従業員規模を追加',
        'new_item_name' => '新しい従業員規模名',
        'menu_name' => '従業員規模'
      ),
      'public' => true,
      'hierarchical' => false,
      'show_ui' => true,
      'show_admin_column' => true,
      'rewrite' => array('slug' => 'employee_size'),
    )
  );

  // タクソノミー2：活用シーン
  register_taxonomy(
    'use_case',
    'case',
    array(
      'labels' => array(
        'name' => '活用シーン',
        'singular_name' => '活用シーン',
        'search_items' => '活用シーンで検索',
        'all_items' => 'すべての活用シーン',
        'edit_item' => '活用シーンを編集',
        'update_item' => '活用シーンを更新',
        'add_new_item' => '新しい活用シーンを追加',
        'new_item_name' => '新しい活用シーン名',
        'menu_name' => '活用シーン'
      ),
      'public' => true,
      'hierarchical' => false,
      'show_ui' => true,
      'show_admin_column' => true,
      'rewrite' => array('slug' => 'use_case'),
    )
  );

  // タクソノミー3：課題
  register_taxonomy(
    'case_challenge',
    'case',
    array(
      'labels' => array(
        'name' => '課題',
        'singular_name' => '課題',
        'search_items' => '課題で検索',
        'all_items' => 'すべての課題',
        'edit_item' => '課題を編集',
        'update_item' => '課題を更新',
        'add_new_item' => '新しい課題を追加',
        'new_item_name' => '新しい課題名',
        'menu_name' => '課題'
      ),
      'public' => true,
      'hierarchical' => false,
      'show_ui' => true,
      'show_admin_column' => true,
      'rewrite' => array('slug' => 'case_challenge'),
    )
  );
}
add_action('init', 'register_case_taxonomies');

// --------------------------------------------------
// case記事内：画像2枚並びショートコード
// 使用例：
// [case_two_image img1="URL1" img2="URL2" alt1="説明1" alt2="説明2"]
// --------------------------------------------------
function rcp_case_two_image_shortcode($atts) {
  $atts = shortcode_atts([
    'img1' => '',
    'img2' => '',
    'alt1' => '',
    'alt2' => '',
  ], $atts);

  if (!$atts['img1'] || !$atts['img2']) {
    return '';
  }

  ob_start();
  ?>
  <div class="rcp-case-image-two">
    <figure class="rcp-case-image-item">
      <img src="<?php echo esc_url($atts['img1']); ?>" alt="<?php echo esc_attr($atts['alt1']); ?>">
    </figure>
    <figure class="rcp-case-image-item">
      <img src="<?php echo esc_url($atts['img2']); ?>" alt="<?php echo esc_attr($atts['alt2']); ?>">
    </figure>
  </div>
  <?php
  return ob_get_clean();
}
add_shortcode('case_two_image', 'rcp_case_two_image_shortcode');
