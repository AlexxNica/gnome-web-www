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
    <link rel="icon" type="image/png" href="<?php bloginfo('stylesheet_directory'); ?>/images/favicon.ico" />
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
<body <?php body_class('gnome-body'); ?>>
    <!-- accessibility access -->
    <div id="accessibility_access">
        <ul>
            <li><a href="#container"><?php esc_html_e( 'Go to page content', 'grass' ); ?></a></li>
            <li><a href="#top_bar"><?php esc_html_e( 'Go to main menu', 'grass' ); ?></a></li>
            <li><a href="#s" onclick="$('#s').focus(); return false;"><?php esc_html_e( 'Go to the search field', 'grass' ); ?></a></li>
        </ul>
    </div>

    <!-- Donation ruler for when we run campaigns
    <script type="text/javascript" src="https://static.gnome.org/friends/ruler/ruler-privacy.js">  </script>
    -->

    <header class="gnome-header">
        <nav class="navbar navbar-fixed-top navbar-default affix-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-wrapper" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar top-bar"></span>
                        <span class="icon-bar middle-bar"></span>
                        <span class="icon-bar bottom-bar"></span>
                    </button>
                    <a id="home-link" class="gnome-navbar-brand"  title="<?php esc_attr_e( 'Go to home page', 'grass' ); ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <img src="<?php bloginfo('stylesheet_directory'); ?>/images/gnome-logo.svg" alt="GNOME: The Free Software Desktop Project">
                    </a>
                </div>
                    <div class="navbar-collapse collapse" id="navbar-wrapper">
                    <?php
                        wp_nav_menu( array(
                            'menu'              => 'primary',
                            'theme_location'    => 'primary',
                            'depth'             =>  2,
                            'container'         => 'false',
                            'container_class'   => 'collapse navbar-collapse',
                            'container_id'      => 'bs-example-navbar-collapse-1',
                            'menu_class'        => 'nav navbar-nav',
                            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                            'walker'            => new WP_Bootstrap_Navwalker())
                        );
                    ?>
                    <form id="searchform" method="get" class="navbar-form navbar-right" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
                        <label for="navbar-search" class="sr-only"><?php esc_html_e( 'Search:', 'grass' ); ?></label>
                        <div class="form-group has-feedback has-feedback-left">
                            <span class="form-control-feedback"><i class="fa fa-search" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="s" id="navbar-search" value="<?php if(isset($_GET['s'])) { echo htmlspecialchars(stripslashes(strip_tags($_GET['s']))); } ?>" placeholder="<?php esc_attr_e( 'Search', 'grass' ); ?>"/>
                        </div>
                    </form>
                </div>
            </div>
        </nav>
    </header>

    <div class="gnome-content">
