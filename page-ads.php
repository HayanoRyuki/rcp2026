<?php
/*
Template Name: 広告用ランディングページ（Ads）
*/
get_header();
?>

<main class="site-main page-ads">

  <!-- HEROセクション（共通） -->
  <?php get_template_part('sections/hero'); ?>

  <!-- ロゴスライダー（共通） -->
  <section id="logo-slider">
    <?php get_template_part('sections/logo-slider'); ?>
  </section>

  <!-- Aboutセクション -->
  <section id="about">
    <?php get_template_part('sections/about'); ?>
  </section>

  <!-- お客様の声（4Voice） -->
  <section id="voice">
    <?php get_template_part('sections/4voice'); ?>
  </section>

  <!-- コスト削減 -->
  <section id="cost">
    <?php get_template_part('sections/cost'); ?>
  </section>

  <!-- 解決する課題 -->
  <section id="solutions">
    <?php get_template_part('sections/solutions'); ?>
  </section>

  <!-- 選ばれる理由 -->
  <section id="reasons">
    <?php get_template_part('sections/reasons'); ?>
  </section>

  <!-- 利用シーン -->
  <section id="scene">
    <?php get_template_part('sections/scene'); ?>
  </section>

  <!-- 導入企業ロゴ -->
  <section id="logo">
    <?php get_template_part('sections/logo'); ?>
  </section>

  <!-- CTA -->
  <section id="cta">
    <?php get_template_part('sections/cta'); ?>
  </section>

</main>

<!-- スムーススクロール -->
<script>
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        e.preventDefault();
        window.scrollTo({
          top: target.offsetTop - 80,
          behavior: 'smooth'
        });
      }
    });
  });
</script>

<!-- フッター -->
<?php include get_template_directory() . '/sections/footer-ads.php'; ?>
<?php wp_footer(); ?>
</body>
</html>
