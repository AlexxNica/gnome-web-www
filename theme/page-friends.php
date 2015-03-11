<?php
/**
 * @package GNOME Website
 * @subpackage Grass Theme
 */

require_once("header.php"); 

class HackerList {
    /**
     * @param   Array   one HackerDicts
     * @return  HTML    Html displaying one hacker
     */
    function parseHackerDictToHtml($hackerDict) {
        $returnHtml = '';
        // if no name is in the hackerDict, then return an empty string (don't display this hackerDict)
        if (isset($hackerDict['name'])) {
            if (!isset($hackerDict['shortName'])) {
                // short name is the name without spaces and html characters
                $shortName = 'http://wiki.gnome.org/' . urlencode(str_replace(' ', '', $hackerDict['name']));
                $hackerDict['shortName'] = $shortName;
            }
            $returnHtml = sprintf('<li><input type="radio" name="os0" ' .
                                  'value="You will receive a postcard from %s" /> ' .
                                  '<a href="%s" target="_blank">'.
                                  '%s</a></li>',
                                  $hackerDict['name'], $hackerDict['shortName'], $hackerDict['name']);
        }
        return $returnHtml;
    }
    
    /**
     * @param   Array   List of HackerDicts
     * @return  HTML    Html displaying one hacker per line
     */
    function parseHackerDictArrayToHtml($hackerDictArray) {
        $returnHtmlArray = Array();
        foreach ($hackerDictArray as $hackerDict) {
            $snippet = $this->parseHackerDictToHtml($hackerDict);
            // don't add the snippet if it's empty
            if (strlen($snippet)) {
                $returnHtmlArray[] = $snippet;
            }
        }
        $returnHtml = implode("\n", $returnHtmlArray);
        return $returnHtml;
    }
}
?>

<style type="text/css">
#boxes {

}

#boxes > div {
  margin: 10px;
  width: 150px;
  height: 150px;
  -moz-border-radius: 4px;
  /*display: inline-block;*/
  background-color: #73d216;
  overflow: hidden;
  background-repeat: no-repeat;
  background-position: center center;
  float: left;
}

#boxes > div {
  cursor: pointer;
}

#adopt {
  background-image: url("https://www.gnome.org/wp-content/themes/gnome-grass/images/adopt-normal.png");
}

#adopt.greyed {
    background-image: url("https://www.gnome.org/wp-content/themes/gnome-grass/images/adopt-inactive.png") !important;
}

#associate {
  background-image: url("https://www.gnome.org/wp-content/themes/gnome-grass/images/associate-normal.png");
}

#associate.greyed {
    background-image: url("https://www.gnome.org/wp-content/themes/gnome-grass/images/associate-inactive.png") !important;
}

#sponsor {
  background-image: url("https://www.gnome.org/wp-content/themes/gnome-grass/images/sponsor-normal.png");
}

#sponsor.greyed {
    background-image: url("https://www.gnome.org/wp-content/themes/gnome-grass/images/sponsor-inactive.png") !important;
}

#philanthropist {
  background-image: url("https://www.gnome.org/wp-content/themes/gnome-grass/images/philanthropist-normal.png");
}

#philanthropist.greyed {
    background-image: url("https://www.gnome.org/wp-content/themes/gnome-grass/images/philanthropist-inactive.png") !important;
}

.active-text {
  font-size: 11px;
  padding: 1em;
  visibility: hidden;
  text-align: center;
  height: 65%;
}

/* relative position, bottom, left */
.level-text {
    position: relative;
    /* really ugly, why does this work? */
    text-align: center;
    height: 35%;
}

.greyed {
    background-color: #d3d7cf !important;
    color: #babdb6;
}


div#below {
    margin: 10px;
    padding: 0px;
    position: relative;
    width: 660px;
    clear: both;
}

p#donation-details {
    text-align: center;
    font-weight: bold;
}

div#below > p {
    text-align: center;
}

p.hidden {
    display: none;
}

div#below > form {
    display: none;
}


/* allow room for 3 columns */
#below ul {
    width: 700px;
}


