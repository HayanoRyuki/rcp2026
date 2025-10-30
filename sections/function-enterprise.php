<style>
.function-enterprise {
  background: #eef5f9;
  padding: 60px 20px;
}

.function-enterprise .section-title {
  text-align: center;
  font-size: 2em;
  margin-bottom: 40px;
}

.function-enterprise .function-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 20px;
  max-width: 1200px;
  margin: 0 auto;
}

.function-enterprise .function-card {
  background: #fff;
  border-radius: 12px;
  padding: 24px;
  text-align: center;
  box-shadow: 0 4px 8px rgba(0,0,0,0.05);
}

.function-enterprise .function-card .icon {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 60px;
  margin-bottom: 12px;
}

.function-enterprise .function-card .icon img {
  width: 48px;
  height: auto;
}

.function-enterprise .function-card h3 {
  font-size: 1.1em;
  margin-bottom: 8px;
}

.function-enterprise .function-card p {
  font-size: 0.95em;
  color: #333;
}

@media (max-width: 768px) {
  .function-enterprise .function-grid {
    grid-template-columns: 1fr;
  }
}
</style>

<section id="func03" class="function-enterprise">
  <h2 class="section-title">200人以上の企業向け機能</h2>
  <div class="function-grid">

    <div class="function-card">
      <div class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-holdings.svg" alt=""></div>
      <h3>ホールディングス機能</h3>
      <p>1つのオフィスに複数企業が入居している場合に使う機能です。</p>
    </div>

    <div class="function-card">
      <div class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-ad.svg" alt=""></div>
      <h3>AD連携</h3>
      <p>AzureADと同期して社員の一括登録・更新・削除が可能です。</p>
    </div>

    <div class="function-card">
      <div class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-saml.svg" alt=""></div>
      <h3>SAML認証</h3>
      <p>6種類のSAML認証方式によるログインに対応。</p>
    </div>

    <div class="function-card">
      <div class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-meeting.svg" alt=""></div>
      <h3>会議室予約・管理</h3>
    </div>

    <div class="function-card">
      <div class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-office.svg" alt=""></div>
      <h3>オフィス機能</h3>
    </div>

    <div class="function-card">
      <div class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-outlook.svg" alt=""></div>
      <h3>Outlookアドイン機能</h3>
    </div>

    <div class="function-card">
      <div class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-hierarchy.svg" alt=""></div>
      <h3>カスタムボタンの階層化</h3>
    </div>

    <div class="function-card">
      <div class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-subdomain.png" alt=""></div>
      <h3>独自サブドメイン設定</h3>
    </div>

  </div>
</section>
