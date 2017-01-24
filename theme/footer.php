    </div> <!-- END gnome-content -->

<!-- footer -->
    <div id="footer">
        <div class="container">
            <div class="row">
                    <div class="col-xs-12">
            <div class="links col-xs-12 col-sm-9">
                <?php
                wp_nav_menu('menu=footer');
                ?>
            </div>

            <?php if (function_exists('wppo_get_all_available_langs') && function_exists('wppo_get_lang')) {

                $list_of_languages = wppo_get_all_available_langs();
                if (count($list_of_languages) > 1) {

            ?>
                <div class="language col-xs-12 col-md-3">
                    <div>
                        <strong><?php esc_html_e( 'This website is available in many languages', 'grass' ); ?></strong>
                        <a href="<?php echo home_url('/languages/');?>" data-uri="<?php echo home_url('/');?>?select-language&amp;url=<?php echo $_SERVER['REQUEST_URI'];?>">
                            <span class="switch"><?php esc_html_e( 'Switch Language', 'grass' ); ?></span>
                            <span class="loading"><?php esc_html_e( 'Loading...', 'grass' ); ?></span>
                        </a>
                    </div>
                </div>
                <?php
                }
            }
            ?>
            <div class="icons col-xs-12 col-sm-3">
                <?php require_once("social_icons.php"); ?>
            </div>
        </div>
    </div>
    </div>
    <div class="container">
        <!-- footnotes -->
        <div class="row">
            <div class="col-sm-12">
                <div id="footnotes" class="col-sm-9">
                    <strong class="gnome_logo">&copy; <?php esc_html_e( 'The GNOME Project', 'grass' ); ?></strong><br />
                    <small>
                        <?php esc_html_e( 'Free to share and remix', 'grass' ); ?>: <a href="http://creativecommons.org/licenses/by/3.0/">Creative Commons CC-BY</a>.
                        <?php esc_html_e( 'Optimized for standards', 'grass' ); ?>.
                        <?php esc_html_e( 'Hosted by', 'grass' ); ?> <a href="http://www.redhat.com/">Red Hat</a>.
                        <?php esc_html_e( 'Powered by', 'grass' ); ?> <a href="http://www.wordpress.org">WordPress</a>.
                    </small>
                </div>
            </div>
        </div>
        </div>
    </div>
            <div class="clearfix"></div>


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
    
    <?php wp_footer(); ?>
    </body>
</html>
