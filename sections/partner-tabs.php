<section class="rcp-partnerlist">
  <div class="rcp-partnerlist__inner">

    <!-- セクション見出し -->
    <div class="rcp-partnerlist__head">
      <h2 class="rcp-partnerlist__title">RECEPTIONISTパートナー一覧</h2>
      <p class="rcp-partnerlist__lead">RECEPTIONISTの各種連携サービスを提供するパートナーをご紹介します</p>
    </div>

    <!-- カテゴリタブ（先に表示） -->
    <div class="rcp-partnerlist__tabwrap">
      <div class="rcp-partnerlist__tabs">
        <a href="#sales-partner" class="active">セールス<br class="sp">パートナー</a>
        <a href="#alliance-partner">アライアンス<br class="sp">パートナー</a>
      </div>
    </div>

    <!-- フィルター（後に表示） -->
    <div class="rcp-partnerlist__filterwrap">
      <div class="rcp-partnerlist__filter">
        <a href="#" class="active">すべて</a>
        <a href="#">ICT機器販売</a>
        <a href="#">オフィス設計・デザイン</a>
        <a href="#">入退・ゲート連携</a>
        <a href="#">導入設計・SI構築支援</a>
        <a href="#">流通</a>
      </div>
    </div>

    <?php
    $partner_sections = [
      'sales-partner' => [
        'title' => 'セールスパートナー',
        'lead'  => 'RECEPTIONISTシリーズを安心して販売・紹介いただけるパートナー',
        'slugs' => ['salespartner-rap', 'salespartner-rsp', 'salespartner'],
        'badges' => [
          'salespartner-rap' => 'partner_badge01_s.png',
          'salespartner-rsp' => 'partner_badge02_s.png'
        ]
      ],
      'alliance-partner' => [
        'title' => 'アライアンスパートナー',
        'lead'  => 'RECEPTIONISTシリーズとサービス連携や業務提携をしているパートナー',
        'slugs' => ['alliancepartner'],
        'badges' => [
          'alliancepartner' => 'partner_badge02_s.png'
        ]
      ]
    ];

    foreach ($partner_sections as $id => $section) :
      $query = new WP_Query([
        'post_type' => 'partner',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC',
        'tax_query' => [[
          'taxonomy' => 'partner-category',
          'field' => 'slug',
          'terms' => $section['slugs'],
        ]]
      ]);

      if ($query->have_posts()) :
        $posts = [];
        while ($query->have_posts()) : $query->the_post();
          $tags = get_the_terms(get_the_ID(), 'partner-tag');
          $tag_slugs = ($tags && !is_wp_error($tags)) ? wp_list_pluck($tags, 'slug') : [];

          $priority = 99;
          foreach (['salespartner-rap', 'salespartner-rsp'] as $i => $slug) {
            if (in_array($slug, $tag_slugs)) {
              $priority = $i;
              break;
            }
          }

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

          $posts[] = [
            'ID' => get_the_ID(),
            'title' => get_the_title(),
            'excerpt' => get_the_excerpt(),
            'url' => get_post_meta(get_the_ID(), 'partner_url', true),
            'thumb' => get_the_post_thumbnail(get_the_ID(), 'medium'),
            'tag_names' => ($tags && !is_wp_error($tags)) ? implode(",", wp_list_pluck($tags, 'name')) : '',
            'badge' => $badge,
            'priority' => $priority
          ];
        endwhile;
        wp_reset_postdata();

        usort($posts, fn($a, $b) => $a['priority'] <=> $b['priority']);
    ?>
    <div class="rcp-partnerlist__section" id="<?php echo esc_attr($id); ?>">
      <div class="rcp-partnerlist__block">
        <h3 class="rcp-partnerlist__block-title"><?php echo esc_html($section['title']); ?></h3>
        <p class="rcp-partnerlist__block-lead"><?php echo esc_html($section['lead']); ?></p>
        <div class="rcp-partnerlist__block-contents">
          <div class="rcp-partnerlist__list">
            <?php foreach ($posts as $p) : ?>
              <div class="rcp-partnerlist__item" data-tags="<?php echo esc_attr($p['tag_names']); ?>">
                <?php if ($p['badge']) : ?>
                  <div class="rcp-partnerlist__badge">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partner/<?php echo esc_attr($p['badge']); ?>" alt="">
                  </div>
                <?php endif; ?>
                <div class="rcp-partnerlist__item-inner">
                  <h4 class="rcp-partnerlist__name"><?php echo esc_html($p['title']); ?></h4>
                  <figure class="rcp-partnerlist__img"><?php echo $p['thumb']; ?></figure>
                  <p class="rcp-partnerlist__excerpt"><?php echo esc_html($p['excerpt']); ?></p>
                  <?php if (!empty($p['url'])) : ?>
                    <a href="<?php echo esc_url($p['url']); ?>" target="_blank" class="rcp-partnerlist__url"><?php echo esc_html($p['url']); ?></a>
                  <?php endif; ?>
                  <div class="rcp-partnerlist__tags">
                    <?php foreach (explode(",", $p['tag_names']) as $tag) : ?>
                      <span><?php echo esc_html($tag); ?></span>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
    <?php
      endif;
    endforeach;
    ?>

  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const filterLinks = document.querySelectorAll('.rcp-partnerlist__filter a');
  const allItems = document.querySelectorAll('.rcp-partnerlist__item');

  filterLinks.forEach(link => {
    link.addEventListener('click', function (e) {
      e.preventDefault();
      filterLinks.forEach(l => l.classList.remove('active'));
      this.classList.add('active');

      const keyword = this.textContent.trim();
      allItems.forEach(item => {
        const tags = item.getAttribute('data-tags') || '';
        const match = keyword === 'すべて' || tags.includes(keyword);
        item.style.display = match ? 'block' : 'none';
      });
    });
  });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const lists = document.querySelectorAll('.rcp-partnerlist__list');

  lists.forEach(list => {
    const items = Array.from(list.querySelectorAll('.rcp-partnerlist__item'));

    const getPriority = (item) => {
      const badgeImg = item.querySelector('.rcp-partnerlist__badge img');
      if (!badgeImg) return 2; // バッヂなし
      const src = badgeImg.getAttribute('src');
      if (src.includes('badge01')) return 0; // RAP
      if (src.includes('badge02')) return 1; // RSP
      return 2;
    };

    items.sort((a, b) => getPriority(a) - getPriority(b));
    items.forEach(item => list.appendChild(item));
  });
});
</script>

