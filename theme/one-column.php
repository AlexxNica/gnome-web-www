<?php
/*
Template Name: One Column
*/
?>

<?php get_header(); ?>

    <!-- container -->
    <div class="container two_columns">
        <div class="content without_sidebar">
            <div class="col-sm-12">

                <div class="page_title">
                    <h1><?php the_title(); ?></h1>
                </div>

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