/* float & allow room for the widest item */
#below ul li {
    float: left;
    width: 200px;
    list-style: none;
}

/* stop the float */
#below br {
    clear: left;
}

/* Get rid of some 960 spacing */
#below li {
  margin-left: 0px;
}

/* separate the list from subsequent markup */
div.wrapper {
    margin-bottom: 10em;
}

#foundation-info {

  padding: 10px;
  width: 650px;
}

small {
  font-size: 12px;
  color: gray;
}
</style>

    <!-- container -->
    <div id="container" class="two_columns">
        <div class="container_12">
        
            <?php require_once('inc/page-title.php'); ?>
            
            <div class="content">
            <?php while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; // End the loop. Whew. ?>


              <!-- Page content has finished, now it's the template -->
              
              <div class="container_24">
                <div class="grid_18">
                  <div id="boxes">
                    <div id="adopt">
                      <div class="active-text">
                        You get: GNOME stickers, a thank you postcard from a hacker, a subscription
                        to LWN and a t-shirt if you commit to a year for $10/month!
                      </div>
            
                      <div class="level-text">
                        Adopt a Hacker
                      </div>
                    </div>
            
                    <div id="associate">
                      <div class="active-text">
                        You get: A GNOME mouse pad, a set of stickers, and recognition of your
                        contribution of $25-$500.
                      </div>
            
                      <div class="level-text">
                        Associate
                      </div>
                    </div>
            
                    <div id="sponsor">
                      <div class="active-text">
                        You get: A GNOME coffee mug, a GNOME t-shirt, and recognition of your
                        contribution of $500-$1200.
                      </div>
            
                      <div class="level-text">
                        Sponsor
                      </div>
                    </div>
            
                    <div id="philanthropist">
                      <div class="active-text">
                        You get: A print of the GNOME foot signed by the Board of Directors and
                        recognition of your contribution of $1200+.
                      </div>
            
                      <div class="level-text">
                        Philanthropist
                      </div>
                    </div>
                  </div>
            
                  <div id="below">
                    <p id="donation-details">Please select your donation level</p>

<?php
function print_form_head($form_name, $product_name) {
?>
        <form id="<?php echo "$form_name";?>-form"
            action="https://www.paypal.com/cgi-bin/webscr"
            method="post" name="<?php echo "$form_name";?>">
                <input type="hidden" name="business" value="friends@gnome.org" />
                <input type="hidden" name="return" value="https://www.gnome.org/thank-you/" />
                  <input type="hidden" name="item_name" value="<?php echo "$product_name"; ?>" />
                  <input type="hidden" name="notify_url" value="https://muelli.cryptobitch.de/paypaltest/ipnhandler.php" /> 
<?php } /* print_form_head */ ?>


                    <?php print_form_head("adopt", "Friends of GNOME - Adopt a hacker monthly subscription"); ?>
                      
                      <!-- Specify a Subscribe button. -->
                      <input type="hidden" name="cmd" value="_xclick-subscriptions" />

                      <!-- Define the intervals between payments. "1" means every period. -->
                      <input type="hidden" name="p3" value="1" />
                      <!-- "t3" defines the period duration (D=days; W=weeks; M=months and Y=Years). -->
                      <input id="t3" type="hidden" name="t3" value="M" />
                      <!-- "src" with a value of "1" causes it to repeat for every interval. -->
                      <input type="hidden" name="src" value="1" />
                      <!-- Reattempt on failure. If a recurring payment fails, PayPal attempts to collect the payment two more times before canceling the subscription. See https://cms.paypal.com/us/cgi-bin/?cmd=_render-content&#038;content_ID=developer/e_howto_html_Appx_websitestandard_htmlvariables -->
                      <input type="hidden" name="sra" value="1" />

                      You have chosen to <strong>adopt a hacker</strong> for a monthly amount of:
                      <input id="amount" type="text" name="a3" size="5" value="25" />
                      <select name="currency_code">
                        <option value="USD">
                          $ USD
                        </option>
            
                        <option value="EUR">
                          &euro; EUR
                        </option>
                      </select>
                      <small>Please increase the amount above if you want to make a larger difference.</small>
            
                      <p style="text-align: left;"><span style="color: #993300;">PLEASE NOTE</span>:
                      Monthly or annual subscription payments made through Paypal will continue until
                      you contact the <a href="https://www.gnome.org/foundation/">GNOME Foundation</a>
                      to cancel the payments.</p>
            
                      <h5>Pick a hacker from whom you will receive a post card:</h5>
                      <input type="hidden" name="on0" value="Favorite Hacker" />
            
                      <div class="wrapper">
                        <?php
                        $hackerList = array(
                                0 => array('name' => 'Emmanuele Bassi'),
                                2 => array('name' => 'Diego Escalante Urrelo'),
                                3 => array('name' => 'Behdad Esfahbod'),
                                4 => array('name' => 'Andre Klapper'),
                                5 => array('name' => 'Alexander Larsson', 'shortName' => 'http://blogs.gnome.org/alexl'),
                                6 => array('name' => 'Federico Mena Quintero'),
                                7 => array('name' => 'Andreas Nilsson'),
                                8 => array('name' => 'Tobias Mueller'),
                                9 => array('name' => 'Frederic Peters'),
                               12 => array('name' => 'Vincent Untz'),
                               13 => array('name' => 'Luis Villa', 'shortName' => 'http://wiki.gnome.org/LuisVilla4'),
                               14 => array('name' => 'Karen Sandler'),
                        );
                        
                        // Instanciate the parser class
                        $hackerListParser = new HackerList;
                        
                        // echo the result
                        ?>
                        <ul>
                            <?php echo $hackerListParser->parseHackerDictArrayToHtml($hackerList) . "\n"; ?>
                        </ul>
                      </div>
            
