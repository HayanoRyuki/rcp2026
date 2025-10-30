<?php
/*
Template Name: VC専用プラン
*/
get_header();
?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/common.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/footer.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/page-vc_plan.css">

<main class="vc-hero-only">

  <!-- ▼ ヒーローセクション -->
  <div class="vc-hero-bg"></div>

  <!-- ▼ HERO直下CTAボタン -->
  <div class="vc-hero-cta-wrapper">
    <a href="https://docs.google.com/forms/d/e/1FAIpQLScUq2ilUVA0AABgEE8olRad8flZnqr8Pb3RL7bVg4jluh99TQ/viewform" 
       class="vc-hero-button" 
       target="_blank" 
       rel="noopener noreferrer">
      お問い合わせはこちら
    </a>
  </div>

  <!-- ▼ プラン本文セクション -->
  <div class="container">
    <section class="vc-plan-section">
      <p>
        RECEPTIONISTが提供するVC連携「スタートアップ支援プラン」は、<br>
        以下の連携するベンチャーキャピタルから出資を受けている<br>
        または 提携先コミュニティより紹介を受けている企業様だけに、<br>
        クラウド受付システム「RECEPTIONIST」、日程調整ツール「調整アポ」、<br>
        会議室予約管理システム「予約ルームズ」を6ヶ月間無料（50%OFF）で<br>
        利用できるプランです。<br>
        オフィスとWEB会議の受付を効率化し、ビジネスを加速するために是非ご活用ください。
      </p>

      <h2 class="vc-plan-subtitle">特典内容</h2>
      <p>
        RECEPTIONISTが提供する3サービスをご利用開始から<br>
        <strong>6ヶ月無料（※年間契約に適用）</strong>でお使いいただけます。
      </p>

      <h2 class="vc-plan-subtitle">利用条件</h2>
      <ul>
        <li>1. RECEPTIONISTが連携するVCからの出資を受けている</li>
        <li>または、StartPass、triven、NOROSIからの紹介を受けている</li>
        <li>2. RECEPTIONISTの有料版の利用中でない</li>
      </ul>

      <p class="vc-plan-cta">

          まずは
                 <strong> <a href="https://docs.google.com/forms/d/e/1FAIpQLScUq2ilUVA0AABgEE8olRad8flZnqr8Pb3RL7bVg4jluh99TQ/viewform" 
             target="_blank" 
             rel="noopener noreferrer">お問い合わせ</a>ください。 </strong>
      
      </p>
    </section>
  </div>
</main>

<?php get_footer(); ?>
