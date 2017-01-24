<?php

$members_url = "https://foundation.gnome.org/membership/membershiplist";

$members = json_decode(file_get_contents($members_url));

?>

<?php get_header(); ?>

    <!-- container -->
    <div id="foundation" class="two_columns">
        <div class="container">
            <div class="page_title">
                <h1><?php the_title(); ?></h1>
            </div>
            <div class="clearfix"></div>

            <div class="content without_sidebar">
            <?php while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?>

                <?php

                if (isset($members)) {
                  echo '<ul class="foundation_members_list">'."\n";
                  foreach ($members as $member) {
                      echo "<li>" . $member->common_name . "</li>\n";
                  }
                  echo '</ul>'."\n";
                }

                ?>

            <?php endwhile; // End the loop. Whew. ?>
                <br />
                <div class="clear"></div>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

<?php get_footer(); ?>
