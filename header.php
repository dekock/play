<?php
//get theme options
$play_settings = get_option( 'play_theme_settings' ); ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
<meta charset="<?php get_template_directory_uri('charset'); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php if (is_search()) { ?>
<meta name="robots" content="noindex, nofollow" />
<?php } ?>
<title>
<?php wp_title( '|', true, 'right' ); ?>
</title>
<link rel="icon" type="image/x-icon" href="<?php if (get_theme_mod( 'play_favi' )==""){?>
    <?php } else {?><?php echo get_theme_mod( 'play_favi' ); ?><?php } ?>">  
<link rel="pingback" href="<?php echo get_bloginfo('pingback_url'); ?>">
<?php if ( is_singular() ) wp_enqueue_script('comment-reply'); ?>
<?php wp_head(); ?>
<?php
if($play_settings['play_ga'] == ""){
}
else
{echo stripslashes($play_settings['play_ga']);}
?>
</head>
<body <?php body_class(); ?>>
<!--Page starts here-->
<div id="page">
<!--Header starts here-->
<header id="header" class="container-fluid">
  <div class="container">
    <section class="header-left col-xs-12 col-sm-4 col-md-4 col-lg-4">
      <?php if ( get_theme_mod( 'play_logo' ) ) : ?>
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="site-logo" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"> <img class="img-responsive" src="<?php echo get_theme_mod( 'play_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"> </a>
      <?php else : ?>
      <span class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
      <?php bloginfo( 'name' ); ?>
      </a></span>
      <p class="site-description">
        <?php bloginfo( 'description' ); ?>
      </p>
      <?php endif; ?>
    </section>
    <?php get_sidebar('header'); ?>
  </div>
</header>
<!--Header ends here--> 
<!--Top navigation starts here-->
<nav id="mainmenu" class="navbar topnav container-fluid" role="navigation">
  <div class="container">
    <div class="row">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span>MENU</span> </button>
      </div>
      <div class="collapse navbar-collapse" id="navbar-collapse-1">
        <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_class'=>'nav nav-tabs'));?>
      </div>
    </div>
  </div>
</nav>
<!--Top navigation ends here--> 
<!--Content starts here-->
<section id="bodycontent" class="container">
<div class="row">
