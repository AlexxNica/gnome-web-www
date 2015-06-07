 <!-- footer -->
    <div id="footer">   
<!-- footer grass -->
        <div id="footer_grass">
            &nbsp;
        </div>

        <div class="container">
            <div class="links span9">
                <?php
                wp_nav_menu('menu=footer');
                ?>
            </div>
            
            <?php if (function_exists('wppo_get_all_available_langs') && function_exists('wppo_get_lang')) {
                
                $list_of_languages = wppo_get_all_available_langs();
                if (count($list_of_languages) > 1) {
                                
                ?>
                <div class="language span3">
                    <div>
                        <strong><?php _e( 'This website is available in many languages', 'grass' ); ?></strong>
                        <a href="<?php echo home_url('/languages/');?>" data-uri="<?php echo home_url('/');?>?select-language&amp;url=<?php echo $_SERVER['REQUEST_URI'];?>">
                            <span class="switch"><?php _e( 'Switch Language', 'grass' ); ?></span>
                            <span class="loading"><?php _e( 'Loading...', 'grass' ); ?></span>
                        </a>
                    </div>
                </div>
                <?php
                }
            }
            ?>
            
            <div class="icons span3">
	    	  <?php require_once("social_icons.php"); ?>
            </div>
	    </div>
	    <!-- footnotes -->
        <div class="container">
            <div class="span12">
                <div id="footnotes" class="span9">
                    <?php _e( 'Copyright', 'grass' ); ?> © 2005‒<?php echo date('Y');?> <strong class="gnome_logo"><?php _e( 'The GNOME Project', 'grass' ); ?></strong><br />
                    <small>
                        <?php _e( 'Free to share and remix', 'grass' ); ?>: <a href="http://creativecommons.org/licenses/by/3.0/">Creative Commons CC-BY</a>.
                        <?php _e( 'Optimized for standards', 'grass' ); ?>.
                        <?php _e( 'Hosted by', 'grass' ); ?> <a href="http://www.canonical.com/">Canonical</a>.
                        <?php _e( 'Powered by', 'grass' ); ?> <a href="http://www.wordpress.org">WordPress</a>.
                    </small>
                </div>
            </div>
        </div>   
            <div class="clear"></div>
    </div>
    
    <?php if ($_SERVER['HTTP_HOST'] != 'localhost') { ?>

    <!-- Piwik -->
    <script type="text/javascript">
      var _paq = _paq || [];
      _paq.push(['disableCookies']);
      _paq.push(["trackPageView"]);
      _paq.push(["enableLinkTracking"]);

      (function() {
        var u=(("https:" == document.location.protocol) ? "https" : "http") + "://webstats.gnome.org/";
        _paq.push(["setTrackerUrl", u+"piwik.php"]);
        _paq.push(["setSiteId", "1"]);
        var d=document, g=d.createElement("script"), s=d.getElementsByTagName("script")[0]; g.type="text/javascript";
        g.defer=true; g.async=true; g.src=u+"piwik.js"; s.parentNode.insertBefore(g,s);
      })();
    </script>
    <!-- End Piwik Code -->
    
    <?php } ?>
    
    <?php
    wp_footer();
    ?>   
