<?php
/* Template Name: 新規お問い合わせ */
get_header();
?>

<main class="site-main contact-new-page">
  <section class="section-contact-new">
    <div class="container" style="max-width: 800px; margin: 0 auto; padding: 60px 20px;">
      <h1 class="page-title" style="font-size: 2rem; text-align: center; margin-bottom: 1.5rem;">
        新規お問い合わせ
      </h1>
      <p style="text-align: center; margin-bottom: 2rem;">
        ご質問、ご相談は以下のフォームよりお送りください。<br>
        内容確認後、担当より通常2〜4営業日以内にご連絡いたします。
      </p>

      <!-- name を Lambda 側に合わせて英語に統一 -->
      <form name="new_user" class="form-track download-form pardot-form"
            action="" method="post"
            data-event="request_materials" data-form-id="new_user">
        
        <!-- 会社名 -->
        <div class="form-group">
          <label for="company_name" class="required">貴社名</label>
          <input type="text" name="company_name" id="company_name" required>
        </div>

        <!-- 姓名（横並び） -->
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

        <!-- 従業員数 -->
        <div class="form-group">
          <label for="employee_number" class="required">従業員数</label>
          <select name="employee_number" id="employee_number" required>
            <option value="">選択してください</option>
            <option value="1-10名">1-10名</option>
            <option value="11-50名">11-50名</option>
            <option value="51-100名">51-100名</option>
            <option value="101-200名">101-200名</option>
            <option value="201-300名">201-300名</option>
            <option value="301-500名">301-500名</option>
            <option value="501-1000名">501-1000名</option>
            <option value="1001名以上">1001名以上</option>
          </select>
        </div>

        <!-- お問い合わせ内容 -->
        <div class="form-group">
          <label for="body" class="required">お問い合わせ内容</label>
          <textarea name="body" id="body" rows="6" required></textarea>
        </div>

        <!-- 同意チェックボックス -->
        <div class="form-group" style="text-align: center; margin-bottom: 1.5rem;">
          <label style="display: inline-flex; align-items: center; font-size: 0.95rem; gap: 0.3em; justify-content: center;">
            <input type="checkbox" id="agree_privacy" name="privacy_policy" required>
            （株）RECEPTIONISTの
            <a href="/privacy" target="_blank" rel="noopener noreferrer">個人情報の取り扱いについて</a> に同意します。
          </label>
        </div>

        <!-- ハニーポット -->
        <input type="text" name="hp" tabindex="-1" autocomplete="off"
               style="position:absolute;left:-9999px;opacity:0;height:0;width:0;">

        <!-- contact_type -->
        <input type="hidden" name="contact_type" value="new_user">

        <!-- UTM -->
        <input type="hidden" name="utm_source" id="utm_source_input">
        <input type="hidden" name="utm_medium" id="utm_medium_input">
        <input type="hidden" name="utm_campaign" id="utm_campaign_input">
        <input type="hidden" name="utm_term" id="utm_term_input">
        <input type="hidden" name="utm_content" id="utm_content_input">

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
    if (!form.matches('form[name="new_user"]')) return;

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

  console.log("[new_user] 送信データ", rawData);

  window.contactUtil.sendRequest({
    formName: 'new_user',
    isNew: true,
    requestParams: rawData   // ← ここを { contact: rawData } ではなく rawData にする
  });
} else {
  console.error('contactUtil.sendRequest が見つかりません。');
}
  }, true);
})();
</script>

<?php get_footer(); ?>
