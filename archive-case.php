<?php get_header(); ?>

<main id="main" class="site-main archive-case">
  <section class="case-archive-section">
    <div class="container">
      <h1 class="page-title">導入事例一覧</h1>
      <!-- ▼ 絞り込みフォーム（従業員規模のみ） -->
      <form
        method="get"
        action="<?php echo esc_url( home_url( '/case/' ) ); ?>"
        class="case-filter-form"
      >
        <div class="case-filter-wrap">
          <div class="case-filter-grid">
            <!-- 従業員規模 -->
            <div class="filter-box">
              <select
                name="employee_size"
                id="employee_size"
                onchange="this.form.submit()"
              >
                <option value="">従業員規模で絞り込む</option>
                <?php
                  $terms = get_terms([
                    'taxonomy'   => 'employee_size',
                    'hide_empty' => false,
                  ]);
                  if (!is_wp_error($terms) && !empty($terms)) {
                    usort($terms, function($a, $b) {
                      preg_match('/\d+/', $a->name, $a_num);
                      preg_match('/\d+/', $b->name, $b_num);
                      $a_val = isset($a_num[0]) ? intval($a_num[0]) : 0;
                      $b_val = isset($b_num[0]) ? intval($b_num[0]) : 0;
                      return $a_val - $b_val;
                    });
                    foreach ($terms as $term) {
                      $selected = ( get_query_var('employee_size') === $term->slug ) ? 'selected' : '';
                      echo "<option value='{$term->slug}' {$selected}>{$term->name}</option>";
                    }
                  }
                ?>
              </select>
            </div>
          </div>
        </div>
      </form>


      <!-- ▼ 導入事例一覧 -->
      <?php if ( have_posts() ) : ?>
        <div class="case-grid">
          <?php while ( have_posts() ) : the_post(); ?>
            <article class="case-card">
              <a href="<?php the_permalink(); ?>">
                <div class="case-thumbnail">
                  <?php if ( has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail( 'medium' ); ?>
                  <?php endif; ?>

                  <?php
                    $logo_id = get_post_meta( get_the_ID(), '_case_logo_image_id', true );
                    if ( $logo_id ) {
                      $logo_url = wp_get_attachment_image_url( $logo_id, 'full' );
                      if ( $logo_url ) :
                  ?>
                        <div class="case-logo">
                          <img src="<?php echo esc_url( $logo_url ); ?>" alt="企業ロゴ">
                        </div>
                  <?php
                      endif;
                    }
                  ?>
                </div> <!-- /.case-thumbnail -->

                <div class="case-content">
                  <?php
                    $category_terms = get_the_terms( get_the_ID(), 'case_category' );
                    if ( $category_terms && ! is_wp_error( $category_terms ) ) :
                      echo '<div class="case-category">';
                      foreach ( $category_terms as $term ) {
                        echo '<span>' . esc_html( $term->name ) . '</span>';
                      }
                      echo '</div>';
                    endif;
                  ?>
                  <h2 class="case-title"><?php the_title(); ?></h2>
                  <div class="case-readmore-btn">この事例を見る</div>
                </div> <!-- /.case-content -->

              </a>
            </article>
          <?php endwhile; ?>
        </div> <!-- /.case-grid -->

        <!-- ▼ ページネーション -->
        <div class="pagination">
          <?php the_posts_pagination(); ?>
        </div>

      <?php else : ?>
        <p class="no-case">条件に合致する導入事例はありません。</p>
      <?php endif; ?>

    </div> <!-- /.container -->
  </section>
</main>

<?php get_footer(); ?>