<?php
/*
 * print_form_questions_gift_listname_note
 * 
 * Simply print form elements to ask whether a gift should be sent or the donor wants to be listed.
 * And a free text area.
 * It also sets option 4 ("variables_epoch") to "1". We'll see whether this will help
 * processing IPNs. In the future, when the number or names of the options are changed
 * and the epoch is bumped, a script could use that information to determine how to
 * parse the IPN.
 */
function print_form_questions_gift_listname_note() {
?>
                      <h5>Do you want to receive a gift?</h5>
                      <input type="hidden" name="on1" value="Donation Gift" />
                      <input type="radio" checked="checked" name="os1" value="Yes" />Yes
                      <input type="radio" name="os1" value="No" />No
                      <br />
                      <small>If you do not want to receive a gift (or a LWN subscription, respectively), we will save the money for the gift and shipping and
                      use it to further the mission of the GNOME Project, bringing a free desktop to
                      the public.</small>
            
                      <h5>Do you want to have your name listed in the donors page?:</h5>
                      <input type="hidden" name="on2" value="List name in the donors page" />
                      <input type="radio" checked="checked" name="os2" value="Yes" />Yes
                      <input type="radio" name="os2" value="No" />No
            
                      <input type="hidden" name="on4" value="variables_epoch" />
                      <input type="hidden" name="os4" value="1" />

                      <h5>Additional comments or ideas on how we can improve the GNOME
                      Foundation:</h5>

                      <small>You can also write an email to
                      <a href="mailto:friends@gnome.org">friends@gnome.org</a>.
                      </small>

                      <textarea cols="88" name="custom" rows="7" maxlength="256"> </textarea>
<?php } /* print_form_questions_gift_listname_note */?>


<?php
/*
 * print_form_shirts - Simply print form elements to ask for t-shirt size
 *
 */
function print_form_shirts() {
?>
                      <h5>T-shirt size:</h5>
                      <input type="hidden" name="on3" value="T-shirt Size" />
                      <input type="radio" name="os3" value="M" />M
                      <input type="radio" checked="checked" name="os3" value="L" />L
                      <input type="radio" checked="checked" name="os3" value="XL" />XL
                      <input type="radio" name="os3" value="XXL" />XXL
<?php } /* print_form_shirts */?>

                      <?php print_form_shirts(); ?>
                      <?php print_form_questions_gift_listname_note(); ?>

                      <!-- Display the payment button. -->
                      <input type="image" alt="PayPal - The safer, easier way to pay online" name=
                      "submit" src=
                      "https://www.gnome.org/wp-content/themes/gnome-grass/images/donate-button.png" />
                      <img alt="" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1"
                      height="1" border="0" />
                    </form>
            



