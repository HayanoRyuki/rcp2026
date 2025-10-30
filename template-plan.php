<?php
/**
 * Template Name: 料金表
 */
get_header();

$check = '<img src="' . get_template_directory_uri() . '/assets/img/plan/check.svg" alt="チェック" class="check-icon">';
?>


<main class="site-main plan-page">
  <section class="plan-intro-section">
    <div class="container">
      <h1 class="page-title">プラン</h1>
      <p class="plan-lead">3つのプラン料金・オプション料金は、料金表に掲載しています。</p>
      <a href="/resources/price-book" class="btn btn-primary">料金表をもらう</a>
    </div>
  </section>

  <section class="plan-table-section">
    <div class="container">
      <table class="plan-table">
        <thead>
          <tr>
            <th>機能</th>
            <th>スタンダードプラン</th>
            <th>エンタープライズ</th>
            <th>プレミアム</th>
          </tr>
        </thead>
        <tbody>
          <tr><td>ビジネスチャット連携</td><td><?= $check ?></td><td><?= $check ?></td><td><?= $check ?></td></tr>
          <tr><td>来客の着信音(電話)通知</td><td>ASK</td><td>ASK</td><td>ASK</td></tr>
          <tr><td>スマホアプリ通知</td><td><?= $check ?></td><td><?= $check ?></td><td><?= $check ?></td></tr>
          <tr><td>メール通知</td><td><?= $check ?></td><td><?= $check ?></td><td><?= $check ?></td></tr>
          <tr><td>SMS通知</td><td><?= $check ?></td><td><?= $check ?></td><td><?= $check ?></td></tr>
          <tr><td>受付コード発行</td><td><?= $check ?></td><td><?= $check ?></td><td><?= $check ?></td></tr>
          <tr><td>Googleカレンダー連携</td><td><?= $check ?></td><td><?= $check ?></td><td><?= $check ?></td></tr>
          <tr><td>Office365カレンダー連携</td><td><?= $check ?></td><td><?= $check ?></td><td><?= $check ?></td></tr>
          <tr><td>Alive Monitoring機能</td><td><?= $check ?></td><td><?= $check ?></td><td><?= $check ?></td></tr>
          <tr><td>来訪者記録管理</td><td><?= $check ?></td><td><?= $check ?></td><td><?= $check ?></td></tr>
          <tr><td>日程調整</td><td><?= $check ?></td><td><?= $check ?></td><td><?= $check ?></td></tr>
          <tr><td>完全タッチレス受付</td><td><?= $check ?></td><td><?= $check ?></td><td><?= $check ?></td></tr>
          <tr><td>秘書/アシスタント通知設定</td><td>&mdash;</td><td><?= $check ?></td><td><?= $check ?></td></tr>
          <tr><td>退館機能</td><td>&mdash;</td><td><?= $check ?></td><td><?= $check ?></td></tr>
          <tr><td>社員毎に来客通知先を指定</td><td>&mdash;</td><td><?= $check ?></td><td><?= $check ?></td></tr>
          <tr><td>入館規約の同意表示</td><td>&mdash;</td><td><?= $check ?></td><td><?= $check ?></td></tr>
          <tr><td>IPアドレス制限</td><td>&mdash;</td><td><?= $check ?></td><td><?= $check ?></td></tr>
          <tr><td>複数管理者設定</td><td>&mdash;</td><td><?= $check ?></td><td><?= $check ?></td></tr>
          <tr><td>複数拠点対応</td><td>&mdash;</td><td><?= $check ?></td><td><?= $check ?></td></tr>
          <tr><td>ウェルカムテキスト設定</td><td>&mdash;</td><td><?= $check ?></td><td><?= $check ?></td></tr>
          <tr><td>受付時間設定</td><td>&mdash;</td><td><?= $check ?></td><td><?= $check ?></td></tr>
          <tr><td>待受動画再生</td><td>&mdash;</td><td><?= $check ?></td><td><?= $check ?></td></tr>
          <tr><td>電話サポート</td><td>&mdash;</td><td><?= $check ?></td><td><?= $check ?></td></tr>
          <tr><td>ホールディングス機能</td><td>&mdash;</td><td>&mdash;</td><td><?= $check ?></td></tr>
          <tr><td>AD連携</td><td>&mdash;</td><td>&mdash;</td><td><?= $check ?></td></tr>
          <tr><td>SAML認証(6種)</td><td>&mdash;</td><td>&mdash;</td><td><?= $check ?></td></tr>
          <tr><td>ゲート/自動ドア連携</td><td>&mdash;</td><td>&mdash;</td><td><?= $check ?></td></tr>
        </tbody>
      </table>
    </div>
  </section>

  <section class="option-section">
    <div class="container">
      <h2>オプション</h2>
      <ul>
        <li>iPad2台目以降の追加利用ライセンス</li>
        <li>導入サポート</li>
        <li>会議室の予約・管理</li>
        <li>ゲート/自動ドア連携</li>
      </ul>
      <p>※オプション料金は料金表に掲載しています。</p>
      <a href="/resources/price-book" class="btn btn-primary">料金表をもらう</a>
    </div>
  </section>

 
</main>

<?php get_footer(); ?>