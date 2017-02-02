<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
 
if ( ! function_exists( 'grass_setup' ) ) : 
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails. 
 */
function grass_setup() {

    /*
     * Add support for theme translations.
     * Translations should be under /languages/ directory.
     */

    load_theme_textdomain( 'grass', get_template_directory().'/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
     * Let WordPress manage the document title.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */

    add_theme_support( 'title-tag' );

    /*
     * Switch default core markup for search form, comment form, and comments to output valid HTML5.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
     
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#post-thumbnails
     */

    add_theme_support('post-thumbnails');

    // Media sizes for applications icons
    add_image_size( 'icon-big', 256, 256, true);
    add_image_size( 'icon-medium', 186, 186, true);
    add_image_size( 'icon-small', 64, 64, true);

    add_image_size( 'image-crafted-content', 420, 263, true);
    add_image_size( 'thumbnail-big', 210, 210, false);
    add_image_size( 'thumbnail-small', 120, 80, false);

    // Media size for FoG Hackers and Board Directors icons
    add_image_size( 'fog-hacker-icon', 80, 80, true );

    /*
     * Set default banner size
     */

    set_post_thumbnail_size(940, 280);

    // Register a menu for the navbar
    register_nav_menus( array(
            'primary' => 'Navbar Menu'
    ) );
}
endif;
add_action( 'after_setup_theme', 'grass_setup' ); 


/*
 * Enqueue scripts and styles
 */
 
function friends_common_resources() {
        wp_enqueue_script( 'friends-js', get_template_directory_uri() . '/js/friends.js', false, null, true);
        wp_enqueue_style('friends', get_template_directory_uri() . '/css/friends.css', array('bootstrap'), null, 'all');
}

function gnomegrass_resources() {

    // Common scripts
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), null, true);
    wp_enqueue_script( 'template', get_template_directory_uri() . '/js/template.js', array('jquery'), null, true);
    wp_enqueue_script( 'foundation', get_template_directory_uri() . '/js/foundation-bar.js', array('jquery'), null, true);

    // Common stylesheets
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );

    /*
    * The genericons.css stylesheet wasn't loaded, enqueue
    * it for share icons to show up correctly. 
    */

    wp_enqueue_style( 'genericons', '/wp-content/plugins/jetpack/_inc/genericons/genericons/genericons.css', array(), '3.1' );

    // Scripts and styles for page-friends, page-support-gnome and page-donate
    if (is_page( array('friends', 'donate', 'support-gnome')) ) {
        friends_common_resources();
    }
    
    // Scripts and styles for page-thank-you
    if (is_page('thank-you')) {
        friends_common_resources();
        wp_enqueue_script( 'clipboard', get_template_directory_uri() . '/js/clipboard.min.js', array('jquery'), null, true);
    }
    
    // Scripts and styles for page-support-gnome
    if (is_page('support-gnome')) {
        wp_enqueue_style('friends', get_template_directory_uri() . '/css/friends.css', array('bootstrap'), null, 'all');
    }
    
    // Scripts and styles for page-home
    if ( !is_home() || is_front_page() ) {
        wp_enqueue_style('home', get_template_directory_uri() . '/css/home.css', array('bootstrap'), null, 'all');
        wp_enqueue_style('news', get_template_directory_uri() . '/css/news.css', array('bootstrap'), null, 'all');
    }

    if (is_page( array('news', 'press') )) {
        wp_enqueue_style('news', get_template_directory_uri() . '/css/news.css', array('bootstrap'), null, 'all');
    }

    global $post_type;
    if( 'post' == $post_type ) {
        wp_enqueue_style('news', get_template_directory_uri() . '/css/news.css', array('bootstrap'), null, 'all');
    }
}
add_action('wp_enqueue_scripts', 'gnomegrass_resources');


/*
 * Add support for banners and projects post types
 * (any taxonomies for projects)
 */

