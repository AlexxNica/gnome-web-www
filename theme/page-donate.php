<?php get_header(); ?>

    <!-- container -->
    <div class="container">
        <div class="row content">
            <div class="col-xs-12">
                <div class="page_title">
                    <h1><?php esc_html_e('Donate to GNOME', 'grass');?></h1>
                </div>

                <p><?php esc_html_e( 'Thank you for donating to GNOME! Please choose a payment option that best suits you.', 'grass' ); ?></p>

                <?php while ( have_posts() ) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; // End the loop. Whew. ?>

                <div class="clearfix"></div>

                <!-- Donation Boxes -->
                <div class="boxes-selection-container row equalizer">
                    <div class="col-sm-3">
                        <div class="boxes active col-sm-12" data-target="1">
                            <p class="main_feature">PayPal</p>
                            <p><?php esc_html_e( 'Tax deductible in the United States', 'grass' ); ?></p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="boxes col-sm-12" data-target="2">
                            <p class="main_feature"><?php esc_html_e( 'Bank Transfer', 'grass' ); ?></p>
                            <p><?php esc_html_e( 'For EU bank account holders only; tax deductible', 'grass' ); ?></p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="boxes col-sm-12" data-target="3">
                            <p class="main_feature"><?php /* translators: This is a payment option */ esc_html_e( 'Check', 'grass' ); ?></p>
                            <p><?php esc_html_e( 'Available to United States bank account holders; tax deductible', 'grass' ); ?></p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="boxes col-sm-12" data-target="4">
                            <p class="main_feature">Bitcoin</p>
                        </div>
                    </div>
                </div>

                <!-- Donation Boxes Content -->
                <div class="boxes-content-container row">
                    <div class="col-sm-12">
                        <!-- PayPal -->
                        <div id="box1" class="boxes-content" >
                            <p><?php esc_html_e( 'PayPal donations are made to the GNOME Foundation, a 501(c)(3) nonprofit organization, and can therefore be tax deductible in the United States. Contact your tax office for more information and to find out if you qualify.', 'grass' ); ?></p>
                            <h3><?php esc_html_e( 'Donation amount', 'grass' ); ?></h3>
                            <form id="donate_form" class="form-horizontal" action="https://www.paypal.com/cgi-bin/webscr" method="post" name="application_form">
                                <input type="hidden" name="business" value="friends@gnome.org" />
                                <input type="hidden" name="return" value="https://www.gnome.org/thank-you/" />
                                <input type="hidden" name="item_name" value="Friends of GNOME - One time donation" />
                                <input type="hidden" name="notify_url" value="https://muelli.cryptobitch.de/paypaltest/ipnhandler.php" />

                                <div class="form-group">
                                    <div class="col-sm-2 col-md-1">
                                        <label class="control-label"><?php esc_html_e( 'Currency', 'grass' ); ?></label>
                                    </div>
                                    <div class="col-sm-10 col-md-11">
                                        <label class="radio-inline">
                                            <input type="radio" name="os0" value="USD" id="cur-usd" checked="checked"/>$ USD
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="os0" value="EUR" id="cur-eur"/>&euro; EUR
                                            <input type="hidden" name="currency_code" value="" id="cur">
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-2 col-md-1">
                                        <label for="amount-paypal" class="control-label"><?php esc_html_e( 'Amount', 'grass' ); ?></label>
                                    </div>
                                    <div class="col-sm-5 col-md-2 no-padding">
                                        <div class="col-xs-12 col-sm-3 col-md-6 col-lg-5 input-group">
                                            <span class="input-group-addon input-group-no-bg">$</span>
                                            <input type="hidden" name="cmd" value="_xclick" />
                                            <input id="amount-paypal" type="number" class="form-control" name="amount" min="5" step="1" value="25" required="" /> <br>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="checkbox col-sm-10">
                                        <label>
                                            <input type="hidden" name="os1" value="No" />
                                            <input name="os1" type="checkbox" value="Yes" checked /> <?php esc_html_e( "GNOME can contact me by email (we don't do this very often)", 'grass' ); ?>
                                            <input type="hidden" name="on1" value="Keep me updated by email" />
                                        </label>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success" name="submit"><?php esc_html_e( 'Donate', 'grass' ); ?></button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- Bank transfer -->
                        <div id="box2" class="boxes-content" style="display:none;">
                            <p><?php esc_html_e( 'Bank transfers can be sent from EU bank accounts to GNOME via the WHS Foundation. These can be tax deductible - contact your tax office for more information and to find out if you qualify.', 'grass' ); ?></p>
                            <h3><?php esc_html_e( 'Transfer details', 'grass' ); ?></h3>
                            <p><?php esc_html_e( 'Bank transfers can be sent to:', 'grass' ); ?></p>
                            <dl class="dl-horizontal">
                                <dt><?php esc_html_e( 'Account Name', 'grass' ); ?></dt>
                                <dd>Wau Holland Stiftung</dd>
                                <dt><?php esc_html_e( 'Bank Name', 'grass' ); ?></dt>
                                <dd>Commerzbank Kassel</dd>
                                <dt><?php esc_html_e( 'Bank Address', 'grass' ); ?></dt>
                                <dd>Königsplatz 32-34, 34117, Kassel, Germany</dd>
                                <dt>IBAN</dt>
                                <dd>DE08 5204 0021 0277 2812 09</dd>
                                <dt>BIC</dt>
                                <dd>COBADEFFXXX</dd>
                            </dl>

                            <p><strong><?php esc_html_e( 'Donors should include the word "GNOME" and their postal address on their money transfer. This will allow the WHS to send a donation receipt for tax deduction purposes.', 'grass' ); ?></strong></p>
                        </div>

                        <!-- Check -->
                        <div id="box3" class="boxes-content" style="display:none;">
                            <p><?php esc_html_e( 'US bank account holders can make donations via check. The GNOME Foundation is a 501(c)(3) non-profit organization, and can therefore be tax deductible in the United States. Contact your tax office for more information and to find out if you qualify.', 'grass' ); ?></p>
                            <h3><?php esc_html_e( 'Postal details', 'grass' ); ?></h3>
                            <p><?php esc_html_e( 'Checks should be marked as payable to "GNOME Foundation, Inc." and sent to:', 'grass' ); ?></p>
                            <address>
                                GNOME Foundation<br>
                                #117<br>
                                21 Orinda Way Ste. C<br>
                                Orinda, CA 94563<br>
                                USA
                            </address>
                        </div>
                        
                        <!-- Bitcoin -->
                        <div id="box4" class="boxes-content" style="display:none;">
                            <form id="bitcoin_donation" class="form-horizontal" action="https://bitpay.com/checkout" method="post">
                                <input type="hidden" name="action" value="checkout" />
                                <div class="form-group">
                                    <div class="col-sm-2">
                                        <label class="control-label" for="bitcoin_currency"><?php esc_html_e( 'Currency', 'grass' ); ?></label>
                                    </div>
                                    <div class="col-sm-5 col-md-2 no-padding">
                                        <div class="col-xs-3 col-md-6 no-padding">
                                            <select id="bitcoin_currency" class="form-control" name="currency"><option selected="selected" value="USD">USD</option><option value="BTC">BTC</option><option value="EUR">EUR</option><option value="GBP">GBP</option><option value="AUD">AUD</option><option value="BGN">BGN</option><option value="BRL">BRL</option><option value="CAD">CAD</option><option value="CHF">CHF</option><option value="CNY">CNY</option><option value="CZK">CZK</option><option value="DKK">DKK</option><option value="HKD">HKD</option><option value="HRK">HRK</option><option value="HUF">HUF</option><option value="IDR">IDR</option><option value="ILS">ILS</option><option value="INR">INR</option><option value="JPY">JPY</option><option value="KRW">KRW</option><option value="LTL">LTL</option><option value="LVL">LVL</option><option value="MXN">MXN</option><option value="MYR">MYR</option><option value="NOK">NOK</option><option value="NZD">NZD</option><option value="PHP">PHP</option><option value="PLN">PLN</option><option value="RON">RON</option><option value="RUB">RUB</option><option value="SEK">SEK</option><option value="SGD">SGD</option><option value="THB">THB</option><option value="TRY">TRY</option><option value="ZAR">ZAR</option></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-2">
                                        <label for="amount-bitcoin" class="control-label"><?php esc_html_e( 'Amount', 'grass' ); ?></label>
                                    </div>
                                    <div class="col-sm-5 col-md-2 no-padding">
                                        <div class="col-xs-3 col-md-6 input-group">
                                            <span class="input-group-addon input-group-no-bg currency-bitcoin">$</span>
                                            <input id="amount-bitcoin" class="form-control" type="number" min="5" step="1" name="price" value="25" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-2">
                                        <label for="email-bitcoin" class="control-label"><?php esc_html_e( 'Email address', 'grass' ); ?></label>
                                    </div>
                                    <div class="col-sm-3 col-md-2 no-padding">
                                        <input id="email-bitcoin" class="form-control" type="email" maxlength="50" name="orderID" aria-describedby="bitcoin-msg"/>
                                    </div>
                                    <div id="bitcoin-msg" class="col-sm-6 col-md-8 help-block"><?php esc_html_e( 'Optional', 'grass' ); ?></div>
                                </div>
                                <div class="form-group">
                                    <div class="checkbox col-sm-11">
                                        <label>
                                            <input type="hidden" name="os2" value="No" />
                                            <input name="os2" disabled="disabled" type="checkbox" value="Yes" checked /> <?php esc_html_e( "GNOME can contact me by email (we don't do this very often)", 'grass' ); ?>
                                            <input type="hidden" name="on2" value="Keep me updated by email" />
                                        </label>
                                    </div>
                                </div>
                                <input type="hidden" name="data" value="nZRF5Hm4nQGR1KC5Teo6TKlb70jK8EHVcreK7DFO6yMJSbIPTqK0XcB/Et62OHNuPy5dIcrZWQN2GKC1HU7L4zOqX9jwoBIKwlrVorwfnMlCWbL1YynaGevJjggRZQu4THkqvYaCQ7GFtSOjtLXcgZNUeD0m0q3Z/y/5iLFCqdGgiR8WMzb3H9sjPPtSTfSrMkdSnBCzdMJVfOUgkAWK2vppfBJDjNlAGDrJB820w0qU6+2B9kM0v8UUGZ7IrZrDM9hoFgKUpsAfL2PyDfF93L8siKwV2F0HnpXE8WqeiOu/Zi1W6K7Ev9NnNxkVcNaelEHoPaxSfiLBhTaCg5i7eg==" />
                                <br>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success" name="submit-bitcoin"><?php esc_html_e( 'Donate', 'grass' ); ?></button>
                                    </div>
                                </div>
                            </form>
                        </div> <!-- END Bitcoin -->
                    </div>
                </div> <!-- END boxes-content-container -->
            </div>
        </div> <!-- END content -->
    </div> <!-- END container -->
    
    <div class="clearfix"></div>
   
<?php get_footer(); ?>
