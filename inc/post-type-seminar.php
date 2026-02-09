<?php
/**
 * セミナーLP（固定ページ page-seminar.php テンプレート）用メタボックス
 *
 * 管理画面の編集画面から、基礎編・応用編の開催日程と
 * カリキュラム情報を直接入力・更新できるようにする。
 *
 * メタキー一覧:
 *   basic_dates / basic_week / basic_times
 *   advanced_dates / advanced_week / advanced_times
 *   curriculum_basic / curriculum_basic_text
 *   curriculum_advanced / curriculum_advanced_text
 */


/* =============================================================
 *  メタボックス登録
 * ============================================================= */
function add_seminar_meta_boxes() {
  // セミナーLPテンプレートが適用された固定ページにのみ表示
  $screen = get_current_screen();
  if ( ! $screen || $screen->id !== 'page' ) return;

  global $post;
  if ( ! $post ) return;

  $template = get_page_template_slug( $post->ID );
  if ( $template !== 'page-seminar.php' ) return;

  add_meta_box(
    'seminar_schedule',
    '講習会 開催日程',
    'render_seminar_schedule_meta_box',
    'page',
    'normal',
    'high'
  );

  add_meta_box(
    'seminar_curriculum',
    '講習会 カリキュラム',
    'render_seminar_curriculum_meta_box',
    'page',
    'normal',
    'high'
  );
}
add_action( 'add_meta_boxes', 'add_seminar_meta_boxes' );


/* =============================================================
 *  開催日程メタボックス 描画
 * ============================================================= */
