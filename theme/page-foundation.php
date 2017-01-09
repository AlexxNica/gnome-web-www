<?php get_header(); ?>

        <!-- container -->
        <div class="container">
            <div id="foundation" class="content">
                <div class="col-md-12">            
                    <div class="page_title">
                        <h1><?php the_title(); ?></h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-7">
                            <p class="main_feature"><?php esc_html_e('The GNOME Foundation is a non-profit organization that furthers the goals of the GNOME Project, helping it to create a free software computing platform for the general public that is designed to be elegant, efficient, and easy to use.', 'grass'); ?></p>
                        </div>
                        <div class="col-md-4">
                            <img class="hidden-xs hidden-sm" style="position: absolute; margin-top: -25px; margin-left: 140px;" src="<?php bloginfo('stylesheet_directory'); ?>/images/foundation/foundation_balloon.png" alt="GNOME Balloon"/>
                        </div>
                    </div>
                </div>

                <hr class="bottom_shadow" />

                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-4">
                            <img class="hidden-xs hidden-sm" style="margin-top: 160px;" src="<?php bloginfo('stylesheet_directory'); ?>/images/foundation/foundation_back_balloons.png" alt="GNOME Balloons"/>
                        </div>
                        <div class="col-md-8">
                            <h2><?php esc_html_e('How it works', 'grass'); ?></h2>
                            <p><?php esc_html_e('While the many GNOME contributors develop code, smash bugs, write documentation, and help users, the Foundation acts as a guiding hand in the process and provides resources and infrastructure. It steers releases, determines what software is officially part of the Project, and acts as the official face of the GNOME Project to the outside world, though it delegates most of its authority to specialized teams.', 'grass'); ?></p>
                            <p>But that face, like the face of GNOME itself, is made by you. The <a href="/foundation/membership/">GNOME Foundation membership</a> is open to all GNOME contributors, and every member of the Board of Directors is a contributing member of the GNOME community. Becoming a member of the Foundation strengthens your voice in the Project and gives you an opportunity to vote on goals that will steer the GNOME Project into the future.</p>
                        </div>
                    </div>
                </div>

                <hr class="top_shadow" />

                <div class="row foundation_advisory_board text-center">
                    <h2><?php esc_html_e('Supporting organizations', 'grass'); ?></h2>
                    <div class=" col-sm-12">
                        <?php while ( have_posts() ) : the_post(); ?>
                            <?php the_content(); ?>
                        <?php endwhile; // End the loop. Whew. ?>
                        <p><a href="https://wiki.gnome.org/AdvisoryBoard"><?php esc_html_e('You can find more information about our Advisory Board on the wiki.', 'grass'); ?></a></p>
                    </div>
                </div>

                <hr class="bottom_shadow" />

                <div class="row board-of-directors">
                    <div class="col-sm-12">
                        <div class="col-sm-5">
                            <h2><?php esc_html_e('Board of Directors', 'grass'); ?></h2>
                            <p>The GNOME Foundation is run by a <a href="governance">Board of Directors</a>, which is elected annually by the GNOME community, as the GNOME Membership, to carry out much of the GNOME Foundation’s tasks.</p>
                            <p>The meetings of the Board of Directors are posted publicly on the <a href="https://mail.gnome.org/archives/foundation-list/">foundation-list mailing list</a> and on the <a href="https://wiki.gnome.org/FoundationBoard/Minutes">Minutes wiki</a> page for easier access.</p>
                        </div>

                        <div class="col-sm-7">
                            <div class="foundation_board">
                                <?php
                                    $original_query = clone $wp_query;
                                    // Show Board Directors sorted by their last name
                                    query_posts(array('post_type' => 'directors', 'posts_per_page' => 7, 'orderby'=> 'wpse_last_word', 'order' => 'ASC'));
                                ?>

                                <?php while ( have_posts() ) : the_post(); ?>
                                    <div class="media">
                                        <div class="media-left">
                                            <?php
                                                if (has_post_thumbnail()) {
                                                    echo the_post_thumbnail('fog-hacker-icon', array( 'class' => 'media-object pull-left' ));
                                                } else {
                                                    echo '<img src="'.get_bloginfo('template_url').'/images/photo-missing.png" class="" alt="" />';
                                                }
                                            ?>
                                        </div>
                                        <div class="media-body media-middle">
                                            <?php the_title(); ?>
                                        </div>
                                    </div>
                                <?php endwhile; // End the loop. Whew. ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- END content -->
        </div> <!-- END container -->
 
    <div class="clearfix"></div>
    
<?php get_footer(); ?>
