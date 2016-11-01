<?php if(!isset($is_news_home) || $is_news_home == false) { ?>
<a class="action_button" href="<?php bloginfo('url'); ?>/news/" style="display: block; text-align: center; margin-bottom: 20px;"><?php _e('Read the archives...', 'grass'); ?></a>
<?php } ?>

<div class="subtle_box">
    <h4><?php _e('Connect with GNOME', 'grass'); ?></h4>
    
    <div class="social_network_icons">
        <?php require("social_icons.php");?>
    </div>
</div>
    
<div class="subtle_box">
    <h4>Development News</h4>
    <p>For commit digests, release announcements, and GNOME team updates, go to <a href="http://news.gnome.org">http://news.gnome.org</a></p>
</div>
