<?php
// CSSを読み込み（このセクション限定）
echo '<link rel="stylesheet" href="' . get_template_directory_uri() . '/assets/css/partner-series.css">';
?>
<section class="series-section">
  <div class="container max-w-7xl mx-auto px-4 text-center">
    <h2 class="section-title">サービス紹介</h2>
    <p class="section-lead">
      RECEPTIONISTシリーズは、ビジネス上のつながりをテクノロジーでスマートにすることで<br>
      各従業員が本来やるべき業務に集中でき、働きやすい環境に変えていくクラウドサービス群です。
    </p>

    <div class="series-grid">
      <!-- 調整アポ -->
      <div class="series-card">
        <p class="series-desc">日程調整がコピペで終わる</p>
        <h3 class="series-name">日程調整ツール<br>調整アポ</h3>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partner/service_img01.png" alt="調整アポ画像" class="series-img">
        <p class="series-text">
          面倒なスケジュール調整を10秒で完了させ、営業活動の効率化を支援します。<br>
          来客の他、Web会議や往訪など、あらゆる会議形態に対応できます。
        </p>
        <div class="series-tags">
          <span class="tag">営業DX</span>
          <span class="tag">来客</span>
          <span class="tag">人事業務支援</span>
        </div>
      </div>

      <!-- RECEPTIONIST -->
      <div class="series-card">
        <p class="series-desc">来客受付業務をシンプルに</p>
        <h3 class="series-name">クラウド受付システム<br>RECEPTIONIST</h3>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partner/service_img02.png" alt="RECEPTIONIST画像" class="series-img">
        <p class="series-text">
          電話取次ぎや来客履歴の管理などの来客受付の業務が0になり、<br>
          セキュリティ・コスト面で受付業務を大きく改善します。
        </p>
        <div class="series-tags">
          <span class="tag">受付DX</span>
          <span class="tag">バックオフィス改善</span>
        </div>
      </div>

      <!-- 予約ルームズ -->
      <div class="series-card">
        <p class="series-desc">会議室の利用マナーを整える</p>
        <h3 class="series-name">会議室予約システム<br>予約ルームズ</h3>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partner/service_img03.png" alt="予約ルームズ画像" class="series-img">
        <p class="series-text">
          会議室・テレブース等の予約と管理が効率化されて経営リソースを最適化します。<br>
          利用マナー向上や空き予約の防止などを行います。
        </p>
        <div class="series-tags">
          <span class="tag">会議室DX</span>
          <span class="tag">バックオフィス改善</span>
        </div>
      </div>
    </div>
  </div>
</section>
