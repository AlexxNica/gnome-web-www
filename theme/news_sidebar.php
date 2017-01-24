<?php if(!isset($is_news_home) || $is_news_home == false) { ?>
<a class="btn btn-default" href="<?php bloginfo('url'); ?>/news/" style="display: block; text-align: center; margin-bottom: 20px;"><?php esc_html_e('Read the archives...', 'grass'); ?></a>
<?php } ?>

<div class="subtle_box text-center">
    <h4><?php esc_html_e('Connect with GNOME', 'grass'); ?></h4>
        <?php require("social_icons.php");?>
</div>
    
<div class="subtle_box">
    <h4 class="text-center"><?php esc_html_e('Development News', 'grass'); ?></h4>
    <p>For commit digests, release announcements, and GNOME team updates, go to <a href="http://news.gnome.org">http://news.gnome.org</a></p>
</div>
