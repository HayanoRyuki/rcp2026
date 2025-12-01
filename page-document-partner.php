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

  <!-- ★ 追加：タイトル + リード文 -->
  <div class="doc-intro">
    <h2 class="doc-intro-title">パートナー資料ダウンロードページ</h2>
    <p class="doc-intro-text">
      本フォーム入力後、メールアドレス宛に自動返信メールに、資料を送付させて頂きます。
    </p>
  </div>

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

        <!-- ★ Lambda 送信用の統一クラスを追加 -->
        <form
          name="documentPartner"
          class="contact-document-partner-form js-rcp-contact-form"
        >

          <div class="form-row">
            <label for="company_name" class="required">会社名</label>
            <input type="text" id="company_name" name="company_name" required>
          </div>

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

          <div class="form-row">
            <label for="email" class="required">メールアドレス</label>
            <input type="email" id="email" name="email" required>
          </div>

          <div class="form-row">
            <label for="phone_no" class="required">電話番号</label>
            <input type="tel" id="phone_no" name="phone_no" required>
          </div>

          <div class="form-row">
            <label for="prefecture" class="required">都道府県</label>
            <select id="prefecture" name="prefecture" required>
              <option value="" disabled selected>選択してください</option>
              <?php
              $prefs = [
                "北海道","青森県","岩手県","宮城県","秋田県","山形県","福島県",
                "茨城県","栃木県","群馬県","埼玉県","千葉県","東京都","神奈川県",
                "新潟県","富山県","石川県","福井県","山梨県","長野県","岐阜県",
                "静岡県","愛知県","三重県","滋賀県","京都府","大阪府","兵庫県",
                "奈良県","和歌山県","鳥取県","島根県","岡山県","広島県","山口県",
                "徳島県","香川県","愛媛県","高知県","福岡県","佐賀県","長崎県",
                "熊本県","大分県","宮崎県","鹿児島県","沖縄県"
              ];
              foreach ($prefs as $pref) {
                echo "<option value='{$pref}'>{$pref}</option>";
              }
              ?>
            </select>
          </div>

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

          <div class="form-row">
            <label for="product" class="required">興味のあるプロダクト</label>
            <select id="product" name="product" required>
              <option value="" disabled selected>選択してください</option>
              <option value="クラウド受付システム「RECEPTIONIST」">クラウド受付システム「RECEPTIONIST」</option>
              <option value="日程調整ツール「調整アポ」">日程調整ツール「調整アポ」</option>
              <option value="会議室予約システム「予約ルームズ」">会議室予約システム「予約ルームズ」</option>
            </select>
          </div>

          <div class="form-row">
            <label for="body">お問い合わせ内容（任意）</label>
            <textarea id="body" name="body" style="height: 100px;"></textarea>
          </div>

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
          <input type="hidden" name="contact_type" value="partner_guide">

          <!-- UTM hidden -->
          <input type="hidden" name="utm_source" id="utm_source_input">
          <input type="hidden" name="utm_medium" id="utm_medium_input">
          <input type="hidden" name="utm_campaign" id="utm_campaign_input">
          <input type="hidden" name="utm_term" id="utm_term_input">
          <input type="hidden" name="utm_content" id="utm_content_input">

          <div class="form-submit">
            <button type="submit">資料を受け取る</button>
          </div>

        </form>
      </div>

    </div>
  </section>
</main>

<?php get_footer(); ?>
