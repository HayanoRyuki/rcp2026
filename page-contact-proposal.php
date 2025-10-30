<?php
/* Template Name: 弊社へのご提案 */
get_header();
?>

<main class="site-main contact-proposal-page">
  <section class="section-contact-proposal">
    <div class="container" style="max-width: 800px; margin: 0 auto; padding: 60px 20px;">
      <h1 class="page-title" style="font-size: 2rem; text-align: center; margin-bottom: 1.5rem;">
        弊社へのご提案
      </h1>
      <p style="text-align: center; margin-bottom: 2rem;">
        弊社へのご提案・ご協業のアイデアについては、以下のフォームよりお送りください。<br>
        内容を確認のうえ、担当者よりご連絡差し上げます。
      </p>

      <!-- 提案フォーム -->
      <form name="proposal" class="form-track download-form pardot-form"
            action="" method="post"
            data-event="proposal_submit" data-form-id="proposal">

        <!-- contact_type -->
        <input type="hidden" name="contact_type" value="suggest_company">

        <!-- 会社名 -->
        <div class="form-group">
          <label for="company_name" class="required">会社名</label>
          <input type="text" name="company_name" id="company_name" required>
        </div>

        <!-- 姓・名 -->
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
          <label for="phone_no">電話番号</label>
          <input type="tel" name="phone_no" id="phone_no">
        </div>

        <!-- ご提案内容 -->
        <div class="form-group">
          <label for="body" class="required">ご提案内容</label>
          <textarea name="body" id="body" rows="6" required></textarea>
        </div>

        <!-- 同意チェックボックス -->
        <div class="form-group" style="text-align: center; margin-bottom: 1.5rem;">
          <label style="display: inline-flex; align-items: center; font-size: 0.95rem; gap: 0.3em; justify-content: center;">
            <input type="checkbox" id="privacy_policy" name="privacy_policy" required>
            （株）RECEPTIONISTの 
            <a href="/privacy" target="_blank" rel="noopener noreferrer">個人情報の取り扱いについて</a> に同意します。
          </label>
        </div>

        <!-- ハニーポット -->
        <input type="text" name="hp" tabindex="-1" autocomplete="off"
               style="position:absolute;left:-9999px;opacity:0;height:0;width:0;">

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
    if (!form.matches('form[name="proposal"]')) return;

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

      console.log("[proposal] 送信データ", rawData);

      window.contactUtil.sendRequest({
        formName: 'proposal',
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
