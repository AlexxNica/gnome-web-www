<?php
/**
 * @package GNOME Website
 * @subpackage Grass Theme
 */
?>

<?php get_header(); ?>

    <!-- container -->
    <div class="container two_columns">
        <div class="col-xs-12">
            <?php require_once('inc/page-title.php'); ?>

            <div class="content col-md-9">
            <?php while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; // End the loop. Whew. ?>
                <br />
                <div class="clear"></div>
            </div>
            
            <div class="sidebar col-md-3">
                
                <?php
                $parent_id  = $post->post_parent;
                $breadcrumbs = array();
                while ($parent_id) {
                    $page = get_page($parent_id);
                    $breadcrumbs[] = get_page($parent_id);
                    $parent_id  = $page->post_parent;
                }
                $breadcrumbs = array_reverse($breadcrumbs);
                if (isset($breadcrumbs[0])) {
                    $first_page = $breadcrumbs[0];
                } else {
                    $first_page = NULL;
                }
                ?>

                <?php if(is_page()) {?>
                <ul class="navigation_list">
                    <?php
                    if(isset($first_page) && $first_page->ID != '') {
                        wp_list_pages(array('title_li' => '', 'include' => $first_page->ID));
                        wp_list_pages(array('title_li' => '', 'child_of' => $first_page->ID));
                    } else {
                        wp_list_pages(array('title_li' => '', 'include' => $post->ID));
                        wp_list_pages(array('title_li' => '', 'child_of' => $post->ID));
                    }
                    ?>
                </ul>
                <?php } ?>            
            </div>
        </div>
    </div>

    <div class="clearfix"></div>
    
<?php get_footer(); ?>
