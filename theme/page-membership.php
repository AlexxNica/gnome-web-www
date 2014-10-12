<?php


//if (false === ($members = get_transient('foundation_members_list'))) {

    $members_url = "https://foundation.gnome.org/membership/membershiplist";

    $members = json_decode(file_get_contents($members_url));
    echo "Members JSON:";
    var_dump($members);

    // keeps a 12-hour cache until another HTTP request
    // to get the members list
    //set_transient('foundation_members_list', $members, 60*60*12);
//}

require_once("header.php"); ?>

    <!-- container -->
    <div id="container" class="two_columns">
        <div class="container_12">
	  	<div class="page_title" style="margin-bottom: 2px;">
	  	  <h1><?php the_title(); ?></h1>
		</div>
		<div class="clearfix"></div>
            <?php wp_nav_menu(array('menu'=>'foundationnav','container_class'=>'foundation_nav')); ?>
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

            <?php require_once("footer_art.php"); ?>
        </div>
    </div>

    <div class="clearfix"></div>

    <?php require_once("footer.php"); ?>
</body>
</html>
