<?php get_header(); ?>

    <!-- container -->
    <div class="container">
        <div id="support-gnome" class="row content">
            <div class="col-xs-12">
                <div class="page_title">
                    <h1><?php esc_html_e('Support GNOME', 'grass');?></h1>
                </div>

                <?php while ( have_posts() ) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; // End the loop. Whew. ?>

                <div class="clearfix"></div>

                <p class="main_feature"><?php esc_html_e( "Our mission to create a competitive free desktop has never been more important. It is only through your support that we can carry on our work.", 'grass' ); ?></p>
                <p><?php esc_html_e( "Donations are handled by the GNOME Foundation, GNOME's community-run non-profit organization.", 'grass' ); ?></p>

                <div class="donation-boxes-container">
                    <div class="row">
                        <div class="col-sm-6 donation-boxes">
                            <a href="../friends" class="btn btn-success btn-block">
                                <p><?php esc_html_e( 'Become a Friend of GNOME', 'grass' ); ?></p>
                                <p><?php esc_html_e( 'Monthly subscription - one of the best ways to support the GNOME project', 'grass' ); ?></p>
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-4" style="padding: 10px;">
                            <p><?php esc_html_e('Friends receive a thank you postcard from a GNOME hacker and have the option to receive a free Linux Weekly News subscription.', 'grass');?></p>
                            <a href="../friends/previous-donors"><?php esc_html_e('See who is already a Friend of GNOME', 'grass');?></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 donation-boxes">
                            <a href="./donate" class="btn btn-success btn-block">
                                <p><?php esc_html_e( 'Make a Donation', 'grass' ); ?></p>
                                <p><?php esc_html_e( 'One time donation - help to support our work today', 'grass' ); ?></p>
                            </a>
                        </div>
                    </div>
                </div> <!-- END donation-boxes-container -->

                <p><?php esc_html_e('Donations are used for:', 'grass');?></p>
                <ul>
                    <li><?php esc_html_e("GNOME's development infrastructure, which is essential for all our development work", 'grass');?></li>
                    <li><?php esc_html_e("Travel sponsorship, for community members to attend hackfests and conferences", 'grass');?></li>
                    <li><?php esc_html_e("Outreach activities, such as hack camps and GNOME's presence at conferences", 'grass');?></li>
                </ul>

                <div class="donation-benefits">
                    <div class="row">
                        <div class="col-xs-12">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#taxDeduction" aria-expanded="false" aria-controls="taxDeduction">
                                <?php esc_html_e('Donations are tax deductible in the United States and European Union', 'grass');?>
                                 <i class="fa fa-chevron-right" aria-hidden="true"></i>
                            </button>
                            <div class="collapse" id="taxDeduction">
                                <p>Donations to the GNOME Foundation are <strong>tax deductible</strong> in the United States and <a href="./donate">one time donations</a> can also qualify for tax exemption in the European Union. If you think that you might qualify, contact your tax office for more information.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#donationMatching" aria-expanded="false" aria-controls="donationMatching">
                                <?php esc_html_e( 'Many employers will match donations made to GNOME', 'grass' );?>
                                <i class="fa fa-chevron-right" aria-hidden="true"></i>
                            </button>
                            <div class="collapse" id="donationMatching">
                                <p><?php esc_html_e( 'Many employers, including Apple, Google, Microsoft and Red Hat, will match donations made by their employees. This is a great way to increase your contribution. Before you donate, you might want to check whether your employer operates donation matching.', 'grass' ); ?></p>
                                <p><?php esc_html_e( 'Some employers will only match one time donations rather than subscriptions.', 'grass' ); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#otherWays" aria-expanded="false" aria-controls="otherWays">
                                <?php esc_html_e('Other ways to support GNOME', 'grass');?>
                                <i class="fa fa-chevron-right" aria-hidden="true"></i>
                            </button>
                            <div class="collapse" id="otherWays">
                                <p>Companies can sponsor events or join the GNOME Foundation Advisory Board. If you are interested in this, please contact the <a href="../foundation/contacts">GNOME Foundation Board of Directors</a> for more details. GNOME also benefits when you shop at the <a href="../friends/amazon">GNOME Amazon store</a>.</p>
                            </div>
                        </div>
                    </div>
                </div> <!-- END donation-benefits -->
            </div>
        </div> <!-- END content -->
    </div> <!-- END container -->

    <div class="clearfix"></div>

<?php get_footer(); ?>
