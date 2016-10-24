<?php


if (function_exists('wppo_get_lang')) {
    $current_lang = str_replace('_', '-', strtolower(wppo_get_lang()));
    if (strpos($current_lang, '-') !== false) {
     $current_lang = explode('-', $current_lang);
     $current_lang[1] = strtoupper($current_lang[1]);
     $current_lang = implode('-', $current_lang);
 }
} else {
    $current_lang = 'en';
}

?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $current_lang;?>" lang="<?php echo $current_lang;?>">

<!-- Good morning, GNOME -->
<head>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('-', true, 'right'); ?> <?php bloginfo('name'); ?></title>
    <link rel="icon" type="image/png" href="<?php bloginfo('stylesheet_directory'); ?>/images/favicon.png" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <?php wp_head(); ?>

    <!-- Fancybox -->
    <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/pack/fancybox-1.3.4/jquery.easing-1.3.pack.js"></script>
    <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/pack/fancybox-1.3.4/jquery.fancybox-1.3.4.pack.js"></script>
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_directory'); ?>/pack/fancybox-1.3.4/jquery.fancybox-1.3.4.css" />
    <?php
    if (is_single() || is_page()) {
        $custom_css = get_post_meta($post->ID, 'custom_css', true);
        if (!empty($custom_css)) {
            echo '<style type="text/css">'."\n";
            echo $custom_css."\n";
            echo '</style>'."\n";
        }
    }
    ?>
</head>
<body>
    <!-- accessibility access -->
    <div id="accessibility_access">
        <ul>
            <li><a href="#container"><?php _e( 'Go to page content', 'grass' ); ?></a></li>
            <li><a href="#top_bar"><?php _e( 'Go to main menu', 'grass' ); ?></a></li>
            <li><a href="#s" onclick="$('#s').focus(); return false;"><?php _e( 'Go to the search field', 'grass' ); ?></a></li>
        </ul>
    </div>

<!-- Donation ruler for when we run campaigns 
<script type="text/javascript" src="https://static.gnome.org/friends/ruler/ruler-privacy.js">  </script>
-->
<!-- global gnome.org domain bar -->
<div id="global_domain_bar">
    <div class="maxwidth">
        <div class="tab">
            <a class="root" href="http://www.gnome.org/">GNOME.org</a>
        </div>
    </div>
</div>

	<header class="container">
        <div class="col-md-12">
		<div class="mobile-menu">
			<div class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse" >
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" title="<?php _e( 'Go to home page', 'grass' ); ?>" href="<?php echo home_url('/'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/gnome-logo.png" alt="<?php echo _e('GNOME: The Free Software Desktop Project', 'grass');?>" /></a>
					</div>

					<div class="collapse navbar-collapse">
						<div class="top_bar col-md-9">
                            <?php wp_nav_menu('menu=globalnav'); ?>

                             <div class="mobile-search col-md-8">
                                <form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>" >
                                    <div>
                                        <label class="hidden" for="s"><?php _e( 'Search', 'grass' ); ?>: </label><input type="text" class="mobile-menu-text" value="<?php if(isset($_GET['s'])) { echo htmlspecialchars(stripslashes(strip_tags($_GET['s']))); } ?>" name="s" id="s" placeholder="<?php _e( '&nbsp;&nbsp;Search', 'grass' ); ?>" />
                                    </div>
                                </form>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</div> <!-- mobile-menu end -->

		<div class="normal-menu">
			<div id="gnome_header" class="col-md-3">
				<h1><a title="<?php _e( 'Go to home page', 'grass' ); ?>" href="<?php echo home_url('/'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/gnome-logo.png" alt="<?php echo _e('GNOME: The Free Software Desktop Project', 'grass');?>" /></a></h1>
			</div>

			<div class="top_bar col-md-7 pull-left">
                    <?php wp_nav_menu('menu=globalnav'); ?>
            </div>

            <div id="top_bar_search" class="col-md-2 pull-right">
                <div class="right">
                    <form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>" >
                        <div>
                            <label class="hidden" for="s"><?php _e( 'Search', 'grass' ); ?>: </label>
                            <input type="text" value="<?php if(isset($_GET['s'])) { echo htmlspecialchars(stripslashes(strip_tags($_GET['s']))); } ?>" name="s" id="s" placeholder="<?php _e( 'Search', 'grass' ); ?>" />
                        </div>
                    </form>
                </div>
            </div>

		</div> <!-- normal-menu end -->
        </div>
	</header>

<div class="clearfix"></div>
