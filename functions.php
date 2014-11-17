<?php
// Set up the content width value based on the theme's design and stylesheet.	
if ( ! isset( $content_width ) ){
	$content_width = 1170;
}
	
	/**
 * Proper way to enqueue scripts and styles
 */
 
function play_scripts() {
	wp_enqueue_style( 'play_bootstrap', get_template_directory_uri().'/css/bootstrap.min.css' );
	wp_enqueue_style( 'play_font_awesome', get_template_directory_uri().'/font-awesome/css/font-awesome.min.css' );
	wp_enqueue_style( 'play_site_styles', get_template_directory_uri().'/style.css' );
	wp_enqueue_script('jquery');
	wp_enqueue_script('play_modernizr', get_template_directory_uri().'/js/modernizr.js', array(), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'play_scripts' );

	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');



// This theme uses wp_nav_menu() in two locations.  
register_nav_menus( array(  
  'primary' => __( 'Primary Navigation', 'play' ),  
  'secondary' => __('Secondary Navigation', 'play')  
) );


function is_sidebar_active($index) {
global $wp_registered_sidebars;
$widgetcolums = wp_get_sidebars_widgets();
if ($widgetcolums[$index])
return true;
return false;
}
// Declare footer widget zone
    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Header widgets',
    		'id'   => 'header-widgets',
    		'description'   => 'These are widgets for the header, you could use this space for adsense, 728x90 banner.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s col-xs-12 col-lg-12">',
    		'after_widget'  => '</div>',
    		'before_title'  => '',
    		'after_title'   => ''
    	));
    }

		// Declare home widget zone
    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Home left widgets',
    		'id'   => 'home-left-widgets',
    		'description'   => 'These are widgets for the Home page, below the content.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s col-xs-12 col-lg-12">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
    }
	// Declare home widget zone
    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Home right widgets',
    		'id'   => 'home-right-widgets',
    		'description'   => 'These are widgets for the Home page, below the content.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s col-xs-12 col-lg-12">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
    }
	// Declare home widget zone
    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Home bottomfull widgets',
    		'id'   => 'home-bottomfull-widgets',
    		'description'   => 'These are widgets for the Home page, below the content.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s col-xs-12 col-lg-12">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
    }
	// Declare sidebar widget zone
    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Sidebar widgets',
    		'id'   => 'sidebar-widgets',
    		'description'   => 'These are widgets for the sidebar.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s col-xs-12 col-lg-12">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h3>',
    		'after_title'   => '</h3>'
    	));
    }
	
	// Declare footer widget zone
    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Footer widgets',
    		'id'   => 'footer-widgets',
    		'description'   => 'These are widgets for the footer.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s col-xs-12 col-lg-12">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h3>',
    		'after_title'   => '</h3>'
    	));
    }
	add_action( 'widgets_init', 'register_sidebar' );

	

	require get_template_directory() . '/inc/customizer.php';
	require get_template_directory() . '/inc/theme-options.php';
	
//Add theme support		
//add_theme_support( $feature, $arguments ); 
the_post_thumbnail();

// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 150, 150 ); // Unlimited height, soft crop


//Add Custom header	
	$args = array(
	'flex-width'    => false,
	'width'         => 728,
	'flex-height'    => false,
	'height'        => 90,
	'uploads'       => true,
	'default-image' => get_template_directory_uri() . '/img/top_banner.png',
);
	add_theme_support( "custom-header", $args );
//Add Custom header	
	
//Add Custom Background		
	$args = array(
	'default-color' => 'f5f5f5',
	'default-image' => get_template_directory_uri() . '/img/background.png',
);
	add_theme_support( "custom-background", $args );
//Add Custom Background	


//Add Editor Styles

function my_theme_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}

function play_add_editor_styles() {
    add_editor_style( get_template_directory_uri().'css/editor_styles.css' );
}
add_action( 'init', 'play_add_editor_styles' );
//Add Editor Styles

//Add RSS feed in HTML head
	add_theme_support( 'automatic-feed-links' ); 
//Add RSS feed in HTML head


// Add the site Title.
function play_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'play' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'play_wp_title', 10, 2 );

//Contact from 7 filter_SSL(

add_filter( 'wpcf7_form_class_attr', 'wildli_custom_form_class_attr' );
function wildli_custom_form_class_attr( $class ) {
	$class .= ' form-horizontal';
	return $class;
}

/*Add fonts*/










