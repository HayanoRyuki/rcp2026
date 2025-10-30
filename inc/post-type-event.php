<?php

/**
 * カスタムタクソノミー「イベント種別」の登録
 */
function register_event_taxonomies() {
  register_taxonomy('event_type', 'event', [
    'label' => 'イベント種別',
    'hierarchical' => true, // trueにするとカテゴリ形式（親子関係あり）
    'show_ui' => true,
    'show_in_rest' => true,
    'rewrite' => ['slug' => 'event-type'],
  ]);
}
add_action('init', 'register_event_taxonomies');


/**
 * イベント投稿にカスタムフィールド入力欄（開催日・場所・主催・プロダクト）を追加
 */
function add_event_custom_fields() {
  add_meta_box(
    'event_custom_fields',
    'イベント情報',
    'render_event_custom_fields',
    'event',
    'normal',
    'high'
  );
}
add_action('add_meta_boxes', 'add_event_custom_fields');

/**
 * カスタムフィールド入力欄のHTML出力
 */
function render_event_custom_fields($post) {
  $event_date      = get_post_meta($post->ID, 'event_date', true);
  $event_location  = get_post_meta($post->ID, 'event_location', true);
  $event_organizer = get_post_meta($post->ID, 'event_organizer', true);
  $event_product   = get_post_meta($post->ID, 'event_product', true);

  wp_nonce_field('save_event_custom_fields', 'event_custom_fields_nonce');
  ?>
  <p>
    <label for="event_date">開催日</label><br>
    <input type="date" id="event_date" name="event_date" value="<?php echo esc_attr($event_date); ?>" style="width: 100%;">
  </p>
  <p>
    <label for="event_location">開催場所</label><br>
    <input type="text" id="event_location" name="event_location" value="<?php echo esc_attr($event_location); ?>" style="width: 100%;">
  </p>
    <label for="event_product">対象プロダクト</label><br>
    <input type="text" id="event_product" name="event_product" value="<?php echo esc_attr($event_product); ?>" style="width: 100%;">
  </p>
  <?php
}

/**
 * イベント投稿のカスタムフィールド保存処理
 */
function save_event_custom_fields($post_id) {
  if (!isset($_POST['event_custom_fields_nonce']) || !wp_verify_nonce($_POST['event_custom_fields_nonce'], 'save_event_custom_fields')) return;
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
  if (!current_user_can('edit_post', $post_id)) return;

  update_post_meta($post_id, 'event_date', sanitize_text_field($_POST['event_date']));
  update_post_meta($post_id, 'event_location', sanitize_text_field($_POST['event_location']));
  update_post_meta($post_id, 'event_organizer', sanitize_text_field($_POST['event_organizer']));
  update_post_meta($post_id, 'event_product', sanitize_text_field($_POST['event_product']));
}
add_action('save_post', 'save_event_custom_fields');


/**
 * Pardot埋め込み用フォームスクリプトを入力するメタボックスを追加
 */
function add_event_form_script_field() {
  add_meta_box(
    'event_form_script',
    'Pardotフォームスクリプト',
    'render_event_form_script_field',
    'event',
    'normal',
    'default'
  );
}
add_action('add_meta_boxes', 'add_event_form_script_field');

/**
 * Pardotフォームスクリプト入力欄の表示
 */
function render_event_form_script_field($post) {
  $form_script = get_post_meta($post->ID, 'event_form_script', true);
  wp_nonce_field('save_event_form_script_field', 'event_form_script_nonce');
  echo '<textarea name="event_form_script" rows="6" style="width:100%;">' . esc_textarea($form_script) . '</textarea>';
}

/**
 * Pardotフォームスクリプトの保存処理
 */
function save_event_form_script_field($post_id) {
  if (!isset($_POST['event_form_script_nonce']) || !wp_verify_nonce($_POST['event_form_script_nonce'], 'save_event_form_script_field')) return;
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
  if (!current_user_can('edit_post', $post_id)) return;

  if (isset($_POST['event_form_script'])) {
    update_post_meta($post_id, 'event_form_script', $_POST['event_form_script']);
  }
}
add_action('save_post', 'save_event_form_script_field');
