<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
 
show_admin_bar(true);

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
    wp_enqueue_script( 'responsive-menu', get_template_directory_uri() . '/js/responsive.js', array('jquery'), null, true);

    // Common stylesheets
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );

    // Scripts and styles for page-friends-of-gnome and page-donate
    if (is_page( array('friends', 'donate', 'support-us')) ) {
        friends_common_resources();
    }
    
    // Scripts and styles for page-thank-you
    if (is_page('thank-you')) {
        friends_common_resources();
        wp_enqueue_script( 'clipboard', get_template_directory_uri() . '/js/clipboard.min.js', array('jquery'), null, true);
    }
    
    // Scripts and styles for page-support-us
    if (is_page('support-us')) {
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

function special_nav_class($classes, $item){
    if($item->title == "Foundation +"){
        $classes[] = "foundation-menu-item";
    }
    return $classes;
}

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);



/*
 * Theme settings menu
 */

function theme_settings_page() {
?>
    <div class="wrap">
    <h2>Theme Settings</h2>
    <p>Theme settings for various pages.</p>
    <form method="post" action="options.php">
        <?php
            settings_fields("section");
            do_settings_sections("theme-options");
            submit_button();
        ?>
    </form>
    </div>
<?php
}

function add_theme_menu_item() {
    add_menu_page("Theme Panel", "Theme Settings", "manage_options", "theme-panel", "theme_settings_page", null, 99);
}

function show_year() {
?>
    <input type="text" class="regular-text" name="support_year" id="support_year" value="<?php echo get_option('support_year'); ?>" />
    <p>The year of the hackfests.</p>
<?php
}

function show_contributors() {
?>
    <input type="text" class="regular-text" name="support_contributors" id="support_contributors" value="<?php echo get_option('support_contributors'); ?>" />
    <p>Enter the number of sponsored contributors.</p>
<?php
}

function show_hackfests() {
?>
    <input type="text" class="regular-text" name="support_hackfests" id="support_hackfests" value="<?php echo get_option('support_hackfests'); ?>" />
    <p>Enter the number of sponsored hackfests.</p>
<?php
}

function show_screenshot() {
?>
    <input type="text" class="regular-text" name="homepage_screenshot" id="homepage_screenshot" value="<?php echo get_option('homepage_screenshot'); ?>" />
<?php
}


function display_theme_panel_fields() {
    add_settings_section("section", null, null, "theme-options");

    add_settings_field("homepage_screenshot", "Release screenshot (URL)", "show_screenshot", "theme-options", "section");
    add_settings_field("support_year", "Year", "show_year", "theme-options", "section");
    add_settings_field("support_contributors", "Contributors", "show_contributors", "theme-options", "section");
    add_settings_field("support_hackfests", "Hackfests", "show_hackfests", "theme-options", "section");

    register_setting("section", "homepage_screenshot");
    register_setting("section", "support_year");
    register_setting("section", "support_contributors");
    register_setting("section", "support_hackfests");
}

add_action("admin_init", "display_theme_panel_fields");
add_action("admin_menu", "add_theme_menu_item");

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

register_nav_menus( array(
        'primary' => 'Navbar Menu', 'grass',
) );

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
