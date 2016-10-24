<?php

require_once("header.php"); ?>

		<!-- container -->
    <div id="container">
        <div class="container">
            <div class="page_title">
                <h1><?php echo __('Friends of GNOME', 'grass');?></h1>
            </div>
            
			<div class="content">
				<div class="grid_12">
					<img class="img-responsive" src="<?php bloginfo('stylesheet_directory'); ?>/images/donations/friends-banner.png" alt="">
					<p><?php _e( "Joining Friends of GNOME is the best way to support GNOME. Regular monthly subscriptions provide us with predictable income that we can use to keep the GNOME Foundation's lights on.", 'grass' ); ?></p>
				</div>

				<?php while ( have_posts() ) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; // End the loop. Whew. ?>

				<div class="clearfix"></div>

				<form id="donate_form" class="form-horizontal" action="https://www.paypal.com/cgi-bin/webscr" method="post" name="application_form">
					<input type="hidden" name="business" value="friends@gnome.org" />
					<input type="hidden" name="return" value="http://www.gnome.org/thank-you/" />
					<input type="hidden" name="item_name" value="Friends of GNOME - Adopt a hacker monthly subscription" />
					<input type="hidden" name="notify_url" value="https://muelli.cryptobitch.de/paypaltest/ipnhandler.php" /> 

					<!-- Specify a Subscribe button. -->
					<input type="hidden" name="cmd" value="_xclick-subscriptions" />
					<!-- Define the intervals between payments. "1" means every period. -->
					<input type="hidden" name="p3" value="1" />
					<!-- "t3" defines the period duration (D=days; W=weeks; M=months and Y=Years). -->
					<input id="t3" type="hidden" name="t3" value="M" />
					<!-- "src" with a value of "1" causes it to repeat for every interval. -->
					<input type="hidden" name="src" value="1" />
					<!-- Reattempt on failure. If a recurring payment fails, PayPal attempts to collect the payment two more times before canceling the subscription. See https://cms.paypal.com/us/cgi-bin/?cmd=_render-content&#038;content_ID=developer/e_howto_html_Appx_websitestandard_htmlvariables -->
					<input type="hidden" name="sra" value="1" />

					<input type="hidden" name="on1" value="Favorite Hacker" />


				<div class="col-md-12">
					<h3><?php _e( 'Monthly subscription amount', 'grass'); ?></h3>
						<div class="form-group">
                            <div class="col-sm-2">
                                <label class="control-label"><?php _e( 'Currency', 'grass' ); ?></label>
                            </div>
                            <div class="col-sm-10">
								<label class="radio-inline">
									<input type="radio" name="os0" value="USD" id="cur-usd" onClick="document.getElementById('cur').value=this.value" checked="checked"/>$ USD
								</label>
								<label class="radio-inline">
									<input type="radio" name="os0" value="EUR" id="cur-eur" onClick="document.getElementById('cur').value=this.value"/>&euro; EUR
									<input type="hidden" name="currency_code" value="" id="cur">
								</label>
							</div>
						</div>

						<div class="form-group">
                            <div class="col-sm-2">
                                <label class="control-label" for="amount"><?php _e( 'Amount', 'grass' ); ?></label>
                            </div>
							<div class="col-sm-10">
                                <div class="col-md-2" style="margin: 0px 0px 15px;">
								<input type="hidden" name="cmd" value="_xclick-subscriptions" />
								<input type="text" disabled class="currency" placeholder="$" style="background: #fff; border: 0; width: 10px;"/>
								<input id="amount" type="tel" style="width: 65px;" name="a3" size="5" value="25" required />
                                </div>
								<div id="validation-msg" class="help-inline col-md-8"></div>
							</div>
						</div>

						<p style="color: gray;">Regular donations can only be made through PayPal. Subscription payments will continue until you contact the GNOME Foundation to cancel the payments. For other ways to pay, see <a href="#">donate to GNOME</a></p>

						<h3><?php _e( 'Adopt a hacker!', 'grass' ); ?></h3>
						<p><?php _e( 'Select which of our dedicated hackers you would like to receive a thank you post card from.', 'grass' ); ?></p>
						
                        <!-- Show the hackers -->
						<div class="control-group">
                        <?php
                            $original_query = clone $wp_query;
                            // Show 8 hackers in alphabetical order
                            query_posts(array('post_type' => 'hackers', 'posts_per_page' => 8, 'orderby'=> 'title', 'order' => 'ASC'));
                        ?>
                            
                        <?php while ( have_posts() ) : the_post(); ?>
                        <div id="fog-hackers" class="col-xs-10 col-sm-6">
                            <div class="media">
                                <div class="pull-left" style="margin-top: 25px;">
                                    <input class="radio" type="radio" name="os1" value="You will receive a postcard from <?php the_title(); ?>" required >
                                </div>

                                <div class="media-left">
                                    <?php
                                        if (has_post_thumbnail($post->ID)) {
                                            echo get_the_post_thumbnail($post->ID, 'fog-hacker-icon', array( 'class' => 'media-object pull-left' ));
                                        } else {
                                            echo '<img src="'.get_bloginfo('template_url').'/images/photo-missing.png" class="media-object pull-left" alt="" />';
                                        }
                                    ?>
                                </div>

                                <div class="media-body media-middle">
                                    <p class="media-heading"><?php the_content(); ?></p>
                                    <?php
                                        if (has_excerpt( $post->ID )) {
                                            the_excerpt();
                                        } else {
                                            echo 'FoG Hacker';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; // End the loop. Whew. ?>
						</div>
                        
                        <div class="clearfix"></div>

						<h3>Details</h3>
						<div class="form-group">
                            <div class="checkbox col-md-12">
							<label>
								<input type="hidden" name="os2" id="list_donor" value="No" />
								<input name="os2" id="list_donor" type="checkbox" value="Yes" checked /> <?php _e( 'Include me on the list of donors', 'grass' ); ?>
								<input type="hidden" name="on2" value="List me on the donors page" />
							</label>
                            </div>
                            <div class="checkbox col-md-12">
							<label>
								<input type="hidden" name="os3" id="notify_donor" value="No" />
								<input name="os3" id="notify_donor" type="checkbox" value="Yes" checked /> <?php _e( "GNOME can contact me by email (we don't do this very often)", 'grass' ); ?>
								<input type="hidden" name="on3" value="Keep me updated by email" />
							</label>
                            </div>
						</div>            

						<!-- Display the payment button. -->
						<button id="subscription-btn" class="btn btn-success" type="submit" name="submit"><?php _e( 'Subscribe', 'grass' ); ?></button>
				</div>
				</form>
			</div> <!-- END content -->
<?php require_once("footer_art.php"); ?>
		</div> <!-- END .container -->
	</div> <!-- END #container -->        

    <div class="clearfix"></div>
    
    <?php require_once("footer.php"); ?>
</body>
</html>
