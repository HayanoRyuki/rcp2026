<style>
.function-main {
  background: #f4fbfe;
  padding: 60px 20px;
  text-align: center;
}

.function-main h2 {
  font-size: 2em;
  margin-bottom: 48px;
  color: #00264d;
}

.function-feature-grid {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  gap: 40px;
  max-width: 1200px;
  margin: 0 auto;
}

.feature-box {
  width: 300px;
  text-align: center;
}

.feature-box img {
  width: 100%;
  height: auto;
  max-height: 200px;
  object-fit: contain;
  margin-bottom: 20px;
}

.feature-title {
  font-size: 1.1em;
  font-weight: bold;
  margin-bottom: 12px;
  color: #003366;
}

.feature-description {
  font-size: 0.95em;
  color: #333;
}
</style>

<section class="function-main">
  <h2>主要機能</h2>
  <div class="function-feature-grid">

    <div class="feature-box">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/function_tool.jpg" alt="各種ツール連携">
      <div class="feature-title">各種ツール連携</div>
      <div class="feature-description">20種以上の外部サービスと連携することで、来客業務の効率化を促進します。</div>
    </div>

    <div class="feature-box">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/function_name.svg" alt="担当者名検索">
      <div class="feature-title">担当者名検索</div>
      <div class="feature-description">担当者名を検索し、候補一覧から呼び出すことが可能です。</div>
    </div>

    <div class="feature-box">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/function_history.svg" alt="入退館記録管理">
      <div class="feature-title">入退館記録管理</div>
      <div class="feature-description">クラウド上に来訪者の履歴が自動で記録されます。</div>
    </div>

  </div>
</section>
