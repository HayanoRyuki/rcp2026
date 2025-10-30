<?php
/**
 * Template Name: 料金表
 */
get_header(); ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/page-price.css?ver=<?php echo time(); ?>">

<main class="site-main price-page">

  <!-- 見出しとサブ見出し -->
  <section class="price-heading">
    <div class="inner">
      <h1 class="page-title">プラン</h1>
      <p class="section-lead">3つのプラン料金とオプション料金は、料金表に掲載しています。</p>
      <a href="/resources/price-list" class="price-button">料金表をもらう</a>
    </div>
  </section>

  <!-- 料金比較テーブル -->
 <div class="table-scroll">
  <table class="price-table">
    <thead>
      <tr>
        <th></th>
        <th>スタンダードプラン</th>
        <th>エンタープライズ</th>
        <th>プレミアム</th>
      </tr>
    </thead>
    <tbody>
<?php
function checkmark_svg() {
  return '<span class="checkmark-svg"><svg viewBox="0 0 24 24" width="20" height="20" fill="none"><path d="M20 6L9 17l-5-5" stroke="#42C3E8" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg></span>';
}
function td($text) {
  if ($text === '✔︎') return '<td>' . checkmark_svg() . '</td>';
  return '<td>' . $text . '</td>';
}
function row($label, $a, $b, $c) {
  echo '<tr><td>' . $label . '</td>' . td($a) . td($b) . td($c) . '</tr>';
}
row('ビジネスチャット連携', '✔︎', '✔︎', '✔︎');
row('来客の着信音（電話）通知', 'ASK', 'ASK', 'ASK');
row('スマホアプリ通知', '✔︎', '✔︎', '✔︎');
row('メール通知', '✔︎', '✔︎', '✔︎');
row('SMS通知', '—', '✔︎', '✔︎');
row('受付コード発行', '✔︎', '✔︎', '✔︎');
row('Googleカレンダー連携', '✔︎', '✔︎', '✔︎');
row('Office365カレンダー連携', '✔︎', '✔︎', '✔︎');
row('Alive Monitoring機能', '✔︎', '✔︎', '✔︎');
row('来訪者記録管理', '✔︎', '✔︎', '✔︎');
row('日程調整', '✔︎', '✔︎', '✔︎');
row('完全タッチレス受付（非接触）', '✔︎', '✔︎', '✔︎');
row('秘書／アシスタント通知設定', '—', '✔︎', '✔︎');
row('退館機能', '—', '✔︎', '✔︎');
row('社員単位に来客通知先を指定', '—', '✔︎', '✔︎');
row('入館時刻の同意表示', '—', '✔︎', '✔︎');
row('IPアドレス制限', '—', '✔︎', '✔︎');
row('複数管理者設定', '—', '✔︎', '✔︎');
row('複数拠点対応', '—', '✔︎', '✔︎');
row('ウェルカムテキスト設定', '—', '✔︎', '✔︎');
row('受付時間の設定', '—', '✔︎', '✔︎');
row('待ち動画再生', '—', '✔︎', '✔︎');
row('電話サポート', '—', '✔︎', '✔︎');
row('ホールディングス機能', '—', '✔︎', '✔︎');
row('AD連携', '—', '✔︎', '✔︎');
row('SAML認証（S数）', '—', '✔︎', '✔︎');
row('ゲート自動ドア連携', '—', '—', '✔︎');
?>
      <tr>
        <td>オプション</td>
        <td colspan="3">
          ・iPad2台目以降の追加利用ライセンス<br>
          ・導入サポート<br>
          ・会議室の予約・管理<br>
          ・ゲート自動ドア連携<br>
          <small>※オプションは料金表を別途ご案内しています</small>
        </td>
      </tr>
    </tbody>
  </table>
</div>

  <!-- CTA：共通 -->
  <?php get_template_part('sections/cta'); ?>

  <!-- シリーズ紹介：共通 -->
  <?php get_template_part('sections/series'); ?>

</main>

<!-- フッター：共通 -->
<?php get_footer(); ?>