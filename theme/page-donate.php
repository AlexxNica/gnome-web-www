<?php

require_once("header.php"); ?>

<?php 
function matching_donation_text() {
    echo __('<p>Employees of some companies can have their donation to GNOME matched by their employer. This is great way to increase your donation. Companies that offer donation matching include ... , ... and ...</p>', 'grass');
} ?>

	<!-- container -->
    <div id="container">
        <div class="container">
            <div class="page_title">
                <h1><?php echo __('Donate to GNOME', 'grass');?></h1>
            </div>
            
			<div class="content">
				<p><?php _e( 'Thank you for choosing to donate to GNOME! Please choose a payment option that best suits you.', 'grass' ); ?></p>

				<?php while ( have_posts() ) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; // End the loop. Whew. ?>
				
				<div class="clearfix"></div>
				
				<div class="boxes-container text-center">
					<div class="boxes active" target="1">
						<p class="main_feature">PayPal</p>
						<p class="text"><?php _e( 'Tax deductible in the United States', 'grass' ); ?></p>
					</div>
					<div class="boxes" target="2">
						<p class="main_feature"><?php _e( 'Bank Transfer', 'grass' ); ?></p>
						<p class="text"><?php _e( 'For EU bank account holders only; tax deductible', 'grass' ); ?></p>
					</div>
					<div class="boxes" target="3">
						<p class="main_feature"><?php _e( 'Check', 'grass' ); ?></p>
						<p class="text"><?php _e( 'Available to United States bank account holders; tax deductible', 'grass' ); ?></p>
					</div>
					<div class="boxes" target="4">
						<p class="main_feature">Bitcoin</p>
						<p class="text"></p>
					</div>
				</div>

				<div id="boxes-content" class="col-sm-12">
					<!-- PayPal -->
					<div id="box1" class="boxes-content" >
						<p><?php _e( 'The GNOME Foundation is a non-profit organization, and donations made by Paypal are tax deductible in the United States. Contact your tax office for more information and to find out if you qualify.', 'grass' ); ?></p>
						<?php matching_donation_text(); ?>
                        <h3><?php _e( 'Donation amount', 'grass' ); ?></h3>
						<form id="donate_form" class="form-horizontal" action="https://www.paypal.com/cgi-bin/webscr" method="post" name="application_form">
							<input type="hidden" name="business" value="friends@gnome.org" />
							<input type="hidden" name="return" value="https://www.gnome.org/thank-you/" />
							<input type="hidden" name="item_name" value="Friends of GNOME - One time donation" />
							<input type="hidden" name="notify_url" value="https://muelli.cryptobitch.de/paypaltest/ipnhandler.php" /> 
									
							<div class="form-group">
                                <div class="col-sm-2">
                                    <label class="control-label"><?php _e( 'Currency', 'grass' ); ?></label>
                                </div>            
                                <div class="col-sm-10">
									<label class="radio-inline">
										<input type="radio" name="os0" value="USD" id="cur-usd" onClick="document.getElementById('cur').value=this.value" checked="checked"/>$ USD
									</label>
									<label class="radio-inline">
										<input type="radio" name="os0" value="EUR" id="cur-eur" onClick="document.getElementById('cur').value=this.value"/>&euro; EUR
										<input type="hidden" name="currency_code" value="" id="cur">
									</label>
                                </div>
							</div>
							<div class="form-group">
                                <div class="col-sm-2">
                                    <label class="control-label"><?php _e( 'Amount', 'grass' ); ?></label>
                                </div>
                                <div class="col-sm-10">
									<input type="hidden" name="cmd" value="_xclick" />
									<input type="text" disabled class="currency" placeholder="$" style="background: #fff; border: 0; width: 10px;"/>
									<input id="amount-paypal" style="width: 65px;" type="tel" name="amount" size="5" value="25" required /> <br>
                                </div>
							</div>
                            <div class="form-group">
                                <div class="checkbox col-sm-10">
                                    <label>
                                        <input type="hidden" name="os1" id="notify_donor" value="No" />
                                        <input name="os1" id="notify_donor" type="checkbox" value="Yes" checked /> <?php _e( "GNOME can contact me by email (we don't do this very often)", 'grass' ); ?>
                                        <input type="hidden" name="on1" value="Keep me updated by email" />
                                    </label>
                                </div>
                            </div>
							<div class="form-group">
                                <div class="col-sm-12">
									<button type="submit" class="btn btn-success" name="submit"><?php _e( 'Donate', 'grass' ); ?></button>
                                </div>
							</div>
						</form>
					</div>

					<!-- Bank transfer -->
					<div id="box2" class="boxes-content" style="display:none;">
						<p><?php _e( 'Bank transfers to the GNOME Foundation from within the EU can be sent to WHS Foundation. Payments sent WHS Foundation are tax deductible. Contact your tax office for more information and to find out if you qualify.', 'grass' ); ?></p>
						<p><strong><?php _e( 'Donors should include the word "GNOME" and their postal address on their money transfer. This will allow the WHS to send a donation receipt for income tax deduction', 'grass' ); ?></strong></p>
						
						<dl class="dl-horizontal">
							<dt>Account Name</dt>
							<dd>Wau Holland Stiftung</dd>
							<dt>Bank Name</dt>
							<dd>Commerzbank Kassel</dd>
							<dt>Bank Address</dt>
							<dd>Königsplatz 32-34, 34117, Kassel, Germany</dd>
							<dt>IBAN</dt>
							<dd>DE08 5204 0021 0277 2812 09</dd>
							<dt>BIC</dt>
							<dd>COBADEFFXXX</dd>
						</dl>

                        <?php matching_donation_text(); ?>
					</div>
					
					<!-- Check -->
					<div id="box3" class="boxes-content" style="display:none;">
						<p><?php _e( 'US bank account holders can send payments check. The GNOME Foundation is a non-profit organization, and donation made by check are tax deductible in the United States. Contact your tax office for more information and to find out if you qualify.', 'grass' ); ?></p>
						<p><?php _e( 'Checks should be marked as payable to "GNOME Foundation, Inc." and sent to:', 'grass' ); ?></p>
						<address>
							GNOME Foundation<br>
							#117<br>
							21 Orinda Way Ste. C<br>
							Orinda, CA 94563<br>
							USA
						</address>
						<br>
                        <?php matching_donation_text(); ?>
					</div>
					
					<!-- Bitcoin -->
					<div id="box4" class="boxes-content" style="display:none;">
                        <?php matching_donation_text(); ?>
                        
						<form id="bitcoin_donation" action="https://bitpay.com/checkout" method="post" onsubmit="return bp.validateMobileCheckoutForm($('#makeDonation'));"><input type="hidden" name="action" value="checkout" />
							<fieldset class="phone-form form-horizontal" style="margin-top: 5px;">
							<div id="orderIDC" class="form-group">
                                <div class="col-sm-2">
                                    <label class="control-label"><?php _e( 'Currency', 'grass' ); ?></label>
                                </div>
                                <div class="col-sm-10">
									<select id="bitcoin_currency" style="width: 80px;" name="currency"><option selected="selected" value="USD">USD</option><option value="BTC">BTC</option><option value="EUR">EUR</option><option value="GBP">GBP</option><option value="AUD">AUD</option><option value="BGN">BGN</option><option value="BRL">BRL</option><option value="CAD">CAD</option><option value="CHF">CHF</option><option value="CNY">CNY</option><option value="CZK">CZK</option><option value="DKK">DKK</option><option value="HKD">HKD</option><option value="HRK">HRK</option><option value="HUF">HUF</option><option value="IDR">IDR</option><option value="ILS">ILS</option><option value="INR">INR</option><option value="JPY">JPY</option><option value="KRW">KRW</option><option value="LTL">LTL</option><option value="LVL">LVL</option><option value="MXN">MXN</option><option value="MYR">MYR</option><option value="NOK">NOK</option><option value="NZD">NZD</option><option value="PHP">PHP</option><option value="PLN">PLN</option><option value="RON">RON</option><option value="RUB">RUB</option><option value="SEK">SEK</option><option value="SGD">SGD</option><option value="THB">THB</option><option value="TRY">TRY</option><option value="ZAR">ZAR</option></select>&nbsp;
								</div>
							</div>
							<div id="price" class="form-group">
                                <div class="col-sm-2">
                                    <label class="control-label"><?php _e( 'Amount', 'grass' ); ?></label>
                                </div>
                                <div class="col-sm-10">
									<input type="text" disabled class="currency-bitcoin" placeholder="$" style="background: #fff; border: 0; width: 10px;"/>
									<input id="amount-bitcoin" style="width: 65px;" type="tel" name="price" value="25" required />
                                </div>
							</div>
							<div id="orderIDD" class="form-group">
                                <div class="col-sm-2">
                                    <label class="control-label"><?php _e( 'Email address', 'grass' ); ?></label>
                                </div>
                                <div class="col-sm-10">
									<input class="input input-xlarge" type="email" maxlength="50" name="orderID"/> &nbsp; <?php _e( 'Optional', 'grass' ); ?> <br>
								</div>
							</div>
							<div id="orderID" class="form-group">
                                <div class="checkbox col-sm-11">
								<label>
									<input type="hidden" name="os2" id="update_donor" value="No" />
									<input name="os2" id="update_donor" disabled="disabled" type="checkbox" value="Yes" checked /> <?php _e( "GNOME can contact me by email (we don't do this very often)", 'grass' ); ?>
									<input type="hidden" name="on2" value="Keep me updated by email" />
								</label>
                                </div>
							</div>

							<input type="hidden" name="data" value="nZRF5Hm4nQGR1KC5Teo6TKlb70jK8EHVcreK7DFO6yMJSbIPTqK0XcB/Et62OHNuPy5dIcrZWQN2GKC1HU7L4zOqX9jwoBIKwlrVorwfnMlCWbL1YynaGevJjggRZQu4THkqvYaCQ7GFtSOjtLXcgZNUeD0m0q3Z/y/5iLFCqdGgiR8WMzb3H9sjPPtSTfSrMkdSnBCzdMJVfOUgkAWK2vppfBJDjNlAGDrJB820w0qU6+2B9kM0v8UUGZ7IrZrDM9hoFgKUpsAfL2PyDfF93L8siKwV2F0HnpXE8WqeiOu/Zi1W6K7Ev9NnNxkVcNaelEHoPaxSfiLBhTaCg5i7eg==" />
							<div style="margin: auto; width: 100%;">
								<button type="submit" class="btn btn-success" name="submit"><?php _e( 'Donate', 'grass' ); ?></button>
							</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div> <!-- END content -->
<?php require_once("footer_art.php"); ?>
		</div> <!-- END .container -->
	</div> <!-- END #container -->
    
    <div class="clearfix"></div>
   
    <?php require_once("footer.php"); ?>
</body>
</html>
