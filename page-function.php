<?php
/* Template Name: 機能一覧 */
get_header();
?>
<main class="site-main function-page">
<h1 class="page-title" style="text-align: center; font-size: 2rem; font-weight: bold; margin-bottom: 1rem;">
  機能の紹介
</h1>
<p style="text-align: center;">
  「クラウド受付システムRECEPTIONIST」の機能の一部になります。<br>
  機能詳細と一覧は資料に記載していますので、ご覧ください。
</p>
  <?php
    get_template_part('sections/function-hero');
    get_template_part('sections/function-main'); 
    get_template_part('sections/function-efficiency');
    get_template_part('sections/function-security');   
    get_template_part('sections/function-enterprise'); 
    get_template_part('sections/cta'); 
  ?>
</main>
<?php get_footer(); ?>
