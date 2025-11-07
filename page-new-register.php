<?php
/* Template Name: 無料トライアル */
get_header();
?>

<main class="site-main contact-new">
  <section class="contact-new__section">
    <div class="contact-new__inner">
      <h1 class="contact-new__title">1分で登録完了</h1>

      <p class="contact-new__intro">
        企業アカウント・管理者アカウントの発行になります。<br>
        既存のお客さまの社員アカウント発行は、<br>
        ご利用企業の管理者にお問い合わせください。<br><br>
        iPadがあればすぐにご利用いただけます。<br>
        RECEPTIONISTの全ての機能を無料でお試しいただけます。
      </p>

      <form class="contact-form contact-new__form" id="trialForm" novalidate>
        <div class="contact-new__group">
          <label for="email" class="contact-new__label required">メールアドレス</label>
          <input
            type="email"
            id="email"
            name="email"
            class="contact-new__input"
            placeholder="会社のメールアドレスを入れてください"
            required
          >
        </div>

        <div class="contact-new__group">
          <label for="password" class="contact-new__label required">パスワード</label>
          <p class="contact-new__note">
            8文字以上（大文字英字・小文字英字・数字・特殊記号のうち3種類以上）で設定してください。
          </p>
          <input
  type="password"
  id="password"
  name="password"
  class="contact-new__input contact-new__input--password"
  placeholder="パスワード"
  required
>
        </div>

        <div class="contact-new__privacy">
          <label for="agree" class="contact-new__privacy-label">
            <input type="checkbox" name="agree" id="agree" required>
            私は
            <a href="https://help.receptionist.jp/?p=398" target="_blank" rel="noopener noreferrer">利用規約</a>
            及び
            <a href="https://help.receptionist.jp/?p=402" target="_blank" rel="noopener noreferrer">個人情報保護方針</a>
            を読み、これに同意します。
          </label>
        </div>

        <div class="contact-new__actions">
          <button type="submit" class="contact-new__button">無料で試してみる</button>
        </div>
      </form>
    </div>
  </section>
</main>

<script>
  document.body.id = "register";
</script>

<?php get_footer(); ?>
