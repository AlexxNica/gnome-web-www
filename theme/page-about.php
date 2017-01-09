<?php get_header(); ?>

    <div class="container"> 
        <div class="content">
            <div class="col-md-12 text-center">
                <?php
                    if ( has_post_thumbnail() ) {
                        the_post_thumbnail( 'full', array( 'class'  => 'img-responsive center-block featured-banner' ) );
                    } 
                ?>
                <p class="main_feature text-center"><?php esc_html_e('We promote software freedom', 'grass'); ?></p>
                <p><?php esc_html_e('GNOME brings companies, volunteers, professionals and non-profits together from around the world. We make GNOME 3: a complete free software solution for everyone.', 'grass'); ?></p>
            </div>

            <?php while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; // End the loop. Whew. ?>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="col-sm-6">
                        <h2><?php esc_html_e('Independent', 'grass'); ?></h2>
                        <p><?php esc_html_e('GNOME is led by the non-profit GNOME Foundation. Our board is democratically elected, and technical decisions are made by the engineers doing the work. We are supported by many organizations; employees from over a hundred companies have contributed since the project began.', 'grass'); ?></p>
                    </div>
                    <div class="col-sm-6">
                        <h2><?php esc_html_e('Free', 'grass'); ?></h2>
                        <p><?php esc_html_e('We believe that software should be developed in the open. Our development infrastructure and communication channels are public, and our code can be freely downloaded, modified and shared with others. All our contributors have the same rights.', 'grass'); ?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-sm-6">
                        <h2><?php esc_html_e('Connected', 'grass'); ?></h2>
                        <p><?php esc_html_e('Our project is an important part of the Free Software ecosystem. We work with other free projects to create high-quality solutions that span the entire software stack.', 'grass'); ?></p>
                    </div>
                    <div class="col-sm-6">
                        <h2><?php esc_html_e('People-focused', 'grass'); ?></h2>
                        <p><?php esc_html_e('Our software is translated into many languages and comes with built in accessibility features. This means that it can be used by anyone, regardless of the language they speak or their physical abilities.', 'grass'); ?></p>
                    </div>
                </div>
            </div>
        </div> <!-- END content -->
    </div> <!-- END container -->

<div class="clearfix"></div>
    
<?php get_footer(); ?>
