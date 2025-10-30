<?php
$logo_query = new WP_Query([
  'post_type'      => 'client_logo',
  'posts_per_page' => 20,
  'meta_key'       => '_show_in_slider',
  'meta_value'     => '1',
  'orderby'        => 'date',
  'order'          => 'DESC',
]);
$logos = [];
if ($logo_query->have_posts()) {
  while ($logo_query->have_posts()) {
    $logo_query->the_post();
    if (has_post_thumbnail()) {
      $logos[] = get_the_post_thumbnail(null, 'medium', ['alt' => get_the_title()]);
    }
  }
  wp_reset_postdata();
}
?>

<?php if (!empty($logos)) : ?>
<div class="section-logo-slider">
  <section class="logo-section">
    <div class="logo-slider-wrapper">
      <ul class="logo-slider-row scroll-left">
        <?php foreach ($logos as $logo) : ?>
          <li class="logo-item">
            <div class="logo-box">
              <?= $logo ?>
            </div>
          </li>
        <?php endforeach; ?>

        <?php foreach ($logos as $logo) : // 複製で無限ループ風に ?>
          <li class="logo-item">
            <div class="logo-box">
              <?= $logo ?>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </section>
</div>
<?php endif; ?>
