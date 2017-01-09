<?php
/**
 * @package GNOME Website
 * @subpackage Grass Theme
 */
?>

<?php get_header(); ?>

    <!-- container -->
    <div class="container two_columns">

            <?php if ( have_posts() ) : ?>
                <div class="page_title">
                    <h1><?php esc_html_e( 'Looking for', 'grass' ); ?> <em><?php echo htmlentities(strip_tags($_GET['s']));?></em>...</h1>
                </div>
                
                <div class="content">
                    <dl>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <dt><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></dt>
                        <dd><?php the_excerpt(); ?></dd>
                    <?php endwhile; // End the loop. Whew. ?>
                    </dl>
                    
                    <?php if (  $wp_query->max_num_pages > 1 ) : ?>
                    <div class="page_navigation">
                        <span class="prev"><?php previous_posts_link(__('Previous page', 'grass')); ?></span>
                        <span class="next"><?php next_posts_link(__('Next page', 'grass')); ?></span>
                        <div class="clear"></div>
                    </div>
                    <?php endif; ?>
                    <div class="clear"></div>
                </div>
                
                <div class="sidebar">
                    &nbsp;
                </div>
                
            <?php else : ?>
            
                <div class="content without_sidebar">
                    
                    <div class="col-lg-7 col-lg-offset-0 col-sm-8 col-sm-offset-0 col-xs-7 col-xs-offset-2">
                    
                        <p><?php get_search_form(); ?></p>
                        
                        <hr />
                    
                        <h2><?php esc_html_e( 'Sorry, but nothing was found.', 'grass' ); ?></h2>
                        
                        <p><?php esc_html_e( 'Suggestions:', 'grass' ); ?></p>
                        
                        <ul>
                            <li><?php esc_html_e( 'Make sure all words are spelled correctly.', 'grass' ); ?></li>
                            <li><?php esc_html_e( 'Try different keywords.', 'grass' ); ?></li>
                            <li><?php esc_html_e( 'Try fewer keywords.', 'grass' ); ?></li>
                        </ul>
                        
                        <p>
                        <?php
                        printf(
                              /* translators: %1$s is the search keyword, %2$s refers to Google */  __( 'If you feel lost, you may want to search for %1$s in all GNOME websites on %2$s.', 'grass'),
                                '“'.htmlspecialchars(stripslashes(strip_tags($_GET['s']))).'”',
                                '<a href="http://google.com/search?q='.htmlspecialchars(stripslashes(strip_tags($_GET['s']))).'%20site:gnome.org">Google</a>'
                            );
                        ?>
                        </p>
                        
                        <!-- Never to get lost is not to live. -->
                        
                    </div>
                    <div class="clear"></div>
                    
            </div>
            <?php endif; ?>
    </div>
    
    <div class="clearfix"></div>
    
<?php get_footer(); ?>
