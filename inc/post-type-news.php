<?php

/**
 * ニュース投稿タイプ（single / archive）の表示時に
 * Botchan EFOスクリプトを読み込む
 */
function rcp2025_enqueue_news_script() {
  if (is_singular('news') || is_post_type_archive('news')) {
    // Botchan EFO本体スクリプトを読み込み
    wp_enqueue_script(
      'botchan-efo',
      'https://app2.blob.core.windows.net/botchan/js/efoapp.js',
      [],
      null,
      true
    );

    // 初期化スクリプトをインラインで挿入
    wp_add_inline_script('botchan-efo', "efoInit('5df1f5f1a24a61078d56b138');");
  }
}
add_action('wp_enqueue_scripts', 'rcp2025_enqueue_news_script');
