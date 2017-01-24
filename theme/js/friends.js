(function($) {$(function(){
    $('.boxes').click(function(){
        $(".boxes").removeClass("active");
        $(this).addClass('active');
        $('.boxes-content').hide();
        $('#box'+$(this).attr('data-target')).show();
    });
});

$('.collapse').on('shown.bs.collapse', function(){
    $(this).parent().find(".fa-chevron-right").removeClass("fa-chevron-right").addClass("fa-chevron-down");
}).on('hidden.bs.collapse', function(){
    $(this).parent().find(".fa-chevron-down").removeClass("fa-chevron-down").addClass("fa-chevron-right");
});

/*
 * Bitcoin donations 
 */

// Make checkbox active if an email is provided
$(function() {
    $('#email-bitcoin input').on('keyup input', function(e){
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

    $("select[name='currency']").on('change', function(e){
    var currency_name = $('#bitcoin_currency').val();

    if(currency_symbols[currency_name]!== undefined) {
        $(".currency-bitcoin").text(currency_symbols[currency_name]);

    }});
});

$(function() {
    $('#donate_form input').on('change', function() {
        /*
         * Get the value from the selected radio button.
         */
        var currency_value = $('input[name=os0]:checked', '#donate_form').val();

        if (currency_value === 'USD') {
            $('#donate_form span.input-group-addon').text('$');
            $('input[name=currency_code]:hidden', '#donate_form').val(currency_value);
        } else if (currency_value === 'EUR') {
            $('#donate_form span.input-group-addon').text('€');
            $('input[name=currency_code]:hidden', '#donate_form').val(currency_value);
        }
    });
});

// (Friends of GNOME donations) Statements for donation amounts and regex for input
$(function() {
    $("#amount").on('keyup input', function(e) {
        var value = $(this).val()
            val = this.value;

        if (value >= 5 && value < 30){
            $("#validation-msg").addClass("alert-validation").text('Make it over $30 and get a free LWN.net subscription!');
            $("#subscription-btn").removeAttr('disabled', 'disabled');
        } else if (value >= 30){
            $("#validation-msg").addClass("alert-validation").html("<div class='checkbox'><label><input type='hidden' name='os4' id='lwn_subscription' value='No' /><input class='checkbox' name='os4' id='lwn_subscription' type='checkbox' value='Yes' /> Sign me up for a free LWN.net subscription </label></div> <span style='color: gray;'>You will receive an email with instructions on how to claim after donating for two months.</span> <input type='hidden' name='on4' value='LWN.net subscription' /><input type='hidden' name='on5' value='variables_epoch' /><input type='hidden' name='os5' value='1' />");
            $("#subscription-btn").removeAttr('disabled', 'disabled');
        } else {
            $("#validation-msg").addClass("alert-validation").text("Subscriptions must be over $5");
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
