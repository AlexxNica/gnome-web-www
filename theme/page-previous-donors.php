<?php

$donors = array();

/* A simple mapping for the internal and the display name */
$fname_dispname_map = array(
        'adopt-a-hacker-annual' => 'Adopt a Hacker - Annual',
        'adopt-a-hacker-monthly' => 'Adopt a Hacker - Monthly',
        'philanthropist' => 'Philanthropist',
        'sponsor' => 'Sponsor',
        'associate' => 'Associate',
    );

foreach (array(
    2015,
    2014,
    2013,
    2012,
    2011,
    2010,
    ) as $year) {
    
    $donors[$year] = array();
    
    foreach ($fname_dispname_map as $level => $disp_name) {
        $cache_name = "fog_donors_file_{$year}_{$level}";
        if (false === ($donors_file = get_transient($cache_name))) {
            $url = dirname(__FILE__) . "/fog_donors/{$year}-{$level}.txt";
            if (false === ($donors_file = file_get_contents($url)) ||
                strlen($donors_file) == 0) {
                continue;
            } else {
                // keeps an hour cache
                set_transient($cache_name, $donors_file, 60*60*1);
            }
        }
        $donors[$year][$level] = array();

        $donors[$year][$level] = explode("\n", $donors_file);

    }
}




require_once("header.php"); ?>

    <!-- container -->
    <div id="container" class="two_columns">
        <div class="container_12">
        
            <?php require_once('inc/page-title.php'); ?>
            
            <div class="content without_sidebar">
                
                <?php
                
                if (isset($donors)) {
                  foreach ($donors as $year => $level_array) {
                    echo "<h3>{$year}</h3>\n";
                    foreach ($level_array as $level => $donor_array) {
                        $level_count = count($donor_array);
                        if ($level_count > 1) { // The count behaves weirdly for me. Always +1.
                            echo "<h4>$fname_dispname_map[$level]</h4>\n";
                            echo '<ul class="col-3">'."\n";
			     foreach ($donor_array as $donor_line) {
                                $donor = trim($donor_line, "\x00..\x20");
                                if (strlen($donor) > 0)
                                    echo "  <li>".htmlspecialchars($donor)."</li>\n";
                            }
                            echo "</ul>\n";
                        }
                    }
                  }
                }
                ?>
                
            <?php while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?>

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
