<?php
/**
 * Partner tabs & filter section
 * 要件:
 * - BEM命名
 * - Tailwind不使用
 * - セールス/アライアンスのタブ切替
 * - タグフィルタ（表示/非表示）
 * - RAP→RSP→その他 の優先度ソート
 * - 画像/バッジはテーマ内 assets/img/partner/ 配下を想定
 */

// 必要CSS/JSを読み込み
wp_enqueue_style(
  'rcp-partnerlist',
  get_template_directory_uri() . '/assets/css/sections/rcp-partnerlist.css',
  [],
  filemtime(get_theme_file_path('/assets/css/sections/rcp-partnerlist.css'))
);
wp_enqueue_script(
  'rcp-partnerlist',
  get_template_directory_uri() . '/assets/js/rcp-partnerlist.js',
  [],
  filemtime(get_theme_file_path('/assets/js/rcp-partnerlist.js')),
  true
);

// タブ構成とカテゴリースラッグの対応
$partner_sections = [
  'sales-partner' => [
    'title' => 'セールスパートナー',
    'lead'  => 'RECEPTIONISTシリーズを安心して販売・紹介いただけるパートナー',
    // partner-category のスラッグ
    'slugs' => ['salespartner-rap', 'salespartner-rsp', 'salespartner'],
    // カテゴリー毎のバッジ画像(任意)
    'badges' => [
      'salespartner-rap' => 'partner_badge01_s.png', // RAP
      'salespartner-rsp' => 'partner_badge02_s.png', // RSP
    ],
  ],
  'alliance-partner' => [
    'title' => 'アライアンスパートナー',
    'lead'  => 'RECEPTIONISTシリーズとサービス連携や業務提携をしているパートナー',
    'slugs' => ['alliancepartner'],
    'badges' => [
      'alliancepartner' => 'partner_badge02_s.png',
    ],
  ],
];

// 画面上に出すフィルタ（partner-tag の表示名と完全一致で判定）
$filter_labels = ['すべて','ICT機器販売','オフィス設計・デザイン','入退・ゲート連携','導入設計・SI構築支援','流通'];
?>

