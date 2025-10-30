<section class="secPtrMainVis" id="partner-about">
  <style>
    #partner-about {
      position: relative;
      background-color: #f5fbff;
      overflow: hidden;
    }
	  .partner-about-section {
  background-image: url('画像パス/ptr_kv_img_bg.png');
  background-repeat: no-repeat;
  background-position: 70% top; /* ←ここを調整 */
  background-size: cover;
}
	  
#partner-about::before {
  content: "";
  position: absolute;
  top: 0;
  right: 0;
  width: 1000px; /* ←広くする */
  height: 100%;
  background: url('/wp-content/themes/rcp2025/assets/img/partner/ptr_kv_img_bg.png') no-repeat;
  background-position: top right; /* ← このままでOK */
  background-size: contain; /* ← 高さに合わせてリサイズ */
  z-index: 0; /* ← 下に沈める（z-index:1 → 0） */
}


    .secPtrMainVis .secTtlWrap {
      text-align: center;
      margin-bottom: 40px;
    }

    .secPtrMainVis .secTtl {
      font-size: 2rem;
      font-weight: bold;
    }

    .mainVisInr {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 40px;
      max-width: 1080px;
      margin: 0 auto 60px;
      flex-wrap: wrap;
    }

    .mainVisInr > * {
      position: relative;
      z-index: 1;
    }

    .secLeadWrap {
      flex: 1;
      min-width: 300px;
    }

    .secLead {
      font-size: 1rem;
      line-height: 1.8;
      color: #333;
    }

    .secImg {
      flex: 1;
      text-align: center;
    }

    .secImg img {
      max-width: 100%;
      height: auto;
      max-height: 300px;
    }

    .mainVisInrBtm {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 40px;
      max-width: 1080px;
      margin: 0 auto;
    }

    .mainVisInrBtmItm {
      flex: 1 1 400px;
      background: #fff;
      padding: 24px;
      border-radius: 8px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
      text-align: center;
    }

    .mainVisInrBtmItm figure {
      margin-bottom: 16px;
    }

    .mainVisInrBtmItm img {
      width: 120px;
      height: auto;
    }

    .mainVisInrBtmItmTtl .secTtl {
      font-size: 1.2rem;
      margin-bottom: 12px;
    }

    .mainVisInrBtmItmLead .secLead {
      font-size: 0.95rem;
      color: #333;
    }

    @media screen and (max-width: 767px) {
      .mainVisInr {
        flex-direction: column;
        text-align: center;
      }

      .mainVisInrBtm {
        flex-direction: column;
        gap: 24px;
      }
    }
  </style>
  <div class="secTtlWrap">
    <h1 class="secTtl">認定パートナー制度について</h1>
  </div>
  <div class="mainVisInr">
    <div class="secLeadWrap">
      <p class="secLead">
        RECEPTIONISTシリーズは幅広いパートナーに販売・紹介いただけます。その中でも高いレベルで販売力・技術力・体制を持っているパートナーを認定パートナーとして協業しています。<br>
        サービス提供はもちろん、サービス周辺に関わる機器販売や環境・空間構築などの役務や付加価値を提供することができるパートナーもございます。<br>
        各種サービス導入をご検討のお客様は、是非ご参考ください。
      </p>
    </div>
    <div class="secImg">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partner/ptr_kv_img.png" alt="認定パートナー制度について">
    </div>
  </div>
  <div class="mainVisInrBtm">
    <div class="mainVisInrBtmItm">
      <figure>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partner/partner_badge01.png" alt="RECEPTIONIST Audhorized Partner (RAP)">
      </figure>
      <div class="mainVisInrBtmItmTtl">
        <h3 class="secTtl">RECEPTIONIST Audhorized Partner (RAP)</h3>
      </div>
      <div class="mainVisInrBtmItmLead">
        <p class="secLead">RECEPTIONISTシリーズについて、非常に高い販売力や体制を持つ、最上位の認定パートナー</p>
      </div>
    </div>
    <div class="mainVisInrBtmItm">
      <figure>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partner/partner_badge02.png" alt="RECEPTIONIST Success Partner (RSP)">
      </figure>
      <div class="mainVisInrBtmItmTtl">
        <h3 class="secTtl">RECEPTIONIST Success Partner (RSP)</h3>
      </div>
      <div class="mainVisInrBtmItmLead">
        <p class="secLead">RECEPTIONISTシリーズについて、高い販売力や体制を持つ認定パートナー</p>
      </div>
    </div>
  </div>
</section>