add_action( 'init', function() {
    register_post_type( 'hackers',
        array(
            'labels' => array(
                'name' => 'FoG hackers',
                'singular_name' => 'FoG hacker',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New FoG hacker',
                'edit' => 'Edit',
                'edit_item' => 'Edit',
                'new_item' => 'New FoG hacker',
                'view' => 'View',
                'view_item' => 'View FoG Hhacker',
                'search_items' => 'Search FoG hackers',
                'not_found' => 'No FoG hackers found',
                'not_found_in_trash' => 'No FoG Hackers found in Trash',
                'parent' => 'Parent FoG hackers',
            ),
            'public' => false,
            'show_ui' => true,
            'exclude_from_search' => true,
            'supports' => array(
                'title', 'thumbnail', 'excerpt', 'revisions', 'author', 'custom-fields'
            ),
            'rewrite' => true
        )
    );

    register_post_type( 'directors',
        array(
            'labels' => array(
                'name' => 'Board Directors',
                'singular_name' => 'Board Director',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New Director',
                'edit' => 'Edit',
                'edit_item' => 'Edit',
                'new_item' => 'New Director',
                'view' => 'View',
                'view_item' => 'View Director',
                'search_items' => 'Search Directors',
                'not_found' => 'No Directors found',
                'not_found_in_trash' => 'No Directors found in Trash',
                'parent' => 'Parent Directors',
            ),
            'public' => false,
            'show_ui' => true,
            'exclude_from_search' => true,
            'supports' => array(
                'title', 'thumbnail','revisions', 'author'
            ),
            'rewrite' => true
        )
    );

    register_post_type( 'banners',
        array(
            'labels' => array(
                'name' => 'Banners',
                'singular_name' => 'Banner',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New Banner',
                'edit' => 'Edit',
                'edit_item' => 'Edit',
                'new_item' => 'New Banner',
                'view' => 'View',
                'view_item' => 'View Banner',
                'search_items' => 'Search Banners',
                'not_found' => 'No banners found',
                'not_found_in_trash' => 'No banners found in Trash',
                'parent' => 'Parent Banner',
            ),
            'public' => true,
            'show_ui' => false,
            'exclude_from_search' => true,
            'supports' => array(
                'title', 'thumbnail', 'excerpt', 'revisions', 'author'
            ),
            'rewrite' => true
        )
    );

    register_taxonomy(  
        'project_category',
        'projects',  
        array(  
            'hierarchical' => true,  
            'label' => 'Categories',
            'query_var' => true,  
            'rewrite' => array(
                'slug' => 'projects/category'
            )
        )
    );

    register_post_type( 'projects',
        array(
            'labels' => array(
                'name' => 'Projects',
                'singular_name' => 'Project',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New Project',
                'edit' => 'Edit',
                'edit_item' => 'Edit Project',
                'new_item' => 'New Project',
                'view' => 'View',
                'view_item' => 'View Project',
                'search_items' => 'Search Projects',
                'not_found' => 'No projects found',
                'not_found_in_trash' => 'No projects found in Trash',
                'parent' => 'Parent Project',
            ),
            'public' => true,
            'exclude_from_search' => false,
            'supports' => array(
                'title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'author', 'custom-fields'
            )
        )
    );
    
    //flush_rewrite_rules();
    
});

/* 
 * Applications Quick Links
 */

$applications_quick_links = array(
    'website'       => __('Project Website'),
    'contribute'    => __('Contribute'),
    'documentation' => __('Documentation'),
    'extensions'    => __('Extensions'),
    'faq'           => __('Frequently Asked Questions'),
    'forum'         => __('Forum'),
    'mailing-list'  => __('Mailing List'),
    'report-bug'    => __('Report a bug'),
    'source-code'   => __('Source Code'),
    'support'       => __('Support'),
    'translate'     => __('Translate'),
);

/*
 * Custom edit area in Applications
 */
add_action( 'add_meta_boxes', function() {
    
    add_meta_box('quick-links', 'Quick Links', function() {
        
        global $applications_quick_links, $post;
        
        echo '<style type="text/css">
            .quicklinks {
                margin: -6px;
                padding: 6px 0 0;
            }
            .quicklinks .item {
                padding: 3px 10px;
                border-bottom: 1px solid #ececec;
            }
            .quicklinks .item:last-child {
                border-bottom: 0;
            }
            .quicklinks label {
                display: inline-block;
                width: 25%;
            }
            .quicklinks input[type="text"] {
                width: 73%;
            }
        </style>';
        echo '<div class="quicklinks">';
        foreach ($applications_quick_links as $key => $title) {
            
            $current_value = get_post_meta($post->ID, 'quicklinks_'.$key, true);
            
            if (empty($current_value)) {
                $current_value = '';
            }
            echo '<div class="item">';
            echo '<label for="quicklinks['.$key.']">'.$title.'</label> ';
            echo '<input type="text" id="quicklinks['.$key.']" name="quicklinks['.$key.']" value="'.$current_value.'" /><br>';
            echo '</div>';
        }
        echo '</div>';
        
    }, 'projects');
    
    
    add_meta_box('featured', 'Featured Project', function() {
        
        global $applications_quick_links, $post;
        
        if (get_post_meta($post->ID, 'is_featured', true) == 'yes') {
            $checked = 'checked';
        } else {
            $checked = '';
        }
        echo '<label style="display: block;"><input type="checkbox" '.$checked.' name="is_featured" style="margin-right: 3px;" />This is a featured project</label>';
        
    }, 'projects', 'side'); 
    
});

