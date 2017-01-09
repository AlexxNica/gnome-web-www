<?php
/**
 * @package GNOME Website
 * @subpackage Grass Theme
 */
?>

<?php get_header(); ?>

    <!-- container -->
    <div class="container two_columns">
            
            <div class="content without_sidebar">
                
                <div class="col-sm-10 col-sm-offset-1">
                        <h1><?php esc_html_e( 'Ooooops. Something is not here.', 'grass' ); ?></h1>
                        
                        <p class="main_feature"><?php esc_html_e( 'The page you tried to access was not found.', 'grass' ); ?></p>
                        
                        <hr />
                        
                        <div class="col-sm-6">
                            <p><?php
                            
                            printf(
                                __( 'For now, you may want to go to the <a href="%1$s">home page</a> to start from the beginning, or try your luck in the search form below.', 'grass'),
                                get_bloginfo('url')
                            );
                            
                            ?></p>
                            <?php get_search_form(); ?>
                        </div>
                        
                        <div class="col-sm-4">
                            <p><?php
                            
                            printf(
                                __('If you think there is a broken link on the GNOME website, please <a href="%1$s">report it as a bug</a>. Thank you.', 'grass'),
                                'https://bugzilla.gnome.org/enter_bug.cgi?product=website&component=www.gnome.org'
                            );
                            
                            ?></p>
                        </div>
                </div>
                
                <div class="clear"></div>
            </div>
    </div>
    
    <div class="clearfix"></div>
    
<?php get_footer(); ?>
