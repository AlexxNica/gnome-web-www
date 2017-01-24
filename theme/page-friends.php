<?php get_header(); ?>

    <!-- container -->
    <div class="container">
        <div class="row content">
            <div class="col-xs-12">
                <div class="page_title">
                    <h1><?php esc_html_e('Become a Friend of GNOME', 'grass');?></h1>
                </div>

                <p class="main_feature"><?php esc_html_e( "Join today to help GNOME continue its mission.", 'grass' ); ?></p>

                <?php while ( have_posts() ) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; // End the loop. Whew. ?>

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12">
                        <form id="donate_form" class="form-horizontal" action="https://www.paypal.com/cgi-bin/webscr" method="post" name="application_form">
                            <input type="hidden" name="business" value="friends@gnome.org" />
                            <input type="hidden" name="return" value="https://www.gnome.org/thank-you/" />
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

                            <h3><?php esc_html_e( 'Monthly subscription amount', 'grass'); ?></h3>

                            <div class="form-group">
                                <div class="col-sm-2 col-md-1">
                                    <label class="control-label"><?php esc_html_e( 'Currency', 'grass' ); ?></label>
                                </div>
                                <div class="col-sm-10 col-md-11">
                                    <label class="radio-inline">
                                        <input type="radio" name="os0" value="USD" id="cur-usd" checked="checked"/>$ USD
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="os0" value="EUR" id="cur-eur"/>&euro; EUR
                                        <input type="hidden" name="currency_code" value="" id="cur">
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-2 col-md-1">
                                    <label class="control-label" for="amount"><?php esc_html_e( 'Amount', 'grass' ); ?></label>
                                </div>
                                <div class="col-sm-5 col-md-2 no-padding">
                                    <div class="col-xs-12 col-sm-3 col-md-6 col-lg-5 input-group">
                                        <span class="input-group-addon input-group-no-bg">$</span>
                                        <input type="hidden" name="cmd" value="_xclick-subscriptions" />
                                        <input id="amount" type="number" class="form-control" name="a3" min="5" step="1" value="25" required="" aria-describedby="validation-msg"/>
                                    </div>
                                </div>
                                <div class="alert-validation-container">
                                    <div id="validation-msg" class="col-sm-7 col-md-8 col-lg-7 help-block"></div>
                                </div>
                            </div>

                            <p class="text-gray">Subscription payments will continue until you contact the GNOME Foundation to cancel the payments. Regular donations can only be made through PayPal. <a href="../donate">One time donations</a> can be made using other payment methods, but do not qualify for Friends of GNOME membership.</p>

                            <div class="col-sm-12 no-padding">
                                <h3><?php esc_html_e( 'Adopt a hacker!', 'grass' ); ?></h3>
                                <p><?php esc_html_e( 'Select which of our dedicated hackers you want to receive a thank you post card from.', 'grass' ); ?></p>
                            </div>

                            <!-- Show the hackers -->
                            <div class="control-group">
                                <?php
                                    $original_query = clone $wp_query;
                                    // Show 8 hackers in alphabetical order
                                    query_posts(array('post_type' => 'hackers', 'posts_per_page' => 8, 'orderby'=> 'title', 'order' => 'ASC'));
                                    // Set variables for the checked attribute. Add it only on the first radio button.
                                    $checked_attr = 'checked="checked"';
                                    $is_checked = true;
                                ?>

                                <?php while ( have_posts() ) : the_post(); ?>
                                <div class="fog-hackers col-xs-10 col-sm-6">
                                    <div class="media">
                                        <div class="pull-left" style="margin-top: 25px;">
                                            <input id="fog-<?php the_ID(); ?>" class="radio" type="radio" name="os1" value="You will receive a postcard from <?php the_title(); ?>" required="" <?php if ($is_checked) echo $checked_attr; ?>  >
                                        </div>

                                        <div class="media-left">
                                            <?php
                                                if (has_post_thumbnail()) {
                                                    echo the_post_thumbnail('fog-hacker-icon', array( 'class' => 'media-object pull-left'));
                                                } else {
                                                    echo '<img src="'.get_bloginfo('template_url').'/images/photo-missing.png" class="media-object pull-left" alt="the_photo_is_missing" />';
                                                }
                                            ?>
                                        </div>

                                        <div class="media-body media-middle">
                                            <p class="media-heading">
                                                <label for="fog-<?php the_ID(); ?>"><?php the_title(); ?></label>
                                            </p>
                                            <?php
                                                if (has_excerpt( $post->ID )) {
                                                    the_excerpt();
                                                } else {
                                                    echo ('FoG Hacker');
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    $is_checked = false; // We've already set the checked attribute
                                    endwhile; // End the loop. Whew.
                                ?>
                            </div>

                            <div class="clearfix"></div>

                            <h3>Details</h3>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="checkbox">
                                        <label>
                                            <input type="hidden" name="os2" id="list_donor" value="No" />
                                            <input name="os2" id="list_donor" type="checkbox" value="Yes" checked /> <?php esc_html_e( 'Include me on the list of donors', 'grass' ); ?>
                                            <input type="hidden" name="on2" value="List me on the donors page" />
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="hidden" name="os3" id="notify_donor" value="No" />
                                            <input name="os3" id="notify_donor" type="checkbox" value="Yes" checked /> <?php esc_html_e( "GNOME can contact me by email (we don't do this very often)", 'grass' ); ?>
                                            <input type="hidden" name="on3" value="Keep me updated by email" />
                                        </label>
                                    </div>
                                    <br>
                                    <button id="subscription-btn" class="btn btn-success" type="submit" name="submit"><?php esc_html_e( 'Join', 'grass' ); ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- END content -->
    </div> <!-- END container -->

    <div class="clearfix"></div>
    
<?php get_footer(); ?>
