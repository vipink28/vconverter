<?php
/**
 * vconverter functions and definitions*
 
 */

if ( ! defined( 'VCONVERTER_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'VCONVERTER_VERSION', '1.0.0' );
}

if ( ! function_exists( 'vconverter_setup' ) ) :
	/*
	 * Sets up theme defaults and registers support for various WordPress features.
*/
	function vconverter_setup() {		
		load_theme_textdomain( 'vconverter', get_template_directory() . '/languages' );

		
		add_theme_support( 'automatic-feed-links' );		
		add_theme_support( 'title-tag' );		
		add_theme_support( 'post-thumbnails' );

		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary Menu', 'vconverter' ),
				'secondary' => esc_html__( 'Secondary Menu', 'vconverter' ),
				'topheader' => esc_html__( 'Top Header Menu', 'vconverter' ),
				'footer' => esc_html__( 'Footer Menu', 'vconverter' ),
			)
		);		
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);
		
		add_theme_support(
			'custom-background',
			apply_filters(
				'vconverter_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);		
		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 88,
				'width'       => 370,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'vconverter_setup' );

/*
 * @global int $content_width
 */
function vconverter_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'vconverter_content_width', 1140 );
}
add_action( 'after_setup_theme', 'vconverter_content_width', 0 );


function vconverter_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'vconverter' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'vconverter' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar( 
		array(
        'name' => __( 'Footer', 'vconverter' ),
        'id' => 'footer-widget',
        'description' => __( 'Footer Address', 'vconverter' ),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ) );
}
add_action( 'widgets_init', 'vconverter_widgets_init' );
/**
 * Enqueue scripts and styles.
 */
function vconverter_scripts() {
	wp_register_style( 'ad_google_fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap', [], VCONVERTER_VERSION );
	wp_register_style( 'ad_bootstrap_css', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css', [], VCONVERTER_VERSION );
	wp_register_style( 'ad_style', get_template_directory_uri() . '/assets/css/style.css', [], VCONVERTER_VERSION );

	//enqueue styles
wp_enqueue_style( 'ad_google_fonts' );
wp_enqueue_style( 'ad_bootstrap_css' );

	wp_enqueue_style( 'vconverter-style', get_stylesheet_uri(), array(), VCONVERTER_VERSION );
	wp_style_add_data( 'vconverter-style', 'rtl', 'replace' );
	wp_enqueue_style( 'ad_style' );

	wp_register_script( 'ad_bootstrap_js', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js',['jquery'], VCONVERTER_VERSION, true );
	wp_register_script( 'ad_script', get_template_directory_uri() . '/assets/js/script.js', ['jquery'], VCONVERTER_VERSION, true );


    
    wp_enqueue_script( 'jquery','','',[],VCONVERTER_VERSION, true);
	wp_enqueue_script( 'ad_bootstrap_js' );
	wp_enqueue_script( 'ad_script' );
	wp_enqueue_script( 'vconverter-navigation', get_template_directory_uri() . '/js/navigation.js', array(), VCONVERTER_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'vconverter_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// /**
//  * Find the last period in the excerpt and remove everything after it.
//  * If no period is found, just return the entire excerpt.
//  *
//  * @param string $excerpt The post excerpt.
//  */
function end_with_sentence( $excerpt ) {
	global $post;
	if ( ( $pos = mb_strrpos( $excerpt, '.' ) ) !== false ) {
	  $excerpt = substr( $excerpt, 0, $pos + 1 ) . '<div><a class="btn read-more-btn" href="'. get_permalink($post->ID) . '">' . 'Read More' . '</a></div>';
	}  
	return $excerpt;
  }
  add_filter( 'the_excerpt', 'end_with_sentence' );	

/*
read more on excerpt
*/




