<?php
/*
Template Name: One Column without page title
*/
?>

<?php get_header(); ?>

    <!-- container -->
    <div class="container two_columns">
        <div class="content without_sidebar row">
            <div class="col-xs-12">
            <?php while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; // End the loop. Whew. ?>
                <br />
                <div class="clear"></div>
            </div>
        </div>
    </div>
    
    <div class="clearfix"></div>
    
<?php get_footer(); ?>
