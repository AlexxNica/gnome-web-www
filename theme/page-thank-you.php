<?php

add_action('wp_head', function() {
    echo '<link rel="stylesheet" type="text/css" media="all" href="'.get_bloginfo('template_url').'/css/friends20.css" />' . "\n";
    echo '<script type="text/javascript" src="'.get_bloginfo('template_url').'/js/friends.js"></script>' . "\n";
    echo '<script type="text/javascript" src="'.get_bloginfo('template_url').'/js/clipboard.min.js"></script>' . "\n";
});

require_once("header.php"); ?>

	<!-- container -->
    <div id="container">
        <div class="container">
            <div class="page_title">
                <h1><?php echo __('Thank you!', 'grass');?></h1>
            </div>
            
			<div class="content">
				<div class="col-md-12 text-center">
					<img class="img-responsive" src="<?php bloginfo('stylesheet_directory'); ?>/images/donations/thankyou-banner.png" alt="">
					<div class="main_feature">
                		<p><?php _e( 'Thank you for supporting GNOME and our mission to give everyone access to Free Software.', 'grass' ); ?></p>
            		</div>
				</div>

				<?php while ( have_posts() ) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; // End the loop. Whew. ?>

				<div class="clearfix"></div>
					
				<div id="thankyou" class="col-md-12">
					<h3><?php _e( "Show that you're a Friend of GNOME", 'grass' ); ?></h3>
					<p><?php _e( "Tell your social networks that you're a Friend of GNOME!", 'grass' ); ?></p>

					<a href="https://twitter.com/share?
					url=https://gnome.org/friends
					&related=gnome
					&text=I've become a Friend of GNOME! Find out more at"
					onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
					<i class="fa fa-twitter"></i>
					</a>

					<a href="https://plus.google.com/share?url=https://gnome.org/friends"
					onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                    <i class="fa fa-google-plus"></i>
					</a>
					
					<a href="https://www.facebook.com/sharer/sharer.php?u=https://gnome.org/friends"
					onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                    <i class="fa fa-facebook"></i>
					</a>
				</div>
				
				<div class="col-md-12">
					<h3><?php _e( 'Get a badge', 'grass' ); ?></h3>
					<p><?php _e( "To show that you're a Friend of GNOME, you can put one of these badges on your blog or website.", 'grass' ); ?></p>
                    
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

                    <br> <br>

                    <div class="row hide" id="badgecode-container">
                      <div class="col-sm-8">
                        <?php _e( 'Your code is ready!', 'grass' ); ?>
                        <div class="input-group">
                          <input type="text" class="form-control" id="badgecode" value="">
                          <span class="input-group-btn">
                            <button class="btn btn-success" data-clipboard-target="#badgecode" type="button"><?php _e( 'Copy code', 'grass' ); ?></button>
                          </span>
                        </div>
                      </div>
                    </div>
                </div>
			</div> <!-- END content -->
<?php $footer_art = 'friends'; ?>
<?php require_once("footer_art.php"); ?>
		</div> <!-- END .container -->
	</div> <!-- END #container -->

    <div class="clearfix"></div>
    
    <?php require_once("footer.php"); ?>
</body>
</html>
