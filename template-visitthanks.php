<?php
/**
 * Template Name: 展示会来訪お礼
 * Description: 展示会に来訪いただいた方向けのお礼ページテンプレート
 */

get_header();
?>

<style>
@media (max-width: 768px) {
  .landingPage_btn {
    display: block;
    width: 90%;
    max-width: 400px;
    font-size: 14px;
    padding: 12px 16px;
    word-break: break-word;
    white-space: normal;
    box-sizing: border-box;
    text-align: center;
    line-height: 1.5;
    height: auto;
    margin: 0 auto 1.5rem;
  }
}
.landingPage_btn {
  display: inline-block;
  background-color: #b3eafc;
  color: #000;
  text-decoration: none;
  border-radius: 8px;
  font-weight: bold;
  padding: 12px 24px;
  margin-bottom: 1.5rem;
  text-align: center;
}
</style>

<main class="site-main thanks-page container" style="padding: 60px 20px; text-align: center;">
  <h1 class="page-title">展示会へのご来場、誠にありがとうございました</h1>
  <p style="margin-bottom: 2.5rem;">より詳しいご説明をご希望の方は、以下よりオンライン相談をご予約いただけます。</p>

  <div class="btn-wrapper">
    <a class="landingPage_btn" href="https://booking.receptionist.jp/smb_tenjikai_onlinemtg/60min" target="_blank" rel="noopener">従業員数300名以下の企業様：オンライン相談を予約する！</a>

    <a class="landingPage_btn" href="https://booking.receptionist.jp/gb_tenjikai_onlinemtg/60min" target="_blank" rel="noopener">従業員数301〜1000名の企業様：オンライン相談を予約する！</a>

    <a class="landingPage_btn" href="https://booking.receptionist.jp/ent_tenjikai_onlinemtg/60min" target="_blank" rel="noopener">従業員数1001名以上の企業様：オンライン相談を予約する！</a>
  </div>
</main>
<?php
// CTAセクションとシリーズセクションをフッターの前に表示
get_template_part('sections/cta');
get_template_part('sections/series');

get_footer();
?>
