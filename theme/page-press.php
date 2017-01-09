<?php
/**
 * @package GNOME Website
 * @subpackage Grass Theme
 */

$is_news_home = true;

/*
 * Add link to press feeds instead of current page comments
 */
add_action('wp_head', function() {
   echo '<link rel="alternate" type="application/rss+xml" title="'.get_bloginfo('name').' &raquo; ' . get_the_title() . ' Feed" href="'.home_url('/').'category/press/feed/" />'; 
});
?>

<?php get_header(); ?>

    <!-- container -->
    <div id="container" class="two_columns">
        <div class="container">
            <div class="col-xs-12">
                <div class="page_title">
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
            
            <div class="content col-md-8">
            
                <?php the_content(); ?>
                <?php
                
                $original_query = clone $wp_query;
                
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                get_query_var('page');
                query_posts(array('post_type' => 'post', 'category_name' => 'press', 'posts_per_page' => 10, 'paged' => $paged));
                
                ?>
                
                <ul class="press_list">
                    <?php $current_year = ''; ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php if ($current_year != get_the_date('Y')) echo '<li class="year"><span>'.get_the_date('Y').'</span></li>'; ?>
                        <li>
                            <span class="date"><?php the_date(); ?></span>
                            <a href="<?php the_permalink();?>"><?php the_title(); ?></a>
                        </li>
                        <?php $current_year = get_the_date('Y'); ?>
                    <?php endwhile; // End the loop. Whew. ?>
                </ul>
                
                <?php if (  $wp_query->max_num_pages > 1 ) : ?>
                <div class="page_navigation">
                    <span class="next"><?php previous_posts_link(__('Newer press releases', 'grass')); ?></span>
                    <span class="prev"><?php next_posts_link(__('Older press releases', 'grass')); ?></span>
                    <div class="clear"></div>
                </div>
                <?php endif; ?>
                <div class="clear"></div>
                <div class="clearfix"></div>
            </div>
            
            <div class="sidebar col-md-4">
                
                <?php require_once("news_sidebar.php");?>
                
            </div>
        </div>
    </div>
    
    <div class="clearfix"></div>
    
<?php get_footer(); ?>
