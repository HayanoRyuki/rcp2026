<div class="top">
  <div class="hero page-title wrapper">
    <div class="hero-body">
      
      <!-- 左カラム -->
<div class="container_l adView">

  <div class="hero-title-box">
    <h1>
      <img class="hero-title-img"
           src="<?php echo get_template_directory_uri(); ?>/assets/img/hero/RECEPTIONIST_LP_h1_4million_trans.png"
           alt="年間400万人が利用・導入法人No.1 クラウド受付システム">
    </h1>
  </div>

  <div class="hero-user-image"></div>

  <p class="hero-note">※1 2025年RECEPTIONIST年間受付利用者数実績</p>
  <p class="hero-note">※2 クラウドiPad無人受付システム市場の実態と将来展望（ミックITリポート 2025年11月）<br>
  （デロイト トーマツ ミック経済研究所株式会社 調べ）</p>

</div><!-- /.container_l -->

      <!-- 右カラム（フォーム） -->
      <div class="container_r">

        <!-- ★★ ここに統一クラス js-rcp-contact-form を追加 ★★ -->
        <form name="reception-lp"
              class="form-track download-form js-rcp-contact-form"
              action=""
              method="post"
              data-event="request_materials"
              data-form-id="reception-lp">

          <div class="document-guidance-box">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/hero/doc-download.svg" alt="資料アイコン" width="20" height="20">
            <span class="document-guidance-text">3分でわかる「資料」はコチラ</span>
          </div>

          <div class="kv-form-wrap">

            <!-- 会社名 -->
            <div class="kv-form-group has-floating-label">
              <label class="floating-label">会社名<span class="asterisk">*</span></label>
              <input type="text" name="company_name" placeholder="御社名" required>
            </div>

            <!-- 部署 -->
            <div class="kv-form-group has-floating-label">
              <label class="floating-label">部署<span class="asterisk">*</span></label>
              <select name="department_select" required>
                <option value="" selected disabled>クリックして選択してください</option>
                <option value="総務">総務</option>
                <option value="経営">経営</option>
                <option value="情報システム">情報システム</option>
                <option value="人事">人事</option>
                <option value="経理">経理</option>
                <option value="営業">営業</option>
                <option value="マーケティング">マーケティング</option>
                <option value="広報・PR">広報・PR</option>
                <option value="その他">その他</option>
              </select>
            </div>

            <!-- 氏名 -->
            <div class="kv-form-group has-floating-label">
              <label class="floating-label">ご担当者のお名前<span class="asterisk">*</span></label>
              <div style="display: flex; gap: 8px;">
                <input type="text" name="last_name" placeholder="姓" required style="flex: 1;">
                <input type="text" name="first_name" placeholder="名" required style="flex: 1;">
              </div>
            </div>

            <!-- 電話番号 -->
            <div class="kv-form-group has-floating-label">
              <label class="floating-label">お電話番号<span class="asterisk">*</span></label>
              <input type="tel" name="phone_no" placeholder="01-2345-6789" required>
            </div>

            <!-- メール -->
            <div class="kv-form-group has-floating-label">
              <label class="floating-label">メールアドレス<span class="asterisk">*</span></label>
              <input type="email" name="email" placeholder="sample@receptionist.co.jp" required>
            </div>

            <!-- 従業員数 -->
<div class="kv-form-group has-floating-label">
  <label class="floating-label">従業員数<span class="asterisk">*</span></label>
  <select name="employee_number" required>
    <option value="" selected disabled>クリックして選択してください</option>
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

            <!-- 導入予定時期 -->
            <div class="kv-form-group has-floating-label">
              <label class="floating-label">導入予定時期<span class="asterisk">*</span></label>
              <select name="implementation_time" required>
                <option value="">クリックして選択してください</option>
                <option value="なるべく早く">なるべく早く</option>
                <option value="3ヶ月以内">3ヶ月以内</option>
                <option value="6ヶ月以内">6ヶ月以内</option>
                <option value="1年以内">1年以内</option>
                <option value="未定">未定</option>
              </select>
            </div>

            <!-- 同意 -->
            <div class="kv-form-agree">
              <input type="checkbox" id="agreement" name="privacy_policy" value="1" required>
              <label for="agreement">
                <a href="https://help.receptionist.jp/?p=402#gsc.tab=0" target="_blank" rel="noopener">
                  （株）RECEPTIONISTの個人情報の取り扱い
                </a>に同意します。
              </label>
            </div>

            <!-- ハニーポット -->
            <input type="text" name="hp" tabindex="-1" autocomplete="off"
                   style="position:absolute;left:-9999px;opacity:0;height:0;width:0;">

            <!-- 種別 -->
            <input type="hidden" name="contact_type" value="reception_lp">

            <!-- UTM -->
            <input type="hidden" name="utm_source" id="utm_source_input">
            <input type="hidden" name="utm_medium" id="utm_medium_input">
            <input type="hidden" name="utm_campaign" id="utm_campaign_input">
            <input type="hidden" name="utm_term" id="utm_term_input">
            <input type="hidden" name="utm_content" id="utm_content_input">

            <input type="submit" value="資料をダウンロード" class="btn btn_dl">

          </div><!-- /.kv-form-wrap -->
        </form>
      </div><!-- /.container_r -->

    </div><!-- /.hero-body -->
  </div><!-- /.hero.page-title.wrapper -->
</div><!-- /.top -->
