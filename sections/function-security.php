<style>
.function-security {
  background: #f4f9fd;
  padding: 60px 20px;
}

.function-security .section-title {
  text-align: center;
  font-size: 2em;
  margin-bottom: 40px;
}

.function-security .function-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 20px;
  max-width: 1200px;
  margin: 0 auto;
}

.function-security .function-card {
  background: #fff;
  border-radius: 12px;
  padding: 24px;
  text-align: center;
  box-shadow: 0 4px 8px rgba(0,0,0,0.05);
}

.function-security .function-card .icon {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 60px;
  margin-bottom: 12px;
}

.function-security .function-card .icon img {
  width: 48px;
  height: auto;
}

.function-security .function-card h3 {
  font-size: 1.1em;
  margin-bottom: 8px;
}

.function-security .function-card p {
  font-size: 0.95em;
  color: #333;
}

@media (max-width: 768px) {
  .function-security .function-grid {
    grid-template-columns: 1fr;
  }
}
</style>


<section id="func02" class="function-security">
  <h2 class="section-title">セキュリティー対策</h2>
  <div class="function-grid">

    <div class="function-card">
      <div class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-touchless.svg" alt=""></div>
      <h3>完全タッチレス受付</h3>
      <p>QRコードをiPadにかざすだけで受付が可能です。</p>
    </div>

    <div class="function-card">
      <div class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-custom.svg" alt=""></div>
      <h3>カスタム受付設定</h3>
      <p>入館前に知りたい質問を自由に設定し、来客時に確認できます。</p>
    </div>

    <div class="function-card">
      <div class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-gate.svg" alt=""></div>
      <h3>ゲート・電子錠連携</h3>
      <p>セキュリティゲート・スマートロックと連携可能です。</p>
    </div>

    <div class="function-card">
      <div class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-board.svg" alt=""></div>
      <h3>メッセージボード</h3>
    </div>

    <div class="function-card">
      <div class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-checkout.svg" alt=""></div>
      <h3>退館機能</h3>
    </div>

    <div class="function-card">
      <div class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-admin.svg" alt=""></div>
      <h3>複数管理者設定</h3>
    </div>

    <div class="function-card">
      <div class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-iplock.svg" alt=""></div>
      <h3>IPアドレス制限</h3>
    </div>

    <div class="function-card"></div><!-- ダミー：4列×2行レイアウト維持 -->

  </div>
</section>
