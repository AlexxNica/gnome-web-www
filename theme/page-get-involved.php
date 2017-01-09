<?php get_header(); ?>

    <div id="container" class="container">
        <div class="content">
            <div class="col-md-12">
                <div class="page_title" style="margin-top: 0px; border-bottom: none;">
                    <h1><?php esc_html_e('Be a part of a vibrant worldwide community', 'grass'); ?></h1>
                </div>
                        <?php
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail( 'full', array( 'class'  => 'img-responsive center-block featured-banner' ) );
                            } 
                        ?>
                <p class="main_feature text-center"><?php esc_html_e('GNOME is a friendly and welcoming community. Getting involved is a great way to learn skills, have fun, and help to create world-class Free Software.', 'grass'); ?></p>
                <h3 style="color: #b1b1b1;"><?php esc_html_e('Pick an area', 'grass'); ?></h3>
            </div>

                <?php while ( have_posts() ) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; // End the loop. Whew. ?>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-6">
                        <h3><?php esc_html_e('Coding', 'grass'); ?></h3>
                        <p><?php esc_html_e('GNOME has every kind of coding task, and there are guides to help you get started.', 'grass'); ?></p>
                        <p><a class="btn btn-primary" href="https://wiki.gnome.org/Newcomers/"><?php esc_html_e('Read the Newcomers Guide', 'grass'); ?></a></p>
                    </div>
                    <div class="col-sm-6">
                        <h3><?php esc_html_e('Documentation', 'grass'); ?></h3>
                        <p><?php esc_html_e("Help to maintain GNOME's user and developer documentation.", 'grass'); ?></p>
                        <p><a class="btn btn-primary" href="https://wiki.gnome.org/DocumentationProject/Contributing"><?php esc_html_e('Contribute to the Documentation Team', 'grass'); ?></a></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-6">
                        <h3><?php esc_html_e('Engagement', 'grass'); ?></h3>
                        <p><?php esc_html_e('The Engagement Team works on marketing, user outreach, events organization, and websites. It wants your help!', 'grass'); ?></p>
                        <p><a class="btn btn-primary" href="https://wiki.gnome.org/Engagement/GettingInvolved"><?php esc_html_e('Join the Engagement Team', 'grass'); ?></a></p>
                    </div>
                    <div class="col-sm-6">
                        <h3><?php esc_html_e('Translation', 'grass'); ?></h3>
                        <p><?php esc_html_e('GNOME is translated into over 80 languages, all thanks to our volunteers. Help to translate it into your language!', 'grass'); ?></p>
                        <p><a class="btn btn-primary" href="https://wiki.gnome.org/TranslationProject"><?php esc_html_e('Find a Localization Team', 'grass'); ?></a></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-12">
                        <h3 style="color: #b1b1b1;"><?php esc_html_e("Can't find what you're looking for?", 'grass'); ?></h3>
                        <p><?php esc_html_e('There are many other teams and activities in the GNOME project, including testing, design, bug triage, system administration, and more.', 'grass'); ?></p>
                        <p><a class="btn btn-primary" href="https://wiki.gnome.org/Teams"><?php esc_html_e('Browse Other Teams', 'grass'); ?></a></p>
                    </div>
                </div>
            </div>
        </div> <!-- END content -->
    </div>

    <div class="clearfix"></div>
    
<?php get_footer(); ?>
