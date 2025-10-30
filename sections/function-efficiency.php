<style>
.function-efficiency {
  background: #e9f7fc;
  padding: 60px 20px;
}

.function-efficiency .section-title {
  text-align: center;
  font-size: 2em;
  margin-bottom: 40px;
}

.function-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 20px;
  max-width: 1200px;
  margin: 0 auto;
}

.function-card {
  background: #fff;
  border-radius: 12px;
  padding: 24px;
  text-align: center;
  box-shadow: 0 4px 8px rgba(0,0,0,0.05);
}

.function-card .icon {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 60px;
  margin-bottom: 12px;
}

.function-card .icon img {
  width: 48px;
  height: auto;
}

.function-card h3 {
  font-size: 1.1em;
  margin-bottom: 8px;
}

.function-card p {
  font-size: 0.95em;
  color: #333;
}

@media (max-width: 768px) {
  .function-grid {
    grid-template-columns: 1fr;
  }
}
</style>


<section id="func01" class="function-efficiency">
  <h2 class="section-title">受付業務の効率化</h2>
  <div class="function-grid">

    <div class="function-card">
      <div class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-chat.svg" alt=""></div>
      <h3>ビジネスチャット連携</h3>
      <p>10種類以上のビジネスチャットと連携し、来客通知を行います。</p>
    </div>

    <div class="function-card">
      <div class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-call.svg" alt=""></div>
      <h3>来客の着信音(電話)通知</h3>
      <p>従業員の持つ携帯電話に電話で来客通知をします。</p>
    </div>

    <div class="function-card">
      <div class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-sticker.svg" alt=""></div>
      <h3>シール印刷</h3>
      <p>受付時にシールプリンターからオリジナルシールを印刷できます。</p>
    </div>

    <div class="function-card">
      <div class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-assistant.svg" alt=""></div>
      <h3>アシスタント通知機能</h3>
    </div>

    <div class="function-card">
      <div class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-schedule.svg" alt=""></div>
      <h3>スケジュール調整</h3>
    </div>

    <div class="function-card">
      <div class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-button.svg" alt=""></div>
      <h3>カスタムボタン</h3>
    </div>

    <div class="function-card">
      <div class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-welcome.svg" alt=""></div>
      <h3>ウェルカムテキスト</h3>
    </div>

    <div class="function-card">
      <div class="icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-agreement.svg" alt=""></div>
      <h3>入館規約の同意</h3>
    </div>

  </div>
</section>
