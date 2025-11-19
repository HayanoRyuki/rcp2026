<?php
/* Template Name: お問い合わせ｜アカウント有 */
get_header();
?>

<main class="site-main contact-new">
  <section class="contact-new__section">
    <div class="contact-new__inner">
      <h1 class="contact-new__title">お問い合わせ（アカウントをお持ちの方）</h1>

      <p class="contact-new__intro">
        ご質問、ご相談は以下のフォームよりお送りください。<br>
        内容確認後、担当より通常2〜4営業日以内にご連絡いたします。<br>
        アカウントをお持ちでない方は
        <a href="/contact-without-account/" target="_blank" rel="noopener">こちら</a>
        よりお問い合わせください。
      </p>

      <!-- ★ Lambda送信用：js-rcp-contact-form 必須 -->
      <form
        name="contact_user"
        class="contact-form contact-new__form js-rcp-contact-form"
      >

        <input type="hidden" name="contact_type" value="user">

        <div class="contact-new__group">
          <label for="company_name" class="contact-new__label required">貴社名</label>
          <input type="text" name="company_name" id="company_name" class="contact-new__input" required>
        </div>

        <div class="contact-new__row">
          <div class="contact-new__group">
            <label for="last_name" class="contact-new__label required">姓</label>
            <input type="text" name="last_name" id="last_name" class="contact-new__input" required>
          </div>
          <div class="contact-new__group">
            <label for="first_name" class="contact-new__label required">名</label>
            <input type="text" name="first_name" id="first_name" class="contact-new__input" required>
          </div>
        </div>

        <div class="contact-new__group">
          <label for="email" class="contact-new__label required">メールアドレス</label>
          <input type="email" name="email" id="email" class="contact-new__input" required>
        </div>

        <div class="contact-new__group">
          <label for="phone_no" class="contact-new__label">電話番号</label>
          <input type="tel" name="phone_no" id="phone_no" class="contact-new__input">
        </div>

        <div class="contact-new__group">
          <label for="contact_category_id" class="contact-new__label required">お問い合わせ種別</label>
          <select name="contact_category_id" id="contact_category_id" class="contact-new__select" required>
            <option value="">選択してください</option>
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

        <div class="contact-new__group">
          <label for="body" class="contact-new__label required">お問い合わせ内容</label>
          <textarea name="body" id="body" rows="6" class="contact-new__textarea" required></textarea>
        </div>

        <div class="contact-new__privacy">
          <label for="privacy_policy" class="contact-new__privacy-label">
            <input type="checkbox" id="privacy_policy" name="privacy_policy" required>
            （株）RECEPTIONISTの
            <a href="/privacy" target="_blank" rel="noopener noreferrer">個人情報の取り扱いについて</a> に同意します。
          </label>
        </div>

        <!-- ハニーポット -->
        <input type="text" name="hp" tabindex="-1" autocomplete="off" class="contact-new__honeypot">

        <div class="contact-new__actions">
          <button type="submit" class="contact-new__button">送信する</button>
        </div>
      </form>

    </div>
  </section>
</main>

<?php get_footer(); ?>
