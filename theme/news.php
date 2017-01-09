<?php
/**
 * @package GNOME Website
 * @subpackage Grass Theme
 */

/*
 * Add link to global feeds instead of current page comments
 */
add_action('wp_head', function() {
   echo '<link rel="alternate" type="application/rss+xml" title="'.get_bloginfo('name').' &raquo; Feed" href="'.home_url('/').'feed/" />'; 
});
?>

<?php get_header(); ?>

    <!-- container -->
    <div class="container two_columns">
            <div class="col-xs-12">
                <div class="page_title">
                    <h1><a href="<?php bloginfo('url'); ?>/news/"><?php esc_html_e('News', 'grass');?></a></h1>
                </div>
            </div>
            <div class="content col-md-9">
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="news_title">
                    <p class="date"><?php the_date(); ?></p>
                    <h1><?php the_title(); ?></h1>
                </div>
                <?php the_content(); ?>
            <?php endwhile; // End the loop. Whew. ?>
                <br />
                <div class="clear"></div>
            </div>
            
            <div class="sidebar col-md-3">
            
                <?php require_once("news_sidebar.php");?>
                      
            </div>
    </div>
    
    <div class="clearfix"></div>
    
<?php get_footer(); ?>
