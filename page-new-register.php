<?php
/**
 * Template Name: 無料トライアル
 */
get_header();
?>

<main class="new-register wrapper">
  <div class="page_wraper">

    <div class="subpage_all">
      <div class="subpage_wrap">
        <div class="rr_left_container">
          <div class="rr_wrap-left">

            <h2>1分で登録完了</h2>

            <div class="reg_text">
              企業アカウント・管理者アカウントの発行になります。<br>
              既存のお客さまの社員アカウント発行は、<br>
              ご利用企業の管理者にお問い合わせください。<br><br>
              iPadがあればすぐにご利用いただけます。<br>
              RECEPTIONISTの全ての機能を無料でお試しいただけます。
            </div>

            <fieldset class="form-group">
              <label for="email">メールアドレス</label>
              <input
                type="email"
                id="email"
                name="email"
                class="form-control text"
                placeholder="会社のメールアドレスを入れてください"
                required
              >
              <p id="error-email" class="validation--error"></p>
            </fieldset>

            <fieldset class="form-group passwordHeight">
              <label for="password">パスワード</label>
              <p class="passwordExplanation">
                8文字以上(大文字英字・小文字英字・数字・特殊記号のうち３種類以上)で設定してください。
              </p>
              <input
                type="password"
                id="password"
                name="password"
                class="form-control text"
                placeholder="パスワード"
                required
              >
              <p id="error-password" class="validation--error" style="font-size: 11px"></p>
            </fieldset>

            <fieldset>
              <div class="rs_check">
                <input
                  type="checkbox"
                  name="agree"
                  class="agree_check check"
                  id="check"
                  required
                >
                <label for="check">
                  私は
                  <a href="https://help.receptionist.jp/?p=398" target="_blank" rel="noopener noreferrer">利用規約</a>
                  及び
                  <a href="https://help.receptionist.jp/?p=402" target="_blank" rel="noopener noreferrer">個人情報保護方針</a>
                  を読み、これに同意します。
                </label>
                <p id="error-check" class="validation--error"></p>
              </div>
            </fieldset>

            <div class="submit">
              <button type="button" class="rr_submit" id="sub-mit">
                無料で試してみる
              </button>
              <p id="loading" style="display:none">loading.....</p>
              <p id="error" class="validation--error"></p>
            </div>

          </div><!-- /.rr_wrap-left -->
        </div><!-- /.rr_left_container -->
      </div><!-- /.subpage_wrap -->
    </div><!-- /.subpage_all -->

    <script>
      document.body.id = "register";
    </script>

  </div><!-- /.page_wraper -->
</main>

<?php get_footer(); ?>
