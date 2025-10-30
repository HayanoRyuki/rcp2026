<section class="voice-section">
  <div class="inner">
    <h2 class="section-title">導入企業の声</h2>
    <div class="voice-grid">

      <?php
      $voices = [
        [
          'title' => '脱・固定電話の実現！無人受付化も',
          'before' => [
            '来客からの電話が鳴り響いて集中力が下がっていた',
            '来客取次の度に仕事が中断されていた'
          ],
          'after' => [
            '固定電話を撤廃でき音に気を取られることがなくなった',
            '来客取次がほぼ0になり業務に集中できるようになった'
          ],
    'image' => 'johnmaster_image.webp',
    'logo'  => 'johnmaster_logo.webp',
          'name' => 'john masters organics',
          'info' => '事業：化粧品販売事業<br>従業員数：358名'
        ],
        [
          'title' => '受付係を2名から1名に省力化',
          'before' => [
            '受付係2名体制で受付業務を行っていた',
            '取次に加え、会議室の案内も受付スタッフが担っていた'
          ],
          'after' => [
            '受付係1名×システムのハイブリッド型の受付を実現',
            '約30件/日の来客うち9割の対応時間を削減'
          ],
    'image' => 'globeship_image.webp',
    'logo'  => 'globeship_logo.webp',
          'name' => 'GLOBESHIP',
          'info' => '事業：ファシリティマネジメント<br>従業員数：約19,000名'
        ],
        [
          'title' => 'フリーアドレスの弊害をシステムで撤廃',
          'before' => [
            '受付業務がフリーアドレス推進の弊害になると予想',
            '飛び込み営業や担当者不明の取次に時間を取られた'
          ],
          'after' => [
            '各自が来客対応できるようになりフリーアドレス浸透',
            '1日数時間かけていた来客取次がほぼ0になった'
          ],
    'image' => 'matsukiyo_image.webp',
    'logo'  => 'matsukiyo_logo.webp',
          'name' => 'Matsukiyo Cocokara & Co.',
          'info' => '事業：ドラッグストアなど<br>グループの管理・統括<br>従業員数：13,321名'
        ],
        [
          'title' => '900時間・100万円以上/年のコスト削減に',
          'before' => [
            '約100件/日の取次や記録管理に時間がかかっていた',
            '入館証が見えず受付済みのお客様か判別できなかった'
          ],
          'after' => [
            '取次や記録管理がなくなり、時間もコストも削減できた',
            '来客者情報の見える化でセキュリティ強化につながった'
          ],
    'image' => 'orion_image.webp',
    'logo'  => 'orion_logo.webp',
          'name' => 'Orion',
          'info' => '事業：ビール類製造販売 etc<br>従業員数：132名（名護）'
        ]
      ];

      foreach ($voices as $voice) :
      ?>
        <div class="voice-card">
          <div class="voice-content">
            <h3 class="voice-title"><?php echo $voice['title']; ?></h3>
            <div class="voice-box before">
              <strong>BEFORE</strong>
              <ul>
                <?php foreach ($voice['before'] as $item) : ?>
                  <li>✖ <?php echo $item; ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
            <div class="voice-box after">
              <strong>AFTER</strong>
              <ul>
                <?php foreach ($voice['after'] as $item) : ?>
                  <li>✔ <?php echo $item; ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
          <div class="voice-side">
  <img class="face-photo" src="<?php echo get_template_directory_uri(); ?>/assets/img/voice/<?php echo $voice['image']; ?>" alt="顔写真">
  <img class="company-logo" src="<?php echo get_template_directory_uri(); ?>/assets/img/voice/<?php echo $voice['logo']; ?>" alt="ロゴ画像">
  <div class="voice-company">
    <p class="company-name"><?php echo $voice['name']; ?></p>
    <p class="company-info"><?php echo $voice['info']; ?></p>
  </div>
</div>
        </div>
      <?php endforeach; ?>

    </div>
  </div>
</section>