function render_seminar_schedule_meta_box( $post ) {
  wp_nonce_field( 'save_seminar_meta', 'seminar_meta_nonce' );

  // 既存データ取得
  $basic_dates    = get_post_meta( $post->ID, 'basic_dates',    true );
  $basic_week     = get_post_meta( $post->ID, 'basic_week',     true );
  $basic_times    = get_post_meta( $post->ID, 'basic_times',    true );
  $advanced_dates = get_post_meta( $post->ID, 'advanced_dates', true );
  $advanced_week  = get_post_meta( $post->ID, 'advanced_week',  true );
  $advanced_times = get_post_meta( $post->ID, 'advanced_times', true );

  // 配列でなければ初期化
  if ( ! is_array( $basic_dates ) )    $basic_dates    = [''];
  if ( ! is_array( $basic_week ) )     $basic_week     = [''];
  if ( ! is_array( $basic_times ) )    $basic_times    = [''];
  if ( ! is_array( $advanced_dates ) ) $advanced_dates = [''];
  if ( ! is_array( $advanced_week ) )  $advanced_week  = [''];
  if ( ! is_array( $advanced_times ) ) $advanced_times = [''];
  ?>
  <style>
    .seminar-meta-section { margin-bottom: 24px; padding: 16px; background: #f9f9f9; border: 1px solid #ddd; border-radius: 4px; }
    .seminar-meta-section h4 { margin: 0 0 12px; padding-bottom: 8px; border-bottom: 2px solid #0073aa; color: #0073aa; font-size: 14px; }
    .seminar-repeater-row { display: flex; gap: 8px; align-items: center; margin-bottom: 8px; flex-wrap: wrap; }
    .seminar-repeater-row input { padding: 4px 8px; }
    .seminar-repeater-row .seminar-field-date { width: 160px; }
    .seminar-repeater-row .seminar-field-week { width: 80px; }
    .seminar-repeater-row .seminar-field-time { width: 160px; }
    .seminar-repeater-row label { font-size: 12px; color: #666; min-width: 40px; }
    .seminar-btn-remove { color: #a00; cursor: pointer; border: none; background: none; font-size: 18px; line-height: 1; padding: 4px; }
    .seminar-btn-remove:hover { color: #dc3232; }
    .seminar-btn-add { margin-top: 4px; cursor: pointer; background: #0073aa; color: #fff; border: none; padding: 6px 16px; border-radius: 3px; font-size: 13px; }
    .seminar-btn-add:hover { background: #005a87; }
  </style>

  <!-- 基礎編 -->
  <div class="seminar-meta-section">
    <h4>基礎編の開催日程</h4>
    <div id="seminar-basic-schedule">
      <?php foreach ( $basic_dates as $i => $date ) : ?>
        <div class="seminar-repeater-row">
          <label>日付</label>
          <input type="text" name="basic_dates[]" class="seminar-field-date" value="<?php echo esc_attr( $date ); ?>" placeholder="例: 2025/12/09">
          <label>曜日</label>
          <input type="text" name="basic_week[]" class="seminar-field-week" value="<?php echo esc_attr( $basic_week[ $i ] ?? '' ); ?>" placeholder="例: (火)">
          <label>時間</label>
          <input type="text" name="basic_times[]" class="seminar-field-time" value="<?php echo esc_attr( $basic_times[ $i ] ?? '' ); ?>" placeholder="例: 15:00-17:00">
          <button type="button" class="seminar-btn-remove" title="削除">&times;</button>
        </div>
      <?php endforeach; ?>
    </div>
    <button type="button" class="seminar-btn-add" data-target="seminar-basic-schedule" data-prefix="basic">＋ 基礎編の日程を追加</button>
  </div>

  <!-- 応用編 -->
  <div class="seminar-meta-section">
    <h4>応用編の開催日程</h4>
    <div id="seminar-advanced-schedule">
      <?php foreach ( $advanced_dates as $i => $date ) : ?>
        <div class="seminar-repeater-row">
          <label>日付</label>
          <input type="text" name="advanced_dates[]" class="seminar-field-date" value="<?php echo esc_attr( $date ); ?>" placeholder="例: 2025/12/16">
          <label>曜日</label>
          <input type="text" name="advanced_week[]" class="seminar-field-week" value="<?php echo esc_attr( $advanced_week[ $i ] ?? '' ); ?>" placeholder="例: (火)">
          <label>時間</label>
          <input type="text" name="advanced_times[]" class="seminar-field-time" value="<?php echo esc_attr( $advanced_times[ $i ] ?? '' ); ?>" placeholder="例: 15:00-17:00">
          <button type="button" class="seminar-btn-remove" title="削除">&times;</button>
        </div>
      <?php endforeach; ?>
    </div>
    <button type="button" class="seminar-btn-add" data-target="seminar-advanced-schedule" data-prefix="advanced">＋ 応用編の日程を追加</button>
  </div>

  <script>
  (function(){
    // 行追加
    document.querySelectorAll('.seminar-btn-add').forEach(function(btn){
      btn.addEventListener('click', function(){
        var target = document.getElementById(this.dataset.target);
        var prefix = this.dataset.prefix;
        var row = document.createElement('div');
        row.className = 'seminar-repeater-row';
        row.innerHTML =
          '<label>日付</label>' +
          '<input type="text" name="' + prefix + '_dates[]" class="seminar-field-date" placeholder="例: 2025/12/09">' +
          '<label>曜日</label>' +
          '<input type="text" name="' + prefix + '_week[]" class="seminar-field-week" placeholder="例: (火)">' +
          '<label>時間</label>' +
          '<input type="text" name="' + prefix + '_times[]" class="seminar-field-time" placeholder="例: 15:00-17:00">' +
          '<button type="button" class="seminar-btn-remove" title="削除">&times;</button>';
        target.appendChild(row);
      });
    });

    // 行削除（イベント委任）
    document.addEventListener('click', function(e){
      if (e.target.classList.contains('seminar-btn-remove')) {
        var row = e.target.closest('.seminar-repeater-row');
        var container = row.parentElement;
        // 最低1行は残す
        if (container.querySelectorAll('.seminar-repeater-row').length > 1) {
          row.remove();
        } else {
          row.querySelectorAll('input').forEach(function(input){ input.value = ''; });
        }
      }
    });
  })();
  </script>
  <?php
}


/* =============================================================
 *  カリキュラムメタボックス 描画
 * ============================================================= */
function render_seminar_curriculum_meta_box( $post ) {
  $curriculum_basic         = get_post_meta( $post->ID, 'curriculum_basic',         true );
  $curriculum_basic_text    = get_post_meta( $post->ID, 'curriculum_basic_text',    true );
  $curriculum_advanced      = get_post_meta( $post->ID, 'curriculum_advanced',      true );
  $curriculum_advanced_text = get_post_meta( $post->ID, 'curriculum_advanced_text', true );

  if ( ! is_array( $curriculum_basic ) )         $curriculum_basic         = [''];
  if ( ! is_array( $curriculum_basic_text ) )    $curriculum_basic_text    = [''];
  if ( ! is_array( $curriculum_advanced ) )      $curriculum_advanced      = [''];
  if ( ! is_array( $curriculum_advanced_text ) ) $curriculum_advanced_text = [''];
  ?>
  <style>
    .seminar-curriculum-row { margin-bottom: 12px; padding: 12px; background: #fff; border: 1px solid #e0e0e0; border-radius: 3px; position: relative; }
    .seminar-curriculum-row input[type="text"] { width: 100%; padding: 4px 8px; margin-bottom: 6px; }
    .seminar-curriculum-row textarea { width: 100%; padding: 4px 8px; min-height: 60px; }
    .seminar-curriculum-row .seminar-btn-remove { position: absolute; top: 8px; right: 8px; }
    .seminar-curriculum-row label { font-size: 12px; color: #666; display: block; margin-bottom: 2px; }
  </style>

  <!-- 基礎編カリキュラム -->
  <div class="seminar-meta-section">
    <h4>基礎編カリキュラム</h4>
    <div id="seminar-curriculum-basic">
      <?php foreach ( $curriculum_basic as $i => $title ) : ?>
        <div class="seminar-curriculum-row">
          <button type="button" class="seminar-btn-remove" title="削除">&times;</button>
          <label>カリキュラムタイトル</label>
          <input type="text" name="curriculum_basic[]" value="<?php echo esc_attr( $title ); ?>" placeholder="例: RECEPTIONISTの基本操作">
          <label>詳細（改行区切りでリスト表示されます）</label>
          <textarea name="curriculum_basic_text[]" placeholder="例:&#10;ログイン方法&#10;来客通知の設定&#10;受付コードの発行"><?php echo esc_textarea( $curriculum_basic_text[ $i ] ?? '' ); ?></textarea>
        </div>
      <?php endforeach; ?>
    </div>
    <button type="button" class="seminar-btn-add" data-target="seminar-curriculum-basic" data-type="curriculum" data-prefix="curriculum_basic">＋ 基礎編カリキュラムを追加</button>
  </div>

  <!-- 応用編カリキュラム -->
  <div class="seminar-meta-section">
    <h4>応用編カリキュラム</h4>
    <div id="seminar-curriculum-advanced">
      <?php foreach ( $curriculum_advanced as $i => $title ) : ?>
        <div class="seminar-curriculum-row">
          <button type="button" class="seminar-btn-remove" title="削除">&times;</button>
          <label>カリキュラムタイトル</label>
          <input type="text" name="curriculum_advanced[]" value="<?php echo esc_attr( $title ); ?>" placeholder="例: 高度な設定と運用Tips">
          <label>詳細（改行区切りでリスト表示されます）</label>
          <textarea name="curriculum_advanced_text[]" placeholder="例:&#10;カスタムボタンの活用&#10;複数拠点の管理&#10;API連携の基礎"><?php echo esc_textarea( $curriculum_advanced_text[ $i ] ?? '' ); ?></textarea>
        </div>
      <?php endforeach; ?>
    </div>
    <button type="button" class="seminar-btn-add" data-target="seminar-curriculum-advanced" data-type="curriculum" data-prefix="curriculum_advanced">＋ 応用編カリキュラムを追加</button>
  </div>

  <script>
  (function(){
    // カリキュラム行追加
    document.querySelectorAll('.seminar-btn-add[data-type="curriculum"]').forEach(function(btn){
      btn.addEventListener('click', function(){
        var target = document.getElementById(this.dataset.target);
        var prefix = this.dataset.prefix;
        var row = document.createElement('div');
        row.className = 'seminar-curriculum-row';
        row.innerHTML =
          '<button type="button" class="seminar-btn-remove" title="削除">&times;</button>' +
          '<label>カリキュラムタイトル</label>' +
          '<input type="text" name="' + prefix + '[]" placeholder="カリキュラムタイトル">' +
          '<label>詳細（改行区切りでリスト表示されます）</label>' +
          '<textarea name="' + prefix + '_text[]" placeholder="詳細内容"></textarea>';
        target.appendChild(row);
      });
    });
  })();
  </script>
  <?php
}


/* =============================================================
 *  保存処理
 * ============================================================= */
function save_seminar_meta( $post_id ) {
  // nonce チェック
  if ( ! isset( $_POST['seminar_meta_nonce'] ) ||
       ! wp_verify_nonce( $_POST['seminar_meta_nonce'], 'save_seminar_meta' ) ) {
    return;
  }

  // 自動保存はスキップ
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

  // 権限チェック
  if ( ! current_user_can( 'edit_page', $post_id ) ) return;

  // テンプレートチェック
  $template = get_page_template_slug( $post_id );
  if ( $template !== 'page-seminar.php' ) return;

  // --- 全メタキーを一旦削除してから保存（旧プラグインの重複行対策） ---
  $all_keys = [
    'basic_dates', 'basic_week', 'basic_times',
    'advanced_dates', 'advanced_week', 'advanced_times',
    'curriculum_basic', 'curriculum_basic_text',
    'curriculum_advanced', 'curriculum_advanced_text',
  ];
  foreach ( $all_keys as $key ) {
    delete_post_meta( $post_id, $key );
  }

  // --- 開催日程 ---
  $schedule_keys = [
    'basic_dates', 'basic_week', 'basic_times',
    'advanced_dates', 'advanced_week', 'advanced_times',
  ];

  foreach ( $schedule_keys as $key ) {
    if ( isset( $_POST[ $key ] ) && is_array( $_POST[ $key ] ) ) {
      $clean = array_map( 'sanitize_text_field', $_POST[ $key ] );
      update_post_meta( $post_id, $key, $clean );
    }
  }

  // --- カリキュラム ---
  $curriculum_keys = [
    'curriculum_basic',
    'curriculum_advanced',
  ];

  foreach ( $curriculum_keys as $key ) {
    // タイトル
    if ( isset( $_POST[ $key ] ) && is_array( $_POST[ $key ] ) ) {
      $clean = array_map( 'sanitize_text_field', $_POST[ $key ] );
      update_post_meta( $post_id, $key, $clean );
    }

    // テキスト（改行を保持）
    $text_key = $key . '_text';
    if ( isset( $_POST[ $text_key ] ) && is_array( $_POST[ $text_key ] ) ) {
      $clean = array_map( 'sanitize_textarea_field', $_POST[ $text_key ] );
      update_post_meta( $post_id, $text_key, $clean );
    }
  }
}
add_action( 'save_post', 'save_seminar_meta' );
