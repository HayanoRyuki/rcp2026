<?php
/**
 * 404 Not Found
 */
get_header();
?>

<main class="site-main page-404">
  <div class="page-404-inner">

    <h1 class="page-404-title">お探しのページは見つかりませんでした</h1>

    <p class="page-404-text">
      入力されたURLが間違っているか、ページが削除された可能性があります。<br>
      トップページへ戻って、再度お探しください。
    </p>

    <a href="<?php echo home_url('/'); ?>" class="page-404-button">
      トップページに戻る
    </a>

  </div>
</main>

<?php
get_footer();
?>