function save_project_post($post_id) {
    
    global $post, $applications_quick_links;
    
    if ($_REQUEST['post_type'] == 'projects') {
        
        if (!current_user_can( 'edit_page', $post_id)) {
            return $post_id;
        }
        
    } else {
        
        if (!current_user_can( 'edit_post', $post_id )) {
            return $post_id;
        }
        
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
    
    
    /*
     * Save Quicklinks
     */
    
    if (isset($_POST['quicklinks'])) {
        $quicklinks_values = $_POST['quicklinks'];
        
        foreach($applications_quick_links as $key => $title) {
            
            $meta_name = 'quicklinks_'.$key;
            
            if (array_key_exists($key, $quicklinks_values)) {
                $meta_value = $quicklinks_values[$key];
            } else {
                $meta_value = '';
            }
        
            if (get_post_meta($post_id, $meta_name) == "") {
                
                add_post_meta($post_id, $meta_name, $meta_value, true);
                
            } elseif ($meta_value != get_post_meta($post_id, $meta_name, true)) {
                
                update_post_meta($post_id, $meta_name, $meta_value);
                
            } elseif($meta_value == '') {
                
                delete_post_meta($post_id, $meta_name, get_post_meta($post_id, $meta_name, true));
                
            }
            
        }
    }
    
    /*
     * Save Featured information
     */
    
    
    if (isset($_POST['is_featured'])) {
        
        if (get_post_meta($post_id, 'is_featured') == "") {
            
            add_post_meta($post_id, 'is_featured', 'yes', true);
            
        } else {
            
            update_post_meta($post_id, 'is_featured', 'yes');
            
        }
        
    } else {
        
        if (get_post_meta($post_id, 'is_featured', true) == 'yes') {
            
            delete_post_meta($post_id, 'is_featured', get_post_meta($post_id, 'is_featured', true));
            
        }
        
    }
    
}
add_action('save_post', 'save_project_post');



/*
 * Add breadcrumb support for hierarchical pages
 */

function the_breadcrumb() {
    
    global $post;
    $delimiter = '&raquo;';

    if ( is_page() && $post->post_parent ) {
        $parent_id  = $post->post_parent;
        $breadcrumbs = array();
        while ($parent_id) {
            $page = get_page($parent_id);
            $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
            $parent_id  = $page->post_parent;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
        foreach ($breadcrumbs as $crumb) {
            echo $crumb . ' ' . $delimiter . ' ';
        }

    }
    
}



/*
 * Identify Ajax Language Selector
 */
if (array_key_exists('select-language', $_GET)) {
    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
        require_once('footer_language-selector.php');
        die;
    }
}

/*
 * Identify action for rendering only the footer elements
 */
if (array_key_exists('render-footer-menu', $_GET)) {
    wp_nav_menu('menu=footer');
    exit;
}


add_action( 'admin_head', 'replace_default_featured_image_meta_box', 100 );
function replace_default_featured_image_meta_box() {
    add_meta_box('postimagediv', 'FoG Hacker Image', 'post_thumbnail_meta_box', 'hackers', 'side', 'high');
    add_meta_box('postexcerpt', 'FoG Hacker Description', 'post_excerpt_meta_box', 'hackers', 'normal', 'high');
    
    remove_meta_box( 'postimagediv', 'my-post-type-here', 'side' );
    remove_meta_box( 'postexcerpt', 'post', 'side' );
}

/*
 * Add reStructuredText to upload mimetypes
 * Fixes BZ #687843
 */

add_filter('upload_mimes', 'custom_mimes_types');

function custom_mimes_types ($existing_mimes) {

    // Add file extension 'extension' with mime type 'mime/type'
    $existing_mimes['rst'] = 'text/restructured';

    return $existing_mimes;
}

/*
 * Bootstrap Walker for the menu
 */

require_once('lib/wp-bootstrap-navwalker.php');

/*
 * Add img-responsive CSS class to all post images
 */

function bootstrap_responsive_images( $html ){
  $classes = 'img-responsive'; // separated by spaces, e.g. 'img image-link'
  // check if there are already classes assigned to the anchor
  if ( preg_match('/<img.*? class="/', $html) ) {
    $html = preg_replace('/(<img.*? class=".*?)(".*?\/>)/', '$1 ' . $classes . ' $2', $html);
  } else {
    $html = preg_replace('/(<img.*?)(\/>)/', '$1 class="' . $classes . '" $2', $html);
  }
  // remove dimensions from images, does not need it!
  $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
  return $html;
}
add_filter( 'the_content','bootstrap_responsive_images',10 );

/*
 * GNOME Grass Customizer
 */

require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/grass-sanitize.php';

/**
 * Order posts by the last word in the post_title.
 * Activated when orderby is 'wpse_last_word'
 * @link http://wordpress.stackexchange.com/a/198624/26350
 * 
 * Used in Foundation page to sort the Directors
 */

add_filter( 'posts_orderby', function( $orderby, \WP_Query $q )
{
    if( 'wpse_last_word' === $q->get( 'orderby' ) && $get_order =  $q->get( 'order' ) )
    {
        if( in_array( strtoupper( $get_order ), ['ASC', 'DESC'] ) )
        {
            global $wpdb;
            $orderby = " SUBSTRING_INDEX( {$wpdb->posts}.post_title, ' ', -1 ) " . $get_order;
        }
    }
    return $orderby;
}, PHP_INT_MAX, 2 );
