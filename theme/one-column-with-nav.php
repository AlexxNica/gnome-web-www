<?php
/*
Template Name: One Column with Foundation Navigation
*/
?>

<?php get_header(); ?>

    <!-- container -->
    <div class="container two_columns">
        <div id="foundation">
            <div class="col-sm-12">

                <div class="page_title">
                    <h1><?php the_title(); ?></h1>
                </div>

                <div class="clearfix"></div>
                <div class="content without_sidebar">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php the_content(); ?>
                    <?php endwhile;?>
                    <br />
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

<?php get_footer(); ?>
