<?php get_header(); ?>

    <!-- container -->
    <div class="container">
        <div class="content">
            <div class="col-md-12">
                <div class="page_title">
                    <h1><?php esc_html_e('Thank you!', 'grass');?></h1>
                </div>
                <?php
                    if ( has_post_thumbnail() ) {
                        the_post_thumbnail( 'full', array( 'class'  => 'img-responsive center-block featured-banner' ) );
                    }
                ?>
                <p class="main_feature text-center"><?php esc_html_e( 'Thank you for supporting GNOME and our mission to give everyone access to Free Software.', 'grass' ); ?></p>
            </div>

            <?php while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; // End the loop. Whew. ?>

            <div class="clearfix"></div>

            <div id="thankyou" class="col-md-12">
                <h3><?php esc_html_e( "Show that you're a Friend of GNOME", 'grass' ); ?></h3>
                <p><?php esc_html_e( "Tell your social networks that you're a Friend of GNOME!", 'grass' ); ?></p>

                <a href="https://twitter.com/share?url=https://gnome.org/friends&related=gnome&text=I've become a Friend of GNOME! Find out more at" aria-label="Share on Twitter"
                    onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                    <i class="fa fa-twitter" aria-hidden="true" title="Share on Twitter"></i>
                </a>

                <a href="https://plus.google.com/share?url=https://gnome.org/friends" aria-label="Share on Google Plus"
                    onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                    <i class="fa fa-google-plus" aria-hidden="true" title="Share on Google Plus"></i>
                </a>

                <a href="https://www.facebook.com/sharer/sharer.php?u=https://gnome.org/friends" aria-label="Share on Facebook"
                    onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                    <i class="fa fa-facebook" aria-hidden="true" title="Share on Facebook"></i>
                </a>
            </div>

            <div class="col-md-12">
                <h3><?php esc_html_e( 'Get a badge', 'grass' ); ?></h3>
                <p><?php esc_html_e( "To show that you're a Friend of GNOME, you can put one of these badges on your blog or website.", 'grass' ); ?></p>
                    <div class="row" id="badges">
                        <div class="col-sm-2">
                            <img src="https://static.gnome.org/friends/banners/fog-125x125.png" alt="Become a Friend of GNOME" border="0" hspace="3" />
                        </div>
                                
                        <div class="col-sm-2">
                            <img src="https://static.gnome.org/friends/banners/friends-of-gnome.png" alt="Become a Friend of GNOME" border="0" hspace="3" />			
                        </div>
                                
                        <div class="col-sm-2">
                            <img src="https://static.gnome.org/friends/banners/gnome-lover.png" alt="Become a Friend of GNOME" border="0" hspace="3" />
                        </div>
                    </div>

                    <br><br>

                    <div class="row hide" id="badgecode-container">
                      <div class="col-sm-8">
                        <?php esc_html_e( 'Your code is ready!', 'grass' ); ?>
                        <div class="input-group">
                          <input type="text" class="form-control" id="badgecode" value="">
                            <span class="input-group-btn">
                                <button class="btn btn-success" data-clipboard-target="#badgecode" type="button"><?php esc_html_e( 'Copy code', 'grass' ); ?></button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- END content -->
    </div> <!-- END .container -->

    <div class="clearfix"></div>
    
<?php get_footer(); ?>
