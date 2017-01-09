<?php
/*
 * Add link to global feeds instead of current page comments
 */
add_theme_support( 'automatic-feed-links');
add_action('wp_head', function() {
   echo '<link rel="alternate" type="application/rss+xml" title="'.get_bloginfo('name').' &raquo; Feed" href="'.home_url('/').'feed/" />'; 
});
?>

<?php get_header(); ?>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <img src="<?php if (get_theme_mod( 'release_screenshot' )) : echo get_theme_mod( 'release_screenshot'); else: echo get_template_directory_uri().'/images/home/featured_image.png'; endif; ?>" class="img-responsive center-block home_banner" alt="Featured image showing GNOME shell">
            </div>
        </div>   
        <div class="row">
            <div class="col-md-12 text-center">
                <p class="main_heading"><?php echo get_theme_mod( 'featured_heading');?></p>
                <div class="col-md-6 col-centered">
                    <p><?php echo get_theme_mod( 'featured_subheading');?></p>
                    <div class="col-md-12">
                        <?php if ( get_theme_mod( 'featured_button_url_1' ) ) : ?>
                        <a class="btn btn-default" href="<?php echo esc_url( get_page_link( get_theme_mod('featured_button_url_1'))) ?>"><?php echo esc_html( get_theme_mod( 'featured_button_text_1')) ?></a>
                        <?php endif; ?>

                        <?php if ( get_theme_mod( 'featured_button_url_2' ) ) : ?>
                        <a class="btn btn-default" href="<?php echo esc_url( get_page_link( get_theme_mod('featured_button_url_2'))) ?>"><?php echo esc_html( get_theme_mod( 'featured_button_text_2')) ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>            
        </div>  
    </div>
    <section class="bg-grey">
        <div class="container"> 
            <div class="row">         
                <div class="col-sm-12">  
                    <div class="col-sm-6">
                        <h4><a href="<?php echo esc_url( get_page_link( get_theme_mod('featured_section_button_url_1'))) ?>"><?php echo esc_html( get_theme_mod( 'featured_section_button_text_1')) ?></a></h4>
                        <?php echo get_theme_mod( 'featured_section_text_1');?>
                    </div>
                    <div class="col-sm-6">
                        <h4><a href="<?php echo esc_url( get_page_link( get_theme_mod('featured_section_button_url_2'))) ?>"><?php echo esc_html( get_theme_mod( 'featured_section_button_text_2')) ?></a></h4>
                        <?php echo get_theme_mod( 'featured_section_text_2');?>
                    </div>
                </div>     
            </div>    
        </div>
    </section>
    <!-- news -->
    <div class="container">
        <div class="news_list">
            <?php
                query_posts (array('post_type' => 'post', 'category_name' => 'news', 'posts_per_page' => 3));

                while ( have_posts() ) : the_post();
            ?>
            <div class="col-md-12 news">
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
            <div class="col-md-12">
                <a href="/news/" class="btn btn-default pull-right"><?php esc_html_e( 'News Archives', 'grass' ); ?></a>
            </div>
        </div>
    </div>  <!-- END news -->
</div> <!-- END content -->

<?php get_footer(); ?>
