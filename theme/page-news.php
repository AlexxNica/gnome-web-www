<?php
/**
 * @package GNOME Website
 * @subpackage Grass Theme
 */

$is_news_home = true;

/*
 * Add link to global feeds instead of current page comments
 */
add_action('wp_head', function() {
   echo '<link rel="alternate" type="application/rss+xml" title="'.get_bloginfo('name').' &raquo; Feed" href="'.home_url('/').'feed/" />'; 
});
?>

<?php get_header(); ?>

    <!-- container -->
    <div id="container" class="two_columns">
        <div class="container">
            <div class="col-xs-12">
                <div class="page_title">
                    <h1><?php esc_html_e('News', 'grass');?></h1>
                </div>
            </div>
            <div class="content col-md-9">
            
                <?php the_content(); ?>
                <?php
                
                $original_query = clone $wp_query;
                
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                get_query_var('page');
                query_posts(array('post_type' => 'post', 'posts_per_page' => 10, 'paged' => $paged));
                
                ?>
                
                <ul class="news_list">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <li>
                            <span class="date"><?php the_date(); ?></span>
                            <a href="<?php the_permalink();?>"><?php the_title(); ?></a>
                            <p><?php the_excerpt(); ?></p>
                        </li>
                    <?php endwhile; // End the loop. Whew. ?>
                </ul>
                
                <?php if (  $wp_query->max_num_pages > 1 ) : ?>
                <div class="page_navigation clearfix">
                    <span class="next"><?php previous_posts_link(__('Newer posts', 'grass')); ?></span>
                    <span class="prev"><?php next_posts_link(__('Older posts', 'grass')); ?></span>
                </div>
                <?php endif; ?>
                <div class="clear"></div>
            </div>
            
            <div class="sidebar col-md-3">
                <?php require_once("news_sidebar.php");?>
            </div>
        </div>
    </div>
    
    <div class="clearfix"></div>
    
<?php get_footer(); ?>
