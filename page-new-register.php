<?php
/* Template Name: 無料トライアル */
get_header();
?>

<main class="site-main trial">
  <section class="trial__section">
    <div class="trial__inner">
      <h2 class="trial__title">1分で登録完了</h2>

      <p class="trial__intro">
        企業アカウント・管理者アカウントの発行になります。<br>
        既存のお客さまの社員アカウント発行は、<br>
        ご利用企業の管理者にお問い合わせください。<br><br>
        iPadがあればすぐにご利用いただけます。<br>
        RECEPTIONISTの全ての機能を無料でお試しいただけます。
      </p>

      <form class="contact-form trial__form" id="trialForm" novalidate>
        <div class="trial__group">
          <label for="email" class="trial__label">メールアドレス</label>
          <input
            type="email"
            id="email"
            name="email"
            class="trial__input"
            placeholder="会社のメールアドレスを入れてください"
            required
          >
          <p id="error-email" class="trial__error"></p>
        </div>

        <div class="trial__group">
          <label for="password" class="trial__label">パスワード</label>
          <p class="trial__note">
            8文字以上（大文字英字・小文字英字・数字・特殊記号のうち３種類以上）で設定してください。
          </p>
          <input
            type="password"
            id="password"
            name="password"
            class="trial__input"
            placeholder="パスワード"
            required
          >
          <p id="error-password" class="trial__error"></p>
        </div>

        <div class="trial__agreement">
          <input type="checkbox" name="agree" id="agree" required>
          <label for="agree" class="trial__agree-label">
            私は
            <a href="https://help.receptionist.jp/?p=398" target="_blank" rel="noopener noreferrer">利用規約</a>
            及び
            <a href="https://help.receptionist.jp/?p=402" target="_blank" rel="noopener noreferrer">個人情報保護方針</a>
            を読み、これに同意します。
          </label>
          <p id="error-check" class="trial__error"></p>
        </div>

        <div class="trial__actions">
          <button type="button" class="trial__button" id="sub-mit">無料で試してみる</button>
          <p id="loading" class="trial__loading" style="display:none;">loading.....</p>
          <p id="error" class="trial__error"></p>
        </div>
      </form>
    </div>
  </section>
</main>

<script>
  document.body.id = "register";
</script>

<?php get_footer(); ?>
