<?php
/**
 * kembara functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package kembara
 */

if ( ! function_exists( 'kembara_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function kembara_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on kembara, use a find and replace
	 * to change 'kembara' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'kembara', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'kembara' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'kembara_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'kembara_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function kembara_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'kembara_content_width', 640 );
}
add_action( 'after_setup_theme', 'kembara_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function kembara_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'kembara' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'kembara' ),
		'before_widget' => '<div class="col-xs-12 col-sm-3 clearfix widget %2$s" id="%1$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'kembara_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function kembara_scripts() {
	wp_enqueue_style( 'kembara-style', get_stylesheet_uri() );
	
	//wp_enqueue_style( 'kembara-style-font-pacifico', 'https://fonts.googleapis.com/css?family=Pacifico' );
	//wp_enqueue_style( 'kembara-style-font-ptsans', 'https://fonts.googleapis.com/css?family=PT+Sans:400,700' );
	
	//style
	wp_enqueue_style( 'kembara-style-asset-style', get_template_directory_uri() .'/dist/css/style.css' );

	//ionicons
	wp_enqueue_style( 'kembara-style-asset-ionicons', get_template_directory_uri() .'/dist/fonts/Ionicons/css/ionicons.min.css' );

	//style
	wp_enqueue_script( 'theme-main-app-js', get_template_directory_uri() . '/dist/js/app.js', array(), '20160901', true );

	wp_enqueue_script( 'kembara-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'kembara-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'kembara_scripts' );

require get_template_directory() .'/inc/bs4navwalker.php';
require get_template_directory() .'/inc/widgets.php';


/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/* responsive img */
function add_image_responsive_class($content) {
   global $post;
   $pattern ="/<img(.*?)class=\"(.*?)\"(.*?)>/i";
   $replacement = '<img$1class="$2 img-fluid"$3>';
   $content = preg_replace($pattern, $replacement, $content);
   return $content;
}

add_filter('the_content', 'add_image_responsive_class');

/* search form bs4 */
/**
 * Generate custom search form
 *
 * @param string $form Form HTML.
 * @return string Modified form HTML. 
 */
function kembara_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
    <div class="input-group"><label class="screen-reader-text" for="s">' . __( 'Search for:' ) . '</label>
    <input type="text" class="form-control" value="' . get_search_query() . '" name="s" id="s" />
    <span class="input-group-btn"><input type="submit" id="searchsubmit" class="btn btn-primary" value="'. esc_attr__( 'Search' ) .'" /></span>
    </div>
    </form>';
 
    return $form;
}
add_filter( 'get_search_form', 'kembara_search_form' );

function kembara_comment_form()
{
	
	$fields =  array(
	 
	  'author' =>
		'<div class="comment-form-author"><div class="form-group"><label for="author">' . __( 'Name', 'domainreference' ) . '</label> ' .
		( $req ? '<span class="required">*</span>' : '' ) .
		'<input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
		'" ' . $aria_req . ' /></div></div>',
	 
	  'email' =>
		'<div class="comment-form-email"><div class="form-group"><label for="email">' . __( 'Email', 'domainreference' ) . '</label> ' .
		( $req ? '<span class="required">*</span>' : '' ) .
		'<input id="email" name="email" class="form-control" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
		'" ' . $aria_req . ' /></div></div>',
	 
	  'url' =>
		'<div class="comment-form-url"><div class="form-group"><label for="url">' . __( 'Website', 'domainreference' ) . '</label>' .
		'<input id="url" name="url" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
		'"   /></div>',
	);

    $comments_args = array(
	'class_submit' => 'btn btn-primary',
	'fields' => apply_filters( 'comment_form_default_fields', $fields ),
	'comment_field' =>  '<div class="comment-form-comment"><div class="form-group"><label for="comment">' . _x( 'Comment', 'noun' ) .
		'</label><textarea id="comment" name="comment" class="form-control"  rows="8" aria-required="true">' .
		'</textarea></div></div>',
		 'comment_notes_after' => ' ');

	comment_form($comments_args);
}