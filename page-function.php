<?php
/* Template Name: 機能一覧 */
get_header();
?>

<main class="site-main function">

  <!-- ===== 導入テキスト ===== -->
  <div class="function__inner">
    <h1 class="function__title">機能の紹介</h1>
    <p class="function__intro">
      「クラウド受付システムRECEPTIONIST」の機能の一部になります。<br>
      機能詳細と一覧は資料に記載していますので、ご覧ください。
    </p>
  </div>

  <!-- ===== Hero ===== -->
  <section class="function function--hero">
    <div class="function__inner">
      <h2 class="function__title">機能一覧</h2>
      <p class="function__description">
        目的別に、RECEPTIONISTの主要機能を紹介します。
      </p>

      <div class="function__links">

        <a href="#func01" class="function__link">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-counter.svg" alt="来客業務の効率化" class="function__icon">
          <span class="function__label">来客業務の効率化</span>
        </a>

        <a href="#func02" class="function__link">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-security.svg" alt="セキュリティ対策" class="function__icon">
          <span class="function__label">セキュリティ対策</span>
        </a>

        <a href="#func03" class="function__link">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-counter.svg" alt="大企業向け機能" class="function__icon">
          <span class="function__label">大企業向け機能</span>
        </a>

      </div>
    </div>
  </section>

  <!-- ===== Main ===== -->
  <section class="function function--main">
    <div class="function__inner">
      <h2 class="function__title">主要機能</h2>

      <div class="function__grid">

        <div class="function__item">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/function_tool.jpg" alt="各種ツール連携" class="function__image">
          <h3 class="function__name">各種ツール連携</h3>
          <p class="function__desc">20種以上の外部サービスと連携することで、来客業務の効率化を促進します。</p>
        </div>

        <div class="function__item">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/function_name.svg" alt="担当者名検索" class="function__image">
          <h3 class="function__name">担当者名検索</h3>
          <p class="function__desc">担当者名を検索し、候補一覧から呼び出すことが可能です。</p>
        </div>

        <div class="function__item">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/function_history.svg" alt="入退館記録管理" class="function__image">
          <h3 class="function__name">入退館記録管理</h3>
          <p class="function__desc">クラウド上に来訪者の履歴が自動で記録されます。</p>
        </div>

      </div>
    </div>
  </section>

  <!-- ===== func01: 来客業務の効率化 ===== -->
  <section id="func01" class="function function--efficiency">
    <div class="function__inner">
      <h2 class="function__title">受付業務の効率化</h2>

      <div class="function__grid">

        <div class="function__card">
          <div class="function__icon">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-chat.svg" alt="ビジネスチャット連携">
          </div>
          <h3 class="function__name">ビジネスチャット連携</h3>
          <p class="function__desc">10種類以上のビジネスチャットと連携し、来客通知を行います。</p>
        </div>

        <div class="function__card">
          <div class="function__icon">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-call.svg" alt="来客の着信音(電話)通知">
          </div>
          <h3 class="function__name">来客の着信音(電話)通知</h3>
          <p class="function__desc">従業員の持つ携帯電話に電話で来客通知をします。</p>
        </div>

        <div class="function__card">
          <div class="function__icon">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-sticker.svg" alt="シール印刷">
          </div>
          <h3 class="function__name">シール印刷</h3>
          <p class="function__desc">受付時にシールプリンターからオリジナルシールを印刷できます。</p>
        </div>

        <div class="function__card">
          <div class="function__icon">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-assistant.svg" alt="アシスタント通知機能">
          </div>
          <h3 class="function__name">アシスタント通知機能</h3>
        </div>

        <div class="function__card">
          <div class="function__icon">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-schedule.svg" alt="スケジュール調整">
          </div>
          <h3 class="function__name">スケジュール調整</h3>
        </div>

        <div class="function__card">
          <div class="function__icon">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-button.svg" alt="カスタムボタン">
          </div>
          <h3 class="function__name">カスタムボタン</h3>
        </div>

        <div class="function__card">
          <div class="function__icon">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-welcome.svg" alt="ウェルカムテキスト">
          </div>
          <h3 class="function__name">ウェルカムテキスト</h3>
        </div>

        <div class="function__card">
          <div class="function__icon">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-agreement.svg" alt="入館規約の同意">
          </div>
          <h3 class="function__name">入館規約の同意</h3>
        </div>

      </div>
    </div>
  </section>

  <!-- ===== func02: セキュリティ対策 ===== -->
  <section id="func02" class="function function--security">
    <div class="function__inner">
      <h2 class="function__title">セキュリティ対策</h2>

      <div class="function__grid">

        <div class="function__card">
          <div class="function__icon">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-touchless.svg" alt="完全タッチレス受付">
          </div>
          <h3 class="function__name">完全タッチレス受付</h3>
          <p class="function__desc">QRコードをiPadにかざすだけで受付が可能です。</p>
        </div>

        <div class="function__card">
          <div class="function__icon">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-custom.svg" alt="カスタム受付設定">
          </div>
          <h3 class="function__name">カスタム受付設定</h3>
          <p class="function__desc">入館前に知りたい質問を自由に設定し、来客時に確認できます。</p>
        </div>

        <div class="function__card">
          <div class="function__icon">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-gate.svg" alt="ゲート・電子錠連携">
          </div>
          <h3 class="function__name">ゲート・電子錠連携</h3>
          <p class="function__desc">セキュリティゲート・スマートロックと連携可能です。</p>
        </div>

        <div class="function__card">
          <div class="function__icon">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-board.svg" alt="メッセージボード">
          </div>
          <h3 class="function__name">メッセージボード</h3>
        </div>

        <div class="function__card">
          <div class="function__icon">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-checkout.svg" alt="退館機能">
          </div>
          <h3 class="function__name">退館機能</h3>
        </div>

        <div class="function__card">
          <div class="function__icon">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-admin.svg" alt="複数管理者設定">
          </div>
          <h3 class="function__name">複数管理者設定</h3>
        </div>

        <div class="function__card">
          <div class="function__icon">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-iplock.svg" alt="IPアドレス制限">
          </div>
          <h3 class="function__name">IPアドレス制限</h3>
        </div>

        <div class="function__card function__card--empty"></div>
      </div>
    </div>
  </section>

  <!-- ===== func03: 大企業向け ===== -->
  <section id="func03" class="function function--enterprise">
    <div class="function__inner">
      <h2 class="function__title">200人以上の企業向け機能</h2>

      <div class="function__grid">

        <div class="function__card">
          <div class="function__icon">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-holdings.svg" alt="ホールディングス機能">
          </div>
          <h3 class="function__name">ホールディングス機能</h3>
          <p class="function__desc">1つのオフィスに複数企業が入居している場合に使う機能です。</p>
        </div>

        <div class="function__card">
          <div class="function__icon">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-ad.svg" alt="AD連携">
          </div>
          <h3 class="function__name">AD連携</h3>
          <p class="function__desc">AzureADと同期して社員の一括登録・更新・削除が可能です。</p>
        </div>

        <div class="function__card">
          <div class="function__icon">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-saml.svg" alt="SAML認証">
          </div>
          <h3 class="function__name">SAML認証</h3>
          <p class="function__desc">6種類のSAML認証方式によるログインに対応。</p>
        </div>

        <div class="function__card">
          <div class="function__icon">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-meeting.svg" alt="会議室予約・管理">
          </div>
          <h3 class="function__name">会議室予約・管理</h3>
        </div>

        <div class="function__card">
          <div class="function__icon">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-office.svg" alt="オフィス機能">
          </div>
          <h3 class="function__name">オフィス機能</h3>
        </div>

        <div class="function__card">
          <div class="function__icon">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-outlook.svg" alt="Outlookアドイン機能">
          </div>
          <h3 class="function__name">Outlookアドイン機能</h3>
        </div>

        <div class="function__card">
          <div class="function__icon">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-hierarchy.svg" alt="カスタムボタンの階層化">
          </div>
          <h3 class="function__name">カスタムボタンの階層化</h3>
        </div>

        <div class="function__card">
          <div class="function__icon">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-subdomain.png" alt="独自サブドメイン設定">
          </div>
          <h3 class="function__name">独自サブドメイン設定</h3>
        </div>

      </div>
    </div>
  </section>

  <!-- ===== CTA ===== -->
  <section class="function function--cta">
    <?php get_template_part('sections/cta'); ?>
  </section>

</main>

<?php get_footer(); ?>
