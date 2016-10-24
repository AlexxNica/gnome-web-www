jQuery(document).ready(function($) {
    //  Sub menu navigation of Foundation Menu
     $(".normal-menu .foundation-menu-item").click(function(){

        //Toggle foundation menu option name as menu displays or hides.
         if($(".foundation-menu-item .sub-menu").css("display") == "none") {
         	$(".foundation-menu-item > a").html("Foundation -");
         }
         else{
         	$(".foundation-menu-item > a").html("Foundation +");
         }
         $(".foundation-menu-item .sub-menu").toggle('fast');
     })


     if( $("li.foundation-menu-item").hasClass("current-menu-parent") ){
        $("li.foundation-menu-item .sub-menu").last().trigger('click');
     }

     $(".mobile-menu .foundation-menu-item").click(function(){

         if($(".foundation-menu-item .sub-menu").css("display") == "none") {
            $(".foundation-menu-item > a").html("Foundation -");
         }
         else{
            $(".foundation-menu-item > a").html("Foundation +");
         }
         $(".foundation-menu-item .sub-menu").toggle();
     })

     $("[id^=apply-pull]").click(function(){
        var suffix = $(this).attr('id').split('_').pop();
        if($("#" + "apply-mobile-hidden_" + suffix).css("display") == "none") {
            $(this).html('-');
         }
         else{
            $(this).html('+');
         }
         $("#" + "apply-mobile-hidden_" + suffix).toggle();

     })
 });
