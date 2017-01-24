<?php

/*
 * Add link to global feeds instead of current page comments
 */
add_theme_support( 'automatic-feed-links');
add_action('wp_head', function() {
   echo '<link rel="alternate" type="application/rss+xml" title="'.get_bloginfo('name').' &raquo; Feed" href="'.home_url('/').'feed/" />'; 
});

require_once("header.php"); ?>

<!-- container -->
<div class="container">
    <div id="home">
    <div id="home-crafted-content" class="row">
            <div class="col-sm-12 col-md-6">
                <a href="https://www.gnome.org/wp-content/uploads/2016/03/window-selection-3.20-420x236.png"><img src="https://www.gnome.org/wp-content/uploads/2016/03/window-selection-3.20-420x236.png" alt=""></a>
            </div>
            <div class="text col-sm-12 col-md-6">
                <h3>GNOME 3: Ease, comfort and control</h3>
                <p>GNOME 3 is an easy and elegant way to use your computer. It is designed to put you in control and bring freedom to everybody. GNOME 3 is developed by the GNOME community, a diverse, international group of contributors that is supported by an independent, non-profit foundation.</p>
                <p>
                    <a class="action_button" href="gnome-3">Discover GNOME 3</a>
                    <a class="action_button" href="getting-gnome">Get GNOME 3</a>
                </p>
            </div>
    </div>

    <hr class="bottom_shadow" style="margin-bottom: 0;"/>

    <div class="col-sm-6">
        <h4><a href="friends">Make a donation and become a Friend of GNOME!</a></h4>
Your donation will ensure that GNOME continues to be a free and open source desktop by providing resources to developers, software and education for end users, and promotion for GNOME worldwide.
    </div>

    <div class="col-sm-6" style="margin-bottom: 0.8em;">
        <h4><a href="get-involved">Get involved!</a></h4>
The GNOME Project is a diverse international community which involves hundreds of contributors, many of whom are volunteers. Anyone can contribute to the GNOME!
    </div>

    <hr class="top_shadow"/>


<!-- news -->

    <h2>Latest news</h2>
    <div class="news_list">
<?php

    query_posts (array('post_type' => 'post', 'category_name' => 'news', 'posts_per_page' => 3));
        
    while ( have_posts() ) : the_post();
?>

        <div class="col-md-4 news">
            <span class="date">
                <?php the_date(); ?>
            </span>
            <a href="<?php the_permalink(); ?>">
                <strong><?php the_title(); ?></strong>
	        <?php echo strip_tags(get_the_excerpt()); ?>
            </a>
        </div>

<?php
   endwhile;
?>

    <p><a href="/news/" class="action_button">News Archives</a></p>

    </div>
<!-- news -->


<!-- END container -->
        </div>
    </div>
</div>
</div>
    
    <div class="clearfix"></div>
    
    <?php require_once("footer.php"); ?>
</body>
</html>
