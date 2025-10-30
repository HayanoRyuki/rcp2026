<?php

/**
 * 「導入企業ロゴ」投稿タイプにメタボックスを追加（TOP表示／スライダー表示）
 */
function add_client_logo_meta_boxes() {
  add_meta_box(
    'client_logo_display_options',      // メタボックスID
    '表示設定',                         // メタボックスタイトル
    'render_client_logo_display_options', // 表示内容のコールバック
    'client_logo',                      // 投稿タイプ
    'side',                             // 表示位置
    'default'                           // 優先度
  );
}
add_action('add_meta_boxes', 'add_client_logo_meta_boxes');


/**
 * メタボックスの内容（チェックボックス2種）
 */
function render_client_logo_display_options($post) {
  // 現在の設定値を取得
  $show_on_top    = get_post_meta($post->ID, '_show_on_top', true);
  $show_in_slider = get_post_meta($post->ID, '_show_in_slider', true);

  // セキュリティ用ノンス
  wp_nonce_field('client_logo_display_options_nonce_action', 'client_logo_display_options_nonce');

  ?>
  <p>
    <label>
      <input type="checkbox" name="show_on_top" value="1" <?php checked($show_on_top, '1'); ?>>
      TOPに表示
    </label>
  </p>
  <p>
    <label>
      <input type="checkbox" name="show_in_slider" value="1" <?php checked($show_in_slider, '1'); ?>>
      スライダーに表示
    </label>
  </p>
  <?php
}


/**
 * メタボックスの保存処理
 */
function save_client_logo_display_options($post_id) {
  // 自動保存や権限チェック、nonceチェック
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
  if (!isset($_POST['client_logo_display_options_nonce']) || !wp_verify_nonce($_POST['client_logo_display_options_nonce'], 'client_logo_display_options_nonce_action')) return;
  if (!current_user_can('edit_post', $post_id)) return;

  // チェックボックス：TOP表示
  if (isset($_POST['show_on_top'])) {
    update_post_meta($post_id, '_show_on_top', '1');
  } else {
    delete_post_meta($post_id, '_show_on_top');
  }

  // チェックボックス：スライダー表示
  if (isset($_POST['show_in_slider'])) {
    update_post_meta($post_id, '_show_in_slider', '1');
  } else {
    delete_post_meta($post_id, '_show_in_slider');
  }
}
add_action('save_post', 'save_client_logo_display_options');