<section class="rcp-partnerlist" aria-labelledby="rcp-partnerlist-title">
  <div class="rcp-partnerlist__inner">

    <!-- 見出し -->
    <div class="rcp-partnerlist__head">
      <h2 id="rcp-partnerlist-title" class="rcp-partnerlist__title">RECEPTIONISTパートナー一覧</h2>
      <p class="rcp-partnerlist__lead">RECEPTIONISTの各種連携サービスを提供するパートナーをご紹介します</p>
    </div>

    <!-- タブ -->
    <div class="rcp-partnerlist__tabwrap" role="tablist" aria-label="パートナー種別タブ">
      <div class="rcp-partnerlist__tabs">
        <button type="button"
                class="rcp-partnerlist__tab is-active"
                role="tab"
                aria-selected="true"
                aria-controls="panel-sales-partner"
                data-target="sales-partner">セールス<br class="sp">パートナー</button>
        <button type="button"
                class="rcp-partnerlist__tab"
                role="tab"
                aria-selected="false"
                aria-controls="panel-alliance-partner"
                data-target="alliance-partner">アライアンス<br class="sp">パートナー</button>
      </div>
    </div>

    <!-- フィルタ -->
    <div class="rcp-partnerlist__filterwrap" aria-label="パートナーフィルタ">
      <div class="rcp-partnerlist__filter">
        <?php foreach ($filter_labels as $i => $label): ?>
          <button type="button"
                  class="rcp-partnerlist__filterbtn<?php echo $i===0 ? ' is-active' : ''; ?>"
                  data-filter="<?php echo esc_attr($label); ?>">
            <?php echo esc_html($label); ?>
          </button>
        <?php endforeach; ?>
      </div>
    </div>

    <?php foreach ($partner_sections as $id => $section): ?>
      <?php
      // 投稿取得
      $query = new WP_Query([
        'post_type'      => 'partner',
        'posts_per_page' => -1,
        'orderby'        => 'date',
        'order'          => 'DESC',
        'tax_query'      => [[
          'taxonomy' => 'partner-category',
          'field'    => 'slug',
          'terms'    => $section['slugs'],
        ]],
      ]);
      ?>

      <div id="panel-<?php echo esc_attr($id); ?>"
           class="rcp-partnerlist__section<?php echo $id==='sales-partner' ? ' is-active' : ''; ?>"
           role="tabpanel"
           aria-labelledby=""
           data-panel="<?php echo esc_attr($id); ?>">

        <div class="rcp-partnerlist__block">
          <h3 class="rcp-partnerlist__block-title"><?php echo esc_html($section['title']); ?></h3>
          <p class="rcp-partnerlist__block-lead"><?php echo esc_html($section['lead']); ?></p>

          <div class="rcp-partnerlist__block-contents">
            <?php if ($query->have_posts()): ?>
              <?php
              $posts = [];
              while ($query->have_posts()): $query->the_post();

                // タグ（表示名をカンマ連結して data-tags に入れる）
                $tags = get_the_terms(get_the_ID(), 'partner-tag');
                $tag_names = ($tags && !is_wp_error($tags)) ? wp_list_pluck($tags, 'name') : [];
                $tag_names_str = implode(',', $tag_names);

                // カテゴリーからバッジ判定
                $badge = '';
                $cats = get_the_terms(get_the_ID(), 'partner-category');
                if ($cats && !is_wp_error($cats)) {
                  foreach ($cats as $cat) {
                    if (isset($section['badges'][$cat->slug])) {
                      $badge = $section['badges'][$cat->slug];
                      break;
                    }
                  }
                }

                // 優先度（RAP→RSP→その他）
                $priority = 2;
                if ($badge) {
                  if (strpos($badge, 'badge01') !== false) $priority = 0;
                  elseif (strpos($badge, 'badge02') !== false) $priority = 1;
                }

                $posts[] = [
                  'ID'        => get_the_ID(),
                  'title'     => get_the_title(),
                  'excerpt'   => get_the_excerpt(),
                  'url'       => get_post_meta(get_the_ID(), 'partner_url', true),
                  'thumb'     => get_the_post_thumbnail(get_the_ID(), 'medium'),
                  'tag_names' => $tag_names,
                  'badge'     => $badge,
                  'priority'  => $priority,
                ];
              endwhile;
              wp_reset_postdata();

              // PHP側でも優先度ソート（JS側でも再保証）
              usort($posts, fn($a,$b) => $a['priority'] <=> $b['priority']);
              ?>

              <div class="rcp-partnerlist__list">
                <?php foreach ($posts as $p): ?>
                  <article class="rcp-partnerlist__item"
                           data-tags="<?php echo esc_attr(implode(',', $p['tag_names'])); ?>"
                           data-priority="<?php echo esc_attr($p['priority']); ?>">
                    <?php if ($p['badge']): ?>
                      <div class="rcp-partnerlist__badge" aria-hidden="true">
                        <img src="<?php echo esc_url(get_template_directory_uri().'/assets/img/partner/'.$p['badge']); ?>" alt="">
                      </div>
                    <?php endif; ?>

                    <div class="rcp-partnerlist__item-inner">
                      <h4 class="rcp-partnerlist__name"><?php echo esc_html($p['title']); ?></h4>

                      <figure class="rcp-partnerlist__img">
                        <?php echo $p['thumb']; ?>
                      </figure>

                      <?php if (!empty($p['excerpt'])): ?>
                        <p class="rcp-partnerlist__excerpt"><?php echo esc_html($p['excerpt']); ?></p>
                      <?php endif; ?>

                      <?php if (!empty($p['url'])): ?>
                        <a href="<?php echo esc_url($p['url']); ?>"
                           class="rcp-partnerlist__url"
                           target="_blank" rel="noopener noreferrer">
                          <?php echo esc_html($p['url']); ?>
                        </a>
                      <?php endif; ?>

                      <?php if (!empty($p['tag_names'])): ?>
                        <div class="rcp-partnerlist__tags">
                          <?php foreach ($p['tag_names'] as $tn): ?>
                            <span><?php echo esc_html($tn); ?></span>
                          <?php endforeach; ?>
                        </div>
                      <?php endif; ?>
                    </div>
                  </article>
                <?php endforeach; ?>
              </div><!-- /.rcp-partnerlist__list -->

            <?php else: ?>
              <p class="rcp-partnerlist__empty">現在、該当するパートナーはありません。</p>
            <?php endif; ?>
          </div><!-- /.rcp-partnerlist__block-contents -->
        </div><!-- /.rcp-partnerlist__block -->
      </div><!-- /tabpanel -->
    <?php endforeach; ?>

  </div><!-- /.rcp-partnerlist__inner -->
</section>
