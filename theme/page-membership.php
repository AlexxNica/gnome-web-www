<?php


if (false === ($members = get_transient('foundation_members_list'))) {

    $members_url = "http://foundation-old.gnome.org/membership/members.php?format=json";

    $members = json_decode(file_get_contents($members_url));
    
    // keeps a 12-hour cache until another HTTP request
    // to get the members list
    set_transient('foundation_members_list', $members, 60*60*12);
    
}




require_once("header.php"); ?>

    <!-- container -->
    <div id="container" class="two_columns">
        <div class="container_12">
        
            <?php require_once('inc/page-title.php'); ?>
            <?php wp_nav_menu(array('menu'=>'foundationnav','container_class'=>'foundation_nav')); ?>
            <div class="content without_sidebar">
            <?php while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?>
                
                <?php
                
                if (isset($members)) {
                  echo '<ul class="foundation_members_list">'."\n";
                  $antispam = array(".", "@");
                  foreach ($members as $member) {
                      $email = str_replace($antispam, " ", $member->email);
                      echo "    <li title=\"&lt;" . $email . "&gt; / " . "Last Renewed on " . $member->last_renewed_on . "\">" . $member->firstname . " " . $member->lastname . "</li>\n";
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
