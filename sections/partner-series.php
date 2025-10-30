<?php
// セクション限定CSS
echo '<link rel="stylesheet" href="' . get_template_directory_uri() . '/assets/css/sections/partner-series.css">';
?>

<section id="partner-series" class="partner partner--series">
  <div class="partner__inner text-center">

    <header class="partner__header">
      <h2 class="partner__title">サービス紹介</h2>
      <p class="partner__lead">
        RECEPTIONISTシリーズは、ビジネス上のつながりをテクノロジーでスマートにすることで<br>
        各従業員が本来やるべき業務に集中でき、働きやすい環境に変えていくクラウドサービス群です。
      </p>
    </header>

    <div class="partner__series-grid">

      <!-- 調整アポ -->
      <div class="partner__series-card">
        <p class="partner__series-desc">日程調整がコピペで終わる</p>
        <h3 class="partner__series-name">
          日程調整ツール<br>調整アポ
        </h3>
        <div class="partner__series-image">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partner/service_img01.png" alt="調整アポ画像">
        </div>
        <p class="partner__series-text">
          面倒なスケジュール調整を10秒で完了させ、営業活動の効率化を支援します。<br>
          来客の他、Web会議や往訪など、あらゆる会議形態に対応できます。
        </p>
        <div class="partner__series-tags">
          <span class="partner__tag">営業DX</span>
          <span class="partner__tag">来客</span>
          <span class="partner__tag">人事業務支援</span>
        </div>
      </div>

      <!-- RECEPTIONIST -->
      <div class="partner__series-card">
        <p class="partner__series-desc">来客受付業務をシンプルに</p>
        <h3 class="partner__series-name">
          クラウド受付システム<br>RECEPTIONIST
        </h3>
        <div class="partner__series-image">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partner/service_img02.png" alt="RECEPTIONIST画像">
        </div>
        <p class="partner__series-text">
          電話取次ぎや来客履歴の管理などの来客受付の業務が0になり、<br>
          セキュリティ・コスト面で受付業務を大きく改善します。
        </p>
        <div class="partner__series-tags">
          <span class="partner__tag">受付DX</span>
          <span class="partner__tag">バックオフィス改善</span>
        </div>
      </div>

      <!-- 予約ルームズ -->
      <div class="partner__series-card">
        <p class="partner__series-desc">会議室の利用マナーを整える</p>
        <h3 class="partner__series-name">
          会議室予約システム<br>予約ルームズ
        </h3>
        <div class="partner__series-image">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partner/service_img03.png" alt="予約ルームズ画像">
        </div>
        <p class="partner__series-text">
          会議室・テレブース等の予約と管理が効率化されて経営リソースを最適化します。<br>
          利用マナー向上や空き予約の防止などを行います。
        </p>
        <div class="partner__series-tags">
          <span class="partner__tag">会議室DX</span>
          <span class="partner__tag">バックオフィス改善</span>
        </div>
      </div>

    </div><!-- /.partner__series-grid -->
  </div>
</section>