<?php
/*
 * A simple function that echos the standard FoG form to reduce redundancies
 *
 * level_name: Used for the id and name of the form as well as in the description text
 *
 * amount: The default value of the form
 *
 * product_name: A hidden option for PayPal to indicate the product name we are "selling".
 *               We could probably get rid of that in favour of something generic like "GNOME Donation"
 *               that would also make it much harder in the post processing to only depend on this product name
 *               i.e. one would have to verify the amount of of money not the "product" that was sold. And
 *               that is what should be done anyway as the amount is free form and lower bounds are not enforced.
 */
function printform($level_name, $amount, $product_name, $with_shirts=false) {
?>
                    <?php print_form_head($level_name, $product_name); ?>

                      <input type="hidden" name="cmd" value="_xclick" />

                      You have chosen to become a <strong><?php echo "$level_name";?></strong> for a one time amount of:

                      <input id="amount" type="text" name="amount" size="5" value="<?php echo "$amount";?>" />
                      <select name="currency_code">
                        <option value="USD">
                          $ USD
                        </option>
            
                        <option value="EUR">
                          &euro; EUR
                        </option>
                      </select>
                      <small>Please increase the amount above if you want to make a larger difference.</small>

                      <?php if ($with_shirts===true) {
                        print_form_shirts();
                      }
                      ?>
                      <?php print_form_questions_gift_listname_note(); ?>

                      <input type="image" alt="Donate" name="submit" src="https://www.gnome.org/wp-content/themes/gnome-grass/images/donate-button.png" />
                      <small>You will be redirected to the Paypal website.</small>
                    </form>

<?php } /* printform */?>

                    <?php printform("associate", "50", 'Friends of GNOME - Associate level donation ($25-500)');?>
                    <?php printform("sponsor", "500", 'Friends of GNOME - Sponsor level donation ($500-1200)', $with_shirts=true);?>
                    <?php printform("philanthropist", "1200", 'Friends of GNOME - Philanthropist level donation ($500-1200)');?>

                  </div>
            
                  <p style="text-align: center;"><small>GNOME Foundation is a 501(c)3 non-profit
                  organization, and your donation is considered charitable to the extent of
                  applicable law. Consult your tax preparer to determine
                  tax-deductibility.</small></p>
                </div>
              </div>
            
              <div class="clear"></div>
            
              <div class="container_24"></div>&nbsp;
            
              <div class="footer"></div>
            

                <br />
                <div class="clear"></div>
            </div>
            
            <div class="sidebar">
                
                <?php
                $parent_id  = $post->post_parent;
                $breadcrumbs = array();
                while ($parent_id) {
                    $page = get_page($parent_id);
                    $breadcrumbs[] = get_page($parent_id);
                    $parent_id  = $page->post_parent;
                }
                $breadcrumbs = array_reverse($breadcrumbs);
                if (isset($breadcrumbs[0])) {
                    $first_page = $breadcrumbs[0];
                } else {
                    $first_page = NULL;
                }
                ?>

                <?php if(is_page()) {?>
                <ul class="navigation_list">
                    <?php
                    if(isset($first_page) && $first_page->ID != '') {
                        wp_list_pages(array('title_li' => '', 'include' => $first_page->ID));
                        wp_list_pages(array('title_li' => '', 'child_of' => $first_page->ID));
                    } else {
                        wp_list_pages(array('title_li' => '', 'include' => $post->ID));
                        wp_list_pages(array('title_li' => '', 'child_of' => $post->ID));
                    }
                    ?>
                </ul>
                <?php } ?>            
            </div>
            <?php require_once("footer_art.php"); ?>
        </div>
    </div>
    
    <div class="clearfix"></div>
    
    <?php require_once("footer.php"); ?>
</body>
</html>
