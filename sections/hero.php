<div class="top">
  <div class="hero page-title wrapper">
    <div class="hero-body">

      <!-- =========================
           左カラム：コピー＋KV画像
      ========================== -->
      <div class="container_l adView">

        <div class="hero-title-box">

          <h1 class="hero-title">
            <span class="hero-title-mark">
              もっと<span class="em">ラク</span>で<span class="hero-title-nomark">、</span>
            </span><br>
            <span class="hero-title-mark">シンプルな受付へ</span>
          </h1>

          <div class="hero-badge">
            <span class="badge-main">シェア<br>No.1</span>
            <span class="badge-note">※</span>
          </div>

          <ul class="hero-benefits">
            <li>内線電話の取次から解放</li>
            <li>離席中でも来客にすぐ気付ける</li>
            <li>誰でも使いやすい画面設計</li>
          </ul>

        </div><!-- /.hero-title-box -->

        <!-- KV画像 -->
        <div class="hero-user-image"></div>

        <!-- =========================
             シェアNo.1 根拠注記（PC/タブレット用：KV画像に重ねる）
        ========================== -->
        <div class="hero-share-note hero-share-note--overlay">
          ※『クラウドiPad無人受付システム市場の実態と将来展望』（ミックITリポート 2025年11月）<br>
          （デロイト トーマツ ミック経済研究所株式会社 調べ）
        </div>

      </div><!-- /.container_l -->

      <!-- =========================
           右カラム：フォーム（PC用）
      ========================== -->
      <div class="container_r">

        <form name="reception-lp"
              class="form-track download-form js-rcp-contact-form"
              action=""
              method="post"
              data-event="request_materials"
              data-form-id="reception-lp">

          <div class="document-guidance-box">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/hero/doc-download.svg"
                 alt="資料アイコン" width="20" height="20">
            <span class="document-guidance-text">3分でわかる「資料」はコチラ</span>
          </div>

          <div class="kv-form-wrap">

            <div class="kv-form-group has-floating-label">
              <label class="floating-label">
                会社名<span class="asterisk">*</span>
              </label>
              <input type="text" name="company_name" placeholder="御社名" required>
            </div>

            <div class="kv-form-group has-floating-label">
              <label class="floating-label">
                部署<span class="asterisk">*</span>
              </label>
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

            <div class="kv-form-group has-floating-label">
              <label class="floating-label">
                ご担当者のお名前<span class="asterisk">*</span>
              </label>
              <div style="display:flex; gap:8px;">
                <input type="text" name="last_name" placeholder="姓" required style="flex:1;">
                <input type="text" name="first_name" placeholder="名" required style="flex:1;">
              </div>
            </div>

            <div class="kv-form-group has-floating-label">
              <label class="floating-label">
                お電話番号<span class="asterisk">*</span>
              </label>
              <input type="tel" name="phone_no" placeholder="01-2345-6789" required>
            </div>

            <div class="kv-form-group has-floating-label">
              <label class="floating-label">
                メールアドレス<span class="asterisk">*</span>
              </label>
              <input type="email" name="email" placeholder="sample@receptionist.co.jp" required>
            </div>

            <div class="kv-form-group has-floating-label">
              <label class="floating-label">
                従業員数<span class="asterisk">*</span>
              </label>
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

            <div class="kv-form-group has-floating-label">
              <label class="floating-label">
                導入予定時期<span class="asterisk">*</span>
              </label>
              <select name="implementation_time" required>
                <option value="">クリックして選択してください</option>
                <option value="なるべく早く">なるべく早く</option>
                <option value="3ヶ月以内">3ヶ月以内</option>
                <option value="6ヶ月以内">6ヶ月以内</option>
                <option value="1年以内">1年以内</option>
                <option value="未定">未定</option>
              </select>
            </div>

            <div class="kv-form-agree">
              <input type="checkbox" id="agreement" name="privacy_policy" value="1" required>
              <label for="agreement">
                <a href="https://help.receptionist.jp/?p=402#gsc.tab=0"
                   target="_blank" rel="noopener">
                  （株）RECEPTIONISTの個人情報の取り扱い
                </a>
                に同意します。
              </label>
            </div>

            <input type="text" name="hp" tabindex="-1" autocomplete="off"
                   style="position:absolute;left:-9999px;opacity:0;height:0;width:0;">

            <input type="hidden" name="contact_type" value="reception_lp">

            <input type="hidden" name="utm_source" id="utm_source_input">
            <input type="hidden" name="utm_medium" id="utm_medium_input">
            <input type="hidden" name="utm_campaign" id="utm_campaign_input">
            <input type="hidden" name="utm_term" id="utm_term_input">
            <input type="hidden" name="utm_content" id="utm_content_input">

            <input type="submit" value="資料をダウンロード" class="btn btn_dl">

          </div><!-- /.kv-form-wrap -->
        </form>

      </div><!-- /.container_r -->

      <!-- =========================
           SP専用 資料請求CTA
      ========================== -->
      <div class="hero-sp-cta-wrap">
        <a href="/resources/document-general/" class="hero-sp-cta">
          <span class="hero-sp-cta-icon">⬇</span>
          資料をもらう
        </a>
      </div>

      <!-- =========================
           シェアNo.1 根拠注記（SP用：CTAの後）
      ========================== -->
      <div class="hero-share-note hero-share-note--sp">
        ※『クラウドiPad無人受付システム市場の実態と将来展望』（ミックITリポート 2025年11月）<br>
        （デロイト トーマツ ミック経済研究所株式会社 調べ）
      </div>

    </div><!-- /.hero-body -->
  </div><!-- /.hero.page-title.wrapper -->
</div><!-- /.top -->