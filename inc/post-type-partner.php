<?php
/**
 * パートナー投稿タイプ用のタクソノミー定義（カテゴリー / タグ）
 */
function rcp2025_register_taxonomies_for_partner() {

  // パートナーカテゴリー（階層あり）
  if ( ! taxonomy_exists('partner-category') ) {
    register_taxonomy(
      'partner-category',
      'partner',
      [
        'label'        => 'パートナーカテゴリー',
        'hierarchical' => true,
        'public'       => true,
        'show_ui'      => true,
        'show_in_rest' => true,
        'rewrite'      => [ 'slug' => 'partner-category' ],
      ]
    );
  }

  // パートナータグ（階層なし）
  register_taxonomy(
    'partner-tag',
    'partner',
    [
      'label'        => 'パートナータグ',
      'hierarchical' => false,
      'public'       => true,
      'show_ui'      => true,
      'show_in_rest' => true,
      'rewrite'      => [ 'slug' => 'partner-tag' ],
    ]
  );
}
add_action( 'init', 'rcp2025_register_taxonomies_for_partner' );



/**
 * パートナー投稿に「並び順」入力用メタボックスを追加
 */
function rcp_partner_add_order_metabox() {
  add_meta_box(
    'rcp_partner_order',
    '表示順（小さいほど上位）',
    'rcp_partner_order_metabox_html',
    'partner',
    'side',
    'default'
  );
}
add_action( 'add_meta_boxes', 'rcp_partner_add_order_metabox' );



/**
 * メタボックス内の HTML
 */
function rcp_partner_order_metabox_html( $post ) {
  $value = get_post_meta( $post->ID, 'partner_order', true );
  ?>

  <label for="partner_order">並び順を入力（例：1, 2, 3）</label>
  <input
    type="number"
    id="partner_order"
    name="partner_order"
    value="<?php echo esc_attr( $value ); ?>"
    style="width:100%; margin-top:8px;"
  />

  <?php
}



/**
 * 並び順の保存処理
 */
function rcp_partner_save_order( $post_id ) {

  // 自動保存時は実行しない
  if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
    return;
  }

  if ( array_key_exists( 'partner_order', $_POST ) ) {
    update_post_meta(
      $post_id,
      'partner_order',
      intval( $_POST['partner_order'] )
    );
  }
}
add_action( 'save_post_partner', 'rcp_partner_save_order' );
