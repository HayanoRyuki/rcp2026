<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- ChatPlus -->
  <script>
    (function(){
      var w=window,d=document;
      var s="https://app.chatplus.jp/cp.js";
      d["__cp_d"]="https://app.chatplus.jp";
      d["__cp_c"]="e5ead80a_3";
      var a=d.createElement("script"), m=d.getElementsByTagName("script")[0];
      a.async=true,a.src=s,m.parentNode.insertBefore(a,m);
    })();
  </script>
  <!-- End ChatPlus -->

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="header-minimam">
  <div class="header-minimam-inner">
	<a href="<?php echo home_url(); ?>" class="header-logo">
  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo/img-logo-reception.webp" alt="RECEPTIONISTロゴ">
</a>
  </div>
</header>

