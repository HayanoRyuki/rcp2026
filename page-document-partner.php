<?php
/**
 * Template Name: パートナー資料ダウンロード
 */
get_header('partner');
?>

<main class="site-main contact-document-partner-page">
  <section class="section-contact-document-partner">
    <div class="container_l">

      <!-- 左カラム -->
      <div class="doc-left">
        <div class="txt-box" style="margin-bottom: 20px;">
          <h3>この資料の内容</h3>
          <ul class="doclist">
            <li>・リーフレット</li>
            <li>・各種ご紹介資料</li>
            <li>・市場状況</li>
            <li>・製品機能</li>
            <li>・料金プラン</li>
          </ul>
        </div>
        <div class="image-box">
          <img class="document-image"
               src="/wp-content/uploads/2025/10/reception_banner-1.gif"
               alt="資料イメージ">
        </div>
      </div>

      <!-- 右カラム -->
      <div class="doc-right">
        <form name="documentPartner"
              class="form-track download-form pardot-form"
              action=""
              method="post"
              data-event="request_materials"
              data-form-id="documentPartner">

          <!-- 会社名 -->
          <div class="form-row">
            <label for="company_name" class="required">会社名</label>
            <input type="text" id="company_name" name="company_name" required>
          </div>

          <!-- 姓・名 -->
          <div class="form-row" style="display: flex; gap: 1rem;">
            <div style="flex: 1;">
              <label for="last_name" class="required">姓</label>
              <input type="text" id="last_name" name="last_name" required>
            </div>
            <div style="flex: 1;">
              <label for="first_name" class="required">名</label>
              <input type="text" id="first_name" name="first_name" required>
            </div>
          </div>

          <!-- メール -->
          <div class="form-row">
            <label for="email" class="required">メールアドレス</label>
            <input type="email" id="email" name="email" required>
          </div>

          <!-- 電話番号 -->
          <div class="form-row">
            <label for="phone_no" class="required">電話番号</label>
            <input type="tel" id="phone_no" name="phone_no" required>
          </div>

          <!-- 都道府県 -->
          <div class="form-row">
            <label for="prefecture" class="required">都道府県</label>
            <select id="prefecture" name="prefecture" required>
              <option value="" disabled selected>選択してください</option>
              <option value="北海道">北海道</option>
              <option value="青森県">青森県</option>
              <option value="岩手県">岩手県</option>
              <option value="宮城県">宮城県</option>
              <option value="秋田県">秋田県</option>
              <option value="山形県">山形県</option>
              <option value="福島県">福島県</option>
              <option value="茨城県">茨城県</option>
              <option value="栃木県">栃木県</option>
              <option value="群馬県">群馬県</option>
              <option value="埼玉県">埼玉県</option>
              <option value="千葉県">千葉県</option>
              <option value="東京都">東京都</option>
              <option value="神奈川県">神奈川県</option>
              <option value="新潟県">新潟県</option>
              <option value="富山県">富山県</option>
              <option value="石川県">石川県</option>
              <option value="福井県">福井県</option>
              <option value="山梨県">山梨県</option>
              <option value="長野県">長野県</option>
              <option value="岐阜県">岐阜県</option>
              <option value="静岡県">静岡県</option>
              <option value="愛知県">愛知県</option>
              <option value="三重県">三重県</option>
              <option value="滋賀県">滋賀県</option>
              <option value="京都府">京都府</option>
              <option value="大阪府">大阪府</option>
              <option value="兵庫県">兵庫県</option>
              <option value="奈良県">奈良県</option>
              <option value="和歌山県">和歌山県</option>
              <option value="鳥取県">鳥取県</option>
              <option value="島根県">島根県</option>
              <option value="岡山県">岡山県</option>
              <option value="広島県">広島県</option>
              <option value="山口県">山口県</option>
              <option value="徳島県">徳島県</option>
              <option value="香川県">香川県</option>
              <option value="愛媛県">愛媛県</option>
              <option value="高知県">高知県</option>
              <option value="福岡県">福岡県</option>
              <option value="佐賀県">佐賀県</option>
              <option value="長崎県">長崎県</option>
              <option value="熊本県">熊本県</option>
              <option value="大分県">大分県</option>
              <option value="宮崎県">宮崎県</option>
              <option value="鹿児島県">鹿児島県</option>
              <option value="沖縄県">沖縄県</option>
            </select>
          </div>

          <!-- 資料ダウンロードの目的 -->
          <div class="form-row">
            <label for="purpose" class="required">資料ダウンロードの目的</label>
            <select id="purpose" name="purpose" required>
              <option value="" disabled selected>選択してください</option>
              <option value="最新資料がほしい">最新資料がほしい</option>
              <option value="顧客へ紹介したい">顧客へ紹介したい</option>
              <option value="金額感が知りたい">金額感が知りたい</option>
              <option value="販売の取扱いを希望">販売の取扱いを希望</option>
              <option value="パートナー制度について知りたい">パートナー制度について知りたい</option>
              <option value="その他（相談内容に記載）">その他（相談内容に記載）</option>
            </select>
          </div>

          <!-- 興味のあるプロダクト -->
          <div class="form-row">
            <label for="product" class="required">興味のあるプロダクト</label>
            <select id="product" name="product" required>
              <option value="" disabled selected>選択してください</option>
              <option value="クラウド受付システム「RECEPTIONIST」">クラウド受付システム「RECEPTIONIST」</option>
              <option value="日程調整ツール「調整アポ」">日程調整ツール「調整アポ」</option>
              <option value="会議室予約システム「予約ルームズ」">会議室予約システム「予約ルームズ」</option>
            </select>
          </div>

          <!-- お問い合わせ内容（任意） -->
          <div class="form-row">
            <label for="body">お問い合わせ内容（任意）</label>
            <textarea id="body" name="body" style="height: 100px;"></textarea>
          </div>

         <!-- プライバシーポリシー -->
<div class="form-group privacy-policy">
  <label for="agreement">
    <input type="checkbox" id="agreement" name="privacy_policy" required>
    <span>
      <a href="https://help.receptionist.jp/?p=402" target="_blank" rel="noopener">
        （株）RECEPTIONISTの個人情報の取り扱い
      </a> に同意します。<span style="color: red;">*</span>
    </span>
  </label>
</div>

          <!-- ハニーポット -->
          <input type="text" name="hp" tabindex="-1" autocomplete="off"
                 style="position:absolute;left:-9999px;opacity:0;height:0;width:0;">

          <!-- contact_type -->
          <input type="hidden" name="contact_type" value="document_partner">

          <!-- UTM -->
          <input type="hidden" name="utm_source" id="utm_source_input">
          <input type="hidden" name="utm_medium" id="utm_medium_input">
          <input type="hidden" name="utm_campaign" id="utm_campaign_input">
          <input type="hidden" name="utm_term" id="utm_term_input">
          <input type="hidden" name="utm_content" id="utm_content_input">

          <!-- 送信ボタン -->
          <div class="form-submit">
            <button type="submit">資料を受け取る</button>
          </div>
        </form>
      </div>
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
    if (!form.matches('form[name="documentPartner"]')) return;

    e.preventDefault();

    if (!form.checkValidity()) { form.reportValidity(); return; }

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

      console.log("[documentPartner] 送信データ", rawData);

      window.contactUtil.sendRequest({
        formName: 'documentPartner',
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
