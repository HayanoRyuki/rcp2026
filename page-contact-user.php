<?php
/* Template Name: お問い合わせ｜アカウント有 */
get_header();
?>

<main class="contact-section contact-user wrapper">
  <h1 class="contact-title">お問い合わせ - アカウントをお持ちの方 -</h1>
  <p class="contact-description">
    ご質問、ご相談は以下のフォームよりお送りください。<br>
    内容確認後、担当より通常2〜4営業日以内にご連絡いたします。<br>
    アカウントをお持ちでない方は<a href="/contact">こちら</a>よりお問い合わせください。
  </p>

<form name="contact" class="contact-form kv-contact-form">
    <input type="hidden" name="contact_type" value="user">

    <div class="kv-form-group has-floating-label">
      <label class="floating-label">貴社名<span class="asterisk">*</span></label>
      <input type="text" name="company_name" placeholder="株式会社RECEPTIONIST" required>
    </div>

    <div class="kv-form-group has-floating-label two-column">
      <div>
        <label class="floating-label">ご担当者名（姓）<span class="asterisk">*</span></label>
        <input type="text" name="last_name" placeholder="姓" required>
      </div>
      <div>
        <label class="floating-label">ご担当者名（名）<span class="asterisk">*</span></label>
        <input type="text" name="first_name" placeholder="名" required>
      </div>
    </div>

    <div class="kv-form-group has-floating-label">
      <label class="floating-label">メールアドレス<span class="asterisk">*</span></label>
      <input type="email" name="email" placeholder="例）example@chouseiapo.co.jp" required>
    </div>

    <div class="kv-form-group has-floating-label">
      <label class="floating-label">電話番号</label>
      <input type="tel" name="phone_no" placeholder="例）03-1234-5678">
    </div>

    <div class="kv-form-group has-floating-label">
      <label class="floating-label">お問い合わせ種別<span class="asterisk">*</span></label>
      <select name="contact_category_id" required>
        <option value="" disabled selected>選択してください</option>
        <option value="2">アカウント情報について</option>
        <option value="3">チャット連携について</option>
        <option value="4">担当者への通知について</option>
        <option value="5">受付コードについて</option>
        <option value="6">カスタムボタンについて</option>
        <option value="7">社員情報について</option>
        <option value="8">アポイントメント登録について</option>
        <option value="9">来訪者履歴について</option>
        <option value="10">受付の運用フローについて</option>
        <option value="12">その他</option>
      </select>
    </div>

    <div class="kv-form-group has-floating-label">
      <label class="floating-label">お問い合わせ内容<span class="asterisk">*</span></label>
      <textarea name="body" rows="5" placeholder="例）今すぐ利用開始できますか？" required></textarea>
    </div>

    <div class="kv-form-group kv-checkbox">
      <label>
        <input type="checkbox" name="agree" required>
        （株）RECEPTIONISTの<a href="/privacy-policy" target="_blank" rel="noopener">個人情報の取り扱い</a>について同意します。<span class="asterisk">*</span>
      </label>
    </div>

    <div class="kv-form-submit">
      <button type="submit" id="send" class="kv-button submit-button">送信</button>
    </div>
  </form>
</main>

<script>
document.querySelector('#send').addEventListener('click', function (e) {
  e.preventDefault();

  const form = document.querySelector('form[name="contact"]');
  if (!form.checkValidity()) {
    form.reportValidity();
    return;
  }

  const params = {
    contact: {
      contact_type: form.contact_type.value,
      company_name: form.company_name.value,
      last_name: form.last_name.value,
      first_name: form.first_name.value,
      email: form.email.value,
      phone_no: form.phone_no.value,
      contact_category_id: form.contact_category_id.value,
      body: form.body.value
    }
  };

  fetch('https://api.receptionist.jp/api/contacts', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(params)
  })
  .then(response => {
    if (!response.ok) throw new Error('送信エラー');
    return response.json();
  })
  .then(data => {
    window.location.href = '/thanks';
  })
  .catch(error => {
    console.error(error);
    alert('送信に失敗しました。時間を置いてお試しください。');
  });
});
</script>

<?php get_footer(); ?>
