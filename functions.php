<?php
/*
	Theme Name: OGlobe
	Author: Arbitrage Theme
*/

add_action( 'after_setup_theme', 'hybrid_setup' );
function hybrid_setup() {
	load_theme_textdomain( 'hybrid' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'hybrid-single-full-width', 1000, 562,true); // No Sidebars
	add_image_size( 'hybrid-single', 700, 394,true); // With Sidebar
	add_image_size( 'hybrid-list-16-9', 480, 270,true); // 16:9 Posts List
	add_image_size( 'hybrid-highlights-1-img-1', 550, 400,true);
	add_image_size( 'hybrid-highlights-1-img-2', 550, 244,true);
	add_image_size( 'hybrid-highlights-1-img-3', 400, 355,true);

	register_nav_menus( array(
		'main'		=> 'Main menu',
		'secondary'	=> 'Secondary Menu',
		'mobile'	=> 'Mobile Menu',
		'footer'	=> 'Footer Menu',
	) );

	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'caption',
	) );
}


/*
	Register widget area.
*/

add_action( 'widgets_init', 'hybrid_widgets_init' );
function hybrid_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Single & Page Sidebar', 'hybrid' ),
		'id'            => 'single-sidebar',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'hybrid' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget 1', 'hybrid' ),
		'id'            => 'footer-widget-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'hybrid' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget 2', 'hybrid' ),
		'id'            => 'footer-widget-2',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'hybrid' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget 3', 'hybrid' ),
		'id'            => 'footer-widget-3',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'hybrid' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}


/*
	Translations
*/

add_action( 'after_setup_theme', 'hybrid_translation' );
function hybrid_translation() {
	load_theme_textdomain( 'hybrid-themes', get_template_directory() . '/translation' );
}


/*
	Additional functions.
*/

require_once get_template_directory() . '/framework/inc/lib.php';
require_once get_template_directory() . '/framework/inc/Hybrid_Menu_Navwalker.php';
require_once get_template_directory() . '/framework/hybrid-engine/main.php';


/*
	Search Posts Only
*/

add_action('init', 'hybrid_search_posts_only');
function hybrid_search_posts_only() {
    global $wp_post_types;
    $wp_post_types['page']->exclude_from_search = true;
}


/*
	Enqueue scripts and styles.
*/

add_action( 'wp_enqueue_scripts', 'hybrid_scripts' );
function hybrid_scripts() {
	global	$wp_query,
			$hybrid_settings;

	$pagination = $hybrid_settings['posts-list-pagination'];
	$home_page_latest_posts_cat	= $hybrid_settings['home-page-latest-posts-cat'];

	$google_fonts = array();


	if ( $wp_query->is_home() && $wp_query->is_main_query()  && $home_page_latest_posts_cat != 'all' ) {
		$wp_query->query['cat'] = $home_page_latest_posts_cat;
	}

	// Theme stylesheet.
	wp_enqueue_style( 'hybrid-style', get_stylesheet_uri(), array(), '1.0.1-03-02');
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/fonts/font-awesome/css/fontawesome-all.min.css', array(), '5.0.10');

	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_template_directory_uri() . '/assets/js/html5.js', array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'hybrid-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ), '1.0.0.1', true );

	if( ( $pagination == 'load-more' || $pagination == 'infinite-scroll' ) && ( is_archive() || is_search() || is_home() ) ) {
		$loadmore_args = array(
			'pagination'	=> $pagination,
			'url'   		=> admin_url( 'admin-ajax.php' ),
			'query' 		=> $wp_query->query,
		);


		wp_enqueue_script( 'ajax-load', get_template_directory_uri() . '/assets/js/ajax-load.js', array( 'jquery' ), '1.0.0', true );
		wp_localize_script( 'ajax-load', 'loadmore_args', $loadmore_args );
	}

	if( array_key_exists( 'google-fonts-links' , $hybrid_settings ) ) {
		foreach( $hybrid_settings['google-fonts-links'] as $key => $google_font_link ){
			wp_enqueue_style( strtolower($key) , $google_font_link, array(), null);
		}	
	}

	if ( is_singular() && comments_open() ) {
		wp_enqueue_script( 'comment-reply' );
	}
}


/*
	Homepage Latest Posts Category
*/

add_action( 'pre_get_posts', 'hybrid_home_category' );
function hybrid_home_category( $query ) {
	global $hybrid_settings;
	$home_page_latest_posts_cat	= $hybrid_settings['home-page-latest-posts-cat'];

	if ( $query->is_home() && $query->is_main_query()  && $home_page_latest_posts_cat != 'all' ) {
		$query->set( 'cat', $home_page_latest_posts_cat );
	}
}


/*
	Get Hybrid Settings
*/

global $hybrid_settings;
$hybrid_settings = get_option('hybrid_settings');