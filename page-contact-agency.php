<?php
/* Template Name: お問い合わせ - 販売代理店の方 - */
get_header();
?>

<main class="site-main contact-partner-page">
  <section class="section-contact-partner">
    <div class="container" style="max-width: 800px; margin: 0 auto; padding: 60px 20px;">
      <h1 class="page-title" style="font-size: 2rem; text-align: center; margin-bottom: 1.5rem;">
        お問い合わせ - 販売代理店の方 -
      </h1>
      <p style="text-align: center; margin-bottom: 2rem;">
        ご質問、ご相談は以下のフォームよりお送りください。<br>
        内容確認後、担当より通常2〜4営業日以内にご連絡いたします。
      </p>

      <form name="agency" class="form-track download-form pardot-form"
            action="" method="post"
            data-event="request_materials" data-form-id="agency">

        <!-- 会社名 -->
        <div class="form-group">
          <label for="company_name" class="required">貴社名</label>
          <input type="text" name="company_name" id="company_name" required>
        </div>

        <!-- 姓・名を横並び -->
        <div class="form-row-flex" style="display: flex; gap: 1rem; margin-bottom: 1.5rem;">
          <div class="form-group" style="flex: 1;">
            <label for="last_name" class="required">姓</label>
            <input type="text" name="last_name" id="last_name" required>
          </div>

          <div class="form-group" style="flex: 1;">
            <label for="first_name" class="required">名</label>
            <input type="text" name="first_name" id="first_name" required>
          </div>
        </div>

        <!-- メールアドレス -->
        <div class="form-group">
          <label for="email" class="required">メールアドレス</label>
          <input type="email" name="email" id="email" required>
        </div>

        <!-- 電話番号 -->
        <div class="form-group">
          <label for="phone_no" class="required">電話番号</label>
          <input type="tel" name="phone_no" id="phone_no" required>
        </div>

        <!-- お問い合わせ内容 -->
        <div class="form-group">
          <label for="body" class="required">お問い合わせ内容</label>
          <textarea name="body" id="body" rows="6" required></textarea>
        </div>

  <!-- 同意チェックボックス -->
<div class="form-group privacy-policy" style="text-align: center; margin-bottom: 1.5rem;">
  <label for="privacy_policy">
    <input type="checkbox" id="privacy_policy" name="privacy_policy" required>
    <span>
      <a href="https://help.receptionist.jp/?p=402" target="_blank" rel="noopener">
        （株）RECEPTIONISTの個人情報の取り扱い
      </a> に同意します。<span style="color: red;">*</span>
    </span>
  </label>
</div>

        <!-- ハニーポット -->
        <input type="text" name="hp" tabindex="-1" autocomplete="off"
               style="position:absolute;left:-9999px;opacity:0;height:0;width:0;">

        <!-- contact_type -->
        <input type="hidden" name="contact_type" value="agency">

        <!-- 送信ボタン -->
        <div class="form-group" style="text-align: center;">
          <button type="submit" style="padding: 0.75rem 2rem; background-color: #0072FF; color: #fff; border: none; border-radius: 4px; font-size: 1rem; cursor: pointer;">
            送信する
          </button>
        </div>
      </form>
    </div>
  </section>
</main>

<script>
(function () {
  function hasSpam(form) {
    const hp = form.querySelector('input[name="hp"]');
    return hp && hp.value.trim() !== '';
  }

  document.addEventListener('submit', function (e) {
    const form = e.target;
    if (!form.matches('form[name="agency"]')) return;

    e.preventDefault();

    if (!form.checkValidity()) {
      form.reportValidity();
      return;
    }

    const consent = form.querySelector('input[name="privacy_policy"]');
    if (consent && !consent.checked) {
      alert('プライバシーポリシーに同意してください。');
      return;
    }

    if (hasSpam(form)) return;

    if (window.contactUtil && typeof window.contactUtil.sendRequest === 'function') {
      const rawData = {};
      new FormData(form).forEach((value, key) => {
        rawData[key] = value;
      });

      console.log("[agency] 送信データ", rawData);

      window.contactUtil.sendRequest({
        formName: 'agency',
        isNew: true,
        requestParams: rawData
      });
    } else {
      console.error('contactUtil.sendRequest が見つかりません。');
    }
  }, true);
})();
</script>

<?php get_footer(); ?>
