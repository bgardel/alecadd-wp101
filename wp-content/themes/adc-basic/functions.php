<?php
/*
    ================================
    Include scripts
    ================================
*/

// The CSS files for your theme
function theme_styles() {
    wp_enqueue_style('bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', array(), '', 'all');
    wp_enqueue_style('bootstrap-theme', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css', array('bootstrap-css'), '', 'all');
    wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/basic.css', array(), '1.0.2', 'all');
}

// The JavaScript files for your theme
function theme_js() {
    wp_enqueue_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'), '', true );
    wp_enqueue_script('customjs', get_template_directory_uri() . '/js/basic.js', array(), '1.0.0', true);
}

add_action( 'wp_enqueue_scripts', 'theme_styles' );
add_action( 'wp_enqueue_scripts', 'theme_js' );

/*
    ================================
    Activate menus
    ================================
*/
function basictheme_theme_setup() {
    add_theme_support('menus');
    
    register_nav_menu('primary', 'Primary Header Navigation');
    register_nav_menu('secondary', 'Footer Navigation');
}

add_action('init', 'basictheme_theme_setup');

// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');

// Bootstrap navigation
function bootstrap_nav()
{
	wp_nav_menu( array(
            'theme_location'    => 'primary',
            'depth'             => 2,
            'container'         => 'false',
            'menu_class'        => 'nav navbar-nav',
            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
            'walker'            => new wp_bootstrap_navwalker())
    );
}

/*
    ================================
    Theme support
    ================================
*/
add_theme_support('custom-background');
add_theme_support('custom-header');
add_theme_support('post-thumbnails');
add_theme_support('post-formats', array('aside','image','video'));
add_theme_support('html5', array('search-form'));


/*
    ================================
    Remove WP Emoji code
    ================================
*/
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );


/*
    ================================
    Sidebar function
    ================================
*/

function basictheme_widget_setup() {    
    register_sidebar( 
        array(
        	'name'          => 'Sidebar',
        	'id'            => 'sidebar-1',    // ID should be LOWERCASE  ! ! !
        	'description'   => 'Standard Sidebar',
            'class'         => 'custom',
        	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        	'after_widget'  => '</aside>',
        	'before_title'  => '<h1 class="widget-title">',
        	'after_title'   => '</h1>'
        )
    );
}

add_action('widgets_init','basictheme_widget_setup');