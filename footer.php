<footer class="footer">
  <div class="container footer-inner">

    <!-- 上部：ロゴ + ナビ -->
    <div class="footer-top">
      <div class="footer-logo">
        <a href="https://all.receptionist.jp/">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/footer/f_r_logo.svg" alt="RECEPTIONISTロゴ">
        </a>
        <p class="pmark">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/footer/isms.png" alt="ISMS認証">
        </p>
      </div>

      <!-- ナビゲーション -->
      <div class="footer-nav">
        <div class="footer-nav-block">
          <h6>クラウド受付システム</h6>
          <ul>
            <li><a href="/function/">機能の紹介</a></li>
            <li><a href="/case/">導入事例</a></li>
            <li><a href="/resources/price-book">料金表</a></li>
            <li><a href="/resources">資料一覧</a></li>
          </ul>
        </div>

        <div class="footer-nav-block">
  <h6>サポート</h6>
  <ul>
    <li><a href="/new-register/">無料トライアル</a></li>
    <li><a href="https://app.receptionist.jp/sign_in">ログイン</a></li>
    <li><a href="https://help.receptionist.jp/">ヘルプサイト</a></li>
    <li><a href="/seminar/">講習会</a></li> 
  </ul>
</div>

        <div class="footer-nav-block">
          <h6>お問い合わせ</h6>
          <ul>
            <li><a href="/contact-select">お問い合わせ</a></li>
          </ul>
        </div>

        <div class="footer-nav-block">
          <h6>その他</h6>
          <ul>
            <li><a href="https://receptionist.co.jp/news/release">プレスリリース</a></li>
            <li><a href="https://help.receptionist.jp/?post_type=release">アップデート情報</a></li>
            <li><a href="https://receptionist.co.jp/news/all">お知らせ</a></li>
            <li><a href="/?post_type=post">コラム</a></li>
            <li><a href="/event">イベント情報</a></li>
          </ul>
        </div>
      </div>
    </div>

    <!-- 下部 -->
    <div class="footer-bottom">
      <ul class="footer-links">
        <li><a href="https://receptionist.co.jp/about">運営会社情報</a></li>
        <li><a href="https://help.receptionist.jp/?p=402">個人情報保護方針</a></li>
        <li><a href="/trade-mark/">商標について</a></li>
        <li><a href="https://help.receptionist.jp/?p=32273">情報セキュリティ方針</a></li>
        <li><a href="https://help.receptionist.jp/?p=398">利用規約</a></li>
      </ul>
      <p class="copyright">
        <small>© RECEPTIONIST, Inc</small>
      </p>
    </div>

  </div>
</footer>

<?php wp_footer(); ?>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const forms = document.querySelectorAll('form.form-track');
    if (!forms.length) return;

    forms.forEach(function (form) {
      form.addEventListener('submit', function () {
        const eventType = form.dataset.event || 'form_submit';
        const formId = form.dataset.formId || form.id || 'unknown';

        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push({
          event: eventType,
          form_id: formId,
          page_path: window.location.pathname
        });

        console.log('[GTM] dataLayer push:', {
          event: eventType,
          form_id: formId,
          page_path: window.location.pathname
        });
      });
    });
  });
</script>


</body>
</html>

