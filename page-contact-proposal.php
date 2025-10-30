<?php
/* Template Name: 弊社へのご提案 */
get_header();
?>

<main class="site-main contact-proposal">
  <section class="contact-proposal__section">
    <div class="contact-proposal__inner">
      <h1 class="contact-proposal__title">弊社へのご提案</h1>

      <p class="contact-proposal__intro">
        弊社へのご提案・ご協業のアイデアについては、以下のフォームよりお送りください。<br>
        内容を確認のうえ、担当者よりご連絡差し上げます。
      </p>

      <form name="proposal"
            class="contact-proposal__form form-track download-form pardot-form"
            action="" method="post"
            data-event="proposal_submit"
            data-form-id="proposal">

        <input type="hidden" name="contact_type" value="suggest_company">

        <div class="contact-proposal__group">
          <label for="company_name" class="contact-proposal__label required">会社名</label>
          <input type="text" name="company_name" id="company_name" class="contact-proposal__input" required>
        </div>

        <div class="contact-proposal__row">
          <div class="contact-proposal__group">
            <label for="last_name" class="contact-proposal__label required">姓</label>
            <input type="text" name="last_name" id="last_name" class="contact-proposal__input" required>
          </div>
          <div class="contact-proposal__group">
            <label for="first_name" class="contact-proposal__label required">名</label>
            <input type="text" name="first_name" id="first_name" class="contact-proposal__input" required>
          </div>
        </div>

        <div class="contact-proposal__group">
          <label for="email" class="contact-proposal__label required">メールアドレス</label>
          <input type="email" name="email" id="email" class="contact-proposal__input" required>
        </div>

        <div class="contact-proposal__group">
          <label for="phone_no" class="contact-proposal__label">電話番号</label>
          <input type="tel" name="phone_no" id="phone_no" class="contact-proposal__input">
        </div>

        <div class="contact-proposal__group">
          <label for="body" class="contact-proposal__label required">ご提案内容</label>
          <textarea name="body" id="body" rows="6" class="contact-proposal__textarea" required></textarea>
        </div>

        <div class="contact-proposal__privacy">
          <label for="privacy_policy" class="contact-proposal__privacy-label">
            <input type="checkbox" id="privacy_policy" name="privacy_policy" required>
            （株）RECEPTIONISTの
            <a href="/privacy" target="_blank" rel="noopener noreferrer">個人情報の取り扱いについて</a> に同意します。
          </label>
        </div>

        <input type="text" name="hp" tabindex="-1" autocomplete="off" class="contact-proposal__honeypot">

        <div class="contact-proposal__actions">
          <button type="submit" class="contact-proposal__button">送信する</button>
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
