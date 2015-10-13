<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name = "format-detection" content = "telephone=no" />
<title>
<?php wp_title( '|', true, 'right' ); ?>
</title>
<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon" />
<!-- Le styles -->
<link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/css/responsive.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/css/apico-sprites.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/form.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/camera.css">
   <!--<script src="js/jquery.js"></script>-->
        <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/jquery-2.1.0.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/jquery-migrate-1.2.1.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.easing.1.3.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.equalheights.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/superfish.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.mobilemenu.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.ui.totop.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/TMForm.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/camera.js"></script>

        <!--[if (gt IE 9)|!(IE)]><!-->

        <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.mobile.customized.min.js"></script>

        <!--<![endif]-->

        <!--[if lt IE 8]>

       <div style=' clear: both; text-align:center; position: relative;'>

         <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">

           <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />

         </a>

      </div>

    <![endif]-->

        <!--[if lt IE 9]>

        <script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>

        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo get_template_directory_uri(); ?>/css/ie.css">

    <![endif]-->

<!--<link rel="pingback" href="<?php //bloginfo( 'pingback_url' ); ?>" />-->
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>

<?php //wp_head(); ?>
</head>
    <body id="top">
<header class="back" id="header" >
          <div class="shadow_bg_1"></div>
          <div class="container">
    <div class="row">
              <div class="grid_4">
        <h1><a href="index.php">
        <?php if ( get_header_image() ) : ?>
  <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php header_image(); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a></h1>
  <?php endif; ?>
        <div class="slogan"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'description' ); ?></a></div>
      </div>
              <div class="grid_8">
       <nav role="navigation">
       
			<button class="menu-toggle"><?php _e( 'Menu', 'idnature' ); ?></button>
			<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'idnature' ); ?>"><?php _e( 'Skip to content', 'idnature' ); ?></a>
			<?php wp_nav_menu( array('theme_location' => 'primary', 'container' => 'ul', 'container_class' => 'sf-menu','items_wrap' => '<ul class="sf-menu"><li>%3$s</li></ul>' )); ?>
  </nav>
  <!-- #site-navigation -->
      </div>
              <div class="grid_12">
        <div class="shadow_line"></div>
      </div>
            </div>
  </div>
</header>
<!-- #masthead -->

<div class="clear"></div>
