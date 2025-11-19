<?php
/* Template Name: 新規お問い合わせ */
get_header();
?>

<main class="site-main contact-new">
  <section class="contact-new__section">
    <div class="contact-new__inner">
      <h1 class="contact-new__title">新規お問い合わせ</h1>

      <p class="contact-new__intro">
        ご質問、ご相談は以下のフォームよりお送りください。<br>
        内容確認後、担当より通常2〜4営業日以内にご連絡いたします。
      </p>

      <!-- ★ Lambda送信用：js-rcp-contact-form が必須 -->
      <form
        name="new_user"
        class="contact-form contact-new__form js-rcp-contact-form"
      >

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
          <label for="phone_no" class="contact-new__label required">電話番号</label>
          <input type="tel" name="phone_no" id="phone_no" class="contact-new__input" required>
        </div>

        <div class="contact-new__group">
          <label for="employee_number" class="contact-new__label required">従業員数</label>
          <select name="employee_number" id="employee_number" class="contact-new__select" required>
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

        <div class="contact-new__group">
          <label for="body" class="contact-new__label required">お問い合わせ内容</label>
          <textarea name="body" id="body" rows="6" class="contact-new__textarea" required></textarea>
        </div>

        <div class="contact-new__privacy">
          <label for="agree_privacy" class="contact-new__privacy-label">
            <input type="checkbox" id="agree_privacy" name="privacy_policy" required>
            （株）RECEPTIONISTの
            <a href="/privacy" target="_blank" rel="noopener noreferrer">個人情報の取り扱いについて</a>
            に同意します。
          </label>
        </div>

        <!-- ハニーポット -->
        <input type="text" name="hp" tabindex="-1" autocomplete="off" class="contact-new__honeypot">

        <!-- contact type -->
        <input type="hidden" name="contact_type" value="new_user">

        <!-- UTM -->
        <input type="hidden" name="utm_source" id="utm_source_input">
        <input type="hidden" name="utm_medium" id="utm_medium_input">
        <input type="hidden" name="utm_campaign" id="utm_campaign_input">
        <input type="hidden" name="utm_term" id="utm_term_input">
        <input type="hidden" name="utm_content" id="utm_content_input">

        <div class="contact-new__actions">
          <button type="submit" class="contact-new__button">送信する</button>
        </div>
      </form>

    </div>
  </section>
</main>

<?php get_footer(); ?>
