<?php
/**
 * Template Name: セミナーLP納品
 */
get_header('seminar');
?>

  <!--l-main-->
  <main class="l-main">

    <!--p-fv-->
    <section class="p-fv">
      <div class="l-inner js-in-view fade-in-up">
        <div class="p-fv__container">
          <div class="p-fv__info">
            <p class="p-fv__label"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/icn_online.svg" alt="オンライン開催" width="12.81" height="15.73">オンライン開催</p>
            <h2 class="p-fv__title">
              <img class="p-fv__title-img" src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/img_fv-title--pc.webp" alt="120分でわかる！RECEPTIONIST講演会導入前の疑問や不安をすべて解決し、導入後の定着までサポートします" width="460" height="331.75">
            </h2>
            <div class="p-fv__date">
              <div class="p-fv__date-item">
                <h4>基礎編の開催日程</h4>
                <div class="p-fv__date-item-inner">
                  <p>11/27<span>(木)</span> 14:00〜16:00</p>
                  <p>12/25<span>(木)</span> 14:00〜16:00</p>
                </div>
              </div>
              <div class="p-fv__date-item">
                <h4>応用編の開催日程</h4>
                <div class="p-fv__date-item-inner">
                  <p>12/11<span>(木)</span> 14:00〜16:00</p>
                </div>
              </div>
            </div>
          </div>
          <div class="p-fv__form u-pc">
            <div class="p-fv__form-inner">
              <form id="form">
                <div class="c-form-group-set">
                  <div class="c-form-group">
                    <label>姓<span class="required">必須</span></label>
                    <div class="c-form-input">
                      <input type="text" placeholder="山田">
                    </div>
                  </div>
                  <div class="c-form-group">
                    <label>名<span class="required">必須</span></label>
                    <div class="c-form-input">
                      <input type="text" placeholder="太郎">
                    </div>
                  </div>
                </div>
                <div class="c-form-group">
                  <label>貴社名<span class="required">必須</span></label>
                  <div class="c-form-input">
                    <input type="text" placeholder="貴社名">
                  </div>
                </div>
                <div class="c-form-group">
                  <label>メールアドレス<span class="required">必須</span></label>
                  <div class="c-form-input">
                    <input type="text" placeholder="example@company.com">
                  </div>
                </div>
                <div class="c-form-group">
                  <label>参加日時<span class="required">必須</span></label>
                  <div class="c-form-select">
                    <select>
                      <option>開催日を選択してください</option>
                    </select>
                  </div>
                </div>
                <div class="c-form-group">
                  <label>この講習会をどこで知りましたか？<span class="cap">（任意）</span></label>
                  <div class="c-form-select">
                    <select>
                      <option>選択してください</option>
                    </select>
                  </div>
                </div>
                <div class="c-form-group">
                  <label>導入目的<span class="cap">（任意）</span></label>
                  <div class="c-form-input">
                    <input type="text" placeholder="導入目的をご記入ください">
                  </div>
                </div>
                <div class="c-form-group">
                  <label>現在の課題<span class="cap">（任意）</span></label>
                  <div class="c-form-input">
                    <input type="text" placeholder="現在の課題をご記入ください">
                  </div>
                </div>
                <div class="c-form-btn-area">
                  <a href="#" class="c-button c-button-blue">
                    <span>今すぐ申し込む</span>
                    <span>基礎編はこちら</span>
                  </a>
                  <a href="#" class="c-button">
                    <span>今すぐ申し込む</span>
                    <span>応用編はこちら</span>
                  </a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--/end p-fv-->

    <!--p-about-->
    <div class="p-about">
      <div class="p-about-head">
        <div class="l-inner js-in-view fade-in-up">
          <div class="p-about-head__title-wrap">
            <h2 class="p-about-head__title">
              <img class="p-about-head__title-img u-pc" src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/img_about-title--pc.webp" alt="管理者の皆さん、受付システムを最大限活用できていますか？" width="972" height="237">
              <img class="p-about-head__title-img u-sp" src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/img_about-title--sp.webp" alt="管理者の皆さん、受付システムを最大限活用できていますか？" width="972" height="237">
            </h2>
          </div>
          <div class="p-about-case">
            <h3>ありがちなケースとして―<span class="u-pc">―</span></h3>
            <div class="p-about-case-box">
              <div class="p-about-case-item">
                <img class="p-about-case-item-img u-pc" src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/img_about-case1--pc.webp" alt="基本設定をそのままにしている…" width="321" height="148">
                <img class="p-about-case-item-img u-sp" src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/img_about-case1--sp.webp" alt="基本設定をそのままにしている…" width="321" height="148">
              </div>
              <div class="p-about-case-item">
                <img class="p-about-case-item-img u-pc" src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/img_about-case2--pc.webp" alt="管理者自身が「理解しているつもり」で止まっている" width="321" height="175">
                <img class="p-about-case-item-img u-sp" src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/img_about-case2--sp.webp" alt="管理者自身が「理解しているつもり」で止まっている" width="321" height="175">
              </div>
              <div class="p-about-case-item">
                <img class="p-about-case-item-img u-pc" src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/img_about-case3--pc.webp" alt="新機能が出ても追えていない" width="262" height="148">
                <img class="p-about-case-item-img u-sp" src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/img_about-case3--sp.webp" alt="新機能が出ても追えていない" width="262" height="148">
              </div>
            </div>
          </div>
          <div class="p-about__text-box">
            <p class="p-about__text js-in-view fade-in-up">コストだけがかかって<br class="u-sp">効果は半減してしまうこの状態。<br>
            DX化の本質は<br class="u-sp">「導入すること」ではなく<br class="u-sp">「正しく活用して定着させること」です。</p>
            <p class="p-about__text2 js-in-view fade-in-up">そのコツを、<br class="u-sp"><span>RECEPTIONIST講習会で</span><br class="u-sp">学んでみませんか？</p>
          </div>
        </div>
      </div>
      <div class="p-about-body">
        <div class="l-inner js-in-view fade-in-up">
          <h2 class="p-about-body__title">RECEPTIONIST講習会とは</h2>
          <p class="p-about-body__text">RECEPTIONISTの導入直後に必要な準備から、<br class="u-pc">活用を広げるためのノウハウまでを120分で学べる講習会です。<br>
            導入前の不安を解消し、導入後に定着させるためのポイントを凝縮してお伝えします。</p>
          <div class="p-about__case_title js-in-view fade-in-up">
            <img class="p-about__case_title-img u-pc" src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/img_about__case_title--pc.webp" alt="この120分の講義を受けるだけで…" width="642" height="87">
            <img class="p-about__case_title-img u-sp" src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/img_about__case_title--sp.webp" alt="この120分の講義を受けるだけで…" width="642" height="87">
          </div>
          <div class="p-about__case js-in-view fade-in-up">
            <div class="p-about__case-item js-in-view fade-in-up">
              <figure><img class="p-about__case-img" src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/img_about__case1--pc.webp" alt="導入準備でつまづかない！" width="262" height="184"></figure>
              <h3>導入準備でつまづかない！</h3>
              <p>導入手順や設定のポイントをわかりやすく解説。スムーズに導入を進めるためのコツを習得できます。</p>
            </div>
            <div class="p-about__case-item js-in-view fade-in-up">
              <figure><img class="p-about__case-img" src="<?php echo get_template_directory_uri(); ?>//assets/img/seminar/img_about__case2--pc.webp" alt="導入後の利用定着につながる！" width="262" height="184"></figure>
              <h3>導入後の利用定着につながる！</h3>
              <p>社内での活用を広げるための実践的なノウハウを共有。利用促進や社内展開のコツがつかめます。</p>
            </div>
            <div class="p-about__case-item js-in-view fade-in-up">
              <figure><img class="p-about__case-img" src="<?php echo get_template_directory_uri(); ?>//assets/img/seminar/img_about__case3--pc.webp" alt="新機能を理解し即活用！" width="262" height="184"></figure>
              <h3>新機能を理解し即活用！</h3>
              <p>RECEPTIONISTの最新機能やアップデート内容をわかりやすく解説します。</p>
            </div>
          </div>
          <div class="p-about__text3 js-in-view fade-in-up">
            <h3><span class="line"><span class="blue">「導入準備」</span>も<span class="blue">「活用」</span>も、</span><span class="line">不安なく始められます。</span></h3>
            <p>受講スタイルは、無料参加・顔出し不要・ハンズオン形式での操作を<br class="u-sp">学んでいただけます。<br>
              参加のハードルはありません。<br class="u-sp">ぜひお気軽にご参加ください。</p>
          </div>
          <div class="p-cta js-in-view fade-in-up">
            <a href="#" class="c-button c-button-l c-button-blue">
              <span>今すぐ申し込む</span>
              <span>基礎編はこちら</span>
            </a>
            <a href="#" class="c-button c-button-l">
              <span>今すぐ申し込む</span>
              <span>応用編はこちら</span>
            </a>
          </div>
        </div>
      </div>
    </div>
    <!--/end p-about-->

    <!--p-curriculum-->
    <section class="p-curriculum" id="curriculum">
      <div class="l-inner">
        <div class="c-section-head js-in-view fade-in-up">
          <hgroup class="c-section-head__title-wrap">
            <p class="c-section-head__sub"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/icn_section_head.svg" alt=""> Curriculum</p>
            <h2 class="c-section-head__title">カリキュラム</h2>
            <p class="c-section-head__text">ご利用中のプランに合わせた、<br class="u-sp">最適なカリキュラムをご用意しております。</p>
          </hgroup>
        </div>
        <div class="p-curriculum__container js-in-view fade-in-up">
          <div class="p-curriculum__card">
            <div class="p-curriculum__card-img">
              <h3><img src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/img_curriculum-title1--pc.webp" alt="基礎編"></h3>
            </div>
            <div class="p-curriculum__card-body">
              <div class="p-curriculum-list">
                <h3 class="p-curriculum__card-title"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/icn_check.svg" alt="">はじめに</h3>
                <ul>
                  <li>来客フローについて</li>
                  <li>アポイントメントの種類</li>
                  <li>WEB管理画面ログイン</li>
                  <li>WEB管理画面メニュー</li>
                </ul>
                <h3 class="p-curriculum__card-title"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/icn_check.svg" alt="">社員情報（利用者登録）</h3>
                <ul>
                  <li>社員登録の全体フロー</li>
                  <li>社員登録と利用登録の違い</li>
                  <li>利用登録したら何ができるのか</li>
                  <li>各社員の利用登録状況チェック</li>
                  <li>外部連携とは</li>
                  <li>外部連携の方法</li>
                  <li>外部連携状況チェック</li>
                  <li>CSV一括で更新する方法</li>
                </ul>
                <h3 class="p-curriculum__card-title"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/icn_check.svg" alt="">チャット設定</h3>
                <ul>
                  <li>各種チャットツール</li>
                  <li>【実践】メール通知設定</li>
                </ul>
                <h3 class="p-curriculum__card-title"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/icn_check.svg" alt="">来訪者設定</h3>
                <ul>
                  <li>来訪者設定画面について</li>
                  <li>来訪者種別とは</li>
                  <li>受付完了時の画像表示について</li>
                </ul>
                <h3 class="p-curriculum__card-title"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/icn_check.svg" alt="">受付アプリ設定</h3>
                <ul>
                  <li>受付アプリ設定画面</li>
                  <li>デバイス情報の設定</li>
                  <li>受付モードの種類</li>
                  <li>画面表示設定</li>
                  <li>各種ボタン設定</li>
                  <li>カスタムボタン設定</li>
                </ul>
                <h3 class="p-curriculum__card-title"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/icn_check.svg" alt="">iPad設定</h3>
                <h3 class="p-curriculum__card-title"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/icn_check.svg" alt="">権限設定</h3>
                <ul>
                  <li>権限設定画面について</li>
                  <li>ユーザー権限について</li>
                  <li>主管理者を変更する方法</li>
                  <li>経理担当者を付与する方法</li>
                  <li>アポイントメントの権限設定</li>
                  <li>来訪者記録の権限設定</li>
                </ul>
                <h3 class="p-curriculum__card-title"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/icn_check.svg" alt="">プランアップ</h3>
                <ul>
                  <li>エンタープライズ・プレミアムプランでできること</li>
                </ul>
              </div>
              <div class="p-curriculum-btn">
                <a href="#" class="c-button c-button-m c-button-blue">
                  <span>今すぐ申し込む</span>
                  <span>基礎編はこちら</span>
                </a>
              </div>
            </div>
          </div>
          <div class="p-curriculum__card">
            <div class="p-curriculum__card-img">
              <h3><img src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/img_curriculum-title2--pc.webp" alt="応用編"></h3>
            </div>
            <div class="p-curriculum__card-body">
              <div class="p-curriculum-list">
                <h3 class="p-curriculum__card-title"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/icn_check.svg" alt="">はじめに</h3>
                <ul>
                  <li>来客フローについて</li>
                  <li>アポイントメントの種類</li>
                  <li>【実践】WEB管理画面ログイン</li>
                </ul>
                <h3 class="p-curriculum__card-title"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/icn_check.svg" alt="">チャット設定</h3>
                <ul>
                  <li>各種チャットツール</li>
                </ul>
                <h3 class="p-curriculum__card-title"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/icn_check.svg" alt="">受付アプリ設定</h3>
                <ul>
                  <li>オフィス機能</li>
                  <li>ホールディングス機能</li>
                  <li>受付アプリ設定画面</li>
                  <li>デバイス情報の設定</li>
                  <li>受付モードの種類</li>
                  <li>画面表示設定</li>
                  <li>各種ボタン設定</li>
                </ul>
                <h3 class="p-curriculum__card-title"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/icn_check.svg" alt="">権限設定</h3>
                <ul>
                  <li>権限設定画面について</li>
                  <li>ユーザー権限について</li>
                  <li>【実践】受付担当者の付与</li>
                  <li>ブラウザプッシュ通知について</li>
                  <li>ユーザー権限の削除方法</li>
                  <li>アポイントメントの権限設定</li>
                  <li>来訪者記録の権限設定</li>
                </ul>
                <h3 class="p-curriculum__card-title"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/icn_check.svg" alt="">来訪者設定</h3>
                <ul>
                  <li>来訪者設定画面について</li>
                  <li>来訪者向けメール設定について</li>
                  <li>来訪者種別とは</li>
                  <li>カスタム設定とは</li>
                  <li>【実践】アポ作成時カスタム設定</li>
                  <li>【実践】受付時カスタム設定</li>
                  <li>受付完了時の画像について</li>
                  <li>【実践】受付完了時の画像</li>
                </ul>
              </div>
              <div class="p-curriculum-btn">
                <a href="#" class="c-button c-button-m">
                  <span>今すぐ申し込む</span>
                  <span>応用編はこちら</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--/end p-curriculum-->

    <!--p-event-->
    <section class="p-event" id="event">
      <div class="l-inner">
        <div class="c-section-head js-in-view fade-in-up">
          <hgroup class="c-section-head__title-wrap">
            <p class="c-section-head__sub"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/icn_section_head.svg" alt="Event Overview"> Event Overview</p>
            <h2 class="c-section-head__title">講習会概要</h2>
          </hgroup>
        </div>
        <div class="p-event__container js-in-view fade-in-up">
          <div class="p-event__contents">
            <div class="p-event__step">
              <div class="p-event__step-num">
                <h3 class="p-event__step-num-text"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/icn_user.svg" alt="参加対象">参加対象</h3>
              </div>
              <div class="p-event__step-body">
                <p class="p-event__step-text">基礎編：トライアルご契約中の方、スタンダードプランご契約中の方<br>
                  応用編：すでにご利用中で運用を開始している方</p>
              </div>
            </div>
            <div class="p-event__step">
              <div class="p-event__step-num">
                <h3 class="p-event__step-num-text"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/seminar/icn_question.svg" alt="注意事項">注意事項</h3>
              </div>
              <div class="p-event__step-body">
                <p class="p-event__step-text">本イベントは同業他社や対象者以外のお申込みについては、お断りさせていただく場合がございます。<br>
                  また、録画や静止画像の拡散はお断りしております。なお、本イベントは<b>事前準備</b>が必要になります。<br>
                  詳細は申込後に送られるご案内メールをご参照ください。</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--/end p-event-->

    <!--p-support-->
    <section class="p-support" id="support">
      <div class="p-support-head js-in-view fade-in-up">
        <h2 class="p-support__title">RECEPTIONIST講習会で<br class="u-sp">導入前の不安から<br class="u-sp">導入後の定着までサポート！<br>
          少しでも設定に不安がある時は<br class="u-sp">ぜひご参加ください！</h2>
        <p class="p-support__text">基本設定の流れや運用のコツを実際の画面で解説。<br class="u-pc">
          初めての方でもスムーズに導入でき、社内への定着まで安心して進められます。</p>
      </div>
      <div class="l-inner u-pc">
        <div class="p-cta js-in-view fade-in-up">
          <a href="#" class="c-button c-button-blue c-button-l">
            <span>今すぐ申し込む</span>
            <span>基礎編はこちら</span>
          </a>
          <a href="#" class="c-button c-button-l">
            <span>今すぐ申し込む</span>
            <span>応用編はこちら</span>
          </a>
        </div>
      </div>
      <div class="p-fv__form u-sp">
        <div class="p-fv__form-inner">
          <form id="forms">
            <div class="c-form-group-set">
              <div class="c-form-group">
                <label>姓<span class="required">必須</span></label>
                <div class="c-form-input">
                  <input type="text" placeholder="山田">
                </div>
              </div>
              <div class="c-form-group">
                <label>名<span class="required">必須</span></label>
                <div class="c-form-input">
                  <input type="text" placeholder="太郎">
                </div>
              </div>
            </div>
            <div class="c-form-group">
              <label>貴社名<span class="required">必須</span></label>
              <div class="c-form-input">
                <input type="text" placeholder="貴社名">
              </div>
            </div>
            <div class="c-form-group">
              <label>メールアドレス<span class="required">必須</span></label>
              <div class="c-form-input">
                <input type="text" placeholder="example@company.com">
              </div>
            </div>
            <div class="c-form-group">
              <label>参加日時<span class="required">必須</span></label>
              <div class="c-form-select">
                <select>
                  <option>開催日を選択してください</option>
                </select>
              </div>
            </div>
            <div class="c-form-group">
              <label>この講習会をどこで知りましたか？<span class="cap">（任意）</span></label>
              <div class="c-form-select">
                <select>
                  <option>選択してください</option>
                </select>
              </div>
            </div>
            <div class="c-form-group">
              <label>導入目的<span class="cap">（任意）</span></label>
              <div class="c-form-input">
                <input type="text" placeholder="導入目的をご記入ください">
              </div>
            </div>
            <div class="c-form-group">
              <label>現在の課題<span class="cap">（任意）</span></label>
              <div class="c-form-input">
                <input type="text" placeholder="現在の課題をご記入ください">
              </div>
            </div>
            <div class="c-form-btn-area">
              <a href="#" class="c-button c-button-blue">
                <span>今すぐ申し込む</span>
                <span>基礎編はこちら</span>
              </a>
              <a href="#" class="c-button">
                <span>今すぐ申し込む</span>
                <span>応用編はこちら</span>
              </a>
            </div>
          </form>
        </div>
      </div>
    </section>
    <!--/end p-support-->

	</main>
  <!--l-main-->

  <?php get_footer(); ?>
