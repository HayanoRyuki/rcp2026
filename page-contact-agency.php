<?php
/* Template Name: お問い合わせ - 販売代理店の方 - */
get_header();
?>

<main class="site-main contact-partner">
  <section class="contact-partner__section">
    <div class="contact-partner__inner">
      <h1 class="contact-partner__title">お問い合わせ - 販売代理店の方 -</h1>

      <p class="contact-partner__intro">
        ご質問、ご相談は以下のフォームよりお送りください。<br>
        内容確認後、担当より通常2〜4営業日以内にご連絡いたします。
      </p>

      <form name="agency"
            class="contact-partner__form form-track download-form pardot-form"
            action="" method="post"
            data-event="request_materials"
            data-form-id="agency">

        <div class="contact-partner__group">
          <label for="company_name" class="contact-partner__label required">貴社名</label>
          <input type="text" name="company_name" id="company_name" class="contact-partner__input" required>
        </div>

        <div class="contact-partner__row">
          <div class="contact-partner__group">
            <label for="last_name" class="contact-partner__label required">姓</label>
            <input type="text" name="last_name" id="last_name" class="contact-partner__input" required>
          </div>

          <div class="contact-partner__group">
            <label for="first_name" class="contact-partner__label required">名</label>
            <input type="text" name="first_name" id="first_name" class="contact-partner__input" required>
          </div>
        </div>

        <div class="contact-partner__group">
          <label for="email" class="contact-partner__label required">メールアドレス</label>
          <input type="email" name="email" id="email" class="contact-partner__input" required>
        </div>

        <div class="contact-partner__group">
          <label for="phone_no" class="contact-partner__label required">電話番号</label>
          <input type="tel" name="phone_no" id="phone_no" class="contact-partner__input" required>
        </div>

        <div class="contact-partner__group">
          <label for="body" class="contact-partner__label required">お問い合わせ内容</label>
          <textarea name="body" id="body" rows="6" class="contact-partner__textarea" required></textarea>
        </div>

        <div class="contact-partner__privacy">
          <label for="privacy_policy" class="contact-partner__privacy-label">
            <input type="checkbox" id="privacy_policy" name="privacy_policy" required>
            <span>
              <a href="https://help.receptionist.jp/?p=402" target="_blank" rel="noopener">
                （株）RECEPTIONISTの個人情報の取り扱い
              </a> に同意します。<span class="required">*</span>
            </span>
          </label>
        </div>

        <input type="text" name="hp" tabindex="-1" autocomplete="off"
               class="contact-partner__honeypot">

        <input type="hidden" name="contact_type" value="agency">

        <div class="contact-partner__actions">
          <button type="submit" class="contact-partner__button">送信する</button>
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
