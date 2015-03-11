<?php


add_action('wp_head', function() {
    echo '<link rel="stylesheet" type="text/css" media="all" href="'.get_bloginfo('template_url').'/css/home.css" />';
    echo '<link rel="stylesheet" type="text/css" media="all" href="'.get_bloginfo('template_url').'/css/news.css" />';
});

/*
 * Add link to global feeds instead of current page comments
 */
automatic_feed_links(false);
add_action('wp_head', function() {
   echo '<link rel="alternate" type="application/rss+xml" title="'.get_bloginfo('name').' &raquo; Feed" href="'.home_url('/').'feed/" />'; 
});

require_once("header.php"); ?>

<!-- container -->

<div class="container_12">

    <div class="crafted_content">
        <div class="section image-left">
            <div class="image">
                <a href="https://www.gnome.org/wp-content/uploads/2014/09/activities-overview1.png"><img src="https://www.gnome.org/wp-content/uploads/2014/09/activities-overview-420x262.png" alt=""></a>
            </div>
            <div class="text">
                <h3>GNOME 3: Ease, comfort and control</h3>
                <p>GNOME 3 is an easy and elegant way to use your computer. It is designed to put you in control and bring freedom to everybody. GNOME 3 is developed by the GNOME community, a diverse, international group of contributors that is supported by an independent, non-profit foundation.</p>

		<p style="text-align: center;">
			<a class="action_button" href="gnome-3">Discover GNOME 3</a>
			<a class="action_button" href="getting-gnome">Get GNOME 3</a></p>
            </div>
        </div>
    </div>

    <hr class="bottom_shadow" style="margin-bottom: 0;"/>

    <div class="grid_6 alpha">
        <h4><a href="friends">Make a donation and become a Friend of GNOME!</a></h4>
Your donation will ensure that GNOME continues to be a free and open source desktop by providing resources to developers, software and education for end users, and promotion for GNOME worldwide.
    </div>

    <div class="grid_6 omega" style="margin-bottom: 0.8em;">
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

        <div class="grid_4 news">
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
               
        <?php require_once("footer_art.php"); ?>
        </div>
    </div>
</div>
    
    <div class="clearfix"></div>
    
    <?php require_once("footer.php"); ?>
</body>
</html>
