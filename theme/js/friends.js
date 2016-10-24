(function($) {$(function(){
	$('.boxes').click(function(){
		$(".boxes").removeClass("active");
		$(this).addClass('active');
		$('.boxes-content').hide();
		$('#box'+$(this).attr('target')).show();
	});
});

// (Paypal and Bitcoin donations) Regex for donation amount, allow only whole numbers 
$(function() {
	$("#amount-paypal, #amount-bitcoin").on('keyup', function(e) {
	var value = $( this ).val()
		val = this.value;
	var valid = /^\d{0,9}?$/.test(this.value);
	
	if(!valid){
        this.value = val.substring(0, val.length - 1)};

	}).keyup();
});


/*
 * Bitcoin donations 
 */

// Make checkbox active if an email is provided
$(function() {
	$('#orderIDD input').on('keyup input', function(e){
		if ( $(this).val() != '' ) {
			$("input:checkbox[name='os2']").removeAttr('disabled', 'disabled');
		} else {
			$("input:checkbox[name='os2']").attr('disabled', 'disabled');
		}
	});
});

// Change the currency symbol
// FIXME: Add generic case when there's no currency symbol
$(function() {
	var currency_symbols = {
		'USD': '$',
		'BTC': '฿',
		'EUR': '€',
		'GBP': '£',
		'BGN': 'лв',
		'BRL': 'R$',
		'CHF': 'CHF',
		'CNY': '¥',
		'CZK': 'Kč',
		'DKK': 'kr',
		'HRK': 'kn',
		'HUF': 'Ft',
		'IDR': 'Rp',
		'ILS': '₪',
		'INR': '₹',
		'JPY': '¥',
		'KRW': '₩',
		'MYR': 'RM',
	};

	$("select[name='currency']").on('click touchend', function(e){
	var currency_name = $('#bitcoin_currency').val();

	if(currency_symbols[currency_name]!== undefined) {
		$(".currency-bitcoin").val(currency_symbols[currency_name]);

	}});
});



// (PayPal and Friends of GNOME donations) Changes the currency symbol
$(function() {
    var format = function(num){
		var cur = $('#cur-usd').is(":checked") ? "$" : "€", str = num.toString().replace("$", "").replace("€", ""), parts = false, output = [], i = 1, formatted = null;
        return(cur);
	};
	//currency
	$(".currency").keyup(function(e) {
        $(this).val(format($(this).val()));
	});
	$("input[name='os0']").on('click', function(e){
		$(".currency").keyup();
	});
});

// (Friends of GNOME donations) Statements for donation amounts and regex for input
$(function() {
	$("#amount").on('keyup input', function(e) {
		var value = $(this).val()
			val = this.value;
		var valid = /^\d{0,9}?$/.test(this.value);

		if(!valid){
			this.value = val.substring(0, val.length - 1)};
            
	
		if (value >= 5 && value < 30){
			$("#validation-msg").addClass("validation-msg").text("Make it over $30 and get a free LWN.net subscription!");
			$("#subscription-btn").removeAttr('disabled', 'disabled');
		} else if (value >= 30){
			$("#validation-msg").addClass("validation-msg").html("<label class='checkbox' style='margin-left: 20px;'><input type='hidden' name='os4' id='lwn_subscription' value='No' /><input name='os4' id='lwn_subscription' type='checkbox' value='Yes' /> Sign me up for a free LWN.net subscription </label> <span style='color: gray;'>You will receive an email with instructions on how to claim after donating for two months.</span> <input type='hidden' name='on4' value='LWN.net subscription' />");
			$("#subscription-btn").removeAttr('disabled', 'disabled');
		} else {
			$("#validation-msg").addClass("validation-msg").text("Subscriptions must be over $5");
			$("#subscription-btn").attr('disabled', 'disabled');
		}
	}).keyup();
});

$(function() {

new Clipboard('#badgecode-container .btn');

    $("#badges").on('click','img',function(){
      $("#badgecode-container").removeClass('hide').show();
      var image_link = $(this).attr('src');
      var code = '<a href="https://www.gnome.org/friends/"> <img src="' +image_link+ '" alt="Become a Friend of GNOME" border="0" /></a> '
      $('#badgecode-container input').val(code);
    });
});
})(jQuery);
