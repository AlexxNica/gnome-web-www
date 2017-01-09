<?php


if (array_key_exists('submit', $_POST)) {

    $application_submitted = true;
    $errors = false;
    $application_sent = false;
    
    $full_name = trim(stripslashes($_POST['full_name']));
    $email = trim(stripslashes($_POST['email']));
    $obfuscated_email = str_replace("@", " AT ", $email);
    $not_spam = $_POST['not_spam'];
    
    if ($not_spam != 'not spam') {
        $errors = true;
    }
    
    $summary = trim(stripslashes($_POST['summary']));   
    $gnome_mail_alias = trim(stripslashes($_POST['gnome_mail_alias']));
    $gnome_username= trim(stripslashes($_POST['gnome_username']));
    $gnome_jabber = trim(stripslashes($_POST['gnome_jabber']));
    $references = trim(stripslashes($_POST['references']));
    
    if (empty($full_name) || empty($email) || empty($summary) || ($gnome_mail_alias == 'on' && empty($gnome_username))) {
        $errors = true;
    }
    
    if ($errors == false) {

        $formmail = "Contact Information\n" .
        "-------------------\n\n" .
        
        "Full Name: " . $full_name . "\n".
        "Email:     " . $obfuscated_email . "\n\n" .

        "Benefits\n" .
        "Mail alias: " . ($gnome_mail_alias == 'on' ? "Yes" : "No") . "\n".
        "Mail alias username: " . $gnome_username . "\n".
        "Jabber Account: " . ($gnome_jabber == 'on' ? "Yes" : "No") . "\n\n" .
        
        "Contributions Summary:\n" .
        $summary . "\n\n" .
        
        "Foundation Previous Participation:\n" .
        $previous_participation . "\n\n" .
        
        "[Application received at " . date("D M j G:i:s Y") . " (Eastern time)]" . "\n\n".
        
        "If you have any questions, you can contact the Membership Committee by\n" .
        "replying to this mail. Please note that it usually takes up to a week for an application to be fully processed.";

        $headers = "From: GNOME Foundation Membership Committee Script <membership-committee@gnome.org>\n" .
                   "Cc: $email\n";
        
        $subject = "Application received from " . $full_name . " (" . $obfuscated_email . ")";
        
        $application_sent = mail("membership-applications@gnome.org", $subject, $formmail, $headers);

    }
} else {

    $application_submitted = false;
}

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

        <?php if ($application_submitted == true && $application_sent == true): ?>
        
        <h1 style="text-align: center">Thank you.</h1>
        <p class="main_feature" style="text-align: center;">Your application has been submitted and it'll be reviewed by the <br /> GNOME Foundation Membership Committee within two weeks.</p>
        <p style="text-align: center"> You can check the status of your application at the following <a href="http://www.gnome.org/rt3-stats/membership.html">page</a>.</p>
        
    <?php else: ?>
    
    <?php while ( have_posts() ) : the_post(); ?>
    <?php the_content(); ?>
<?php endwhile; // End the loop. Whew. ?>

<hr class="top_shadow" />

<h2 style="text-align: center;">Application Form</h2>

<form action="" method="post" id="application_form">

  <script>
  
  function toggleBenefitsFields() {
   var gnomeAlias = document.getElementById("gnome_mail_alias");

   document.getElementById("gnome_username").disabled = !gnomeAlias.checked;
   document.getElementById("gnome_jabber").disabled = !gnomeAlias.checked;

   document.getElementById("jabber_label").className = (gnomeAlias.checked ? "" : "disabled-checkbox");
}

</script>

<h3>Personal Information</h3>

<div class="item">
    <label for="full_name">Full Name</label>
    <input name="full_name" id="full_name" type="text">
</div>

<div class="item">
    <label for="email">E-mail Address</label>
    <input name="email" id="email" type="text">
</div>

<h3>Benefits</h3>
<p>
    Being a GNOME Foundation member takes in several 
    <a href="https://live.gnome.org/MembershipCommittee/MembershipBenefits">benefits</a>. 
    Please, let us know if you plan to adopt a @gnome.org mail alias or a Jabber account 
    after being accepted as a GNOME Foundation member. 
</p>

<p>
    When choosing a @gnome.org alias, please, check our 
    <a href="https://live.gnome.org/AccountNamePolicy">account name policy</a>. 
    Your @gnome alias will point to the e-mail you specified above as your permanent e-mail address.
</p>                        

<div class="item benefits">
    <input name="gnome_mail_alias" id="gnome_mail_alias" type="checkbox" onClick="toggleBenefitsFields()" /> @gnome.org mail alias
    <input name="gnome_username" id="gnome_username" type="text" placeholder="What do you want your alias to be?" disabled />
</div>

<div class="item benefits">
    <input name="gnome_jabber" id="gnome_jabber" type="checkbox" disabled /> 
    <span name="jabber_label" id="jabber_label" class="disabled-checkbox">Jabber account <em>(only if you adopt a @gnome.org mail alias)</em></span>
</div>

<h3>Contributions</h3>

<div class="item">
    <p>
        Please list references to your contributions,
        i.e. Bugzilla, Mailing Lists, commits or people to vouch for you. If
        you are a new applicant, it's definitely a great plus putting
        the name of a few contacts within the community that could vouch for
        you and your work for the GNOME Foundation. (existing Foundation
        members preferred)
    </p>
    <textarea name="summary"></textarea>
</div>

<h3>Previous Foundation participation</h3>

<div class="item">
    <p>
        Please tell us whether you were an existing 
        Foundation member or have done someting relevant for the GNOME 
        Foundation in the past. (for example, past Board Member)
    </p>
    <textarea name="references"></textarea>
</div>

<hr />

<div class="item" style="text-align: center;">
    <span>Please type “not spam” here:</span> <input type="text" name="not_spam">
</div>

<div class="submit_area">
    <button name="submit" type="submit" class="action_button">Submit Application</button>
</div>

</form>
<?php endif; ?>

<br />
<div class="clear"></div>
</div>
</div>
</div>

<div class="clearfix"></div>

<?php get_footer(); ?>
