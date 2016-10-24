<?php

$year = get_option('support_year');
$contributors = get_option('support_contributors');
$hackfests = get_option('support_hackfests');

require_once("header.php"); ?>

	<!-- container -->
    <div id="container">
        <div class="container">
            <div class="page_title">
                <h1><?php echo __('Support GNOME', 'grass');?></h1>
            </div>
            
            <?php while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; // End the loop. Whew. ?>

			<div class="clearfix"></div>

			<div id="support-gnome" class="content">
				<p><?php _e( 'Amount', 'grass' ); ?>Donations are essential to the everyday operations of the GNOME project. Without them, we wouldn't be able to carry on our work, to produce a Free Software alternative that works in the interests of everyone.</p>

				<div class="row" style="padding-bottom: 25px;">
					<div class="col-sm-5">
						<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/donations/friends-of-gnome.png" alt=""></a>
					</div>
					<div class="col-sm-7 text">
						<h3><?php _e( 'Friends of GNOME', 'grass' ); ?></h3>
						<p><?php _e( 'Becoming a Friend of GNOME is one of the best ways to support the GNOME project. By paying a monthly subscription, you can provide a predictable income for the GNOME Foundation. Friends receive a thank you post card from a GNOME hacker and have the option of a free LWN subscription.', 'grass' ); ?></p>
						<div class="links">
							<p><a class="btn btn-success" role="button" href="friends-of-gnome"><?php _e( 'Become a Friend of GNOME', 'grass' ); ?></a></p>
							<p><a href="previous-donors"><?php _e( 'View the list of donors', 'grass' ); ?></a></p>
						</div>
					</div>
				</div>
				<h3><?php _e( 'What donations pay for', 'grass' ); ?></h3>
				<br>
				<div class="row article">
					<div class="col-sm-3">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/images/donations/hackfests.png" alt="">
					</div>
					<div class="col-sm-8 text">
						<header class="title"><?php _e( 'Hackfests', 'grass' ); ?></header>
						<?php _e( 'Hackfests are events where contributors get together to work and plan for the future. They are essential to how the GNOME project works.', 'grass' ); ?>
						<p>In <?php echo $year ?>, we sponsored <?php echo $contributors ?> contributors to attend <?php echo $hackfests ?> hackfests, thanks to donations.</p>
					</div>
				</div>
				<div class="row article">
					<div class="col-sm-3">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/images/donations/infrastructure.png" alt="">
					</div>
					<div class="col-sm-8 text">
						<header class="title"><?php _e( 'Infrastructure', 'grass' ); ?></header>
						<?php _e( "GNOME could not operate without its development infrastructure. We wouldn't be able to keep it operating without donations.", 'grass' ); ?>
					</div>
				</div>
				<div class="row article">
					<div class="col-sm-3">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/images/donations/outreach.png" alt="">
					</div>
					<div class="col-sm-8 text">
						<header class="title"><?php _e( 'Outreach', 'grass' ); ?></header>
						<?php _e( 'Reaching out to new users and contributors is an important part of what GNOME does. Donations enable us to organize outreach events and have presence at major conferences.', 'grass' ); ?>
					</div>
				</div>

				<h3><?php _e( 'Other ways to support us', 'grass' ); ?></h3>
				<p><?php _e( 'There are many other ways to help the GNOME project. These include:', 'grass' ); ?></p>
				<ul>
					<li>Make a <a href="donate">one time donation</a> through PayPal, bank transfer, check or Bitcoin.</li>
					<li>Shop at the <a href="https://www.gnome.org/friends/amazon/">GNOME Amazon store</a>.</li>
					<li>Companies can <a href="">sponsor events</a> or join the <a href="https://www.gnome.org/foundation/governance">GNOME Advisory Board</a>.</li>
				</ul>
                
				<h3><?php _e( 'Donor benefits', 'grass' ); ?></h3>
				<p>The GNOME Foundation is a non-profit organization. <strong>Donations are tax deductible</strong> in the United States, and you can also make tax free donations in the European Union (see <a href="donate">donate to GNOME</a>). Contact your tax office for more information about tax free donations</p>
				<p>Employees of some companies can have their <strong>donation to GNOME matched by their employer</strong>. This is a great way to increase your donation. Companies that offer donation matching include ..., ... and ...</p>
			</div> <!-- END content -->
<?php require_once("footer_art.php"); ?>
		</div> <!-- END .container -->
	</div> <!-- END #container -->

    <div class="clearfix"></div>

    <?php require_once("footer.php"); ?>
</body>
</html>

