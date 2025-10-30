<?php
/**
 * パートナー投稿タイプに紐づくタクソノミー定義（カテゴリー・タグ）
 */

function rcp2025_register_taxonomies_for_partner() {
  // パートナーカテゴリー（階層あり）
  if (!taxonomy_exists('partner-category')) {
    register_taxonomy('partner-category', 'partner', [
      'label' => 'パートナーカテゴリー',
      'hierarchical' => true,
      'public' => true,
      'show_ui' => true,
      'show_in_rest' => true,
      'rewrite' => ['slug' => 'partner-category'],
    ]);
  }

  // パートナータグ（階層なし）
  register_taxonomy('partner-tag', 'partner', [
    'label' => 'パートナータグ',
    'hierarchical' => false,
    'public' => true,
    'show_ui' => true,
    'show_in_rest' => true,
    'rewrite' => ['slug' => 'partner-tag'],
  ]);
}
add_action('init', 'rcp2025_register_taxonomies_for_partner');
