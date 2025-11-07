<?php
/* Template Name: お問い合わせ｜アカウント有 */
get_header();
?>

<main class="site-main page-contact page-contact--user">
  <section class="contact-form-wrapper">
    <div class="contact-form-inner">
      <h1 class="contact-title">お問い合わせ（アカウントをお持ちの方）</h1>
      <p class="contact-description">
        ご質問、ご相談は以下のフォームよりお送りください。<br>
        内容確認後、担当より通常2〜4営業日以内にご連絡いたします。<br>
        アカウントをお持ちでない方は<a href="/contact" target="_blank" rel="noopener">こちら</a>よりお問い合わせください。
      </p>

      <form name="contact" class="contact-form">
        <input type="hidden" name="contact_type" value="user">

        <div class="form-group">
          <label for="company_name" class="required">貴社名</label>
          <input type="text" id="company_name" name="company_name" placeholder="株式会社RECEPTIONIST" required>
        </div>

        <div class="form-group form-group--two-column">
          <div>
            <label for="last_name" class="required">ご担当者名（姓）</label>
            <input type="text" id="last_name" name="last_name" placeholder="姓" required>
          </div>
          <div>
            <label for="first_name" class="required">ご担当者名（名）</label>
            <input type="text" id="first_name" name="first_name" placeholder="名" required>
          </div>
        </div>

        <div class="form-group">
          <label for="email" class="required">メールアドレス</label>
          <input type="email" id="email" name="email" placeholder="例）example@chouseiapo.co.jp" required>
        </div>

        <div class="form-group">
          <label for="phone_no">電話番号</label>
          <input type="tel" id="phone_no" name="phone_no" placeholder="例）03-1234-5678">
        </div>

        <div class="form-group">
          <label for="contact_category_id" class="required">お問い合わせ種別</label>
          <select id="contact_category_id" name="contact_category_id" required>
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

        <div class="form-group">
          <label for="body" class="required">お問い合わせ内容</label>
          <textarea id="body" name="body" rows="6" placeholder="例）今すぐ利用開始できますか？" required></textarea>
        </div>

        <div class="check-box">
          <label>
            <input type="checkbox" name="agree" required>
            （株）RECEPTIONISTの
            <a href="/privacy-policy" target="_blank" rel="noopener">個人情報の取り扱い</a>
            に同意します。<span class="asterisk">*</span>
          </label>
        </div>

        <div class="form-group">
          <button type="submit" id="send" class="btn-submit">送信する</button>
        </div>
      </form>
    </div>
  </section>
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
    contact: Object.fromEntries(new FormData(form))
  };
  fetch('https://api.receptionist.jp/api/contacts', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(params)
  })
  .then(r => {
    if (!r.ok) throw new Error('送信エラー');
    return r.json();
  })
  .then(() => window.location.href = '/thanks')
  .catch(() => alert('送信に失敗しました。時間を置いてお試しください。'));
});
</script>

<?php get_footer(); ?>
